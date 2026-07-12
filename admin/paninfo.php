<?php include('userHeader.php'); 

?><?php
if($fetch['walletamount'] < 100){
    ?>
    <script>
  alert("Dear User Your  Wallet Recharge Now to use it");
  window.location.href = "../admin/recharge.php";
</script>
<?php  } ?>

<div class="main-panel">
        <!-- BEGIN : Main Content-->
        <div class="main-content">
          <div class="content-wrapper">
					<section id="basic-form-layouts">
					      <div class="row">
					          
					          </div>



      <div class="content-wrap">

            <div class="main">

			    <div class="col-md-12">

					<div class="container-fluid">

						<div class="row">

							<div class="page-header">

								<div class="page-title">

									<h1>Pan Card Details</h1>

								</div>

							</div>

						</div>

						<!-- /# row -->

						<section id="main-content">

							<div class="row">

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

$sqla="select * from charges";
$updt = mysqli_query($connection,$sqla) ;
$slct = mysqli_fetch_array($updt);

// Check if PAN is submitted
if (isset($_POST['verify_pan'])) {
    $pan_no = $_POST['pan_no'];
    $api_key = "api_key_paste";   // api buy from https://axenapi.in

    $fee = $slct['pan_details_fee'];
    $username = $_SESSION['userid'];
    $wallet_amount = $rw['findwallet'];

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
                window.location.href = 'findwallet.php';
            }, 2000);
        </script>
        <?php
    } else {
        $apiKey = "GT9nHj13-Acrz-dK5e-60or-x0tWHSVKdLFn";
     $panNumber = $_POST['panNumber'];
             // API Request
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://test.axenapi..co.in/Dashboard/Verify_api/pan_advance/pan_api.php?api=$apiKey&pan_no=$panNumber",
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

       echo $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        $json = json_decode($response, true);
        $Status = $json['Status'];
        $StatusCode = $json['StatusCode'];
        $code = $json['code'];
        $error = $json['error'];
        $message = $json['message'];
        $name = $json['name'];
        $fathername = $json['fathername'];
        $gender = $json['gender'];
        $dob = $json['dob'];
        date_default_timezone_set("Asia/Kolkata");
        $time_hkb = date('d/m/Y g:i:s');
        if ($json['name'] !='') {
            // Deduct fee from the wallet
            $debit_fee = $wallet_amount - $fee;
            $debit = mysqli_query($connection, "UPDATE tbluser SET findwallet=findwallet-$fee WHERE userid='$username'");
            
            $query=mysqli_query($connection,"INSERT INTO `pan_verify_hkb`(`name`, `fathername`, `gender`, `dob`, `pan`, `username`,`date`)  VALUES ('$name','$fathername','$gender','$dob','$pan_no','$username','$time_hkb')");

        }else{
            echo '<script> alert("'.$error.'")</script>';
        }
    }
}
?>
<body>

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

                                    <?php if ($status == 'Success') { ?>
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

                                    <?php if ($status == 'failed') { ?>
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
                                                            <input class="form-control " value="<?php echo $pan; ?>"  id="pannumber" placeholder="" autocomplete="off" name="pannumber" type="text" maxlength="12" required >

                                                            <span id="erroraadharno" class="error"></span>

                                                        </div>

                                                    </div>

                                                    <div class="col-sm-12">

                                                        <label style="color: #F9961F">Name</label>

                                                        <div class="form-group">

                                                            <input class="form-control " value="<?php echo $name; ?>" id="name" placeholder="" name="name" placeholder="Pancard Name..."   type="text" required >

															

															

															

                                                        </div>

                                                    </div>

                                                    <div class="col-sm-6">

                                                        <label style="color: #F9961F">Father Name </label>

                                                        <div class="form-group">



                                                            <input class="form-control" name="fathername" id="fathername" placeholder="" Value="<?php echo $father; ?>" type="text"  >

                                                        </div>

                                                    </div>

										        <div class="col-sm-6">
                                                        <label style="color: #F9961F">Gender</label>
                                                        <div class="form-group">
                                                            <input class="form-control stylec" name="gender" id="gender"  type="text" value="<?php echo $gender; ?>" required placeholder="Gender">
                                                            
                                                        </div>
                                                    </div>
												

                                                <div class="col-sm-6">
                                                        <label style="color: #F9961F">Date Of Birth</label>
                                                        <div class="form-group">
                                                            <input class="form-control " name="dobadhar"  type="text" value="26/07/1992" required placeholder="D.O.B.(dd/MM/yyyy)">
                                                            
                                                        </div>
                                                    </div></br>
                                                    
													<div class="col-sm-6">
                                            <label style="color: #F9961F">Select Sign Image  </label>
                                            <div class="form-group">
											  <input type="file" name="signfile" class="form-control" id="signInp" />
                                              <img src=""   id="blahs" width="100px" height="100px" />
                                            </div>
                                        </div>

                                                     
                                                          
                                                     
													
                                                  
                                        <div class="col-sm-6">
                                            <label style="color: #F9961F">Select Image  </label>
                                            <div class="form-group">
											  <input type="file" name="imagefile" class="form-control" id="imgInp" />
                                              <img src=""   id="blah" width="100px" height="100px" />
                                            </div>
                                        </div>
										
										
										
                                      
                                            
                                            
                                            <div class="col-sm-3">
                                                <label style="color: #F9961F">&nbsp;</label>
                                                <div class="form-group">              
                                                <button type="submit" name="savedata" style="margin-left: 0%;color: #fff;
    background-color: #449d44;float:left;
    border-color: #255625;box-shadow: 0 0 0 3px rgba(40,167,69,.5);" class="btn btn-success btn-block">Submit</button> 
                                                </div> 
                                            </div>
                                        </div>
									</div>



                                    

								</form>

							</div>

							<!-- /# row -->

						</section>

					</div>

				</div>

            </div>

        </div>





        <script type="text/javascript">

			function validation() {

				

				var aadharno = document.getElementById('pannumber').value;

				if ( aadharno.length < 10 ) {

					 document.getElementById('erroraadharno').innerHTML = " **Please Enter 10 Digit Pan Card Number !!!";

					 document.getElementById('pannumber').style.border = "1px solid red";

					 document.getElementById('pannumber').focus();

					 return false;

				}



               

                

                

				

			}

			

		

        </script>

	         

<script type="text/javascript">

//English to htranslate code

    

//Words and Characters Count

function readURL(input) {

    if (input.files && input.files[0]) {

        var reader = new FileReader();



        reader.onload = function (e) {

            $('#blah').attr('src', e.target.result);

        }



        reader.readAsDataURL(input.files[0]);

    }

}

$("#blah").hide();

$("#imgInp").change(function(){

    readURL(this);

	$("#blah").show();

});	





function readURLs(input) {

    if (input.files && input.files[0]) {

        var reader = new FileReader();



        reader.onload = function (e) {

            $('#blahs').attr('src', e.target.result);

        }



        reader.readAsDataURL(input.files[0]);

    }

}

$("#blahs").hide();

$("#signInp").change(function(){

    readURLs(this);

	$("#blahs").show();

});	

</script>







<?php include('userFooter.php'); ?>