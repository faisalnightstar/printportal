
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
<?php include("userHeader.php");

if (isset($_POST['bikeNumber'])) {
    $bikeNumber = $_POST['bikeNumber'] ?? null;
    
    $fee = "10";
    $username = $rw['mobileno'];
    $wallet = $rw['findwallet'];

    if ($wallet > $fee) {
        $debit_fee = $wallet - $fee;

        $api_hkb = "RC_Verification_ApiKey"; // Buy API from this website https://axendone.xyz (Design & Development by HKB)
        $url = "https://test.axenapi.co.in/Dashboard/Verify_api/challan/platform_v1.php?bikeNumber=$bikeNumber&api=$api_hkb";

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ]);

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
            $debit = mysqli_query($connection, "UPDATE `tbluser` SET findwallet='$debit_fee' WHERE mobileno='$username'");
            date_default_timezone_set('Asia/Kolkata');
            $timestamp = date("Y-m-d H:i:s");

            ?>
            <script>
                $(function(){
                    Swal.fire(
                        'Challan Found Successfully ',
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
                        'Oops',
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
                    'Oops',
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
?>

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
                            <div class="card-body">
                                <div class="alert alert-primary w-100" role="alert">
								<div class="page-title">
									<p style="color:black;margin-left:0%; font-size: 24px">Challans DETAILS </p>
 								</div>
							</div>
						</div>
						<section id="main-content">
                            <div class="row dgnform">
                                <form name="" action="" method="post" id="rasan_print">
                                    <div class="card-body">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="card-title" for="bikeNumber">Vehical Number <span class="required-mark text-red" style="color:red;">*</span></label>
                                                <input type="text" class="form-control" name="bikeNumber" id="bikeNumber" placeholder="Enter Vehical Number">
                                            </div>
                                        </div>
                                        <div class="row row-sm mg-t-20">
                                            <div class="col">
                                                <button type="submit" class="btn btn-primary w-100"><i class="fa fa-check-circle"></i> Submit</button>
                                            </div>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="col-md-12">
                        <?php if (isset($resdata) && $resdata['statusMessage'] == "Success") : ?>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                       
                                       <tr>
                                           <th class="text-center">Vehicle No</th>
                                           <th class="text-center">Owner Name</th>
                                           <th class="text-center">Model</th>
                                           <th class="text-center">Company</th>
                                           <th class="text-center">Type</th>
                                           <th class="text-center">Fuel</th>
                                           <?php if (!empty($resdata['challans'])) : ?>
                                               <th class="text-center">Challan No</th>
                                               <th class="text-center">Amount</th>
                                               <th class="text-center">Status</th>
                                               <th class="text-center">Penalty</th>
                                           <?php endif; ?>
                                       </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        // Display vehicle details
                                        $vehicle = $resdata['vehicle'];
                                        if (!empty($resdata['challans'])) :
                                            foreach ($resdata['challans'] as $challan): 
                                        ?>
                                            <tr>
                                                <td><?= $vehicle['registration_number']; ?></td>
                                                <td><?= $challan['owner_name']; ?></td>
                                                <td><?= $vehicle['model_name']; ?></td>
                                                <td><?= $vehicle['vehicle_name']; ?></td>
                                                <td><?= $vehicle['vehicle_type_v2']; ?></td>
                                                <td><?= $vehicle['fuel_type']; ?></td>
                                                <td><B><?= $challan['challan_number']; ?></B></td>
                                                <td><button class="btn btn-primary"><B> ₹ <?= $challan['amount']; ?> </B></button></td>
                                                <td>
                                                    <?php if ($challan['challan_status'] == 'PAID'): ?>
                                                        <button class="btn btn-success"><B>PAID </B></button>
                                                    <?php else: ?>
                                                        <button class="btn btn-warning"><B>UNPAID</B></button>
                                                    <?php endif; ?>
                                                </td>
                                                <td><B><?= $challan['penalty']; ?></B></td>
                                            </tr>
                                        <?php 
                                            endforeach; 
                                        else: 
                                        ?>
                                            <tr>
                                                <td><?= $vehicle['registration_number']; ?> <button class="btn btn-success"><B>CHALLAN NOT FOUND</B></button></td>
                                                <td><?= $vehicle['owner_name']; ?></td>
                                                <td><?= $vehicle['model_name']; ?></td>
                                                <td><?= $vehicle['vehicle_name']; ?></td>
                                                <td><?= $vehicle['vehicle_type_v2']; ?></td>
                                                <td><?= $vehicle['fuel_type']; ?></td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php endif; ?>
                    </div>
    </div>
</body>
</html>

<?php include "userFooter.php"; ?>
