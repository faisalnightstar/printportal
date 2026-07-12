<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>
    <?php
    include("userHeader.php");

    // Check if form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $fee = "50"; // Change according to your retailer price
        $username = $rw['mobileno'];
        $wallet_amount = $rw['findwallet'];
        $debit_fee = $wallet_amount - $fee;
        $api_key = "STJeM5HY-HhgO-RH66-TdAv-kcfmRG8h0oNA"; // API key buy from axen

        if ($wallet_amount > $fee) {
            $eid_no = $_POST['eid_no'];
            $url = "https://test.axenapi.co.in/Dashboard/Verify_api/generated_eid/eid_w_otp.php?api=$api_key&n_mobile=$mobile&eid_no=$eid_no&otp=$otp";

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
            $status = $resdata['status'];
            $message = $resdata['message'];
            $name = $resdata['name'];
            $aadhaar = $resdata['aadhaar'];
            $enrillment = $resdata['eid_no'];
            $error = $resdata['error'];
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
                $insert = mysqli_query($connection, "INSERT INTO `matching_dublicate_hkb`(`aadhaar_no`, `status`, `fee`, `generated_eid`, `date`, `userid`,`message`) VALUES ('$aadhaar','$status','$fee', '$enrillment', '$time_hkb','$username','HKB')");      
                if (!$insert) {
                    die('Error: ' . mysqli_error($connection));
                }

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
                            window.location='generated_h_list.php';
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
                    window.location.href='findwallet.php';
                },4000);
            </script>
            <?php
        }
    }
    ?>
 <div class="main-panel">
        <!-- BEGIN : Main Content-->
        <div class="main-content">
          <div class="content-wrapper">
		  </div>
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
                            <div class="alert alert-primary w-100" role="alert">
                                We Are Trying Our Best
                                <a href="#" class="alert-link">Only Generated or Suspended Enrollment To aadhar No..</a>
                            </div>
                            <form name="" action="" method="POST">
                                <div class="form-group">
                                    <label for="eid_no">Enrollment Number:</label>
                                    <input type="text" class="form-control" id="eid_no" name="eid_no" value="" minlength="28" placeholder="1164630010755420160131103933" maxlength="28" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include("userFooter.php"); ?>
</body>
</html>
