<?php 
include("userHeader.php");

$otpSent = $success = $error = $loggedIn = false;

if (isset($_POST['otp']) && !empty($_POST['otp']) && isset($_POST['mobileNo']) && !empty($_POST['mobileNo'])) {
    $mobileNo = trim($_POST['mobileNo']);
    $otp = trim($_POST['otp']);
    
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://test.axenapi.co.in/Dashboard/Verify_api/aaOTP/verify_otp.php',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => http_build_query(['mobileNo' => $mobileNo, 'otp' => $otp]),
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/x-www-form-urlencoded',
            'User-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36'
        ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);

    $res = json_decode($response, true);
    if ($res['status'] == true) {
        $success = $res['message'];
        $loggedIn = true;
        $jwtToken = $res['token'];
        $_SESSION['es_jwtToken'] = $jwtToken;
        $_SESSION['es_saltValue'] = $otp;
        $_SESSION['es_mobileNo'] = $mobileNo;
        echo '<script>alert("'.$res['message'].'");window.location.replace("aadhar_hkb_take.php");</script>';
    } else {
        $error = $res['message'];
        echo '<script>alert("'.$res['message'].'");window.location.replace("Aadhar_OtpVerify.php");</script>';
    }
} elseif (isset($_POST['mobileNo']) && !empty($_POST['mobileNo'])) {
    $mobileNo = trim($_POST['mobileNo']);
    
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://test.axenapi.co.in/Dashboard/Verify_api/aaOTP/send_otp.php',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => http_build_query(['mobileNo' => $mobileNo]),
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/x-www-form-urlencoded',
            'User-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36'
        ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    
    $res = json_decode($response, true);
    if ($res['status'] == true) {
        $success = $res['message'];
        $otpSent = true;
        echo '<script>alert("'.$res['message'].'");</script>';
    } else {
        $error = $res['message'];
        echo '<script>alert("'.$res['message'].'");</script>';
    }
}
?>

<!-------start link for popup video-------->
<link rel="stylesheet" href="popup/videopopup.css" />
<!-------stop link for popup video-------->


    <div class="content-wrap">
    <div class="main">
        <div class="col-md-12">
            <div class="main-content">
                    <div class="section-header">
                        <div class="container-fluid">
<div class="content-wrap">
    <div class="main">
      <div class="col-md-4">
        <div class="card">
          <!--<h6 class="text-center mb-8 bg-dark"><b>Aadhaar Advance FingerPrint </b></h6>-->
            <div class="container-fluid">
                            <div class="row g-3">
                                <form method="POST" action="">
                                    <div class="form-group">
                                        <label for="mobileNo" class="form-label">Enter Mobile Number</label>
                                        <div class="input-group">
                                            <input name="mobileNo" type="text" autofocus maxlength="10" value="<?= htmlspecialchars($mobileNo ?? '') ?>" class="form-control vd_Required A_AadharNo" aria-describedby="Help" autocomplete="off" <?= $otpSent ? 'readonly' : '' ?> placeholder="******4512" />
                                        </div>
                                    </div>
                                    <?php if ($otpSent) : ?>
                                        <div class="form-group">
                                            <label for="otp" class="form-label">Enter OTP</label>
                                            <div class="input-group">
                                                <input name="otp" type="text" autofocus maxlength="10" class="form-control vd_Required A_AadharNo" aria-describedby="Help" autocomplete="off" placeholder="******4512" />
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="col-md-3">
                                        <div class="input-group">
                                            <button type="submit" id="submitBtn" class="btn btn-danger px-5"><?= $otpSent ? 'Submit' : 'Send OTP' ?></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php include('userFooter.php'); ?>
                </div>
</div>
