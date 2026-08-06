<?php 
include('userHeader.php'); 
?>

<!-- Tailwind CSS & Lucide Icons for High-Contrast Responsive Layout -->
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://unpkg.com/lucide@latest"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof lucide !== 'undefined') { lucide.createIcons(); }
    });
</script>

<style>
    /* High contrast text overrides for AdminLTE template integration */
    .recharge-wrapper { color: #0f172a !important; font-family: inherit; }
    .plan-card { background-color: #ffffff !important; border: 1px solid #cbd5e1 !important; color: #0f172a !important; }
    .plan-title { color: #0f172a !important; font-weight: 800 !important; }
    .plan-price { color: #0f172a !important; font-weight: 800 !important; }
    .plan-desc { color: #475569 !important; }
    .plan-feature { color: #334155 !important; font-weight: 500; }
</style>

<div class="recharge-wrapper max-w-7xl mx-auto space-y-6 py-4 px-2">

    <!-- Header Section -->
    <div class="text-center max-w-3xl mx-auto space-y-2 mb-6">
        <span class="inline-block px-3 py-1 bg-blue-100 text-blue-700 text-xs font-extrabold rounded-full uppercase tracking-wider">Account Upgrade & Plans</span>
        <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Choose Your Access Tier</h1>
        <p class="text-xs text-slate-600 font-medium">Recharge your portal account instantly using dynamic UPI QR codes. Instant automated activation.</p>
    </div>

    <!-- Pricing Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 pt-2">
        
        <!-- Retailer Plan (₹299) -->
        <div class="plan-card rounded-2xl p-6 shadow-sm hover:shadow-lg transition-all flex flex-col justify-between relative overflow-hidden group">
            <div class="space-y-4">
                <div class="flex items-center justify-between">
                    <h3 class="plan-title text-lg font-bold">Retailer</h3>
                    <span class="px-2.5 py-0.5 rounded-full bg-slate-100 text-slate-700 text-[11px] font-bold border border-slate-200">Personal Use</span>
                </div>
                <div class="flex items-baseline">
                    <span class="plan-price text-3xl">₹299</span>
                    <span class="text-xs text-slate-500 font-medium ml-1">/ one-time</span>
                </div>
                <p class="plan-desc text-xs border-b border-slate-200 pb-4">Ideal for personal print jobs & individual service access.</p>
                
                <ul class="space-y-2.5 text-xs plan-feature">
                    <li class="flex items-center gap-2">
                        <i data-lucide="check-circle" class="w-4 h-4 text-emerald-600 flex-shrink-0"></i>
                        <span><strong class="text-slate-900">400 Points</strong> credited</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i data-lucide="check-circle" class="w-4 h-4 text-emerald-600 flex-shrink-0"></i>
                        <span>Aadhaar Card Search</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i data-lucide="check-circle" class="w-4 h-4 text-emerald-600 flex-shrink-0"></i>
                        <span>PAN Find Service</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i data-lucide="check-circle" class="w-4 h-4 text-emerald-600 flex-shrink-0"></i>
                        <span>Advance Voter Card</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i data-lucide="check-circle" class="w-4 h-4 text-emerald-600 flex-shrink-0"></i>
                        <span>24/7 Priority Support</span>
                    </li>
                </ul>
            </div>

            <button onclick="openUpiRechargeModal(299)" class="mt-6 w-full py-3 bg-slate-900 hover:bg-slate-800 text-white font-bold text-xs rounded-xl shadow-sm transition-colors flex items-center justify-center gap-1.5 cursor-pointer">
                <i data-lucide="qrcode" class="w-4 h-4"></i> Recharge ₹299
            </button>
        </div>

        <!-- Distributor Plan (₹999) - Highlighted -->
        <div class="bg-gradient-to-b from-blue-900 to-slate-900 text-white border-2 border-blue-500 rounded-2xl p-6 shadow-md hover:shadow-xl transition-all flex flex-col justify-between relative overflow-hidden group">
            <div class="absolute top-3 right-3">
                <span class="px-2.5 py-0.5 rounded-full bg-blue-500 text-white text-[10px] font-extrabold shadow-sm uppercase tracking-wider">Popular</span>
            </div>

            <div class="space-y-4">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-extrabold text-white">Distributor</h3>
                </div>
                <div class="flex items-baseline">
                    <span class="text-3xl font-extrabold text-white">₹999</span>
                    <span class="text-xs text-blue-200 font-medium ml-1">/ one-time</span>
                </div>
                <p class="text-xs text-blue-200 border-b border-blue-800/80 pb-4">Create unlimited retailer accounts & offer CSC services.</p>
                
                <ul class="space-y-2.5 text-xs text-blue-100">
                    <li class="flex items-center gap-2">
                        <i data-lucide="check-circle" class="w-4 h-4 text-blue-400 flex-shrink-0"></i>
                        <span><strong class="text-white">19,999 Points</strong> credited</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i data-lucide="check-circle" class="w-4 h-4 text-blue-400 flex-shrink-0"></i>
                        <span>Create <strong class="text-white">Unlimited Retailers</strong></span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i data-lucide="check-circle" class="w-4 h-4 text-blue-400 flex-shrink-0"></i>
                        <span>CSC ID Free Login</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i data-lucide="check-circle" class="w-4 h-4 text-blue-400 flex-shrink-0"></i>
                        <span>Aadhaar, PAN & Voter Tools</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i data-lucide="check-circle" class="w-4 h-4 text-blue-400 flex-shrink-0"></i>
                        <span>24/7 VIP Support</span>
                    </li>
                </ul>
            </div>

            <button onclick="openUpiRechargeModal(999)" class="mt-6 w-full py-3 bg-blue-600 hover:bg-blue-500 text-white font-bold text-xs rounded-xl shadow-md shadow-blue-500/20 transition-all flex items-center justify-center gap-1.5 cursor-pointer">
                <i data-lucide="qrcode" class="w-4 h-4"></i> Recharge ₹999
            </button>
        </div>

        <!-- Master Plan (₹1499) -->
        <div class="plan-card rounded-2xl p-6 shadow-sm hover:shadow-lg transition-all flex flex-col justify-between relative overflow-hidden group">
            <div class="space-y-4">
                <div class="flex items-center justify-between">
                    <h3 class="plan-title text-lg font-bold">Master</h3>
                    <span class="px-2.5 py-0.5 rounded-full bg-purple-100 text-purple-800 text-[11px] font-bold border border-purple-200">Unlimited</span>
                </div>
                <div class="flex items-baseline">
                    <span class="plan-price text-3xl">₹1499</span>
                    <span class="text-xs text-slate-500 font-medium ml-1">/ one-time</span>
                </div>
                <p class="plan-desc text-xs border-b border-slate-200 pb-4">Unlimited points, Unlimited Retailers & Distributors.</p>
                
                <ul class="space-y-2.5 text-xs plan-feature">
                    <li class="flex items-center gap-2">
                        <i data-lucide="check-circle" class="w-4 h-4 text-emerald-600 flex-shrink-0"></i>
                        <span><strong class="text-slate-900">Unlimited Points</strong></span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i data-lucide="check-circle" class="w-4 h-4 text-emerald-600 flex-shrink-0"></i>
                        <span>Unlimited Retailer & Distributor</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i data-lucide="check-circle" class="w-4 h-4 text-emerald-600 flex-shrink-0"></i>
                        <span>CSC All Services Access</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i data-lucide="check-circle" class="w-4 h-4 text-emerald-600 flex-shrink-0"></i>
                        <span>Point Transfer Control</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i data-lucide="check-circle" class="w-4 h-4 text-emerald-600 flex-shrink-0"></i>
                        <span>Dedicated Support Manager</span>
                    </li>
                </ul>
            </div>

            <button onclick="openUpiRechargeModal(1499)" class="mt-6 w-full py-3 bg-slate-900 hover:bg-slate-800 text-white font-bold text-xs rounded-xl shadow-sm transition-colors flex items-center justify-center gap-1.5 cursor-pointer">
                <i data-lucide="qrcode" class="w-4 h-4"></i> Recharge ₹1499
            </button>
        </div>

        <!-- White Label Plan (₹2999) -->
        <div class="plan-card rounded-2xl p-6 shadow-sm hover:shadow-lg transition-all flex flex-col justify-between relative overflow-hidden group">
            <div class="space-y-4">
                <div class="flex items-center justify-between">
                    <h3 class="plan-title text-lg font-bold">White Label</h3>
                    <span class="px-2.5 py-0.5 rounded-full bg-amber-100 text-amber-800 text-[11px] font-bold border border-amber-200">Enterprise</span>
                </div>
                <div class="flex items-baseline">
                    <span class="plan-price text-3xl">₹2999</span>
                    <span class="text-xs text-slate-500 font-medium ml-1">/ one-time</span>
                </div>
                <p class="plan-desc text-xs border-b border-slate-200 pb-4">Full admin level access with unlimited users across all tiers.</p>
                
                <ul class="space-y-2.5 text-xs plan-feature">
                    <li class="flex items-center gap-2">
                        <i data-lucide="check-circle" class="w-4 h-4 text-emerald-600 flex-shrink-0"></i>
                        <span><strong class="text-slate-900">Unlimited All Points & Users</strong></span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i data-lucide="check-circle" class="w-4 h-4 text-emerald-600 flex-shrink-0"></i>
                        <span>Master Admin Rights</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i data-lucide="check-circle" class="w-4 h-4 text-emerald-600 flex-shrink-0"></i>
                        <span>CSC All Services Integration</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i data-lucide="check-circle" class="w-4 h-4 text-emerald-600 flex-shrink-0"></i>
                        <span>Custom Branding Setup</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i data-lucide="check-circle" class="w-4 h-4 text-emerald-600 flex-shrink-0"></i>
                        <span>24/7 Priority Hotline</span>
                    </li>
                </ul>
            </div>

            <button onclick="openUpiRechargeModal(2999)" class="mt-6 w-full py-3 bg-slate-900 hover:bg-slate-800 text-white font-bold text-xs rounded-xl shadow-sm transition-colors flex items-center justify-center gap-1.5 cursor-pointer">
                <i data-lucide="qrcode" class="w-4 h-4"></i> Recharge ₹2999
            </button>
        </div>

    </div>

</div>

<?php include('upi_recharge_modal.php'); ?>
<?php include('userFooter.php'); ?>
