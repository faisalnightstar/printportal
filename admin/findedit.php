<?php include('userHeader.php');
      include('manu.php'); ?>
       
    
<?php 
$ids=$_GET['id'];

$showquery = "SELECT * FROM `panfind` where id=$ids";
$showdeta = mysqli_query($connection,$showquery);
$arrdeta =mysqli_fetch_array($showdeta);

if(isset($_POST['Update'])){
    $idupdare=$_GET['id'];

    $name = $_POST['name'];
    $aadhar = $_POST['aadhar'];
    $pan = $_POST['pan'];
    $status = $_POST['status'];
    $payment_status = $_POST['payment_status'];
    date_default_timezone_set("Asia/Kolkata");
    $timestamp = date('d/m/Y g:i:s');
    //print_r($_POST);
$query = " update `panfind` set id=$idupdare, name='$name', aadhar='$aadhar', pan='$pan', status='$status', payment_status='$payment_status' where id=$idupdare";
    $res = mysqli_query($connection,$query);
    if($res){ 
        $msgno=1;
         echo "<script> alert('Pan Number :- $pan Update SUCCESSFUL') </script>";

    }else{
        $msgno=0;
         echo "<script> alert('Pan Number Update Rejected') </script>";
    }
}


?>
<div class="content-wrap"> 
<div class="main"> 
<div class="col-md-12">
     <div class="main-content">
<section class="section">
<div class="section-header">
<h1>Find Lost Pan Card No
</h1>

</div>
<div class="card">
        <div class="card-header">Aadhar Card To Pan Card Print 

</div>
    <div class="card-body">
					
                      <section id="main-content">
                       <?php if($msgno==1){ ?><div style="width=100%"  class="row cvmsgok"><?php echo $msg; ?></div>
                       <script>
                       
                       setTimeout(()=>{
                            window.location.href="panfindlist.php";
                       },200);</script>
                       <?php } ?>
							<div class="row  dgnform">
                           
                           <div class="col-sm-9">
                           <form action="" method="post">  
                           <div class="row">
                         
                                                    <div class="col-sm-4">
                                                        <label>Name.</label>
                                                        <div class="form-group">
                                                            <input class="form-control " value="<?php echo $arrdeta ['name'];?>" readonly id="name" placeholder="Name" autocomplete="off" name="name" type="text" maxlength="45" required="">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-4">
                                                        <label>Aadhar No.</label>
                                                        <div class="form-group">
                                                            <input class="form-control " value="<?php echo $arrdeta ['aadhar'];?>"readonly id="Aadhar No" placeholder="Aadhaar No" name="aadhar" type="text" maxlength="12" required="">
														</div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label>Pan No.</label>
                                                        <div class="form-group">
                                                            <input class="form-control " value="<?php echo $arrdeta ['pan'];?>" id="Pan No" placeholder="Pan No" name="pan" type="text" maxlength="40" >
														</div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label>Payment Status</label>
                                                        <div class="form-group">
                                                            <input class="form-control " value="<?php echo $arrdeta ['payment_status'];?>" id="payment_status" name="payment_status" type="text" maxlength="1" required="">
														</div>
                                                    </div>
													
                                                    <div class="col-sm-4">
                                                        <label>Status</label>
                                                        <div class="form-group">

                                                            <select name="status" class="form-control" id="status" required>
                                                            <option value="Success">Success</option>
                                                            <option value="In Progress">In Progress</option>
                                                            <option value="Reject">Reject</option>
                                                            </select>
                                                         </div>
                                                    </div>
                                                   
                                                    <div class="col-sm-4">
                                                        <div class="form-group">

                                                            <button class="form-control btn btn-success" name="Update" id="Update">Update</button>
													
                                                </div>
                                         
<?php include('userFooter.php');?>   