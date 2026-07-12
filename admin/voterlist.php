<?php
include('userHeader.php'); 
include('manu.php'); 
?><?php if($fetch['walletamount'] < 5){
             //$msg = 'Voter Photo Balance is Low Recahgre now';
                        ?>  <script>
          //     alert(" Balance is Low Please Recahgre now");
	  

                window.location.href= "../admin/recharge.php";
                        </script>
                 <?php }else{
                 }
?>
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
              <h1>VOTER ADVANCE LIST </h1>
            </script>
    	
        
        </div>
        </div>
        <div class="card-content collpase show">
          <div class="card-body card-dashboard table-responsive">
             
           	<table id="ulist" class="table table-striped table-bordered zero-configuration" style="font-size:12px;">
									<tr style="background:linear-gradient(-62deg, #3a3a53, #03a9f4) !important;">
										<td style="color:#fff" align="left" valign="left">   Sn.No.          </td>
										<td style="color:#fff" align="left" valign="left">   Voter Id No     </td>
										<td style="color:#fff" align="left" valign="left">   Voter Name      </td>	
										<td style="color:#fff" align="left" valign="left">      DATE & TIME  </td>
										<td style="color:#fff" align="middle" valign="middle">     Print     </td>
										<?php if($fetch['usertype'] == 'ADMIN') {?>
				    	                <td style="color:#fff" align="middle" valign="middle">     Edit     </td>
				    	                <?php } ?>
										<td style="color:#fff" align="middle" valign="middle">     Delete    </td>
									</tr>
									
									<?php
									$sql="";
									if ($_SESSION['userid']==1){
									     $sql="SELECT * FROM `voterauto2` WHERE 1 order by createdatetime desc";
									} else {
									 $sql="SELECT * FROM `voterauto2` WHERE userid='".$_SESSION['userid']."' order by srno desc";
									}
									
									$a = mysqli_query($connection,$sql); $x = 0 ; ?>
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
										   <form action="voteradvance2/index.php?voterautoid=<?php echo $b['voterautoid'];?>&amount=<?php echo $amt['amount'];?>" method="post">
										   <input type="hidden"  name="custId" value="<?php echo $b['voterautoid'];  ?>">
										     <input type="submit" name ="sub_val" style="margin-top:2px;margin-bottom:2px;padding-top:2px;padding-bottom:2px;"  class="btn btn-warning"value="PAY NOW"></form></td>
										<?php
										}
										else
										{
										    ?>
										<td align="center" valign="middle"> <a style="margin-top:2px;margin-bottom:2px;padding-top:2px;padding-bottom:2px;"  class="btn btn-success active " style="margin-top:2px;margin-bottom:2px;padding-top:2px;padding-bottom:2px;" href="voter1/voter3.php?searchid=<?php echo $b['voterautoid']?>" target="_blank"><i class="fa fa-print" style="color:black"></i> Print </a>
										<a style="margin-top:2px;margin-bottom:2px;padding-top:2px;padding-bottom:2px;"  class="btn btn-success active " style="margin-top:2px;margin-bottom:2px;padding-top:2px;padding-bottom:2px;" href="voter1/assam/voterassam2.php?searchid=<?php echo $b['voterautoid']?>" target="_blank"><i class="fa fa-print" style="color:black"></i> ASSAM VOTER </a>
										</td>
										
										
										<?php
										}
											?>
											<td align="center" valign="middle">
												<form action="voterdelete2.php" method="post" enctype="multipart/form-data" >
													<input name="voterautoid" type="hidden" value="<?=$b['voterautoid']?>" />
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
			
<?php include('userFooter.php'); ?>