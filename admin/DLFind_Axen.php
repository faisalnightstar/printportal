<?php include("userHeader.php"); 

if (isset($_POST['B2']) && $_POST['B2'] == "Bittu") {
    $name = $_POST['Name'] ?? null;
    $dob = $_POST['dob'] ?? null;
    $MobileNumber = $_POST['MobileNumber'] ?? null;
    $name_cleaned = trim($name);  
    $name_encoded = urlencode($name_cleaned);
    $name_encoded = str_replace('+', '%20', $name_encoded);  

    $fee = "30";
    $username = $rw['mobileno'];
    $wallet_amount = $rw['findwallet'];
    
    if ($wallet_amount > $fee) {
        $debit_fee = $wallet_amount - $fee;
    
        $api_hkb = "4SM7ePye-CWI5-JYzr-Vtov-pGnsFDuWSfT3"; // Buy API from this website https://axendone.xyz (Design & Development by HKB)
        $url = "https://test.axenapi.co.in/Dashboard/Verify_api/Dl/DLFind.php?mobileNumber=$MobileNumber&name=$name_encoded&dob=$dob&api=$api_hkb";

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
            //  result from axenapi
        $response = curl_exec($curl);
        curl_close($curl);
        $resdata = json_decode($response, true);

        if ($resdata['error']) {
            ?>
            <script>
                $(function(){
                    Swal.fire(
                        '<?php echo $resdata['error']; ?>',
                        'Please Try After Sometime',
                        'warning'
                    )
                });
                window.setTimeout(function(){
                    window.location.href='#';
                }, 20000);
            </script>
            <?php
        } elseif ($resdata['statusMessage'] == "Success") {
            $result = $resdata['result'];

            $debit = mysqli_query($connection, "UPDATE `tbluser` SET findwallet='$debit_fee' WHERE mobileno='$username'");
            date_default_timezone_set('Asia/Kolkata');
            $timestamp = date("Y-m-d H:i:s");
            // $summary = mysqli_query($connection, "INSERT INTO `card_summary`(`name`, `number`, `status`, `fee`, `type`, `old_balance`, `new_balance`, `date`, `userid`) VALUES ('$sdlname','$zdlno','DL Find Instant','$fee','D','$wallet_amount','$debit_fee','$timestamp','".$_SESSION['userid']."')");  
      
                ?>
                <script>
                    $(function(){
                        Swal.fire(
                            'DL Found Successfully ',
                            'Status: <?php echo $resdata['statusMessage']; ?>!',
                            'success'
                        )
                    })
                    setTimeout(() => {
                        window.location='#';
                    }, 12000);
                </script>
                <?php
            
        } else {
            ?>
            <script>
                $(function(){
                    Swal.fire(
                        'Opps',
                        'Wallet Balance Insufficient! Please Recharge',
                        'error'
                    )
                });
                window.setTimeout(function(){
                    window.location.href='findwallet.php';
                }, 10000);
            </script>
            <?php
        }
    } else {
        ?>
        <script>
            $(function(){
                Swal.fire(
                    'Opps',
                    'Wallet Balance Insufficient! Please Recharge',
                    'error'
                )
            });
            window.setTimeout(function(){
                window.location.href='findwallet.php';
            }, 10000);
        </script>
        <?php
    }
}
            //  result from axenapi

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="content-wrap">
        <div class="main">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="main-content">
                            <section class="section">
                                <div class="section-header">
                                    <div class="card-title">
                                        <h3><strong>Driving Licence Find!</strong></h3>
                                    </div>
                                </div>
                                <!-- //  result from axenapi -->

                                <div class="row dgnform">
                                    <form name="" action="" method="post" id="rasan_print">
                                        <div class="card-body">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="card-title" for="findRequired">Select Details <span class="required-mark text-red" style="color:red;">*</span></label>
                                                    <input type="hidden" name="B2" value="Bittu">
                                                    <select name="findRequired" id="findRequired" required="" class="form-control">
                                                        <option value="0">-Select Method-</option>
                                                        <option value="MobileNo">Mobile Number</option>
                                                        <option value="nameDob">Name & DOB</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div id="clientNameField" style="display: none;">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="card-title" for="Name">Name <span class="required-mark text-red" style="color:red;">*</span></label>
                                                        <input type="text" class="form-control" name="Name" id="Name" placeholder="Enter Full Name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="clientdobField" style="display: none;">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="card-title" for="dob">Date Of Birth <span class="required-mark text-red" style="color:red;">*</span></label>
                                                        <input class="form-control mt-2" name="dob" placeholder="DD-MM-YYYY" type="text" maxlength="10" pattern="\d{2}-\d{2}-\d{4}" title="Please enter dob in DD-MM-YYYY format">
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="MobileField" style="display: none;">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="card-title" for="MobileNumber">Mobile Number</label>
                                                        <input type="number" class="form-control" name="MobileNumber" id="MobileNumber" placeholder="Enter 10 Digit Mobile Number">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                <!-- //  result from axenapi -->

                                        <div class="row row-sm mg-t-20">
                                            <div class="col">
                                                <button type="submit" class="btn btn-primary w-100"><i class="fa fa-check-circle"></i> Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>    
                            </section>
                        </div>
                    </div>
                    <div class="col-md-6">                                <!-- //  result from axenapi -->

                        <!-- Table will be displayed here if there is any data -->
                        <?php if (isset($resdata) && $resdata['statusMessage'] == "Success") : ?>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>DL No</th>
                                            <th>Name</th>
                                            <th>Father's Name</th>
                                            <th>DOB</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($result as $row): ?>
                                            <tr>
                                                <td><?= $row['dlno']; ?></td>
                                                <td><?= $row['name']; ?></td>
                                                <td><?= $row['fathersname']; ?></td>
                                                <td><?= $row['dob']; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
                                <!-- //  result from axenapi -->

    <script>
        // Handle select option change
        document.getElementById('findRequired').addEventListener('change', function() {
            var selectedValue = this.value;
            document.getElementById('clientNameField').style.display = 'none';
            document.getElementById('clientdobField').style.display = 'none';
            document.getElementById('MobileField').style.display = 'none';

            if (selectedValue === 'MobileNo') {
                document.getElementById('MobileField').style.display = 'block';
            } else if (selectedValue === 'nameDob') {
                document.getElementById('clientNameField').style.display = 'block';
                document.getElementById('clientdobField').style.display = 'block';
            }
        });
    </script>
</body>
</html>
                                <!-- //  result from axenapi -->

<?php include "userFooter.php";?>