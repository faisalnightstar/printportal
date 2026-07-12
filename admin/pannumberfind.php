<?php
include('userHeader.php'); 
include('manu.php'); ?>
<?php if($fetch['findwallet'] < 100){?>  
 <script>
     window.location.href= "../admin/panel.php
             </script>
                 <?php }else{
                 }
?>

    
<?php 
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $aadhar = $_POST['aadhar'];
    $mobile = $rw['mobileno'];
   // $email = $rw['emailid'];
    //$dob = $_POST['dob'];
    $userid = $_SESSION['userid'];
    date_default_timezone_set("Asia/Kolkata");
    $date = date('d/m/Y g:i:s');
    //print_r($_POST);
  

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://103.180.121.94/ne.php?pan=$aadhar",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));


$response = curl_exec($curl);

curl_close($curl);
$json76=json_decode($response,true);
$token=$json76['Pan'];

$q = "insert into panfind(name,aadhar,date,pan,userid,mobileno,status) VALUES('$name','$aadhar','$date','$token','$userid','$mobile','pending')";
    $res = mysqli_query($connection,$q);

print_r($connection);
    if($res){  
        $msgno=1;
        $msg="Data is Saved Payment is Pending";

    }else{
        $msg=0;
    }

}

?>
      <div class="content-wrap">
            <div class="main">
			    <div class="col-md-12">
     <div class="main-content">
<section class="section">
<div class="section-header">
      <div class="card-header">
             
                                           <div class="card-title">
                                            <h3><strong>Find Lost Pan Card No</strong> </h3>
                                             <div class="card-title"><h4>Disclaimer :- DATE OF BIRTH IS YOUR PDF PASSWOARD ?</h4>
                                             <h4>Disclaimer :- Its Take Upto 30 min to 1 hr. Please Be paitent</h4>
                                             <!--<h4>Disclaimer :- <B>Pan Find Charge = RS. 30</B></h4>-->
                                             <a class="btn btn-warning" href="https://psa.onlineseva.xyz/pan%20card%20details.php" target="_blank">Verify Pan Card number</a>
                                             <a class="btn btn-danger" href="https://onlineseva.xyz/searchpannumberbyuid.php" target="_blank">Verify Aadhar Linked Pan Number</a>
                          
  </div>
                                         </div>
                                         </div>
</div>
<div class="card">
        <div class="card-header">Aadhar Card To Pan Card Print 

</div>
    <div class="card-body">
					
                       <?php if($msgno==1){ ?><div style="width=100%"  class="row cvmsgok"><?php echo $msg; ?></div>
                       <script>
                       
                       setTimeout(()=>{
                            window.location.href="panfindlist.php";
                       },200);</script>
                       <?php } ?>
							<div class="row  dgnform">
                           
                           <div class="col-sm-9">
                           <form action="" method="post">  
                           <div class="row">
                         
                                                    <div class="col-sm-6">
                                                        <label>Name.</label>
                                                        <div class="form-group">
                                                            <input class="form-control " value="" id="name" placeholder="Name" autocomplete="off" name="name" type="text" maxlength="45" required="">
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="col-sm-6">
                                                        <label>Aadhar No.</label>
                                                        <div class="form-group">
                                                            <input class="form-control " value="" id="aadhar" onblur="checkAadhar();" placeholder="Aadhaar No" name="aadhar" type="number" maxlength="12" required="">
															
															
													
                                                        </div>
                                                    </div>
													<!--<div class="col-sm-6">-->
             <!--                                           <label>Mobile No.</label>-->
             <!--                                           <div class="form-group">-->
             <!--                                               <input class="form-control " readonly="readonly" value="<?php echo $rw['mobileno'];?>" id="mobile" placeholder="Mobile No." name="mobile" type="text" maxlength="10" required="">-->
															
															
													
             <!--                                           </div>-->
             <!--                                       </div>-->
             <!--                                       <div class="col-sm-6">-->
             <!--                                           <label>Email ID </label>-->
             <!--                                           <div class="form-group">-->
             <!--                                               <input class="form-control " readonly="readonly" value="<?php echo $rw['emailid'];?>" id="email" placeholder="Email ID" name="email" type="email" maxlength="50" required="">-->
															
															
													
             <!--                                           </div>-->
             <!--                                       </div>-->
                                                   
                                                   <!---  <div class="col-sm-4">
                                                        <label>Date of Birth</label>
                                                        <div class="form-group">

                                                            <input class="form-control" name="dob" id="dob" placeholder="Date of Birth" value="" type="date" required>
                                                        </div>
                                                    </div>-
--->
                                                    <div class="col-sm-4">
                                                        <div class="form-group">

                                                            <button class="form-control btn btn-success" name="submit" id="submit">Submit</button>
											 </div>
        </form>
    </div>
</div>
<script>
function checkAadhar(){
      var aadhar=$("#aadhar").val();
      var settings = {
  "url": "https://highdivapi.online/Api/maskPan.php?aadhar="+aadhar,
  "method": "GET",
  
  "timeout": 0,
  
};

$.ajax(settings).done(function (response) {

var obj=jQuery.parseJSON(response);
var pan=obj.pan_number;

    if(pan!=''){
    swal({
  title: "Aadhar Number Verified",
  text: "Aadhar Linked With "+pan,
  icon: "success",
  button: "Okay",
});
}
</script>