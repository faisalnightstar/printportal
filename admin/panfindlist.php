<?php
include('userHeader.php'); 
include('manu.php'); ?>
<?php if($fetch['walletamount'] < 5){?>  
<script> window.location.href= "panel.php"; </script>
 <?php }else{}
?>
<style>
  tbody>td{
    font-size:10;
    font-weight:5000;
  }
  td>span{
    font-size:13px;
    font-weight:600;
    padding:0px;
  }
  .table td, .table th{
    padding: 0.5rem;
    margin-left:5px;
    vertical-align: text-top;
  }
  .card .table td, .card .table th {
    padding-left:0.5rem;
    padding-right:0.5rem;
  }
  .sorting_asc{
    width:10px;
  }
</style>




<script>
   $(document).ready(()=>{
    $('#default-datatable').DataTable();

   });
 </script>


<?php
if (isset($_GET['refund']) && $_GET['refund'] == 1 && $_GET['id'] != NULL) {
    $id = base64_decode($_GET['id']);
    $sldata = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM panfind WHERE id='$id'"));
    $apply_by = $sldata['mobile'];
    $username = $sldata['userid'];
    $aadhaar = $sldata['aadhar'];
    $nbal ="25";
    $refund = mysqli_query($connection, "UPDATE `tbluser` SET findwallet = findwallet +$nbal WHERE userid='" . $sldata['userid'] . "'");
    $res = mysqli_query($connection, "UPDATE panfind SET payment_status='5' WHERE id='$id'");
    if($refund){
                                                    
        $message="Amount refund";
        ?>
        <script>
  var message = "<?php echo $message; ?>";
  alert(message);
 window.location='findpanlistgf.php';
</script>
<?php
    }
    }

?>

  <div class="content-wrap">
            <div class="main">
			    <div class="col-md-12">
     <div class="main-content">
<section class="section">
<div class="section-header">
      <div class="card-header">
             
                                           <div class="card-title">
                                            <h3><strong>Full Pan No Show In Between 1 hr.</strong> </h3>
                                             <div class="card-title">
                                             <!--    <a class="btn btn-warning" href="check.php" target="_blank">Verify Pan Card number</a>-->
                                             <!--<a class="btn btn-danger" href="aadhaarverify.php" target="_blank">Verify Aadhar Linked Pan Number</a>-->
                          
  </div>
                                         </div>
                                         </div>
</div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
        <div class="card-content collpase show">
          <div class="card-body card-dashboard table-responsive">
             
           	<table id="ulist" class="table table-striped table-bordered zero-configuration" style="font-size:12px;">
									<tr style="background:linear-gradient(-62deg, #3a3a53, #03a9f4) !important;">
					<td>S.N</td>
					<td>NAME</td>
					<td>AADHAR</td>
					<!--<td>Date Of Birth</td>---->
					<td>Date/Time</td>
					<td>PAN NO</td>
					<td>Payment</td>
					<?php if($fetch['usertype'] == 'ADMIN') {?>
					<td>Edit</td>
					<?php } ?><td>Delete</td>
					</tr>
					</thead>					
	                          <?php
								if($_SESSION['userid']==1)
								    
								    $sql = "SELECT * FROM `panfind` order by id desc";
								else
								    $sql = "SELECT * FROM `panfind` WHERE userid='" . $_SESSION['userid'] . "' order by id desc";
								$a = mysqli_query($connection, $sql);
								$x = 0; ?>
								<?php while ($b = mysqli_fetch_array($a)) {
									$x++; $date = date_create($b['create_time']); ?>
                   
                                          <tr>
                                          <td > <?php echo $x++;?> </td>
                                          <td > <?php echo $b['name']; ?> <br>
                                          <!--<?php echo $b['application_no']; ?>--></td>
                                           <td > <?php echo $b['aadhar'];?> </td>
                                           <!---<td > <?php echo $b['dob'];?> </td>--->
                                           <td > <?php echo $b['date'];?> </td>
                                           <td > 
                                           <?php if($b['payment_status']==5){ ?>
                                          Aadhaar Not Linked
                                           <?php }else{ ?>
                                            <?php echo $b['pan'];?>
                                           <?php } ?></td>
                                           
                                   <td align="center" valign="middle">         
									<?php if($b['payment_status']==1){ ?>
									  <a  class="btn btn-success" id="print" style=" padding-left:15px;"   href="#<?php echo $b['aadhar']?>" ><?php echo $b['status']?> </a> </td>				
									  <?php }else if($b['payment_status']==0){ ?>
									 	<a  style=" padding-left:15px;"  class="btn btn-danger" href="findwallet.php" > Pay via Wallet / QR</a> 
								   <?php }else{ ?>
									<a  style=" padding-left:15px;"  class="btn btn-danger" href="#" > Not Linked </a> 
										<?php } ?></td>
										
								 <td><?php if($fetch['usertype'] == 'ADMIN') {?>
											<form action="findedit.php?id=<?php echo $b['id']?>" method="post" enctype="multipart/form-data" >
												<input name="userid" type="hidden" value="" />
												<input class="btn btn-raised btn-info round btn-min-width mr-1 mb-1" style="margin-top:2px;margin-bottom:2px;padding-top:2px;padding-bottom:2px;" type="submit" value="Edit" />
											</form>
										   </td>
										   <?php } ?>
									

										<td align="center" valign="middle">
											<form action="pandlite.php" method="post" enctype="multipart/form-data" >
												<input name="id" type="hidden" value="<?=$b['id']?>" />
												<input style="padding-left:15px;" class="btn btn-danger" type="submit" value="Remove" />
											</form>
										</td>
									</tr>
									<?php } ?>
										 </table>
</div>
</div>
</div>
</div>
</div>
<?php include('userFooter.php'); ?>
