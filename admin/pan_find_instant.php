<?php
include('userHeader.php'); 
include('manu.php'); ?>
<?php if($fetch['findwallet'] < 25){?>  
  <script> alert('तुरंत पैन नंबर पाने के लिए आपके खाते में 25 रुपये से ज्यादा होने चाहिए, कृपया दोबारा जांच करें') </script>";

 <script>
     window.location.href= "findwallet.php";
             </script>
                 <?php }else{
                 }
?>

    
<?php 
if(isset($_POST['submit'])){
    $application_no = "BestP_F_Inst".rand(0000000,9999999);
    //$dob = $_POST['dob'];
    $userid = $_SESSION['userid'];
    $phone = $rw['mobileno'];
    $aadhaar = $_POST['aadhar'];
    date_default_timezone_set("Asia/Kolkata");
    $timestamp = date('d/m/Y g:i:s');

  $fee = "40";
  $findwallet=$rw['findwallet'];
    $debit_fee =  $findwallet - $fee;
 if($findwallet>$fee){
     
$url = file_get_contents("https://test.axenapi.co.in/pan_find_api/status.php?aadhaar_no=$aadhaar");
 $result = json_decode($url, true);
// Decode the JSON response
$result = json_decode($url, true);

// Process the result
if ($result['status'] === 'success') {
    // Aadhaar is valid
    if($result['code'] === '200'){
        
        
  
      
      if($findwallet>$fee){
          $api_key= base64_encode("ea7193c0-ikiz-9377-rbps-313831c673d4"); 
       $panurl = file_get_contents("https://test.axenapi.co.in/pan_find_api/pan_data_save.php?application_no=$application_no&api_key=$api_key&aadhaar_no=$aadhaar");
  $pan_result = json_decode($panurl, true);
// Decode the JSON response
$response=$panurl;
     $status_code=$pan_result['status'];   
if($pan_result['status']==='100'){
    $debit = mysqli_query($connection,"UPDATE `tbluser` SET findwallet='$debit_fee' WHERE userid='$userid'");
    $pan=$pan_result['pan_no'];
    $client_id=$pan_result['client_id'];
 $insert = mysqli_query($connection,"INSERT INTO `pan_instant`(`userid`, `user_mobile`, `application_no`, `aadhar`, `pan`, `client_id`, `status`, `message`, `status_code`, `fee`, `data`) VALUES ('$userid','$phone','$application_no','$aadhaar','$pan','$client_id','".$result['code']."','".$result['message']."','$status_code','$fee','$response');");
 
    if($insert){     
        
        //echo $response;
       $msg='<h4 class="card-header bg-dark" style="color:white;text-align:center;">Pan No for  Aadhaar '.$aadhaar.' is '.$pan.'  . <i class="fa fa-check-circle"> </i></h4>';
       echo "<script> alert('Pan No for  Aadhaar $aadhaar is $pan') </script>";
 
     //echo $msg="<script> alert('Data Applied Success $message , $application_no') </script>";
 }else{
     $msg="insert error";
 
    }
}else if($pan_result['status']==='2000'){
    $epan=$pan_result['pan_no'];
    $msg='<h4 class="card-header bg-dark" style="color:white;text-align:center;">'.$message.' Pan No for  Aadhaar '.$aadhaar.' is '.$epan.'  Is Already In Our Database. <i class="fa fa-check-circle" style="color=green"></i></h4>';
}else{
    $message=$pan_result['message'];
    $msg='<h4 class="card-header bg-dark" style="color:white;text-align:center;">'.$message.'<i class="fa fa-check-circle" style="color=green"></i></h4>';
}
    }else{
        $msg='<h4 class="card-header bg-dark" style="color:white;text-align:center;">Balance Debited Error.</h4>';
    }
    }else if($result['code'] === '422'){
        $msg='<h6 class="card-header bg-danger" style="color:white;text-align:center;">'.$result['message'].' / दिया गया आधार नंबर किसी भी पैन से लिंक नहीं है</h6>';
    } //status code check
    }else{
        
       $msg='<h4 class="card-header bg-danger" style="background:#0f1012; color:white;text-align:center;">Session Expire Please Try Again . Be Patient ! </h4>';
    }
}else{
     $msg='<h4 style="background:#0f1012; color:white;text-align:center;">Balance Low</h4>';
}
}
?>
          <div class="content-wrap">
            <div class="main">
			    <div class="col-md-12">
                   <div class="main-content">
                      <section class="section">
                            <div class="section-header">
                                <div class="card-header bg-warning">
             
                                           <div class="card-title ">
                                            <h3><strong>Find Lost Pan Card No in Just 1 Second</strong> </h3>
                                             <div class="card-title">
                                             <h4>Disclaimer :- Its Take Upto 1 Second to 30 Second Please Be paitent</h4>
                                             <h4>Disclaimer :- <B>Pan Find Charge = 50</B></h4>
                                               <div style = "display: flex; justify-content:flex-start">
                                             <a class="btn btn-dark" href="check.php" target="_blank">Available Balance : Rs  <?php echo $rw['findwallet'];?></a>
                                              </div>
                                               <div style = "display: flex; justify-content:flex-end">
                                                   <a class="btn btn-dark" href="pan_find_instant_list.php"><i class="fa fa-check-circle"></i> Instant List</a>
                                               </div> 
                                             </div>
                                           </div>
                                         </div>
                                      </div>
                                            <div class="card">
                                               <div class="card-header">Aadhar Card To Pan Number Find  </div>
                                                   <div class="card-body">
                                                 <?php echo $msg; ?>
                      
						                  <div class="row  dgnform">
                                            <div class="col-sm-9">
                                                <form action="" method="post">  
                                                      <div class="row">
                                                        <div class="col-sm-6">
                                                        <label>Aadhar No.</label>
                                                        <div class="form-group">
                                                            <input class="form-control " value="" id="aadhar" onblur="checkAadhar();" placeholder="Enter 12 digit Aadhaar No" name="aadhar" type="number" maxlength="12" required="">
														 </div>
                                                    </div>
                                                    </div>


                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <button class="form-control btn btn-success" name="submit" id="submit"><i class="fa fa-check-circle"></i> Submit</button>
											      </div>
        </form>
    </div>
</div><!-- /.content-wrapper -->

<?php include('userFooter.php');?>
</html>