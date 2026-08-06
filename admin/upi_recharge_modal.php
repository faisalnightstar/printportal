<!-- UPI QR Payment & Real-Time Recharge Modal -->
<div class="modal fade" id="upiPaymentModal" tabindex="-1" role="dialog" aria-labelledby="upiPaymentModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 16px; overflow: hidden;">
            <div class="modal-header text-white" style="background: linear-gradient(135deg, #111827 0%, #1f2937 100%);">
                <h5 class="modal-title d-flex align-items-center font-weight-bold" id="upiPaymentModalLabel">
                    <img src="https://www.logo.wine/a/logo/Paytm/Paytm-Logo.wine.svg" alt="Paytm / UPI" style="height: 32px; width: auto; background: white; border-radius: 4px; padding: 2px; margin-right: 10px;">
                    Instant UPI QR Recharge
                </h5>
                <button type="button" class="close text-white opacity-100" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4" style="background-color: #f9fafb;">

                <!-- Amount Selection Section -->
                <div class="form-group mb-3">
                    <label class="font-weight-bold text-dark mb-1">Enter Recharge Amount (₹):</label>
                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text font-weight-bold bg-white text-primary border-right-0">₹</span>
                        </div>
                        <input type="number" class="form-control font-weight-bold text-dark border-left-0" id="upiRechargeAmount" min="1" step="1" value="100" placeholder="e.g. 500">
                    </div>
                </div>

                <!-- Quick Package Presets -->
                <div class="mb-3">
                    <small class="text-muted d-block mb-2 font-weight-bold">Select Preset Package:</small>
                    <div class="d-flex flex-wrap gap-2 justify-content-between">
                        <button type="button" class="btn btn-outline-primary btn-sm rounded-pill font-weight-bold px-3 py-1 mb-1" onclick="selectPresetAmount(100)">₹100</button>
                        <button type="button" class="btn btn-outline-primary btn-sm rounded-pill font-weight-bold px-3 py-1 mb-1" onclick="selectPresetAmount(299)">₹299 (Retailer)</button>
                        <button type="button" class="btn btn-outline-primary btn-sm rounded-pill font-weight-bold px-3 py-1 mb-1" onclick="selectPresetAmount(500)">₹500</button>
                        <button type="button" class="btn btn-outline-primary btn-sm rounded-pill font-weight-bold px-3 py-1 mb-1" onclick="selectPresetAmount(999)">₹999 (Distributor)</button>
                        <button type="button" class="btn btn-outline-primary btn-sm rounded-pill font-weight-bold px-3 py-1 mb-1" onclick="selectPresetAmount(1499)">₹1499 (Master)</button>
                    </div>
                </div>

                <!-- Action Button -->
                <button type="button" id="upiGenerateBtn" class="btn btn-primary btn-block btn-lg font-weight-bold shadow-sm mb-3" style="border-radius: 10px; background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);" onclick="generateUpiQrCode()">
                    <i class="fa fa-qrcode"></i> Generate Dynamic QR Code
                </button>

                <hr class="my-3">

                <!-- Dynamic QR Display Container -->
                <div class="text-center p-3 rounded bg-white border shadow-sm position-relative">
                    <div id="upiQrContainer" class="d-flex justify-content-center align-items-center" style="min-height: 220px;">
                        <div class="text-muted py-4">
                            <i class="fa fa-qrcode fa-4x text-secondary opacity-50 mb-2"></i>
                            <p class="mb-0 font-weight-bold">Scan with GPay, PhonePe, Paytm or any UPI App</p>
                        </div>
                    </div>

                    <!-- Real-Time Polling Indicator -->
                    <div id="upiStatusLoader" class="mt-2" style="display: none;">
                        <div class="d-flex align-items-center justify-content-center text-primary font-weight-bold">
                            <div class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></div>
                            <span>Auto-verifying payment status every 3s...</span>
                        </div>
                    </div>

                    <div class="mt-2">
                        <span id="upiPaymentStatusBadge" class="badge badge-secondary p-2 font-weight-bold" style="font-size: 0.9rem;">
                            Awaiting Payment Generation
                        </span>
                    </div>

                    <!-- Direct Mobile App Intent Button -->
                    <div class="mt-3">
                        <a id="upiIntentPayBtn" href="#" class="btn btn-success btn-sm font-weight-bold px-4 py-2 rounded-pill shadow-sm" style="display: none;">
                            <i class="fa fa-mobile-phone fa-lg"></i> Open UPI App on Mobile
                        </a>
                    </div>
                </div>

                <div class="mt-3 text-center">
                    <small class="text-muted"><i class="fa fa-lock"></i> Secured via Paytm Instant Order Status Verification</small>
                </div>

            </div>
            <div class="modal-footer bg-light py-2 px-3">
                <button type="button" class="btn btn-secondary font-weight-bold px-4" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Load Scripts with Fallback relative paths -->
<script src="../assets/js/qrcode.min.js"></script>
<script src="../assets/js/upi-payment-modal.js"></script>
<script>
    if (typeof window.openUpiRechargeModal !== 'function') {
        var s1 = document.createElement('script'); s1.src = 'assets/js/qrcode.min.js'; document.head.appendChild(s1);
        var s2 = document.createElement('script'); s2.src = 'assets/js/upi-payment-modal.js'; document.head.appendChild(s2);
    }
</script>
