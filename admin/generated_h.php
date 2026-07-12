<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<?php
include("userHeader.php");

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 

    $fee = "20";          // change accourding to your retailer price
    $username = $rw['mobileno'];
    $wallet_amount = $rw['findwallet'];
    $debit_fee = $wallet_amount - $fee;

    if ($wallet_amount > $fee) {   
        $api_key="STJeM5HY-HhgO-RH66-TdAv-kcfmRG8h0oNA";  // Api Key Paste Here || buy from axen
        
    if (isset($_POST['send_otp'])) {
        $mobile = $_POST['mobile'];
        $captchaValue = $_POST['captcha'];
        $captchaTxnId = $_POST['captchaTxnId'];
        $url="https://test.axenapi.co.in/Dashboard/Verify_api/generated_eid/eih_d.php?api=$api_key&n_mobile=$mobile&imgcaptcha=$captchaValue&captchaTxnId=$captchaTxnId";
    } elseif (isset($_POST['verify_otp'])) {
        $mobile = $_POST['mobile']; // Assuming mobile is needed for both send_otp and verify_otp
        $otp = $_POST['otp'];
        $eid_no = $_POST['eid_no'];
        $url = "https://test.axenapi.co.in/Dashboard/Verify_api/generated_eid/eid_aad.php?api=$api_key&n_mobile=$mobile&eid_no=$eid_no&otp=$otp";
    }
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
// Execute cURL session
$resdata = json_decode($response, true);
// Check for cURL errors
$status=$resdata['status'];
$message=$resdata['message'];
$name=$resdata['name'];
$aadhaar=$resdata['uid'];
$enrillment=$resdata['eid'];
$error=$resdata['error'];
if ($error) {
            ?>
            <script>
                $(function(){
                    Swal.fire(
                        '<?php echo $error; ?>',
                        'Contact ADMIN',
                        'warning'
                    )
                });
                window.setTimeout(function(){
                    window.location.href='#';
                },4000);
            </script>
            <?php
            } else if ($aadhaar != "") {
            $debit = mysqli_query($connection, "UPDATE tbluser SET findwallet=findwallet -'$fee' WHERE mobileno='$username'");
            date_default_timezone_set("Asia/Kolkata");
            $time_hkb = date('d/m/Y g:i:s');
            $insert = mysqli_query($connection, "INSERT INTO `matching_dublicate_hkb`(`aadhaar_no`, `status`, `fee`, `generated_eid`, `date`, `userid`,`message`) VALUES ('$aadhaar','$status','$fee', '$enrillment', '$time_hkb','$username','$name')");      
            if (!$insert) {
                die('Error: ' . mysqli_error($connection));
            }
   
        //   date_default_timezone_set('Asia/Kolkata');
        //   $timestamp = date("Y-m-d H:i:s");
        //   $summary = mysqli_query($connection,"INSERT INTO `card_summary`(`name`, `number`, `status`, `fee`,`type`,`old_balance`,`new_balance`, `date`, `userid`) VALUES ('$name','$aadhaar','Eid To Aadhar No','$fee','D','$wallet_amount','$debit_fee','$time_hkb','".$_SESSION['userid']."')");    
        if ($insert) {
                ?>
                <script>
                    $(function(){
                        Swal.fire(
                            'Aadhaar NO Found : <?php echo $aadhaar;?>',
                            'For This EID : <?php echo $enrillment; ?>!',
                            'success'
                        )
                    })
                    setTimeout(() => {
                        window.location='generated_h_list.php';    // redirect to print list 
                    }, 6000);
                </script>
                <?php
            }
        }


} else {
        ?>
        <script>
            $(function(){
                Swal.fire(
                    'Opps',
                    'Wallet Balance Insufficient! Please Recharge ',
                    'error'
                )
            });
            window.setTimeout(function(){
                window.location.href='findwallet.php';      // redirect to your wallet 
            },4000);
        </script>
        <?php
    }
}
?>
<?php
$details = file_get_contents("https://test.axenapi.co.in/Dashboard/Verify_api/generated_eid/captcha.php");
$json = json_decode($details, TRUE);
$captcha_img = $json['captchaBase64String'];
$captchaTxnId = $json['captchaTxnId'];
?>


<body>



    <div class="content-wrap">
    <div class="main">
        <div class="col-md-12">
            <div class="main-content">
                    <div class="section-header">
                        <div class="container-fluid">
<div class="content-wrap">
    <div class="main">
        <div class="col-md-12">
            <div class="container-fluid">
            </div>
            </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <div class="card">
                                            <div class="card-body">
                            <div class="alert alert-dark" role="alert">
                                We Are Trying Our Best
                                <a href="#" class="alert-link">EID TO AADHAR NUMBER IS NOW LIVE</a>
                            </div>
       <?php if ($status == 'Failure') { ?>
            <script>
                // Display alert for failure or error status
                alert("<?php echo $message; ?>");
            </script>
        <?php } ?>

        <?php if( $status =='Failure' or $status ==''){?>
        <h6 class="text-center mb-4">OTP Verification</h6>
        <form name="" action="" method="POST" >
            <div class="form-group">
                <label for="mobile">Mobile Number:</label>
                <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $mobile;?>" minlength="10" maxlength="10" required>
                <p id="verificationMessage"></p>

            </div>

            <div class="form-group">
                <!--<label for="captchaTxnId">Captcha Transaction ID:</label>-->
                  <img src="<?php echo $captcha_img; ?>" class="imgcaptcha" id="imgcaptcha" alt="captcha" />
                  <img src="https://test.axenapi.co.in/img/icons8-refresh.svg" href="#" onclick="location.reload(true);" style="cursor: pointer;">
                <input type="hidden" class="form-control" id="captchaTxnId" value="<?php echo $captchaTxnId; ?>" name="captchaTxnId" required>
            </div>


            <div class="form-group">
                <label for="captcha">Captcha:</label>
                <input type="text" class="form-control" id="captcha" name="captcha" required>
            </div>
            <button type="submit" name="send_otp" class="btn btn-primary">Send OTP</button>
        </form>

        <?php }?>
        <?php if($status=='Success' or $status=='422'  or $status=='500' or $message=='Invalid OTP! Please retry with a valid OTP.'){?>
        <h6 class="text-center mt-4 mb-4">Verify OTP</h6>

             <script>
                // Display alert for failure or error status
                alert("<?php echo $message; ?>|<?php echo $status; ?>|");
            </script>
        <form name="" action="" method="POST">
            <div class="form-group">
                <label for="otp">Enter OTP:</label>
                <input type="text" class="form-control" id="otp" name="otp" value="<?php echo $otp;?>"  minlength="6" maxlength="6" required>
                <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $mobile;?>" readonly required>
            </div>

            <div class="form-group">
                <label for="eid_no">Enter EID:</label>
                <input type="text" class="form-control" id="eid_no" name="eid_no" value="<?php echo $eid_no;?>" required>
            </div>

            <button type="submit" name="verify_otp" class="btn btn-success">Verify OTP</button>
             <button class="btn btn-primary mt-4" onclick="goBack()">Go Back</button>

               <script>
    // JavaScript function to go back without reloading the page
    function goBack() {
        // Redirect to the previous page using window.location.href
        window.location.href = document.referrer;
    }
</script>
        </form>
        <?php }?>

    </div>

    <!-- Bootstrap JS and jQuery -->
    <!--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>-->
    <!--<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>-->
    <!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>-->

<?php include("userFooter.php");?>
</body>

</html>
