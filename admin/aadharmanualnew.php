<?php include('userHeader.php'); 

?>

     <!-------start link for popup video-------->
<link rel="stylesheet" href="popup/videopopup.css" />
<!-------stop link for popup video-------->


      <div class="main-panel">
        <!-- BEGIN : Main Content-->
        <div class="main-content">
          <div class="content-wrapper"><!--Flat button starts -->
<section id="buttons">
 
  <div class="row">
    <!--Flat Buttons Starts -->
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
							   <?php
							   
							 
							   if(isset($_POST['submit'])) {	
                                    $q = "";
                                    $q = "SELECT * FROM tbluser where  userid='".$_SESSION['userid']."'";
                                    $r = mysqli_query($connection,$q);
                                    $rw = mysqli_fetch_assoc($r);
                                    
                                    if ($rw['aadharpoint']>$rw['findwallet']){
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
                                    } 
                                    
                                    else {
                                        //$ch=curl_init();
                                        //curl_setopt($ch,CURLOPT_URL,'htmlfile/MPTAAS1234.html');
                                        //curl_setopt($ch,CURLOPT_POST,false);
                                        //curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
                                        //$html=curl_exec($ch);
                                        //curl_close($ch);

                                        $target_dir = "aadhar4/imgmanualaadhaar/";
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
                                                //$msg= "Congraadharsiteations! File Uploaded Successfully.";
                                            } else {
                                                unlink ($path_filename_ext);
                                                move_uploaded_file($temp_name,$path_filename_ext);
                                                //$msg= "Congraadharsiteations! File Uploaded Successfully.";
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
                                        $imgpth='aadhar4/imgmanualaadhaar/';
                                    
                                     
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
                                       // $st=substr($aaaa, 0, 4);
                                       // $nd=substr($aaaa, 4, 4);
                                       // $rd=substr($aaaa, 8, 4);
                                       // $aadharno=$st.' '.$nd.' '.$rd;
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
                                    
									
                               $aadharno = trim($_POST['aadharno']);
                               $name = trim($_POST['name']);
                               
                               $fathername = trim($_POST['fathername']);
                               $dobadhar = trim($_POST['dobadhar']);
                               $birthtithilocal = trim($_POST['birthtithilocal']);
                               $gender = strtoupper(trim($_POST['gender']));
                               $genderlocal = trim($_POST['genderlocal']);
                               $address = trim($_POST['address']);
                               $language = trim($_POST['language']);
                               $namelocal = trim($_POST['namelocal']);
							   $file = $_FILES['imagefile']['name'];
							  // $target_dir = "uploadssssssss/";
							  // $target_dir = "aadhar4/imgmanualaadhaar/";
							  $target_file = "aadhar4/imgmanualaadhaar/".md5($_FILES["imagefile"]["name"]).".jpg";
                             //  $target_file = "aadhar4/imgmanualaadhaar/".$_FILES["imagefile"]["name"];
                               $localaddress = trim($_POST['addresslocal']);
                               $patalocal = trim($_POST['patalocal']);
                               $houseno = trim($_POST['houseno']);
                               $street = trim($_POST['street']);
                               $pincode = trim($_POST['pincode']);
                               $vtcandpost = trim($_POST['vtcandpost']);
                               $dist = trim($_POST['dist']);
                               $statename = trim($_POST['statename']);
                                                          
                               
                                if ($aadharno=="") {
                                   $msgno = 'Please Enter Aadhar Card No .... ';
                               }
else if ($rw['aadharpoint'] > $rw['findwallet']){
                                        $msgno= "Sorry, Your Balance is Low .... Please Recharge Soon";
                                        ?>
                                        <script>
                                        setTimeout(function () {
                                        window.location.href= 'aadharmanual.php';
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
                               elseif ($gender=="") {
                                $msgno = 'Please Enter Gender  .... ';
                               }
                               elseif ($address=="") {
                                $msgno = 'Please Enter Address  .... ';
                               }
                               elseif ($language=="") {
                                $msgno = 'Please Enter Local Language  .... ';
                               }
                               elseif ($namelocal=="") {
                                $msgno = 'Please Enter Name in Local Language  .... ';
                               } 
                               elseif ($localaddress=="") {
                                $msgno = 'Please Enter Address in Local Language  .... ';
                               } 
                               else { 
                                   $a = mysqli_query($connection,"SELECT aadharno FROM aadharmanual Where aadharno='".$aadharno."'");
                                   $b = mysqli_fetch_array($a);
                                   if($b['aadharno']==$aadharno){
                                       $msgno = 'This Aadhar Card No Already Exist .... ';
                                   } else {
                                    $st='';
                                    $nd='';
                                    $rd='';
                                    $adhrno='';
                                     $st=substr($aadharno, 0, 4);
                                     $nd=substr($aadharno, 4, 4);
                                     $rd=substr($aadharno, 8, 4);
                                     $adhrno=$st.' '.$nd.' '.$rd;
                                     //echo $imgfpath;
                                     $sex='';
                                     if ($gender=='Male'){
                                        $sex='M'; 
                                     } 
                                     else {
                                        $sex='F';
                                     }
                                    /// insert value


                                    $resultm = mysqli_query($connection,"SELECT srno FROM aadharmanual ORDER BY srno DESC LIMIT 1");
					                $num_rows = mysqli_fetch_array($resultm);
					                $srno = $num_rows['srno']+1;
                                  
                                    $query='';
                                    $query = "INSERT INTO `aadharmanual`
                                    ( `aadharno`, `originalaadharno`, `aadharname`, `fathername`, `dob`, `gender`, `sexinlocal`, `fulladdress`,
                                     `locallanguage`, `localname`, `localaddress`, `imagepathoriginal`, `dobinlocal`, `pata`, `houseno`, `street`, `vtcandpost`, `dist`, `statename`,`pincode`,`srno`,`userid`,`createdatetime`) 
                                    VALUES ('".trim($aadharno)."','".trim($adhrno)."','".$name."','".$fathername."','".$dobadhar."','".$gender."',N'".$genderlocal."',
                                    '".$address."','".$language."',N'".$namelocal."',N'".$localaddress."','".$target_file."',N'".$birthtithilocal."',N'".$patalocal."','".$houseno."','".$street."','".$vtcandpost."','".$dist."','".$statename."','".$pincode."','".$srno."','".$_SESSION['userid']."',now())";
                                       $result = mysqli_query($connection, $query);
									   move_uploaded_file($_FILES["imagefile"]["tmp_name"], $target_file);
                                       $msg = "Please Wait Aadhar Preview just a second...";
                                       $_SESSION["IMGPATH"]='';
                                       $_SESSION["AADHAARNO"]=trim($aadharno);

                                   

                                    /// end insert
                                    /// start qr code

                                    mysqli_set_charset($connection,"utf8");
                                    $a = mysqli_query($connection,"SELECT * FROM aadharmanual Where aadharno='".$_SESSION["AADHAARNO"]."'");
                                    $b = mysqli_fetch_array($a);

                                    $remark="";
                                    $remark= 'Aadhar No : '.$b['aadharno'].' Aadhar Name : '.$b['aadharname'] ;
                                    // strat less point
                                    //  Dr amount start
									$getpoint = mysqli_fetch_assoc(mysqli_query($connection,"select * from tbluser where userid=".$_SESSION['userid'].""));
                                    $qu = "";
                                    $qu = "INSERT INTO `tbltrans`(`userid`, `username`, `transdate`, `transqty`, `transtype`, `touserid`, `tousername`, `remark`, `loginid`, `logdate`)
                                    VALUES ('".$_SESSION['userid']."','".$_SESSION['username']."',now(),'".$getpoint['aadharpoint']."','Dr','0','Aadhaar Create','".$remark."','".$_SESSION['userid']."',now())";
                                    $a1q=mysqli_query($connection,$qu);
                                 
									
                                    $sql="";
									$sql = "update tbluser SET findwallet= findwallet - 1 where userid='".$_SESSION['userid']."'";
									$abs = mysqli_query($connection, $sql);


// start copy
									$h = mysqli_fetch_assoc(mysqli_query($connection,"select * from tbluser where userid=".$_SESSION['userid'].""));
		
$parentid =  $h['refrenceid'];
$noofc = 1;
$childid = $_SESSION['userid'];
date_default_timezone_set('Asia/Kolkata');
$timestamp = date("Y-m-d");
$cp = $noofc * $slct['discom'];;  //Distributor Amount
$cpc = $noofc * $slct['discom'];; //SuperDistibutor Amount
if($parentid != 0)
{
  mysqli_query($connection,"insert into commission_report(`userid`,`commission`,`cardprint`,`refid`,`date`)values(".$parentid.",".$cp.",".$noofc.",".$childid.",'".$timestamp."')");
   mysqli_query($connection,"update tbluser set findwallet = findwallet + ".$cp." where userid=".$parentid."");
   $fetchmain = mysqli_fetch_assoc(mysqli_query($connection,"select * from tbluser where userid=".$parentid.""));
   if($fetchmain['refrenceid'] != 0 or $fetchmain['refrenceid'] != 1)
   {
	  
   mysqli_query($connection,"insert into commission_report(`userid`,`commission`,`cardprint`,`refid`,`date`)values(".$fetchmain['refrenceid'].",".$cpc.",".$noofc.",".$parentid.",'".$timestamp."')");
   
   mysqli_query($connection,"update tbluser set findwallet = findwallet + ".$cpc." where userid=".$fetchmain['refrenceid']."");
   }
		   }

 }
 ?>
                                   <script>
                                   setTimeout(function () {
                                      window.location.href= 'aadharlist.php';
                                   }, 2000);
                                   </script>
                                   <?php
                               }

                              }
                            ?>
							
							
							 <?php 
                              if(isset($_POST['savedataauto'])) {	
                             
							  $q = "";
                                    $q = "SELECT * FROM tbluser where  userid='".$_SESSION['userid']."'";
                                    $r = mysqli_query($connection,$q);
                                    $rw = mysqli_fetch_assoc($r);
                                    
									
                               $aadharno = trim($_POST['aadharno']);
                               $name = trim($_POST['name']);
                               
                               $fathername = trim($_POST['fathername']);
                               $dobadhar = trim($_POST['dobadhar']);
                               $birthtithilocal = trim($_POST['birthtithilocal']);
                               $gender = strtoupper(trim($_POST['gender']));
                               $genderlocal = trim($_POST['genderlocal']);
                               $address = trim($_POST['address']);
                               $language = trim($_POST['language']);
                               $namelocal = trim($_POST['namelocal']);
							   $file = $_FILES['imagefile']['name'];
							  // $target_dir = "uploadssssssss/";
							  // $target_dir = "aadhar4/imgmanualaadhaar/";
							   
                             //  $target_file = $target_dir . basename($_FILES["imagefile"]["name"]);
                               $target_file = "aadhar4/imgmanualaadhaar/".md5($_FILES["imagefile"]["name"]).".jpg";
                               $localaddress = trim($_POST['addresslocal']);
                               $patalocal = trim($_POST['patalocal']);
                               $houseno = trim($_POST['houseno']);
                               $street = trim($_POST['street']);
                               $pincode = trim($_POST['pincode']);
                               $vtcandpost = trim($_POST['vtcandpost']);
                               $dist = trim($_POST['dist']);
                               $statename = trim($_POST['statename']);
                                                          
                               
                                if ($aadharno=="") {
                                   $msgno = 'Please Enter Aadhar Card No .... ';
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
                               elseif ($gender=="") {
                                $msgno = 'Please Enter Gender  .... ';
                               }
                               elseif ($address=="") {
                                $msgno = 'Please Enter Address  .... ';
                               }
                               elseif ($language=="") {
                                $msgno = 'Please Enter Local Language  .... ';
                               }
                               elseif ($namelocal=="") {
                                $msgno = 'Please Enter Name in Local Language  .... ';
                               } 
                               elseif ($localaddress=="") {
                                $msgno = 'Please Enter Address in Local Language  .... ';
                               } 
                               else { 
                               $a = mysqli_query($connection,"SELECT aadharno FROM aadharmanual Where aadharno='".$aadharno."'");
                               $b = mysqli_fetch_array($a);
                                   if($b['aadharno']==$aadharno){
                                       $msgno = 'This Aadhar Card No Already Exist .... ';
                                   } else {
                                    $st='';
                                    $nd='';
                                    $rd='';
                                    $adhrno='';
                                     $st=substr($aadharno, 0, 4);
                                     $nd=substr($aadharno, 4, 4);
                                     $rd=substr($aadharno, 8, 4);
                                     $adhrno=$st.' '.$nd.' '.$rd;
                                     //echo $imgfpath;
                                     $sex='';
                                     if ($gender=='Male'){
                                        $sex='M'; 
                                     } 
                                     else {
                                        $sex='F';
                                     }
                                    /// insert value


                                    $resultm = mysqli_query($connection,"SELECT srno FROM aadharmanual ORDER BY srno DESC LIMIT 1");
					                $num_rows = mysqli_fetch_array($resultm);
					                $srno = $num_rows['srno']+1;
                                  
                                    $query='';
                                    $query = "INSERT INTO `aadharmanual`
                                    ( `aadharno`, `originalaadharno`, `aadharname`, `fathername`, `dob`, `gender`, `sexinlocal`, `fulladdress`,
                                     `locallanguage`, `localname`, `localaddress`, `imagepathoriginal`, `dobinlocal`, `pata`, `houseno`, `street`, `vtcandpost`, `dist`, `statename`,`pincode`,`srno`,`userid`,`createdatetime`) 
                                    VALUES ('".trim($aadharno)."','".trim($adhrno)."','".$name."','".$fathername."','".$dobadhar."','".$gender."',N'".$genderlocal."',
                                    '".$address."','".$language."',N'".$namelocal."',N'".$localaddress."','".$target_file."',N'".$birthtithilocal."',N'".$patalocal."','".$houseno."','".$street."','".$vtcandpost."','".$dist."','".$statename."','".$pincode."','".$srno."','".$_SESSION['userid']."',now())";
                                       $result = mysqli_query($connection, $query);
									   move_uploaded_file($_FILES["imagefile"]["tmp_name"], $target_file);
                                   }
                                   
                                   $last_id = mysqli_insert_id($connection);
											if($result)
											{
												$msg = "Aadhaar Card successfully wait for redirecting to Print List";
											?>
											
	
	<script type="text/javascript">
	$(document).ready(function()
	{
        window.location.href="aadharmanuallist.php";
		setTimeout(function(){
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
						
								<form method="post" autocomplete="off"  onSubmit="return validation();"   enctype="multipart/form-data" action="" style="width:100%">
									<div class="row dgnform">
                                        <div class="col-sm-9">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label>Aadhar Card No.</label>
                                                        <div class="form-group">
                                                            <input class="form-control " value=""  id="aadharno" placeholder="Aadharcard No..." autocomplete="off" name="aadharno" type="text" maxlength="12" required value="<?php echo $aadharno; ?>">
                                                            <span id="erroraadharno" class="error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label>Name</label>
                                                        <div class="form-group">
                                                            <input class="form-control " value="" id="name" placeholder="Example : Raju Kumar" name="name" type="text" required value="<?php echo $txtnm; ?>">
															
															
															
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label>Father Name </label>
                                                        <div class="form-group">

                                                            <input class="form-control" name="fathername" id="fathername" placeholder="Example : Shyam Singh" Value="" type="text" value="<?php echo $txtfnm; ?>" oninput="setaddress()">
                                                        </div>
                                                    </div>
													

													
                                                </div>
												<div class="row">
												<div class="col-md-4">
												 <label>House No</label>
												 <input class="form-control" name="houseno" id="houseno" type="text" oninput="setaddress()" required="" placeholder="House No">
												</div>
												<div class="col-md-4">
												<label>Gali,Locality</label>
												<input class="form-control" name="streetlocality" id="streetlocality" oninput="setaddress()" type="text" required="" placeholder="Gali, Locality, Panchayat">
												</div>
												<div class="col-md-4">
												<label>Post Office</label>
												<input class="form-control" name="vtcandpost" id="vtcandpost" type="text" oninput="setaddress()" required="" placeholder="Post Office">
												</div>
												<div class="col-md-4">
												<label>State</label>
												<input class="form-control" name="state" id="state" type="text" oninput="setaddress()" required="" placeholder="State">
												</div>
												<div class="col-md-4">
												<label>City</label>
												<input class="form-control" name="city" id="city" type="text" oninput="setaddress()" required="" placeholder="City">
												</div>
												<div class="col-md-4">
												<label>Pin code</label>
												<input class="form-control" name="pincode" id="pincode" type="text" oninput="setaddress()" required="" placeholder="pincode">
												</div>
												</div>
												
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label>Date Of Birth</label>
                                                        <div class="form-group">
                                                            <input class="form-control " name="dobadhar"  type="text" value="26/07/1992" required placeholder="D.O.B.(dd/MM/yyyy)" value="<?php echo $txtdob; ?>">
                                                            <input class="form-control " name="houseno"  type="hidden" value="<?php echo $txtbuld; ?>">
                                                            <input class="form-control " name="street"  type="hidden" value="<?php echo $txtlocality; ?>">
                                                            <input class="form-control " name="pincode"  type="hidden" value="<?php echo $txtpincode; ?>">
                                                            <input class="form-control " name="vtcandpost"  type="hidden" value="<?php echo $txtpost; ?>">
                                                            <input class="form-control " name="dist"  type="hidden" value="<?php echo $txtdistrict; ?>">
                                                            <input class="form-control " name="statename"  type="hidden" value="<?php echo $txtstate; ?>">
															<input class="form-control " id="birthtithi" name="birthtithi"  type="hidden" value="Birth Tithi">
                                                            
                                                           
                                                        </div>
                                                    </div>
													<div class="col-sm-4">
													<label>Date Of Birth Local</label>
													<input class="form-control " id="birthtithilocal" name="birthtithilocal" placeholder="Auto Fill"  type="text" value="">
                                                    </div></br>
													
                                                    <div class="col-md-4 col-sm-4 col-xs-6">
                                                    <label>Select Gender</label>
                                                    <div class="form-group">
                                                        <select class="form-control" name="gender" id="gender" required>
                                                            <option value="">GENDER</option>
                                                            <option value="Male" name="gender" id="gender" >Male</option>
                                                            <option value="Female" name="gender" id="gender" >Female</option>
                                                        </select>   
                                                    </div>
                                                    </div>
													<div class="col-sm-4">
													<label>Gender Local</label>
													<input class="form-control " id="genderlocal" name="genderlocal"  type="text" value="">
													</div>
													

                                                    <input class="form-control " id="pata" name="pata" readonly="readonly" type="hidden" value="address">
                                                    <input class="form-control " id="patalocal" name="patalocal" readonly="readonly" type="hidden" value="">
                                                        </div>
                                                    </div>
													
                                                    <div class="col-sm-7">
                                                        <label>Address  </label>
                                                        <div class="form-group">
                                                            <textarea class="form-control"  placeholder="S/O : Mo Rahim,  khurdaha, Jakhauli, Faizabad, Uttar Pradesh, 878987"  style="height:55px" id="txtSource" name="address" rows="10" type="text"  ><?php echo $txtadd; ?></textarea> 
                                                            <span id="errortxtSource" class="error"></span>
                                                        </div>
                                                  
                                        </div>
                                        <div class="col-sm-3">
                                            <label>Select Image  </label>
                                            <div class="form-group">
											  <input type="file" name="imagefile" class="form-control" id="imgInp" accept="image/x-png,image/jpg,image/jpeg" required />
                                                 <img src="" id="blah" width="100px" height="100px" style="display: none;">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <label>Select Local Language</label>
                                                    <div class="form-group">
                                                        <select class="form-control"  onchange="changelang()" name="language" id="language" required>
                                                            <option value="">SELECT</option>
                      <option value="HI">Hindi</option>
                      <option value="PA">Punjabi</option>
                      <option value="GU">Gujarati</option>
                      <option value="MR">Marathi</option>
                      <option value="TA">Tamil</option>
                      <option value="KN">Kannada</option>
                      <option value="BN">Bengali</option>
                      <option value="TE">Telugu</option>
                      <option value="OR">Oriya</option>
                      <option value="SD">Sindhi</option>
                    </select>  
                                                        <span id="errorlanguage" class="error"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label>Name (Local Language) </label>
                                                    <div class="form-group">
                                                        <input class="form-control" id="name_regional"  name="namelocal" type="text" value="">
                                                        <span id="errorname_regional" class="error"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>Address (Local Language)  </label>
                                                    <div class="form-group">
                                                        <textarea class="form-control" id="txtTarget"   style="height:55px" name="addresslocal" rows="10" type="text" ></textarea>
                                                        <span id="errortxtTarget" class="error"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <label>&nbsp;</label>
                                                <div class="form-group">              
                                                <button type="submit" name="savedataauto" class="btn btn-success btn-block">Submit</button>  
                                                </div> 
												
												
													  
                                            </div>
                                            <div class="col-sm-3">
                                                <label>&nbsp;</label>
                                                <div class="form-group">              
                                                <a href="https://www.google.com/intl/sa/inputtools/try/" target="_blank" type="button" name="button" class="btn btn-primary btn-block">Open Google Input Tools</a> 
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
				
			/*	var aadharno = document.getElementById('aadharno').value;
				if ( aadharno.length < 12 ) {
					 document.getElementById('erroraadharno').innerHTML = " **Please Enter 12 Digit Aadhaar Card Number !!!";
					 document.getElementById('aadharno').style.border = "1px solid red";
					 document.getElementById('aadharno').focus();
					 return false;
				}*/

                var txtSource = document.getElementById('txtSource').value;
				if ( txtSource.trim() =="" ) {
					 document.getElementById('errortxtSource').innerHTML = " **Please Enter Address !!!";
					 document.getElementById('txtSource').style.border = "1px solid red";
					 document.getElementById('txtSource').focus();
					 return false;
                }
                
                var name_regional = document.getElementById('name_regional').value;
				if ( name_regional.trim() =="" ) {
					 document.getElementById('errorname_regional').innerHTML = " **Please Enter Name in Local Language !!!";
					 document.getElementById('name_regional').style.border = "1px solid red";
					 document.getElementById('name_regional').focus();
					 return false;
				}

                var txtTarget = document.getElementById('txtTarget').value;
				if ( txtTarget.trim() =="" ) {
					 document.getElementById('errortxtTarget').innerHTML = " **Please Enter Local Language Address !!!";
					 document.getElementById('txtTarget').style.border = "1px solid red";
					 document.getElementById('txtTarget').focus();
					 return false;
				}
				
			}
			
			function setaddress(){
	var fathername = document.getElementById('fathername').value;
    var houseno = document.getElementById('houseno').value;
    var streetlocality = document.getElementById('streetlocality').value;
    var vtcandpost = document.getElementById('vtcandpost').value;
    var state = document.getElementById('state').value;
    var city = document.getElementById('city').value;
    var pincode = document.getElementById('pincode').value;

	document.getElementById('txtSource').innerHTML ="S/O : " + fathername + ", " + houseno + ", " + streetlocality + ", " + vtcandpost + ", " + city + ", " + state + ", " + pincode;
}

        </script>
	         
<script type="text/javascript">
//English to htranslate code
    function changelang() {
            var lang = document.getElementById("language").value;
            //alert(lang);
            var url = 
			"https://translate.googleapis.com/translate_a/single?client=gtx";
            url += "&sl=" + 'EN';
            url += "&tl=" + lang;
            url += "&dt=t&q=" + escape($("#txtSource").val());
		    
		   $.get(url, function (data, status) {
			 var result= '';
			  for(var i=0; i<=500; i++)
			    {
			      result += data[0][i][0];
                  //alert(result);
				  $("#txtTarget").val(result);
					
			    }
            });	

            url = 
			"https://translate.googleapis.com/translate_a/single?client=gtx";
            url += "&sl=" + 'EN';
            url += "&tl=" + lang;
            url += "&dt=t&q=" + escape($("#name").val());
		    //alert(url);
		   $.get(url, function (data, status) {
			 var result= '';
			  for(var i=0; i<=500; i++)
			    {
			      result += data[0][i][0];
                 // alert(result);
				  $("#name_regional").val(result);
					
			    }
            });	

            
            url = 
			"https://translate.googleapis.com/translate_a/single?client=gtx";
            url += "&sl=" + 'EN';
            url += "&tl=" + lang;
            url += "&dt=t&q=" + escape($("#gender").val());
		    //alert(url);
		   $.get(url, function (data, status) {
			 var result= '';
			  for(var i=0; i<=500; i++)
			    {
			      result += data[0][i][0];
                  // alert(result);
            if(result=="नर")
            result="पुरुष";
            $("#genderlocal").val(result);
					
			    }
            });
            
            url = 
			"https://translate.googleapis.com/translate_a/single?client=gtx";
            url += "&sl=" + 'EN';
            url += "&tl=" + lang;
            url += "&dt=t&q=" + escape($("#gender").val());
		    //alert(url);
		   $.get(url, function (data, status) {
			 var result= '';
			  for(var i=0; i<=500; i++)
			    {
			      result += data[0][i][0];
                  // alert(result);
            if(result=="ਨਰ")
            result="ਮਰਦ";
            $("#genderlocal").val(result);
					
			    }
            });

            url = 
			"https://translate.googleapis.com/translate_a/single?client=gtx";
            url += "&sl=" + 'EN';
            url += "&tl=" + lang;
            url += "&dt=t&q=" + escape($("#birthtithi").val());
		    //alert(url);
		   $.get(url, function (data, status) {
			 var result= '';
			  for(var i=0; i<=500; i++)
			    {
			      result += data[0][i][0];
                 //alert(result);
				  $("#birthtithilocal").val(result);
					
			    }
            });


            url = 
			"https://translate.googleapis.com/translate_a/single?client=gtx";
            url += "&sl=" + 'EN';
            url += "&tl=" + lang;
            url += "&dt=t&q=" + escape($("#pata").val());
		    //alert(url);
		   $.get(url, function (data, status) {
			 var result= '';
			  for(var i=0; i<=500; i++)
			    {
			      result += data[0][i][0];
                 // alert(result);
				  $("#patalocal").val(result);
					
			    }
            });

		};	
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


  </script>
