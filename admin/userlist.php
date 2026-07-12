<?php include ('userHeader.php'); ?>


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
									<h1>User List</h1>
            </script>

								</div>
    </div>
        <div class="card-content collpase show">
          <div class="card-body card-dashboard table-responsive">
             
								<table id="ulist" width="100%" cellpadding="10" cellspacing="0" style="font-size:12px;" >
								<thead>
									<tr style="background:#ff9b00;">
									<th style="color:#fff">   Sn.No.       </th>
									<th style="color:#fff">   Name       </th>
									<th style="color:#fff">   USER ID      </th>
									<th style="color:#fff">   UNDER ID      </th>
									<th style="color:#fff">   User Type      </th>
									
									<th style="color:#fff">   Address      </th>
									<th style="color:#fff">   Registration Date</th>
									<th style="color:#fff">   CUPONS     </th>
									
									<th style="color:#fff">   Password      </th>
									
									
								
									</tr>
									</thead>
									<tbody>
									<?php
									if ($_SESSION['userid'] == 1) {
										$sql="";
										$sql="SELECT `userid`,`usertype`,`fullname`,  `usertype`, `panimage`,`aadharimage`,`loginname`,`status`,  `pswrd`, `emailid`, `adhaarno`, `mobileno`,  `address`, `logdate`, `cityname`, `statename`, `refrenceid`, `remarks`, `walletamount`,`ispaid` FROM `tbluser`  order by userid desc";
									} else {
										$sql="";
										$sql="SELECT  `userid`,`usertype`,`fullname`, `usertype`, `panimage`,`aadharimage`, `loginname`,`status`,  `pswrd`, `emailid`, `adhaarno`, `mobileno`,  `address`,`logdate`,`cityname`,`statename`, `refrenceid`,`remarks`, `walletamount`,`ispaid`  FROM `tbluser` where refrenceid='".$_SESSION['userid']."' order by userid desc";	
									}
									$a = mysqli_query($connection,$sql); $x = 0 ; ?>
									<?php while($b = mysqli_fetch_array($a)){
                                        $counts = mysqli_num_rows(mysqli_query($connection,"select * from tbluser where userid=".$b['refrenceid'].""));
									if($counts != 0)
									{
										
									$k = mysqli_fetch_assoc(mysqli_query($connection,"select * from tbluser where userid=".$b['refrenceid'].""));
									 $name = $k['loginname'];
									 $id_parent = $k['userid'];
									} 
									else 
									{
										$name = '';
									}
									$x++; ?>
									
									<tr  id="<?php echo $b['userid'] ?>">
										<td > <?=$x?> </td>
										<td > <?=$b['fullname']?> </td>
										<td > <?=$b['loginname']?> </td>
										<td > <?=$name?> </td>
										<td > <?=$b['usertype']?> </td>
										<td > <?=$b['address'].' '.$b['cityname'].' '.$b['statename']?> </td>
										<td > <?=$b['logdate']?> </td>
										<td > <?=$b['walletamount']?> </td>
										
										
										<?php if ($_SESSION['usertype'] != "RETAILER") { ?>
										   <td > <?=$b['pswrd']?> </td>
										   
										   
										 
										<?php } ?>
										<?php if ($fetch['usertype'] =='AV' or $fetch['usertype'] == 'ADMIN') {?>
										<?php } ?>
									</tr>
									<?php } ?>
									</tbody>
								</table>
								
									
											
						
								 </div>
								<div class="clearfix"></div>
							 </div>
						</section>
					</div>
				</div>
            </div>
        </div>


			
			
     	
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
</html>