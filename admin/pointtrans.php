<?php include ('userHeader.php'); ?>



<div class="main-panel">
        <!-- BEGIN : Main Content-->
        <div class="main-content">
          <div class="content-wrapper">
					<section id="basic-form-layouts">

  <div class="row">

  </div>
  <div class="row">
    <div class="col-md-16">
      <div class="card">
       <div class="card-body">
          <div class="px-3">
		<link href="selectstyle.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="select2.min.css" />
      <div class="content-wrap">
            <div class="main">
			    <div class="col-md-12">
					<div class="container-fluid">
						<div class="row">
							<div class="page-header">
								<div class="page-title">
									<h1>Action Id Wallet Transfer</h1>
								</div>
							</div>
						</div>
						<!-- /# row -->
						<section id="main-content">
							<div class="row">
							   <?php
								//including the database connection file
								include("./config.php");
								$msg = '';
								if(isset($_POST['submit'])) {	
									
									$q = "";
									$q = "SELECT walletamount FROM tbluser where  userid='".$_SESSION['userid']."'";
									$rr = mysqli_query($connection,$q);
									$rwr = mysqli_fetch_assoc($rr);
									$walletamount=$rwr['walletamount'];
                                    if ($_SESSION['userid']==1){
										$walletamount=1000000000000000000000000;
									}
									$trdate = date('Y-m-d', strtotime($_POST['trdate']));
									$ptr = $_POST['ptr'];
									if ($walletamount>$ptr){
										$touserid = $_POST['touserid'];
										$remark = strtoupper($_POST['remark']);
									
										$tousername="";
										
										$q = "";
										$q = "SELECT mobileno FROM tbluser where  userid='".$touserid."'";
										$r = mysqli_query($connection,$q);
										$rw = mysqli_fetch_assoc($r);
										$tousername=$rw['mobileno'];
										
									

										$qy = "INSERT INTO `tblptr` 
										( `userid`, `username`, `touserid`, `tousername`, `ptrqty`, `ptrdate`, `remark`, `loginid`, `logdate`)
										VALUES ('".$_SESSION['userid']."','".$_SESSION['username']."','".$touserid."','".$tousername."','".$ptr."','".$trdate."','".$remark."','".$_SESSION['userid']."',now())";
										$aqy=mysqli_query($connection,$qy);
										
										//  Dr amount start
										$qu = "";
										 $qu = "INSERT INTO `tbltrans`(`userid`, `username`, `transdate`, `transqty`, `transtype`, `touserid`, `tousername`, `remark`, `loginid`, `logdate`)
										VALUES ('".$_SESSION['userid']."','".$_SESSION['username']."','".$trdate."','".$ptr."','Dr','".$touserid."','".$tousername."','".$remark."','".$_SESSION['userid']."',now())";
										$a1q=mysqli_query($connection,$qu);
										//  Dr amount end
										
										//  Cr amount start
										$qu = "";
										 $qu = "INSERT INTO `tbltrans`(`userid`, `username`, `transdate`, `transqty`, `transtype`, `touserid`, `tousername`, `remark`, `loginid`, `logdate`)
										VALUES ('".$touserid."','".$tousername."','".$trdate."','".$ptr."','Cr','".$_SESSION['userid']."','".$_SESSION['username']."','".$remark."','".$_SESSION['userid']."',now())";
										$a1q=mysqli_query($connection,$qu);
										//  Cr amount end


										//echo $b['wamt'];
										// start led wallet
										
										//end toled wallet
										$f = mysqli_fetch_assoc(mysqli_query($connection,"select * from tbluser where userid=".$touserid.""));
										$sql="";
										if($f['walletamount'] == '')
										{
										$sql = "update tbluser SET walletamount= 0 + ".$ptr." where userid=".$touserid."";
										}
										else 
										{
											$sql = "update tbluser SET walletamount= walletamount + ".$ptr." where userid=".$touserid."";
										}
										
										
										$abs = mysqli_query($connection, $sql);
										
										$fp = mysqli_fetch_assoc(mysqli_query($connection,"select * from tbluser where userid=".$_SESSION['userid'].""));
										$sql="";
										
										if($fp['walletamount'] == '')
										{
										$sql = "update tbluser SET walletamount= 0 - ".$ptr." where userid=".$_SESSION['userid']."";
										}
										else 
										{
											$sql = "update tbluser SET walletamount=walletamount - ".$ptr." where userid=".$_SESSION['userid']."";
										}
										
										$abs = mysqli_query($connection, $sql);
										
										$msg = 'Point Transfer Successfully.........';
										
										?>
										<script>
										setTimeout(function () {
										window.location.href= 'pointtrans.php';
										}, 2000);
										</script>
										<?php
									} else {
										$msgno = 'Point is Low for Transfer';
									}
								}
								?>
								<?php if($msg !='') { ?>
								    <div style="width=100%"  class="row cvmsgok"><?php echo $msg; ?></div>
								<?php } elseif($msgno !='') { ?>
								    <div style="width=100%"  class="row cvmsgno"><?php echo $msgno; ?></div>
								<?php  } ?>
								<form method="post" onSubmit="return validation();" action="" style="width:100%" novalidate>
									<div class="row dgnform" > 
										<div class="col-md-6 col-sm-12 col-xs-12">
											<table class="table-striped table-hover" width="100%" cellpadding="10" cellspacing="0" style="font-size:20px;font-weight:bold;" >
												<tr style="background:#ff9b00;color:#fff">
												<?php 
												$q = "";
												$q = "SELECT walletamount FROM tbluser where  userid='".$_SESSION['userid']."'";
												$r = mysqli_query($connection,$q);
												$rw = mysqli_fetch_assoc($r);
												$wallet=$rw['walletamount'];
												?>
												<td style="color:#fff"  align="left" valign="left">  Point     :   <?php echo $wallet; ?>  </td>
                                               
											


												</td>
												
                                                </tr>
											</table>
										</div>
									</div>


									<div class="row dgnform" style="padding:10px;">
									    <div class="row">
											<div class="col-md-3 col-sm-3 col-xs-6">
												<label for="id-date-picker-1">Transfer Date :</label> 
												<div class="input-group">
													<input class="form-control date-picker" readonly="readonly" required="" value="<?php print(date("d-M-Y")); ?>" name="trdate" type="input" data-date-format="dd-M-yyyy" />
													<span class="input-group-addon">
														<i class="fa fa-calendar bigger-110"></i>
													</span> 
												</div>
											</div>
											
											<div class="col-md-3 col-sm-3 col-xs-6">
												<label>Transfer Point</label>
												<div class="form-group">              
												   <input autocomplete="off" type="number" class="form-control" name="ptr" id="ptr" placeholder="Transfer Point" required="">
												   <span id="errorptr" class="error"></span>
												</div> 
											</div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
												<label>To User Name</label>
												<div class="form-group">
												<select class="form-control"  name="touserid" id="country"  required> 
													<option value="" > Select To User </option>
													<?php 
													if ($_SESSION['userid']==1){
													    $result = mysqli_query($connection,"SELECT fullname,userid,loginname,mobileno FROM tbluser where userid>1  ORDER BY fullname"); 
												    }
												    else if($_SESSION['usertype'] == 'ADMIN') {
												        $url = mysqli_fetch_assoc(mysqli_query($connection,"select * from tbluser where userid=".$_SESSION['userid'].""));
									    $result="";
										$result =mysqli_query($connection,"SELECT `userid`,`usertype`,`fullname`,  `usertype`, `panimage`,`aadharimage`,`loginname`,`status`,  `pswrd`, `emailid`, `adhaarno`, `mobileno`,  `address`, `logdate`, `cityname`, `statename`, `refrenceid`, `remarks`, `walletamount`,`ispaid` FROM `tbluser` where refrenceid='".$_SESSION['userid']."' or remarks='".$url['remarks']."' and walletamount < 2 ORDER BY fullname");
									    }
												    else {
														$result = mysqli_query($connection,"SELECT fullname,userid,loginname,mobileno FROM tbluser where  refrenceid='".$_SESSION['userid']."' and userid<>'".$_SESSION['userid']."' and userid>1 and walletamount < 200000000000000000  ORDER BY fullname"); 
													}
													?>
													
													<?php while($row = mysqli_fetch_array($result)){ echo '<option value="'.$row['userid'].'" >'.$row['mobileno'].' -- '.$row['fullname'].'</option>' ; } ?>
												</select>
												</div> 
											</div>	
                                        </div>
										<div class="row">
										    <div class="col-md-6 col-sm-8 col-xs-12">
												<label>Remark</label>
												<div class="form-group">              
												   <input autocomplete="off" readonly type="text" value="point_credit_to_user" class="form-control" name="remark" placeholder="Remarks" required="">
												</div> 
											</div>	
											<div class="col-md-3 col-sm-3 col-xs-12">
												<label>&nbsp;</label>
												<div class="form-group">              
												   <button type="submit" id="submit" name="submit" class="btn btn-success btn-block" style="border-radius: 20px;
    padding: 10px;background-color:#28a745;border:1px solid orange;">Save</button> 
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
		
<script src="select2.min.js"></script>
<script>
$("#country").select2( {
	placeholder: "Select Country",
	allowClear: true
	} );
</script>

		<script type="text/javascript">
			function validation() {
				
                var ptr = document.getElementById('ptr').value;
				if ( ptr <= 0 ) {
					 document.getElementById('errorptr').innerHTML = " **Please Enter Point Greater Then ZERO !!!";
					 document.getElementById('ptr').style.border = "1px solid red";
					 document.getElementById('ptr').focus();
					 return false;
				}			
			}


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