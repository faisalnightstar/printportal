<?php include('userHeader.php'); ?>
   <div class="main-panel">
        <!-- BEGIN : Main Content-->
        <div class="main-content">
          <div class="content-wrapper">
		   	<section id="basic-form-layouts">
                 <div class="col-md-12">
					<div class="container-fluid">
						<div class="row">
							<div class="page-header">
								<div class="page-title">
									<h1>AADHAR FIND LIST</h1>
								</div>
							</div>
						</div>
						<!-- /# row -->
						<section id="main-content">
							<div class="row dgnform">
							    <div class="col-md-12 col-sm-8 col-xs-1" style="    margin-left: 14px;">
							
								<table id="ulist" width="100%" cellpadding="10" cellspacing="0" style="font-size:12px;" >									<tr style="background:linear-gradient(-62deg, #3a3a53, #ff0000) !important;">
		<thead>
									<tr style="background:#ff0000;">
									<th style="color:#fff">   Sn.No.       </th>
									<th style="color:#fff">Name </th>
									<th style="color:#fff">Enrollment NUMBER</th>
									<th style="color:#fff">State</th>
									<th style="color:#fff">   Apply Date      </th>
									<th style="color:#fff">   Status      </th>
                                    <th style="color:#fff">   View      </th>
									 
								 									
									<th style="color:#fff">   Action      </th>
									
								 
								 
									</tr>
									</thead>
									<tbody>
									 <?php 

                                        $q = "SELECT * FROM `aadhaarfind` WHERE userid='".$_SESSION['userid']."' order by id desc";
                                        $a = mysqli_query($connection,$q);
                                       
                                        $x=1;
                                        while($b = mysqli_fetch_array($a)){ 
                                            $state = $b['state'];
                                         $c = "SELECT * FROM birthanddeathprice WHERE state='$state'";
                                         $res=mysqli_query($connection,$c);
                                         $amt = mysqli_fetch_assoc($res);
                                         
                                         
                                        ?>
                                          <tr>
                                          <td > <?php echo $x++;?> </td>
                                            <td > <?php echo $b['name'];?> </td>
                                           <td > <?php echo $b['aadhar'];?> </td>
                                           <td > <?php echo $b['state'];?> </td>
                                           <td > <?php echo $b['date'];?> </td>
                                           <td > <?php echo $b['status'];?> </td>
                                           <td > <a class="btn btn-primary" href="aadhaarfindview.php?id=<?php echo $b['id'];?>" target="_blank">View</a> </td>

                                           <td > <?php if($b['payment_status']==0){ ?>
										   <form action="findwallet.php" method="post">
										        <input type="hidden"  name="CUST_ID" value="<?php echo $b['id'];  ?>">
 										     <input type="submit" name ="sub_val" style="margin-top:2px;margin-bottom:2px;padding-top:2px;padding-bottom:2px;"  class="btn btn-warning" value="PAY VIA WALLET / QR">
 										     </form>
                                           <?php }else if($b['status']=="Generated" && $b['payment_status']==1){?>
                                            <a class="btn btn-success" href="printaadhaarfind.php?a=<?php echo $b['id'];?>">Print</a>
                                           <?php }else{?>
                                            <button class="btn btn-success">In Progress</button>
                                         <?php  } ?></td>

                                           
                                           </tr>
                                       <?php }
                                    ?>
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


<!-- modal view start -->
        
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Applicant Information</h5>
      
        </button>
      </div>
      <div class="modal-body">
       <div class="row p-3">
       <div class="col-sm-4">
        <h4><b>Name:</b></h4>
       </div>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

<!-- modal view -->
		<style>
		tbody tr td
		{
			padding:6px !important;
		}
		thead tr th
		{
			text-align:center !important;
		}
		</style>
		
<?php include('userFooter.php'); ?>