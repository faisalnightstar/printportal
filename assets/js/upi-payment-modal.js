/**
 * UPI Payment & Real-Time Verification Controller
 */

(function () {
    'use strict';

    var pollTimer = null;
    var currentTxnId = null;

    function getBaseUrl() {
        var path = window.location.pathname;
        if (path.indexOf('/admin') !== -1 || path.indexOf('/dashboard') !== -1) {
            return '../api/payment';
        }
        return 'api/payment';
    }

    window.openUpiRechargeModal = function (defaultAmount) {
        var modalEl = document.getElementById('upiPaymentModal');
        if (!modalEl) {
            console.error('upiPaymentModal element not found');
            return;
        }

        // Reset fields
        var amountInput = document.getElementById('upiRechargeAmount');
        if (amountInput) {
            amountInput.value = defaultAmount || 100;
        }

        resetModalState();

        if (typeof $ !== 'undefined' && typeof $.fn !== 'undefined' && typeof $.fn.modal === 'function') {
            $(modalEl).modal('show');
        } else {
            modalEl.style.display = 'block';
            modalEl.classList.add('show');
            document.body.classList.add('modal-open');
        }
    };

    window.selectPresetAmount = function (amt) {
        var amountInput = document.getElementById('upiRechargeAmount');
        if (amountInput) {
            amountInput.value = amt;
        }
    };

    function resetModalState() {
        if (pollTimer) {
            clearInterval(pollTimer);
            pollTimer = null;
        }
        currentTxnId = null;

        var qrContainer = document.getElementById('upiQrContainer');
        if (qrContainer) {
            qrContainer.innerHTML = '<div class="qr-placeholder"><i class="fa fa-qrcode fa-3x text-muted"></i><p class="mt-2 text-muted">Click "Generate QR Code" to pay</p></div>';
        }

        var statusBadge = document.getElementById('upiPaymentStatusBadge');
        if (statusBadge) {
            statusBadge.className = 'badge badge-secondary p-2';
            statusBadge.innerHTML = 'Awaiting Request';
        }

        var intentBtn = document.getElementById('upiIntentPayBtn');
        if (intentBtn) {
            intentBtn.style.display = 'none';
            intentBtn.href = '#';
        }

        var loader = document.getElementById('upiStatusLoader');
        if (loader) {
            loader.style.display = 'none';
        }

        var generateBtn = document.getElementById('upiGenerateBtn');
        if (generateBtn) {
            generateBtn.disabled = false;
            generateBtn.innerHTML = '<i class="fa fa-flash"></i> Generate Dynamic QR';
        }
    }

    window.generateUpiQrCode = function () {
        var amountInput = document.getElementById('upiRechargeAmount');
        var amount = amountInput ? parseFloat(amountInput.value) : 0;

        if (isNaN(amount) || amount <= 0) {
            alert('Please enter a valid recharge amount greater than 0.');
            return;
        }

        var generateBtn = document.getElementById('upiGenerateBtn');
        if (generateBtn) {
            generateBtn.disabled = true;
            generateBtn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Generating...';
        }

        var apiBase = getBaseUrl();
        var generateUrl = apiBase + '/generate-qr.php';

        var handleSuccess = function (res) {
            if (res && res.status && res.upi_url && res.txn_id) {
                currentTxnId = res.txn_id;
                renderQrCode(res.upi_url, res.txn_id, res.amount);
                startVerificationPolling(res.txn_id);
            } else {
                alert((res && res.message) ? res.message : 'Could not generate UPI QR Code.');
                if (generateBtn) {
                    generateBtn.disabled = false;
                    generateBtn.innerHTML = '<i class="fa fa-flash"></i> Generate Dynamic QR';
                }
            }
        };

        var handleError = function (err) {
            console.error('QR Generation failed:', err);
            alert('Network error while generating QR code. Please try again.');
            if (generateBtn) {
                generateBtn.disabled = false;
                generateBtn.innerHTML = '<i class="fa fa-flash"></i> Generate Dynamic QR';
            }
        };

        if (typeof $ !== 'undefined' && $.ajax) {
            $.ajax({
                url: generateUrl,
                type: 'POST',
                data: { amount: amount },
                dataType: 'json',
                success: handleSuccess,
                error: handleError
            });
        } else {
            fetch(generateUrl, {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: 'amount=' + encodeURIComponent(amount)
            })
                .then(function (r) { return r.json(); })
                .then(handleSuccess)
                .catch(handleError);
        }
    };

    function renderQrCode(upiUrl, txnId, amount) {
        if (!upiUrl || typeof upiUrl !== 'string' || upiUrl.trim() === '') {
            console.error("QR Code Data Error: Received empty or invalid UPI URL string.");
            return;
        }

        var qrContainer = document.getElementById('upiQrContainer');
        if (qrContainer) {
            qrContainer.innerHTML = '';

            if (window.QRCodeGenerator && typeof window.QRCodeGenerator.render === 'function') {
                window.QRCodeGenerator.render(qrContainer, upiUrl, 220);
            } else if (typeof window.QRCode === 'function') {
                // Fix: Fallback safely to standard qrcode.js enumeration levels
                var correctLevel = 1; // Default to M (Medium) level mapping
                if (window.QRCode.CorrectLevel) {
                    correctLevel = window.QRCode.CorrectLevel.M;
                }

                // Fix: Pass pure config layout to satisfy position adjust setups
                new window.QRCode(qrContainer, {
                    text: upiUrl,
                    width: 220,
                    height: 220,
                    correctLevel: correctLevel
                });
            }
        }

        var statusBadge = document.getElementById('upiPaymentStatusBadge');
        if (statusBadge) {
            statusBadge.className = 'badge badge-warning p-2';
            statusBadge.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Waiting for Payment (Scan QR)...';
        }

        var intentBtn = document.getElementById('upiIntentPayBtn');
        if (intentBtn) {
            intentBtn.href = upiUrl;
            intentBtn.style.display = 'inline-block';
        }

        var loader = document.getElementById('upiStatusLoader');
        if (loader) {
            loader.style.display = 'block';
        }

        var generateBtn = document.getElementById('upiGenerateBtn');
        if (generateBtn) {
            generateBtn.disabled = true;
            generateBtn.innerHTML = '<i class="fa fa-check"></i> QR Code Active';
        }
    }



    var countdownTimer = null;

    function startVerificationPolling(txnId) {
        if (pollTimer) clearInterval(pollTimer);
        if (countdownTimer) clearInterval(countdownTimer);

        var apiBase = getBaseUrl();
        var verifyUrl = apiBase + '/verify-status.php';
        var expirySeconds = 600; // 10 minutes
        var remaining = expirySeconds;

        // Start countdown display
        countdownTimer = setInterval(function () {
            remaining--;
            var mins = Math.floor(remaining / 60);
            var secs = remaining % 60;
            var label = mins + ':' + (secs < 10 ? '0' : '') + secs;

            var statusBadge = document.getElementById('upiPaymentStatusBadge');
            if (statusBadge) {
                statusBadge.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Waiting for payment... (' + label + ')';
            }

            if (remaining <= 0) {
                clearInterval(countdownTimer);
                clearInterval(pollTimer);
                countdownTimer = null;
                pollTimer = null;
                onPaymentExpired();
            }
        }, 1000);

        // Poll Paytm every 5 seconds (avoid rate-limiting)
        pollTimer = setInterval(function () {
            if (!txnId) return;

            var handleVerifyRes = function (res) {
                if (!res) return;
                if (res.status === 'paid') {
                    clearInterval(pollTimer);
                    clearInterval(countdownTimer);
                    pollTimer = null;
                    countdownTimer = null;
                    onPaymentSuccess(res);
                } else if (res.status === 'failed') {
                    clearInterval(pollTimer);
                    clearInterval(countdownTimer);
                    pollTimer = null;
                    countdownTimer = null;
                    onPaymentFailed(res);
                } else if (res.status === 'expired') {
                    clearInterval(pollTimer);
                    clearInterval(countdownTimer);
                    pollTimer = null;
                    countdownTimer = null;
                    onPaymentExpired();
                }
                // 'pending' → do nothing, keep polling
            };

            if (typeof $ !== 'undefined' && $.ajax) {
                $.ajax({
                    url: verifyUrl,
                    type: 'POST',
                    data: { txn_id: txnId },
                    dataType: 'json',
                    success: handleVerifyRes,
                    error: function () { } // network errors: silently retry
                });
            } else {
                fetch(verifyUrl, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: 'txn_id=' + encodeURIComponent(txnId)
                })
                    .then(function (r) { return r.json(); })
                    .then(handleVerifyRes)
                    .catch(function () { }); // silently retry on network error
            }
        }, 50000); // poll every 5 seconds
    }

    function onPaymentSuccess(res) {
        var statusBadge = document.getElementById('upiPaymentStatusBadge');
        if (statusBadge) {
            statusBadge.className = 'badge badge-success p-2';
            statusBadge.innerHTML = '<i class="fa fa-check-circle"></i> Payment Verified! Wallet Credited.';
        }

        var loader = document.getElementById('upiStatusLoader');
        if (loader) {
            loader.style.display = 'none';
        }

        if (typeof Swal !== 'undefined') {
            Swal.fire({
                icon: 'success',
                title: 'Payment Successful!',
                text: 'Your wallet has been automatically credited.',
                timer: 3000,
                showConfirmButton: false
            });
        } else {
            alert('🎉 Payment Verified Successfully! Your wallet balance has been updated.');
        }

        setTimeout(function () {
            var modalEl = document.getElementById('upiPaymentModal');
            if (typeof $ !== 'undefined' && typeof $.fn !== 'undefined' && typeof $.fn.modal === 'function') {
                $(modalEl).modal('hide');
            } else if (modalEl) {
                modalEl.style.display = 'none';
                modalEl.classList.remove('show');
                document.body.classList.remove('modal-open');
            }

            var balanceEl = document.getElementById('userWalletBalance');
            if (balanceEl && res.new_balance !== undefined) {
                balanceEl.innerHTML = '₹' + parseFloat(res.new_balance).toFixed(2);
            } else {
                window.location.reload();
            }
        }, 2000);
    }


    function onPaymentFailed(res) {
        var statusBadge = document.getElementById('upiPaymentStatusBadge');
        if (statusBadge) {
            statusBadge.className = 'badge badge-danger p-2';
            statusBadge.innerHTML = '<i class="fa fa-times-circle"></i> Payment Declined';
        }
        var loader = document.getElementById('upiStatusLoader');
        if (loader) loader.style.display = 'none';

        var generateBtn = document.getElementById('upiGenerateBtn');
        if (generateBtn) {
            generateBtn.disabled = false;
            generateBtn.innerHTML = '<i class="fa fa-refresh"></i> Generate New QR';
        }

        if (typeof Swal !== 'undefined') {
            Swal.fire({ icon: 'error', title: 'Payment Declined', text: res.message || 'The payment was declined. Please try again.' });
        } else {
            alert('Payment declined: ' + (res.message || 'Please try again.'));
        }
    }

    function onPaymentExpired() {
        var statusBadge = document.getElementById('upiPaymentStatusBadge');
        if (statusBadge) {
            statusBadge.className = 'badge badge-warning p-2';
            statusBadge.innerHTML = '<i class="fa fa-clock-o"></i> QR Code Expired';
        }
        var loader = document.getElementById('upiStatusLoader');
        if (loader) loader.style.display = 'none';

        var generateBtn = document.getElementById('upiGenerateBtn');
        if (generateBtn) {
            generateBtn.disabled = false;
            generateBtn.innerHTML = '<i class="fa fa-refresh"></i> Generate New QR';
        }

        if (typeof Swal !== 'undefined') {
            Swal.fire({ icon: 'warning', title: 'QR Expired', text: 'Your payment window expired (10 min). Please generate a new QR code.' });
        } else {
            alert('QR code expired. Please generate a new one.');
        }
    }

    function initListeners() {
        if (typeof $ !== 'undefined') {
            $('#upiPaymentModal').on('hidden.bs.modal', function () {
                if (pollTimer) { clearInterval(pollTimer); pollTimer = null; }
                if (countdownTimer) { clearInterval(countdownTimer); countdownTimer = null; }
            });
        }
    }

    if (document.readyState === 'complete' || document.readyState === 'interactive') {
        initListeners();
    } else {
        document.addEventListener('DOMContentLoaded', initListeners);
    }

})();
