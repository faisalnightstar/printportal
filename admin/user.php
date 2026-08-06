<?php include ('userHeader.php'); ?>



<div class="main-panel">
        <!-- BEGIN : Main Content-->
        <div class="main-content">
          <div class="content-wrapper"><!--Flat button starts -->
<section id="buttons">
     <div class="card">
        <div class="card-header">
          <h4 class="card-title"> <center><b>Add User</b></center></h4>
        </div>
        <div class="card-content">
            <div class="row">
                
                						<section id="main-content">
							<div class="row">
							   <?php
								//including the database connection file
								if (file_exists(__DIR__ . '/config.php')) {
    include_once(__DIR__ . '/config.php');
} elseif (file_exists(__DIR__ . '/../config.php')) {
    include_once(__DIR__ . '/../config.php');
} elseif (file_exists(__DIR__ . '/../../config.php')) {
    include_once(__DIR__ . '/../../config.php');
} elseif (file_exists(__DIR__ . '/../../../config.php')) {
    include_once(__DIR__ . '/../../../config.php');
}
								
								if(isset($_POST['submit'])) {
									$msg = '';	
									$usertype = strtoupper($_POST['usertype']);
									$userid = strtoupper($_POST['userid']);
                                    $username = strtoupper($_POST['username']) ;
									$address = strtoupper($_POST['address']);
									$city = strtoupper($_POST['city']) ;
									$emailid = strtolower($_POST['emailid']);
									$refrence = $_POST['refrence'];
									$mobileno = $_POST['mobileno'];
                                   	$password = $_POST['password'];
									$remark = strtoupper($_POST['remark']);
									$walletamount = strtoupper($_POST['walletamount']);
									$state = strtoupper($_POST['state']);
                                    $aadharpoint = $_POST['aadharpoint'] ;
									$cardrate = $_POST['cardrate'];
									

									//echo 
									
									$a = mysqli_query($connection,"SELECT loginname FROM tbluser Where loginname='".$mobileno."'");
									$b = mysqli_fetch_array($a);
									if($b['loginname']==$mobileno){
										$msgno = 'User Id or Login Id Already Exist .... ';
									} else {
										$a = mysqli_query($connection,"SELECT mobileno FROM tbluser Where mobileno='".$mobileno."'");
										$b = mysqli_fetch_array($a);
										if($b['mobileno']==$mobileno){
											$msgno = 'Email Id Already Exist .... ';
										} else {
											if ($_SESSION['usertype'] == 'MAINADMIN') {
											$query = "INSERT INTO `tbluser`
											(`fullname`, `usertype`, `loginname`, `emailid`, `address`,`cityname`,
												`mobileno`, `pswrd`, `remarks`, `walletamount`, `loginid`, `logdate`, `statename`, `refrenceid`, `aadharpoint`, `cardrate`,`ispaid`,`status`) 
											VALUES ('".$mobileno."','".$usertype."','".$mobileno."','".$emailid."','".$address."','".$city."','".$mobileno."','".$mobileno."','".$remark."','".$walletamount."','".$_SESSION['userid']."',now(),'".$_SESSION['userid']."','".$_SESSION['userid']."','".$aadharpoint."','".$cardrate."',1,1)";
											mysqli_query($connection,"update tbluser set walletamount = walletamount - ".$walletamount." where userid=".$_SESSION['userid']."");
											$aquery=mysqli_query($connection,$query);
											
											$msg = 'User Name Created Successfully.........';
											$msgtext = 'Dear User,You Register Successfully Your Loginname '.$mobileno.'And Password '.$mobileno.' url '.$slct['weburl'];
											?>
											<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
											<script>

											

var settings = {

  "async": true,

  "crossDomain": true,

  "url": "https://api.msg91.com/api/sendhttp.php?mobiles=<?php echo $mobileno; ?>&authkey=<?php echo $slct['smsapi'];?>&route=4&sender=<?php echo $slct['senderid'];?>&message=<?php echo $msgtext; ?>&country=91",

  "method": "GET",

  "headers": {}

}



$.ajax(settings).done(function (response) {

  console.log(response);

});

</script>

											<script>
											setTimeout(function () {
												window.location.href= 'user.php';
											}, 2000);
											</script>
											<?php 
											}
											else 
											{
												$f= mysqli_fetch_assoc(mysqli_query($connection,"select * from tbluser where userid=".$_SESSION['userid'].""));
												if($walletamount > $f['walletamount'])
												{
													$msgno = 'Please recharge first';
												}
												else
												{
												mysqli_query($connection,"update tbluser set walletamount = walletamount - ".$walletamount." where userid=".$_SESSION['userid']."");	
												$query = "INSERT INTO `tbluser`
											(`fullname`, `usertype`, `loginname`, `emailid`, `address`,`cityname`,
												`mobileno`, `pswrd`, `remarks`, `walletamount`, `loginid`, `logdate`, `statename`, `refrenceid`, `aadharpoint`, `cardrate`,`ispaid`,`status`) 
											VALUES ('".$mobileno."','".$usertype."','".$mobileno."','".$emailid."','".$address."','".$city."','".$mobileno."','".$mobileno."','".$remark."','".$walletamount."','".$_SESSION['userid']."',now(),'".$_SESSION['userid']."','".$_SESSION['userid']."','".$aadharpoint."','".$cardrate."',1,1)";
											$aquery=mysqli_query($connection,$query);
											
											$msg = 'User Name Created Successfully.........';
											$msgtext = 'Dear User,You Register Successfully Your Loginname '.$mobileno.'And Password '.$mobileno.' url '.$slct['weburl'];
											?>
											<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
											<script>

											

var settings = {

  "async": true,

  "crossDomain": true,

  "url": "https://api.msg91.com/api/sendhttp.php?mobiles=<?php echo $mobileno; ?>&authkey=<?php echo $slct['smsapi'];?>&route=4&sender=<?php echo $slct['senderid'];?>&message=<?php echo $msgtext; ?>&country=91",

  "method": "GET",

  "headers": {}

}



$.ajax(settings).done(function (response) {

  console.log(response);

});

</script>
											<script>
											setTimeout(function () {
												window.location.href= 'user.php';
											}, 2000);
											</script>
											<?php 
											}
											}
											//echo $query;
											?>
											<script>
											setTimeout(function () {
												window.location.href= 'user.php';
											}, 2000);
											</script>
											<?php 
											
										}
									}
									
								}
								?>
								<?php if($msg !='') { ?>
								<div style="width=100%"  class="row cvmsgok"><?php echo $msg; ?></div>
								<?php } elseif($msgno !='') { ?>
								<div style="width=100%"  class="row cvmsgno"><?php echo $msgno; ?></div>
								<?php  } ?>
								<form method="post" action="" style="width:100%" autocomplete="off"  onSubmit="return validation();"   enctype="multipart/form-data" >
								    <center>
								        
								            
								          
									<div class="row dgnform">
									    <div style="width:500px;margin-left: 261px;
    margin-top: 17px;">
									        <div class="col-md-12 col-sm-12 col-xs-12">										
											
											
												<label style="float: left !important;">Mobile No</label>
												<div class="form-group">              
												<input type="text" maxlength="10" class="form-control" id="mobileno" name="mobileno" placeholder="Mobile No(10 Digit)" required>
											<span id="errormobile" class="error"></span>  
												</div> 
										
											
											
											
											
										</div>
										
										
										
										<div class="col-md-12 col-sm-12 col-xs-12">										
											
											
												<label style="float: left !important;">Full Name</label>
												<div class="form-group">              
												<input type="text"  class="form-control" id="username" name="username" placeholder="Enter Fullname" required>
												<input type="hidden" value="<?php echo $_SESSION['baseurl'];?>" class="form-control" id="remark" name="remark" required>
												</div> 
										
											
											
											
											
										</div>
										
									    <div class="col-md-12 col-sm-12 col-xs-12">
										
												<label style="float: left !important;">User Type</label>
												<div class="form-group">
												<select class="form-control"  name="usertype" id="usertype"  required>
													<option value="" > Select User Type </option>
													<?php if ($_SESSION['usertype'] == 'ADMIN') { ?>
													
														<option value="RETAILER" > RETAILER </option>
														<option value="DISTRIBUTER" > DISTRIBUTER </option>
														<option value="SUPER DISTRIBUTER" > SUPER DISTRIBUTER </option>
														<option value="MASTER ADMIN" >MASTER ADMIN  </option>
														
														
														
														<?php } elseif ($_SESSION['usertype'] == 'MASTER ADMIN') { ?>
														<option value="RETAILER" > RETAILER </option>
														<option value="DISTRIBUTER" > DISTRIBUTER </option>
														<option value="SUPER DISTRIBUTER" > SUPER DISTRIBUTER </option>
														
														
														
													<?php } elseif ($_SESSION['usertype'] == 'SUPER DISTRIBUTER') { ?>
														<option value="RETAILER" > RETAILER </option>
														<option value="DISTRIBUTER" > DISTRIBUTER </option>
														

													<?php } elseif ($_SESSION['usertype'] == 'DISTRIBUTER') { ?>
														<option value="RETAILER" > RETAILER </option>
													<?php } ?>
												</select> 
												</div> 
											</div>
										
											
										<div class="col-md-12 col-sm-12 col-xs-12">
												<label style="float: left !important;">State </label>
												<div class="form-group">              
												<select class="form-control" onchange="myFunction();" name="state" id="state"  required>
													<option value="" > SELECT STATE </option>
													<?php $result = mysqli_query($connection,"select DISTINCT state from tblcities"); ?>
													<?php while($row = mysqli_fetch_assoc($result)){ echo '<option value="'.$row['state'].'" >'.$row['state'].'</option>' ; } ?>
													</select> 
													<input hidden type="text" class="form-control" id="cardrate" 
													
													required  name="cardrate" value="1"  placeholder="Card Print Point/Doc">
													<input  hidden  type="text" class="form-control" id="aadharpoint" 
													
													required  name="aadharpoint" value="1" placeholder="Aadhar Auto Point/Doc"/>
													<input hidden type="text" class="form-control" id="walletamount" 
													
													 name="walletamount" value="0" placeholder="Aadhar Auto Point/Doc">
												</div> 
											</div>
																				
											
												
											
									
									
										
									<div class="col-sm-12">
									                  <label>Captcha </label>
									                  
									                  <input id="num1" class="sum" type="text" name="num1" size="4" value="<?php echo rand(1,5) ?>" readonly="readonly" style="    background: #000;
    color: #fff;
    text-align: center;
    border: none;
    padding: 5px;"/> +
<input id="num2" class="sum" type="text" name="num2" value="<?php echo rand(1,5) ?>" size="4" readonly="readonly" style="    background: #000;
    color: #fff;
    text-align: center;
    border: none;
    padding: 5px;"/> =
<input id="captcha" class="captcha" type="text" name="captcha" maxlength="2" size="4" />
									              </div> 
									              
										<div class="col-md-6 col-sm-6 col-xs-6">
											<label>&nbsp;</label>
											<div class="form-group">              
											   <button type="submit" id="submit" name="submit" class="btn btn-success btn-block" style="border-radius: 20px;
    padding: 10px;background-color:#28a745;border:1px solid orange;">Save</button>
											</div> 
										</div>
									</div>
											
									
										
										</center>
												
											
								</form>
							</div>
							<!-- /# row -->
						</section>
					</div>
				</div>
            </div>
        </div>
		<script src="jquery-1.11.3.min.js"></script>
        <script type="text/javascript">
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