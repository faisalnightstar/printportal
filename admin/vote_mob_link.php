<?php
include('userHeader.php');
?>
<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>
<body>

    <div class="content-wrap">
    <div class="main">
        <div class="col-md-12">
            <div class="main-content">
                    <div class="section-header">
                        <div class="container-fluid">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-4">
                        <div class=" bg-secondary rounded h-100 p-4">
                        <div class="card">
                            <p style="color:black;"><B>VOTER MOBILE NUMBER LINK !!!</B></p>
                        </div>
<?php
// Get captcha details from the API
$details = file_get_contents("https://test.axenapi.co.in/Dashboard/Verify_api/vo_t_mobi_link/capt.php");
$json = json_decode($details, TRUE);
$captcha_img = $json['captcha'];
$captchaTxnId = $json['id'];

$api_key="G2eZ8pUO-qYuM-Jjlc-noEN-bzVdlEv0rUVIoSWP"; // api key change from here 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['find']) && !empty($_POST['epic_no'])) {
        $epic_no = $_POST['epic_no'];

        // Make API Request
        $url = file_get_contents("https://test.axenapi.co.in/Dashboard/Verify_api/vo_t_mobi_link/v_l_ink.php?epicno=$epic_no&api=$api_key");
        $result = json_decode($url, true);
        if ($result) {
            $applicantFullName = $result['name'];
            $epicNumber = $result['epicno'];
            $mobileNumber = $result['mobileNumber'];
            $stateName = $result['state'];
            $statuss = $result['status'];
            $messages = $result['message'];
            $errors = $result['error'];
        if ($statuss == 'Success') {
           echo '<div id="success-alert" class="alert alert-success" role="alert">
                  Status:  ' . $statuss . '
                 </div>';
        } else if ($errors) {
            echo '<div class="alert alert-danger" role="alert">
                   .' . $errors . ' - ' . $messages . '
                 </div>';
            echo '<script>
                    setTimeout(function () {
                        window.location = "' . $redirectUrl . '";
                    }, 5000);
                  </script>';
           }
        }
    }
}
?>

 <?php
  $fee = "50";
  $balance=$rw['findwallet'];
  $mobile = $rw['mobileno'];
  $debit_fee =  $balance - $fee;
  if($balance>$fee){
      
        if (isset($_POST['submit_mobile']) && !empty($_POST['new_mobile'])) {
            $newMobileNumber = $_POST['new_mobile'];
            $epic = $_POST['epic'];
            $place = $_POST['place'];

            $captchap = $_POST['captcha'];
            $captchaid = $_POST['captchaTxnId'];

            $apiUrl = file_get_contents("https://test.axenapi.co.in/Dashboard/Verify_api/vo_t_mobi_link/form_8.php?api=".urlencode($api_key)."&epic=".urlencode($epic)."&nmobile=".urlencode($newMobileNumber)."&state=".urlencode($place)."&captcha=".urlencode($captchap)."&captcha_id=".urlencode($captchaid));

            if ($apiUrl === false) {
                echo '<div class="alert alert-danger" role="alert">
                        cURL request failed
                      </div>';
            } else {
                $data = json_decode($apiUrl, true);
                $status = $data['status'];
                $message = $data['message'];
                $refId = $data['refId'];
                $rerror = $data['error'];

                $alertType = $status == "Success" ? 'success' : 'error';
                $redirectUrl = $status == "Success" ? "" : "' . $redirectUrl . '";
                
                // debited code and save card summary 
                if($refId !=''){
                  mysqli_query($connection, "UPDATE `tbluser` SET `findwallet` = `findwallet` - $fee WHERE mobileno='$mobile'");
                  $new_balance = $balance - $fee;
                  date_default_timezone_set("Asia/Kolkata");
                  $timestamp = date('d/m/Y g:i:s');
                  $cardinst = "INSERT INTO `m_link`(`epic_no`, `mobile_no`, `response`, `userid`, `date`) VALUES ('$epic','$newMobileNumber','$message','$mobile','$timestamp')";
                  $res = mysqli_query($connection, $cardinst);   
    
                }
   
     
               echo "<script>
        Swal.fire({
          title: '$rerror Mobile Number Link $status',
          text: 'Your Reference No: $refId - $message',
          icon: '$alertType',
          confirmButtonText: 'OK'
        });
      </script>";

                echo '<script>
                        setTimeout(function () {
                            window.location = "";
                        }, 5000);
                      </script>';
            }

            curl_close($ch);
        }
  }else{
     $msg="<script>
        Swal.fire({
          title:'Balance Low ! Recharge Now',
          text:  'Warning!',
          icon: 'warning',
          confirmButtonText: 'OK'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location = 'findwallet.php';
          }
        });
      </script>";
}
        ?>

                            <h6 > <?php echo $msg; ?></h6>
          <!-- Form 1: Enter EPIC number -->
          <div class="card">
             <form id="epic_form" class="user <?php echo ($epicNumber) ? 'hidden' : ''; ?>" method="POST">
                 <div class="form-group">
                     <label for="epic_no">EPIC NO<span class="text-danger">*</span></label>
                     <input id="epic_no" name="epic_no" class="form-control border-success" type="text" value="<?php echo $epicNumber; ?>" required <?php echo ($epicNumber) ? 'disabled' : ''; ?>>
                 </div>
   <br>
                 <button type="submit" name="find" class="btn btn-primary w-100" <?php echo ($epicNumber) ? 'disabled' : ''; ?>>
                     <i class="fa fa-check-circle"></i>Verify
                 </button>
             </form>


            <!-- Form 2: Displayed upon successful first API response -->
            <form id="additional_fields_form" class="user <?php echo ($epicNumber) ? '' : 'hidden'; ?>" method="POST">
                 <div class="form-group">
                    <label for="">Full Name<span class="text-danger">*</span></label>
                    <input id="" name="" class="form-control" type="" readonly value="<?php echo $applicantFullName; ?>" required>
                </div> 
                <div class="form-group">
                    <label for="">Old Mobile<span class="text-danger">*</span></label>
                    <input id="" name="" class="form-control" type="" readonly value="<?php echo $mobileNumber; ?>" required>
                </div>
                <div class="form-group">
                    <label for="new_mobile">New Mobile Number<span class="text-danger">*</span></label>
                    <input id="epic" name="epic" class="form-control" type="hidden" value="<?php echo $epicNumber; ?>" required>
                    <input id="new_mobile" name="new_mobile" class="form-control border-primary" type="number" placeholder="ENTER NEW MOBILE NUMBER" value="<?php echo $mobileNumber; ?>" required>
                </div>
                <div class="form-group">
                    <!--<label for="place">Ca<span class="text-danger">*</span></label>-->
                    <img src="data:application/image;base64,<?php echo $captcha_img; ?>"  class="border-primary mt-2" alt="captchaa" />
                </div>
                <div class="form-group">
                    <label for="captcha">Enter Captcha<span class="text-danger">*</span></label>
                    <input id="captcha" name="captcha" class="form-control border-primary" type="text" placeholder="Enter Captcha Code" value="" required>
                    <input id="captchaTxnId" name="captchaTxnId" class="form-control border-primary" readonly type="hidden" value="<?php echo $captchaTxnId; ?>" required>
                    <input id="place" name="place" class="form-control border-primary" readonly type="hidden" value="<?php echo $stateName; ?>" required>
                </div>
<br>
               <button type="submit" name="submit_mobile" class="btn btn-primary w-100"><i class="fa fa-check-circle"></i>Submit</button>
            </form>
        </div>
    </div>
</div>
<script>
    // Hide the success and error alerts after 3 seconds
    setTimeout(function () {
        document.getElementById('success-alert').style.display = 'none';
        // document.getElementById('error-alert').style.display = 'none';
    }, 3000);
</script>

</body>
</html>
<?php
include('userFooter.php');
?>