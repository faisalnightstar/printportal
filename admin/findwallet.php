<?php
if (file_exists(__DIR__ . '/userHeader.php')) {
    include_once(__DIR__ . '/userHeader.php');
} elseif (file_exists(__DIR__ . '/../admin/userHeader.php')) {
    include_once(__DIR__ . '/../admin/userHeader.php');
} else {
    @include_once('userHeader.php');
}
?>

<div class="max-w-4xl mx-auto space-y-6">

    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Add Money to Wallet</h1>
            <p class="text-xs text-slate-500 mt-1">Instant, automated 0% fee wallet recharge via dynamic UPI QR Code
                scanning.</p>
        </div>
        <div class="flex items-center gap-2">
            <span
                class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-emerald-50 text-emerald-700 text-xs font-semibold border border-emerald-200">
                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span> Paytm Real-Time Verification
                Active
            </span>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- Recharge Form Card -->
        <div class="lg:col-span-2 bg-white border border-slate-200 rounded-2xl p-6 shadow-sm space-y-6">

            <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                <div>
                    <h3 class="font-bold text-sm text-slate-900">Recharge Amount</h3>
                    <p class="text-xs text-slate-500">Minimum balance addition is ₹100</p>
                </div>
                <img src="https://www.logo.wine/a/logo/Paytm/Paytm-Logo.wine.svg" alt="Paytm" class="h-8 w-auto">
            </div>

            <!-- User Account Details Summary -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 bg-slate-50 p-4 rounded-xl border border-slate-100">
                <div>
                    <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Account Email</span>
                    <p class="text-xs font-semibold text-slate-800 truncate">
                        
                        <?php echo htmlspecialchars($rw['emailid']); ?></p>
                </div>
                <div>
                    <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Registered Mobile</span>
                    <p class="text-xs font-semibold text-slate-800"><?php echo htmlspecialchars($rw['mobileno']); ?></p>
                </div>
            </div>

            <!-- Interactive Recharge Form -->
            <form
                onsubmit="event.preventDefault(); openUpiRechargeModal(document.getElementById('amount').value || 100);"
                class="space-y-4">
                <input type="hidden" name="userid" value="<?php echo $_SESSION['userid']; ?>">
                <input type="hidden" name="emailid" value="<?php echo htmlspecialchars($rw['emailid']); ?>">
                <input type="hidden" name="phone" value="<?php echo htmlspecialchars($rw['mobileno']); ?>">

                <div class="space-y-2">
                    <label for="amount" class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Enter
                        Amount (₹)</label>
                    <div class="relative rounded-xl shadow-xs">
                        <div
                            class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 font-bold">
                            ₹
                        </div>
                        <input type="number" min="1" step="1" id="amount" name="amount" required value="1"
                            placeholder="ENTER AMOUNT HERE"
                            class="block w-full pl-8 pr-4 py-3 text-base font-bold text-slate-900 bg-white border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                    </div>
                </div>

                <!-- Fast Preset Pills -->
                <div class="space-y-1.5">
                    <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Quick Select
                        Amount:</span>
                    <div class="flex flex-wrap gap-2">
                        <button type="button" onclick="document.getElementById('amount').value = 100;"
                            class="px-3 py-1.5 bg-slate-100 hover:bg-blue-50 hover:text-blue-600 text-slate-700 text-xs font-bold rounded-xl border border-slate-200 transition-colors">₹100</button>
                        <button type="button" onclick="document.getElementById('amount').value = 299;"
                            class="px-3 py-1.5 bg-slate-100 hover:bg-blue-50 hover:text-blue-600 text-slate-700 text-xs font-bold rounded-xl border border-slate-200 transition-colors">₹299</button>
                        <button type="button" onclick="document.getElementById('amount').value = 500;"
                            class="px-3 py-1.5 bg-slate-100 hover:bg-blue-50 hover:text-blue-600 text-slate-700 text-xs font-bold rounded-xl border border-slate-200 transition-colors">₹500</button>
                        <button type="button" onclick="document.getElementById('amount').value = 999;"
                            class="px-3 py-1.5 bg-slate-100 hover:bg-blue-50 hover:text-blue-600 text-slate-700 text-xs font-bold rounded-xl border border-slate-200 transition-colors">₹999</button>
                        <button type="button" onclick="document.getElementById('amount').value = 1499;"
                            class="px-3 py-1.5 bg-slate-100 hover:bg-blue-50 hover:text-blue-600 text-slate-700 text-xs font-bold rounded-xl border border-slate-200 transition-colors">₹1499</button>
                        <button type="button" onclick="document.getElementById('amount').value = 2999;"
                            class="px-3 py-1.5 bg-slate-100 hover:bg-blue-50 hover:text-blue-600 text-slate-700 text-xs font-bold rounded-xl border border-slate-200 transition-colors">₹2999</button>
                    </div>
                </div>

                <button type="submit"
                    class="w-full py-3.5 px-4 bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700 text-white font-bold text-sm rounded-xl shadow-md shadow-emerald-500/20 transition-all flex items-center justify-center gap-2">
                    <i data-lucide="qr-code" class="w-5 h-5"></i> Generate Dynamic UPI QR Code
                </button>
            </form>

        </div>

        <!-- Information & Instructions Card -->
        <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm flex flex-col justify-between space-y-4">
            <div>
                <h3 class="font-bold text-sm text-slate-900 mb-3 flex items-center gap-2">
                    <i data-lucide="shield-check" class="w-4 h-4 text-emerald-600"></i> How it works
                </h3>

                <ul class="space-y-3 text-xs text-slate-600">
                    <li class="flex items-start gap-2">
                        <span
                            class="w-5 h-5 rounded-full bg-blue-100 text-blue-600 font-bold flex items-center justify-center text-[10px] flex-shrink-0 mt-0.5">1</span>
                        <span>Enter your desired recharge amount and click <strong>Generate Dynamic UPI QR
                                Code</strong>.</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <span
                            class="w-5 h-5 rounded-full bg-blue-100 text-blue-600 font-bold flex items-center justify-center text-[10px] flex-shrink-0 mt-0.5">2</span>
                        <span>Scan the QR code with GPay, PhonePe, Paytm, BHIM or click <strong>Open UPI App</strong> on
                            mobile.</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <span
                            class="w-5 h-5 rounded-full bg-blue-100 text-blue-600 font-bold flex items-center justify-center text-[10px] flex-shrink-0 mt-0.5">3</span>
                        <span>Once paid, Paytm Order Status API auto-verifies your payment within 3 seconds and credits
                            your wallet balance.</span>
                    </li>
                </ul>
            </div>

            <div class="p-3 bg-slate-50 rounded-xl border border-slate-100 text-[11px] text-slate-500">
                <p class="font-semibold text-slate-700 mb-0.5"><i data-lucide="lock"
                        class="w-3.5 h-3.5 inline text-emerald-600"></i> 100% Encrypted & Safe</p>
                <span>Transactions are locked using row-level database transactions to guarantee zero duplicate
                    charges.</span>
            </div>
        </div>

    </div>

</div>

<?php
if (file_exists(__DIR__ . '/upi_recharge_modal.php')) {
    include_once(__DIR__ . '/upi_recharge_modal.php');
} elseif (file_exists(__DIR__ . '/../admin/upi_recharge_modal.php')) {
    include_once(__DIR__ . '/../admin/upi_recharge_modal.php');
} else {
    @include_once('upi_recharge_modal.php');
}

if (file_exists(__DIR__ . '/userFooter.php')) {
    include_once(__DIR__ . '/userFooter.php');
} elseif (file_exists(__DIR__ . '/../admin/userFooter.php')) {
    include_once(__DIR__ . '/../admin/userFooter.php');
} else {
    @include_once('userFooter.php');
}
?>