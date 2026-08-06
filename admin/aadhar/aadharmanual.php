<?php if (file_exists(__DIR__ . '/config.php')) {
    include_once(__DIR__ . '/config.php');
} elseif (file_exists(__DIR__ . '/../config.php')) {
    include_once(__DIR__ . '/../config.php');
} elseif (file_exists(__DIR__ . '/../../config.php')) {
    include_once(__DIR__ . '/../../config.php');
} elseif (file_exists(__DIR__ . '/../../../config.php')) {
    include_once(__DIR__ . '/../../../config.php');
} error_reporting(0); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Aadhaar Card Priview</title>
<link href="https://fonts.googleapis.com/css?family=Hind" rel="stylesheet">
<link href="aadhar.css" type="text/css" rel="stylesheet">
<?php
if(isset($_GET['searchid'])){
//$searchid =$_GET['searchid'];
$searchid = mysqli_real_escape_string($connection,$_GET['searchid']);

mysqli_set_charset($connection,"utf8");
$a = mysqli_query($connection,"SELECT * FROM aadharmanual Where aadharmanualid='".$searchid."'");
$b = mysqli_fetch_array($a);

}
?>

<style type="text/css">
.bg {
    background: url('<?php echo $b['locallanguage'].'.jpg' ?>') no-repeat;
    width: 800px;
    height: 986px;
    overflow: visible;
    display: block;
    background-size: 100% auto;
}

</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  </head>
  <body>
    <main class="bg">
     <div class="enroll"><?php echo $b['srno']?></div>
     <table class="upperpart">
         <tbody>
            <tr><td>To</td></tr>    
            <tr><td><?php echo $b['localname']?></td></tr>    
            <tr><td><?php echo $b['aadharname']?></td></tr>    
            <tr><td class="address"><?php echo $b['fulladdress']?></td></tr>    
         </tbody>   
     </table>
     
<?php 
if ($b['gender']=='Male'){
  $sex='M';
} 
else {
  $sex='F';
}
   /// qr code xml string start
   libxml_use_internal_errors(true);
   $simplexml= new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><books/>');
   $book1= $simplexml->addChild('book',"<PrintLetterBarcodeData uid=&quot;".$b['aadharno']."&quot; name=&quot;".$b['aadharname']."&quot; gender=&quot;".$sex."&quot; dob=&quot;".$b['dob']."&quot; co=&quot;".$b['fathername']."&quot; po=&quot;".$b['vtcandpost']."&quot; address=&quot;".$b['fulladdress']."&quot; pc=&quot;".$b['pincode']."&quot;/>");
   $str='<?xml version="1.0" encoding="UTF-8"?>'.$book1;
   $codeContents = $str; 
  // echo $codeContents;
  // echo $book1;
?>

     <p class="upperaddhar"><?php echo $b['originalaadharno']?></p> 
     <p class="download-date">Download Date: 30/05/2019</p>
     <img class="mrmin mrninbig" src='https://chart.googleapis.com/chart?chs=140x140&cht=qr&chl=<?php echo $codeContents; ?>' > 
    
   <table class="bpart">
		<thead>
				<tr> 
				<td width=""><img src="<?php echo 'imgmanualaadhaar/'.$b['imagepathoriginal']?>" width="90" height="90"></td>
				<td width="269" class="bpartone">
        <?php echo $b['localname']?><br /><?php echo $b['aadharname']?> <br />
					<span class="dob"><?php echo $b['dobinlocal'].' / '.'DOB : '?><?php echo $b['dob']?></span><br />
					<?php echo $b['sexinlocal'].' / '?><?php echo $b['gender']?> <br />
				</td>
				<td width="245" class="btopsec">
				    <strong><?php echo $b['pata']?>:</strong><br />
					<span class="maxheight"><?php echo $b['localaddress']?></span>
					<br /><strong>Address:</strong><br />
				  <span class="maxheight"><?php echo $b['fulladdress']?><br /></span>
				</td>
				<!--<td class="btopthird"><img src="qrcodeimage/<?php //echo $b['aadharno'].'.png'?>" width="110" height="110"></td>-->
        <td class="btopthird"><img src='https://chart.googleapis.com/chart?chs=140x140&cht=qr&chl=<?php echo $codeContents; ?>' ></td>
				</tr>
		</thead>
		</table>
		<table class="bpart-bottom">
			<tr>
					<td class="cpartfirst"><span class="addharnopan addharnopan1"><?php echo $b['originalaadharno']?></span></td>
          <td class="paddingbtm insiderelative"><img class="mrmin mrnin2" src='https://chart.googleapis.com/chart?chs=75x75&cht=qr&chl=<?php echo $codeContents; ?>'><td>
          <td class="cpartthird"><span class="addharnopan addharnopan2"><?php echo $b['originalaadharno']?></span></td>
			</tr>
		</table>
  </main>
  </body>
</html>