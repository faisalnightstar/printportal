
<?php include("userHeader.php"); 
$s_phone=$rw['mobileno'];
$res = mysqli_query($connection, "SELECT * FROM `rasn_print` WHERE username='$s_phone' ORDER BY `id` DESC");
if(isset($_POST['delete']) && $_POST['delete'] == "del"){
    $id = base64_decode($_POST['id']);
    $del = mysqli_query($connection,"DELETE FROM `rasn_print` WHERE id='$id'");
    if($del){
        ?>
        <script>
            $(function(){
                Swal.fire(
                    'Success',
                    'Data Deleted Success!',
                    'success'
                )
            });
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
<!-- Modal for processing -->
<script>
    function myFunction() {
        $("#proc_modal").modal('show');
        document.f1.submit();
    }
</script>

<div class="modal fade" id="proc_modal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalCenterLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <center>
                <img src="assets/images/settings.gif" width="100px" height="100px">
                <h6>Please wait. we are processing your request ...</h6>
            </center>
        </div>
    </div>
</div>

<!-- Redirect to recharge page if wallet amount is less than 5 -->
<?php
if ($fetch['walletamount'] < 5) {
    echo "<script> window.location.href= '../admin/recharge.php'; </script>";
}
?>

<!-- Styling -->
<style>
    /* Your styles go here */
</style>

<!-- Datatable initialization -->
<script>
    $(document).ready(() => {
        $('#default-datatable').DataTable();
    });
</script>

<!-- Content section -->
<div class="content-wrap">
    <div class="main">
        <div class="col-md-12">
            <div class="main-content">
                <section class="section">
                    <div class="card-header bg-warning">
                        <div class="card-title">
                            <h3><strong>Instant Ration Print List </strong></h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="default-datatable" class="table table-bordered" width="100%">
                                            <!-- Table headers -->
                                            <thead style="color:white;background:linear-gradient(-62deg, #3a3a53, #03a9f4);">
                                                <tr>
                                                    <th style="color:white">#</th>
                                                    <th style="color:white">Application No</th>
                                                    <th style="color:white">Ration No</th>
                                                    <th style="color:white">Download Date</th>
                                                    <th style="color:white">Details</th>
                                                    <th style="color:white">Download Pdf</th>
                                                    <?php if($_SESSION['userid'] == '1') {?>
                                                    <th style="color:white">Delete</th>
                                                    <?php } ?>
                                                </tr>
                                            </thead>
                                            <!-- Table data -->
                                            <tbody>
                                                <?php
                                                if($_SESSION['userid']==1)
								    
								                 $sql = mysqli_query($connection, "SELECT * FROM rasn_print order by id desc");
							                 	else
                                                $sql = mysqli_query($connection, "SELECT * FROM rasn_print WHERE username='$s_phone' order by id DESC");
                                                if (mysqli_num_rows($sql) > 0) {
                                                    $slno = 1;
                                                    while ($data = mysqli_fetch_assoc($sql)) {
                                                ?>
                                                        <tr>
                                                            <td><?php echo $slno; ?></td>
                                                            <td><?php echo $data['application_no']; ?></td>
                                                            <td><?php echo $data['rasan_no']; ?></td>
                                                            <td><?php echo $data['date']; ?></td>
                                                            <td style="border-left:2px solid red;" class="text-center">
                                                                <form action="" method="post" class="d-inline">
                                                                    <a href="data:image/jpg;base64,<?php echo $data['front']; ?>" download="front.jpg"><img src="front_hkb.png" width="50" height="50" /> Front</a>
                                                                    <a href="data:image/jpg;base64,<?php echo $data['back']; ?>" download="back.jpg"><img src="back_hkb.png" width="50" height="50" /> Back</a>
                                                                </form>
                                                            </td>
                                                            <td align="center" valign="middle">
                                                                <a href="data:application/pdf;base64,<?php echo $data['pdf']; ?>" download="<?php echo $data['dl']; ?>.pdf"><img src="pdf_doc.jpg" width="50" height="50" /></a>
                                                            </td>
                                                            <?php if($_SESSION['userid'] == '1') {?>
                                                            <td align="center" valign="middle">
                  											<form action="action_Rc_to_pdf.php" method="post" enctype="multipart/form-data" >
                  												<input name="id" type="hidden" value="<?=$data['id']?>" />
                  												<input style="padding-left:15px;" class="btn btn-danger" type="submit" value="Remove" />
                  											</form>
								                		</td>
								                		<?php } ?>
                                                        </tr>
                                                <?php
                                                        $slno++;
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
                </section>
            </div>
        </div>
    </div>
</div>

<!-- ClipboardJS initialization -->
<script>
    $(document).ready(function() {
        new ClipboardJS('.btn');
    });
</script>

<?php include("userFooter.php");?>