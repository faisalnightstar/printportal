
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
 <?php include("userHeader.php"); 

if (isset($_POST['b2']) && $_POST['b2'] == "Bittu") {
    
    $dl = mysqli_real_escape_string($connection,$_POST['dl']);
    $dob = mysqli_real_escape_string($connection,$_POST['dob']);
    $background = mysqli_real_escape_string($connection,$_POST['background']);
    $card_type = mysqli_real_escape_string($connection,$_POST['card_type']);
    $application_no = "HKB_".rand(000000,999999);
    if($card_type=="N"){
        $type="1";
    }else if($card_type=="C"){
        $type="2";
    }else{
         $type="1";
    }
    
    if($background=="B"){
        $color="true";
    }else if($background=="W"){
         $color="false";
    }else{
         $color="false";
    }
    $fee="30";
    $username = $rw['mobileno'];
    $wallet=$rw['findwallet'];
            
            
    if($wallet > $fee){
    $debit_fee =  $wallet - $fee;
    $api_hkb ="4SM7ePye-CWI5-JYzr-Vtov-pGnsFDuWSfT3";   //Api key Buy From Https://axendone.xyz   ( Design & Development By HKB )
      // API endpoint
$url = "https://test.axenapi.co.in/Dashboard/Verify_api/Dl/DL_hyper_link.php?api=$api_hkb&dl=$dl&dob=$dob&color=$color&type=$type";

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
// Check for cURL errors
$front=$resdata['front'];
$back=$resdata['back'];
$a4=$resdata['a4'];
if (curl_errno($ch)) {
     echo "cURL Error: " . curl_error($ch);

} else if($resdata['detail']){
    // Output API response
    ?>
    <script>
            $(function(){
                Swal.fire(
                    '<?php echo $resdata['detail']; ?>',
                    'Sorry',
                    'error'
                )
            });
            window.setTimeout(function(){
                window.location.href='DL_Instant_Hd.php';
            },20000);
            
        </script>
        <?php
   
}else if($resdata['error']){
    ?>
     <script>
            $(function(){
                Swal.fire(
                    '<?php echo $resdata['error']; ?>',
                    'Admin Token Error Contact : ',
                    'warning'
                )
            });
            window.setTimeout(function(){
                window.location.href='DL_Instant_Hd.php';
            },20000);
            
        </script>
        <?php
}else if($resdata['a4'] ==''){
    
    ?>
     <script>
            $(function(){
                Swal.fire(
                    '<?php echo $response; ?>',
                    'Please Contact Admin : ',
                    'error'
                )
            });
            window.setTimeout(function(){
                window.location.href='DL_Instant_Hd.php';
            },200000);
            
        </script>
        <?php
}else{
     $debit = mysqli_query($connection,"UPDATE `tbluser` SET findwallet='$debit_fee' WHERE mobileno='$username'");
     if($debit){
      $insert = mysqli_query($connection, "INSERT INTO dlprint (application_no,username,dl_no,dob,response,status, fee,front,back,pdf) VALUES ('$application_no','$username','$dl', '$dob', '$response','success', '$fee', '$front','$back','$a4');");
      
          date_default_timezone_set('Asia/Kolkata');
          $timestamp = date("Y-m-d H:i:s");
          $summary = mysqli_query($connection,"INSERT INTO `card_summary`(`name`, `number`, `status`, `fee`,`type`,`old_balance`,`new_balance`, `date`, `userid`) VALUES ('$application_no','$dl','DL HKB Print PDF','$fee','D','$wallet','$debit_fee','$timestamp','".$_SESSION['userid']."')");  
          
           if($insert){
          ?>
           <script>
                        $(function(){
                            Swal.fire(
                                'Dl : <?php echo $dl;?> is Downloaded',
                                'Application : <?php echo $application_no; ?> Message : File Generated?>',
                                'success'
                            )
                        })
                        setTimeout(() => {
                            window.location='DL_Instant_Hd_list.php';
                        }, 1200);
                    </script>
          <?php
      }
     
     }
    //  echo "API Response: " . $response;
}
//( Design & Development By HKB )
// Close cURL session
curl_close($ch);

          
    }else{
        ?>
        <script>
            $(function(){
                Swal.fire(
                    'Opps',
                    'Wallet Balance Insufficient ! Please Recharge ',
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
                <!--<section class="section">-->
                    <div class="section-header">
                        <div class="container-fluid">
                            <!--<div class="row">-->
                            <!--    <h1>Information <?php echo $wallet; ?></h1>-->
                            <!--</div>-->
                        </div>
                    </div>
                    <!--<div class="page-wrapper" style="display: block;">-->
                    <!--    <div class="page-breadcrumb">-->
                    <!--        <div class="row mb-2">-->
                    <!--            <div class="col-sm-6">-->
                    <!--                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Instant Dl Print</h4>-->
                    <!--            </div>-->
                    <!--            <div class="col-sm-6 text-right">-->
                    <!--                <a href="dlprint_list" class="btn btn-primary btn-sm">Pan List</a>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                        <div class="col-md-12">
                            <div class="card card-default">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h3><strong>Enter beneficiary Details</strong></h3>
                                        <h4>Disclaimer :- CHARGE - ₹ 30, FAST SERVICE</h4>
                                        <h4>Disclaimer :- Instant Service</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid">
                            <div class="card col-12">
                                <hr>
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <form name="" action="" method="post" id="dlprint">
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label class="card-title" for="dl">Dl Number</label>
                                                            <input type="text" class="form-control" name="dl" id="dl" placeholder="Enter Dl Number">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="card-title" for="dob">D.O.B</label>
                                                            <input type="text" class="form-control" name="dob" id="dob" placeholder="Enter Dob">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="card-title" for="background">Card Background<span class="required-mark text-red" style="color:red;">*</span></label>
                                                            <input type="hidden" name="b2" value="Bittu">
                                                            <select name="background" id="background" required="" class="form-control">
                                                                <option value="B">Blue</option>
                                                                <option value="W">White</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="card-title" for="card_type">Card Type<span class="required-mark text-red" style="color:red;">*</span></label>
                                                            <select name="card_type" id="card_type" required="" class="form-control">
                                                                <option value="C">Chip Pvc</option>
                                                                <option value="N">Normal Pvc</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-actions">
                                                            <div class="text-left">
                                                                <button type="submit" class="btn btn-info">Submit</button>
                                                            </div>
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
                </section>
            </div>
        </div>
    </div>
</div>
<!-- ( Design & Development By HKB ) -->

<?php include("userFooter.php");?>