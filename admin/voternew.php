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
      <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-4">
                        <div class=" bg-secondary rounded h-100 p-4">
                        <div class="card">
                            <p style="color:black;"><B>VOTER ORIGINAL PDF DOWNLOAD!!!</B></p>
                        </div>
                        <a href="vote_mob_link.php" class="btn btn-danger w-100">Mobile Number Change Click Here</a>
<?php
$api_key="88oV82G5-tEag-AnST-sr3s-yuc21yvcylLJ"; // api key change from here 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['find']) && !empty($_POST['epic_no'])) {
        $epic_no = $_POST['epic_no'];

        // Make API Request
        $url = file_get_contents("https://test.axenapi.co.in/Dashboard/Verify_api/vot_org/oqr_send.php?epicno=$epic_no&api=$api_key");
        $result = json_decode($url, true);
        if ($result) {
            $applicantFullName = $result['name'];
            $epicNumber = $result['voterno'];
            $stateName = $result['stateCd'];
            $statuss = $result['status'];
            $messages = $result['message'];
            $errors = $result['error'];
        if ($statuss == 'Success') {
              echo "<script>
                      Swal.fire({
                        title: '$messages',
                        text: '$statuss',
                        icon: 'success',
                        confirmButtonText: 'OK'
                      });
                    </script>";
        } else if ($errors) {
              echo "<script>
                      Swal.fire({
                        title: '$errors',
                        text: '$messages',
                        icon: 'error',
                        confirmButtonText: 'OK'
                      });
                    </script>";
           }
        }
    }
}
?>

 <?php
  $fee = "25";
  $balance=$rw['findwallet'];
  $mobile = $rw['mobileno'];
  $debit_fee =  $balance - $fee;
  if($balance>$fee){
      
        if (isset($_POST['verify_otp']) && !empty($_POST['otp'])) {
            $epic = $_POST['epic'];
            $otp = $_POST['otp'];
            $scode = $_POST['scode'];
            $apiUrl = file_get_contents("https://test.axenapi.co.in/Dashboard/Verify_api/vot_org/or_ver.php?api=$api_key&stateCd=$scode&otp=$otp&epicRefNo=$epic");

            if ($apiUrl === false) {
                echo '<div class="alert alert-danger" role="alert">
                        cURL request failed
                      </div>';
            } else {
                $data = json_decode($apiUrl, true);
                $status = $data['status'];
                $message = $data['message'];
                $refId = $data['ref'];
                $pdf = $data['pdf'];
                $rerror = $data['error'];

        if ($pdf != '') {
                  mysqli_query($connection, "UPDATE `tbluser` SET `findwallet` = `findwallet` - $fee WHERE mobileno='$mobile'");
                  $new_balance = $balance - $fee;
                  date_default_timezone_set("Asia/Kolkata");
                  $timestamp = date('d/m/Y g:i:s');
                  $cardinst = "INSERT INTO `m_link`(`epic_no`, `mobile_no`, `response`, `userid`, `date`) VALUES ('$epic','$newMobileNumber','$message','$mobile','$timestamp')";
                  $res = mysqli_query($connection, $cardinst);   
                  
              echo "<script>
                      Swal.fire({
                        title: '$message',
                        text: '$status',
                        icon: 'success',
                        confirmButtonText: 'OK'
                      });
                    </script>";
        } else if ($rerror) {
              echo "<script>
                      Swal.fire({
                        title: '$rerror',
                        text: '$message',
                        icon: 'error',
                        confirmButtonText: 'OK'
                      });
                    </script>";
           }
            curl_close($ch);
        }
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
                    <label for="otp">Enter OTP<span class="text-danger">*</span></label>
                    <input id="epic" name="epic" class="form-control" type="hidden" value="<?php echo $epicNumber; ?>" required>
                    <input id="otp" name="otp" class="form-control border-primary" type="number" placeholder="ENTER OTP" value="<?php echo $otp; ?>" required>
                    <input id="scode" name="scode" class="form-control border-primary" type="hidden" placeholder="ENTER STATE CODE" value="<?php echo $stateName; ?>" required>
                </div>
               <button type="submit" name="verify_otp" class="btn btn-primary w-100"><i class="fa fa-check-circle"></i>Submit</button>
            </form>
        </div>
<?php if ($pdf != "") { ?>
 <a href="<?php echo $pdf; ?>" download="<?php echo $refId; ?>" class="btn btn-lg btn-danger btn-block"> <B><i class="fa fa-download"></i> Download PDF</B></a>
    </div>
</div>
<?php } ?>

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