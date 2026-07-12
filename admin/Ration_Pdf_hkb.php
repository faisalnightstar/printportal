 
<?php include("userHeader.php"); 

     $fee =  "10";    // fee change accourding yourself
     
if (isset($_POST['B2']) && $_POST['B2'] == "Bittu") {
     $rasan_no = mysqli_real_escape_string($connection,$_POST['rasan_no']);
     $type = mysqli_real_escape_string($connection,$_POST['type']);
     $application_no = "HKB_".rand(000000,999999);
     
     
     $username = $rw['mobileno'];
     $wallet_amount=$rw['findwallet'];
    
     if($wallet_amount > $fee){
    $debit_fee =  $wallet_amount - $fee;
    
    $api_hkb ="JG95v2az-X5OT-osEb-Lves-Mz4K7NuNwHij"; // Buy APi From This Website https://hkbwebdeveloping.tech ( Design & Development By HKB )
    $url = "https://test.axenapi.co.in/Dashboard/Verify_api/Rc_TO_Pdf/ration_Verify_api.php?state=other&rasan_no=$rasan_no&area=area&district=dist&api=$api_hkb&type=$type";

$curl = curl_init();
curl_setopt_array($curl, array( 
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

 $response = curl_exec($curl);
 curl_close($curl);
$resdata = json_decode($response, true);
 if($resdata['error']){
    ?>
     <script>
            $(function(){
                Swal.fire(
                    '<?php echo $resdata['error']; ?>',
                    'Admin Token Error Contact ADMIN',
                    'warning'
                )
            });
            window.setTimeout(function(){
                window.location.href='Ration_Pdf_hkb.php';
            },20000);
            
        </script>
        <?php
}else if($resdata['a4'] != ""){
      $front=$resdata['front'];
      $back=$resdata['back'];
      $a4=$resdata['a4'];
     $debit = mysqli_query($connection,"UPDATE `tbluser` SET findwallet='$debit_fee' WHERE mobileno='$username'");
     if($debit){
      $insert = mysqli_query($connection, "INSERT INTO rasn_print (application_no,username,rasan_no,state,response,status, fee,front,back,pdf) VALUES ('$application_no','$username','$rasan_no', '$state', '$response','success', '$fee', '$front','$back','$a4');");
       
      
          date_default_timezone_set('Asia/Kolkata');
          $timestamp = date("Y-m-d H:i:s");
          $summary = mysqli_query($connection,"INSERT INTO `card_summary`(`name`, `number`, `status`, `fee`,`type`,`old_balance`,`new_balance`, `date`, `userid`) VALUES ('$application_no','$rasan_no','Ration HKB Print PDF','$fee','D','$wallet_amount','$debit_fee','$timestamp','".$_SESSION['userid']."')");  
      
      if($insert){
          ?>
           <script>
                        $(function(){
                            Swal.fire(
                                'Rasan NO : <?php echo $rasan_no;?> is Downloaded',
                                'Application : <?php echo $application_no; ?> Message : File Generated',
                                'success'
                            )
                        })
                        setTimeout(() => {
                            window.location='Ration_Pdf_hkb_list.php';
                        }, 5000);
                    </script>
          <?php
      }
     }
  }
        
    }else{
        ?>
        <script>
            $(function(){
                Swal.fire(
                    'Opps',
                    'Wallet Balance Insufficient ! Please Recharge ',
                    'error'
                )
            });
            window.setTimeout(function(){
                window.location.href='findwallet.php';
            },);
            
        </script>
        <?php
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>
 <div class="content-wrap">
    <div class="main">
        <div class="col-md-12">
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <div class="container-fluid">
                            <!--<div class="row">-->
                            <!--    <h1>Information <?php echo $wallet; ?></h1>-->
                            <!--</div>-->
                        </div>
                    </div>
                    <!--<div class="page-wrapper" style="display: block;">-->
                    <!--    <div class="page-breadcrumb">-->
                    <!--        <div class="row mb-2">-->
                    <!--            <div class="col-sm-6">-->
                    <!--                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Instant Dl Print</h4>-->
                    <!--            </div>-->
                    <!--            <div class="col-sm-6 text-right">-->
                    <!--                <a href="dlprint_list" class="btn btn-primary btn-sm">Pan List</a>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                        <div class="col-md-12">
                            <div class="card card-default">
                                <div class="card-header bg-warning">
                                    <div class="card-title">
                                        <h3><strong>Enter beneficiary Details</strong></h3>
                                        <h4>Disclaimer :- CHARGE - ₹ 20, FAST SERVICE</h4>
                                        <h4>Disclaimer :- If Data is Already Available in Database Then Charge is deducted From Your Account is Rs. <B>5</B></h4>
                                        <h4>Disclaimer :- Instant Service</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid">
                            <div class="card col-12">
                                <hr>
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <div class="card">
                                            <div class="card-body">
                            <div class="alert alert-danger" role="alert">
                                We Are Trying Our Best
                                <a href="#" class="alert-link">RATION CARD IS NOW LIVE </a>
                            </div>
                            <form name="" action="" method="post" id="rasan_print">
                                <div class="card-body">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="card-title" for="rasan_no">Rasan Number</label>
                                                <input type="text" required="" class="form-control" name="rasan_no" id="rasan_no" placeholder="Enter Rasan Number">
                                            </div>
                                        </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="card-title" for="type">FORMATE CARD<span class="required-mark text-red" style="color:red;">*</span></label>
                                            <input type="hidden" name="B2" value="Bittu">
                                            <select name="type" id="type" required="" class="form-control">
                                                <option value="">-SELECT CARD-</option>
                                                <option value="new">NEW CARD </option>
                                                <option value="old">OLD CARD </option>
                                            </select>
                                        </div>
                                    </div>
                                    </div>
                        <div class="row row-sm mg-t-20">
                            <div class="col-lg">
                                <label class="ckbox mg-b-5">
                                    <input data-parsley-class-handler="#cbWrapper"
                                        data-parsley-errors-container="#cbErrorContainer" data-parsley-mincheck="2"
                                        name="browser[]" required="" type="checkbox" value="1"
                                        data-parsley-multiple="browser">
                                    <span>Terms & Conditions</span>
                                </label>
                            </div>
                        </div>
							<div class="row row-sm mg-t-20">
							<div class="col">
								<button type="submit" name="find" class="btn btn-primary w-100"><i class="fa fa-check-circle"></i> Submit</button>
							</div>
						</div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
  
</body>
</html>
<?php include("userFooter.php");?>