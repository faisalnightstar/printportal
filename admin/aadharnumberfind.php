<?php include('userHeader.php'); ?>
<?php 
if(isset($_POST['name'])){
    
    $name = trim($_POST['name']);
    $aadharno = trim($_POST['aadhar']);
    $pincode = trim($_POST['pincode']);
    $dob = trim($_POST['dob']);
    $fathername = trim($_POST['fathername']);
    $state = trim($_POST['state']);
    $userid = $_SESSION['userid'];
    $retailermobile= trim($_POST['retailermobile']);

    date_default_timezone_set("Asia/Kolkata");
    $timestamp = date('d/m/Y g:i:s');
    //print_r($_POST);

//  $q = "INSERT INTO `aadhaarfind`(`name`, `aadhar`, `pincode`,`dob`, `time`, `state`, `userid`, `date`, `status`, `payment_status`)
//   VALUES ('$name','$aadharno','$pincode',$dob',$time','$state','$userid','$date',''$pending,0)";
//     global $connection;

$q = "INSERT INTO `aadhaarfind`(`name`, `aadhar`, `pincode`,`dob`,`time`, `state`, `userid`, `date`, `status`, `payment_status`,`mobileno`) 
VALUES ('$name','$aadharno','$pincode','$dob','$time','$state','$userid','$timestamp','Payment Pending',0,'$retailermobile')";
    $res = mysqli_query($connection,$q);
    if($res){
        $msgno=1;
        $msg="Data is Saved Payment is Pending";

    }else{
        $msg=0;
    }

}

?><div class="main-panel">
        <!-- BEGIN : Main Content-->
        <div class="main-content">
          <div class="content-wrapper">
		   	<section id="basic-form-layouts">
                 <div class="col-md-12">
					<div class="container-fluid">
						<div class="row">
							<div class="page-header">
								<div class="page-title">
									<h1>Aadhar Application</h1>
						<!-- /# row -->
						<section id="main-content">
                       <?php if($msgno==1){ ?><div style="width=100%"  class="row cvmsgok"><?php echo $msg; ?></div>
                       <script>
                       
                       setTimeout(()=>{
                            window.location.href="aadharfindlist.php";
                       },200);</script>
                       <?php } ?>
							<div class="row  dgnform">
                           
                           <div class="col-sm-9">
                           <form action="" method="post">  
                           <div class="row">
                         
                                                   <div class="col-sm-4">
                                                        <label>Full Name As On Aadhar</label>
                                                        <div class="form-group">
                                                            <input class="form-control " value="" id="name" placeholder="Example: Satyam Sharma" autocomplete="off" name="name" type="text" maxlength="40" required="">
                                                            <input type="hidden" name="photo" id="photo" required>
                                                            <span id="erroraadharno" class="error"></span>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="col-sm-4">
                                                        <label>Enter Enrollment Number </label>
                                                        <div class="form-group">
                                                            <input class="form-control " value="" id="Aadhar No" placeholder="3456783242132" name="aadhar" type="text" maxlength="14" required="">
															
															
															
                                                        </div>
                                                    </div>
                                              <div class="col-sm-4">
                                                        <label>Pin Code </label>
                                                        <div class="form-group">

                                                            <input class="form-control" name="pincode" id="pincode" placeholder="811311" value="" type="text"maxlength="6" required>
                                                        </div>
                                                    </div>      
                                                    <div class="col-sm-4">
                                                        <label>Date</label>
                                                        <div class="form-group">

                                                            <input class="form-control" name="dob" id="dob" placeholder="Date of Birth" value="" type="date" required>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-4">
                                                        <label>Time</label>
                                                        <div class="form-group">

                                                            <input class="form-control" name="fathername" id="fathername" value="00:00:00" type="time" step="1" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label>State</label>
                                                        <div class="form-group">
<select name="state" id="state" class="form-control" required>
<option value="">Select State Here</option>
<option value="Bihar">Bihar</option>
<option value="Uttar Pradesh">Uttar Pradesh</option>
<option value="Andhra Pradesh">Andhra Pradesh</option>
<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
<option value="Arunachal Pradesh">Arunachal Pradesh</option>
<option value="Assam">Assam</option>
<option value="Chandigarh">Chandigarh</option>
<option value="Chhattisgarh">Chhattisgarh</option>
<option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
<option value="Daman and Diu">Daman and Diu</option>
<option value="Delhi">Delhi</option>
<option value="Lakshadweep">Lakshadweep</option>
<option value="Puducherry">Puducherry</option>
<option value="Goa">Goa</option>
<option value="Gujarat">Gujarat</option>
<option value="Himachal Pradesh">Himachal Pradesh</option>
<option value="Jharkhand">Jharkhand</option>
<option value="Karnataka">Karnataka</option>
<option value="Kerala">Kerala</option>
<option value="Madhya Pradesh">Madhya Pradesh</option>
<option value="Maharashtra">Maharashtra</option>
<option value="Manipur">Manipur</option>
<option value="Meghalaya">Meghalaya</option>
<option value="Mizoram">Mizoram</option>
<option value="Nagaland">Nagaland</option>
<option value="Odisha">Odisha</option>
<option value="Punjab">Punjab</option>
<option value="Rajasthan">Rajasthan</option>
<option value="Sikkim">Sikkim</option>
<option value="Tamil Nadu">Tamil Nadu</option>
<option value="Telangana">Telangana</option>
<option value="Tripura">Tripura</option>
<option value="Uttarakhand">Uttarakhand</option>
<option value="West Bengal">West Bengal</option>
<option value="ANY OTHER STATE">ANY OTHER STATE</option>
</select>
  </div>
                                                    </div>
<div class="col-sm-4">
                                                        <label> </label>
                                                        <div class="form-group">

                                                            <button class="form-control btn btn-success  ">Submit</button>
                                                        </div>
                                                    </div>
													
                                                </div>
                                               
                                                <!-- 2nd row -->

                                                
                                                </div>
                                            </form>
							                    </div>
                            
							<!-- /# row -->
						
                       
                       
                       
                       
                       
                       
                        </section>
					</div>
				</div>
            </div>
        </div>
        <script>
       function setPhoto(input){
        if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#img').attr('src', e.target.result);
            $('#photo').val(e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
       }
        
        </script>
                                                   

<!-- General JS Scripts -->
<script src="assets/bundles/lib.vendor.bundle.js"></script>
<script src="js/CodiePie.js"></script>

<!-- JS Libraies -->
<script src="assets/modules/jquery.sparkline.min.js"></script>
<script src="assets/modules/chart.min.js"></script>
<script src="assets/modules/owlcarousel2/dist/owl.carousel.min.js"></script>
<script src="assets/modules/summernote/summernote-bs4.js"></script>
<script src="assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

<!-- Page Specific JS File -->
<script src="js/page/panel.js"></script>

<!-- Template JS File -->
<script src="js/scripts.js"></script>
<script src="js/custom.js"></script>
</body>

<!--   Tue, 07 Jan 2020 03:35:12 GMT -->
</html></body></html>