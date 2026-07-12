<?php include('userHeader.php'); 
 include('manu.php');?>
<?php 
// Check if PAN is submitted
if (isset($_POST['pan_no'])) {
    $pan_no = $_POST['pan_no'];
    $pan_no = strtoupper($pan_no);
    $api_key = "GkeO65Tl-auNh-R82V-tZ4q-P3n8S5GEvAEHXXIh";   // api buy from https://axenapi.in

    $fee = "5";
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
        $formatted_dob = str_replace('-', '/', $dob);
        date_default_timezone_set("Asia/Kolkata");
        $time_hkb = date('d/m/Y g:i:s');
        if (isset($json['status']) && $json['status'] == 'success' && isset($json['code']) && $json['code'] == '200') {
            // Deduct fee from the wallet
            $debit_fee = $wallet_amount - $fee;
            $debit = mysqli_query($connection, "UPDATE tbluser SET findwallet=findwallet-$fee WHERE userid='$username'");
            
        }else{
            
            echo '<script> alert("Failed '.$error.' | '.$message.'")</script>';
        }
    }
}
?>


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

									<h1>Pan Card Details</h1>

								</div>

							</div>

						</div>

						<!-- /# row -->

						<section id="main-content">

							<div class="row">

							  <?php
                           if($fetch['findwallet'] < 100){
                               ?>
                               <script>
                             alert("Dear user your Wallet Balance is Low Please Recharge Now");
                             window.location.href = "../admin/panel.php";
                           </script>

                            <?php 
                                 }
                              elseif(isset($_POST['savedata'])) {	

							  $q = "";

                                    $q = "SELECT * FROM tbluser where  userid='".$_SESSION['userid']."'";

                                    $r = mysqli_query($connection,$q);

                                    $rw = mysqli_fetch_assoc($r);

                                    

									

                               $pannumber = trim($_POST['pannumber']);

                               $name = trim($_POST['name']);
                               $gender = trim($_POST['gender']);

                               

                               $fathername = trim($_POST['fathername']);

                               $dobadhar = trim($_POST['dobadhar']);

                               

							   $file = $_FILES['imagefile']['name'];

							   $target_dir = "cssnssup/";

                               $target_file = $target_dir . basename($_FILES["imagefile"]["name"]);

							   

							   $signfile = $_FILES['signfile']['name'];

							   $sign_dir = "cssnssup/";

                               $sign_file = $sign_dir . basename($_FILES["signfile"]["name"]);

							   

                               

                                                          

                               

                                if ($pannumber=="") {

                                   $msgno = 'Please Enter Pan Card No .... ';

                               }

else if ($rw['aadharpoint'] > $rw['findwallet']){

                                        $msgno= "Sorry, Your Balance is Low .... Please Recharge Soon";

                                        ?>

                                        <script>

                                        setTimeout(function () {

                                        window.location.href= 'panmanual.php';

                                        }, 2000);

                                        </script>

                                    <?php	

}									

                               elseif ($name=="") {

                                $msgno = 'Please Enter Name  .... ';

                               }

                               elseif ($fathername=="") {

                                $msgno = 'Please Enter Father Name  .... ';

                               }

                               elseif ($dobadhar=="") {

                                $msgno = 'Please Enter Date of Birth  .... ';

                               }

                                

                               else { 

                                   $a = mysqli_query($connection,"SELECT panno FROM panauto Where panno ='".$pannumber."'");

                                   $b = mysqli_fetch_array($a);

                                   if($b['panno']==$pannumber){

                                       $msgno = 'This Pan Card No Already Exist .... ';

                                   } else {

                                    

                                    /// insert value
                                    $word = "image";
									  $sign_image_type = $_FILES["signfile"]["type"];
									  $image_type = $_FILES["imagefile"]["type"];
									  
									    if((strpos($sign_image_type, $word) !== false) && (strpos($image_type, $word) !== false)){
                                            //echo "Word Found!";




                                    

                                  date_default_timezone_set('Asia/Kolkata');

$timestamp = date("Y-m-d H:i:s");

                                    $query='';

                                    $query = "insert into panauto(`userid`,`panno`,`name`,`fathername`,`dob`, `gender`,`image`,`signimage`,`create_time`)values(".$_SESSION['userid'].",'".$pannumber."','".$name."','".$fathername."','".$dobadhar."','".$gender."','".$target_file."','".$sign_file."','".$timestamp."')";

//echo    $query; 

									  $result = mysqli_query($connection, $query);

									   move_uploaded_file($_FILES["imagefile"]["tmp_name"], $target_file);

									   move_uploaded_file($_FILES["signfile"]["tmp_name"], $sign_file);

                                       $msg = "Please Wait Pan Priveiw just a second...";

                                       $_SESSION["IMGPATH"]='';

                                       $_SESSION["Panno"]=trim($pannumber);



                                   



                                    /// end insert

                                    /// start qr code



                                    mysqli_set_charset($connection,"utf8");

                                    $a = mysqli_query($connection,"SELECT * FROM panauto Where panno='".$_SESSION["Panno"]."'");

                                    $b = mysqli_fetch_array($a);



                                    $remark="";

                                    $remark= 'Pan No : '.$b['panno'].' Pan Name : '.$b['name'] ;

                                    // strat less point//  Dr amount start

									$getpoint = mysqli_fetch_assoc(mysqli_query($connection,"select * from tbluser where userid=".$_SESSION['userid'].""));

                                    $qu = "";

                                    $qu = "INSERT INTO `tbltrans`(`userid`, `username`, `transdate`, `transqty`, `transtype`, `touserid`, `tousername`, `remark`, `loginid`, `logdate`)

                                    VALUES ('".$_SESSION['userid']."','".$_SESSION['username']."',now(),'".$getpoint['aadharpoint']."','Dr','0','Pan Create','".$remark."','".$_SESSION['userid']."',now())";

                                    $a1q=mysqli_query($connection,$qu);

                                    //  Dr amount end

                                   // end point





                                   //echo $b['wamt'];

									// start led wallet

									$ledwallet=0;

									

   

                                    $sql="";

									$sql = "update tbluser SET findwallet= findwallet - 20".$getpoint['aadharpoint']." where userid='".$_SESSION['userid']."'";

									$abs = mysqli_query($connection, $sql);


									    }else{
                                            $msgno = "Please select PNG and JPEG image only.";
                                            //sleep(5);
                                        }


                                   }

                                   

                                   ?>

                                   <script>

                                   setTimeout(function () {

                                      window.location.href= 'panlist.php';

                                   }, 5000);

                                   </script>

                                   <?php

                               }



                              }

                            ?>
<?php if($msg != '') { ?>
    <div style="width:100%" class="row cvmsgok"><?php echo $msg; ?></div>
<?php } elseif($msgno != '') { ?>
    <div style="width:100%" class="row cvmsgno"><?php echo $msgno; ?></div>
<?php } ?>

<form method="post" autocomplete="off" onSubmit="return validation();" enctype="multipart/form-data" action="" style="width:100%">
    <div class="row dgnform">
        <div class="col-sm-9">
            <div class="row">
                <div class="col-sm-12">
                    <label>Pan Card No.</label>
                    <div class="form-group">
                        <input class="form-control" value="<?php echo $pan_no; ?>" id="pannumber" placeholder="" autocomplete="off" name="pannumber" type="text" maxlength="12" required>
                        <span id="errorpanno" class="error"></span>
                    </div>
                </div>
                <div class="col-sm-6">
                    <label>Name</label>
                    <div class="form-group">
                        <input class="form-control" value="<?php echo $json['name']; ?>" id="name" placeholder="Pancard Name..." name="name" type="text" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <label>Gender</label>
                    <div class="form-group">
                        <select name="gender" class="form-control stylec" required>
                            <option value="<?php echo $json['gender']; ?>"><?php echo $json['gender']; ?></option>
                            <option value="MALE">MALE</option>
                            <option value="FEMALE">FEMALE</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <label>Father Name</label>
                    <div class="form-group">
                        <input class="form-control" name="fathername" id="fathername" placeholder="" value="<?php echo $json['fathername']; ?>" type="text">
                    </div>
                </div>
                <div class="col-sm-6">
                    <label>Date Of Birth</label>
                    <div class="form-group">
                        <input class="form-control" name="dobadhar" type="text" value="<?php echo $formatted_dob; ?>" required placeholder="D.O.B.(dd/MM/yyyy)">
                    </div>
                </div>
                <div class="col-sm-6">
                    <label>Select Sign Image</label>
                    <div class="form-group">
                        <input type="file" name="signfile" class="form-control" id="signInp" required/>
                        <img src="" id="blahs" width="100px" height="100px" />
                    </div>
                </div>
                <div class="col-sm-6">
                    <label>Select Image</label>
                    <div class="form-group">
                        <input type="file" name="imagefile" class="form-control" id="imgInp" required/>
                        <img src="" id="blah" width="100px" height="100px" />
                    </div>
                </div>
                <div class="col-sm-3">
                    <label>&nbsp;</label>
                    <div class="form-group">
                        <button type="submit" name="savedata" style="margin-left: 0%; color: #fff; background-color: #28a6fa; float:left; border-color: #28a6fa; box-shadow: 0 0 0 3px rgba(40, 71, 250, .5);" class="btn btn-info btn-block">Generate Pdf</button>
                    </div>
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

				

				var panno = document.getElementById('pannumber').value;

				if ( panno.length < 10 ) {

					 document.getElementById('errorpanno').innerHTML = " **Please Enter 10 Digit Pan Card Number !!!";

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