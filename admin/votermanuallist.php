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
              <h1>VOTER MANUAL LIST </h1>
            </script>
    	
        
        </div>
        </div>
        <div class="card-content collpase show">
          <div class="card-body card-dashboard table-responsive">
             
							
				<table class="table-striped table-hover" width="100%" cellpadding="10" cellspacing="0" style="font-size:12px;font-weight:bold;" >
									<tr style="background:green;">
										<td align="left" valign="left">   Sn.No.       </td>
										<td align="left" valign="left">   Voter Id No     </td>
										<td align="left" valign="left">   Voter Name      </td>	
										
										<td align="left" valign="left">  CREAT DATE & TIME  </td>
										<td align="middle" valign="middle">   Print     </td>
										   <td align="middle" valign="middle">   Delete      </td>
									</tr>
									
									<?php
									$sql="";
									if ($_SESSION['userid']==1){
									     $sql="SELECT * FROM `voterauto0` WHERE 1 order by status desc";
									} else {
									 $sql="SELECT * FROM `voterauto0` WHERE userid='".$_SESSION['userid']."' order by srno desc";
									}
									
									$a = mysqli_query($connection,$sql); $x = 1 ; ?>
									<?php while($b = mysqli_fetch_array($a)){ $x++;  $date = date_create($b['createdatetime']);?>
									<tr id="a">
										<td align="left" valign="left"> <?=$x?> </td>
										<td align="left" valign="left"> <?=$b['epicno']?> </td>
										<td align="left" valign="left"> <?=$b['votername']?> </td>
										<td align="left" valign="left"> <?=date_format($date, 'j M Y g:ia')?></td>
										<?php
									
										if($b['payment_status']=='0')
										{
										    ?>
										    
										<td align="center" valign="middle">
										   <form action="findwallet.php" method="post">
										   <input type="hidden"  name="custId" value="<?php echo $b['voterautoid'];  ?>">
 										     <input type="submit" name ="sub_val" style="margin-top:2px;margin-bottom:2px;padding-top:2px;padding-bottom:2px;"  class="btn btn-warning" value="PAY VIA WALLET / QR"></form></td>
										<?php
										}
										else
										{
										    ?>
										<td align="center" valign="middle"> <a style="margin-top:2px;margin-bottom:2px;padding-top:2px;padding-bottom:2px;"  class="btn btn-success active " style="margin-top:2px;margin-bottom:2px;padding-top:2px;padding-bottom:2px;" href="vm/voter3.php?searchid=<?php echo $b['voterautoid']?>" target="_blank"><i class="fa fa-print" style="color:black"></i> Print </a>
										<a style="margin-top:2px;margin-bottom:2px;padding-top:2px;padding-bottom:2px;"  class="btn btn-success active " style="margin-top:2px;margin-bottom:2px;padding-top:2px;padding-bottom:2px;" href="vm/assam/voterassam2.php?searchid=<?php echo $b['voterautoid']?>" target="_blank"><i class="fa fa-print" style="color:black"></i> ASSAM VOTER </a>
										</td>
										
										
										<?php
										}
											?>
											<td align="center" valign="middle">
												<form action="vmp.php" method="post" enctype="multipart/form-data" >
													<input name="id" type="hidden" value="<?=$b['voterautoid']?>" />
													<input style="margin-top:2px;margin-bottom:2px;padding-top:2px;padding-bottom:2px;" class="btn btn-danger" type="submit"  value="Delete" />
											</form>
										</td>
									</tr>
									<?php } ?>
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