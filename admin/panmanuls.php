<?php include('userHeader.php'); ?>

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
			<marquee behavior="alternate" width="100%" style="color: white;background: #009993;font-size:20px;"><b>Pan Card me Photo Singcher  10 KB me uPLOAD KARE Redy  hai use kare   India's No-1 Digital Fast Print Portal </b> </marquee></h1>
									<h1>Pan Card Details</h1>
								</div>
							</div>
						</div>
						<!-- /# row -->
						<section id="main-content">
							<div class="row">
							   <?php
							   
							    $s = 1;
                                if(isset($_POST['submit'])) {	
                                    $q = "";
                                    $q = "SELECT * FROM tbluser where  userid='".$_SESSION['userid']."'";
                                    $r = mysqli_query($connection,$q);
                                    $rw = mysqli_fetch_assoc($r);
                                    
                                    if ($rw['aadharpoint']>$rw['walletamount']){
                                        $msgno= "Sorry, Your Balance is Low .... Please Recharge Soon";
                                        ?>
                                        <script>
                                        setTimeout(function () {
                                        window.location.href= 'aadharauto.php';
                                        }, 2000);
                                        </script>
                                    <?php
                                    } elseif ($_FILES['imagefile']['name']==""){
                                        $msgno = 'Please Select MPTASS Files  .... ';
                                        ?>
                                    
                                        <script>
                                        setTimeout(function () {
                                        window.location.href= 'aadharauto.php';
                                        }, 2000);
                                        </script>
                                    <?php
                                    } else {

                                        $target_dir = "htmlfile/";
                                        $file = $_FILES['imagefile']['name'];
                                        $path = pathinfo($file);
                                        $filename = $path['filename'];
                                        $ext = $path['extension'];
                                        if (strtoupper($ext)=='HTML'){
                                            $temp_name = $_FILES['imagefile']['tmp_name'];
                                            $path_filename_ext = $target_dir.$filename.".".$ext;
                                        
                                            // Check if file already exists
                                            if (file_exists($path_filename_ext)) {
                                                //$msgno= "Sorry, file already exists.";
                                                unlink ($path_filename_ext);
                                                move_uploaded_file($temp_name,$path_filename_ext);
                                                //$msg= "Congratulations! File Uploaded Successfully.";
                                            } else {
                                                unlink ($path_filename_ext);
                                                move_uploaded_file($temp_name,$path_filename_ext);
                                                //$msg= "Congratulations! File Uploaded Successfully.";
                                            }
                                            
                                        $html=file_get_contents($path_filename_ext);
                                        unlink ($path_filename_ext);
                                        $DOM = new DOMDocument();
                                        libxml_use_internal_errors(true);
                                        $DOM -> loadHTML($html);
                                        $images = $DOM->getElementsByTagName('img');
                                        foreach($images as $image){
                                            if($image->getAttribute("class") == "img-aadhar-wrap"){
                                            //if ($input->getAttribute("class") == "img-aadhar-wrap"){
                                            $img = $image->getAttribute('src');
                                            //echo "<img src='".$img."' />";
                                            }
                                        }
                                        $imgpth='aadhar/imgmanualaadhaar/';
                                        $iparr = explode ("/", $img); 
                                        $aaaa =  $iparr[2];
                                       
                                        $imgfpath=$imgpth;
                                        $_SESSION["IMGPATH"]=$imgfpath;
										?>
										<script>
										alert('<?php echo $imgfpath; ?>');
										</script>
										<?php
                                        $aaaa = str_replace(".jpg","",$aaaa);

                                        $aadharno=substr($aaaa, 0, 12);
                                        //echo "<br />";
                                        $count=0;
                                        foreach($DOM->getElementsByTagName('input') as $input) {
                                         // if($input->getAttribute("name") == "name"){
                                            
                                            //if(preg_match('/[^ ]+/',$input->getAttribute('value'),$match)){
                                            if ($input->getAttribute("name") == "name"){
                                               $txtnm= $input->getAttribute('value');
                                            }
                                            if ($input->getAttribute("name") == "fathername"){
                                                $txtfnm= $input->getAttribute('value');
                                            }
                                            if ($input->getAttribute("name") == "dobadhar"){
                                                $txtdob= $input->getAttribute('value');
                                                $txtdob = str_replace("-","/",$txtdob);
                                             }
                                            if ($input->getAttribute("name") == "gender"){
                                                $txtsex= $input->getAttribute('value');
                                                if ($txtsex=='M'){
                                                    $txtgender='Male';
                                                }
                                                else{
                                                    $txtgender='Female'; 
                                                }
                                             }
                                            if ($input->getAttribute("name") == "building"){
                                                $txtbuld= $input->getAttribute('value');
                                             }
                                            if ($input->getAttribute("name") == "gali"){
                                                $txtgali= $input->getAttribute('value');
                                             }
                                            if ($input->getAttribute("name") == "locality"){
                                                $txtlocality= $input->getAttribute('value');
                                             }
                                             if ($input->getAttribute("name") == "vtc"){
                                                $txtpost= $input->getAttribute('value');
                                             }
                                             if ($input->getAttribute("name") == "district"){
                                                $txtdistrict= $input->getAttribute('value');
                                             }
                                             if ($input->getAttribute("name") == "state"){
                                                $txtstate= $input->getAttribute('value');
                                             }
                                             if ($input->getAttribute("name") == "pincode"){
                                                $txtpincode= $input->getAttribute('value');
                                             }
                                                
                                           // }

                                        }   

                                    } 
                                    if (trim($txtbuld)==""){
                                        $txtadd='S/O '.$txtfnm.','.$txtgali.' '.$txtlocality.' '.$txtpost.', '.$txtdistrict.', '.$txtstate.', '.$txtpincode;
                                    } else {
                                        $txtadd='S/O '.$txtfnm.','.$txtbuld.' '.$txtgali.' '.$txtlocality.' '.$txtpost.', '.$txtdistrict.', '.$txtstate.', '.$txtpincode;
                                    }
                                   
                                    
                                    if (trim($txtnm)==""){
                                    $msgno = 'Please Select Proper MPTASS File  .... ';
                                    ?>
                                        <script>
                                        setTimeout(function () {
                                        window.location.href= 'aadharauto.php';
                                        }, 2000);
                                        </script>
                                    <?php
                                    } 

                                    } 

                               
                            }
                            ?>


                            <?php 
                              if(isset($_POST['savedata'])) {	
                             
                          
							        $q = "";
                                    $q = "SELECT * FROM tbluser where  userid='".$_SESSION['userid']."'";
                                    $r = mysqli_query($connection,$q);
                                    $rw = mysqli_fetch_assoc($r);
                                    
									
                                    $aadharno = trim($_POST['pannumber']);
                                    $name = trim($_POST['name']);
                                   
                                    $fathername = trim($_POST['fathername']);
                                    $dobadhar = trim($_POST['dobadhar']);
                                    $gender = trim($_POST['gender']);
                                    $ptype = trim($_POST['ptype']);
    							   
    							   
                                    $target_file = $_POST['blahsin'];
    							   
    							  
                                    $sign_file = $_POST['blahin'];
    							   
                                  
    
                                    $ext = pathinfo($signfile, PATHINFO_EXTENSION);
                                    $exts = pathinfo($file, PATHINFO_EXTENSION);
                                                   $s = date($fetch['joindate']);
                                    $dt = new DateTime($s);
                                    
                                    $date = $dt->format('Y-m-d');                                           
                                   
                                    if ($aadharno=="") {
                                       $msgno = 'Please Enter Pan Card No .... ';
                                    }
    							    else if($fetch['mfee'] == 1 and $fetch['walletamount'] > 10 and $date <= '2019-12-16')
                                    {
                                    	$msgno = 'Pay Maintaince Fee First!!!';
                                    }
                                    else if ($rw['aadharpoint'] > $rw['walletamount']){
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
                                        $a = mysqli_query($connection,"SELECT aadharno FROM panauto Where panno ='".$aadharno."'");
                                        $b = mysqli_fetch_array($a);
                                        if($b['aadharno']==$aadharno){
                                            $msgno = 'This Pan Card No Already Exist .... ';
                                        } else {
                                    
                                            /// insert value

                                                //print_r($_FILES);
                                                //die;
                                                $target_file = $_FILES['imagefile']['name'];
                                                $sign_file = $_FILES['signfile']['name'];
                                                $imge_size = $_FILES['imagefile']['size'];
                                                $sign_size = $_FILES['signfile']['size'];
                                                if (($imge_size >= 50000) or ($sign_size >= 50000)){
                                                    $msgno = "Please Select Sign Image/sign image size 50kb or below.";
                                                } else{
                                                        move_uploaded_file($_FILES["imagefile"]["tmp_name"], $target_file);
        									            move_uploaded_file($_FILES["signfile"]["tmp_name"], $sign_file);
        									            $img_file = base64_encode(file_get_contents($target_file));
        									            $simg_file = base64_encode(file_get_contents($sign_file));
        									            unlink($target_file);
        									            unlink($sign_file);
        									            
                                                        date_default_timezone_set('Asia/Kolkata');
                                                        $timestamp = date("Y-m-d H:i:s");
                                                        $query='';
                                                        $query = "insert into panauto(`userid`,`panno`,`name`,`fathername`,`dob`,`image`,`signimage`,`create_time`,`gender`,`ptype`)
                                                                            values(".$_SESSION['userid'].",'".$aadharno."','".$name."','".$fathername."','".$dobadhar."','".$img_file."','".$simg_file."','".$timestamp."','".$gender."','".$ptype."')";
        
        									            $result = mysqli_query($connection, $query);
        									            $pan_last_id = mysqli_insert_id($connection);
        									                
        									            
                                                        $msg = "Please Wait Pan Priveiw just a second...";
                                                        $_SESSION["IMGPATH"]='';
                                                        $_SESSION["Panno"]=trim($aadharno);
        
                                           
                                                        $a = mysqli_query($connection,"SELECT * FROM tbluser Where userid = ".$_SESSION['userid']."");
                                    			        $b = mysqli_fetch_array($a);
                                				        date_default_timezone_set('Asia/Kolkata');
                                                        $timestamp = date("Y-m-d H:i:s");
                    
                                                        mysqli_set_charset($connection,"utf8");
                                                        $a = mysqli_query($connection,"SELECT * FROM panauto Where panno='".$_SESSION["Panno"]."'");
                                                        $b = mysqli_fetch_array($a);
                    
                                                        $remark="";
                                                        $remark= 'Pan No : '.$b['panno'].' Pan Name : '.$b['name'] ;
                                                        // strat less point
                                                        //  Dr amount start
                    									//$getpoint = mysqli_fetch_assoc(mysqli_query($connection,"select * from tbluser where userid=".$_SESSION['userid'].""));
                                                        //$qu = "";
                                                        $qu = "INSERT INTO `tbltrans`(`userid`, `username`, `transdate`, `transqty`, `transtype`, `touserid`, `tousername`, `remark`, `loginid`, `logdate`)
                                                        VALUES ('".$_SESSION['userid']."','".$_SESSION['username']."',now(),'".$b['aadharpoint']."','Dr','0','Pan Create','".$remark."','".$_SESSION['userid']."',now())";
                                                        $a1q=mysqli_query($connection,$qu);
                                                        //  Dr amount end
                                                        // end point
        
        
                                                        //echo $b['wamt'];
        									            // start led wallet
        									            $ledwallet=1;
        									
           
                                                        $sql="";
                    									$sql = "update tbluser SET walletamount= walletamount - 2".$b['aadharpoint']." where userid='".$_SESSION['userid']."'";
                    									$abs = mysqli_query($connection, $sql);
                                                    }
                                                    if ($result){
                                                    
                                                    ?>
                                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	                                                <script type="text/javascript">
                                                    	$(document).ready(function()
                                                    	{
                                                    		setTimeout(function(){
                                                    		}, 2000);
                                                    	});
                                                    </script>
                                                    <script>
                                                       setTimeout(function () {
                                                          window.location.href= 'panlist.php';
                                                       }, 2000);
                                                       </script>
                                                    <?php
                                                    }
                                                }
                                               
                                       
                                   }

                                mysqli_close($connection);	
                              }
                            ?>
								
								
							<?php 
                                if(isset($_POST['savedataauto'])) {	
                             
							        $q = "";
                                    $q = "SELECT * FROM tbluser where  userid='".$_SESSION['userid']."'";
                                    $r = mysqli_query($connection,$q);
                                    $rw = mysqli_fetch_assoc($r);
                                    
									
                                    $aadharno = trim($_POST['pannumber']);
                                    $name = trim($_POST['name']);
                                   
                                    $fathername = trim($_POST['fathername']);
                                    $dobadhar = trim($_POST['dobadhar']);
                                    $file = $_FILES['imagefile']['name'];
    							    $target_dir = "uploads/";
                                    $target_file = $target_dir . basename($_FILES["imagefile"]["name"]);
    							   
    							    $signfile = $_FILES['signfile']['name'];
    							    $sign_dir = "uploads/";
                                    $sign_file = $sign_dir . basename($_FILES["signfile"]["name"]);
                               
                                    if ($aadharno=="") {
                                        $msgno = 'Please Enter Pan Card No .... ';
                                    }elseif ($name=="") {
                                        $msgno = 'Please Enter Name  .... ';
                                    }
                                    elseif ($fathername=="") {
                                        $msgno = 'Please Enter Father Name  .... ';
                                    }
                                    elseif ($dobadhar=="") {
                                        $msgno = 'Please Enter Date of Birth  .... ';
                                    }
                                    else { 
                                        $a = mysqli_query($connection,"SELECT aadharno FROM panauto Where panno ='".$aadharno."'");
                                        $b = mysqli_fetch_array($a);
                                        if($b['panno']==$aadharno){
                                            $msgno = 'This Pan Card No Already Exist .... ';
                                        } else {
                                    
                                            /// insert value
                                            date_default_timezone_set('Asia/Kolkata');
                                            $timestamp = date("Y-m-d H:i:s");
                                            $query='';
                                            $query = "insert into panauto(`userid`,`panno`,`name`,`fathername`,`dob`,`image`,`signimage`,`create_time`)values(".$_SESSION['userid'].",'".$aadharno."','".$name."','".$fathername."','".$dobadhar."','".$target_file."','".$sign_file."','".$timestamp."')";
                                            //echo    $query; 
									        $result = mysqli_query($connection, $query);
									        move_uploaded_file($_FILES["imagefile"]["tmp_name"], $target_file);
									        move_uploaded_file($_FILES["signfile"]["tmp_name"], $sign_file);
                                        }
								        $last_id = mysqli_insert_id($connection);
								   
								        $a = mysqli_query($connection,"SELECT * FROM tbluser Where userid = ".$_SESSION['userid']."");
					                    $b = mysqli_fetch_array($a);
						                date_default_timezone_set('Asia/Kolkata');
                                        $timestamp = date("Y-m-d H:i:s");
                                        $data_m = $_SERVER;
	                                    mysqli_query($connection,"insert into log_manage(`userid`,`name`,`email`,`mobile`,`useragent`,`message`,`ipaddress`,`datetime`,`zipcode`)values(".$b['userid'].",'".$b['loginname']."','".$b['emailid']."','".$b['mobileno']."','".$data_m['HTTP_USER_AGENT']."','Pan Create!!','".$ip."','".$timestamp."','".$pincode."')");
								
										if($result)
											{
												$msg = "Pan Card successfully wait for redirecting to payment page";
											?>
	                                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	                                        <script type="text/javascript">
	                                            $(document).ready(function()
	                                            {
		                                            setTimeout(function(){
                                                    window.location.href="<?php echo $slct['weburl'];?>admin/paytmauto/index.php?pay_uid=<?php echo $last_id;?>&Pay_Amt=10&status=panauto";
		                                            }, 2000);
	                                            });
                                            </script>
											<?php 
											}
                                   
                                  
                                    }

                                }
                            ?>
							
							<?php if($msg !='') { ?>
								<div style="width=100%"  class="row cvmsgok"><?php echo $msg; ?></div>
							<?php } elseif($msgno !='') { ?>
								<div style="width=100%"  class="row cvmsgno"><?php echo $msgno; ?></div>
							<?php  } ?>
							<?php if($s == 1  or  $_SESSION['usertype'] == 'DEMO') {?>
							    <form method="post" autocomplete="off"  onSubmit="return validation();"   enctype="multipart/form-data" action="" style="width:100%">
									<div class="row dgnform">
                                        <div class="col-sm-9">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                         <label>Select Pan Card Type</label>
                                                        <div class="form-group ">
                                                           <select name="ptype" autofocus id="ptype" class="form-control stylec">
                                                               <option value="0">Select Type</option>
                                                               <option value="UTI-NONMINOR">UTI NONMINOR (18 साल  या उस  से ज्यादा  उम्र के लिए )  </option>
															   <option value="NSDL-NONMINOR">NSDL NONMINOR (18 साल  या उस  से ज्यादा  उम्र के लिए ) </option>
                                                               <option value="UTI-MINOR">UTI MINOR (18 साल से कम उम्र के लिए )</option>
                                                               <option value="NSDL-MINOR">NSDL MINOR (18 साल से कम उम्र के लिए )</option>
                                                           </select>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <label>Pan Card No.</label>
                                                        <div class="form-group">
                                                            <input class="form-control stylec" value=""  id="pannumber" placeholder=""  autocomplete="off" name="pannumber" type="text" maxlength="10" required onkeyup="this.value = this.value.toUpperCase();" onblur='ValidatePAN(this)'>
                                                            <span id="erroraadharno" class="error"></span>
                                                        </div>
                                                    </div></br>
                                                    <div class="col-sm-12">
                                                        <label>Name</label>
                                                        <div class="form-group">
                                                            <input class="form-control stylec" value="" id="name" placeholder="" name="name"    type="text" required onkeyup="this.value = this.value.toUpperCase();" >
															
															
															
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <label>Father Name </label>
                                                        <div class="form-group">

                                                            <input class="form-control stylec" name="fathername" id="fathername" placeholder="" Value="" type="text" onkeyup="this.value = this.value.toUpperCase();"  >
                                                        </div>
                                                    </div>
													

													
                                              
												
                                                
                                                    <div class="col-sm-6">
                                                        <label>Date Of Birth</label>
                                                        <div class="form-group">
                                                            <input class="form-control stylec" name="dobadhar" data-field="date" type="text" value="26/07/1992" required placeholder="D.O.B.(dd/MM/yyyy)">
                                                            
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-6">
                                                        <label>Gender </label>
                                                        <div class="form-group ">

                                                            <select name="gender" class="form-control stylec">
                                                            <option value="0">Select Gender</option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                            <option value="Other">Other</option>
                                                            </select>   
                                                            </div>
                                                    </div>
													

													
                                              
												
                                                
                                                   
                                                    
													<div class="col-sm-6">
                                            <label id="simgs">Select singcher  </label>
                                            <div class="form-group">
											  <input type="file" name="signfile" class="form-control stylec" id="signInp" />
                                              <img src=""   id="blahs" width="100px" height="100px" style="margin-top: 12px;
    box-shadow: 4px 4px 2px 1px;
    border-radius: 10px;" />
                                               <input type="hidden" name="blahsin" id="blahsin" value="" class="form-control"/>
                                            </div>
                                        </div>

                                                     
                                                          
                                                     
													
                                                  
                                        <div class="col-sm-6">
                                            <label id="stype">Select Image  </label>
                                            <div class="form-group">
											  <input type="file" name="imagefile" class="form-control stylec" id="imgInp" />
                                              <img src=""   id="blah" width="100px" height="100px" style="margin-top: 12px;
    box-shadow: 4px 4px 2px 1px;
    border-radius: 10px;"/>
                                              <input type="hidden" name="blahin" id="blahin" value="" class="form-control"/>
                                            </div>
                                        </div>
										
										
										
                                        <div class="col-sm-12">
                                            
                                            
                                            <div class="col-sm-3">
                                                <label>&nbsp;</label>
                                                <div class="form-group">              
                                                <button type="submit" name="savedata" class="btn btn-success btn-block" style="box-shadow: 0 0 0 3px rgba(40,167,69,.5);">Submit</button> 
                                                </div> 
                                            </div>
                                        </div>
									</div>

                                    
								</form>
							
								<?php } elseif( $s != 1 ){ ?>
								<!--<form method="post" autocomplete="off"  onSubmit="return validation();"   enctype="multipart/form-data" action="" style="width:100%">
									<div class="row dgnform">
                                        <div class="col-sm-9">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label>Pan Card No.</label>
                                                        <div class="form-group">
                                                            <input class="form-control " value="DAPPG9500R"  id="pannumber" placeholder="Aadharcard No..." autocomplete="off" name="pannumber" type="text" maxlength="12" required >
                                                            <span id="erroraadharno" class="error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label>Name</label>
                                                        <div class="form-group">
                                                            <input class="form-control " value="Raju Kumar" id="name" placeholder="Example : Raju Kumar" name="name" placeholder="Pancard Name..."   type="text" required >
															
															
															
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label>Father Name </label>
                                                        <div class="form-group">

                                                            <input class="form-control" name="fathername" id="fathername" placeholder="Example : Shyam Singh" Value="Shyam Singh" type="text"  >
                                                        </div>
                                                    </div>
													

													
                                                </div>
												
												
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label>Date Of Birth</label>
                                                        <div class="form-group">
                                                            <input class="form-control " name="dobadhar"  type="text" value="26/07/1992" required placeholder="D.O.B.(dd/MM/yyyy)">
                                                            
                                                        </div>
                                                    </div>
                                                    
													<div class="col-sm-4">
                                            <label>Select Sign Image  </label>
                                            <div class="form-group">
											  <input type="file" name="signfile" class="form-control" id="signInp" />
                                              <img src=""   id="blahs" width="100px" height="100px" />
                                            </div>
                                        </div>

                                                     
                                                          
                                                        </div>
                                                    </div>
													
                                                  
                                        <div class="col-sm-3">
                                            <label>Select Sign Image  </label>
                                            <div class="form-group">
											  <input type="file" name="imagefile" class="form-control" id="imgInp" />
                                              <img src=""   id="blah" width="100px" height="100px" />
                                            </div>
                                        </div>
										
										
										
                                        <div class="col-sm-12">
                                            
                                            
                                            <div class="col-sm-3">
                                                <label>&nbsp;</label>
                                                <div class="form-group">              
                                                <button type="submit" name="savedataauto" class="btn btn-success btn-block" style="box-shadow: 0 0 0 3px rgba(40,167,69,.5);">Submit</button> 
                                                </div> 
                                            </div>
                                        </div>
									</div>

                                    
								</form> -->
								<?php } ?>
							</div>
							<!-- /# row -->
						</section>
							<style>
								.stylec
								{
								    box-shadow: 2px 3px #000 !important;
    border-radius: 50px !important;
								}
								</style>
					</div>
				</div>
            </div>
        </div>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
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
            $('#blahin').val(e.target.result);
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
            $('#blahsin').val(e.target.result);
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



<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      
      <div class="modal-body">
        <img src="<?php echo $slct['pafile'];?>" width="<?php echo $slct['iwidth'];?>" height="<?php echo $slct['iheight'];?>"/>
      </div>
     
    </div>
<button type="button" class="btn btn-default" data-dismiss="modal" style="    position: absolute;
    top: -20px;
    right: -422px;
    border-radius: 50%;
    background: red;
	border-color:red;
    color: white;">X</button>
  </div>
</div>

<div id="myModals" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false" style="background-color: rgba(0, 0, 0, 0.7);">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" style="     height: 352px;
    width: 727px;
    margin-left: 165px;
">
      
      <div class="modal-body" style="height: 243px;">
	 <img src="abs.jpg" height="200px" width="100%">
	<form method="post" action="paytmv/index.php">
									<div class="">
									
									 <p style="    font-size: 18px;
    text-align: center;
    margin-top:20px;
    ">You Not Authorized For using This Pan Services Please Buy Services.</p>
									    <div class="row col-md-12 col-sm-12 col-xs-12">
											<div class="col-md-3 col-sm-3 col-xs-6">
											<?php
												error_reporting(0);
												include("config.php");

												
												//$slct = mysqli_fetch_assoc($r);
												//$slct['aadharpoint'];
                                       $c = "select * from tbluser where userid=".$_SESSION['userid']."";
									   $updts = mysqli_query($connection,$c) ;
												$slcts = mysqli_fetch_array($updts);
												?>
												
												
												
                                    
													
												
												</div> 
											</div>
											
											<div class="col-md-12 col-sm-4 col-xs-6">
												
												<div class="form-group"> 
									
<input type="hidden" name="service[]" value="1"/> 


	
												<span id="erroruserid" class="error"></span>  
												</div> 
											</div>										
											
											<div class="col-md-12 col-sm-4 col-xs-6">
												
												<div class="form-group">              
												<input autocomplete="off" type="hidden" class="form-control"  id="Pay_Amt" value="500" name="Pay_Amt" placeholder="Website URL/ Link" readonly >
												<input type="hidden" value="<?php echo $_SESSION['userid'];?>" name="pay_uid"/>
												<span id="erroruserid" class="error"></span>  
												</div> 
											</div>										
											
															
													
																						
												
												
										
										
												
												
												
												
												
												
										</div> 
											</table>											
										</div>										
										<div class="col-md-12 col-sm-4 col-xs-6">
											<label>&nbsp;</label>
											<div class="form-group"> 
                                                   											
											   
											   <div class="col-md-6"><button type="submit" id="submit" name="submit" style="padding:17px;background:orange;border:1px solid orange;" class="btn btn-success btn-block"> &nbsp;&nbsp;&nbsp; Buy Now &nbsp;&nbsp;&nbsp;</button> </div><div class="col-md-6"><a href="panel.php" style="padding:17px;background:orange;border:1px solid orange;    margin-top: -65px;
    margin-left: 343px;" class="btn btn-success btn-block"> &nbsp;&nbsp;&nbsp; Dashboard &nbsp;&nbsp;&nbsp;</a></div>
											</div> 
										</div>
									</div>
								</form>
      </div>
      
        
      
    </div>
	
	
<style>
.modal-body
{
	flex:inherit !important;
	padding:inherit !important;
}
.modal-footer
{
	border:none !important;
}
.modal-dialog {
	margin: 30px 248px auto !important;
    max-width: auto !important;
	width : 100% !important;
}
</style>

  
 

<?php include('userFooter.php'); ?>
<link rel="stylesheet" type="text/css" href="DateTimePicker.min.css" />
	
		
		<script type="text/javascript" src="DateTimePicker.min.js"></script>
	
		<!--[if lt IE 9]>
			<link rel="stylesheet" type="text/css" href="DateTimePicker-ltie9.css" />
			<script type="text/javascript" src="DateTimePicker-ltie9.js"></script>
		<![endif]-->
<div id="dtBox"></div>
<script type="text/javascript">
		
			$(document).ready(function()
			{
				$("#dtBox").DateTimePicker();
			});
		
		</script>
		<script>
					    $("#ptype").on('change',function()
					    {
					       if($(this).val() == 'UTI-MINOR' || $(this).val() == 'NSDL-MINOR') 
					       {
					           $("#signInp").hide();
					           
					           $("#simgs").hide();
					       }
					       else 
					       {
					           $("#signInp").show();
					           $("#imgInp").show();
					           $("#stype").show();
					           $("#simgs").show();
					       }
					    });
					</script>
					
					<script type="text/javascript">
function ValidatePAN()
{
	 var pan_no = document.getElementById("pannumber");
	
 if (pan_no.value != "") {
            PanNo = pan_no.value;
            var panPattern = /^([a-zA-Z]{5})(\d{4})([a-zA-Z]{1})$/;
            if (PanNo.search(panPattern) == -1) {
                alert("Invalid Pan No");
                pan_no.focus();
                pan_no.value='';
                return false;
                
            }
           
          
        }
}

</script>

		
		