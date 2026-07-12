<?php include('userHeader.php'); ?>
<?php if($fetch['walletamount'] < 20){
             //$msg = 'Voter Photo Balance is Low Recahgre now';
                        ?>  <script>
          //     alert(" Balance is Low Please Recahgre now");
	  

                window.location.href= "../admin/findwallet.php";
                        </script>
                 <?php }else{
                 }
?>
      <div class="content-wrap">
            <div class="main">
			    <div class="col-md-12">
					<div class="container-fluid">
						<div class="row">
							<div class="page-header">
							</div>
						</div>

 <div class="main-content">
<section class="section">
<div class="section-header">
<h1>Driving Licence Download Instant  HD PDF Print</h1>
</div>
<div class="card">
        <div class="card-header">Driving License Print</div>
    <div class="card-body">
       <form method="post" action="dlinfo.php" autocomplete="off" enctype="multipart/form-data" action="" class="row">
            <div class="form-group col-md-6">
                <label>Driving Lic. No.</label>
                <input class="form-control " id="dlno" name="dlno" placeholder="Driving Lic. No." type="text" required oninput="this.value = this.value.toUpperCase()" pattern="^[A-Z]{2}(\d{13})" title="Please enter valid DL No." maxlength="15">
            </div>
            <div class="form-group col-md-6">
                <label>Date Of Birth</label>
                <input class="form-control " name="dob" placeholder="DD-MM-YYYY" type="text" required maxlength = "10" pattern="\d{2}-\d{2}-\d{4}" title="Please enter dob in DD-MM-YYYY format">
            </div>
           
            <div class="form-group col-md-4 align-self-end">
                <button type="submit" name="dlprint" class="btn btn-primary"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
            </div>
            
        </form>
    </div>
</div>
<?php include('userFooter.php'); ?>

