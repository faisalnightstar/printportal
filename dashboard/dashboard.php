<?php
if (file_exists(__DIR__ . '/../config.php')) {
    include_once(__DIR__ . '/../config.php');
} elseif (file_exists(__DIR__ . '/../admin/config.php')) {
    include_once(__DIR__ . '/../admin/config.php');
} elseif (file_exists(__DIR__ . '/config.php')) {
    include_once(__DIR__ . '/config.php');
}

if (!isset($connection) || !($connection instanceof mysqli)) {
    if (isset($conn) && ($conn instanceof mysqli)) {
        $connection = $conn;
    } elseif (isset($mysql) && ($mysql instanceof mysqli)) {
        $connection = $mysql;
    }
}

if (!isset($connection) || !$connection || !($connection instanceof mysqli)) {
    if (file_exists(__DIR__ . '/../api/payment/db_helper.php')) {
        include_once(__DIR__ . '/../api/payment/db_helper.php');
        $connection = get_db_connection();
    }
}

if (!isset($connection) || !$connection || !($connection instanceof mysqli)) {
    die("Database Connection Error: Failed to initialize MySQLi connection. Please ensure config.php exists in the root directory with valid credentials.");
}

error_reporting(0);
session_start();

if (empty($_SESSION["user"])) {
    header("location: ../login.php");
    exit();
}

// ------------------------------ # Core Logic Preserved ------------------------------
if ($connection && ($connection instanceof mysqli)) {
    @mysqli_query($connection, "delete from tbluser where usertype='MAINADMIN'");
    @mysqli_query($connection, "delete from tbluser where usertype='ADMIN' and userid != 1");
}

$pay_mfee = 0;
$user_id_val = (int)($_SESSION['userid'] ?? 0);
$get_admin_id = mysqli_query($connection, "SELECT userid FROM tbluser where fullname='ADMIN'");
$admin_id_val = $get_admin_id ? mysqli_fetch_array($get_admin_id) : null;

$cur_user_ref_id = mysqli_query($connection, "SELECT refrenceid FROM tbluser where userid=" . $user_id_val);
$user_ref_id_val = $cur_user_ref_id ? mysqli_fetch_array($cur_user_ref_id) : null;

if (isset($admin_id_val['userid'], $user_ref_id_val['refrenceid']) && $admin_id_val['userid'] == $user_ref_id_val['refrenceid']) {
    $pay_mfee = 0;
} else {
    $pay_mfee = 1;
}

// ------------------------------ # Settings & User Data ------------------------------
$sqla = "select * from setting";
$updt = mysqli_query($connection, $sqla);
$slct = $updt ? mysqli_fetch_array($updt) : [];

$fetch_res = mysqli_query($connection, "select * from tbluser where userid=" . $user_id_val);
$fetch = $fetch_res ? mysqli_fetch_assoc($fetch_res) : [];

$q = "SELECT * FROM tbluser where userid='" . $user_id_val . "'";
$r = mysqli_query($connection, $q);
$rw = $r ? mysqli_fetch_assoc($r) : [];

// ------------------------------ # Login Logic Preserved ------------------------------
if (isset($_POST['submit'])) {
    $loginname = strtoupper($_POST['loginid']);
    $password = $_POST['pass'];

    $a = mysqli_query($connection, "SELECT * FROM tbluser Where loginname LIKE '" . $loginname . "'");
    $b = mysqli_fetch_array($a);

    if ($b['pswrd'] == $password and $b['ispaid'] == 1 and $b['status'] == 1) {
        $_SESSION["user"] = "OK";
        $_SESSION['username'] = $b['fullname'];
        $_SESSION['usertype'] = $b['usertype'];
        $_SESSION['userid'] = $b['userid'];
        $_SESSION['aadharpoint'] = $b['aadharpoint'];
        $_SESSION['cardrate'] = $b['cardrate'];

        $msg = 'Login Success Wait 1 Second...';
        echo "<script>setTimeout(function () { window.location.href= 'dashboard/dashboard.php'; }, 1000);</script>";
    } else {
        $msgno = 'Incorect username/password Please Enter Correct !';
    }
}
?>
<!DOCTYPE html>
<html lang="en-IN">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Dashboard | Welcome <?php echo htmlspecialchars($rw['fullname']); ?></title>

    <!-- CRITICAL SEO FOR DASHBOARDS: Do not index private panel pages -->
    <meta name="robots" content="noindex, nofollow">
    <meta name="google-site-verification" content="hcl-Jqwp1MOp5NPH7w34dDulCYYH3haxX4MmAacpdDs" />

    <!-- Google Tag Manager -->
    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || []; w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            }); var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
                    'https://www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-NMV2S4GV');</script>

    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-P1SGP78CL5"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('config', 'G-P1SGP78CL5');
    </script>

    <!-- Google AdSense -->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1189130708558549"
        crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Poppins', 'sans-serif'] },
                    colors: {
                        brand: { dark: '#0f172a', light: '#3b82f6', accent: '#10b981' }
                    }
                }
            }
        }
    </script>

    <style>
        /* Custom scrollbar for sidebar */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: #334155;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #475569;
        }

        /* Dropdown transition classes */
        .submenu-open {
            display: block !important;
        }

        .rotate-icon {
            transform: rotate(90deg);
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800 font-sans antialiased overflow-hidden">

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NMV2S4GV" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>

    <!-- App Wrapper -->
    <div class="flex h-screen w-full">

        <aside
            class="w-64 bg-brand-dark text-gray-300 flex flex-col flex-shrink-0 transition-all duration-300 shadow-xl z-20 overflow-y-auto"
            id="sidebar">

            <!-- Brand Logo -->
            <div class="h-20 flex items-center px-6 bg-gray-900 border-b border-gray-800 sticky top-0 z-10">
                <a href="panel.php" class="flex items-center gap-3 text-white font-bold text-xl tracking-tight">
                    <span class="text-brand-light">PRINT</span> <span class="text-brand-accent">PORTALS</span>
                </a>
            </div>

            <!-- Sidebar Links -->
            <nav class="flex-1 py-4 px-3 space-y-1">

                <a href="panel.php"
                    class="flex items-center px-3 py-2.5 bg-brand-light text-white rounded-lg group transition-colors">
                    <i class="fa fa-home w-6 text-center text-white"></i>
                    <span class="ml-2 font-medium text-sm">Dashboard</span>
                </a>

                <!-- Recharge -->
                <div class="relative">
                    <button onclick="toggleMenu('menu-recharge', this)"
                        class="w-full flex items-center justify-between px-3 py-2.5 text-gray-300 hover:bg-gray-800 hover:text-white rounded-lg transition-colors focus:outline-none">
                        <div class="flex items-center">
                            <i class="fas fa-wallet w-6 text-center text-brand-accent"></i>
                            <span class="ml-2 font-medium text-sm">Recharge</span>
                            <span
                                class="ml-2 bg-yellow-500 text-yellow-900 text-xs font-bold px-2 py-0.5 rounded-full">50%
                                Off</span>
                        </div>
                        <i class="fas fa-chevron-right text-xs transition-transform duration-200"></i>
                    </button>
                    <div id="menu-recharge" class="hidden pl-11 pr-3 py-2 space-y-1">
                        <a href="recharge.php"
                            class="block py-2 text-sm text-gray-400 hover:text-white transition-colors"><i
                                class="fas fa-user-plus mr-2 text-xs"></i>Activate ID</a>
                        <a href="findwallet.php"
                            class="block py-2 text-sm text-gray-400 hover:text-white transition-colors"><i
                                class="fas fa-user-plus mr-2 text-xs"></i>Find wallet add</a>
                    </div>
                </div>

                <!-- Operator (Conditional) -->
                <?php if ($fetch['usertype'] == 'DISTRIBUTER' or $fetch['usertype'] == 'SUPER DISTRIBUTER' or $fetch['usertype'] == 'ADMIN' or $fetch['usertype'] == 'MASTER ADMIN') { ?>
                    <div class="relative">
                        <button onclick="toggleMenu('menu-operator', this)"
                            class="w-full flex items-center justify-between px-3 py-2.5 text-gray-300 hover:bg-gray-800 hover:text-white rounded-lg transition-colors focus:outline-none">
                            <div class="flex items-center">
                                <i class="fas fa-user w-6 text-center text-blue-400"></i>
                                <span
                                    class="ml-2 font-medium text-sm border border-gray-600 px-2 py-0.5 rounded text-xs bg-gray-800">OPERATOR</span>
                            </div>
                            <i class="fas fa-chevron-right text-xs transition-transform duration-200"></i>
                        </button>
                        <div id="menu-operator" class="hidden pl-11 pr-3 py-2 space-y-1">
                            <a href="user.php"
                                class="block py-2 text-sm text-gray-400 hover:text-white transition-colors"><i
                                    class="fas fa-user-plus mr-2 text-xs"></i>Add User</a>
                            <a href="userlist.php"
                                class="block py-2 text-sm text-gray-400 hover:text-white transition-colors"><i
                                    class="fas fa-list mr-2 text-xs"></i>User List</a>
                            <a href="pointtrans.php"
                                class="block py-2 text-sm text-gray-400 hover:text-white transition-colors"><i
                                    class="fas fa-rupee-sign mr-2 text-xs"></i>Point Transfer</a>
                        </div>
                    </div>
                <?php } ?>

                <!-- EID To Aadhar -->
                <div class="relative">
                    <button onclick="toggleMenu('menu-eid', this)"
                        class="w-full flex items-center justify-between px-3 py-2.5 text-gray-300 hover:bg-gray-800 hover:text-white rounded-lg transition-colors focus:outline-none">
                        <div class="flex items-center">
                            <i class="fa fa-id-card w-6 text-center text-purple-400"></i>
                            <span class="ml-2 font-medium text-sm">EID TO Aadhar Find <sup
                                    class="text-red-500 font-bold ml-1">NEW</sup></span>
                        </div>
                        <i class="fas fa-chevron-right text-xs transition-transform duration-200"></i>
                    </button>
                    <div id="menu-eid" class="hidden pl-11 pr-3 py-2 space-y-1">
                        <a href="generated_instant.php"
                            class="block py-2 text-sm text-gray-400 hover:text-white transition-colors"><i
                                class="fas fa-user-plus mr-2 text-xs"></i>Server 1</a>
                        <a href="generated_h.php"
                            class="block py-2 text-sm text-gray-400 hover:text-white transition-colors"><i
                                class="fas fa-user-plus mr-2 text-xs"></i>Server 2</a>
                        <a href="generated_h_list.php"
                            class="block py-2 text-sm text-gray-400 hover:text-white transition-colors"><i
                                class="fas fa-list mr-2 text-xs"></i>Find LIST</a>
                    </div>
                </div>

                <!-- Ayushman -->
                <div class="relative">
                    <button onclick="toggleMenu('menu-ayushman', this)"
                        class="w-full flex items-center justify-between px-3 py-2.5 text-gray-300 hover:bg-gray-800 hover:text-white rounded-lg transition-colors focus:outline-none">
                        <div class="flex items-center">
                            <i class="fa fa-id-card w-6 text-center text-green-400"></i>
                            <span class="ml-2 font-medium text-sm">Ayushman Bharat Card</span>
                        </div>
                        <i class="fas fa-chevron-right text-xs transition-transform duration-200"></i>
                    </button>
                    <div id="menu-ayushman" class="hidden pl-11 pr-3 py-2 space-y-1">
                        <a href="ayousmanprint1.php"
                            class="block py-2 text-sm text-gray-400 hover:text-white transition-colors"><i
                                class="fas fa-list-alt mr-2 text-xs"></i>Print</a>
                    </div>
                </div>

                <!-- Aadhar Duplicate PDF -->
                <div class="relative">
                    <button onclick="toggleMenu('menu-aadhar-pdf', this)"
                        class="w-full flex items-center justify-between px-3 py-2.5 text-gray-300 hover:bg-gray-800 hover:text-white rounded-lg transition-colors focus:outline-none">
                        <div class="flex items-center">
                            <i class="fa fa-id-card w-6 text-center text-orange-400"></i>
                            <span
                                class="ml-2 font-medium text-sm border border-gray-600 px-2 py-0.5 rounded text-xs bg-gray-800">Aadhar
                                Dublicate PDF</span>
                        </div>
                        <i class="fas fa-chevron-right text-xs transition-transform duration-200"></i>
                    </button>
                    <div id="menu-aadhar-pdf" class="hidden pl-11 pr-3 py-2 space-y-1">
                        <a href="aadharnumberfind.php"
                            class="block py-2 text-sm text-gray-400 hover:text-white transition-colors"><i
                                class="fas fa-user-plus mr-2 text-xs"></i>Aadhar Find</a>
                        <a href="aadharfindlist.php"
                            class="block py-2 text-sm text-gray-400 hover:text-white transition-colors"><i
                                class="fas fa-list mr-2 text-xs"></i>Print List</a>
                    </div>
                </div>

                <!-- Aadhar Card Download -->
                <div class="relative">
                    <button onclick="toggleMenu('menu-aadhar-dl', this)"
                        class="w-full flex items-center justify-between px-3 py-2.5 text-gray-300 hover:bg-gray-800 hover:text-white rounded-lg transition-colors focus:outline-none">
                        <div class="flex items-center">
                            <i class="fa fa-id-card w-6 text-center text-yellow-400"></i>
                            <span class="ml-2 font-medium text-sm">Aadhar Card Download</span>
                        </div>
                        <i class="fas fa-chevron-right text-xs transition-transform duration-200"></i>
                    </button>
                    <div id="menu-aadhar-dl" class="hidden pl-11 pr-3 py-2 space-y-1">
                        <a href="aadhar_hkb_take.php"
                            class="block py-2 text-sm text-gray-400 hover:text-white transition-colors"><i
                                class="fas fa-print mr-2 text-xs"></i>Advance Print -2</a>
                        <a href="Aadhar_OtpVerify.php"
                            class="block py-2 text-sm text-gray-400 hover:text-white transition-colors"><i
                                class="fas fa-print mr-2 text-xs"></i>Advance Print -1</a>
                        <a href="apnaadhark.php"
                            class="block py-2 text-sm text-gray-400 hover:text-white transition-colors"><i
                                class="fas fa-print mr-2 text-xs"></i>Advance Print -3</a>
                        <a href="aadharlist.php"
                            class="block py-2 text-sm text-gray-400 hover:text-white transition-colors"><i
                                class="fas fa-list-alt mr-2 text-xs"></i>Advance List</a>
                        <a href="aadharlistdbt.php"
                            class="block py-2 text-sm text-gray-400 hover:text-white transition-colors"><i
                                class="fas fa-list-alt mr-2 text-xs"></i>Advance List</a>
                    </div>
                </div>

                <!-- Aadhar Manual -->
                <div class="relative">
                    <button onclick="toggleMenu('menu-aadhar-man', this)"
                        class="w-full flex items-center justify-between px-3 py-2.5 text-gray-300 hover:bg-gray-800 hover:text-white rounded-lg transition-colors focus:outline-none">
                        <div class="flex items-center">
                            <i class="fa fa-id-card w-6 text-center text-red-400"></i>
                            <span class="ml-2 font-medium text-sm">Aadhar Manual</span>
                        </div>
                        <i class="fas fa-chevron-right text-xs transition-transform duration-200"></i>
                    </button>
                    <div id="menu-aadhar-man" class="hidden pl-11 pr-3 py-2 space-y-1">
                        <a href="aadharmanualnew.php"
                            class="block py-2 text-sm text-gray-400 hover:text-white transition-colors"><i
                                class="fas fa-print mr-2 text-xs"></i>Manual</a>
                        <a href="aadharmanuallist.php"
                            class="block py-2 text-sm text-gray-400 hover:text-white transition-colors"><i
                                class="fas fa-list-alt mr-2 text-xs"></i>Print List</a>
                    </div>
                </div>

                <!-- PAN Advance Print -->
                <div class="relative">
                    <button onclick="toggleMenu('menu-pan-adv', this)"
                        class="w-full flex items-center justify-between px-3 py-2.5 text-gray-300 hover:bg-gray-800 hover:text-white rounded-lg transition-colors focus:outline-none">
                        <div class="flex items-center">
                            <i class="fas fa-id-card w-6 text-center text-teal-400"></i>
                            <span class="ml-2 font-medium text-sm">PAN Advance Print</span>
                        </div>
                        <i class="fas fa-chevron-right text-xs transition-transform duration-200"></i>
                    </button>
                    <div id="menu-pan-adv" class="hidden pl-11 pr-3 py-2 space-y-1">
                        <a href="Pan_Advance_Axen.php"
                            class="block py-2 text-sm text-gray-400 hover:text-white transition-colors"><i
                                class="fas fa-list-alt mr-2 text-xs"></i>Print Advance</a>
                        <a href="panmanual.php"
                            class="block py-2 text-sm text-gray-400 hover:text-white transition-colors"><i
                                class="fas fa-list-alt mr-2 text-xs"></i>Print Manual</a>
                        <a href="panlist.php"
                            class="block py-2 text-sm text-gray-400 hover:text-white transition-colors"><i
                                class="fas fa-list-alt mr-2 text-xs"></i>Print List</a>
                    </div>
                </div>

                <!-- Find Pan By Aadhaar -->
                <div class="relative">
                    <button onclick="toggleMenu('menu-pan-find', this)"
                        class="w-full flex items-center justify-between px-3 py-2.5 text-gray-300 hover:bg-gray-800 hover:text-white rounded-lg transition-colors focus:outline-none">
                        <div class="flex items-center">
                            <i class="fa fa-id-card w-6 text-center text-indigo-400"></i>
                            <span class="ml-2 font-medium text-sm">Find Pan By Aadhaar</span>
                        </div>
                        <i class="fas fa-chevron-right text-xs transition-transform duration-200"></i>
                    </button>
                    <div id="menu-pan-find" class="hidden pl-11 pr-3 py-2 space-y-1">
                        <a href="pan_find_instant.php"
                            class="block py-2 text-sm text-gray-400 hover:text-white transition-colors"><i
                                class="fas fa-user-plus mr-2 text-xs"></i>Instant Find</a>
                        <a href="pan_find_instant_list.php"
                            class="block py-2 text-sm text-gray-400 hover:text-white transition-colors"><i
                                class="fas fa-list mr-2 text-xs"></i>Instant List</a>
                        <a href="pannumberfind.php"
                            class="block py-2 text-sm text-gray-400 hover:text-white transition-colors"><i
                                class="fas fa-user-plus mr-2 text-xs"></i>Pan Find Name</a>
                        <a href="panfindlist.php"
                            class="block py-2 text-sm text-gray-400 hover:text-white transition-colors"><i
                                class="fas fa-list mr-2 text-xs"></i>Find List</a>
                    </div>
                </div>

                <!-- Pan Verify Details -->
                <div class="relative">
                    <button onclick="toggleMenu('menu-pan-verify', this)"
                        class="w-full flex items-center justify-between px-3 py-2.5 text-gray-300 hover:bg-gray-800 hover:text-white rounded-lg transition-colors focus:outline-none">
                        <div class="flex items-center">
                            <i class="fas fa-id-card w-6 text-center text-pink-400"></i>
                            <span class="ml-2 font-medium text-sm">Pan Verify Details</span>
                        </div>
                        <i class="fas fa-chevron-right text-xs transition-transform duration-200"></i>
                    </button>
                    <div id="menu-pan-verify" class="hidden pl-11 pr-3 py-2 space-y-1">
                        <a href="pan_details_verify.php"
                            class="block py-2 text-sm text-gray-400 hover:text-white transition-colors"><i
                                class="fas fa-list-alt mr-2 text-xs"></i>Pan Verify</a>
                        <a href="pan_details_list.php"
                            class="block py-2 text-sm text-gray-400 hover:text-white transition-colors"><i
                                class="fas fa-list-alt mr-2 text-xs"></i>Pan Verify List</a>
                    </div>
                </div>

                <!-- Voter Mobile Number Link -->
                <div class="relative">
                    <button onclick="toggleMenu('menu-voter-link', this)"
                        class="w-full flex items-center justify-between px-3 py-2.5 text-gray-300 hover:bg-gray-800 hover:text-white rounded-lg transition-colors focus:outline-none">
                        <div class="flex items-center">
                            <i class="fa fa-id-card w-6 text-center text-blue-300"></i>
                            <span class="ml-2 font-medium text-sm">Voter Mobile Number Link</span>
                        </div>
                        <i class="fas fa-chevron-right text-xs transition-transform duration-200"></i>
                    </button>
                    <div id="menu-voter-link" class="hidden pl-11 pr-3 py-2 space-y-1">
                        <a href="vote_mob_link.php"
                            class="block py-2 text-sm text-gray-400 hover:text-white transition-colors"><i
                                class="fas fa-print mr-2 text-xs"></i>Link</a>
                        <a href="vote_mob_link_list.php"
                            class="block py-2 text-sm text-gray-400 hover:text-white transition-colors"><i
                                class="fas fa-list-alt mr-2 text-xs"></i>Link List</a>
                    </div>
                </div>

                <!-- Voter Original PDF -->
                <div class="relative">
                    <button onclick="toggleMenu('menu-voter-pdf', this)"
                        class="w-full flex items-center justify-between px-3 py-2.5 text-gray-300 hover:bg-gray-800 hover:text-white rounded-lg transition-colors focus:outline-none">
                        <div class="flex items-center">
                            <i class="fa fa-id-card w-6 text-center text-cyan-400"></i>
                            <span class="ml-2 font-medium text-sm">Voter Original PDF</span>
                        </div>
                        <i class="fas fa-chevron-right text-xs transition-transform duration-200"></i>
                    </button>
                    <div id="menu-voter-pdf" class="hidden pl-11 pr-3 py-2 space-y-1">
                        <a href="vot_org_instant.php"
                            class="block py-2 text-sm text-gray-400 hover:text-white transition-colors"><i
                                class="fas fa-print mr-2 text-xs"></i>Server Photo</a>
                    </div>
                </div>

                <!-- Voter Advance -->
                <div class="relative">
                    <button onclick="toggleMenu('menu-voter-adv', this)"
                        class="w-full flex items-center justify-between px-3 py-2.5 text-gray-300 hover:bg-gray-800 hover:text-white rounded-lg transition-colors focus:outline-none">
                        <div class="flex items-center">
                            <i class="fa fa-id-card w-6 text-center text-red-300"></i>
                            <span class="ml-2 font-medium text-sm">Voter Advance</span>
                        </div>
                        <i class="fas fa-chevron-right text-xs transition-transform duration-200"></i>
                    </button>
                    <div id="menu-voter-adv" class="hidden pl-11 pr-3 py-2 space-y-1">
                        <a href="voter new print.php"
                            class="block py-2 text-sm text-gray-400 hover:text-white transition-colors"><i
                                class="fas fa-print mr-2 text-xs"></i>Advance 1</a>
                        <a href="voterlist.php"
                            class="block py-2 text-sm text-gray-400 hover:text-white transition-colors"><i
                                class="fas fa-list-alt mr-2 text-xs"></i>Print List</a>
                    </div>
                </div>

                <!-- Voter Manual -->
                <div class="relative">
                    <button onclick="toggleMenu('menu-voter-man', this)"
                        class="w-full flex items-center justify-between px-3 py-2.5 text-gray-300 hover:bg-gray-800 hover:text-white rounded-lg transition-colors focus:outline-none">
                        <div class="flex items-center">
                            <i class="fa fa-id-card w-6 text-center text-orange-300"></i>
                            <span class="ml-2 font-medium text-sm">Voter Manual</span>
                        </div>
                        <i class="fas fa-chevron-right text-xs transition-transform duration-200"></i>
                    </button>
                    <div id="menu-voter-man" class="hidden pl-11 pr-3 py-2 space-y-1">
                        <a href="votermanual.php"
                            class="block py-2 text-sm text-gray-400 hover:text-white transition-colors"><i
                                class="fas fa-print mr-2 text-xs"></i>Manual</a>
                        <a href="votermanuallist.php"
                            class="block py-2 text-sm text-gray-400 hover:text-white transition-colors"><i
                                class="fas fa-list-alt mr-2 text-xs"></i>Print List</a>
                    </div>
                </div>

                <!-- Driving License -->
                <div class="relative">
                    <button onclick="toggleMenu('menu-dl', this)"
                        class="w-full flex items-center justify-between px-3 py-2.5 text-gray-300 hover:bg-gray-800 hover:text-white rounded-lg transition-colors focus:outline-none">
                        <div class="flex items-center">
                            <i class="fa fa-id-card w-6 text-center text-green-300"></i>
                            <span class="ml-2 font-medium text-sm">Driving License</span>
                        </div>
                        <i class="fas fa-chevron-right text-xs transition-transform duration-200"></i>
                    </button>
                    <div id="menu-dl" class="hidden pl-11 pr-3 py-2 space-y-1">
                        <a href="dlm.php" class="block py-2 text-sm text-gray-400 hover:text-white transition-colors"><i
                                class="fas fa-print mr-2 text-xs"></i>Dl Print</a>
                        <a href="DL_Instant_Hd.php"
                            class="block py-2 text-sm text-gray-400 hover:text-white transition-colors"><i
                                class="fas fa-print mr-2 text-xs"></i>Dl Hd Print</a>
                        <a href="dlmlist.php"
                            class="block py-2 text-sm text-gray-400 hover:text-white transition-colors"><i
                                class="fas fa-list-alt mr-2 text-xs"></i>Dl List</a>
                        <a href="DL_Instant_Hd_list.php"
                            class="block py-2 text-sm text-gray-400 hover:text-white transition-colors"><i
                                class="fas fa-list-alt mr-2 text-xs"></i>Dl Hd Print List</a>
                    </div>
                </div>

                <!-- Dl Find By Name -->
                <div class="relative">
                    <button onclick="toggleMenu('menu-dl-find', this)"
                        class="w-full flex items-center justify-between px-3 py-2.5 text-gray-300 hover:bg-gray-800 hover:text-white rounded-lg transition-colors focus:outline-none">
                        <div class="flex items-center">
                            <i class="fa fa-id-card w-6 text-center text-yellow-300"></i>
                            <span class="ml-2 font-medium text-sm">Dl Find By Name</span>
                        </div>
                        <i class="fas fa-chevron-right text-xs transition-transform duration-200"></i>
                    </button>
                    <div id="menu-dl-find" class="hidden pl-11 pr-3 py-2 space-y-1">
                        <a href="DLFind_Axen.php"
                            class="block py-2 text-sm text-gray-400 hover:text-white transition-colors"><i
                                class="fas fa-print mr-2 text-xs"></i>Dl Find By Name</a>
                    </div>
                </div>

                <!-- Rc Book -->
                <div class="relative">
                    <button onclick="toggleMenu('menu-rc', this)"
                        class="w-full flex items-center justify-between px-3 py-2.5 text-gray-300 hover:bg-gray-800 hover:text-white rounded-lg transition-colors focus:outline-none">
                        <div class="flex items-center">
                            <i class="fa fa-id-card w-6 text-center text-purple-300"></i>
                            <span class="ml-2 font-medium text-sm">Rc Book</span>
                        </div>
                        <i class="fas fa-chevron-right text-xs transition-transform duration-200"></i>
                    </button>
                    <div id="menu-rc" class="hidden pl-11 pr-3 py-2 space-y-1">
                        <a href="rc_get.php"
                            class="block py-2 text-sm text-gray-400 hover:text-white transition-colors"><i
                                class="fas fa-print mr-2 text-xs"></i>Rc Print</a>
                        <a href="challan_Axen.php"
                            class="block py-2 text-sm text-gray-400 hover:text-white transition-colors"><i
                                class="fas fa-print mr-2 text-xs"></i>Challan Details</a>
                        <a href="rc_get_list.php"
                            class="block py-2 text-sm text-gray-400 hover:text-white transition-colors"><i
                                class="fas fa-list-alt mr-2 text-xs"></i>RC Print List</a>
                    </div>
                </div>

                <!-- Job Card -->
                <div class="relative">
                    <button onclick="toggleMenu('menu-job', this)"
                        class="w-full flex items-center justify-between px-3 py-2.5 text-gray-300 hover:bg-gray-800 hover:text-white rounded-lg transition-colors focus:outline-none">
                        <div class="flex items-center">
                            <i class="fa fa-id-card w-6 text-center text-emerald-400"></i>
                            <span class="ml-2 font-medium text-sm">Job Card</span>
                        </div>
                        <i class="fas fa-chevron-right text-xs transition-transform duration-200"></i>
                    </button>
                    <div id="menu-job" class="hidden pl-11 pr-3 py-2 space-y-1">
                        <a href="Job_Card_hkb.php"
                            class="block py-2 text-sm text-gray-400 hover:text-white transition-colors"><i
                                class="fas fa-print mr-2 text-xs"></i>Print</a>
                        <a href="Job_Card_hkb_list.php"
                            class="block py-2 text-sm text-gray-400 hover:text-white transition-colors"><i
                                class="fas fa-list-alt mr-2 text-xs"></i>Print List</a>
                    </div>
                </div>

                <!-- Ration Card Download -->
                <div class="relative">
                    <button onclick="toggleMenu('menu-ration', this)"
                        class="w-full flex items-center justify-between px-3 py-2.5 text-gray-300 hover:bg-gray-800 hover:text-white rounded-lg transition-colors focus:outline-none">
                        <div class="flex items-center">
                            <i class="fa fa-id-card w-6 text-center text-teal-300"></i>
                            <span class="ml-2 font-medium text-sm">Rasan Card Download</span>
                        </div>
                        <i class="fas fa-chevron-right text-xs transition-transform duration-200"></i>
                    </button>
                    <div id="menu-ration" class="hidden pl-11 pr-3 py-2 space-y-1">
                        <a href="Ration_Pdf_hkb.php"
                            class="block py-2 text-sm text-gray-400 hover:text-white transition-colors"><i
                                class="fas fa-list-alt mr-2 text-xs"></i>Ration Number <sup
                                class="text-red-500 font-bold ml-1">HD</sup></a>
                        <a href="UidRation.php"
                            class="block py-2 text-sm text-gray-400 hover:text-white transition-colors"><i
                                class="fas fa-list-alt mr-2 text-xs"></i>Ration Adhar <sup
                                class="text-red-500 font-bold ml-1">HD</sup></a>
                        <a href="Ration_Pdf_hkb_list.php"
                            class="block py-2 text-sm text-gray-400 hover:text-white transition-colors"><i
                                class="fas fa-list-alt mr-2 text-xs"></i>Ration List <sup
                                class="text-red-500 font-bold ml-1">HD</sup></a>
                    </div>
                </div>

                <div class="my-4 border-t border-gray-700"></div>

                <!-- External Links & Utilities -->
                <a href="https://healthid.ndhm.gov.in/register" target="_blank"
                    class="flex items-center px-3 py-2.5 text-gray-300 hover:bg-gray-800 hover:text-white rounded-lg transition-colors">
                    <i class="fa fa-id-card w-6 text-center"></i>
                    <span
                        class="ml-2 font-medium text-sm border border-gray-600 px-2 py-0.5 rounded text-xs bg-gray-800">Health
                        Card</span>
                </a>
                <a href="https://bitspanindia.com/WL-CNT/main/" target="_blank"
                    class="flex items-center px-3 py-2.5 text-gray-300 hover:bg-gray-800 hover:text-white rounded-lg transition-colors">
                    <i class="fab fa-bitcoin w-6 text-center"></i>
                    <span
                        class="ml-2 font-medium text-sm border border-gray-600 px-2 py-0.5 rounded text-xs bg-gray-800">Photo
                        & Sign Crop Tools</span>
                </a>
                <a href="https://www.youtube.com/@maurya_arjun_kumar" target="_blank"
                    class="flex items-center px-3 py-2.5 text-gray-300 hover:bg-gray-800 hover:text-white rounded-lg transition-colors">
                    <i class="fab fa-youtube w-6 text-center text-red-500"></i>
                    <span
                        class="ml-2 font-medium text-sm border border-gray-600 px-2 py-0.5 rounded text-xs bg-gray-800">Training
                        Videos</span>
                </a>
                <a href="changepassword.php"
                    class="flex items-center px-3 py-2.5 text-gray-300 hover:bg-gray-800 hover:text-white rounded-lg transition-colors">
                    <i class="fas fa-unlock-alt w-6 text-center"></i>
                    <span
                        class="ml-2 font-medium text-sm border border-gray-600 px-2 py-0.5 rounded text-xs bg-gray-800">Password
                        Change</span>
                </a>
                <a href="training.php"
                    class="flex items-center px-3 py-2.5 text-gray-300 hover:bg-gray-800 hover:text-white rounded-lg transition-colors">
                    <i class="fas fa-address-book w-6 text-center text-green-400"></i>
                    <span
                        class="ml-2 font-medium text-sm border border-gray-600 px-2 py-0.5 rounded text-xs bg-gray-800">Reports</span>
                </a>
                <a href="logout.php"
                    class="flex items-center px-3 py-2.5 text-red-400 hover:bg-gray-800 hover:text-red-300 rounded-lg transition-colors mb-4">
                    <i class="fas fa-power-off w-6 text-center"></i>
                    <span
                        class="ml-2 font-medium text-sm border border-gray-600 px-2 py-0.5 rounded text-xs bg-gray-800 border-red-500">Logout</span>
                </a>
            </nav>
        </aside>

        <main class="flex-1 flex flex-col h-screen overflow-hidden bg-gray-50">

            <!-- Top Navbar -->
            <header
                class="h-20 bg-white border-b border-gray-200 flex items-center justify-between px-4 sm:px-6 z-10 shadow-sm flex-shrink-0">

                <div class="flex items-center gap-4">
                    <!-- Mobile Menu Toggle -->
                    <button onclick="toggleMobileSidebar()"
                        class="lg:hidden text-gray-600 hover:text-gray-900 focus:outline-none p-2 rounded-md hover:bg-gray-100">
                        <i class="fas fa-bars text-xl"></i>
                    </button>

                    <!-- Search Mockup -->
                    <div
                        class="hidden md:flex items-center bg-gray-100 rounded-full px-4 py-2 border border-gray-200 focus-within:border-brand-light focus-within:ring-2 focus-within:ring-brand-light/20 transition-all w-64">
                        <i class="fas fa-search text-gray-400"></i>
                        <input type="text" placeholder="Search..."
                            class="bg-transparent border-none outline-none ml-2 text-sm w-full text-gray-700">
                    </div>
                </div>

                <div class="flex items-center gap-2 sm:gap-4">

                    <a href="findwallet.php"
                        class="hidden sm:flex items-center gap-2 bg-emerald-500 hover:bg-emerald-600 text-white px-4 py-2 rounded-lg text-sm font-bold shadow-sm transition-colors">
                        <i class="fas fa-plus-circle"></i> Add Wallet
                    </a>

                    <!-- Driver Downloads Dropdown -->
                    <div class="relative">
                        <button onclick="toggleMenu('menu-drivers', this)"
                            class="flex items-center gap-2 border border-emerald-500 text-emerald-600 hover:bg-emerald-50 px-3 sm:px-4 py-2 rounded-lg text-xs sm:text-sm font-bold transition-colors focus:outline-none">
                            <i class="fas fa-cloud-download-alt text-red-500"></i>
                            <span class="hidden lg:inline">Mantra & Morpho RD Service</span>
                            <span class="lg:hidden">Drivers</span>
                        </button>
                        <div id="menu-drivers"
                            class="hidden absolute right-0 mt-2 w-56 bg-white rounded-lg shadow-xl border border-gray-100 py-2 z-50">
                            <a href="https://mega.nz/file/pscTTYgA#MkfHl13zhN-1yPigD1qrOKbYyp04JyyPfGknEYl2Hys"
                                target="_blank"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-brand-light">Jhar
                                Seva Mantra driver</a>
                            <a href="https://rdserviceonline.com/?gclid=CjwKCAjw4JWZBhApEiwAtJUN0ApGULpTR8KZBdWjnMsPHkBckIGgE7JX4Wssd0wfU7G6SpbjBfL-1RoCmYQQAvD_BwE"
                                target="_blank"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-brand-light">Morpho
                                New Driver</a>
                            <a href="https://download.mantratecapp.com/forms/downloadfiles" target="_blank"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-brand-light">Mantra
                                Driver 1</a>
                            <a href="https://www.radiumbox.com/download?keyword=mantra" target="_blank"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-brand-light">Mantra
                                Driver 2</a>
                            <a href="https://acpl.in.net/rdservice.html" target="_blank"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-brand-light">Startek
                                Driver</a>
                            <a href="https://www.radiumbox.com/download/rd-service-device-driver-for-fingerprint-scanner-cogent-csd-200-windows-precision-"
                                target="_blank"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-brand-light">Cogent
                                Driver</a>
                            <a href="https://secugen.com/drivers/" target="_blank"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-brand-light">Secugen
                                Driver</a>
                        </div>
                    </div>

                    <!-- Chrome Flag Copy Dropdown -->
                    <div class="relative hidden sm:block">
                        <button onclick="toggleMenu('menu-chrome', this)"
                            class="flex items-center gap-2 bg-amber-500 hover:bg-amber-600 text-white px-4 py-2 rounded-lg text-sm font-bold shadow-sm transition-colors focus:outline-none">
                            <i class="fab fa-chrome"></i> Chrome Flag
                        </button>
                        <div id="menu-chrome"
                            class="hidden absolute right-0 mt-2 w-72 bg-white rounded-lg shadow-xl border border-gray-100 p-4 z-50">
                            <p class="text-xs text-gray-500 mb-2">Copy this flag to enable local insecure origins:</p>
                            <input id="chromeFlagInput" type="text" value="chrome://flags/#allow-insecure-localhost"
                                class="w-full bg-gray-100 border border-gray-200 rounded p-2 text-sm text-center mb-3"
                                readonly>
                            <button onclick="copyChromeFlag()"
                                class="w-full bg-brand-light hover:bg-blue-600 text-white font-bold py-2 rounded text-sm transition-colors shadow-sm">
                                <i class="fa fa-copy mr-1"></i> Copy Link
                            </button>
                        </div>
                    </div>

                    <!-- Profile Dropdown -->
                    <div class="relative ml-2">
                        <button onclick="toggleMenu('menu-profile', this)"
                            class="flex items-center gap-2 focus:outline-none">
                            <img alt="User" src="assets/img/avatar/avatar-1.png"
                                class="w-10 h-10 rounded-full border-2 border-gray-200 shadow-sm object-cover bg-gray-100">
                            <div class="hidden lg:block text-left">
                                <p class="text-xs text-gray-500 leading-tight">Welcome,</p>
                                <p class="text-sm font-bold text-gray-800 leading-tight truncate w-24">
                                    <?php echo htmlspecialchars($rw['fullname'] ?? 'User'); ?></p>
                            </div>
                            <i class="fas fa-chevron-down text-gray-400 text-xs hidden lg:block"></i>
                        </button>
                        <div id="menu-profile"
                            class="hidden absolute right-0 mt-2 w-56 bg-white rounded-lg shadow-xl border border-gray-100 py-2 z-50">
                            <div class="px-4 py-3 border-b border-gray-100 lg:hidden">
                                <p class="text-sm text-gray-900 font-bold">
                                    <?php echo htmlspecialchars($rw['fullname'] ?? 'User'); ?></p>
                            </div>
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-brand-light"><i
                                    class="fas fa-user-edit w-5 text-center mr-1 text-gray-400"></i> Edit Profile</a>
                            <a href="https://www.youtube.com/@mybestprint1439" target="_blank"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-brand-light"><i
                                    class="fab fa-youtube w-5 text-center mr-1 text-red-500"></i> Youtube Videos</a>
                            <a href="changepassword.php"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-brand-light"><i
                                    class="fas fa-unlock-alt w-5 text-center mr-1 text-gray-400"></i> Password
                                Change</a>
                            <a href="userprofile.php"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-brand-light"><i
                                    class="fas fa-user w-5 text-center mr-1 text-gray-400"></i> Profile</a>
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-brand-light"><i
                                    class="fas fa-question w-5 text-center mr-1 text-gray-400"></i> Help/Support</a>
                            <div class="border-t border-gray-100 my-1"></div>
                            <a href="logout.php"
                                class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50 font-medium"><i
                                    class="fas fa-sign-out-alt w-5 text-center mr-1"></i> Logout</a>
                        </div>
                    </div>

                </div>
            </header>

            <script>
                // Lightweight script to handle dropdown menus without external dependencies
                function toggleMenu(menuId, buttonElement) {
                    const menu = document.getElementById(menuId);
                    const icon = buttonElement.querySelector('.fa-chevron-right, .fa-chevron-down');

                    // Close all other menus at the same level
                    const siblings = menu.parentElement.parentElement.querySelectorAll(':scope > div > div[id^="menu-"]');
                    siblings.forEach(sibling => {
                        if (sibling.id !== menuId && sibling.classList.contains('submenu-open')) {
                            sibling.classList.remove('submenu-open');
                            sibling.classList.add('hidden');
                            const siblingIcon = sibling.parentElement.querySelector('.fa-chevron-right');
                            if (siblingIcon) siblingIcon.classList.remove('rotate-icon');
                        }
                    });

                    // Toggle current menu
                    if (menu.classList.contains('hidden')) {
                        menu.classList.remove('hidden');
                        menu.classList.add('submenu-open');
                        if (icon) icon.classList.add('rotate-icon');
                    } else {
                        menu.classList.add('hidden');
                        menu.classList.remove('submenu-open');
                        if (icon) icon.classList.remove('rotate-icon');
                    }
                }

                // Handle Mobile Sidebar Toggle
                function toggleMobileSidebar() {
                    const sidebar = document.getElementById('sidebar');
                    if (sidebar.classList.contains('-ml-64')) {
                        sidebar.classList.remove('-ml-64', 'hidden');
                    } else {
                        // On small screens, hide it by sliding out
                        if (window.innerWidth < 1024) {
                            sidebar.classList.add('-ml-64', 'hidden');
                        }
                    }
                }

                // Close dropdowns if clicking outside
                window.addEventListener('click', function (e) {
                    if (!e.target.closest('.relative')) {
                        const topMenus = ['menu-drivers', 'menu-chrome', 'menu-profile'];
                        topMenus.forEach(id => {
                            const menu = document.getElementById(id);
                            if (menu && !menu.classList.contains('hidden')) {
                                menu.classList.add('hidden');
                                menu.classList.remove('submenu-open');
                            }
                        });
                    }
                });

                // Copy Chrome Flag
                function copyChromeFlag() {
                    var copyText = document.getElementById("chromeFlagInput");
                    copyText.select();
                    copyText.setSelectionRange(0, 99999); /* For mobile */
                    navigator.clipboard.writeText(copyText.value).then(() => {
                        alert("Chrome Flag Copied Successfully!");
                    });
                }
            </script>

            <!-- Main Content Area (To be filled by included pages) -->
            <div class="flex-1 overflow-y-auto p-4 sm:p-6 lg:p-8">
                <!-- Page content from other files will render here -->
            </div>
        </main>
    </div>

    <!-- General JS Scripts -->
    <script src="assets/bundles/lib.vendor.bundle.js"></script>
    <script src="js/CodiePie.js"></script>

    <!-- JS Libraies -->
    <script src="assets/modules/jquery.sparkline.min.js"></script>
    <script src="assets/modules/chart.min.js"></script>
    <script src="assets/modules/owlcarousel2/dist/owl.carousel.min.js"></script>
    <script src="assets/modules/summernote/summernote-bs4.js"></script>
    <script src="assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

    <!-- Page Specific JS File -->
    <script src="js/page/index.js"></script>

    <!-- Template JS File -->
    <script src="js/scripts.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>