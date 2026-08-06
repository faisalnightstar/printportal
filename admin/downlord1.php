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
$familyid = $_POST['familyid'];
$id=$_POST['id'];
$userid=$_POST['userid'];
$stateid=$_POST['stid'];

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://test.axenapi.co.in/Dashboard/Verify_api/ayushman/ayu_do_lo.php",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('familyid' => $familyid,'id' => $id,'stateid' => $stateid),
));

$response = curl_exec($curl);
curl_close($curl);
if($response){
 
    $sql = "update 	tbluser SET findwallet= findwallet - 10 where userid='".$SESSION=['userid']."'";
    $abs = mysqli_query( $connection, $sql );
    
header('Content-Type: application/pdf');
echo $response;
}



?>
