<?php
include('userHeader.php'); 
include('manu.php');
?>
<?php if($fetch['walletamount'] < 5){?>  
 <script>
 window.location.href= "../admin/recharge.php";
  </script>
 <?php }else{
  }
?>

    
<?php 
$ids=$_GET['voterautoid'];
$showquery = "SELECT * FROM `voterauto1` where voterautoid=$ids";
$showdeta = mysqli_query($connection,$showquery);
$arrdeta =mysqli_fetch_array($showdeta);

if(isset($_POST['Update'])){
    $idupdare=$_GET['voterautoid'];

    $votername = $_POST['votername'];
    $epicno = $_POST['epicno'];
    $dob = $_POST['dob'];
    $payment_status = $_POST['payment_status'];
    date_default_timezone_set("Asia/Kolkata");
    $timestamp = date('d/m/Y g:i:s');
    //print_r($_POST);
  
$query = " update `voterauto1` set voterautoid=$idupdare, votername='$votername', epicno='$epicno', dob='$dob', payment_status='$payment_status' where voterautoid=$idupdare";
    $res = mysqli_query($connection,$query);
    if($res){
        $msgno=1;
         echo "<script> alert(' $payment_status Update Successful ') </script>";

    }else{
        $msgno=0;
         echo "<script> alert('$payment_status Update Reject') </script>";
    }
}


?>
<div class="content-wrap"> 
<div class="main"> 
<div class="col-md-12">
     <div class="main-content">
<section class="section">
<div class="section-header">
<h1>Voter Manual Admin Edit
</h1>

</div>
<div class="card">
        <div class="card-header">Voter Manual Print 

</div>
    <div class="card-body">
					
                      <section id="main-content">
                       <?php if($msgno==1){ ?><div style="width=100%"  class="row cvmsgok"><?php echo $msg; ?></div>
                       <script>
                       
                       setTimeout(()=>{
                            window.location.href="voter_org_list.php";
                       },200);</script>
                       <?php } ?>
							<div class="row  dgnform">
                           
                           <div class="col-sm-9">
                           <form action="" method="post">  
                           <div class="row">
                         
                                                    <div class="col-sm-4">
                                                        <label>Name.</label>
                                                        <div class="form-group">
                                                            <input class="form-control " value="<?php echo $arrdeta ['votername'];?>"  id="votername" placeholder="votername" autocomplete="off" name="votername" type="text" maxlength="45" required="">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-4">
                                                        <label>Voter Number.</label>
                                                        <div class="form-group">
                                                            <input class="form-control " value="<?php echo $arrdeta ['epicno'];?>" id="epicno" placeholder="Voter Number" name="epicno" type="text" maxlength="20" required="">
														</div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label>DOB.</label>
                                                        <div class="form-group">
                                                            <input class="form-control " value="<?php echo $arrdeta ['dob'];?>" id="dob" placeholder="Date Of Birth" name="dob" type="text" maxlength="10" >
														</div>
                                                    </div>
                                                    
                                                    <div class="col-sm-4">
                                                        <label>Payment Status</label>
                                                        <div class="form-group">
                                                            <input class="form-control " value="<?php echo $arrdeta ['payment_status'];?>" id="payment_status" name="payment_status" type="text" maxlength="1" required="">
														</div>
                                                    </div>
													
                                                   
                                                    <div class="col-sm-4">
                                                        <div class="form-group">

                                                            <button class="form-control btn btn-success" name="Update" id="Update">Update</button>
													
                                                </div>
                                         
<?php include('userFooter.php');?>   