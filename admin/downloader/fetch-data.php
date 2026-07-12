<?php
session_start();
include_once 'simple_html_dom.php';
//var_dump($_SESSION[]);
$server_output = $_SESSION['server_output'];

if(!$server_output)
{
	
}


$html = new simple_html_dom();
// Load HTML from a string
$html->load($server_output);
$aadhar_data = array();

 foreach($html->find('#UpdatePanel1 input') as $input) 
                                {
                                  
                                
                                  $key =  $input->getAttribute('name'); 
                                  $value = $input->getAttribute('value');
                     
                                  $aadhar_data[$key] = $value;
                                }
foreach($html->find('#imguser') as $e) 
                                {
                                 
                                   $aadhar_data['image'] = $e->src;
                                }

                                $data = array();

                                foreach($html->find('#__VIEWSTATE') as $e) 
                                {
                                 
                                   $data['__VIEWSTATE'] = $e->value;
                                }
                                foreach($html->find('#__VIEWSTATEGENERATOR') as $e) 
                                {
                                 
                                   $data['__VIEWSTATEGENERATOR'] = $e->value;
                                }
                                foreach($html->find('#__EVENTVALIDATION') as $e) 
                                {
                                 
                                   $data['__EVENTVALIDATION'] = $e->value;
                                }
                                
                               
   
if($aadhar_data && $aadhar_data['txt_NameE'] != ''){
	
	$_SESSION['aadhar_data'] = $aadhar_data;
  $_SESSION['view_data'] = $data;
	header("location:".$_SESSION['url']."ainfo.php");
	exit;
}

header("location:".$_SESSION['url']."/aaadhar.php");
       // var_dump($aadhar_data);
//echo $server_output;

exit;                                                       
          
 
