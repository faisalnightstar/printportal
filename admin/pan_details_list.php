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
                                            <h3><strong>PAN DETAILS VERIFY LIST</strong> </h3>
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
					<td>PAN NO</td>
					<td>NAME</td>
					<td>FATHER NAME</td>
					<td>DOB</td>
					<td>GENDER</td>
					</tr>
					</thead>					
	                          <?php
								if($_SESSION['userid']==1)
								    
								    $sql = "SELECT * FROM `pan_verify_hkb` order by id desc";
								else
								    $sql = "SELECT * FROM `pan_verify_hkb` WHERE username='" . $_SESSION['userid'] . "' order by id desc";
								$a = mysqli_query($connection, $sql);
								$x = 1; 
                                        while($b = mysqli_fetch_array($a)){ ?>
                   
                                          <tr>
                                          <td > <?php echo $x++;?> </td>
                                          <td > <?php echo $b['pan'];?> </td>
                                          <td > <?php echo $b['name'];?> </td>
                                          <td > <?php echo $b['fathername'];?> </td>
                                          <td > <?php echo $b['dob'];?> </td>
                                          <td > <B><?php echo $b['gender'];?></B>
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
