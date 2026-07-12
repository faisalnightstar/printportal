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
    $rc_no = mysqli_real_escape_string($connection, $_POST['rc_dl']);

    $fee = "30";          // change accourding to your retailer price
    $username = $rw['mobileno'];
    $wallet_amount = $rw['findwallet'];
    $debit_fee = $wallet_amount - $fee;

    if ($wallet_amount > $fee) {

        $api_key = "53o9J4or-Ek5Y-jj9b-NLZY"; // prower by axen
        $url = "https://test.axenapi.co.in/Dashboard/Verify_api/vehical_rc/rc_reter.php?api=$api_key&rc_no=$rc_no";
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
        $result = json_decode($response, true);
        // Continue processing the result
        $statusMessage = $result['statusMessage'];
        $check_code = $result['statusCode'];
        $bik_number = $result['is_number'];
        $name = $result['name'];
        $fathername = $result['fathername'];
        $address = $result['address'];
        $error = $result['error'];
        $file = $result['pdf'];
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
                    window.location.href='rc_get.php';
                },20000);
            </script>
            <?php
            } else if ($result['statusCode'] == "200") {
            $debit = mysqli_query($connection, "UPDATE tbluser SET findwallet=findwallet -'$fee' WHERE mobileno='$username'");
            date_default_timezone_set("Asia/Kolkata");
            $time_hkb = date('d/m/Y g:i:s');
            
            $insert = mysqli_query($connection, "INSERT INTO `rc_vehical`(`username`, `rc_vehical_no`, `status`, `pdf`, `date`) VALUES ('$username','$bik_number', '$statusMessage','$file','$time_hkb')");
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
                            'Download Successfully, RC <?php echo $bik_number; ?>',
                            'Server : <?php echo $statusMessage ?>!',
                            'success'
                        )
                    })
                    setTimeout(() => {
                        window.location='rc_get_list.php';
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
            },4000);
        </script>
        <?php
    }
}
?>
<div class="content-wrap">
    <div class="main">
         <div class="main-content">
         <section class="section">
             <div class="section-header">
        <div class="col-md-12">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="alert alert-dark" role="alert">
                                    We Are Trying Our Best
                                    <a href="#" class="alert-link">RC BOOK / OWNER BOOK PDF DOWNLOAD</a>
                                </div>
                                <form name="" action="" method="post" id="Job_print">
                                    <div class="card-body">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="card-title" for="rc_dl">Enter Vehicle Number</label>
                                                <input type="text" required="" class="form-control" name="rc_dl" id="rc_dl" placeholder="BH01XX1454"  oninput="removeSpaces(this)">
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
    </div>
</div>
<script>
function removeSpaces(inputElement) {
    inputElement.value = inputElement.value.replace(/\s/g, '');
}
</script>
<?php include("userFooter.php");?>
</body>
</html>