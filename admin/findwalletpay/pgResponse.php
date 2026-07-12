<?php
error_reporting(0);
include '../config.php'; 
require_once('lib/Config_HBConnect.php');
require_once('lib/RechPayChecksum.php');
$array = array();
$status = $_POST['status']; 
$txnAmount = $_POST['txnAmount'];
$message = $_POST['message']; 
$hash = $_POST['hash']; 
$checksum = $_POST['checksum'];
if($status=="SUCCESS"){
$paramList = hash_decrypt($hash,$secret);
$verifySignature = RechPayChecksum::verifySignature($paramList, $secret, $checksum);
if($verifySignature){
$array = json_decode($paramList,true);
$userid = $array["sender_note"];
$amt=$array["txnAmount"];
$sql = "UPDATE tbluser SET findwallet= findwallet +'$amt' WHERE userid='$userid'";
$qry =  mysqli_query($connection,$sql);
echo '<h1 style="color:blue;text-align:center;">Payment Successfull, Enjoy</h1>';
        ?>
   <script>
            setTimeout(()=>{
                window.location.href="https://<?php echo $server=$_SERVER['SERVER_NAME'];?>/admin/panel.php";
            },2000);
        </script>
        <?php 
    
    
    }
}
else {  echo "failed";
?>

      <script>
            setTimeout(()=>{
                window.location.href="https://<?php echo $server=$_SERVER['SERVER_NAME'];?>/admin/findwallet.php";
            },2000);
        </script>
<?php }




?>