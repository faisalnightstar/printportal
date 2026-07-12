<?php include('userHeader.php'); ?>
<div class="main-panel">
        <!-- BEGIN : Main Content-->
        <div class="main-content">
          <div class="content-wrapper">
					<section id="basic-form-layouts">
  <div class="row">

  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
       <div class="card-body">
          <div class="px-3">
          							
        
        </div>
        <div class="card-body">
          <div class="px-3">
  <?php
							$a = mysqli_query($connection,"SELECT * FROM tbluser where userid='".$_SESSION['userid']."'");
							$b = mysqli_fetch_array($a);
						?>
						<?php
						if (isset($_POST['submit'])) {
							$pass = $b['pswrd'];
							$currentpassword         =  $_POST['currentpassword'] ;
							$password           =  strtolower($_POST['password']);
							$confirmpassword          =  strtolower($_POST['confirmpassword']) ;
							
							if ($pass == $currentpassword ){
								$query = "UPDATE `tbluser` SET `pswrd`='$password' where userid='".$_SESSION['userid']."'";
								$aquery=mysqli_query($connection,$query);
								$msg = 'Dear Member Your User Password Updated Successfully' ;
								?>
								<script>
								setTimeout(function () {
								window.location.href= 'changepassword.php';
								}, 2000);
								</script>
								<?php
							}
							else {
								$msgno = 'Current Password Entered is Wrong ... Try Again....' ;
							}
						}
						?>

						<!-- /# row -->
						<section id="main-content">
							<div class="row">
							    <?php if($msg !='') { ?>
									<div style="width=100%"  class="row cvmsgok"><?php echo $msg; ?></div>
								<?php } elseif($msgno !='') { ?>
									<div style="width=100%"  class="row cvmsgno"><?php echo $msgno; ?></div>
								<?php  } ?>
							 	<form method="post" name="form"  onSubmit="return validation();"   enctype="multipart/form-data" action="" style="width:100%">
									<div class="row dgnform">
										<div class="row col-md-6 col-sm-6 col-xs-6">
										    <div class="col-md-12 col-sm-12 col-xs-12">
											    <label>Current Password</label>
												<div class="form-group">              
													<input autocomplete="off" type="text" class="form-control" value="<?php echo $b['pswrd']; ?>" id="currentpassword" name="currentpassword" placeholder="Please Type Current Password" required>
													<span id="errorcurrentpassword" class="error"></span>  
												</div> 
											</div>
											<div class="col-md-12 col-sm-12 col-xs-12">
												<label>New Password</label>
												<div class="form-group">              
													<input autocomplete="off" type="text" class="form-control" id="password" name="password" placeholder="Type New Password" required>
													<span id="errorpassword" class="error"></span>  
												</div> 
											</div>
											<div class="col-md-12 col-sm-12 col-xs-12">
												<label>Confirm Password</label>
												<div class="form-group">              
													<input autocomplete="off" type="text" class="form-control" id="confirmpassword" name="confirmpassword" required placeholder="Confirm Password">
													<span id="errorconfirmpassword" class="error"></span>  
												</div> 
											</div>
                                           
										    <div class="col-md-7 col-sm-12 col-xs-12">
												<label>&nbsp;</label>
												<div class="form-group">              
												   <button type="submit" id="submit" name="submit" style="margin-left: 0%;color: #fff;
    background-color: #449d44;float:left;
    border-color: #255625;box-shadow: 0 0 0 3px rgba(40,167,69,.5);" class="btn btn-success btn-block">Submit</button> 
												</div> 
											</div>
										</div>
									</div>
								</form>
							</div>
							<!-- /# row -->
						</section>
					</div>
				</div>
            </div>
        </div>
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
</html>         