<?php include('../config.php'); error_reporting(0); ?>
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>

<title>Aadhaar Card Priview</title>
<link href="https://fonts.googleapis.com/css?family=Hind" rel="stylesheet">
<link href="aadhar.css" type="text/css" rel="stylesheet">
<?php
if(isset($_GET['searchid'])){
//$searchid =$_GET['searchid'];
$searchid = mysqli_real_escape_string($connection,$_GET['searchid']);

mysqli_set_charset($connection,"utf8");
$a = mysqli_query($connection,"SELECT * FROM aadharauto Where aadharautoid='".$searchid."'");
$b = mysqli_fetch_array($a);

}
?>

<!------------------------------ # connection ------------------------------->
						<?php
												error_reporting(0);
												include("config.php");

												
												$sqla="select * from setting";
												$updt = mysqli_query($connection,$sqla) ;
												$slct = mysqli_fetch_array($updt);
												//$slct = mysqli_fetch_assoc($r);
												//$slct['aadharpoint'];

												?>
												
						<!------------------------------ # connection ------------------------------->




<?php 
  $sid = $_GET['searchid'];
  $get = mysqli_fetch_assoc(mysqli_query($connection,"select * from aadharauto where aadharautoid=".$sid.""));
  
  ?>
  
  <?php
if($get['userid'] == 2) 
{
	?>
<style type="text/css">
.bg {
    background: url('<?php echo 'demo/HIdemo.jpg' ?>') no-repeat;
    width: 800px;
    height: 986px;
    overflow: visible;
    display: block;
    background-size: 100% auto;
}

</style>
<?php } else 
{ ?>
<style type="text/css">
.bg {
    background: url('<?php echo 'HImin.jpg' ?>') no-repeat;
    width: 800px;
    height: 986px;
    overflow: visible;
    display: block;
    background-size: 100% auto;
}

</style>
<?php  } ?>
<style>
    body
    {
        width:auto !important;
        margin-left:25% !important;
    }
    @media print {
   body
    {
       margin-left:60px !important; 
    }
}
</style>
  </head>
  <body >
     
     <div class="img-container" id="footer">
    <main class="bg" id="customerformmodal">
     <div class="enroll" style="position: absolute;
    top: 293px;
    left: 25px;
    font-size: 13px;"> नामांकन क्रम / Enrolment No.: </div>
     <table class="upperpart" style="position: absolute;
    top: 316px;
    left: 47px;
    font-weight: 400;
    width: 175px;">
         <tbody>
            <tr><td>To</td></tr>    
            <tr><td><?php echo $b['localname']?></td></tr>    
            <tr><td><?php echo $b['aadharname']?></td></tr>    
            
            <?php $add = explode(',',$b['fulladdress']);?>
            <tr><td class="address"><?php echo $add[0];?> <br> <?php echo $b['houseno'];?><br><?php echo $b['street'];?> <br> <?php echo $b['vtcandpost'];?> <br> <?php echo $b['dist'].' '.$b['statename'].' - '.$b['pincode'];?></td></tr>    
         </tbody>   
     </table>
     
<?php 
if ($b['gender']=='MALE'){
  $sex='M';
} 
else {
  $sex='F';
}
   /// qr code xml string start
   libxml_use_internal_errors(true);
   $simplexml= new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><books/>');
   $bod = explode('/',$b['dob']);
   $book1= $simplexml->addChild('book',"<PrintLetterBarcodeData uid=&quot;".$b['aadharno']."&quot; name=&quot;".$b['aadharname']."&quot; gender=&quot;".$sex."&quot; yob=&quot;".$bod[2]."&quot; co=&quot;S/O: ".$b['fathername']."&quot; house=&quote;".$b['houseno']."&quot; street=&quote;".$b['street']."&quot; lm=&quote; &quot; vtc=&quote;".$b['vtcandpost']."&quot;  po=&quot;".$b['vtcandpost']."&quot; dist=&quot;".$b['dist']."&quot; subdist=&quot;".$b['subdist']."&quot; state=&quot;".$b['statename']."&quot; pc=&quot;".$b['pincode']."&quot;/>");
   $str='<?xml version="1.0" encoding="UTF-8"?>'.$book1;
   $codeContents = $str; 
  // echo $codeContents;
  // echo $book1;
?>

     <p class="upperaddhar" style="top: 648px;
    position: absolute;
    text-decoration: underline;
    text-decoration-style: dotted;
    left: 93px;
    letter-spacing: 2px;
    font-size: 20px;
    font-weight: 100;"><?php echo $b['originalaadharno']?></p> 
	 <p style="top: 682px;
    font-size: 9px;
    position: absolute;
    left: 107px;
    letter-spacing: 2px;
    font-weight: bold;"><?php echo 'VID : '.chunk_split(mt_rand(1111111111111111, 9999999999999999), 4, ' ');?></p>
     <p class="download-date" style="    transform: rotate(90deg);
    position: absolute;
    font-size: 8px;
    top: 354px;
    font-weight: 600;
    left: -17px;">Download Date: <?php echo date("d/m/y");
?>
</p>

 <p class="download-date" style=" transform: rotate(90deg);
    position: absolute;
    font-size: 8px;
    top: 468px;
    font-weight: 600;
    left: -15px;">Generate Date: <?php echo date("d/m/y");
?>
</p>
     <img class="mrmin mrninbig" style="top: 571px;
    position: absolute;
    left: 246px;" src='https://chart.googleapis.com/chart?chs=120x120&cht=qr&chl=<?php echo $codeContents; ?>&chld=L|0&chf=bg,s,FFFFFF00' > 
    
   <table class="bpart">
		<thead>
				<tr> 
				<?php 
				
					if (strpos($b['imagepathoriginal'], 'https://www.tribal.mp.gov.in/') !== false) {
						
							?>
						<td width=""><img src="<?php echo $b['imagepathoriginal']?>" width="90" height="90" style="margin-top: 15px;"></td>
							<?php
						}else if(strpos($b['imagepathoriginal'],'data:image') !== false) {							
				?>
				<td width=""><img src="<?php echo $b['imagepathoriginal']?>" width="90" height="90" style="margin-top: 15px;"></td>
				<?php 
						}
						else {
							?>
											
			<?php 			if($b['locallanguage'] == 'HI'){ $lo = 'जन्म तिथि'; $po='पुरुष';}else { $lo = $b['birthtithilocal']; $po= $b['sexinlocal'];}?>
			
				<td width=""><img src="<?php echo $slct['weburl'].'admin/'.$b['imagepathoriginal']?>" width="90" height="90" style="margin-top: 15px;"></td>
						<?php } ?>
				<td width="269" class="bpartone" style="padding-top: 14px;">
        <?php echo $b['localname']?><br /><?php echo $b['aadharname']?> <br />
					<span class="dob"><?php echo $b['dobinlocal'].' / '.'DOB : '?><?php echo $b['dob']?></span><br />
					<?php echo $b['sexinlocal'].' / '?><?php echo $b['gender']?> <br />
				</td>
				<td width="245" class="btopsec" style="padding-left: 20px;
    padding-top: 12px;
    position: relative;
    top: -7px;
    left: -12px;
    width: 231px;font-size: 10px;">
				    <strong><?php echo $b['pata']?>:</strong><br />
					<span class="maxheight" style="margin-bottom: 7px;"><?php echo $b['localaddress']?></span>
					<br /><strong>Address:</strong><br />
				  <span class="maxheight"><?php echo $b['fulladdress'];?><br /></span>
				</td>
				<!--<td class="btopthird"><img src="qrcodeimage/<?php //echo $b['aadharno'].'.png'?>" width="110" height="110"></td>-->
        <td class="btopthird"><img src='https://chart.googleapis.com/chart?chs=140x140&cht=qr&chl=<?php echo $codeContents; ?>&chld=L|0&chf=bg,s,FFFFFF00'  style="    width: 152px;
    height: 146px;
    position: relative;
    left: -54px;
    top: -19px;"></td>
				</tr>
		</thead>
		</table>
		<table class="bpart-bottom">
			<tr>
					<td class="cpartfirst"><span class="addharnopan addharnopan1"><?php echo $b['originalaadharno']?></span></td>
          <td class="paddingbtm insiderelative"><img class="mrmin mrnin2" style="position: absolute;
    top: -131px;
    margin: 0px;
    width: 152px;
    height: 171px;
    right: -86px;"src='https://chart.googleapis.com/chart?chs=100x100&cht=qr&chl=<?php echo $codeContents; ?>&chld=L|0&chf=bg,s,FFFFFF00'><td>
          <td class="cpartthird"><span class="addharnopan addharnopan2" style="margin-left: 81px;"><?php echo $b['originalaadharno']?></span></td>
			</tr>
		</table>
  </main>
  </div>

  </body>
</html>