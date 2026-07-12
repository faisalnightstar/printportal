<?php
error_reporting(0);
include '../../../config.php'; 
$upiuid = 'paytm.s1hizdo@pty';   
$secret='INuLkgv8oM';                          
$token = 'a7a4ac-737e0e-05cb7f-dc8d47-672d3e';
$orderId = time();
$txnAmount = "2999";
$txnNote = $_GET['userid'];
$cust_Mobile = "9940368437";
$cust_Email = "info@printportalcard.in";
$callback_url = 'https://printportals.xyz/admin/HBConnect/whitelabel/pgResponse.php';
$RECHPAY_ENVIRONMENT = 'PROD'; 
$RECHPAY_TXN_URL='https://sellser.xyz/order/process';
$RECHPAY_STATUS_URL='https://sellser.xyz/order/status';
if($RECHPAY_ENVIRONMENT == 'PROD') {
$RECHPAY_TXN_URL='https://sellser.xyz/order/paytm';
$RECHPAY_STATUS_URL='https://sellser.xyz/order/status';
}
?>