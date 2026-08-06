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
									<h1>Aadhar Print List</h1>
            </script>

								</div>
    </div>
        <div class="card-content collpase show">
          <div class="card-body card-dashboard table-responsive">
             
						    <thead>								<table class="table table-striped table-bordered zero-configuration" width="100%" cellpadding="10" cellspacing="0" style="font-size:12px;font-weight:bold;" >

									<tr style="background:linear-gradient(-62deg, #3a3a53, #03a9f4) !important;">
										<td align="left" valign="left">   Sn.No.       </td>
									 <?php if ($_SESSION['userid']==1){ ?> 
									 <td align="left" valign="left"> User Id </td>	
									 <?php } ?>	
										<td align="left" valign="left">   Aadhar Name      </td>
										<td align="left" valign="left">   Aadharcard No    </td>
									
										<td align="left" valign="left">   Create Date Time  </td>
										<td align="middle" valign="middle">   Print      </td>
											<td align="middle" valign="middle">   PVC Print      </td>


									</tr>
									</thead>
									<?php

	
									$sql="";
									if ($_SESSION['userid']==1){
									    $sql="SELECT * FROM `aadharauto` order by createdatetime desc";
									} else {

																									$sql="SELECT * FROM `aadharauto` WHERE userid='".$_SESSION['userid']."'";
									}
									 $_SESSION['userid'];
									$a = mysqli_query($connection,$sql); $x = 0 ; ?>
								<?php while($b = mysqli_fetch_array($a)){ $x++;  $date = date_create($b['createdatetime']);?>						
									<tr id="a">
										<td align="left" valign="left"> <?=$x?> </td>
									<?php if ($_SESSION['userid']==1){ ?> 
									<td align="left" valign="left"> <?php echo $b['userid']; ?> </td>
									<?php } ?>	
         
										<td align="left" valign="left"> <?=$b['aadharname']?> </td>
										<td align="left" valign="left"> <?=$b['aadharno']?> </td>
										
										<td align="left" valign="left"> <?=date_format($date, 'j M Y g:ia')?> </td>			


                                           <?php
                                        if($b['ispaid']==0){ ?>
                                       <td align="center" valign="middle"> <a   class="btn btn-raised btn-success btn-min-width mr-1 mb-1" href="aadhar3/aadhar.php?searchid=<?php echo $b['aadharautoid']?>" target="_blank"> Print </a> </td>
<?php } else{ ?>
                                        										<td align="center" valign="middle">
										    <form action="findwallet.php" method="post">
										        <input type="hidden"  name="custId" value="<?php echo $b['aadharautoid'];  ?>">
 										     <input type="submit" name ="sub_val" style="margin-top:2px;margin-bottom:2px;padding-top:2px;padding-bottom:2px;"  class="btn btn-warning" value="PAY VIA WALLET / QR"></form></td>


 	                                    <?php }
                                        ?>

<?php
                                        if($b['ispaid']==0){ ?>
                                        										<td align="center" valign="middle"> <a   class="btn btn-raised btn-success btn-min-width mr-1 mb-1" href="123/aadhar1/aadhar.php?searchid=<?php echo $b['aadharautoid']?>" target="_blank"> PVC Print </a> </td>

                                    <?php } else{ ?>
                                        										<td align="center" valign="middle">
										    <form action="findwallet.php" method="post">
										        <input type="hidden"  name="custId" value="<?php echo $b['aadharautoid'];  ?>">
 										     <input type="submit" name ="sub_val" style="margin-top:2px;margin-bottom:2px;padding-top:2px;padding-bottom:2px;"  class="btn btn-warning" value="PAY VIA WALLET / QR"></form></td>

                                        <?php }
                                        ?>
                                        

											</form>	<?php } ?>	
										</td>
									</tr>
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