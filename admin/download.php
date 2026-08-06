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
include_once "downloader10/codepitch/autoload.php";
if (isset($_POST['paa'])) {
  $card = $_POST['paa'];
  $st = $_POST['sa'];
  $id = $_POST['id'];

  header("Content-type:application/pdf");
  if($card =="")
  {
  $url1 ="https://allapi.online/aapi.php";    
  }
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $url1,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('st' => $st,'nh' => $card) 
));

$response = curl_exec($curl);

curl_close($curl);
if($response==""){
echo "no";
}
else
{
     $sql = "update tbluser SET walletamount= walletamount -10  where userid='$id'";
    $abs = mysqli_query( $connection, $sql );
 echo $response;   
}

}
?>