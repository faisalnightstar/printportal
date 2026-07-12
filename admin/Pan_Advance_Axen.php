<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <title>PAN Verification</title>
</head>

<?php
include('userHeader.php');
include('manu.php');
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
                           <form action="panmanual.php" method="post">  
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
                                        <div class="result-container">
                                            <div class="alert alert-success" role="alert" style="color: white;">
                                                <strong><?php echo $status; ?></strong><br>
                                                Name: <?php echo $name; ?><br>
                                                Father's Name: <?php echo $fathername; ?><br>
                                                Gender: <?php echo $gender; ?><br>
                                                Date of Birth: <?php echo $dob; ?>
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