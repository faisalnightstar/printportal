<?php
error_reporting(0);
include '../../config.php';                    // connect your website DATABASE { config.php }
$upiuid = 'paytm.s1hizdo@pty';    //You Upiuid is (Paytm Business qr )- https://example.com/PaytmBusiness
$secret='INuLkgv8oM';                          // Your Secret Key, (Url:http://example.com/Settings)
$token = 'a7a4ac-737e0e-05cb7f-dc8d47-672d3e';  // Your token Key, (Url:http://example.com/Settings)
$orderId = time();
$txnAmount = '50';
$txnNote = $_GET['id'];
$cust_Mobile ="7779964630";          
$cust_Email = "info@mybestprint.in";        // Put your  email   ID
$callback_url = 'https://printportals.xyz/admin/dlpay/pgResponse.php';
$RECHPAY_ENVIRONMENT = 'PROD';              // PROD, TEST
$RECHPAY_TXN_URL='https://paytm.indiprintportal.in/order/process';
$RECHPAY_STATUS_URL='https://hbconnect.live/order/status';
if($RECHPAY_ENVIRONMENT == 'PROD') {
$RECHPAY_TXN_URL='https://paytm.indiprintportal.in/order/paytm';
$RECHPAY_STATUS_URL='https://paytm.indiprintportal.in/order/status';
}
?>