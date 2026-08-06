<?php 
if (file_exists(__DIR__ . '/config.php')) {
    include_once(__DIR__ . '/config.php');
} elseif (file_exists(__DIR__ . '/../config.php')) {
    include_once(__DIR__ . '/../config.php');
} elseif (file_exists(__DIR__ . '/../../config.php')) {
    include_once(__DIR__ . '/../../config.php');
} elseif (file_exists(__DIR__ . '/../../../config.php')) {
    include_once(__DIR__ . '/../../../config.php');
} 
$a = $_GET['a'];
$q = "SELECT * FROM `aadharfind` WHERE id='$a' and payment_status=1";
$res = mysqli_query($connection,$q);
$count = mysqli_num_rows($res);
if($count<0){
exit();
}
$filename = "aadharpdf/".$a.".pdf";
if(!file_exists($filename)){
exit();
}
header('Content-Type: application/octet-stream');

header('Content-Disposition: attachment;filename="'.$a.'.pdf"');

readfile($filename);

?>