<?php
error_reporting(0);
include '../../config.php'; 
require_once('lib/Config_HBConnect.php');
require_once('lib/RechPayChecksum.php');
$array = array();
$status = $_POST['status']; 
$message = $_POST['message']; 
$hash = $_POST['hash']; 
$checksum = $_POST['checksum'];
if($status=="SUCCESS"){
$paramList = hash_decrypt($hash,$secret);
$verifySignature = RechPayChecksum::verifySignature($paramList, $secret, $checksum);
if($verifySignature){
$array = json_decode($paramList,true);
$userid = $array["sender_note"];
    mysqli_query($connection,"update tbluser set findwallet=299, usertype='RETAILER' where userid=".$userid."");
        $res = mysqli_query($connection,$query);
       $html = '
<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
  </head>
    <style>
      body {
        text-align: center;
        padding: 40px 0;
        background: #EBF0F5;
      }
        h1 {
          color: #88B04B;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-weight: 900;
          font-size: 40px;
          margin-bottom: 10px;
        }
        p {
          color: #404F5E;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-size:20px;
          margin: 0;
        }
      i {
        color: #9ABC66;
        font-size: 100px;
        line-height: 200px;
        margin-left:-15px;
      }
      .card {
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 0 auto;
      }
    </style>
    <body>
      <div class="card">
      <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
        <i class="checkmark">✓</i>
      </div>
        <h1>Success</h1> 
        <p>We Got Your Payment 👍!!<br/> Update Successfully !</p>
      </div>
    </body>
</html>
';	
echo $html

        ?>
   <script>
            setTimeout(()=>{
                window.location.href="https://<?php echo $server=$_SERVER['SERVER_NAME'];?>/admin/panel.php";
            },2000);
        </script>
        <?php 
    
    
    }
}
else {  $fail = '
<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
  </head>
    <style>
      body {
        text-align: center;
        padding: 40px 0;
        background: #EBF0F5;
      }
        h1 {
          color: #f20101;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-weight: 900;
          font-size: 40px;
          margin-bottom: 10px;
        }
        p {
          color: #404F5E;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-size:20px;
          margin: 0;
        }
      i {
        color: #9ABC66;
        font-size: 100px;
        line-height: 200px;
        margin-left:-15px;
      }
      .card {
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 0 auto;
      }
    </style>
    <body>
      <div class="card">
      <div style="border-radius:200px; height:200px; width:200px; background: #f76565d4; margin:0 auto;">
        <i class="checkmark">❌</i>
      </div>
        <h1>Payment Fail</h1> 
        <p>Please Pay Again!!<br/>Payment Canclled By User!</p>
      </div>
    </body>
</html>
';	
echo $fail
?>

      <script>
            setTimeout(()=>{
                window.location.href="https://<?php echo $server=$_SERVER['SERVER_NAME'];?>/admin/panel.php";
            },2000);
        </script>
<?php }




?>