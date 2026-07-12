<?php
session_start();
error_reporting(0); // Suppress raw warnings to prevent layout breaking

$msg = "";
$msgno = "";

// Graceful database inclusion
if (file_exists("config.php")) {
    include("config.php");
    
    if(isset($_POST['register']) && isset($connection)) {
        // Sanitize inputs to prevent SQL injection
        $usertype = mysqli_real_escape_string($connection, strtoupper(trim($_POST['usertype'])));
        $username = mysqli_real_escape_string($connection, strtoupper(trim($_POST['username'])));
        $state    = mysqli_real_escape_string($connection, strtoupper(trim($_POST['state'])));
        $mobileno = mysqli_real_escape_string($connection, trim($_POST['mobileno']));
        $emailid  = mysqli_real_escape_string($connection, strtolower(trim($_POST['emailid'])));
        
        // Backend controlled defaults (preventing form manipulation)
        $password     = $mobileno; // As per original logic, password defaults to mobile number
        $address      = '';
        $city         = '';
        $aadhar       = '';
        $remark       = 'NEW REGISTRATION';
        $walletamount = '0';
        $aadharpoint  = '1';
        $rid          = 1; // Default reference ID
        
        // 1. Check if Mobile/Login ID already exists
        $check_mobile = mysqli_query($connection, "SELECT loginname FROM tbluser WHERE loginname='$mobileno'");
        
        if($check_mobile && mysqli_num_rows($check_mobile) > 0) {
            $msgno = 'This Mobile Number / Login ID is already registered!';
        } else {
            // 2. Check if Email already exists
            $check_email = mysqli_query($connection, "SELECT emailid FROM tbluser WHERE emailid='$emailid'");
            
            if($check_email && mysqli_num_rows($check_email) > 0) {
                $msgno = 'This Email ID is already registered!';
            } else {
                // 3. Insert new user record
                $query = "INSERT INTO `tbluser`
                          (`fullname`, `usertype`, `loginname`, `emailid`, `adhaarno`, `address`, `cityname`, `statename`,
                           `mobileno`, `pswrd`, `remarks`, `walletamount`, `loginid`, `logdate`, `refrenceid`, `userrate`, `ispaid`, `status`) 
                          VALUES ('$username', '$usertype', '$mobileno', '$emailid', '$aadhar', '$address', '$city', '$state',
                          '$mobileno', '$password', '$remark', '$walletamount', 1, now(), $rid, $aadharpoint, 1, 1)";
                
                $aquery = mysqli_query($connection, $query);

                if($aquery) {
                    $msg = "Registration Successful! Your Login ID and Password is: <strong>$mobileno</strong>";
                } else {
                    $msgno = "System Error: Registration failed. Please try again later.";
                }
            }
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
    <title>Create Account | Print Portals</title>
    <meta name="description" content="Register for a free Print Portals retailer account. Gain instant access to our secure PVC card formatting tools for Aadhaar, Voter ID, and PAN.">
    <meta name="author" content="Print Portals">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://printportals.xyz/register.php" />
    
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
                    <a href="index.php" class="flex items-center gap-2 text-white font-bold text-2xl tracking-tight">
                        <span class="text-brand-light">PRINT</span> <span class="text-brand-accent">PORTALS</span>
                    </a>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-6">
                        <a href="index.php" class="text-gray-300 hover:text-brand-accent px-3 py-2 rounded-md text-sm font-medium transition-colors">Home</a>
                        <a href="service.php" class="text-gray-300 hover:text-brand-accent px-3 py-2 rounded-md text-sm font-medium transition-colors">Services</a>
                        <a href="abouts.php" class="text-gray-300 hover:text-brand-accent px-3 py-2 rounded-md text-sm font-medium transition-colors">About Us</a>
                        <a href="contacts.php" class="text-gray-300 hover:text-brand-accent px-3 py-2 rounded-md text-sm font-medium transition-colors">Contact</a>
                        <a href="login.php" class="border-2 border-brand-accent text-brand-accent hover:bg-brand-accent hover:text-white px-4 py-2 rounded-md text-sm font-bold transition-all">Login</a>
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
        <div class="max-w-xl w-full space-y-8 bg-white p-10 rounded-2xl shadow-xl border border-gray-100">
            
            <!-- Branding & Titles -->
            <div class="text-center">
                <h2 class="mt-2 text-3xl font-extrabold text-gray-900">
                    Create Your Account
                </h2>
                <p class="mt-2 text-sm text-gray-600">
                    Join thousands of retailers using Print Portals today.
                </p>
            </div>

            <!-- PHP Dynamic Alerts -->
            <?php if($msg != ""): ?>
            <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-4 rounded-lg relative shadow-sm" role="alert">
                <div class="flex items-center">
                    <svg class="h-6 w-6 mr-2 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span class="block sm:inline font-medium"><?php echo $msg; ?></span>
                </div>
            </div>
            <?php endif; ?>

            <?php if($msgno != ""): ?>
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg relative shadow-sm" role="alert">
                <div class="flex items-center">
                    <svg class="h-6 w-6 mr-2 text-red-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span class="block sm:inline font-medium"><?php echo $msgno; ?></span>
                </div>
            </div>
            <?php endif; ?>

            <!-- Registration Form -->
            <form class="mt-8 space-y-6" action="" method="POST">
                <div class="space-y-4">
                    
                    <!-- User Type Selection -->
                    <div>
                        <label for="usertype" class="block text-sm font-medium text-gray-700 mb-1">Select User Type</label>
                        <select id="usertype" name="usertype" required class="focus:ring-brand-light focus:border-brand-light block w-full sm:text-sm border-gray-300 rounded-lg py-3 px-4 bg-gray-50 border outline-none transition-colors appearance-none">
                            <option value="">-- Choose Account Type --</option>
                            <option value="RETAILER">Retailer</option>
                            <option value="DISTRIBUTER">Distributer</option>
                            <option value="SUPER DISTRIBUTER">Super Distributer</option>
                            <option value="MASTER ADMIN">Master Admin</option>
                        </select>
                    </div>

                    <!-- Full Name -->
                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                        <div class="relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            </div>
                            <input id="username" name="username" type="text" required class="focus:ring-brand-light focus:border-brand-light block w-full pl-10 sm:text-sm border-gray-300 rounded-lg py-3 bg-gray-50 border outline-none transition-colors" placeholder="e.g. Rahul Kumar">
                        </div>
                    </div>

                    <!-- State Selection -->
                    <div>
                        <label for="state" class="block text-sm font-medium text-gray-700 mb-1">State</label>
                        <select id="state" name="state" required class="focus:ring-brand-light focus:border-brand-light block w-full sm:text-sm border-gray-300 rounded-lg py-3 px-4 bg-gray-50 border outline-none transition-colors appearance-none">
                            <option value="">-- Select Your State --</option>
                            <option value="Andhra Pradesh">Andhra Pradesh</option>
                            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                            <option value="Assam">Assam</option>
                            <option value="Bihar">Bihar</option>
                            <option value="Chandigarh">Chandigarh</option>
                            <option value="Chhattisgarh">Chhattisgarh</option>
                            <option value="Delhi">Delhi</option>
                            <option value="Gujarat">Gujarat</option>
                            <option value="Haryana">Haryana</option>
                            <option value="Himachal Pradesh">Himachal Pradesh</option>
                            <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                            <option value="Jharkhand">Jharkhand</option>
                            <option value="Karnataka">Karnataka</option>
                            <option value="Kerala">Kerala</option>
                            <option value="Madhya Pradesh">Madhya Pradesh</option>
                            <option value="Maharashtra">Maharashtra</option>
                            <option value="Manipur">Manipur</option>
                            <option value="Meghalaya">Meghalaya</option>
                            <option value="Orissa">Orissa</option>
                            <option value="Puducherry">Puducherry</option>
                            <option value="Punjab">Punjab</option>
                            <option value="Rajasthan">Rajasthan</option>
                            <option value="Tamil Nadu">Tamil Nadu</option>
                            <option value="Telangana">Telangana</option>
                            <option value="Tripura">Tripura</option>
                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                            <option value="Uttarakhand">Uttarakhand</option>
                            <option value="West Bengal">West Bengal</option>
                        </select>
                    </div>

                    <!-- Mobile Number (Used as ID and Password) -->
                    <div>
                        <label for="mobileno" class="block text-sm font-medium text-gray-700 mb-1">Mobile Number (Login ID)</label>
                        <div class="relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm">+91</span>
                            </div>
                            <input id="mobileno" name="mobileno" type="tel" pattern="[0-9]{10}" maxlength="10" required class="focus:ring-brand-light focus:border-brand-light block w-full pl-10 sm:text-sm border-gray-300 rounded-lg py-3 bg-gray-50 border outline-none transition-colors" placeholder="10-digit mobile number">
                        </div>
                        <p class="mt-1 text-xs text-gray-500">Your mobile number will serve as your initial Login ID and Password.</p>
                    </div>

                    <!-- Email Address -->
                    <div>
                        <label for="emailid" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                        <div class="relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <input id="emailid" name="emailid" type="email" required class="focus:ring-brand-light focus:border-brand-light block w-full pl-10 sm:text-sm border-gray-300 rounded-lg py-3 bg-gray-50 border outline-none transition-colors" placeholder="your@email.com">
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="pt-2">
                    <button type="submit" name="register" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-bold rounded-lg text-white bg-brand-light hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand-light transition-colors shadow-md">
                        Complete Registration
                        <svg class="ml-2 -mr-1 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </button>
                </div>
            </form>
            
            <div class="mt-6 text-center border-t border-gray-100 pt-6">
                <p class="text-sm text-gray-600 mb-4">Already have an account?</p>
                <a href="login.php" class="w-full flex justify-center py-3 px-4 border-2 border-brand-dark text-sm font-bold rounded-lg text-brand-dark hover:bg-brand-dark hover:text-white transition-all">
                    Back to Login Page
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