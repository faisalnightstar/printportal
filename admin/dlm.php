<?php include('userHeader.php'); ?>
<?php if($fetch['findwallet'] < 20){
             //$msg = 'Voter Photo Balance is Low Recahgre now';
                        ?>  <script>
          //     alert(" Balance is Low Please Recahgre now");
	  

                window.location.href= "recharge.php";
                        </script>
                 <?php }else{
                 }
?>

 <div class="main-content">
<section class="section">
<div class="section-header">
<h1>Advance Driving License Print</h1>
</div>
<div class="card">
    <h2>Driving License Print Rs- 20  PDF </h2>
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

