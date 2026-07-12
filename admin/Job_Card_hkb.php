<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>
<?php
include("userHeader.php");

if (isset($_POST['find'])) {
    $job_id = mysqli_real_escape_string($connection, $_POST['job_card']);

    $fee = "5";          // change accourding to your retailer price
    $username = $rw['mobileno'];
    $wallet_amount = $rw['findwallet'];
    $debit_fee = $wallet_amount - $fee;

    if ($wallet_amount > $fee) {

        $api_key = "pGZ2rWRL-pFs8-aM6x-rwlH-8UC2gwOw0q7Z"; // prower by axen
        $url = "https://test.axenapi.co.in/Dashboard/Verify_api/job_card/job_card_ap.php?api=$api_key&job_id=$job_id";
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
        $a4 = $resdata['a4'];
        $message = $resdata['message'];
        $status_h = $resdata['status'];
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
                    window.location.href='Job_Card_hkb.php';
                },20000);
            </script>
            <?php
            } else if ($resdata['a4'] != "") {
            $debit = mysqli_query($connection, "UPDATE tbluser SET findwallet=findwallet -'$fee' WHERE mobileno='$username'");
            date_default_timezone_set("Asia/Kolkata");
            $time_hkb = date('d/m/Y g:i:s');
            
            $insert = mysqli_query($connection, "INSERT INTO `job_card`(`username`, `job_card_no`, `status`, `pdf`, `date`) VALUES ('$username','$job_id', '$message','$a4','$time_hkb')");
            if (!$insert) {
                die('Error: ' . mysqli_error($connection));
            }
   
        //   date_default_timezone_set('Asia/Kolkata');
        //   $timestamp = date("Y-m-d H:i:s");
        //   $summary = mysqli_query($connection,"INSERT INTO `card_summary`(`name`, `number`, `status`, `fee`,`type`,`old_balance`,`new_balance`, `date`, `userid`) VALUES ('$d_application_no','$checked_rasan_no','RASAN D Instant Print PDF','$fee','D','$wallet_amount','$debit_fee','$timestamp','".$_SESSION['userid']."')");    
        if ($insert) {
                ?>
                <script>
                    $(function(){
                        Swal.fire(
                            'Job NO : <?php echo $job_id;?> is Downloaded',
                            'Server : <?php echo $message; ?>!',
                            'success'
                        )
                    })
                    setTimeout(() => {
                        window.location='Job_Card_hkb_list.php';
                    }, 3000);
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
            },);
        </script>
        <?php
    }
}
?>


<div class="content-wrap">
    <div class="main">
        <div class="col-md-12">
            <div class="main-content">
                    <div class="section-header">
                        <div class="container-fluid">
                <div class="row">
                <div class="card">
                    <div class="page-header">
                        <div class="page-title">
                            <p style="color:red;"><B>MAHATMA GANDHI NATIONAL RURAL EMPLOYMENT GUARANTEE ACT</B></p>
                        </div>
                    </div>
                </div>
            </div>
            </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="card">
                                            <div class="card-body">
                            <div class="alert alert-dark" role="alert">
                                We Are Trying Our Best
                                <a href="#" class="alert-link">JOB CARD IS NOW LIVE</a>
                            </div>
                            <form name="" action="" method="post" id="Job_print">
                                <div class="card-body">
                                   
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="card-title" for="job_card">Enter Job Card Number</label>
                                                <input type="text" required="" class="form-control" name="job_card" id="job_card" placeholder="BH-XX-010-001-XXXXXXX/1062">
                                            </div>
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
        </div>
    </div>
<?php include("userFooter.php");?>
</body>
</html>