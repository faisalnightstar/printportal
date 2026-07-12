<?php
include('userHeader.php'); 
include('manu.php');
?>
<?php if($fetch['walletamount'] < 5444445){?>  
 <script>
     window.location.href= "../admin/recharge.php";
             </script>
                 <?php }else{
                 }
?>

    
<?php 
$ids=$_GET['id'];

$showquery = "SELECT * FROM `pan_instant` where id=$ids";
$showdeta = mysqli_query($connection,$showquery);
$arrdeta =mysqli_fetch_array($showdeta);

if(isset($_POST['Update'])){
    $idupdare=$_GET['id'];
    $aadhar = $_POST['aadhar'];
    $pan = $_POST['pan'];
    $mobile = $_POST['user_mobile'];
    $query = " update `pan_instant` set id=$idupdare, aadhar='$aadhar', pan='$pan', user_mobile='$mobile' where id=$idupdare";
    $res = mysqli_query($connection,$query);
    if($res){
        $msgno=1;
         echo "<script> alert('Pan Number :- $pan Update Successful ') </script>";

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
<h1>Sure Fast Instant Pan Card No </h1>

</div>
<div class="card">
        <div class="card-header">Aadhar Card To Pan Number Find </div>
    <div class="card-body">
					
                      <section id="main-content">
                       <?php if($msgno==1){ ?><div style="width=100%"  class="row cvmsgok"><?php echo $msg; ?></div>
                       <script>
                       
                       setTimeout(()=>{
                            window.location.href="pan_find_instant_list";
                       },200);</script>
                       <?php } ?>
							<div class="row  dgnform">
                           
                           <div class="col-sm-9">
                           <form action="" method="post">  
                           <div class="row">
                         
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
                                                        <label>Mobile No.</label>
                                                        <div class="form-group">
                                                            <input class="form-control " value="<?php echo $arrdeta ['user_mobile'];?>" id="user_mobile" placeholder="mobile" name="user_mobile" type="number" maxlength="10" >
														</div>
                                                    </div>
                                                    
                                                   
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <button class="form-control btn btn-success" name="Update" id="Update">Update</button>
												  </div>
                                         
<?php include('userFooter.php');?>   