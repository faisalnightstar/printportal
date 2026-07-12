<?php
//use phpmailer\PHPMailer\PHPMailer;
//use phpmailer\PHPMailer\Exception;
ini_set("allow_url_fopen","On");
ini_set("display_errors","Off");
ini_set('error_reporting', '0');
session_start();
include_once('configfile.php');
//include_once('phpmailer/src/PHPMailer.php');
//include_once('phpmailer/src/Exception.php');
include_once('db_functions.php');

//include_once('php-graph-5.x/src/Facebook/autoload.php');


//include_once('fb_functions.php');

//include_once('insta_functions.php');

include_once('codepitch_functions.php');
include_once('aadhar_functions.php');

//include_once('init.php');

//include_once('paypal_helper.php');




function codepitch_mail($array)
{
	
	$mail = new PHPMailer(true); 
	$mail->IsHTML(true);                              // Passing `true` enables exceptions
try {
     
     if(!isset($array['from_email']))
     {
		 $array['from_email'] = 'mail@zocofy.com';
	 }
	 
	 if(!isset($array['from_name']))
     {
		 $array['from_name'] = 'zocofy';
	 }
    //Recipients
    $mail->setFrom($array['from_email'], $array['from_name']);
    $mail->addAddress($array['to']);     // Add a recipient
   
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $array['subject'];
    $mail->Body    = $array['body'];
   // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    return $mail->send();
    //echo 'Message has been sent';
} catch (Exception $e) {
    error_log('Message could not be sent. Mailer Error: ', $mail->ErrorInfo);
}
}
?>