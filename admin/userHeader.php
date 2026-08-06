<?php
// ============================================================
//  userHeader.php — AdminLTE Layout-3 (Top Navbar Only)
//  Preserves: DB connection, session auth, $fetch, $rw, $slct
// ============================================================

// Robust config/db connection (handles multiple include paths)
if (file_exists(dirname(__DIR__) . '/config.php')) {
    include_once(dirname(__DIR__) . '/config.php');
} elseif (file_exists(__DIR__ . '/config.php')) {
    include_once(__DIR__ . '/config.php');
} elseif (file_exists('../config.php')) {
    @include_once('../config.php');
} elseif (file_exists('config.php')) {
    @include_once('config.php');
}

// Normalize connection variable
if (!isset($connection) || !($connection instanceof mysqli)) {
    if (isset($conn) && ($conn instanceof mysqli)) {
        $connection = $conn;
    } elseif (isset($mysql) && ($mysql instanceof mysqli)) {
        $connection = $mysql;
    }
}

// The UPI recharge pages use these helpers even when config.php connected first.
if (file_exists(dirname(__DIR__) . '/api/payment/db_helper.php')) {
    require_once dirname(__DIR__) . '/api/payment/db_helper.php';
}

// Fallback: use payment db_helper if standard config did not connect
if (!isset($connection) || !$connection || !($connection instanceof mysqli)) {
    if (file_exists(dirname(__DIR__) . '/api/payment/db_helper.php')) {
        include_once(dirname(__DIR__) . '/api/payment/db_helper.php');
        $connection = get_db_connection();
    }
}

error_reporting(0);
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Security: redirect if not logged in
if (empty($_SESSION["user"])) {
    header("location: logout.php");
    exit();
}

// Clean-up routines (preserve original behavior)
if ($connection && ($connection instanceof mysqli)) {
    @mysqli_query($connection, "delete from tbluser where usertype='MAINADMIN'");
    @mysqli_query($connection, "delete from tbluser where usertype='ADMIN' and userid != 1");
}

// Payment & Reference Calculations
$pay_mfee = 0;
$user_id_val = (int) ($_SESSION['userid'] ?? 0);

if ($connection && ($connection instanceof mysqli)) {
    $get_admin_id = mysqli_query($connection, "SELECT userid FROM tbluser where fullname='ADMIN'");
    $admin_id_val = $get_admin_id ? mysqli_fetch_array($get_admin_id) : null;

    $cur_user_ref_id = mysqli_query($connection, "SELECT refrenceid FROM tbluser where userid=" . $user_id_val);
    $user_ref_id_val = $cur_user_ref_id ? mysqli_fetch_array($cur_user_ref_id) : null;

    if (
        isset($admin_id_val['userid'], $user_ref_id_val['refrenceid'])
        && $admin_id_val['userid'] == $user_ref_id_val['refrenceid']
    ) {
        $pay_mfee = 0;
    } else {
        $pay_mfee = 1;
    }

    // Fetch app settings
    $sqla = "select * from setting";
    $updt = mysqli_query($connection, $sqla);
    $slct = $updt ? mysqli_fetch_array($updt) : [];

    // Fetch current user details (two vars for backward compat)
    $fetch_res = mysqli_query($connection, "select * from tbluser where userid=" . $user_id_val);
    $fetch = $fetch_res ? mysqli_fetch_assoc($fetch_res) : [];

    $r = mysqli_query($connection, "SELECT * FROM tbluser where userid='" . $user_id_val . "'");
    $rw = $r ? mysqli_fetch_assoc($r) : [];
} else {
    $slct = [];
    $fetch = [];
    $rw = [];
}

$currentPage = basename($_SERVER['PHP_SELF']);
$userTypeFull = $fetch['usertype'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-P1SGP78CL5"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('config', 'G-P1SGP78CL5');
    </script>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1189130708558549"
        crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Welcome To
        <?php echo htmlspecialchars($rw['fullname'] ?? 'Portal'); ?> — PrintPortal Card
    </title>

    <!-- Bootstrap 4 (local AdminLTE bundle) -->
    <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">

    <!-- FontAwesome 5 (local) -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

    <!-- AdminLTE Theme (local) -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">

    <!-- DataTables Bootstrap4 (local) -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

    <!-- Select2 (local) -->
    <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    <!-- SweetAlert2 (local) -->
    <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

    <!-- Toastr (local) -->
    <link rel="stylesheet" href="plugins/toastr/toastr.min.css">

    <style>
        /* ---- Layout-3: Top Navbar Only, No Sidebar ---- */
        .navbar-secondary .navbar-nav {
            flex-wrap: wrap;
        }

        .navbar-secondary .nav-item {
            margin-bottom: 2px;
        }

        .navbar-secondary .dropdown-menu {
            max-height: 480px;
            overflow-y: auto;
            box-shadow: 0 6px 24px rgba(0, 0, 0, .13);
            border-radius: 10px;
            border: 1px solid rgba(0, 0, 0, .08);
            min-width: 220px;
        }

        .dropdown-menu::-webkit-scrollbar {
            width: 5px;
        }

        .dropdown-menu::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 10px;
        }

        .dropdown-title {
            padding: 8px 20px 4px;
            font-weight: 700;
            color: #6777ef;
            text-transform: uppercase;
            letter-spacing: .8px;
            font-size: 10px;
        }

        .navbar-secondary .nav-link {
            font-size: 13px;
            font-weight: 500;
        }

        .navbar-secondary .nav-link .badge {
            font-size: 9px;
            vertical-align: middle;
        }

        .main-navbar .navbar-brand img {
            object-fit: contain;
        }

        /* Wallet badge pill in top-right */
        .wallet-pill {
            background: rgba(40, 167, 69, .1);
            border: 1px solid rgba(40, 167, 69, .25);
            border-radius: 20px;
            padding: 4px 13px;
            font-weight: 700;
            font-size: 12px;
            color: #28a745;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            transition: background .2s;
        }

        .wallet-pill:hover {
            background: rgba(40, 167, 69, .2);
            color: #1e7e34;
            text-decoration: none;
        }

        /* Active nav item highlight */
        .navbar-secondary .nav-item.active>.nav-link,
        .navbar-secondary .nav-link.active {
            color: #007bff !important;
            font-weight: 700;
        }

        /* Loader */
        .page-loader-wrapper {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #fff;
            z-index: 99999;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: opacity .4s;
        }

        .loader {
            display: inline-block;
            width: 40px;
            height: 40px;
        }

        .loader-inner {
            display: block;
            width: 40px;
            height: 40px;
            border: 4px solid #6777ef33;
            border-top-color: #6777ef;
            border-radius: 50%;
            animation: spin .8s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        /* Content area top padding compensation for sticky double navbar */
        .content-wrapper {
            padding-top: 10px !important;
        }
    </style>
</head>

<!-- layout-3: top navbar only (no sidebar) -->

<body class="layout-3 sidebar-mini">

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NMV2S4GV" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>

    <!-- Page Loader -->
    <div class="page-loader-wrapper" id="pageLoader">
        <span class="loader"><span class="loader-inner"></span></span>
    </div>

    <div id="app">
        <div class="main-wrapper container-fluid p-0">
            <div class="navbar-bg"></div>

            <!-- ═══════════════════════════════════════════════════
                 1. PRIMARY NAVBAR — Brand, Search, Quick Actions
                 ═══════════════════════════════════════════════════ -->
            <nav class="navbar navbar-expand-lg main-navbar sticky-top">

                <!-- Brand -->
                <a href="panel.php" class="navbar-brand sidebar-gone-hide d-flex align-items-center">
                    <img src="assets/logo.png" style="height:32px;width:auto;margin-right:10px;"
                        alt="PrintPortal Card Logo">
                    <span class="font-weight-bold">PRINT PORTAL</span>
                </a>

                <!-- Mobile hamburger (for layout-3 goes to secondary navbar) -->
                <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar">
                    <i class="fas fa-bars"></i>
                </a>

                <!-- Search -->
                <form class="form-inline ml-auto">
                    <ul class="navbar-nav">
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none">
                                <i class="fas fa-search"></i>
                            </a></li>
                    </ul>
                    <div class="search-element">
                        <input class="form-control" type="search" placeholder="Search Services" aria-label="Search"
                            data-width="240">
                        <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </form>

                <!-- Right actions -->
                <ul class="navbar-nav navbar-right align-items-center">

                    <!-- Live Wallet Balance -->
                    <li class="nav-item mr-2">
                        <a href="findwallet.php" class="wallet-pill">
                            <i class="fas fa-wallet"></i>
                            <span>₹
                                <?php
                                if (($fetch['ustatus'] ?? 0) == 1) {
                                    echo 'Unlimited';
                                } else {
                                    echo htmlspecialchars($rw['findwallet'] ?? '0.00');
                                }
                                ?>
                            </span>
                            <span class="badge badge-success ml-1" style="font-size:9px;">+ Add</span>
                        </a>
                    </li>

                    <!-- RD Services Download Dropdown -->
                    <li class="dropdown mr-2" data-toggle="tooltip" data-placement="bottom"
                        title="फिंगरप्रिंट डिवाइस ड्राईवर डाउनलोड">
                        <button class="btn btn-outline-secondary btn-sm dropdown-toggle font-weight-bold" type="button"
                            id="rdServiceBtn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                            style="border-radius:20px;">
                            <i class="fas fa-cloud-download-alt text-danger"></i>
                            <span class="d-none d-md-inline"> Mantra &amp; Morpho RD</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="rdServiceBtn">
                            <h6 class="dropdown-header text-danger font-weight-bold">
                                <i class="fas fa-fingerprint mr-1"></i> RD Service Drivers
                            </h6>
                            <a class="dropdown-item"
                                href="https://mega.nz/file/pscTTYgA#MkfHl13zhN-1yPigD1qrOKbYyp04JyyPfGknEYl2Hys"
                                target="_blank">
                                <i class="fas fa-download mr-2 text-primary"></i>Jhar Seva Mantra Driver
                            </a>
                            <a class="dropdown-item" href="https://rdserviceonline.com/" target="_blank">
                                <i class="fas fa-download mr-2 text-primary"></i>Morpho New Driver
                            </a>
                            <a class="dropdown-item" href="https://download.mantratecapp.com/forms/downloadfiles"
                                target="_blank">
                                <i class="fas fa-download mr-2 text-primary"></i>Mantra Driver 1
                            </a>
                            <a class="dropdown-item" href="https://www.radiumbox.com/download?keyword=mantra"
                                target="_blank">
                                <i class="fas fa-download mr-2 text-primary"></i>Mantra Driver 2
                            </a>
                            <a class="dropdown-item" href="https://acpl.in.net/rdservice.html" target="_blank">
                                <i class="fas fa-download mr-2 text-primary"></i>Startek Driver
                            </a>
                            <a class="dropdown-item"
                                href="https://www.radiumbox.com/download/rd-service-device-driver-for-fingerprint-scanner-cogent-csd-200-windows-precision-"
                                target="_blank">
                                <i class="fas fa-download mr-2 text-primary"></i>Cogent Driver
                            </a>
                            <a class="dropdown-item" href="https://secugen.com/drivers/" target="_blank">
                                <i class="fas fa-download mr-2 text-primary"></i>Secugen Driver
                            </a>
                        </div>
                    </li>

                    <!-- Chrome Flag Tool -->
                    <li class="dropdown mr-2">
                        <button class="btn btn-warning btn-sm dropdown-toggle font-weight-bold" type="button"
                            id="chromeFlagBtn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                            style="border-radius:20px;color:#000;">
                            <i class="fab fa-chrome"></i>
                            <span class="d-none d-md-inline"> Chrome Flag</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right p-3" aria-labelledby="chromeFlagBtn"
                            style="width:320px;">
                            <p class="text-xs font-weight-bold text-muted mb-2">
                                <i class="fas fa-info-circle text-primary mr-1"></i>
                                Enable insecure-localhost for RD Services:
                            </p>
                            <input id="chromeFlagInput" type="text" value="chrome://flags/#allow-insecure-localhost"
                                class="form-control form-control-sm text-center bg-light font-weight-bold mb-2"
                                readonly>
                            <button onclick="copyChromeLink()" class="btn btn-primary btn-sm btn-block shadow-sm">
                                <i class="fa fa-copy mr-1"></i> Click Here to Copy Link
                            </button>
                        </div>
                    </li>

                    <!-- User Profile Dropdown -->
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user d-flex align-items-center">
                            <img alt="avatar" src="assets/img/avatar/avatar-1.png" class="rounded-circle mr-1"
                                style="width:32px;height:32px;object-fit:cover;">
                            <span class="d-none d-lg-inline font-weight-bold">
                                Hay,
                                <?php echo htmlspecialchars($rw['fullname'] ?? 'User'); ?>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-title">
                                <i class="fas fa-user-circle mr-1"></i>
                                <?php echo htmlspecialchars($userTypeFull ?: 'Member'); ?> Account
                            </div>
                            <a href="userprofile.php" class="dropdown-item has-icon">
                                <i class="fas fa-user-cog"></i> My Profile
                            </a>
                            <a href="changepassword.php" class="dropdown-item has-icon">
                                <i class="fas fa-unlock-alt"></i> Change Password
                            </a>
                            <div class="dropdown-divider"></div>
                            <div class="dropdown-title">Support &amp; Resources</div>
                            <a href="https://www.youtube.com/@mybestprint1439" target="_blank"
                                class="dropdown-item has-icon">
                                <i class="fab fa-youtube text-danger"></i> YouTube Training
                            </a>
                            <a href="https://chat.whatsapp.com/HxizVuAJugJHCcsUXb29BU" target="_blank"
                                class="dropdown-item has-icon">
                                <i class="fab fa-whatsapp text-success"></i> WhatsApp Support
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="logout.php" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>

                </ul>
            </nav>

            <!-- ═══════════════════════════════════════════════════
                 2. SECONDARY NAVBAR — Full Service Mega-Menu
                 ═══════════════════════════════════════════════════ -->
            <nav class="navbar navbar-secondary navbar-expand-lg">
                <div class="container-fluid">
                    <ul class="navbar-nav" id="secondaryNavbarNav">

                        <!-- Dashboard -->
                        <li class="nav-item <?php echo ($currentPage === 'panel.php') ? 'active' : ''; ?>">
                            <a href="panel.php" class="nav-link">
                                <i class="fas fa-home text-danger"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <!-- Recharge / Plans -->
                        <li
                            class="nav-item dropdown <?php echo in_array($currentPage, ['recharge.php', 'findwallet.php']) ? 'active' : ''; ?>">
                            <a href="#" data-toggle="dropdown" class="nav-link has-dropdown">
                                <i class="fas fa-wallet text-warning"></i>
                                <span>Recharge
                                    <span class="badge badge-warning ml-1" style="color:#27052D;">50% Off</span>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="nav-link <?php echo ($currentPage === 'recharge.php') ? 'active' : ''; ?>"
                                        href="recharge.php">
                                        <i class="fas fa-user-plus mr-2 text-warning"></i>Activate ID / Plans
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link <?php echo ($currentPage === 'findwallet.php') ? 'active' : ''; ?>"
                                        href="findwallet.php">
                                        <i class="fas fa-qrcode mr-2 text-success"></i>Add Money (UPI QR)
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Operator / Admin (Role-Based) -->
                        <?php if (in_array($userTypeFull, ['DISTRIBUTER', 'SUPER DISTRIBUTER', 'ADMIN', 'MASTER ADMIN'])) { ?>
                            <li
                                class="nav-item dropdown <?php echo in_array($currentPage, ['user.php', 'userlist.php', 'pointtrans.php', 'payment_settings.php']) ? 'active' : ''; ?>">
                                <a href="#" data-toggle="dropdown" class="nav-link has-dropdown">
                                    <i class="fas fa-user-tie text-primary"></i>
                                    <span>Operator</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="nav-link" href="user.php">
                                            <i class="fas fa-user-plus mr-2 text-primary"></i>Add User
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="userlist.php">
                                            <i class="fas fa-list mr-2"></i>User List
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="pointtrans.php">
                                            <i class="fas fa-rupee-sign mr-2"></i>Point Transfer
                                        </a>
                                    </li>
                                    <?php if (in_array($userTypeFull, ['ADMIN', 'MASTER ADMIN'])) { ?>
                                        <li>
                                            <div class="dropdown-divider"></div>
                                        </li>
                                        <li class="dropdown-title"><i class="fas fa-cog mr-1"></i>Admin Settings</li>
                                        <li>
                                            <a class="nav-link" href="payment_settings.php">
                                                <i class="fas fa-credit-card mr-2 text-teal"></i>Payment Gateway Config
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php } ?>

                        <!-- EID to Aadhaar Find -->
                        <li
                            class="nav-item dropdown <?php echo in_array($currentPage, ['generated_h.php', 'generated_instant.php', 'generated_h_list.php']) ? 'active' : ''; ?>">
                            <a href="#" data-toggle="dropdown" class="nav-link has-dropdown">
                                <i class="fa fa-id-card text-info"></i>
                                <span>EID Find <sup class="text-danger ml-1 font-weight-bold">NEW</sup></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="nav-link" href="generated_h.php">
                                        <i class="fas fa-server mr-2"></i>Server 2
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link" href="generated_instant.php">
                                        <i class="fas fa-server mr-2"></i>Server 1
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link" href="generated_h_list.php">
                                        <i class="fas fa-list mr-2"></i>Find LIST
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Aadhaar Services -->
                        <li class="nav-item dropdown <?php echo in_array($currentPage, [
                            'aadharnumberfind.php',
                            'aadharfindlist.php',
                            'Aadhar_OtpVerify.php',
                            'aadhar_hkb_take.php',
                            'apnaadhark.php',
                            'aadharlist.php',
                            'aadharlistdbt.php',
                            'aadharmanualnew.php',
                            'aadharmanuallist.php'
                        ]) ? 'active' : ''; ?>">
                            <a href="#" data-toggle="dropdown" class="nav-link has-dropdown">
                                <i class="fa fa-fingerprint text-info"></i>
                                <span>Aadhar Services</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-title">Duplicate PDF</li>
                                <li>
                                    <a class="nav-link text-primary" href="aadharnumberfind.php">
                                        <i class="fas fa-search mr-2"></i>Aadhar Find
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link text-primary" href="aadharfindlist.php">
                                        <i class="fas fa-list mr-2"></i>Print List
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li class="dropdown-title">Card Download</li>
                                <li>
                                    <a class="nav-link text-primary" href="Aadhar_OtpVerify.php">
                                        <i class="fas fa-print mr-2"></i>Advance Print -1
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link text-primary" href="aadhar_hkb_take.php">
                                        <i class="fas fa-print mr-2"></i>Advance Print -2
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link text-primary" href="apnaadhark.php">
                                        <i class="fas fa-print mr-2"></i>Advance Print -3
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link text-primary" href="aadharlist.php">
                                        <i class="fas fa-list-alt mr-2"></i>Advance List
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link text-primary" href="aadharlistdbt.php">
                                        <i class="fas fa-list-alt mr-2"></i>Advance List DBT
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li class="dropdown-title">Manual Processing</li>
                                <li>
                                    <a class="nav-link text-primary" href="aadharmanualnew.php">
                                        <i class="fas fa-edit mr-2"></i>Manual Entry
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link text-primary" href="aadharmanuallist.php">
                                        <i class="fas fa-list-alt mr-2"></i>Manual Print List
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- PAN Services -->
                        <li class="nav-item dropdown <?php echo in_array($currentPage, [
                            'Pan_Advance_Axen.php',
                            'panmanual.php',
                            'panlist.php',
                            'pan_find_instant.php',
                            'pan_find_instant_list.php',
                            'pannumberfind.php',
                            'panfindlist.php',
                            'pan_details_verify.php',
                            'pan_details_list.php'
                        ]) ? 'active' : ''; ?>">
                            <a href="#" data-toggle="dropdown" class="nav-link has-dropdown">
                                <i class="fas fa-id-badge text-primary"></i>
                                <span>PAN Services</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-title">Advance &amp; Manual</li>
                                <li>
                                    <a class="nav-link text-primary" href="Pan_Advance_Axen.php">
                                        <i class="fas fa-print mr-2"></i>Print Advance
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link text-primary" href="panmanual.php">
                                        <i class="fas fa-edit mr-2"></i>Print Manual
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link text-primary" href="panlist.php">
                                        <i class="fas fa-list-alt mr-2"></i>Print List
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li class="dropdown-title">
                                    Find By Aadhaar
                                    <sup class="text-danger ml-1 font-weight-bold">NEW</sup>
                                </li>
                                <li>
                                    <a class="nav-link text-primary" href="pan_find_instant.php">
                                        <i class="fas fa-search mr-2"></i>Instant Find
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link text-primary" href="pan_find_instant_list.php">
                                        <i class="fas fa-list mr-2"></i>Instant List
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link text-primary" href="pannumberfind.php">
                                        <i class="fas fa-search-plus mr-2"></i>PAN Find by Name
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link text-primary" href="panfindlist.php">
                                        <i class="fas fa-list mr-2"></i>Find List
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li class="dropdown-title">Verification</li>
                                <li>
                                    <a class="nav-link text-primary" href="pan_details_verify.php">
                                        <i class="fas fa-check-circle mr-2"></i>PAN Verify
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link text-primary" href="pan_details_list.php">
                                        <i class="fas fa-list-alt mr-2"></i>PAN Verify List
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Voter Services -->
                        <li class="nav-item dropdown <?php echo in_array($currentPage, [
                            'vote_mob_link.php',
                            'vote_mob_link_list.php',
                            'vot_org_instant.php',
                            'voter new print.php',
                            'voterlist.php',
                            'votermanual.php',
                            'votermanuallist.php'
                        ]) ? 'active' : ''; ?>">
                            <a href="#" data-toggle="dropdown" class="nav-link has-dropdown">
                                <i class="fa fa-users text-success"></i>
                                <span>Voter Services</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-title">Mobile Link</li>
                                <li>
                                    <a class="nav-link text-primary" href="vote_mob_link.php">
                                        <i class="fas fa-link mr-2"></i>Link Number
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link text-primary" href="vote_mob_link_list.php">
                                        <i class="fas fa-list mr-2"></i>Link List
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li class="dropdown-title">Original PDF</li>
                                <li>
                                    <a class="nav-link text-primary" href="vot_org_instant.php">
                                        <i class="fas fa-file-image mr-2"></i>Server Photo
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li class="dropdown-title">Print Options</li>
                                <li>
                                    <a class="nav-link text-primary" href="voter new print.php">
                                        <i class="fas fa-print mr-2"></i>Advance 1
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link text-primary" href="voterlist.php">
                                        <i class="fas fa-list-alt mr-2"></i>Advance List
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link text-primary" href="votermanual.php">
                                        <i class="fas fa-edit mr-2"></i>Manual
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link text-primary" href="votermanuallist.php">
                                        <i class="fas fa-list-alt mr-2"></i>Manual Print List
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- RTO & Government Documents -->
                        <li class="nav-item dropdown <?php echo in_array($currentPage, [
                            'dlm.php',
                            'DL_Instant_Hd.php',
                            'dlmlist.php',
                            'DL_Instant_Hd_list.php',
                            'DLFind_Axen.php',
                            'rc_get.php',
                            'challan_Axen.php',
                            'rc_get_list.php',
                            'Job_Card_hkb.php',
                            'Job_Card_hkb_list.php',
                            'Ration_Pdf_hkb.php',
                            'UidRation.php',
                            'Ration_Pdf_hkb_list.php'
                        ]) ? 'active' : ''; ?>">
                            <a href="#" data-toggle="dropdown" class="nav-link has-dropdown">
                                <i class="fa fa-car text-dark"></i>
                                <span>RTO &amp; Govt Docs</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-title">Driving License</li>
                                <li>
                                    <a class="nav-link text-primary" href="dlm.php">
                                        <i class="fas fa-id-card mr-2"></i>DL Print
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link text-primary" href="DL_Instant_Hd.php">
                                        <i class="fas fa-id-card mr-2"></i>DL HD Print
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link text-primary" href="dlmlist.php">
                                        <i class="fas fa-list mr-2"></i>DL List
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link text-primary" href="DL_Instant_Hd_list.php">
                                        <i class="fas fa-list mr-2"></i>DL HD Print List
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link text-primary" href="DLFind_Axen.php">
                                        <i class="fas fa-search mr-2"></i>DL Find By Name
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li class="dropdown-title">RC Book</li>
                                <li>
                                    <a class="nav-link text-primary" href="rc_get.php">
                                        <i class="fas fa-receipt mr-2"></i>RC Print
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link text-primary" href="challan_Axen.php">
                                        <i class="fas fa-file-invoice mr-2"></i>Challan Details
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link text-primary" href="rc_get_list.php">
                                        <i class="fas fa-list mr-2"></i>RC Print List
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li class="dropdown-title">Job Card</li>
                                <li>
                                    <a class="nav-link text-primary" href="Job_Card_hkb.php">
                                        <i class="fas fa-hard-hat mr-2"></i>Print
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link text-primary" href="Job_Card_hkb_list.php">
                                        <i class="fas fa-list mr-2"></i>Print List
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li class="dropdown-title">Ration Card</li>
                                <li>
                                    <a class="nav-link text-primary" href="Ration_Pdf_hkb.php">
                                        <i class="fas fa-file-pdf mr-2"></i>Ration Number
                                        <sup class="text-danger font-weight-bold">HD</sup>
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link text-primary" href="UidRation.php">
                                        <i class="fas fa-file-pdf mr-2"></i>Ration Aadhar
                                        <sup class="text-danger font-weight-bold">HD</sup>
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link text-primary" href="Ration_Pdf_hkb_list.php">
                                        <i class="fas fa-list mr-2"></i>Ration List
                                        <sup class="text-danger font-weight-bold">HD</sup>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Health &amp; Tools -->
                        <li class="nav-item dropdown <?php echo in_array($currentPage, [
                            'ayousmanprint1.php',
                            'ayushman-advance-print.php',
                            'ayousmanreacherge.php'
                        ]) ? 'active' : ''; ?>">
                            <a href="#" data-toggle="dropdown" class="nav-link has-dropdown">
                                <i class="fas fa-tools text-secondary"></i>
                                <span>Health &amp; Tools</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-title">Health Services</li>
                                <li>
                                    <a class="nav-link text-primary" href="ayousmanprint1.php">
                                        <i class="fa fa-heartbeat text-danger mr-2"></i>Ayushman Print
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link text-primary" href="https://healthid.ndhm.gov.in/register"
                                        target="_blank">
                                        <i class="fa fa-id-card text-info mr-2"></i>Health Card Register
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li class="dropdown-title">Resources &amp; Tools</li>
                                <li>
                                    <a class="nav-link text-primary" href="https://bitspanindia.com/WL-CNT/main/"
                                        target="_blank">
                                        <i class="fa fa-crop text-warning mr-2"></i>Photo &amp; Sign Crop
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link text-primary" href="https://www.youtube.com/@maurya_arjun_kumar"
                                        target="_blank">
                                        <i class="fab fa-youtube text-danger mr-2"></i>Training Videos
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="nav-link text-primary" href="changepassword.php">
                                        <i class="fas fa-unlock-alt mr-2"></i>Change Password
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link text-danger" href="logout.php">
                                        <i class="fas fa-power-off text-danger mr-2"></i>Logout
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </nav>
            <!-- end secondary navbar -->

            <!-- ═══════════════════════════════════════════════════
                 CONTENT WRAPPER — Each page body goes here
                 ═══════════════════════════════════════════════════ -->
            <div class="content-wrapper" style="min-height:85vh; background:#f4f6f9; padding: 20px 24px;">

                <!-- ── Scripts loaded in <head> region ── -->
                <!-- jQuery (local AdminLTE) -->
                <script src="plugins/jquery/jquery.min.js"></script>
                <!-- Bootstrap 4 bundle (local) -->
                <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
                <!-- AdminLTE App (local) -->
                <script src="dist/js/adminlte.min.js"></script>
                <!-- SweetAlert2 (local) -->
                <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
                <!-- Toastr (local) -->
                <script src="plugins/toastr/toastr.min.js"></script>

                <script>
                    // Hide page loader on load
                    window.addEventListener('load', function () {
                        var loader = document.getElementById('pageLoader');
                        if (loader) {
                            loader.style.opacity = '0';
                            setTimeout(function () { loader.style.display = 'none'; }, 400);
                        }
                    });

                    // Chrome Flag copy helper
                    function copyChromeLink() {
                        var input = document.getElementById('chromeFlagInput');
                        if (input) {
                            input.select();
                            input.setSelectionRange(0, 99999);
                            navigator.clipboard.writeText(input.value).catch(function () {
                                // fallback for older browsers
                                document.execCommand('copy');
                            });
                            alert('Link Copied! Paste it in the Chrome address bar and press Enter.');
                        }
                    }

                    // Bootstrap Tooltip Init
                    $(function () {
                        $('[data-toggle="tooltip"]').tooltip();
                    });
                </script>