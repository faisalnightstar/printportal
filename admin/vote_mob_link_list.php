<?php include("userHeader.php"); 
$s_phone=$rw['mobileno'];
$res = mysqli_query($connection, "SELECT * FROM `m_link` WHERE userid='$s_phone' ORDER BY `id` DESC");
?>
<!-- Modal for processing -->
<script>
    function myFunction() {
        $("#proc_modal").modal('show');
        document.f1.submit();
    }
</script>
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
                    <div class="card-header bg-dark">
                        <div class="card-title">
                            <h3><strong>Mobile Link List </strong></h3>
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
                                                    <th style="color:white; text-align:center;">Epic No</th>
                                                    <th style="color:white; text-align:center;">Link Mobile</th>
                                                    <th style="color:white; text-align:center;">Status</th>
                                                    <th style="color:white; text-align:center;">Date</th>
                                                    <th style="color:white; text-align:center;">Delete</th>
                                                </tr>
                                            </thead>
                                            <!-- Table data -->
                                            <tbody>
                                                 <?php
                                                $sql = mysqli_query($connection, "SELECT * FROM m_link WHERE userid='$s_phone' order by id DESC");
                                                if (mysqli_num_rows($sql) > 0) {
                                                    $slno = 1;
                                                    while ($data = mysqli_fetch_assoc($sql)) {
                                                ?>
                                                        <tr>
                                                            <td><?php echo $slno; ?></td>
                                                            <td style="text-align:center;"><?php echo $data['epic_no']; ?></td>
                                                            <td style="text-align:center;"><?php echo $data['mobile_no']; ?></td>
                                                            <td style="text-align:center;"><?php echo $data['response']; ?></td>
                                                            <td style="text-align:center;"><?php echo $data['date']; ?></td>
                                                            <td align="center" valign="middle">
                  											<form action="action_m_link.php" method="post" enctype="multipart/form-data" >
                  												<input name="id" type="hidden" value="<?=$data['id']?>" />
                  												<input style="padding-left:15px;" class="btn btn-danger" type="submit" value="Remove" />
                  											</form>
								                		</td>
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
	
</body>



</html>