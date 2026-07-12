<?php
include('userHeader.php');
?>
<?php

    $appliedby= $rw['mobileno'];
    $wallet_amount= $rw['findwallet'];
    $fee = "30";
if($_POST['aadharNumber']){
    $aadharNumber = $_POST['aadharNumber'];
    $debit_fee =  $wallet_amount - $fee;
    if($wallet_amount>=$fee){
        
           $api_key="JG95v2az-X5OT-osEb-Lves-Mz4K7NuNwHij";  // apikey buy from https://axendone.xyz
           
            $url = "https://test.axenapi.co.in/Dashboard/Verify_api/Rc_TO_Pdf/Uid_RationPDF.php?api=$api_key&uid=$aadharNumber";
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                ));
                $response = curl_exec($curl);
                curl_close($curl);
                $resdata = json_decode($response,true); 
                $errore=$resdata['error'];
         if($errore){
                ?>
                 <script>
                      $(function(){
                         Swal.fire(
                            '<?php echo $errore;?>',
                                'Contact Admin',
                                'error'
                         )
                     })
                      setTimeout(() => {
                            window.location='';
                        }, 5000);
                    </script>
                <?php
            } else if($resdata['statusCode']=="100"){
                //Developing by HKB Web Developing
                date_default_timezone_set('Asia/Kolkata');
                $timehkb = date("Y-m-d H:i:s");
                
                $aadhar=$resdata['uid'];
                $pdf=$resdata['pdf'];
                $name=$resdata['name']; 

        $debit = mysqli_query($connection,"UPDATE tbluser SET findwallet=findwallet-$fee WHERE mobileno='$appliedby'");
        if($debit){
            $insert = mysqli_query($connection, "INSERT INTO `rationPdf_Uid`(`name`, `aadhaar`, `pdf`, `username`, `date`) VALUES ('$name', '$aadhar','$pdf','$appliedby','$timehkb');");
            if($insert){
                ?>
                 <script>
                      $(function(){
                         Swal.fire(
                            'Ration PDF Download Success',
                                'Successfully fetch',
                                'success'
                         )
                     })
                      setTimeout(() => {
                            window.location='UidRation_List.php';
                        }, 5000);
                    </script>
                <?php
            }else{
                ?>
                 <script>
          $(function(){
             Swal.fire(
                 'DATA INSERT ERROR',
                 'ERROR',
                 'warning'
             )
         })
         setTimeout(() => {
                window.location='#';
            }, 1200);
        </script>
                <?php
            }
        }else{
            ?>
              <script>
          $(function(){
             Swal.fire(
                 'Balance Debit error',
                 'something went wrong',
                 'error'
             )
         })
         setTimeout(() => {
                window.location='#';
            }, 1200);
        </script>
            
            <?php
        }
            }
    }else{
        ?>
        <script>
          $(function(){
             Swal.fire(
                 'Wallet Balance is Low!',
                 'Please Recharge Now!',
                 'error'
             )
         })
         setTimeout(() => {
                window.location='findwallet.php'; // change your own wallet link
            }, 1200);
        </script>
      <?php  
    }
                       
                       
                   
            }
            ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.14/dist/sweetalert2.all.min.js"></script>
          <div class="content-wrap">
    <div class="main">
        <div class="col-md-12">
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <div class="container-fluid">
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <div class="card">
                                            <div class="card-body">
                                <div class="alert alert-primary" role="alert">
                                Service :
                                <a href="" class="alert-link">RATION PDF DOWNLOAD</a>
                            </div>
                            	<form action="" method="POST" class="row g-3">
                                <div class="card-body">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Aadhar Number.</label>
                                              	<input name="aadharNumber" type="text" id="aadharNumber" maxlength="12" placeholder="Enter 12 Digit Aadhar Number" class="form-control" >
                                              	 <!--//Developing by HKB Web Developing-->
                                                  </div>
                                                   </select>
                                                <hr>
                                             <div class="form-group col-md-10">                           
                                       <input class="form-control " id="text" name="" value="<?php  
										echo "Charge : ₹ " .$fee;
										?>" placeholder="Rc. No." type="text"  required readonly>
                                       <hr>
                                     
                                    </div>
                                </div>
							<div class="form-actions">
                            <div class="text-left">
                            <button class="form-control btn btn-success" name="submit" id="submit"><i class="fa fa-check-circle"></i> Submit</button>
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
           <br>
             <br>
               <br>
                 <br>
		
<?php include('userFooter.php'); ?>
</body>
</html>