<?php
include('userHeader.php'); 
include('manu.php');
?> 
<?php if($fetch['walletamount'] < 5){?>  
<script> window.location.href= "../admin/recharge.php"; </script>
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


  <div class="content-wrap">
            <div class="main">
			    <div class="col-md-12">
     <div class="main-content">
<section class="section">
      <div class="card-header bg-warning">
             
                                           <div class="card-title">
                                            <h3><strong>Instant Pan NO Find List</strong> </h3>
                                             <div class="card-title">
                          
  </div>
                                         </div>
                                         </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
            <table id="default-datatable" class="table table-bordered" width="100%">
            <thead style="color:white;background:linear-gradient(-62deg, #3a3a53, #03a9f4);">
            <tr>
					<td>S.N</td>
					<td>Transaction ID</td>
					<td>AADHAR</td>
					<!--<td>Date Of Birth</td>---->
					<td>Date/Time</td>
					<td>PAN NO</td>
					<?php if($fetch['usertype'] == 'ADMIN') {?>
					<td>Mobile NO</td>
					<td>Edit</td>
					<td>Delete</td>
					<?php } ?>
					</tr>
					</thead>					
	                          <?php
								if($_SESSION['userid']==1)
								    
								    $sql = "SELECT * FROM `pan_instant` order by id desc";
								else
								    $sql = "SELECT * FROM `pan_instant` WHERE userid='" . $_SESSION['userid'] . "' order by id desc";
								$a = mysqli_query($connection, $sql);
								$x = 1; 
                                        while($b = mysqli_fetch_array($a)){ ?>
                   
                                          <tr>
                                          <td > <?php echo $x++;?> </td>
                                          <td > <?php echo $b['application_no'];?> </td>
                                           <td > <?php echo $b['aadhar'];?> </td>
                                           <!---<td > <?php echo $b['dob'];?> </td>--->
                                           <td > <?php echo $b['date'];?> </td>
                                           <td > <B><?php echo $b['pan'];?></B>
                                           
                                           <?php if($fetch['usertype'] == 'ADMIN') {?>
                                            <td > <?php echo $b['user_mobile'];?> </td>
								            <td> <form action="pan_instant_edit.php?id=<?php echo $b['id']?>" method="post" enctype="multipart/form-data" >
												<input name="userid" type="hidden" value="" />
												<input class="btn btn-raised btn-info round btn-min-width mr-1 mb-1" style="margin-top:2px;margin-bottom:2px;padding-top:2px;padding-bottom:2px;" type="submit" value="Edit" />
										       </form>
										   </td>

										<td align="center" valign="middle">
											<form action="pan_find_instant_action.php" method="post" enctype="multipart/form-data" >
												<input name="id" type="hidden" value="<?=$b['id']?>" />
												<input style="padding-left:15px;" class="btn btn-danger" type="submit" value="Remove" />
										</form>
								 	</td>
								 <?php } ?>
								</tr>
							<?php } ?>
						</table>
</div>
</div>
</div>
</div>
</div>
<?php include('userFooter.php'); ?>
