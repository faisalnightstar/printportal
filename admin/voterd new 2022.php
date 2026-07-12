<?php
include('userHeader.php'); 
include('manu.php'); 
include('userFooter.php'); 
?> <?php if($fetch['walletamount'] < 20){
             //$msg = 'Voter Photo Balance is Low Recahgre now';
                        ?>  <script>
          //     alert(" Balance is Low Please Recahgre now");
	  

                window.location.href= "../admin/recharge.php";
                        </script>
                 <?php }else{
                 }
?>
 <div class="main-panel">
        <!-- BEGIN : Main Content-->
        <div class="main-content">
          <div class="content-wrapper">
					<section id="basic-form-layouts">

  <div class="row">

  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
       <div class="card-body">
          <div class="px-3">
<script type="text/javascript">
     function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
function setHouseNo(){
  var houseno = document.getElementById('houseNo').value;
  if ( houseno.trim() !="" ) {
          galimn = houseno ;
      }
  var partname = document.getElementById('partname').value;
  var tahsil = document.getElementById('tehsil').value;
  var dist = document.getElementById('district').value;
  var state = document.getElementById('statename').value;
  document.getElementById('txtSource').innerHTML = galimn +","+ partname +"," + tahsil +","+ dist +","+ state; 

}
function setaddress(){                                                 
    var galimn = "";
  
    var houseno = document.getElementById('houseno').value;
    if ( houseno.trim() !="" ) {
        galimn = houseno ;
    } 
    var gali = document.getElementById('gali').value;
    if ( gali.trim() !="" ) {
        galimn = galimn + gali ;
    } 

    var locality = document.getElementById('locality').value;
    var vtcandpost = document.getElementById('vtcandpost').value;
    var dist = document.getElementById('dists').value;
    var state = document.getElementById('statename').value;
    var pincode = document.getElementById('pincodes').value;
    var policestation = document.getElementById('policestation').value;
    var tahshil = document.getElementById('tahshil').value;

  document.getElementById('txtSource').innerHTML = galimn + locality + " Police Station-" + policestation + ", Tahshil-" + tahshil + ", District-" + dist + ", Pin Code-" + pincode;
}
</script>
			    <div class="col-md-12">
						<div class="row">
							<div class="page-header">
								<div class="page-title">
							
			</div>
							</div>
						</div>
					
            <!-- /# row -->
              <div class="row">
<?php
        if(isset($_POST['submit'])) {                         
           $epic =$_POST['epicno']; 
          $filedata =$_POST['filedata']; 
 $server=$_SERVER['SERVER_NAME'];
 $userid="88oV82G5-tEag-AnST-sr3s-yuc21yvcylLJ";
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://liveone.tech/Dashboard/Verify_api/v_adv/v_a_g.php?epicno=$epic&domain=$server&api=$userid",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "postman-token:  88oV82G5-tEag-AnST-sr3s-yuc21yvcylLJ "
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} 
else
{
 $json =  json_decode($response,true);
$status = $json["response"]["docs"];
$a = $status["0"];
}
                                            
              $assco_name       = $a["ac_name"];
              $assco_no         = $a["ac_no"];
              $namelocallang    = $a["name_v1"];
              //print_r($assco_no);
              //die;
              $name             = $a["name"];
              $sex              = $a["gender"];
              if ($sex=='M'){
                                                $gender='Male';
                                                }
                                            else{
                                                $gender='Female';
                                            }
              $epic_no          = $a['epic_no'];
              $fname            = $a["rln_name"];
              $fnamelocal       = $a["rln_name_v1"];
              $part_no        = $a["part_no"];
              $part_name_in     = $a["part_name"];
                        $part_name_local  = $a["part_name_v1"];
              $dist_name        = $a["district"];
              $tehsil           = $a["ac_name"];
              $state            = $a["state"];
              $dist_local      = $a["dist_name"];
              $age              = $a["age"];
              $relation_type    = $a["rln_type"];
              $ac_name_local    = $a["ac_name_v1"];
              if ($relation_type == 'F')
              {
               $reln_type = "Father";
              }else 
              {
              $reln_type = "Husband";
              }
              
        }                                        
?>

                            <?php 
                              if(isset($_POST['savedata'])) { 
                               //print_r($_POST);
             //print_r($_FILES);
             //die;
                               $name = strtoupper(trim($_POST['name']));
                               $aadharname = trim($_POST['aadharname']);
                               $namelocal = trim($_POST['namelocal']);
                               $gender = trim($_POST['gender']);
                               $genderlocal = trim($_POST['genderlocal']);
                               $dobadhar = trim($_POST['dobadhar']);
                               $spousename = trim($_POST['father/husband']);
                               $spousenamelocal = trim($_POST['spousenamelocal']);
                               $fathername = strtoupper(trim($_POST['fathername']));
                               $aadharfathername = trim($_POST['aadharfathername']);
                               $fathernamelocal = trim($_POST['fathernamelocal']);
                               $epicno = trim($_POST['epicno']);
                               $policestation = trim($_POST['policestation']);
                               $tahshil = trim($_POST['tahshil']);
                               $assemblyconnameno = trim($_POST['assemblyconnameno']);
                               $assemblyconnamenolocal = trim($_POST['assemblyconnamenolocal']);
                               $partno = trim($_POST['partno']);
                               $partname = trim($_POST['partname']);
                               $partnamelocal = trim($_POST['partnamelocal']);
                               
                 $target_dir = "uploads/";
                               $target_file = $target_dir . basename($_FILES["file_up"]["name"]);
                 $hsrc = $_POST['img_vl'];
                               $address = trim($_POST['address']);
                               $localaddress = trim($_POST['addresslocal']);
                               $language = trim($_POST['language']);
                               $birthtithilocal = trim($_POST['birthtithilocal']);
                               $patalocal = trim($_POST['patalocal']);
                               $kanamelocal = trim($_POST['kanamelocal']);
                               $sexlocal = trim($_POST['sexlocal']);
                               $signlocal = trim($_POST['signlocal']);
                 
                               $assconnamenolocal = trim($_POST['assconnamenolocal']);
                               $partnoandnamelocal = trim($_POST['partnoandnamelocal']);
             $user_image = $_POST['image_data'];
                                                       
                               $s = date($fetch['joindate']);
$dt = new DateTime($s);

$date = $dt->format('Y-m-d');

                               if ($name=="") {
                                   $msgno = 'Please Enter Voter Name .... ';
                               } 
                  else if($fetch['mfee'] == 0 and $fetch['walletamount'] > 20 and $date <= '2019-12-16')
{
  $msgno = 'Pay Maintaince Fee First!!!';
}
                               elseif ($namelocal=="") {
                                $msgno = 'Please Enter Voter Name in Local Language .... ';
                               }
                               elseif ($gender=="") {
                                $msgno = 'Please Enter Gender  .... ';
                               }
                               elseif ($dobadhar=="") {
                                $msgno = 'Please Enter Date of Birth  .... ';
                               }
                               //elseif ($spousename=="") {
                                //$msgno = 'Please Select Spouse  .... ';
                               //}
                               elseif ($fathername=="") {
                                $msgno = 'Please Enter Father Name  .... ';
                               }
                               //elseif ($policestation=="") {
                                //$msgno = 'Please Enter Police Station  .... ';
                               //}
                               elseif ($tahshil=="") {
                                $msgno = 'Please Enter Tahshil  .... ';
                               }
                               elseif ($language=="") {
                                $msgno = 'Please Enter Local Language  .... ';
                               }
                               elseif ($address=="") {
                                $msgno = 'Please Enter Address  .... ';
                               }
                               elseif ($localaddress=="") {
                                $msgno = 'Please Enter Address in Local Language  .... ';
                               } 
                               else { 
                                   $a = mysqli_query($connection,"SELECT epicno FROM voterauto2 Where epicno='".$epicno."'");
                                   $b = mysqli_fetch_array($a);
                                  
                                    
                                    /// insert value

                                    $resultm = mysqli_query($connection,"SELECT srno FROM voterauto2 ORDER BY srno DESC LIMIT 1");
                          $num_rows = mysqli_fetch_array($resultm);
                          $srno = $num_rows['srno']+1;
                                  date_default_timezone_set('Asia/Kolkata');
$timestamp = date("Y-m-d H:i:s");
                                    $query="";
                                     $query = " INSERT INTO `voterauto2`( `votername`, `aadharname`, `namelocal`,
                                    `dob`, `dobinlocal`, `gender`, `genderlocal`, `sexlocal`, `spousename`, `spousenamelocal`, 
                                    `fathername`, `fatheraadharname`, `fathernamelocal`, `epicno`, `policestation`, `tahshil`,
                                    `assconnonm`, `assconnonmlocal`, `partno`, `partname`, `partnamelocal`, `locallanguage`,
                                    `fulladdress`, `localaddress`, `pata`, `kaname`, `sign`, `signlocal`, `assconnameno`,
                                    `assconnamenolocal`, `partnoandname`, `partnoandnamelocal`, `imagepathoriginal`,
                                    `status`, `srno`, `createdatetime`, `userid`)
                                    VALUES ('".$name."','".$aadharname."',N'".$namelocal."',
                                    '".$dobadhar."',N'".$birthtithilocal."','".$gender."',N'".$genderlocal."',N'".$sexlocal."','".$spousename."',N'".$spousenamelocal."',
                                    '".$fathername."','".$aadharfathername."',N'".$fathernamelocal."','".$epicno."','".$policestation."','".$tahshil."',
                                    '".$assemblyconnameno."',N'".$assemblyconnamenolocal."','".$partno."','".$partname."',N'".$partnamelocal."','".$language."',
                                    '".$address."',N'".$localaddress."',N'".$patalocal."',N'".$kanamelocal."','".$sign."',N'".$signlocal."','Assembly Constituency No. & Name',
                                    N'".$assconnamenolocal."','Part No and Name',N'".$partnoandnamelocal."','".$user_image."',
                                    'PENDING','".$srno."','".$timestamp."','".$_SESSION['userid']."')";
                                     // echo $query;
                  // move_uploaded_file($_FILES["file_up"]["tmp_name"], $target_file);
                                      $result = mysqli_query($connection, $query);  
                                       $last_id = mysqli_insert_id($connection);
                                       $_SESSION["IMGPATH"]='';
                                       $_SESSION["epicno"]=$epicno;
if($result){
                                   
$sql = "update tbluser SET walletamount = walletamount - 18 where userid='".$_SESSION['userid']."'";
$abs = mysqli_query($connection, $sql);
$msg = "Please Wait Voter Priveiw just a second....";
}
?>
                                    <script>
                                                setTimeout(function () {
                                        window.location.href= 'voterlist.php';
                                                }, 2000);
                                                </script>         
                      <?php
                      mysqli_set_charset($connection,"utf8");
                                    $a = mysqli_query($connection,"SELECT * FROM voterauto2 Where epicno='".$_SESSION["epicno"]."'");
                                    $b = mysqli_fetch_array($a);

                                    $remark="";
                                    $remark= 'Voter Card No : '.$b['epicno'].' Voter Name : '.$b['votername'] ;
                                    // strat less point
                                    //  Dr amount start
                  $getpoint = mysqli_fetch_assoc(mysqli_query($connection,"select * from tbluser where userid=".$_SESSION['userid'].""));
                  
                                    $qu = "";
                                    $qu = "INSERT INTO `tbltrans`(`userid`, `username`, `transdate`, `transqty`, `transtype`, `touserid`, `tousername`, `remark`, `loginid`, `logdate`)
                                    VALUES ('".$_SESSION['userid']."','".$_SESSION['username']."',now(),'".$getpoint['aadharpoint']."','Dr','0','Voter Create','".$remark."','".$_SESSION['userid']."',now())";
                                    $a1q=mysqli_query($connection,$qu);
                                    //  Dr amount end
                                   // end point


                                   //echo $b['wamt'];
                  // start led wallet
                  
                  

                                    $sql="";
                  
                  
                    ?>
                    
                    <?php 
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
          <style>
            .image-preview__image{
              width:123px;
              height: 186px;
            }
            .image-preview{
              width: 123px;
              height: 186px;
              border: 2px solid #ddd;
              margin-top: 5px;
  
              display: flex;
              align-items: center;
              justify-content: center;
              font-weight: bold;
              color: #ccc;
            }
            .image-preview__image{
              //display: none;
              width: 100%;
            }
          </style>
                                        <div class="col-sm-12">
                                           <div style="float:right;">
                                                <div class="col-sm-4 col-xs-12">
                                                    <label style="margin-top: 15px;">Image</label>
                                                    <div class="image-preview" id="">
                                                    <img  class="image-preview__image" id="blah" name="blah" src="<?php echo $filedata ;?>" />
                                                    <input  class="form-control" name="image_data" type="hidden" value="<?php echo $filedata ;?>" require>
                                                    </div>
                                                </div>
                                       <!-- <label>Upload Photo </label>
						            	<input type='file' onchange="readURL(this);" /> -->
                                                </div>
                                                <div class="row">
                                                <div class="col-sm-5 col-xs-12">
                                                    <label style="margin-top:5px;">Epic No.</label>
                                                    <div class="form-group">
                                                        <input class="form-control" name="epicno" readonly="readonly" type="text" value="<?php echo $epic_no; ?>" require>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                <div class="col-sm-3 col-xs-6">
                                                    <label>Name</label>
                                                    <div class="form-group">
                                                       <input class="form-control" name="name"  id="name" readonly type="text" value="<?php echo $name; ?>">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-sm-3 col-xs-6">
                                                    <label>Name in Local Language</label>
                                                    <div class="form-group">
                                                       <input class="form-control" name="namelocal" id="namelocal" readonly type="text" value="<?php echo $namelocallang; ?>">
                                                    </div>
                                                </div>
                                               
                                                <div class="col-sm-2 col-xs-6">
                                                    <label>Age</label>
                                                    <div class="form-group">
                                                       <input class="form-control"  name="dobadhar"  id="dob"  type="text" value="<?php echo $age; ?>"  required>
                                                  </div>
                                                </div>      
                                                
                                                <div class="col-sm-3 col-xs-6">
                                                    <label>Gender</label>
                                                    <div class="form-group">
                                                        <input class="form-control " id="gender" readonly name="gender"  type="text" value="<?php echo $gender; ?>" required> 
                                                    </div>
                                                </div>
                                                </div>

                                            <div class="row">
                                                <div class="col-sm-2 col-xs-12">
                                                    <label>Father/Husband </label>
                                                    <div class="form-group">
                                                    <input class="form-control" id="spouse" name="father/husband" readonly id="dob"  type="text" value="<?php echo $reln_type; ?>" required>    
                                                    </div>
                                                </div>
                                                <div class="col-sm-5 col-xs-12">
                                                    <label>Father/Husband Name</label>
                                                    <div class="form-group">
                                                        <input class="form-control" name="fathername" id="fathername" readonly type="text" value="<?php echo $fname; ?>" required placeholder="Father/Husband Name">
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-sm-5 col-xs-12">
                                                    <label>Father/Husband Name(Local Language)</label>
                                                    <div class="form-group">
                                                        <input class="form-control" name="fathernamelocal" id="fathernamelocal" readonly type="text" value="<?php echo $fnamelocal; ?>"  required placeholder="Father/Husband Name(Local Language)" >
                                                    </div>
                                                </div>                                                    
                                            </div>
                                            
                                                <div class="col-sm-4 col-xs-12">
                                                    <label>Tahshil </label>
                                                    <div class="form-group">
                                                        <input class="form-control" readonly name="tahshil" id="tehsil" type="text" value="<?php echo ucfirst(strtolower($tehsil)); ?>" required  placeholder="Tahshil" required>
                                                        <span id="errortahshil" class="error"></span>
                                                    </div>
                                                </div>
                                                
                                                 <div class="col-sm-4 col-xs-12">
                                                    <label>District </label>
                                                    <div class="form-group">
                                                        <input class="form-control" readonly name="district" id="district" type="text" value="<?php echo ucfirst(strtolower($dist_name)); ?>" required  placeholder="District" required>
                                                        <span id="errordistrict" class="error"></span>
                                                    </div>
                                                </div>
                                                 <div class="col-sm-4 col-xs-12">
                                                    <label>House No.</label>
                                                    <div class="form-group">
                                                        <input class="form-control " id="houseNo" name="houseNo" oninput="setHouseNo()"  type="text"  required> 
                                                    </div>
                                                </div>
                                                </div>
                                                 <div class="col-sm-12">
                                                 <div class="row">
                                                 <div class="col-sm-6 col-xs-12">
                                                    <label>Assembly Constituency  Number and Name</label>
                                                    <div class="form-group">
                                                        <input class="form-control" id="assemblyconnameno" readonly name="assemblyconnameno"  type="text" value="<?php echo $assco_no.' - '.$assco_name ; ?>"  required placeholder="Assembly Constituency  Number and Name" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-xs-12">
                                                    <label>Assembly Constituency  Number and Name(Local)</label>
                                                    <div class="form-group">
                                                        <input class="form-control" id="assemblyconnamenolocal" readonly name="assemblyconnamenolocal"  type="text" value="<?php echo $assco_no.' - '.$ac_name_local; ?>"  required placeholder="Assembly Constituency  Number and Name Local Language" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4 col-xs-12">
                                                    <label>Part Number</label>
                                                    <div class="form-group">
                                                        <input class="form-control" required name="partno" readonly type="text" value="<?php echo $part_no; ?>"  required placeholder="Part Number">
                                                    </div>
                                                </div>
                                               <div class="col-sm-4 col-xs-12">
                                                    <label>Part Name</label>
                                                    <div class="form-group">
                                                        <input class="form-control" readonly required id="partname" name="partname"  type="text" value="<?php echo  ucfirst(strtolower($part_name_in)); ?>"  required placeholder="Part Name">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 col-xs-12">
                                                    <label>Part Name(Local Language)</label>
                                                    <div class="form-group">
                                                        <input class="form-control" id="partnamelocal" readonly name="partnamelocal" type="text" value="<?php echo $part_name_local; ?>" required placeholder="Part Name(Local Language)">
                                                       
                                                        <input class="form-control" id="houseno"  name="houseno"  type="hidden" value="<?php echo $txtbuld; ?>">
                                                        <input class="form-control" id="gali"  name="gali"  type="hidden" value="<?php echo $txtgali; ?>">
                                                        <input class="form-control" id="locality"  name="locality"  type="hidden" value="<?php echo $txtlocality; ?>">
                                                        <input class="form-control" id="pincode"  name="pincode"  type="hidden" value="<?php echo $txtpincode; ?>">
                                                        <input class="form-control" id="vtcandpost"  name="vtcandpost"  type="hidden" value="<?php echo $txtpost; ?>">
                                                        <input class="form-control" id="dist"  name="dist"  type="hidden" value="<?php echo $dist_name; ?>">
                                                        <input class="form-control" id="statename"  name="statename" oninput="setHouseNo()" type="hidden" value="<?php echo $state; ?>">
                                                       
                                                        <input class="form-control" id="aadharname" name="aadharname"  type="hidden" value="<?php echo $aadharname; ?>">
                                                        <input class="form-control" id="aadharfathername" name="aadharfathername"  type="hidden" value="<?php echo $aadharfname; ?>">
                                                        <input class="form-control" id="genderlocal" name="genderlocal"  type="hidden" value="">
                                                        <input class="form-control" id="birthtithi" name="birthtithi"  type="hidden" value="BirthTithi / Age ">
                                                        <input class="form-control" id="birthtithilocal" name="birthtithilocal"  type="hidden" value="">
                                                        <input class="form-control" id="pata" name="pata"  type="hidden" value="address">
                                                        <input class="form-control" id="patalocal" name="patalocal"  type="hidden" value="">
                                                        <input class="form-control" id="spousenamelocal" name="spousenamelocal"  type="hidden" value="">
                                                        <input class="form-control" id="kaname" name="kaname"  type="hidden" value="Ka Name">
                                                        <input class="form-control" id="kanamelocal" name="kanamelocal"  type="hidden" value="">
                                                        <input class="form-control" id="sex" name="sex" Address"readonly" type="hidden" value="Sex">
                                                        <input class="form-control" id="sexlocal" name="sexlocal"  type="hidden" value="">
                                                        <input class="form-control" id="sign" name="sign"  type="hidden" value="Electoral Registration Officer">
                                                        <input class="form-control" id="signlocal" name="signlocal"  type="hidden" value="">
                                                        <input class="form-control" id="assconnameno" name="assconnameno"  type="hidden" value="Assembly Constituency Number and Name">
                                                        <input class="form-control" id="assconnamenolocal" name="assconnamenolocal"  type="hidden" value="">
                                                        <input class="form-control" id="partnoandname" name="partnoandname"  type="hidden" value="Part Number and Name">
                                                        <input class="form-control" id="partnoandnamelocal" name="partnoandnamelocal" type="hidden" value="">

                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-sm-2 col-xs-12">
                                                    <label>Select Language</label>
                                                    <div class="form-group">
                                                        <select class="form-control" oninput="changelang()"   name="language" id="lang1" required>
                                                            <option value="">SELECT</option>
                                                            <option value="HI">Hindi</option>
                                                            <option value="PA">Punjabi</option>
                                                            <option value="GU">Gujrati</option>
                                                            <option value="MR">Marathi</option>
                                                            <option value="TA">Tamil</option>
                                                            <option value="KN">Kannada</option>
                                                            <option value="BN">Bengali</option>
                                                            <option value="TE">Telugu</option>
                                                            <option value="SD">Sindhi</option>
                                                            <option value="OR">Oriya</option>
                                                        </select>   
                                                        <span id="errorlanguage" class="error"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-5 col-xs-12">
                                                    <label>Address  </label>
                                                    <div class="form-group">
                                                        <textarea class="form-control" style="height:55px"   id="txtSource" name="address" rows="10" type="text" ></textarea>
                                                        <span id="errortxtSource" class="error"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-5 col-xs-12">
                                                    <label>Address (Local Language)  </label>
                                                    <div class="form-group">
                                                        <textarea class="form-control" id="txtTarget"     style="height:55px" name="addresslocal" rows="10" type="text" ></textarea>
                                                        <span id="errortxtTarget" class="error"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-3">
                                                <label>&nbsp;</label>
                                                <div class="form-group">              
                                                <button type="submit" name="savedata" class="btn btn-success btn-block">Submit</button> 
                        <label>&nbsp;</label>
                        
                                                <div class="form-group"> 
                        
                        <a href="https://www.google.com/intl/sa/inputtools/try/" target="_blank" button class="btn btn-light  btn-block float-right" type="submit">Language Translator</a>
                                                </div> 
                                            </div>
                                        </div>
                  </div>

                                    
                </form>
              </div>
              <!-- /# row -->
          </div>
        </div>
            </div>
        </div>


        <script type="text/javascript">
      function validation() {
        
        var aadharno = document.getElementById('aadharno').value;
        if ( aadharno.length < 12 ) {
           document.getElementById('erroraadharno').innerHTML = " **Please Enter 12 Digit Aadhaar Card Number !!!";
           document.getElementById('aadharno').style.border = "1px solid red";
           document.getElementById('aadharno').focus();
           return false;
        }

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
        </script>
           
<script type="text/javascript">
//English to htranslate code
    function changelang() {
    //alert("123456789");
            var lang = document.getElementById("lang1").value;
            //alert(lang);
            var url = 
            "https://translate.googleapis.com/translate_a/single?client=gtx";
            url += "&sl=" + 'EN';
            url += "&tl=" + lang;
            url += "&dt=t&q=" + escape($("#txtSource").val());
            //alert(url);
           $.get(url, function (data, status) {
  //  alert(data);
  //  alert(status);
             var result= '';
              for(var i=0; i<=500; i++)
                {
                  result += data[0][i][0];
          //        alert(result);
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

            
            var gen = $("#gender").val();
            url = 
            "https://translate.googleapis.com/translate_a/single?client=gtx";
            url += "&sl=" + 'EN';
            url += "&tl=" + lang;
            url += "&dt=t&q=" + escape(gen.toLowerCase());
            //alert(url);
           $.get(url, function (data, status) {
             var result= '';
              for(var i=0; i<=500; i++)
                {
                  result += data[0][i][0];
                 // alert(result);
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

      url = "";
            url = "https://translate.googleapis.com/translate_a/single?client=gtx";
            url += "&sl=" + 'EN';
            url += "&tl=" + lang;
            url += "&dt=t&q=" + escape($("#assconnameno").val());
                    //alert(url);
                   $.get(url, function (data, status) {
                         var result= '';
                          for(var i=0; i<=500; i++)
                            {
                              result += data[0][i][0];
                 // alert(result);
                                  $("#assconnamenolocal").val(result);

                            }
            });

      url = "";
            url = "https://translate.googleapis.com/translate_a/single?client=gtx";
            url += "&sl=" + 'EN';
            url += "&tl=" + lang;
            url += "&dt=t&q=" + escape($("#partnoandname").val());
                    //alert(url);
                   $.get(url, function (data, status) {
                         var result= '';
                          for(var i=0; i<=500; i++)
                            {
                              result += data[0][i][0];
                 // alert(result);
                                  $("#partnoandnamelocal").val(result);

                            }
            });

      url = "";
            url = "https://translate.googleapis.com/translate_a/single?client=gtx";
            url += "&sl=" + 'EN';
            url += "&tl=" + lang;
            url += "&dt=t&q=" + escape($("#sign").val());
                    //alert(url);
                   $.get(url, function (data, status) {
                         var result= '';
                          for(var i=0; i<=500; i++)
                            {
                              result += data[0][i][0];
                 // alert(result);
                                  $("#signlocal").val(result);

                            }
            });

      url = "";
            url = "https://translate.googleapis.com/translate_a/single?client=gtx";
            url += "&sl=" + 'EN';
            url += "&tl=" + lang;
            url += "&dt=t&q=" + escape($("#sex").val());
                    //alert(url);
                   $.get(url, function (data, status) {
                         var result= '';
                          for(var i=0; i<=500; i++)
                            {
                              result += data[0][i][0];
                 // alert(result);
                                  $("#sexlocal").val(result);

                            }
            });

      url = "";
            url = "https://translate.googleapis.com/translate_a/single?client=gtx";
            url += "&sl=" + 'EN';
            url += "&tl=" + lang;
            url += "&dt=t&q=" + escape($("#spouse").val());
                    //alert(url);
                   $.get(url, function (data, status) {
    //  alert(data);
    //  alert(status);
                         var result= '';
                          for(var i=0; i<=500; i++)
                            {
                              result += data[0][i][0];
                 // alert(result);
                                  $("#spousenamelocal").val(result);

                            }
            });

            url = "";
            url = "https://translate.googleapis.com/translate_a/single?client=gtx";
            url += "&sl=" + 'EN';
            url += "&tl=" + lang;
            url += "&dt=t&q=" + escape($("#kaname").val());
                    //alert(url);
                   $.get(url, function (data, status) {
                         var result= '';
                          for(var i=0; i<=500; i++)
                            {
                              result += data[0][i][0];
                 // alert(result);
                                  $("#kanamelocal").val(result);

                            }
            });

        };  
//Words and Characters Count    
</script>

<div id="myModald123456" class="modal fade" role="dialog" style="background-color: rgba(0, 0, 0, 0.67);" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      
      <div class="modal-body">
    <center>
    <div class="form-group" style="display: inline-grid;" id="step1">
    <label>Upload Photo </label>
   <label> यहाँ फोटो अपलोड करे </label>
    <br>
       <input id="file" class="form-control" type="file"/>
     <br>
     <div class="col-sm-12" style="display: flex;">
     <div class="col-sm-6">    
     <button id="button" class="btn btn-primary" style="border-radius: 20px;
    padding: 10px;background-color:#28a745;border:1px solid orange;">Next Step</button>
     <br>
     </div>
     <div class="col-sm-6">
     <a href="panel.php" class="btn btn-primary" >Home</a>
     </div>
     </div>
     
     </div>
     
     <div class="col-md-12" style="display: inline-grid;" id="step2">
     
    <form>
    <div class="col-sm-12">
    <label style="float:left;">Police Station (थाना )</label>
    <div class="form-group">
      <input type="text" id="policestation" oninput="setaddress()" class="form-control" placeholder="Enter Police Station" required style="text-transform: capitalize;">
    </div>
    </div>
    <div class="col-sm-12">
     <label style="float:left;">Pincode(पिनकोड)</label>
    <div class="form-group">
      <input type="text" id="pincodes"  maxlength="6" oninput="setaddress()" class="form-control" placeholder="Enter Pincode" onkeypress="return isNumber(event)" required>
    </div>
    </div>
    <div class="col-sm-12">
     <label style="float:left;">District (जिला )</label>
    <div class="form-group">
      <input type="text" id="dists" oninput="setaddress()" class="form-control" placeholder="Enter District" required style="text-transform: capitalize;">
     </div>
     </div>
     <div class="col-sm-12">
     <label style="float:left;">Tahshil (ब्लॉक)</label>
     <div class="form-group">
     <input class="form-control"   oninput="setaddress()" id="tahshil" type="text"  placeholder="Enter Tahshil" required required style="text-transform: capitalize;">
     </div>
     </div>
     
     <div class="col-sm-12">
     <label style="float:left;">Date Of Birth (जन्म तिथि)</label>
     <div class="form-group">
     <input class="form-control"  name="dobadhar" id="dobs"  type="date"  required>
     </div>
     </div>
     
     <div class="col-sm-12">
          <label style="float:left;">Father/Husband </label>
      <div class="form-group">
                                                  
                                                        <select class="form-control" id="spouseold" required="">
                                                            <option value="0">SELECT</option>
                                                            <option value="Father">Father</option>
                                                            <option value="Husband">Husband</option>
                                                        </select> 
                                         </div>   
</div>                     
 <div class="col-sm-12">
          <label style="float:left;">Select Language </label>
                                           <div class="form-group">                     
                                           <select class="form-control"     id="language" required>
                                                            <option value="0">SELECT</option>
                                                            <option value="HI">Hindi</option>
                                                            <option value="PA">Punjabi</option>
                                                            <option value="GU">Gujrati</option>
                                                            <option value="MR">Marathi</option>
                                                            <option value="TA">Tamil</option>
                                                            <option value="KN">Kannada</option>
                                                            <option value="BN">Bengali</option>
                                                            <option value="TE">Telugu</option>
                                                            <option value="SD">Sindhi</option>
                                                            <option value="OR">Oriya</option>
                                                        </select> 
</div>                            
</div>  
<div class="col-sm-12">                         
     <button id="finish_data" class="btn btn-primary" style="border-radius: 20px;
    padding: 10px;background-color:#28a745;border:1px solid orange;">Submit/ Finish</button>
     <a href="panel.php" class="btn btn-primary">Dashboard</a>
     </div>
     </form>
     
     </div>
     </center>
      </div>
      
        
      
    </div>

  </div>
</div>


  <style>
                
                .content-wrap {
    
  height: 1200px !important;
}
         

$('#language').on('change',function()
    {
        
        if($(this).val() != '' &&  $(this).val() == 'OR')
        {
    var langs = $(this).val();
    var lang = langs.toLowerCase();
                  var name = $("#name").val();
                  var address = $("#txtSource").val();
                  
                  $.post("https://xknfdjdjfktit3kktied3rifcdddsrtwq89764dspt4krktgoe48kjdjbds.com/admin/test.php",{lang:lang,name:name,address:address}).done(function (data) {
                      //alert(data);
                      var json = JSON.parse(data);
                      //alert(json.data);
                      $("[name='namelocal']").val(json.name.replace(/"/g,''));
                      $("[name='addresslocal']").val(json.address.replace(/"/g,''));
                  })
                  
                  var dob = $("#fathername").val();
                  var gender = $("#partname").val();
                 
                  $.post("https://xknfdjdjfktit3kktied3rifcdddsrtwq89764dspt4krktgoe48kjdjbds.com/admin/test.php",{lang:lang,name:dob,address:gender}).done(function (data) {
                      //alert(data);
                      var json = JSON.parse(data);
                      //alert(json.data);
                      $("[name='fathernamelocal']").val(json.name.replace(/"/g,''));
                      $("[name='partnamelocal']").val(json.address.replace(/"/g,''));
                  })
                  
                   var dob = $("#assemblyconnameno").val();
                   var gender = $("#kaname").val();
                 
                  $.post("https://xknfdjdjfktit3kktied3rifcdddsrtwq89764dspt4krktgoe48kjdjbds.com/admin/test.php",{lang:lang,name:dob,address:gender}).done(function (data) {
                      //alert(data);
                      var json = JSON.parse(data);
                      //alert(json.data);
                      $("[name='assemblyconnamenolocal']").val(json.name.replace(/"/g,''));
                     $("[name='kanamelocal']").val(json.address.replace(/"/g,''));
                  })
                  
                   var dob = $("#sex").val();
                   var gender = $("#sign").val();
                 
                  $.post("https://xknfdjdjfktit3kktied3rifcdddsrtwq89764dspt4krktgoe48kjdjbds.com/admin/test.php",{lang:lang,name:dob,address:gender}).done(function (data) {
                      //alert(data);
                      var json = JSON.parse(data);
                      //alert(json.data);
                      $("[name='sexlocal']").val(json.name.replace(/"/g,''));
                     $("[name='signlocal']").val(json.address.replace(/"/g,''));
                  })
                  
                  var dob = $("#assconnameno").val();
                   var gender = $("#partnoandname").val();
                 
                  $.post("https://xknfdjdjfktit3kktied3rifcdddsrtwq89764dspt4krktgoe48kjdjbds.com/admin/test.php",{lang:lang,name:dob,address:gender}).done(function (data) {
                      //alert(data);
                      var json = JSON.parse(data);
                      //alert(json.data);
                      $("[name='assconnamenolocal']").val(json.name.replace(/"/g,''));
                     $("[name='partnoandnamelocal']").val(json.address.replace(/"/g,''));
                  })
                  
                  var dob = $("#birthtithi").val();
                   var gender = $("#pata").val();
                 
                  $.post("https://xknfdjdjfktit3kktied3rifcdddsrtwq89764dspt4krktgoe48kjdjbds.com/admin/test.php",{lang:lang,name:dob,address:gender}).done(function (data) {
                      //alert(data);
                      var json = JSON.parse(data);
                      //alert(json.data);
                      $("[name='birthtithilocal']").val(json.name.replace(/"/g,''));
                     $("[name='patalocal']").val(json.address.replace(/"/g,''));
                  })
                  
                   var dob = $("#spouse").val();
                  
                 
                  $.post("https://xknfdjdjfktit3kktied3rifcdddsrtwq89764dspt4krktgoe48kjdjbds.com/admin/test.php",{lang:lang,name:dob,address:gender}).done(function (data) {
                      //alert(data);
                      var json = JSON.parse(data);
                      //alert(json.data);
                      $("[name='spousenamelocal']").val(json.name.replace(/"/g,''));
                    
                  })
                  
                  
        }
        else 
        {
         changelang();   
        }
                  
    });
  
   function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

   jQuery('#myModald').modal('show');
  $("#step2").hide();
  $("#finish_data").on("click", function(){
     
  var sname = $("#spouse").val();
  var police = $("#policestation").val();
  var teh = $("#tahshil").val();
  var pin = $("#pincodes").val();
  var dist = $("#dists").val();
  var dobs = $("#dobs").val();
  var langu = $("#language").val();
  if(teh == '' || police == '' || sname == 0 || pin == '' || dist == '' || dobs == '' || langu == 0)
  {
    alert('Please Fill All Details!!');
    return false;
  }
  else 
  {
    $("#spousename").val(sname);
    $("#tahshil1").val(teh);
    $("#police").val(police);
    $("#language").val(langu);
    $("#dob").val(dobs);
    $('#myModald').modal('hide');
   return false;
  }
  });
  </script>
  
  <script>
//document.getElementById('button').addEventListener('click', function() {
document.getElementById('img_v1').change( function() {
  var files = document.getElementById('file').files;
  if (files.length > 0) {
    getBase64(files[0]);
  }
});

function getBase64(file) {
   var reader = new FileReader();
   reader.readAsDataURL(file);
   reader.onload = function () {
     
  document.getElementById("myImg").src = reader.result;
  document.getElementById("img_vl").value = reader.result;
  $("#step1").hide();
  $("#step2").show();
   };
   reader.onerror = function (error) {
     console.log('Error: ', error);
   };
}
</script>


<script>


</script>
 
 <style>
     input#policestation,input#dists, {
    text-transform: capitalize;
}
 </style>