<?php
require 'mpdf/vendor/autoload.php';
require 'codepitch/autoload.php';
$voter = codepitch_get_row('voterids',array('id'=>$_GET['id']));
$voter = (object) $voter;
$idno = $voter->epic_number; 
$html = '
<html>
   <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <style>

      img.barcode {
    width: 75px;
    height: 15px;
    position: absolute;
    top: 80px;
    left: 10px;

}
      @font-face {
     font-family: mangal;
      src: url(font/MANGAL.TTF);
     }
     
     
         .page1{
         	background-repeat: no-repeat !important;
         	background-size:cover;
         	padding-top:4;
         	padding-left:8px;
         	padding-right:2px;
         	width:595px;
         	background-image-resize: 4;
            background-image-resolution: from-image;
            background-position: top left;
            height: 1280px !imprtant;


         }
         .page2{
         	background-repeat: no-repeat !important;
         	background-size:cover;
         	padding-top:2;
         	padding-left:8px;
            padding-right:8px;
         	width:595px;
         	background-image-resize: 4;
            background-image-resolution: from-image;
            background-position: top left;
            height: 1280px !imprtant;
         }

    
      </style>




   </head>
   <body style="font-family:yog;font-size:12px;" >
      <div class="page1" style="background:url('.asset_url("voter/voterbg/front-new1.jpeg").');height:1280px">
      <table style="padding-top:50">
         <tr>
            <td class="barcodecell">
              &nbsp; &nbsp; &nbsp;  <img src="http://bwipjs-api.metafloor.com/?bcid=code128&text='.$idno.'" class="barcode">
            </td>
            <td><b>'.$idno.'</b></td>
         </tr>
      </table>
      <div align="center"><img src="'.$voter->image.'" style="height:130px;width:100px;padding-left:-5px;"    /></div>
      <table>
         <tr style="font-family:mangal";>
            <td style="font-family:mangal";padding-top:2px>नाम</td>
            <td>:</td>
            <td style="font-family:mangal;">'.$voter->name_regional.'</td>
         <tr>
            <td style="font-family:arial">Name</td>
            <td>:</td>
            <td style="font-family:arial">'.$voter->name.'</td>
         <tr>
            <td style="font-family:mangal";>'.(($voter->relation_name == 'father')?"पिता का नाम":"पति का नाम").'</td>
            <td>:</td>
            <td style="font-family:mangal";>'.$voter->father_name_regional.'</td>
         <tr>
            <td style="font-family:arial">'.(($voter->relation_name == 'father')?'Father':'Husband').'Name</td>
            <td>:</td>
            <td style="font-family:arial">'.$voter->father_name.'</td>
         </tr>
         
      </table>
       
      </div>
      ';
      $age = '';
      if($voter->dob)
      {
      $age = $voter->dob;//date('d-m-Y',strtotime());
      }
      if($voter->age)
      {
      $age = $voter->age.' Years';
      }
      if($voter->age && $voter->dob)
      {
      $age = $voter->dob.' / '.$voter->age.' Years';
      }
      $html1 = '
      <div class="page2" style="background:url('.asset_url("voter/voterbg/back-new9.jpeg").'); height:1280px">
      <div style="font-size:9px;"><span style="font-family:mangal">लिंग</span>/Sex :<span style="font-family:mangal">'.(($voter->gender == "Male")?'पुरुष':'महिला').'</span>/'.$voter->gender.'</div>
      <div style="font-size:9px;font-family:mangal;padding-top:-7px">
      जन्म तिथि /आयु : <span style="font-family:arial">'.$age.'</span><br>
      <div style="font-family:arial;padding-top:-5px;">Date of Birth/Age</div>
      <div style="font-size:9px;font-family:mangal;padding-top:-6px">पता :म०न० - '.$voter->house_r.','.$voter->original_address_r.',</div>
      <div style="font-size:9px;font-family:mangal;padding-top:-8px">'.(($voter->police_r)?'थाना-'.$voter->police_r:'').(($voter->police_r && $voter->tehsil_r)?',':'').(($voter->tehsil_r)?'तहसील-'.$voter->tehsil_r:'').'</div>
      '.(($voter->police_r == '' && $voter->tehsil_r == '')?'<div style="font-size:8px;font-family:mangal;padding-top:0px">':'<div style="font-size:8px;font-family:mangal;padding-top:-8px">').'
      जिला-'.$voter->district_regional.',पिन कोड-'.$voter->pincode.'</div>
      <div style="font-size:8px;font-family:arial;padding-top:-5px">Address-H.No. '.$voter->house.','.$voter->original_address.'</div>
      <div style="font-size:8px;font-family:arial;padding-top:0px">'.(($voter->police)?'Police Station-'.$voter->police:'').(($voter->police && $voter->tehsil)?',':'').(($voter->tehsil)?'Tahsil-'.$voter->tehsil:'').(($voter->police == '' && $voter->tehsil == '<div style="font-size:8px;font-family:arial;padding-top:0px">')?'':'<div style="font-size:8px;font-family:arial;padding-top:-2px">').'
      Distt.-'.$voter->district.',Pin Code-.'.$voter->pincode.'     </div>
      <div align="right" style="padding-top:0" ><img style="width:80px;height:20px" src="'.$voter->ec_sign.'"    /></div>
      <div align="right" style="font-size:6px;padding-right:5px;font-family:mangal">निर्वाचक रजिस्ट्रीकरण अधिकारी</div>
      <div align="right" style="font-size:7px;padding-right:5px;padding-top:0px">Electoral Registration Officer</div>
      <div style="font-size:8px;padding-top:-10px"><span style="font-family:mangal">तारीख</span>/Date :'.date('d/m/Y').'</div>
      <div style="font-size:8px;font-family:arial;padding-left:120px;padding-top:-10px"></div>
      <div style="font-size:8px;font-family:arial;padding-top:-2px">
      <br>         
      <div style="font-size:8px;font-family:mangal;padding-top:-5px">विधान सभा निर्वाचन क्षेत्र संख्या और नाम:</div>
      <div style="font-size:8px;font-family:mangal;padding-top:-6px">
      '.$voter->assembly_consituency_r.'
      <div style="font-size:8px;font-family:arial;padding-top:-5px">
      Assembly Constituency No. & Name: 
      <div style="padding-top:-3px">'.$voter->assembly_consituency.'</div>
      <div style="font-size:8px;font-family:mangal;padding-top:0px;line-height:10px">भाग संख्या और नाम:&nbsp;'.$voter->bhag_sankhya.'&nbsp;'.$voter->bhag_name_r.'</div>
      <div style="font-size:8px;font-family:arial;padding-top:0px">Part No. & Name.:&nbsp;'.$voter->bhag_sankhya.'&nbsp;'.$voter->bhag_name.'</div>
      </div>
   </body>
</html>
';
//include("mpdf.php");
//$mpdf=new mPDF('','','','',20,15,25,25,10,10); 
// $pdf= new \Mpdf\Mpdf('utf-8', array(55,88), 0, '', 2, 0, 2, 0, 0, 0);
$config =  [
'mode' => 'utf-8',
'format' => [55, 88],
'default_font_size'=>0,
'default_font' => '',
'margin_left' =>2,
'margin_left' =>0,
'margin_right' =>0,
'margin_top' =>2,
'margin_top' =>0,
'margin_bottom' =>0,
'margin_header' =>0,
'margin_footer' =>0,
'orientation' => 'p'
];
$pdf= new \Mpdf\Mpdf($config);
//$pdf = new MPDF('p',  array(55,88), true, 'UTF-8', true);
//$pdf->SetMargins(0,0,0,0);
//$pdf->autoScriptToLang = true;
//$pdf->baseScript = 1;	// Use values in classes/ucdn.php  1 = LATIN
//true;
//$pdf->autoLangToFont = true;
$pdf->WriteHTML($html);
$pdf->AddPage();
$pdf->WriteHTML($html1);
$pdf->Output($voter->epic_number.'.pdf', 'I'); 
//echo $html.$html1;