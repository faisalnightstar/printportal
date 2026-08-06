<?php
if (file_exists(__DIR__ . '/config.php')) {
    include_once(__DIR__ . '/config.php');
} elseif (file_exists(__DIR__ . '/../config.php')) {
    include_once(__DIR__ . '/../config.php');
} elseif (file_exists(__DIR__ . '/../../config.php')) {
    include_once(__DIR__ . '/../../config.php');
} elseif (file_exists(__DIR__ . '/../../../config.php')) {
    include_once(__DIR__ . '/../../../config.php');
}
error_reporting(0);

if(isset($_GET['searchid'])){
//$searchid =$_GET['searchid'];
$searchid = mysqli_real_escape_string($connection,$_GET['searchid']);

mysqli_set_charset($connection,"utf8");
$a = mysqli_query($connection,"SELECT * FROM aadharauto Where aadharautoid='".$searchid."'");
if(isset($_GET['type']) && $_GET['type'] == 'dbt')
{
  $a = mysqli_query($connection,"SELECT * FROM aadharautodbt Where aadharautoid='".$searchid."'");
}

if(isset($_GET['type']) && $_GET['type'] == 'manual')
{
 $a = mysqli_query($connection,"SELECT * FROM aadharmanual Where aadharmanualid='".$searchid."'");
}

$b = mysqli_fetch_array($a);




}
?>
<!DOCTYPE html>
<html lang="or">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>PDF</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <script>
        window.onload = function() { window.print();  }
    </script> 
        
    </head>

    <style type="text/css">
           body{
      font-family: 'Roboto', sans-serif;
    }
    h1, h2, h3, h4{
      font-family: 'Open Sans', sans-serif;
    }
    .clr{
      clear: both;
    }
    .pdf{
      /*width: 650px;*/
      width: 680px;
      height: 845px;
      border: solid 2px;
      margin: 10% auto;
    }
    .left{
      width: 48.7%;
      float: left;
      border-right: solid 2px;
      height: 100%;
    }
    .right{
      width: 48.8%;
      float: left;
      border-left: solid 2px;
      height: 100%;
    }
    .cntr{
      float: left;
      height: 100%;
      border-left: dashed 1px #555;
      margin: 0 5px;
    }
    img{
      width: 100%;
    }
    .img4{
      border-bottom: solid #e70000;
    }
    p{
      font-size: 12px;
      text-align: center;
      margin: 0;
    }
    .rtt{
      float: left;
      width: 15%;
    }
    .rtt_rt{
      float: left;
        width: 146%;
        padding-left: 18%;
        margin-top: -10%;
    }
    .rtt p, .brcd p{
      transform: rotate(90deg);
      margin-top: 25px;
      font-size: 9px;
      font-weight: bold;
    }
    ul li{
      font-size: 10px;
      list-style: none;
      line-height: 11px;
    }
    ul{
      padding: 0;
      margin-top: 5px;
    }
    .vld{
      float: left;
      width: 52%;
      text-align: right;
    }
    .brcd{
      float: left;
      width: 26%;
      background: url("images/q.jpg") no-repeat;
      background-size: 50px;
      margin-top: 100px;
      padding-left: 15px;
      background-position-x: center;
    }
    .brcd.print {
        display: list-item;
        list-style-image: url("images/q.jpg");
        list-style-position: inside;
    }
    .prnt{
        position: absolute;
        margin-top: -60px;
    }
    .vld img{
      width: 125px;
    padding-top: 75px;
    }
    h4 span, h2 span{
      color: #e70000;
    }
    h4{
      font-size: 14px;
      text-align: center;
      padding-top: 20px;
      margin: 0;
    }
    h3{
      margin: 0 0 4px;
      text-align: center;
    }
    h3 span{
      border-bottom: solid 0;
    }
    h2{
      text-align: center;
      font-size: 18px;
      letter-spacing: 1px;
      font-weight: 500;
      margin: 0;
      border-bottom: solid #e70000;
    }
    .img2{
      border-top: dashed 1px;
      margin-top: 5px;
      padding: 5px 0;
    }
    .a_lft{
      width: 20%;
      float: left;
      padding: 0 15px;
    }
    .a_rgt{
      width: 68%;
      float: left;
    }
    .a_rgt ul{
      margin-top: 0;
      margin-bottom: 0;
    }
    .a_rgt img{
        width: 75px;
        float: right;
        position: absolute;
        margin: 25px 140px 0;
    }
    .adhr h2{
      font-size: 14px;
      border-top: solid #e70000 2px;
      border-bottom: 0;
    }
    .adhr p{
      font-size: 10px;
    }
    .adhr h3{
      font-size: 16px;
    }
    .img6{
      border-top: solid #e70000 2px;
      padding-top: 3px;
    }
    .adhr .brcd {
      width: 5%;
    }
    .adhr .brcd p {
        font-size: 6px;
        margin-top: 10px;
    }
    .b_rgt{
      width: 36%;
      float: right;
    }
    .b_lft{
      width: 64%;
      float: left;
    max-height: 112px;
    margin-top: -2%;
    }
    .adhr2 ul li{
      font-size: 10px;
      line-height: 10px;
    }
    .adhr2 ul{
      padding: 0;
      margin: 0;
      margin-bottom: 8px;
      margin-left: 10px;
    }
    .adhr2 ul li span{
      font-weight: bold;
    }
    .blank{
      min-height: 124px;
    }
    .adhr h3 span{
      border-bottom: solid 0px;
    }
    .cut{
      width: 12px;
      position: absolute;
      padding: 2px 0px 0px 5px;
    }
    .cut2{
      position: absolute;
      width: 8px;
      margin: 8px 0 0 -4px;
    }
    .brcd h5{
      margin: 0;
      font-weight: normal;
      font-size: 12px;
    }
    .brcd ul li{
      font-size: 7px;
      line-height: 8px;
    }
    .one{
        height: 500px;
    }
    .two{
        height: 110px;
    }
     .three{
        height: 185px;
    }
    .rtt_rt ul{
        width: 45%;
    }
    .info h4{
        color:#f60000;
        letter-spacing: .5px;
        text-transform: uppercase;
        font-size: 12px;
        padding-top: 10px;
    }
    .info ul li, .info2 ul li{
        font-size: 11px;
        line-height: 16px;
    }
    .info ul li span, .info2 ul li span{
        color:#f60000;
    }
    .info2 ul li{
        padding: 4px 0;
    }
    .info2, .info{
        padding: 0 20px;
    }
    .info li::before, .info2 li::before {
      content: "■";
      color: #D60F26;
      font-size: 12px;
      padding-right: 5px;
    }
    .info2 ul{
        border: solid 1px #666;
        padding: 5px;
    }
    .info2{
        padding: 0 15px;
    }
    .info2 ul li .brk, .info ul li .brk{
        color: #333;
        padding-left: 12px;
    }
    .img7{
        border-top: solid #e70000 2px;
        height: 18px;
        padding-top: 2px;
    }
    </style>

    <body>
        <div class="pdf">
            <div class="left">
                <div class="one">
                    <img src="images/odi1.jpg">
                    <p> ନାମାକଂନ କ୍ରମାକଂ / Enrolment No: <?php echo $b['srno']?> </p>
                    <div class="rtt">
                        <p>Download&nbsp;Date:&nbsp;<?php echo date('d/m/Y')?></p>
                        <div class="clr"></div>
                    </div>
                    <div class="rtt_rt">
                        <ul>
                            <li>To</li>
                            <li><?php echo $b['localname']?></li>
                            <li><?php echo $b['aadharname']?></li>
                            <li><?php echo $b['fulladdress']?></li>
                        </ul>
                        <div class="clr"></div>
                    </div>

                    <div class="rtt">
                        <p style="margin-top: 77px;">Generation&nbsp;Date:&nbsp;<?php echo date('d/m/Y')?></p>
                        <div class="clr"></div>
                    </div>
                    <div class="brcd print">
                        <div class="prnt">
                            <h5>Signature Valid</h5>
                            <ul>
                                <li>Digitally signed by DS</li>
                                <li>UNIQUE IDENTIFICATION</li>
                                <li>AUTHORITY OF INDIA 03</li>
                                <li>Date: 2019.05.23 03:02:17</li>
                                <li>IST</li>
                            </ul>
                        </div>
                        <div class="clr"></div>
                    </div>
                    <div class="vld">
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
   $book1= $simplexml->addChild('book',"<PrintLetterBarcodeData uid=&quot;".$b['aadharno']."&quot; name=&quot;".$b['aadharname']."&quot; gender=&quot;".$b["gender"]."&quot; dob=&quot;".$b['dob']."&quot; co=&quot;".$b['fathername']."&quot; po=&quot;".$b['vtcandpost']."&quot; address=&quot;".$b['fulladdress']."&quot; pc=&quot;".$b['pincode']."&quot;/>");
   $str='<?xml version="1.0" encoding="UTF-8"?>'.$book1;
   $codeContents = $str;
?>
                        <img src='https://chart.googleapis.com/chart?chs=140x140&cht=qr&chl=<?php echo $codeContents;?>' title="" />
                        <div class="clr"></div>
                    </div>

                    <div class="clr"></div>

                </div> <!--one-->

                <div class="two">
                    <h4>ଆପଣଙ୍କ   <span>ଆଧାର  </span> ସଂଖ୍ଯା  / Your <span>Aadhaar</span> No. :</h4>
                    <h3><span><?php echo $b['originalaadharno']?></span></h3>
                     <h2>ମୋ   <span>ଆଧାର,  </span>ମୋ ପରିଚୟ </h2>

                </div>  <!--two-->

                <div class="adhr">
                    <img src="img/cut.png" class="cut">
                    <div class="three">
                        <img src="images/odi2.jpg" class="img2">
                        <div class="a_lft">
        <?php if ($b['filetype']=="SSO"){ ?>
                        <img src="data:image/jpeg;base64,<?php echo $b['imgcode']?>" />
        <?php } elseif ($b['filetype']=="dbt"){ ?>
                        <img src="<?php echo $b['imagepathoriginal']?>" />
        
        <?php } else {?>
                         <img src="../<?php echo $b['imagepathoriginal']?>" />
        <?php } ?>
                        </div>
                        <div class="a_rgt">
                            <ul>
                                <li><?php echo $b['localname']?></li>
                                <li><?php echo $b['aadharname']?></li>
                                <li><?php echo $b['dobinlocal'].' / '.'DOB : '?><?php echo $b['dob']?></li>
                                <li><?php echo $b['sexinlocal'].' / '?><?php echo $b['gender']?></li>
                            </ul>
                            <img src='https://chart.googleapis.com/chart?chs=140x140&cht=qr&chl=<?php echo $codeContents; ?>' >
                        </div>
                    </div>  <!--three-->
                    <h3><span><?php echo $b['originalaadharno']?></span></h3>
                    <!-- <h2>मेरा <span>आधार</span>, मेरी पहचान</h2> -->
                    <img src="images/Oriya.jpeg" class="img7">
                </div>

                <div class="clr"></div>
            </div>
            <div class="cntr">
                <img src="img/cut2.png" class="cut2">
                <div class="clr"></div>
            </div>
            <div class="right">
                <div class="one">
                    <img src="img/4.jpg" class="img4">

                    <div class="info">
                         <h4>ସୂଚନା</h4>
          <ul>
              <li><span>ଆଧାର</span>  ପରିଚୟ ପ୍ରମାଣ ଅଟେ, ନାଗରିକତାର ନୁହେଁ</li>
              <li>ପରିଚୟ ପ୍ରତିଷ୍ଟା ପାଇଁ,ଅନଲାଇନ୍‌ ରେ ପ୍ରମାଣିକରଣ କରନ୍ତୁ</li>
              <li>ଏହା ଇଲୋକଟ୍ରୋନିକ ପ୍ରକ୍ରୀୟା ଦ୍ବାରା ଉପୂପନ୍ନ କରାଯାଇଥିବା ଚିଠି ଅଟେ</li>
          </ul>
                        <h4>Information</h4>
                        <ul>
                            <li><span><b>Aadhaar</b></span> is a proof of identity, not of citizenship.</li>
                            <li>To establish identity, authenticate online.</li>
                            <li>This is electronically generated letter.</li>
                        </ul>
                    </div>
                    <div class="info2">
                        <ul>
                            <li><span>ଆଧାର</span>  ସାରାଦେଶରେ ବୈଧ ।</li>
              <li>ଭବିଷ୍ୟତରେ ଏହି <span>ଆଧାର</span> ସମସ୍ତ ସରକାରୀ ଓ ବେସରକାରୀ<br><span class="brk"> ସେବା ପ୍ରାପ୍ତ କରିବାରେ ସାହାୟକ ହେବେ ।</span></li>
                            <li><span>Aadhaar</span> is valid throughout the country.</li>
                            <li><span>Aadhaar</span> will be helpfull in availing Government <br><span class="brk">and Non-Government services in future.</span></li>
                        </ul>
                    </div>

                </div> <!--one-->
                <div class="two"></div>

                <div class="adhr adhr2">
                    <img src="img/cut.png" class="cut">
                    <div class="three">
                        <img src="images/odi3.jpg" class="img2">
                        <div class="b_lft">
                            <ul>
                                <li><span>ଠିକଣା:</span></li>
                                <li><?php echo $b['localaddress']?></li>
                            </ul>
                            <ul>
                                <li><span>Address:</span></li>
                                <li><?php echo $b['fulladdress']?></li>
                            </ul>
                        </div>
                        <div class="b_rgt">
                            <img src='https://chart.googleapis.com/chart?chs=140x140&cht=qr&chl=<?php echo $codeContents; ?>' >
                        </div>

                        <div class="clr"></div>
                    </div>  <!--three-->
                    <h3><span><?php echo $b['originalaadharno']?></span></h3>
                    <img src="img/6.jpg" class="img6">
                </div>

                <div class="clr"></div>
            </div>
            <div class="clr"></div>
        </div>
    </body>
</html>