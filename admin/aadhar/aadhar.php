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
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Aadhaar Card Priview</title>
<link href="https://fonts.googleapis.com/css?family=Hind" rel="stylesheet">
<link href="aadhar.css" type="text/css" rel="stylesheet">
<?php
if(isset($_GET['searchid'])){
//$searchid =$_GET['searchid'];
$searchid = mysqli_real_escape_string($connection,$_GET['searchid']);

mysqli_set_charset($connection,"utf8");
$a = mysqli_query($connection,"SELECT * FROM aadharautodbt Where aadharautoid='".$searchid."'");
$b = mysqli_fetch_array($a);

}
?>

<!------------------------------ # connection ------------------------------->
						<?php
												error_reporting(0);
												if (file_exists(__DIR__ . '/config.php')) {
    include_once(__DIR__ . '/config.php');
} elseif (file_exists(__DIR__ . '/../config.php')) {
    include_once(__DIR__ . '/../config.php');
} elseif (file_exists(__DIR__ . '/../../config.php')) {
    include_once(__DIR__ . '/../../config.php');
} elseif (file_exists(__DIR__ . '/../../../config.php')) {
    include_once(__DIR__ . '/../../../config.php');
}

												
												$sqla="select * from setting";
												$updt = mysqli_query($connection,$sqla) ;
												$slct = mysqli_fetch_array($updt);
												//$slct = mysqli_fetch_assoc($r);
												//$slct['aadharpoint'];

												?>
												
						<!------------------------------ # connection ------------------------------->


<!DOCTYPE html>
<html lang="hi">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>PDF</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <script>
        window.onload = function() { window.print();  }
    </script> 
        
    </head>

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
    background: url('<?php echo 'demo/'.$b['locallanguage'].'demo.jpg' ?>') no-repeat;
    width: 800px;
    height: 1000px;
    overflow: visible;
    display: block;
    background-size: 100% auto;
}

</style>
<?php } else 
{ ?>
<style type="text/css">
.bg {
    background: url('<?php echo $b['locallanguage'].'.jpg' ?>') no-repeat;
    width: 800px;
    height: 1000px;
    overflow: visible;
    display: block;
    background-size: 100% auto;
}

</style>
<?php  } ?>
<?php 
if($b['locallanguage'] == 'TE' or $b['locallanguage'] == 'GU' or $b['locallanguage'] == 'TA' or $b['locallanguage'] == 'KN' or $b['locallanguage'] == 'BN') { ?>
<style>
    .btopsec {
    padding-left: 0px;
    padding-top: 55px;
    position: relative;
    top: -22px !important;
    left: 24px;
    width: 231px;
}
.btopthird {
    text-align: center;
    padding-top: 31px;
    padding-left: 0px;
}

</style>
<?php } 

if($b['locallanguage'] == 'HI')
{
    ?>
    <style>
        .btopthird img
        {
            top: 12px !important;
        }
    </style>
    <?php 
}

if($b['locallanguage'] == 'PA' or $b['locallanguage'] == 'OR')
{
    ?>
    <style>
        .btopthird img
        {
            width: 133px;
    height: 130px;
    position: relative;
    left: -6px;
    top: 9px;
        }
    </style>
    <?php 
}

if($b['locallanguage'] == 'MR')
{
?>
<style>
.btopsec
{
	left: -37px !important;
}

.btopthird img {
    width: 133px;
    height: 130px;
    position: relative;
    left: -77px !important;
    top: 10px !important;
}

.bpart {
    /* padding-top: 48px; */
    padding-left: 20px;
    position: absolute;
    bottom: 129px;
    width: 783px;
	top: 691px;
}
p.download-date {
    transform: rotate(90deg);
    position: absolute;
    font-size: 9px;
    top: 338px;
    font-weight: 400;
    left: 12px;
}
.enroll {
    position: absolute;
    top: 270px !important;
    left: 246px !important;
    font-size: 14px;
    font-weight: 600;
}
table.upperpart {
    position: absolute;
    top: 295px;
    left: 84px;
    font-weight: 400;
    width: 175px;
}

span.addharnopan.addharnopan2 {
    margin-top: -99px;
}

p.download-date.ddate2 {
   top: 79px !important;
    left: -36px !important;
}
.addharnopan1
{
    margin-top: -98px !important;
}

p.download-date.idate2 {
    top: 87px !important;
}

p.v1
{
    top: 623px !important;
}
p.v2 {
    top: -78px !important;
}

p.v3
{
  top: -88px !important;   
}
.upperaddhar
{
    top:588px !important;
}
img.mrmin.mrninbig {
    top: 526px;
    position: absolute;
    left: 222px;
    width: 144px;
}
.idate1
{
    left: 22px !important;
top: 468px !important;    
}
</style>
<?php } ?>
  </head>
  <body>
      <center>
    <main class="bg" id="content">
     <div class="enroll"><?php if($b['eno']==''){?> 1429/70044/0020<?php echo rand(1,9); } else { echo $b['eno']; } ?></div>
     <table class="upperpart">
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
   $book1= $simplexml->addChild('book',"<PrintLetterBarcodeData uid=&quot;".$b['aadharno']."&quot; name=&quot;".$b['aadharname']."&quot; gender=&quot;".$sex."&quot; dob=&quot;".$b['dob']."&quot; co=&quot;S/O: ".$b['fathername']."&quot; house=&quote;".$b['houseno']."&quot; street=&quote;".$b['street']."&quot; lm=&quote; &quot; vtc=&quote;".$b['vtcandpost']."&quot;  po=&quot;".$b['vtcandpost']."&quot; dist=&quot;".$b['dist']."&quot; subdist=&quot;".$b['subdist']."&quot; state=&quot;".$b['statename']."&quot; pc=&quot;".$b['pincode']."&quot;/>");
   $str='<?xml version="1.0" encoding="UTF-8"?>'.$book1;
   $codeContents = $str; 
  // echo $codeContents;
  // echo $book1;
?>

     <p class="upperaddhar" style="    top: 673px;
    position: absolute;
    left: 127px;
    letter-spacing: 2px;
    font-size: 20px;
    font-weight: 700;"><?php echo $b['originalaadharno']?></p> 
	 <p class="v1" style="top: 707px;
    font-size: 10px;
    position: absolute;
    left: 127px;
    letter-spacing: 1px;
    font-weight: 900;display:none;"><?php
   $vid =  chunk_split(mt_rand(1111111111111111, 9999999999999999), 4, ' ');
    echo 'VID : '.$vid?></p>
     <p class="download-date">Download Date: <?php if($b['ddate'] == '') {echo date("d/m/Y"); } else {$ddate = explode('-',$b['ddate']); echo $ddate[2].'/'.$ddate[1].'/'.$ddate[0];}
?>
</p>
<p class="download-date idate1" style="top: 535px;
    left: 20px;">Issue Date:  <?php if($b['idate'] == '') {echo date("d/m/Y"); } else {$ddate = explode('-',$b['idate']); echo $ddate[2].'/'.$ddate[1].'/'.$ddate[0];}
?>
</p>
     <img class="mrmin mrninbig" src='https://chart.googleapis.com/chart?chs=75x75&cht=qr&chl=<?php echo $codeContents; ?>&chld=L|0&chf=bg,s,FFFFFF00' > 
    
   <table class="bpart">
       
		<thead>
				<tr> 
				<td>
				    <p class="download-date ddate2" style="top: 82px;
    left: -48px;">Download Date: <?php if($b['ddate'] == '') {echo date("d/m/Y"); } else {$ddate = explode('-',$b['ddate']); echo $ddate[2].'/'.$ddate[1].'/'.$ddate[0];}
?>
</p>
<p class="download-date idate2" style="top: 87px;
    left: 268px;">Issue Date:  <?php if($b['idate'] == '') {echo date("d/m/Y"); } else {$ddate = explode('-',$b['idate']); echo $ddate[2].'/'.$ddate[1].'/'.$ddate[0];}
?>
</p>
				</td>
				<?php 
				
					if (strpos($b['imgcode'], 'https://www.tribal.mp.gov.in/') !== false) {
						
							?>
						<td width=""><img src="<?php echo $b['imgcode']?>" width="80" height="80" class="imgm" style="margin-top: 40px;
        margin-left: 11px;"></td>
							<?php
						}else if(strpos($b['imgcode'],'data:image') !== false) {							
				?>
				<td width=""><img src="<?php echo $b['imgcode']?>" width="80" height="80" class="imgm" style="margin-top: 40px;
        margin-left: 11px;"></td>
				<?php 
						}
						else {
							?>
				<td width=""><img src="<?php echo $slct['weburl'].'admin/'.$b['imgcode']?>" class="imgm" width="80" height="80" style="margin-top: 40px;
       margin-left: 11px;"></td>
						<?php } ?>
						
		
				<td width="269" class="bpartone" style="padding-top: 41px;">
				    <p style="margin:0px">
        <?php echo $b['localname']?><br /><?php echo $b['aadharname']?></p>
				<p style="margin:0px">	<span class="dob"><?php echo $b['dobinlocal'].' / '.'DOB : '?><?php echo $b['dob']?></span></p>
					<p style="margin:0px"><?php echo $b['sexinlocal'].' / '?><?php echo $b['gender']?> </p>
				</td>
				<td width="245" class="btopsec">
				    <strong><?php echo $b['pata']?>:</strong><br />
					<span class="maxheight" style="margin-bottom: 7px;"><?php echo $b['localaddress']?></span>
					<br /><strong>Address:</strong><br />
				  <span class="maxheight"><?php echo $b['fulladdress'];?><br /></span>
				</td>
				<!--<td class="btopthird"><img src="qrcodeimage/<?php //echo $b['aadharno'].'.png'?>" width="110" height="110"></td>-->
        <td class="btopthird"><img src='https://chart.googleapis.com/chart?chs=140x140&cht=qr&chl=<?php echo $codeContents; ?>&chld=L|0&chf=bg,s,FFFFFF00' ></td>
				</tr>
		</thead>
		</table>
		<table class="bpart-bottom">
			<tr>
			    
					<td class="cpartfirst"><span class="addharnopan addharnopan1" style="margin-top: -10px;
    margin-left: 73px;font-weight:700;"><?php echo $b['originalaadharno']?></span>
    
	 <p class="v2" style="top: 10px;
    font-size: 10px;
    position: absolute;
    left: 132px;
    letter-spacing: 1px;
    font-weight: 900;display:none;"><?php
   
    echo 'VID : '.$vid?></p>
     
     
    </td>
          <td class="paddingbtm insiderelative"><td>
          <td class="cpartthird"><span class="addharnopan addharnopan2" style="font-weight:700;"><?php echo $b['originalaadharno']?></span>
           <p class="v3" style="
    top: -4px;
    font-size: 10px;
    margin-left: 94px;
    position: relative;
    /* left: 434px; */
    letter-spacing: 1px;
    font-weight: 900;display:none;"><?php
   
    echo 'VID : '.$vid?></p>
          </td>
			</tr>
		</table>
  </main>
  </center>
  </body>
</html>

