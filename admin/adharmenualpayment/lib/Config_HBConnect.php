<?php
error_reporting(0);
include '../../config.php';              
$upiuid = 'paytm.s1hizdo@pty';   
$secret='INuLkgv8oM';                         
$token = 'a7a4ac-737e0e-05cb7f-dc8d47-672d3e'; 
$orderId = time();
$txnAmount = '20';
$txnNote = $_GET['aadharmanualid'];
$cust_Mobile ="7779964630";          
$cust_Email = "info@adprint.in";        // Put your  email   ID
$callback_url = 'https://printportals.xyz/admin/adharmenualpayment/pgResponse.php';
$RECHPAY_ENVIRONMENT = 'PROD';              // PROD, TEST
$RECHPAY_TXN_URL='https://sellser.xyz/order/process';
$RECHPAY_STATUS_URL='https://sellser.xyz/order/status';
if($RECHPAY_ENVIRONMENT == 'PROD') {
$RECHPAY_TXN_URL='https://sellser.xyz/order/paytm';
$RECHPAY_STATUS_URL='https://sellser.xyz/order/status';
}
?>