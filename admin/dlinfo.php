<?php include('userHeader.php');
if($fetch['findwallet'] < 40){
             //$msg = 'Voter Photo Balance is Low Recahgre now';
                        ?>  <script>
          //     alert(" Balance is Low Please Recahgre now");
	  

                window.location.href= "findwallet.php";
                        </script>
                 <?php }else{
                 }

if(isset($_POST['dlprint'])){
$dll =$_POST['dlno']; 
$dobb =$_POST['dob']; 
$api  = "kDsGH7UC-aE7J-D38I-LIFX-0FIIfQoOSCgr";
$server=$_SERVER['SERVER_NAME'];
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://test.axenapi.co.in/Dashboard/Verify_api/Dl/dl_v1.php?dlno=$dll&dob=$dobb&api=$api",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:106.0) Gecko/20100101 Firefox/106.0',
    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8',
    'Accept-Language: en-US,en;q=0.5',
    'Accept-Encoding: gzip, deflate',
    'Connection: keep-alive',
    'Upgrade-Insecure-Requests: 1',
    'Pragma: no-cache',
    'Cache-Control: no-cache'
  ),
));

$response = curl_exec($curl);
if ($response){
$sql = "update tbluser SET findwallet= findwallet - 40 where userid='" . $_SESSION[ 'userid' ] . "'";
 $abs = mysqli_query( $connection, $sql );
}
curl_close($curl);
$json= json_decode($response,true);
$photo=$json["photo"];
$sign=$json["sign"];
$dlno=$json["dlno"];
$dob=$json["dob"];
$name=$json["name"];
$father=$json["fathername"];
$idate=$json["idate"];
$gender=$json["gender"];
$bgroup=$json["bgroup"];
$typeofvehicle=$json["typeofvehicle"];
$addres=$json["address"];
}
if(isset($_POST['savedat'])) { 
$userid=$_SESSION['userid'];
  $dlno=$_POST['dlno'];
  $name=$_POST['name'];
  $father=$_POST['father'];
  $bgroup=$_POST['bgroup'];
  $swd=$_POST['fathername'];
  $dob=$_POST['dob'];
  $gender=$_POST['gender'];
  $address=$_POST['address'];
  $typeofvehicle=$_POST['typeofvehicle'];
  $idate=$_POST['idate'];
  $edate=$_POST['edate'];
  $state=$_POST['state'];
  $photo=$_POST['photo'];
  $sign=$_POST['sign'];
  $ddate=$_POST['ddate'];
  $mobileno=$rw['mobileno'];
  $emailid=$rw['emailid'];

    $query="INSERT INTO `dllist`(`dlno`, `name`, `swd`, `dob`, `gender`, `bgroup`, `address`, `state`, `typeofvehicle`, `mobileno`, `emailid`, `idate`, `edate`, `ddate`, `photo`, `sign`, `userid`,`payment_status`) VALUES ('$dlno','$name','$swd','$dob','$gender','$bgroup','$address','$state','$typeofvehicle','$mobileno','$emailid','$idate','$edate','$ddate','$photo','$sign','$userid','1')";
 $result = mysqli_query($connection, $query);
  if ($query){
                                    
         echo '<script> window.location.href="/admin/dlmlist.php";</script>';
    } 

    else{
         echo '<script> window.location.href="/admin/dlmlist.php";</script>';
    }
}
?>

 <div class="content-wrap">

            <div class="main">

			    <div class="col-md-12">
			         <div class="main-content">
                          <section class="section">
                            <div class="section-header">
                                 <div class="container-fluid">
                                      <div class="row">
                                        <h1>Information</h1>
                              </div>
                               </div>
                          </div>
            <!-- /# row -->
            <section id="main-content">
              <div class="card">
     
            <div class="card-body">
              <h5 class="card-title"></h5>
         <form class="row g-3" method="post"enctype="multipart/form-data">   
              
                    <div class="col-lg-12"> 
                     <div class="row"> 
          <div class="col-md-6 d-flex justify-content-center">
        
          <img class="image-preview__image" id="blah" name="blah" src="<?php echo $photo ;?>" style="height: 163px;width: 30%;"/>
          <input class="form-control" name="photo" type="hidden" value="<?php echo $photo ;?>" >
        
          </div> 
              
          <div class="col-md-6 d-flex justify-content-center">
          <img class="image-preview__image" id="blahg" name="blahg" src="<?php echo $sign ;?>" style="height: 163px;width: 30%;"/>
          <input class="form-control" name="sign" type="hidden" value="<?php echo $sign ;?>" >
          </div>
        
          </div>
          </div>
          
          <div class="col-md-4">
          <label> Driving Lic. No. </label>
          <div class="form-group">
          <input class="form-control" name="dlno" type="text" value="<?php echo $dlno; ?>" required>
           <input type="hidden" name="userid" value="<?php echo $_SESSION['userid'];?>" id="userid" >
           <input type="hidden" name="ddate" value="<?php date_default_timezone_set("Asia/Kolkata"); echo "" . date("d:m:Y"); ?>" id="userid" >
          </div>
          </div>
          <div class="col-md-4">
          <label> Date Of Birth </label>
          <div class="form-group">
          <input class="form-control" name="dob" id="dob" type="text" value="<?php echo $dob; ?>">

          </div>
          </div>
          <div class="col-md-4">
          <label>Name </label>
          <div class="form-group">
          <input class="form-control" name="name" id="name" type="text" value="<?php echo $name; ?>">
          </div>
          </div>


          <div class="col-md-4">
          <label> Father's Name </label>
          <div class="form-group">
          <input class="form-control"  name="fathername" id="fathername"  type="text" value="<?php echo $father; ?>"  required>
          </div> </div>

          <div class="col-md-4">
          <label> Issue Date </label>
          <div class="form-group">
          <input class="form-control " id="idate" name="idate"  type="text" value="<?php echo $idate; ?>" required> 
          </div>
          </div>
          <div class="col-md-4">
          <label> Set Expiry Date</label>
          <div class="form-group">
        <input class="form-control" type="text" id="edate" name="edate" value="<?php $date = "$idate"; echo date('d-m-Y', strtotime($date. ' + 5478 days')); ?>" pattern="\d{2}-\d{2}-\d{4}">
          </div>
          </div>



          <div class="col-md-4">
          <label>Gender </label>
          <div class="form-group">
          <input class="form-control" id="gender" name="gender" type="text" value="<?php echo $gender; ?>" required>    
          </div>
          </div>
          <div class="col-md-4">
          <label> Blood Group</label>
          <div class="form-group">
          <input class="form-control" name="bgroup" id="bgroup" type="text" value="<?php echo $bgroup ; ?>" required >

          </div>
          </div>
          
          <div class="col-md-4">
          <label> Type Of Vehicle</label>
          <div class="form-group">
          <input class="form-control" name="typeofvehicle" id="typeofvehicle" type="text" value="<?php echo $typeofvehicle ; ?>" required >

          </div>
          </div>
          

          <div class="col-md-4">
          <label> Select State </label>
          <div class="form-group">
          <select class="form-control" name="state" id="state" required>
          <option value="" selected="" disabled="" title="Please select state">---Select State---</option>
                    <option value="AN">Andaman and Nicobar</option>
                    <option value="AP">Andhra Pradesh</option>
                    <option value="AR">Arunachal Pradesh</option>
                    <option value="AS">Assam</option>
                    <option value="BR">Bihar</option>
                    <option value="CH">Chandigarh</option>
                    <option value="CG">Chhattisgarh</option>
                    <option value="DL">Delhi</option>
                    <option value="GA">Goa</option>
                    <option value="GJ">Gujarat</option>
                    <option value="HR">Haryana</option>
                    <option value="HP">Himachal Pradesh</option>
                    <option value="JK">Jammu and Kashmir</option>
                    <option value="JH">Jharkhand</option>
                    <option value="KA">Karnataka</option>
                    <option value="KL">Kerala</option>
                    <option value="LA">Ladakh</option>
                    <option value="MP">Madhya Pradesh</option>
                    <option value="MH">Maharashtra</option>
                    <option value="MN">Manipur</option>
                    <option value="ML">Meghalaya</option>
                    <option value="MZ">Mizoram</option>
                    <option value="NL">Nagaland</option>
                    <option value="OD">Odisha</option>
                    <option value="PY">Pondicherry</option>
                    <option value="PB">Punjab</option>
                    <option value="RJ">Rajasthan</option>
                    <option value="SK">Sikkim</option>
                    <option value="TN">Tamil Nadu</option>
                    <option value="TR">Tripura</option>
                    <option value="DD">UT of DNH and DD</option>
                    <option value="UK">Uttarakhand</option>
                    <option value="UP">Uttar Pradesh</option>
                    <option value="WB">West Bengal</option>
          </select>   
          <span id="errorlanguage" class="error"></span>
          </div>
          </div>
          
                    <div class="col-md-4">
          <label>Address  </label>
          <div class="form-group">
          <textarea class="form-control" id="address" name="address"><?php echo $addres; ?></textarea>
          <span id="errortxtSource" class="error"></span>
          </div>
          </div>
         <div class="text-center">
                  <button type="submit" id="savedat" name="savedat" class="btn btn-primary">Submit</button>
                </div>
              </form> <!-- End Multi Columns Form -->
              
<?php include('userFooter.php'); ?> 