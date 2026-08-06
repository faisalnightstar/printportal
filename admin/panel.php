<?php include('userHeader.php'); ?>  
<?php
if ($fetch['findwallet'] < 100) { ?>
    <script>
      alert("Dear User, please recharge your wallet to continue accessing all services.");
      window.location.href = "../admin/recharge.php";
    </script>
<?php } ?>

<!-- Workspace Container -->
<div class="space-y-6">

    <!-- Announcement Alert Banner -->
    <div class="p-4 rounded-2xl bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 text-white shadow-md shadow-blue-500/10 flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-white/20 backdrop-blur-md flex items-center justify-center text-white flex-shrink-0">
                <i data-lucide="bell" class="w-5 h-5"></i>
            </div>
            <div>
                <h3 class="font-bold text-sm">Welcome back, <?php echo htmlspecialchars($rw['fullname']); ?>!</h3>
                <p class="text-xs text-blue-100 mt-0.5">Automated UPI QR Recharge is active. Instantly top up your balance with 0% extra fees.</p>
            </div>
        </div>
        <div class="flex items-center gap-2">
            <a href="findwallet.php" class="px-4 py-2 bg-white text-blue-600 hover:bg-blue-50 font-semibold text-xs rounded-xl shadow-xs transition-colors whitespace-nowrap">
                Top-Up Wallet
            </a>
            <a href="recharge.php" class="px-4 py-2 bg-blue-700/60 hover:bg-blue-700 text-white font-semibold text-xs rounded-xl transition-colors whitespace-nowrap">
                View Plans
            </a>
        </div>
    </div>

    <!-- Quick Services Ribbon -->
    <div class="bg-white border border-slate-200 rounded-2xl p-4 shadow-sm">
        <div class="flex items-center justify-between mb-3">
            <h4 class="text-xs font-bold uppercase tracking-wider text-slate-500 flex items-center gap-2">
                <i data-lucide="sparkles" class="w-4 h-4 text-amber-500"></i> Government & Partner Services
            </h4>
            <span class="text-[10px] bg-slate-100 text-slate-600 font-semibold px-2 py-0.5 rounded-full">External Portals</span>
        </div>
        <div class="flex flex-wrap gap-2">
            <a href="https://pmny.in/YIuosJVge4qI" target="_blank" class="px-3 py-1.5 bg-slate-100 hover:bg-blue-50 text-slate-700 hover:text-blue-700 font-medium text-xs rounded-xl border border-slate-200 transition-colors flex items-center gap-1.5">
                <i data-lucide="check-circle-2" class="w-3.5 h-3.5 text-blue-600"></i> CSC Approval
            </a>
            <a href="https://forms.gle/UC1Yz8et9oYimFqcA" target="_blank" class="px-3 py-1.5 bg-slate-100 hover:bg-blue-50 text-slate-700 hover:text-blue-700 font-medium text-xs rounded-xl border border-slate-200 transition-colors flex items-center gap-1.5">
                <i data-lucide="user-check" class="w-3.5 h-3.5 text-indigo-600"></i> CSC Operator ID (₹499)
            </a>
            <a href="http://www.cscentrepreneur.in/add_vle" target="_blank" class="px-3 py-1.5 bg-slate-100 hover:bg-blue-50 text-slate-700 hover:text-blue-700 font-medium text-xs rounded-xl border border-slate-200 transition-colors flex items-center gap-1.5">
                <i data-lucide="award" class="w-3.5 h-3.5 text-amber-600"></i> TEC Certificate
            </a>
            <a href="https://myaadhaar.uidai.gov.in/" target="_blank" class="px-3 py-1.5 bg-slate-100 hover:bg-blue-50 text-slate-700 hover:text-blue-700 font-medium text-xs rounded-xl border border-slate-200 transition-colors flex items-center gap-1.5">
                <i data-lucide="shield-check" class="w-3.5 h-3.5 text-emerald-600"></i> Aadhaar Login
            </a>
            <a href="https://pmkisan.gov.in/" target="_blank" class="px-3 py-1.5 bg-slate-100 hover:bg-blue-50 text-slate-700 hover:text-blue-700 font-medium text-xs rounded-xl border border-slate-200 transition-colors flex items-center gap-1.5">
                <i data-lucide="sprout" class="w-3.5 h-3.5 text-green-600"></i> PM-Kisan Portal
            </a>
        </div>
    </div>

    <!-- KPI Metric Cards Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        
        <!-- Total Balance KPI Card -->
        <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Total Balance</span>
                <div class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center">
                    <i data-lucide="indian-rupee" class="w-5 h-5"></i>
                </div>
            </div>
            <div class="mt-4">
                <h2 class="text-2xl font-bold text-slate-900">
                    <?php echo ($fetch['ustatus'] == 1) ? 'Unlimited' : '₹' . number_format((float)$rw['findwallet'], 2); ?>
                </h2>
                <p class="text-xs text-emerald-600 font-medium mt-1 flex items-center gap-1">
                    <i data-lucide="trending-up" class="w-3.5 h-3.5"></i> Active Wallet Status
                </p>
            </div>
        </div>

        <!-- Account Level / Role Card -->
        <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Account Type</span>
                <div class="w-9 h-9 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">
                    <i data-lucide="shield" class="w-5 h-5"></i>
                </div>
            </div>
            <div class="mt-4">
                <h2 class="text-2xl font-bold text-slate-900 uppercase">
                    <?php echo htmlspecialchars($fetch['usertype']); ?>
                </h2>
                <p class="text-xs text-blue-600 font-medium mt-1 flex items-center gap-1">
                    <i data-lucide="check-circle" class="w-3.5 h-3.5"></i> Verified Access Level
                </p>
            </div>
        </div>

        <?php if ($_SESSION['usertype'] == "ADMIN") { ?>
        <!-- Admin Statistics: Master Admins -->
        <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Master Admins</span>
                <div class="w-9 h-9 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center">
                    <i data-lucide="user-check" class="w-5 h-5"></i>
                </div>
            </div>
            <div class="mt-4">
                <?php 
                    $rr = mysqli_query($connection, "SELECT count(*) as cnt FROM tbluser where usertype='MASTER ADMIN'");
                    $rorw = mysqli_fetch_assoc($rr);
                ?>
                <h2 class="text-2xl font-bold text-slate-900"><?php echo $rorw['cnt']; ?></h2>
                <p class="text-xs text-purple-600 font-medium mt-1">Total System Administrators</p>
            </div>
        </div>

        <!-- Admin Statistics: Total Retailers -->
        <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Total Retailers</span>
                <div class="w-9 h-9 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center">
                    <i data-lucide="users" class="w-5 h-5"></i>
                </div>
            </div>
            <div class="mt-4">
                <?php 
                    $rr2 = mysqli_query($connection, "SELECT count(*) as cnt FROM tbluser where usertype='RETAILER'");
                    $rorw2 = mysqli_fetch_assoc($rr2);
                ?>
                <h2 class="text-2xl font-bold text-slate-900"><?php echo $rorw2['cnt']; ?></h2>
                <p class="text-xs text-amber-600 font-medium mt-1">Active Retail Accounts</p>
            </div>
        </div>
        <?php } else { ?>

        <!-- Service Status Card -->
        <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Service Status</span>
                <div class="w-9 h-9 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center">
                    <i data-lucide="activity" class="w-5 h-5"></i>
                </div>
            </div>
            <div class="mt-4">
                <h2 class="text-2xl font-bold text-emerald-600">Online</h2>
                <p class="text-xs text-slate-500 font-medium mt-1">All Print API Endpoints Operational</p>
            </div>
        </div>

        <!-- Quick Top-Up Action -->
        <div class="bg-gradient-to-br from-slate-900 to-slate-800 text-white rounded-2xl p-5 shadow-md flex flex-col justify-between">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Quick Recharge</span>
                <p class="text-sm font-semibold mt-1">Scan UPI QR Code for instant wallet credit</p>
            </div>
            <button onclick="openUpiRechargeModal(100)" class="mt-4 w-full py-2 bg-emerald-500 hover:bg-emerald-600 text-white font-bold text-xs rounded-xl shadow-sm transition-colors flex items-center justify-center gap-1.5">
                <i data-lucide="qrcode" class="w-4 h-4"></i> Open QR Scanner
            </button>
        </div>
        <?php } ?>

    </div>

    <!-- Main Service Hub Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <!-- Popular Services Section -->
        <div class="lg:col-span-2 bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">
            <h3 class="text-base font-bold text-slate-900 mb-4 flex items-center gap-2">
                <i data-lucide="grid" class="w-5 h-5 text-blue-600"></i> Core Document Services
            </h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <a href="pan_find_instant.php" class="p-4 rounded-xl border border-slate-200 hover:border-blue-500 hover:shadow-md transition-all group bg-slate-50/50">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center group-hover:scale-105 transition-transform">
                            <i data-lucide="search" class="w-5 h-5"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-sm text-slate-900 group-hover:text-blue-600 transition-colors">Instant PAN Find</h4>
                            <p class="text-xs text-slate-500">Find PAN number via Aadhaar</p>
                        </div>
                    </div>
                </a>

                <a href="aadharfindlist.php" class="p-4 rounded-xl border border-slate-200 hover:border-blue-500 hover:shadow-md transition-all group bg-slate-50/50">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-indigo-100 text-indigo-600 flex items-center justify-center group-hover:scale-105 transition-transform">
                            <i data-lucide="credit-card" class="w-5 h-5"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-sm text-slate-900 group-hover:text-blue-600 transition-colors">Aadhaar PDF Print</h4>
                            <p class="text-xs text-slate-500">Duplicate Aadhaar card generator</p>
                        </div>
                    </div>
                </a>

                <a href="voterlist.php" class="p-4 rounded-xl border border-slate-200 hover:border-blue-500 hover:shadow-md transition-all group bg-slate-50/50">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-purple-100 text-purple-600 flex items-center justify-center group-hover:scale-105 transition-transform">
                            <i data-lucide="check-square" class="w-5 h-5"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-sm text-slate-900 group-hover:text-blue-600 transition-colors">Voter Advance Print</h4>
                            <p class="text-xs text-slate-500">Official voter EPIC card search</p>
                        </div>
                    </div>
                </a>

                <a href="dlmlist.php" class="p-4 rounded-xl border border-slate-200 hover:border-blue-500 hover:shadow-md transition-all group bg-slate-50/50">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-rose-100 text-rose-600 flex items-center justify-center group-hover:scale-105 transition-transform">
                            <i data-lucide="car" class="w-5 h-5"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-sm text-slate-900 group-hover:text-blue-600 transition-colors">Driving License Print</h4>
                            <p class="text-xs text-slate-500">DL card verification & HD print</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Support & Quick Tools Sidebar Widget -->
        <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm flex flex-col justify-between">
            <div>
                <h3 class="text-base font-bold text-slate-900 mb-2 flex items-center gap-2">
                    <i data-lucide="help-circle" class="w-5 h-5 text-indigo-600"></i> Need Assistance?
                </h3>
                <p class="text-xs text-slate-600 leading-relaxed">
                    Our support team is available 24/7. Watch training video tutorials or reach out via WhatsApp for instant technical help.
                </p>

                <div class="mt-4 space-y-2">
                    <a href="https://www.youtube.com/@mybestprint1439" target="_blank" class="w-full py-2 px-3 bg-red-50 hover:bg-red-100 text-red-700 font-semibold text-xs rounded-xl border border-red-200 flex items-center justify-center gap-2 transition-colors">
                        <i data-lucide="youtube" class="w-4 h-4 text-red-600"></i> Watch YouTube Tutorials
                    </a>
                    <a href="https://chat.whatsapp.com/HxizVuAJugJHCcsUXb29BU" target="_blank" class="w-full py-2 px-3 bg-emerald-50 hover:bg-emerald-100 text-emerald-700 font-semibold text-xs rounded-xl border border-emerald-200 flex items-center justify-center gap-2 transition-colors">
                        <i data-lucide="message-square" class="w-4 h-4 text-emerald-600"></i> Join WhatsApp Support
                    </a>
                </div>
            </div>

            <div class="pt-4 mt-6 border-t border-slate-100 flex items-center justify-between text-xs text-slate-400">
                <span>System Version v2.5</span>
                <span class="flex items-center gap-1 text-emerald-600 font-semibold">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span> Systems Active
                </span>
            </div>
        </div>

    </div>

</div>

<?php include('upi_recharge_modal.php'); ?>
<?php include('userFooter.php'); ?>
