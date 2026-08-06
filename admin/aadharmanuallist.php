<?php include('userHeader.php'); ?>
      <div class="main-panel">
        <!-- BEGIN : Main Content-->
        <div class="main-content">
          <div class="content-wrapper"><!--Flat button starts -->
<section id="buttons">
  <div class="row">
    <!--Flat Buttons Starts -->
    <div class="col-sm-12">
      <div class="card">
        	</div>
						<!-- /# row -->
				
							    <div class="col-md-12 col-sm-12 col-xs-12">
								<table class="table table-striped table-bordered zero-configuration" width="100%" cellpadding="10" cellspacing="0" style="font-size:12px;font-weight:bold;" >
								    <thead>
									<tr style="background:blue;">
										<td align="left" valign="left">   Sn.No.       </td>
									 <?php if ($_SESSION['userid']==1){ ?> 	<td align="left" valign="left"> User Id </td>	<?php } ?>	
										<td align="left" valign="left">   Aadhar Name      </td>
										<td align="left" valign="left">   Aadharcard No    </td>
									
										<td align="left" valign="left">   Create Date Time  </td>
										<td align="middle" valign="middle">   Print      </td>
									 <td align="middle" valign="middle">   Delete </td>	
         

									</tr>
									</thead>
									<?php
									$sql="";
									if ($_SESSION['userid']==1){
									    $sql="SELECT `userid`,`aadharmanualid`,`aadharno`, `aadharname`, `street`, `panchayat`, `vtcandpost`, `dist`, `statename`, `pincode`, `srno`, `createdatetime`, `payment_status`FROM `aadharmanual` WHERE  1 order by srno desc";
									} else {
										$sql="SELECT `userid`,`aadharmanualid`,`aadharno`, `aadharname`, `street`, `panchayat`, `vtcandpost`, `dist`, `statename`, `pincode`, `srno`, `createdatetime`, `payment_status` FROM `aadharmanual` WHERE userid='".$_SESSION['userid']."'";
									}
									echo $_SESSION['userid'];
									$a = mysqli_query($connection,$sql); $x = 0 ; ?>
								<?php while($b = mysqli_fetch_array($a)){ $x++;  $date = date_create($b['createdatetime']);?>						
									<tr id="a">
										<td align="left" valign="left"> <?=$x?> </td>
									<?php if ($_SESSION['userid']==1){ ?> 	<td align="left" valign="left"> <?=$b['userid']?> </td>	<?php } ?>	
         
										<td align="left" valign="left"> <?=$b['aadharname']?> </td>
										<td align="left" valign="left"> <?=$b['aadharno']?> </td>
										
										<td align="left" valign="left"> <?=date_format($date, 'j M Y g:ia')?> </td>			

                                        <?php
                                        if($b['payment_status']==1){ ?>
                                        										<td align="center" valign="middle"> <a   class="btn btn-raised btn-success btn-min-width mr-1 mb-1" href="aadhar4/aadharmanual.php?searchid=<?php echo $b['aadharmanualid']?>" target="_blank"> Print </a> </td>

                                        <?php } else{ ?>
                                        <td align="center" valign="middle">
										    <form action="findwallet.php" method="post">
										        <input type="hidden"  name="custId" value="<?php echo $b['aadharmanualid'];  ?>">
 										     <input type="submit" name ="sub_val" style="margin-top:2px;margin-bottom:2px;padding-top:2px;padding-bottom:2px;"  class="btn btn-warning" value="PAY VIA WALLET / QR"></form></td>


	                                    <?php }
                                        ?>
										<td align="center" valign="middle">
											<form action="activemanual.php" method="post" enctype="multipart/form-data" >
												<input name="aadharmanualid" type="hidden" value="<?=$b['aadharmanualid']?>" />
												<input  class="btn btn-raised btn-outline-danger btn-min-width mr-1 mb-1" type="submit" value="Remove" />
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
       
    <!-- END PAGE LEVEL JS-->
			