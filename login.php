<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
error_reporting(0); // Suppress raw warnings to prevent layout breaking

$msg = "";
$msgno = "";

// Graceful database inclusion to prevent fatal crashes if DB is down
if (file_exists("config.php")) {
    include("config.php");
    
    if(isset($_POST['submit']) && isset($connection)) {
        // Sanitize inputs to prevent basic SQL injection
        $loginname = mysqli_real_escape_string($connection, strtoupper(trim($_POST['loginid'])));
        $password = mysqli_real_escape_string($connection, trim($_POST['pass']));
        
        $query = "SELECT * FROM tbluser WHERE loginname = '$loginname'";
        $result = mysqli_query($connection, $query);

        if($result && mysqli_num_rows($result) > 0) {
            $b = mysqli_fetch_array($result);
            
            // Verify password, payment status, and account status
            if($b['pswrd'] == $password && $b['ispaid'] == 1 && $b['status'] == 1) {
                $_SESSION["user"] = "OK";
                $_SESSION['username'] = $b['fullname'];
                $_SESSION['usertype'] = $b['usertype'];
                $_SESSION['userid'] = $b['userid'];
                $_SESSION['aadharpoint'] = $b['aadharpoint'];
                $_SESSION['cardrate'] = $b['cardrate'];
                
                $msg = 'Login Successful! Redirecting...';
                
                // Smart redirect based on usertype
                $redirect_url = (strtolower($b['usertype']) == 'admin') ? 'admin/panel.php' : 'dashboard/dashboard.php';
                
                echo "<script>
                    setTimeout(function () {
                       window.location.href= '$redirect_url';
                    }, 1500);
                </script>";
            } else {
                $msgno = 'Incorrect username/password or account is inactive!';
            }
        } else {
            $msgno = 'Incorrect username/password!';
        }
    }
} else {
    $msgno = "System Error: Database configuration file is missing.";
}
?>
<!DOCTYPE html>
<html lang="en-IN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- SEO & Geo-Targeting -->
    <title>Login | Print Portals</title>
    <meta name="description" content="Secure login to Print Portals. Access your dashboard to instantly format and print Aadhaar, Voter ID, PAN, and Ayushman cards.">
    <meta name="author" content="Print Portals">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://printportals.xyz/login.php" />
    
    <!-- Open Graph / Social Media Meta Tags -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://printportals.xyz/login.php">
    <meta property="og:title" content="Login | Print Portals">
    <meta property="og:description" content="Access your Print Portals retailer dashboard. Fast and secure document printing services.">
    
    <!-- Google Fonts Integration -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind CSS (CDN for modern styling) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            dark: '#0f172a', /* Slate 900 */
                            light: '#3b82f6', /* Blue 500 */
                            accent: '#10b981' /* Emerald 500 */
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans antialiased flex flex-col min-h-screen">

    <!-- Navigation -->
    <nav class="bg-brand-dark sticky top-0 z-50 shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <div class="flex-shrink-0">
                    <a href="/" class="flex items-center gap-2 text-white font-bold text-2xl tracking-tight">
                        <span class="text-brand-light">PRINT</span> <span class="text-brand-accent">PORTALS</span>
                    </a>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-6">
                        <a href="index.php" class="text-gray-300 hover:text-brand-accent px-3 py-2 rounded-md text-sm font-medium transition-colors">Home</a>
                        <a href="service.php" class="text-gray-300 hover:text-brand-accent px-3 py-2 rounded-md text-sm font-medium transition-colors">Services</a>
                        <a href="abouts.php" class="text-gray-300 hover:text-brand-accent px-3 py-2 rounded-md text-sm font-medium transition-colors">About Us</a>
                        <a href="contacts.php" class="text-gray-300 hover:text-brand-accent px-3 py-2 rounded-md text-sm font-medium transition-colors">Contact</a>
                        <a href="login.php" class="text-brand-accent px-3 py-2 rounded-md text-sm font-bold transition-colors">Login</a>
                        <a href="register.php" class="bg-brand-accent text-white hover:bg-emerald-400 px-4 py-2 rounded-md text-sm font-bold transition-all shadow-sm">Register</a>
                    </div>
                </div>
                <!-- Mobile menu button -->
                <div class="-mr-2 flex md:hidden">
                    <button type="button" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-brand-light focus:outline-none">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <!-- Mobile Menu -->
        <div class="hidden md:hidden bg-brand-light" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="index.php" class="text-gray-300 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Home</a>
                <a href="service.php" class="text-gray-300 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Services</a>
                <a href="abouts.php" class="text-gray-300 hover:text-white block px-3 py-2 rounded-md text-base font-medium">About Us</a>
                <a href="contacts.php" class="text-gray-300 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Contact</a>
                <a href="login.php" class="text-white block px-3 py-2 font-bold">Login</a>
                <a href="register.php" class="bg-brand-accent text-white block px-3 py-2 rounded-md font-bold mt-2">Register</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="flex-grow flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-gray-50">
        <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-2xl shadow-xl border border-gray-100">
            
            <!-- Branding & Titles -->
            <div class="text-center">
                <h2 class="mt-2 text-3xl font-extrabold text-gray-900">
                    Welcome Back
                </h2>
                <p class="mt-2 text-sm text-gray-600">
                    Enter your credentials to access your portal.
                </p>
            </div>

            <!-- Service Notice (Replaced the Marquee) -->
            <div class="bg-blue-50 border-l-4 border-brand-light p-4 rounded-r-md">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-brand-light" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-xs text-blue-700 font-medium">
                            <strong>DL Print Available!</strong> Aadhaar to PAN Number search is now instant for just 30 Rupees via the admin service.
                        </p>
                    </div>
                </div>
            </div>

            <!-- PHP Dynamic Alerts -->
            <?php if($msg != ""): ?>
            <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg relative" role="alert">
                <span class="block sm:inline font-medium"><?php echo $msg; ?></span>
            </div>
            <?php endif; ?>

            <?php if($msgno != ""): ?>
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg relative" role="alert">
                <span class="block sm:inline font-medium"><?php echo $msgno; ?></span>
            </div>
            <?php endif; ?>

            <!-- Login Form -->
            <form class="mt-8 space-y-6" action="" method="POST">
                <div class="space-y-4">
                    
                    <!-- User ID Input -->
                    <div>
                        <label for="loginid" class="block text-sm font-medium text-gray-700 mb-1">User ID</label>
                        <div class="relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            </div>
                            <input id="loginid" name="loginid" type="text" required class="focus:ring-brand-light focus:border-brand-light block w-full pl-10 sm:text-sm border-gray-300 rounded-lg py-3 bg-gray-50 border outline-none transition-colors" placeholder="Enter your User ID">
                        </div>
                    </div>

                    <!-- Password Input -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <div class="relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            </div>
                            <input id="password" name="pass" type="password" required class="focus:ring-brand-light focus:border-brand-light block w-full pl-10 sm:text-sm border-gray-300 rounded-lg py-3 bg-gray-50 border outline-none transition-colors" placeholder="Enter your Password">
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-brand-light focus:ring-brand-light border-gray-300 rounded">
                        <label for="remember-me" class="ml-2 block text-sm text-gray-900">
                            Remember me
                        </label>
                    </div>

                    <div class="text-sm">
                        <a href="pass.php" class="font-medium text-brand-light hover:text-blue-700 transition-colors">
                            Forgot password?
                        </a>
                    </div>
                </div>

                <div>
                    <button type="submit" name="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-bold rounded-lg text-white bg-brand-light hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand-light transition-colors shadow-md">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <svg class="h-5 w-5 text-blue-400 group-hover:text-blue-300 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg>
                        </span>
                        Secure Login
                    </button>
                </div>
            </form>
            
            <div class="mt-6 text-center border-t border-gray-100 pt-6">
                <p class="text-sm text-gray-600 mb-4">Don't have an account yet?</p>
                <a href="register.php" class="w-full flex justify-center py-3 px-4 border-2 border-brand-accent text-sm font-bold rounded-lg text-brand-accent hover:bg-brand-accent hover:text-white transition-all">
                    Create New Account
                </a>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-6 border-b border-gray-800 pb-8">
                <div class="text-2xl font-bold tracking-tight">
                    <span class="text-brand-light">PRINT</span> <span class="text-brand-accent">PORTALS</span>
                </div>
                
                <!-- Main Nav Links -->
                <div class="flex space-x-6">
                    <a href="index.php" class="text-gray-400 hover:text-white transition-colors">Home</a>
                    <a href="service.php" class="text-gray-400 hover:text-white transition-colors">Services</a>
                    <a href="abouts.php" class="text-gray-400 hover:text-white transition-colors">About Us</a>
                    <a href="contacts.php" class="text-gray-400 hover:text-white transition-colors">Contact</a>
                </div>
            </div>
            
            <div class="flex flex-col md:flex-row justify-between items-center mt-8">
                <div class="text-center md:text-left text-gray-500 text-sm">
                    <p>&copy; <script>document.write(new Date().getFullYear())</script> Print Portals. All Rights Reserved.</p>
                    <p class="mt-2 text-xs max-w-xl">This platform operates independently to provide formatting and printing software tools for retailers. Use responsibly and in accordance with local regulations.</p>
                </div>
                
                <!-- Legal Links -->
                <div class="flex space-x-4 mt-6 md:mt-0 text-sm">
                    <a href="privacy-policy.php" class="text-gray-500 hover:text-brand-light transition-colors">Privacy Policy</a>
                    <a href="refund-policy.php" class="text-gray-500 hover:text-brand-light transition-colors">Refund/Cancellation</a>
                    <a href="Terms.php" class="text-gray-500 hover:text-brand-light transition-colors">Terms & Conditions</a>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>