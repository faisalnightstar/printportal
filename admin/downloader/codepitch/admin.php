<?php
if(!isset($_SESSION['admin_user_login']))  {
		        
	header("Location:".ADMIN_URL.'/login.php');
	exit;
}
?>
