# Payment Gateway Documentation

This document describes all payment-related code in this project, how payments flow end-to-end, and how to migrate to a different payment gateway.

---

## Table of Contents

1. [Overview](#overview)
2. [Payment Systems in Use](#payment-systems-in-use)
3. [Architecture & Flow](#architecture--flow)
4. [Complete File Inventory](#complete-file-inventory)
5. [Database Tables](#database-tables)
6. [Configuration Reference](#configuration-reference)
7. [How to Migrate to Another Payment Gateway](#how-to-migrate-to-another-payment-gateway)
8. [Files to Change (Migration Checklist)](#files-to-change-migration-checklist)
9. [Known Issues & Broken Links](#known-issues--broken-links)
10. [Testing Checklist](#testing-checklist)

---

## Overview

This application uses a **UPI QR Code Payment & Wallet Engine**. A payment is credited only after a trusted provider callback confirms the exact transaction and amount.

## Current implementation

The active implementation is in `api/payment/` and is used by the wallet and plan-recharge screens under `admin/` (the `dashboard/` paths are compatibility wrappers).

1. An authenticated user requests `generate-qr.php`; the application saves a pending payment and returns a UPI URI.
2. The browser renders the UPI URI as a QR code and polls `verify-status.php`. That endpoint exposes only the requesting user's transaction state.
3. The payment provider (or a small gateway adapter) calls `webhook.php` with the transaction ID, paid amount, and a HMAC SHA-256 signature.
4. `webhook.php` validates the signature and amount, then atomically marks the payment paid, updates the wallet, writes the immutable ledger entry, and synchronizes the legacy `tbluser.findwallet` / `walletamount` fields.

Set `PAYMENT_WEBHOOK_SECRET` to a long, unique secret outside the web root. The provider must calculate `hash_hmac('sha256', raw_request_body, PAYMENT_WEBHOOK_SECRET)` and send it in `X-Payment-Signature`. A plain UPI QR code alone does not provide a trustworthy server-side payment confirmation, so browser polling can never credit a balance by itself.

| System | Gateway / Provider | Status | Purpose |
|--------|--------------------|--------|---------|
| **Automated UPI QR** | Paytm Order Status API (`securegw.paytm.in/order/status`) | **Primary / Active** | Automated real-time wallet recharge & subscription payments |
| **HBConnect / RechPay** | Aggregator Gateway | **Decommissioned / Removed** | Replaced by Automated UPI QR engine |
| **Razorpay** | Legacy SDK | **Decommissioned / Removed** | Replaced by Automated UPI QR engine |
| **Manual QR / UPI** | Admin Approval (`qrtxn`) | **Legacy Fallback** | Optional manual recharge queue |

---

## Payment Systems in Use

### 1. HBConnect / RechPay (Primary)

Each payment module is a self-contained folder with this structure:

```
<module>/
├── index.php              # Builds signed request, auto-submits to gateway
├── pgResponse.php           # Callback handler (acts as webhook)
└── lib/
    ├── Config_HBConnect.php # Credentials, amounts, callback URL
    └── RechPayChecksum.php  # AES-128 + SHA256 signing/verification
```

**External aggregator URLs used:**
- `https://paytm.indiprintportal.in/order/paytm` (all modules)
- Status check: `https://paytm.indiprintportal.in/order/status`

### 2. Razorpay (Secondary / Legacy)

Located at `admin/aadhar4/pgRecharge/razor/`. Uses the official Razorpay PHP SDK and `checkout.razorpay.com/v1/checkout.js`. No live page in the codebase currently links to this module.

### 3. Manual QR / UPI

Users pay externally via QR/UPI, submit transaction proof in `wallet.php`, and an admin approves in `paymentreq.php`.

---

## Architecture & Flow

### HBConnect / RechPay Flow

```
User clicks "Pay"
    │
    ▼
List page / recharge form  (e.g. panfindlist.php, recharge.php)
    │  POST/GET with amount + record id
    ▼
index.php
    │  Reads Config_HBConnect.php
    │  Signs params via RechPayChecksum
    │  Auto-submits HTML form
    ▼
Paytm Payment Gateway  (securegw.paytm.in)
    │  User completes Paytm UPI payment
    │  POST callback
    ▼
pgResponse.php
    │  Verifies status, hash, checksum
    │  Updates database
    │  Redirects user
    ▼
Success / failure page
```

**Request parameters sent to gateway:**

| Parameter | Source | Description |
|-----------|--------|-------------|
| `upiuid` | Config | Paytm Business UPI ID |
| `token` | Config | HBConnect API token |
| `orderId` | Config | Usually `time()` |
| `txnAmount` | Config / POST | Payment amount |
| `txnNote` | Config / GET | Order reference (user id or record id) — returned as `sender_note` in callback |
| `cust_Mobile` | Config | Customer mobile |
| `cust_Email` | Config | Customer email |
| `callback_url` | Config | Full URL to `pgResponse.php` |
| `checksum` | Generated | SHA256 + AES signature |

**Callback parameters received from gateway:**

| Parameter | Description |
|-----------|-------------|
| `status` | `SUCCESS` or failure |
| `txnAmount` | Paid amount |
| `message` | Gateway message |
| `hash` | Encrypted payload |
| `checksum` | Signature for verification |

### Razorpay Flow

```
index.php  →  auto-submit  →  pay.php
                                  │
                                  ├─ Creates Razorpay order via API
                                  └─ Opens Razorpay Checkout modal (JS)
                                          │
                                          ▼
                                  response.php
                                  ├─ Fetches payment from Razorpay API
                                  └─ Credits tbluser.walletamount
```

### Manual QR Flow

```
wallet.php  →  INSERT into qrtxn (status='pending')
                      │
                      ▼
paymentreq.php  →  Admin approves  →  UPDATE usertable.walletamount
```

---

## Complete File Inventory

### A. HBConnect / RechPay Modules (11 modules)

Each module contains `index.php`, `pgResponse.php`, `lib/Config_HBConnect.php`, and `lib/RechPayChecksum.php`.

| Module Path | Amount | DB Action on Success | Entry Point (who links here) |
|-------------|--------|----------------------|------------------------------|
| `admin/findwalletpay/` | Dynamic (POST) | `tbluser.findwallet += amount` | `admin/findwallet.php` |
| `admin/HBConnect/retailer/` | ₹299 | `findwallet=299`, `usertype='RETAILER'` | `admin/recharge.php` |
| `admin/HBConnect/distributor/` | ₹999 | `findwallet=999`, `usertype='DISTRIBUTER'` | `admin/recharge.php` |
| `admin/HBConnect/master/` | ₹1499 | `findwallet += 1499` | `admin/recharge.php` |
| `admin/HBConnect/whitelabel/` | ₹2999 | `findwallet += 3000` | `admin/recharge.php` |
| `admin/panfindpay/` | ₹50 | `panfind.payment_status=1` | `admin/panfindlist.php` |
| `admin/votermenualpay/` | ₹16 | `voterauto0.payment_status=1` | `admin/votermanuallist.php` |
| `admin/voteradvance2/` | ₹20 | `voterauto2.payment_status=1` | `admin/voterlist.php` |
| `admin/adharmenualpayment/` | ₹20 | `aadharmanual.payment_status=1` | `admin/aadharmanuallist.php` |
| `admin/aadhardublicatepay/` | ₹550 | `aadhaarfind.payment_status=1` | `admin/aadharfindlist.php` |
| `admin/dlservice/dlpay/` | ₹50 | `dlm.payment_status=1` | `admin/dlmlist.php` (**broken — missing index.php**) |

**Per-module file list:**

```
admin/findwalletpay/
├── index.php
├── pgResponse.php
└── lib/
    ├── Config_HBConnect.php
    └── RechPayChecksum.php

admin/HBConnect/retailer/
├── index.php
├── pgResponse.php
└── lib/
    ├── Config_HBConnect.php
    └── RechPayChecksum.php

admin/HBConnect/distributor/
├── index.php
├── pgResponse.php
└── lib/
    ├── Config_HBConnect.php
    └── RechPayChecksum.php

admin/HBConnect/master/
├── index.php
├── pgResponse.php
└── lib/
    ├── Config_HBConnect.php
    └── RechPayChecksum.php

admin/HBConnect/whitelabel/
├── index.php
├── pgResponse.php
└── lib/
    ├── Config_HBConnect.php
    └── RechPayChecksum.php

admin/panfindpay/
├── index.php
├── pgResponse.php
└── lib/
    ├── Config_HBConnect.php
    └── RechPayChecksum.php

admin/votermenualpay/
├── index.php
├── pgResponse.php
└── lib/
    ├── Config_HBConnect.php
    └── RechPayChecksum.php

admin/voteradvance2/
├── index.php
├── pgResponse.php
└── lib/
    ├── Config_HBConnect.php
    └── RechPayChecksum.php

admin/adharmenualpayment/
├── index.php
├── pgResponse.php
└── lib/
    ├── Config_HBConnect.php
    └── RechPayChecksum.php

admin/aadhardublicatepay/
├── index.php
├── pgResponse.php
└── lib/
    ├── Config_HBConnect.php
    └── RechPayChecksum.php

admin/dlservice/dlpay/
├── pgResponse.php          ← index.php is MISSING
└── lib/
    ├── Config_HBConnect.php
    └── RechPayChecksum.php
```

### B. Razorpay Module

```
admin/aadhar4/pgRecharge/razor/
├── index.php               # Entry: auto-submits to pay.php
├── pay.php                 # Creates order, loads Razorpay Checkout JS
├── response.php            # Post-payment: credits wallet
├── config.php              # Key config (NOT used by pay.php — keys hardcoded in pay.php)
├── Razorpay.php            # SDK bootstrap
├── test.php                # Test file
├── composer.json
├── README.md
├── src/                    # Vendored Razorpay PHP SDK (~20 files)
│   ├── Api.php
│   ├── Order.php
│   ├── Payment.php
│   ├── Utility.php
│   └── Errors/
│       ├── GatewayError.php
│       ├── SignatureVerificationError.php
│       └── ...
└── libs/
    └── Requests-1.7.0/     # HTTP library for SDK
```

### C. Manual QR / UPI Payment

| File | Purpose |
|------|---------|
| `admin/wallet.php` | User submits amount + UPI txn ref → inserts into `qrtxn` (pending) |
| `admin/paymentreq.php` | Admin approves pending `qrtxn` → credits `usertable.walletamount` |

### D. Frontend Entry Points (forms that trigger payments)

| File | Payment Target | Parameters |
|------|---------------|------------|
| `admin/recharge.php` | `HBConnect/retailer/index.php` | userid, amount=299, usertype=RETAILER |
| `admin/recharge.php` | `HBConnect/distributor/index.php` | userid, amount=999, usertype=DISTRIBUTER |
| `admin/recharge.php` | `HBConnect/master/index.php` | userid, amount=1499, usertype=SUPER DISTRIBUTER |
| `admin/recharge.php` | `HBConnect/whitelabel/index.php` | userid, amount=2999, usertype=MASTER ADMIN |
| `admin/findwallet.php` | `findwalletpay/index.php` | amount, userid (POST) |
| `admin/aadharmanuallist.php` | `adharmenualpayment/index.php` | aadharmanualid, Pay_Amt=20 |
| `admin/voterlist.php` | `voteradvance2/index.php` | voterautoid, amount |
| `admin/votermanuallist.php` | `votermenualpay/index.php` | voterautoid, amount |
| `admin/aadharfindlist.php` | `aadhardublicatepay/index.php` | id, amount |
| `admin/panfindlist.php` | `panfindpay/index.php` | id, amount |
| `admin/dlmlist.php` | `dlpay/index.php` | id, amount (**broken**) |
| `admin/aadharlist.php` | `adpay/index.php` | pay_uid, Pay_Amt=1 (**module missing**) |
| `admin/ayousmanreacherge.php` | `paytm/index.php`, `paytms/index.php` | (**modules missing**) |
| `admin/panmanuls.php` | `paytmv/index.php` | (**module missing**) |

### E. Navigation & Wallet-Related UI

| File | Purpose |
|------|---------|
| `admin/userHeader.php` | Nav links to `recharge.php`, `findwallet.php`, `panfindlist.php` |
| `admin/header.php` | Wallet balance button, link to `paymentreq.php` (admin) |
| `admin/panel.php` | Balance checks; redirects to recharge if low |
| `admin/pointtrans.php` | User-to-user wallet transfer (`tbltrans`, `tblptr`) |
| `admin/wallect.php` | Admin wallet transfer between users |
| `refund-policy.php` | Refund/cancellation policy page (static, no processing) |

### F. Shared Configuration

| File | Purpose |
|------|---------|
| `admin/config.php` | MySQL connection (`$connection`) used by all payment callbacks |

### G. Low-Balance Redirects (not payment processors, but payment-adjacent)

These pages redirect users to `findwallet.php` when balance is insufficient:

- `admin/aadhar_info_hkb.php`
- `admin/paninfo.php`
- `admin/aa2.php`
- `admin/Pan_Advance_Detais.php`
- `admin/panmanual.php`
- `admin/dlapp.php`
- `admin/generated_instant.php`
- `admin/voternew.php`
- `admin/DL_Instant_Hd.php`
- `admin/Job_Card_hkb.php`
- `admin/challan_Axen.php`
- `admin/Ration_Pdf_hkb.php`
- `admin/vote_mob_link.php`
- `admin/UidRation.php`
- `admin/ayushman-advance-print.php`
- `admin/generated_h.php`
- `admin/vot_org_instant.php`
- `admin/rc.php`
- `admin/pan_find_instant.php`
- `admin/rc_get.php`
- `admin/DLFind_Axen.php`

---

## Database Tables

No migration/schema files exist. Tables inferred from PHP queries:

| Table | Payment-Related Columns | Used By |
|-------|------------------------|---------|
| `tbluser` | `walletamount`, `findwallet`, `usertype`, `ispaid`, `status` | HBConnect callbacks, Razorpay, service debits |
| `usertable` | `walletamount`, `emailid` | Manual QR approval (`paymentreq.php`) |
| `qrtxn` | `emailid`, `amount`, `txnid`, `upi`, `status`, `date` | Manual QR submissions |
| `tbltrans` | `userid`, `transqty`, `transtype`, `remark` | Wallet transfer ledger |
| `tblptr` | Point transfer records | `pointtrans.php` |
| `usertype` | `type`, `point` | Razorpay recharge plan lookup |
| `panfind` | `payment_status`, `status` | PAN find payments |
| `dlm` | `payment_status` | DL payments |
| `voterauto0` | `payment_status` | Voter manual payments |
| `voterauto2` | `payment_status` | Voter advance payments |
| `aadharmanual` | `payment_status` | Aadhaar manual payments |
| `aadhaarfind` | `payment_status` | Aadhaar find payments |
| `setting` | `baseurl` | Dynamic pay URLs in `ayousmanreacherge.php` |

> **Note:** Two separate wallet systems exist — `tbluser` (HBConnect) and `usertable` (manual QR). This may cause inconsistencies.

---

## Configuration Reference

### HBConnect Config (`lib/Config_HBConnect.php`)

Each module has its own config file with these variables:

```php
$upiuid       = 'paytm.xxxxx@pty';     // Paytm Business UPI ID
$secret       = 'xxxxxxxx';             // HBConnect secret key for checksum
$token        = 'xxxx-xxxx-xxxx';       // HBConnect API token
$orderId      = time();                   // Unique order ID
$txnAmount    = 50;                       // Fixed amount OR $_POST['amount']
$txnNote      = $_GET['id'];              // Record/user reference (returned as sender_note)
$cust_Mobile  = "9940368437";
$cust_Email   = "info@printportalcard.in";
$callback_url = 'https://yourdomain.com/admin/<module>/pgResponse.php';
$RECHPAY_ENVIRONMENT = 'PROD';            // 'PROD' or 'TEST'
$RECHPAY_TXN_URL     = 'https://paytm.indiprintportal.in/order/paytm';
$RECHPAY_STATUS_URL  = 'https://paytm.indiprintportal.in/order/status';
```

### Razorpay Config

Keys are hardcoded in `pay.php` and `response.php` (not read from `config.php`):

```php
$api = new Api('rzp_live_XXXXX', 'SECRET_KEY');
```

---

## How to Migrate to Another Payment Gateway

### Strategy Overview

The codebase has **11 duplicated HBConnect modules** that share the same pattern. Migration involves replacing the gateway-specific logic while keeping the business logic (DB updates) intact.

There are two recommended approaches:

#### Approach A: Replace HBConnect with a New Aggregator (Minimal Change)

If the new gateway uses a similar redirect + callback pattern:

1. Update credentials in all `Config_HBConnect.php` files
2. Update `$RECHPAY_TXN_URL` and `$RECHPAY_STATUS_URL` to new gateway endpoints
3. Replace `RechPayChecksum.php` if the new gateway uses different signing
4. Adapt `index.php` request parameters to match new gateway API
5. Adapt `pgResponse.php` callback parsing to match new gateway response format
6. Update `$callback_url` in each config to your domain

#### Approach B: Migrate to Razorpay / Stripe / PayU (Recommended for Maintainability)

Consolidate all 11 modules into a **single shared payment library**:

1. Create a shared payment module (e.g. `admin/payment/`)
2. Move gateway SDK and config to one place
3. Each service passes metadata (amount, record id, fulfillment callback) to the shared module
4. One callback handler routes to the correct fulfillment logic

### Step-by-Step Migration (Approach B — Razorpay Example)

#### Step 1: Create Shared Payment Module

```
admin/payment/
├── config.php              # Single config with Razorpay keys
├── checkout.php              # Creates order, opens Razorpay modal
├── callback.php              # Verifies payment, routes fulfillment
├── fulfillments/
│   ├── wallet_topup.php    # findwallet += amount
│   ├── account_upgrade.php # usertype + findwallet update
│   ├── panfind.php         # panfind.payment_status=1
│   ├── voter_manual.php    # voterauto0.payment_status=1
│   ├── voter_advance.php   # voterauto2.payment_status=1
│   ├── aadhaar_manual.php  # aadharmanual.payment_status=1
│   ├── aadhaar_find.php    # aadhaarfind.payment_status=1
│   └── dl_service.php      # dlm.payment_status=1
└── lib/
    └── Razorpay.php          # SDK (copy from existing razor/ folder)
```

#### Step 2: Update Entry Point Forms

Change form `action` attributes in list pages to point to the new shared module:

```php
// Before (panfindlist.php):
<form action="panfindpay/index.php?id=...&amount=..." method="post">

// After:
<form action="payment/checkout.php" method="post">
    <input type="hidden" name="fulfillment" value="panfind">
    <input type="hidden" name="record_id" value="...">
    <input type="hidden" name="amount" value="...">
</form>
```

#### Step 3: Implement Callback Verification

For Razorpay, verify the payment signature before fulfilling:

```php
$api = new Api($keyId, $keySecret);
$attributes = [
    'razorpay_order_id'   => $_POST['razorpay_order_id'],
    'razorpay_payment_id' => $_POST['razorpay_payment_id'],
    'razorpay_signature'  => $_POST['razorpay_signature'],
];
$api->utility->verifyPaymentSignature($attributes);
```

#### Step 4: Route Fulfillment

```php
switch ($_POST['fulfillment']) {
    case 'wallet_topup':
        include 'fulfillments/wallet_topup.php';
        break;
    case 'panfind':
        include 'fulfillments/panfind.php';
        break;
    // ... etc
}
```

#### Step 5: Update Callback URLs

Register your callback URL with the new gateway:
- `https://yourdomain.com/admin/payment/callback.php`

#### Step 6: Test Each Payment Flow

Test every entry point listed in [Section D](#d-frontend-entry-points-forms-that-trigger-payments).

#### Step 7: Decommission Old Modules

Once all flows are verified, remove or archive the old HBConnect module folders.

---

## Files to Change (Migration Checklist)

### If Replacing HBConnect with Another Similar Gateway

| # | File(s) | What to Change |
|---|---------|----------------|
| 1 | All 11× `lib/Config_HBConnect.php` | Gateway credentials, URLs, callback URLs |
| 2 | All 11× `lib/RechPayChecksum.php` | Replace if new gateway uses different signing algorithm |
| 3 | All 11× `index.php` | Request parameter names/format for new gateway API |
| 4 | All 11× `pgResponse.php` | Callback parameter parsing, verification logic |
| 5 | `admin/config.php` | Only if DB connection changes |

**No frontend list pages need changes** — they still POST to the same module paths.

### If Migrating to Razorpay / Stripe / PayU (Consolidated)

| # | File(s) | What to Change |
|---|---------|----------------|
| 1 | **NEW** `admin/payment/config.php` | Gateway API keys |
| 2 | **NEW** `admin/payment/checkout.php` | Order creation + checkout UI |
| 3 | **NEW** `admin/payment/callback.php` | Payment verification + fulfillment routing |
| 4 | **NEW** `admin/payment/fulfillments/*.php` | Business logic extracted from each pgResponse.php |
| 5 | `admin/recharge.php` | Update 4 form actions → `payment/checkout.php` |
| 6 | `admin/findwallet.php` | Update form action → `payment/checkout.php` |
| 7 | `admin/aadharmanuallist.php` | Update form action |
| 8 | `admin/voterlist.php` | Update form action |
| 9 | `admin/votermanuallist.php` | Update form action |
| 10 | `admin/aadharfindlist.php` | Update form action |
| 11 | `admin/panfindlist.php` | Update form action |
| 12 | `admin/dlmlist.php` | Update form action |
| 13 | `admin/aadhar4/pgRecharge/razor/pay.php` | Reference for Razorpay integration pattern |
| 14 | `admin/aadhar4/pgRecharge/razor/response.php` | Reference for Razorpay callback pattern |
| 15 | All 11 old module folders | Archive/delete after migration verified |

### If Migrating Manual QR to Automated Gateway

| # | File | What to Change |
|---|------|----------------|
| 1 | `admin/wallet.php` | Replace QR form with gateway checkout redirect |
| 2 | `admin/paymentreq.php` | May become unnecessary (or keep as fallback) |

### Files That Do NOT Need Changes

These files are payment-adjacent but do not interact with any gateway:

- `admin/pointtrans.php` — internal wallet transfers
- `admin/wallect.php` — admin wallet transfers
- `admin/panel.php` — balance display only
- `admin/userHeader.php` — navigation links only
- `refund-policy.php` — static policy page
- All low-balance redirect pages — they redirect to `findwallet.php`, which you would update separately

---

## Known Issues & Broken Links

| Issue | Details |
|-------|---------|
| **Missing modules** | `paytm/`, `paytms/`, `adpay/`, `paytmv/` referenced but do not exist |
| **dlpay missing index.php** | `admin/dlservice/dlpay/` has callback but no checkout entry; `dlmlist.php` links to non-existent `dlpay/index.php` |
| **Wrong callback URL** | `HBConnect/master/lib/Config_HBConnect.php` callback points to `retailer/pgResponse.php` instead of `master/pgResponse.php` |
| **dlpay wrong callback path** | Config points to `/admin/dlpay/pgResponse.php` but file is at `/admin/dlservice/dlpay/pgResponse.php` |
| **Two wallet systems** | `tbluser` (HBConnect) vs `usertable` (manual QR) — inconsistent |
| **Hardcoded credentials** | Gateway secrets, Razorpay live keys, and DB password exposed in source files |
| **No signature verification in Razorpay** | `response.php` does not verify Razorpay payment signature |
| **Razorpay config mismatch** | `config.php` has different keys than `pay.php` |
| **Duplicated code** | Same `RechPayChecksum.php` copied 11 times; same `index.php` pattern duplicated |

---

## Testing Checklist

After any gateway migration, test each payment flow:

- [ ] **Wallet top-up** — `findwallet.php` → pay → `tbluser.findwallet` increases
- [ ] **Retailer upgrade** — `recharge.php` → ₹299 → `usertype='RETAILER'`
- [ ] **Distributor upgrade** — `recharge.php` → ₹999 → `usertype='DISTRIBUTER'`
- [ ] **Master upgrade** — `recharge.php` → ₹1499 → findwallet increases
- [ ] **White label upgrade** — `recharge.php` → ₹2999 → findwallet increases
- [ ] **PAN find payment** — `panfindlist.php` → pay → `panfind.payment_status=1`
- [ ] **Voter manual payment** — `votermanuallist.php` → pay → `voterauto0.payment_status=1`
- [ ] **Voter advance payment** — `voterlist.php` → pay → `voterauto2.payment_status=1`
- [ ] **Aadhaar manual payment** — `aadharmanuallist.php` → pay → `aadharmanual.payment_status=1`
- [ ] **Aadhaar find payment** — `aadharfindlist.php` → pay → `aadhaarfind.payment_status=1`
- [ ] **DL service payment** — `dlmlist.php` → pay → `dlm.payment_status=1`
- [ ] **Payment failure** — cancel payment → user redirected to correct page
- [ ] **Duplicate payment** — paying twice does not double-credit
- [ ] **Manual QR** — `wallet.php` → admin approves in `paymentreq.php` → wallet credited

---

## Quick Reference: Module → Fulfillment Mapping

Use this table when writing fulfillment handlers for a consolidated payment module:

| Fulfillment Key | pgResponse.php Source | SQL on Success |
|----------------|----------------------|----------------|
| `wallet_topup` | `findwalletpay/pgResponse.php` | `UPDATE tbluser SET findwallet=findwallet+'$amt' WHERE userid='$userid'` |
| `retailer` | `HBConnect/retailer/pgResponse.php` | `UPDATE tbluser SET findwallet=299, usertype='RETAILER' WHERE userid=$userid` |
| `distributor` | `HBConnect/distributor/pgResponse.php` | `UPDATE tbluser SET findwallet=999, usertype='DISTRIBUTER' WHERE userid=$userid` |
| `master` | `HBConnect/master/pgResponse.php` | `UPDATE tbluser SET findwallet=findwallet+1499 WHERE userid=$userid` |
| `whitelabel` | `HBConnect/whitelabel/pgResponse.php` | `UPDATE tbluser SET findwallet=findwallet+3000 WHERE userid=$userid` |
| `panfind` | `panfindpay/pgResponse.php` | `UPDATE panfind SET payment_status=1, status='In Progress' WHERE id='$userid'` |
| `voter_manual` | `votermenualpay/pgResponse.php` | `UPDATE voterauto0 SET payment_status=1 WHERE voterautoid='$userid'` |
| `voter_advance` | `voteradvance2/pgResponse.php` | `UPDATE voterauto2 SET payment_status=1 WHERE voterautoid='$userid'` |
| `aadhaar_manual` | `adharmenualpayment/pgResponse.php` | `UPDATE aadharmanual SET payment_status=1 WHERE aadharmanualid='$userid'` |
| `aadhaar_find` | `aadhardublicatepay/pgResponse.php` | `UPDATE aadhaarfind SET payment_status=1 WHERE id='$userid'` |
| `dl_service` | `dlservice/dlpay/pgResponse.php` | `UPDATE dlm SET payment_status=1 WHERE id='$userid'` |









