<?php include('userHeader.php');
      include('manu.php');
?>
        <div class="main-panel">
        <!-- BEGIN : Main Content-->
        <div class="main-content">
          <div class="content-wrapper">
		   	
                 <div class="col-md-12"> 
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


    <div class="section-header">
      <h1>Driving License List</h1>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table id="default-datatable" class="table table-bordered" width="100%">
                  <thead class="bg-info">
                  <tr>
                        <th>Sn No.</th>
                        <th>Name.</th>
                        <th>DL No.</th>
                        <th>Date Of Birth</th>
                        <th>Print</th>
                       
                        <th>Delete</th>
                  </tr>
                        </thead>

                          	<?php
								if($_SESSION['userid']==1)
								    
								    $sql = "SELECT * FROM `dllist` order by id desc";
								else
								    $sql = "SELECT * FROM `dllist` WHERE userid='" . $_SESSION['userid'] . "' order by id desc";
								$a = mysqli_query($connection, $sql);
								$x = 0; ?>
								<?php while ($b = mysqli_fetch_array($a)) {
									$x++;
									$date = date_create($b['create_time']); ?>
                   

		                            	<tr id="a">
										<td align="left" valign="left"> <?=$x?> </td>
										<td align="left" valign="left"> <?=$b['name']?> </td>
										<td align="left" valign="left"> <?=$b['dlno']?> </td>
										<td align="left" valign="left"> <?=date_format($date, 'j M Y g:ia')?> </td>
										
										
						    	<?php if($b['payment_status']==1){ ?>
								<td align="center" valign="middle"> <a  class="btn btn-success" id="print" style=" padding-left:15px;"   href="dlservice/dlnew.php?id=<?php echo $b['id']?>" target="_blank">New Print </a> </td>										<?php } else { ?> 
								<td align="center" valign="middle">	
								<form action="dlpay/index.php?id=<?php echo $b['id'];?>&amount=<?php echo $amt['amount'];?>" method="post" enctype="multipart/form-data" >
									<input type="submit" class="btn btn-warning" value="PAY">
									</form>
										<?php } ?></td>
										
										<td align="center" valign="middle">
											<form action="dlactive.php" method="post" enctype="multipart/form-data" >
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
