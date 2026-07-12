<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

    <title>PAN Verification</title>
</head>

<?php
include('userHeader.php');

// Check if PAN is submitted
if (isset($_POST['verify_pan'])) {
    $pan_no = $_POST['pan_no'];
    $api_key = "IGEl6zNw-Cf5P-zed9-LGQ6-EiY44iv8WkZg";   // api buy from https://test.axenapi.co.in

    $fee = "5";
    $username = $_SESSION['userid'];
    $wallet_amount = $rw['findwallet']; // change your wallet name

    // Check wallet balance
    if ($wallet_amount < $fee) {
        ?>
        <script>
            $(function() {
                Swal.fire(
                    'Insufficient Balance',
                    'Your wallet balance is too low to process this request',
                    'error'
                );
            });
            setTimeout(() => {
                window.location.href = 'wallet.php';
            }, 2000);
        </script>
        <?php
    } else {
        // API Request
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://test.axenapi.co.in/Dashboard/Verify_api/pan_advance/pan_api.php?api=$api_key&pan_no=$pan_no",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        $json = json_decode($response, true);
        $status = $json['status'];
        $code = $json['code'];
        $error = $json['error'];
        $message = $json['message'];
        $name = $json['name'];
        $fathername = $json['fathername'];
        $gender = $json['gender'];
        $dob = $json['dob'];
        date_default_timezone_set("Asia/Kolkata");
        $time_hkb = date('d/m/Y g:i:s');
        if (isset($json['status']) && $json['status'] == 'success' && isset($json['code']) && $json['code'] == '200') {
            // Deduct fee from the wallet
            $debit_fee = $wallet_amount - $fee;
            $debit = mysqli_query($connection, "UPDATE tbluser SET findwallet=findwallet-$fee WHERE userid='$username'");
            
            $query=mysqli_query($connection,"INSERT INTO `pan_verify_hkb`(`name`, `fathername`, `gender`, `dob`, `pan`, `username`,`date`)  VALUES ('$name','$fathername','$gender','$dob','$pan_no','$username','$time_hkb')");

        }
    }
}
?>
<body>

      <div class="content-wrap">
    <div class="main">
        <div class="col-md-12">
            <div class="main-content">
                    <div class="section-header">
                        <div class="container-fluid">
                        </div>
                    </div>
						<div class="row">
							<div class="page-header">
								<div class="page-title">
									<p style="color:black;margin-left:0%; font-size: 24px">PAN DETAILS VERIFY WITH ALL DETAILS </p>
 								</div>
							</div>
						</div>
					 		 
						<section id="main-content">
							<div class="row  dgnform">
                           
                           <div class="col-sm-6">
                           <form action="" method="post">  
                           <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="pan_no">Enter PAN Number</label>
                                                            <input type="text" class="form-control" name="pan_no" id="pan_no" placeholder="ENTER PAN NUMBER" value="" required>
                                                            <div id="verification-result" class="result-container"></div>
                                                        </div>
                                                    </div>
                                                <div class="col-12 ml-2">
                                                    <h5 class="text-warning ">Application Fee: 5</h5>
                                                </div>
                                                <div class="row row-sm mg-t-20">
                                                    <div class="col-lg">
                                                        <button type="submit" name="verify_pan" class="btn btn-primary w-100"><i class="fa fa-check-circle"></i> Verify PAN</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <?php if ($status == 'success') { ?>
                                        <div class="result-container" id="image_pr">
                                            <div class="alert alert-success" role="alert" style="color: white;">
                                                <strong><?php echo $status; ?></strong><br>
                                                Pan NO:  <?php echo $pan_no; ?><br>
                                                Name: <?php echo $name; ?><br>
                                                Father's Name: <?php echo $fathername; ?><br>
                                                Gender: <?php echo $gender; ?><br>
                                                Date of Birth: <?php echo $dob; ?><br><br>
                                                Power By Maurya Arjun Kumar<br><br>
                                               <button id="printButton" class="btn btn-info mt-3" onclick="captureAndDownload()">Print</button>
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <?php if ($status == 'fail') { ?>
                                        <div class="result-container">
                                            <div class="alert alert-danger" role="alert" style="color: white;">
                                                Status=<?php echo $status; ?><br>
                                                <strong><?php echo $message; ?></strong><br>
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <?php if ($error) { ?>
                                        <div class="result-container">
                                            <div class="alert alert-danger" role="alert" style="color: white;">
                                                <strong><?php echo $error; ?></strong><br>
                                                Contact Admin Immeddiately !
                                            </div>
                                        </div>
                                    <?php } ?>
                                    </form>
                                    <!-- Display the verification result -->

<!-- JavaScript for dynamic verification -->
<script>
    $(document).ready(function () {
        $('#pan_no').on('keyup', function () {
            // Get the entered PAN number
            var enteredPan = $(this).val();

            // Verify the PAN number dynamically
            if (verifyPan(enteredPan)) {
                // PAN verification successful
                displayVerificationResult('success', 'PAN is valid');
            } else {
                // PAN verification failed
                displayVerificationResult('failed', 'Invalid PAN number');
            }
        });

        // Function to verify PAN number
        function verifyPan(panNumber) {
            // Define the PAN number pattern
            var panPattern = /^[A-Z]{5}[0-9]{4}[A-Z]$/;

            // Convert the entered PAN to uppercase for consistency
            panNumber = panNumber.toUpperCase();

            // Check if the entered PAN matches the pattern
            return panPattern.test(panNumber);
        }

        // Function to display verification result
        function displayVerificationResult(status, message) {
            $('#verification-result').html('<div style="color:white" class="bg-dark" role="alert"><br>' + message + '</div>');
        }
    });
</script>
<script>
    function captureAndDownload() {
        // Specify the target element for capture
        var targetElement = document.getElementById('image_pr');

        // Use html2canvas to capture the content of the target element
        html2canvas(targetElement).then(function (canvas) {
            // Convert the canvas to a data URL
            var imageDataUrl = canvas.toDataURL('image/jpeg');

            // Create a link element for downloading the image
            var downloadLink = document.createElement('a');
            downloadLink.href = imageDataUrl;
            downloadLink.download = 'Hkb_Pan_Details.jpg'; // Set the desired filename

            // Trigger a click event on the link to start the download
            document.body.appendChild(downloadLink);
            downloadLink.click();
            document.body.removeChild(downloadLink);
        });
    }
</script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>