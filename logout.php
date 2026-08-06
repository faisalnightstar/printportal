<?php
/**
 * Root Logout Handler
 * Clears active session and redirects to login.php
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Clear all session variables
$_SESSION = array();

// Invalidate session cookie
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Destroy session
@session_destroy();

// Redirect to root login page
header("Location: login.php");
echo '<script>window.location.href="login.php";</script>';
echo '<meta http-equiv="refresh" content="0;url=login.php" />';
exit();
?>
