<?php
include '../../../includes/config.php';
error_reporting(0);

if(isset($_GET['id'])){
//$searchid =$_GET['searchid'];
$searchid = mysqli_real_escape_string($conn,$_GET['id']);
$ecode = mysqli_real_escape_string($conn,$_GET['ecode']);

mysqli_set_charset($conn,"utf8");
$a = mysqli_query($conn,"SELECT * FROM birthmanual Where id='".$searchid."'");
$b = mysqli_fetch_array($a);
}
?>

<html>

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <title>Civil Registration System</title>
    <style>
        body
    {
padding: 0.5em;
    }
        p{
            font-size: 11px;
        }
    </style>
    </head>
    <body>
        <style type = "text/css">
  @media print {
    body{
        width: 21cm;
        height: 29.7cm;
        margin: 0mm;
        /* change the margins as you want them to be. */
   } 
}
</style>
        
        <div style="border:4px double gray;">
              
       <center>  <img src="2.PNG"/ width="80px;" style="padding-top: 5px;"></center> 
     <img src="1.png"/ style="float: left; padding: 20px;" width="70px;"> 
    <img src="3.PNG"/ style="float: right;padding: 20px;" width="70px;">
<b style="color:#0d0d57; text-align: center; font-weight: bold"><p> <b> उत्तर प्रदेश सरकार     </b> <br/>  
            GOVERNMENT OF UTTAR PRADESH
    </p>
    <p style="margin-top:-10px">

              
       चिकित्सा और स्वास्थ्य विभाग<br/> 
       DEPARTMENT OF MEDICAL AND HEALTH
     </p>    
     <p style="margin-top:-5px">
  जिला चिकित्सालय, सिविल लाइन्स, मुरादाबाद<br/>
    DISTRICT HOSPITAL, CIVIL LINES, MORADABAD<br/> 
         </p>
    
        <p> <b style="color:#076a07;font-size: 13px;" > जन्म प्रमाण-पत्र <br/> 
      BIRTH CERTIFICATE  <br>
    <br>
    </b>
     </p>
            </b>
        
        <div style="font-size:11px; margin-left: 10px;">
        
      
             <p>
                ( जन्म और मृत्यु रजिस्ट्रीकरण अधिनियम, 1969 की धारा 12/17 और उत्तर प्रदेश जन्म मृत्यु रजिस्ट्रीकरण नियम 8/13 के अंतर्गत जारी किया गया)
                 
                <br>
       (ISSUED UNDER SECTION 12/17 OF THE REGISTRATION OF BIRTHS & DEATHS ACT, 1969 AND RULE 8/13 OF THE UTTAR PRADESH REGISTRATION OF
BIRTHS & DEATHS RULES 2002)
 
</p>            
            <p> यह प्रमाणित  किया जाता है निम्नलिखित सुचना जन्म के मूल  साभिलेख से ली  गई है जो की जिला चिकित्सालय, सिविल लाइन्स, मुरादाबाद  तहसील मुरादाबाद जिला मुरादाबाद राज्य / संघ प्रदेश उत्तर प्रदेश , भारत के रजिस्टर में उल्लिखित है। 
            <br>THIS IS TO CERTIFY THAT THE FOLLOWING INFORMATION HAS BEEN TAKEN FROM THE ORIGINAL RECORD OF BIRTH WHICH IS THE REGISTER
FOR DISTRICT HOSPITAL, CIVIL LINES, MORADABAD OF TAHSIL/BLOCK MORADABAD OF DISTRICT MORADABAD OF STATE/UNION TERRITORY
UTTAR PRADESH, INDIA. </p>
        </div>
        <table style="padding-top: 1px; width:95%; margin-left: 10px;">
            <td style="width: 55%; padding-top:30px" >
        <p>नाम/ NAME : <?php echo strtoupper($b['name']) ; ?></p>
              <p>जन्म तिथि | DATE OF BIRTH: 
                 <br>
                  <?php echo $b['dob'] ; ?><br> 
                  <?php echo  strtoupper($b['dobwords']); ?>  </p>
            <p>माता का नाम / NAME OF MOTHER:  <br/> <?php echo strtoupper($b['mname'] ); ?> 
        </p>
             <p>आधार नंबर  / MOTHER'S AADHAAR NO :<br/>
             <?php if($b['maadhar'] != "") { ?>
             XXXXXXXX<?php echo substr($b['maadhar'], -4); ?></p>
             <?php } else { ?>
             &nbsp; 
             <?php } ?>
             <p style="height:57px">बच्चे के जन्म के समय माता - पिता का पता | ADDRESS OF PARENTS AT THE TIME OF BIRTH OF THE CHILD :<br/>  <?php echo strtoupper($b['birthaddress'] ); ?> </p>
           
                <p>पंजीकरण  संख्या / REGISTRATION NUMBER:<br> <?php echo strtoupper($b['regno'] ); ?>  </p>
                <p>टिप्पणी / REMARKS (IF ANY):  <br>


                ----  </p>

                <p style="margin-top:40px"> जारी होने की तिथि / DATE OF ISSUE :<br/> <?php echo strtoupper($b['dateofissue'] ); ?>  
                </p>   
                <br>
                   <p >UPDATED ON :<br/> <?php echo strtoupper($b['updatedate'] ); ?>
 </p>   
                 <img src="http://api.qrserver.com/v1/create-qr-code/?color=000000&amp;bgcolor=FFFFFF&amp;data=http%3A%2F%2Fcrsorg.in%2Fweb%2Findex.php%2Fauth%2FbirthCertificate%2Fview%2Fcert.php%3Fid%3D<?php echo $_GET['id'] ; ?>%26cont%3DAnjsjdn&amp;qzone=1&amp;margin=0&amp;size=400x400&amp;ecc=L" width="65px;" height="65px" />
             
            </td>
            <td>
                <div style="margin-top: -70px" width="140%"  >
             <p>लिंग / SEX :   <?php echo strtoupper($b['gender'] ); ?></p>
          <p></p>
           <p style="height: 40px">जन्म स्थान / PLACE OF BIRTH :
            <br>   
          <?php echo  strtoupper($b['placeofbirth']) ; ?> </p>
            <p>पिता का नाम / NAME OF FATHER :<br/>   <?php echo strtoupper($b['fname'] ); ?></p>
           <p>आधार नंबर  / FATHER'S AADHAAR NO:<br/>
             <?php if($b['faadhar'] != "") { ?>
             XXXXXXXX<?php echo substr($b['faadhar'], -4); ?></p>
             <?php } else { ?>
             &nbsp; 
             <?php } ?>
           
           </p>
          <p style="height:57px">माता - पिता का स्थाई पता/ PERMANENT ADDRESS OF PARENTS: <br> <?php echo $b['permanentaddress'] ; ?></p>
              <p >पंजीकरण तारीख  / DATE OF REGISTRATION: <br/> <?php echo strtoupper($b['dateofregister'] ); ?> </p>
          <div style="text-align: center; margin-top:20px;">
                <img src="2.jpg" / width="60px; height:50px"><br />
              
            <p style="font-size: 11px;">जारी करने वाला प्राधिकारी  /  ISSUING AUTHORITY :</p>
        
              <img src="5.png" / width="300px;" >
              
              </div>
           
          
               </div>
            </td>
        </table>
        <br/>
        <p style="margin:20px;color: #0d0d57 ;text-align: center;">"THIS IS A COMPUTER GENERATED CERTIFICATE WHICH CONTAINS FACSIMILE SIGNATURE OF THE ISSUING AUTHORITY"<br/> " THE GOVT. OF INDIA VIDE CIRCULAR NO. 1/12/2014-VS(CRS) DATED 27-JULY-2015 HAS <br/>APPROVED THIS CERTIFICATE AS A VALID LEGAL DOCUMENT FOR ALL OFFICIAL PURPOSES". </p>
        <b><p style="color: darkgreen; margin-left: 80px;" >"प्रत्येक जन्म एवं मृत्यु का पंजीकरण सुनिश्चित करें " /   ENSURE REGISTRATION OF EVERY BIRTH AND DEATH "</p></b>
        
        
        <center><img alt=""
                                                          src="http://bwipjs-api.metafloor.com/?bcid=code39ext&text=<?php echo rand(00000,999999);?>"
                                                          style="width:300px;height:30px"></center>
      
     <br/>
    </div>
            
    </body>
<script>

    window.onafterprint = function(e){
        $(window).off('mousemove', window.onafterprint);
        console.log('Print Dialog Closed..');
    };

    window.print();

    setTimeout(function(){
        $(window).one('mousemove', window.onafterprint);
    }, 1);

</script>

</html>