<?php 
	include('userHeader.php');
if(isset($_POST['delete']) && $_POST['delete'] == "Remove"){
    $id = $_POST['id'];
    $del = mysqli_query($connection,"DELETE FROM `rationPdf_Uid` WHERE id='$id'");
    if($del){
        ?>
        <script>
            $(function(){
                Swal.fire(
                    'Success',
                    'Data Deleted Success!',
                    'success'
                )
            })
                      setTimeout(() => {
                            window.location='';
                        }, 5000);
                    </script>
        <?php
    }else{
        ?>
        <script>
            $(function(){
                Swal.fire(
                    'Opps',
                    'Data Not Deleted !',
                    'error'
                )
            });
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
                <div class="card radius-10 ">
                <div class="card-body">
                <div class="d-flex align-items-center ">
                <div>
                <h5 class="mb-0" >RATION PDF LIST</h5>
                </div>
                </div>
                <hr>
                <div class="table-responsive">
                        <table id="example2" class="table align-middle mb-0">
                        <thead class="table-light">
                        <tr>
                        <th class="text-center">SL.</th>
                        <th class="text-center">Aadhar No</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">PDF</th>
                        <th class="text-center">Apply date</th>
                        <?php if($_SESSION['userid'] == '1'){?>
                        <th class="text-center">Delete</th>
                        <?php }?>
                        </tr>
                        </thead>
                        <tbody>
                           
<?php
$res = mysqli_query($connection,"SELECT * FROM rationPdf_Uid WHERE username='".$rw['mobileno']."'  ORDER BY id DESC");
if(mysqli_num_rows($res)>0){
    $x=0;
    while($data = mysqli_fetch_assoc($res)){
        $x ++;
        ?>
            <tr>
            <td class="text-center"><?= $x;?></td>
            <td>
            <span class="badge rounded-pill bg-light text-dark">
            <strong><?php echo  $data['aadhaar']; ?></strong></span></td>
            <td>
            <span class="badge rounded-pill bg-light text-dark">    
            <strong><?php echo strtoupper($data['name']); ?></strong></td>
            <td align="center" valign="middle">
              <a href="<?php echo $data['pdf']; ?>" download="<?php echo $data['name']; ?>_<?php echo $x; ?>.pdf"><img src="pdf_doc.jpg" width="50" height="50" /></a>
            </td>
            <td class="text-center">
            <span class="badge rounded-pill bg-light text-dark">    
            <strong><?php echo strtoupper($data['date']); ?></strong></td>
            
            <?php if($_SESSION['userid'] == '1'){?>
              <td align="center" valign="middle">
            	<form action="" method="post" enctype="multipart/form-data" >
            		<input name="id" type="hidden" value="<?=$data['id']?>" />
            		<input style="padding-left:15px;" class="btn btn-danger" type="submit" name="delete" value="Remove" />
            	</form>
	        </td>
	        <?php } ?>
            </tr>
        <?php
       
    }
}
?>
                          
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
<?php 
include('userFooter.php');
?>
</body>
</html>