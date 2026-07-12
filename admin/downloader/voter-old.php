<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
   require 'mpdf/vendor/autoload.php';
   require 'codepitch/autoload.php';
   
   
   $voter = codepitch_get_row('voterids',array('id'=>$_GET['id']));
   
   $voter = (object) $voter;
   $idno = $voter->epic_number; 
      
$html = '
<html>
<head>
<style>


.barcode {
	padding:.5mm;
	margin: 0;
	vertical-align: top;
	color: #000000;
        
}

.barcodecell {
	text-align: right;
	vertical-align: top;
	padding: 0;
}

</style>
</head>
<body style="font-family:yog;font-size:12px;" >
<table style="padding-top:50"> <tr>

<td class="barcodecell"><barcode code="'.$idno.'"  type="C128B" class="barcode"   size=".4" />
    </td><td><b>'.$idno.'</b></td></tr></table>
    <div align="center"><img src="'.$voter->image.'" style="height:110;"    /></div>
        <table>
<tr style="font-family:mangal";><td style="font-family:mangal";>नाम</td><td>:</td><td style="font-family:mangal;">'.$voter->name_regional.'</td>
    <tr><td style="font-family:arial">Name</td><td>:</td><td style="font-family:arial">'.$voter->name.'</td>
<tr><td style="font-family:mangal";>'.(($voter->relation_name == 'father')?"पिता<br>का नाम":"पति<br>का नाम").'</td><td>:</td><td style="font-family:mangal";>'.$voter->father_name_regional.'</td>
    <tr><td style="font-family:arial">'.(($voter->relation_name == 'father')?'Father':'Husband').'<br>Name</td><td>:</td><td style="font-family:arial">'.$voter->father_name.'</td>
</tr>
</table>

 






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




<div style="font-size:9px;"><span style="font-family:mangal">लिंग</span>/Sex :<span style="font-family:mangal">'.(($voter->gender == "Male")?'पुरुष':'महिला').'</span>/'.$voter->gender.'</div><div style="font-size:9px;font-family:mangal;padding-top:-7px">जन्म तिथि /आयु : <span style="font-family:arial">'.$age.'</span><br><div style="font-family:arial;padding-top:-5px;">Date of Birth/Age</div><div style="font-size:9px;font-family:mangal;padding-top:-6px">पता :म०न० - '.$voter->house_r.','.$voter->original_address_r.',</div> <div style="font-size:9px;font-family:mangal;padding-top:-8px">थाना-'.$police_r.',तहसील-'.$tehsil_r.'</div><div style="font-size:8px;font-family:mangal;padding-top:-8px">जिला-'.$voter->district_regional.',पिन कोड-'.$voter->pincode.'</div><div style="font-size:8px;font-family:arial;padding-top:-5px">Address-H.No. '.$voter->house.','.$voter->original_address.'</div><div style="font-size:8px;font-family:arial;padding-top:-3px">Police Station-'.$Police.',Tahsil-'.$tehsil.'<div style="font-size:8px;font-family:arial;padding-top:-2px">Distt.-'.$voter->district.',Pin Code-.'.$voter->pincode.'     </div>
    
    
    <div align="right" style="padding-top:-15" ><img src="'.$voter->ec_sign.'"    /></div>
    <div align="right" style="font-size:6px;padding-right:5px;font-family:mangal">निर्वाचक रजिस्ट्रीकरण अधिकारी</div><div align="right" style="font-size:7px;padding-right:5px;padding-top:0px">Electoral Registration Officer</div>     


    <div style="font-size:8px;padding-top:-10px"><span style="font-family:mangal">तारीख</span>/Date :'.date('d/m/Y').'</div><div style="font-size:8px;font-family:arial;padding-left:120px;padding-top:-10px"></div>     
<div style="font-size:8px;font-family:arial;padding-top:-2px"><br>         
    <div style="font-size:8px;font-family:mangal;padding-top:-5px">विधान सभा निर्वाचन क्षेत्र संख्या और नाम:</div><div style="font-size:8px;font-family:mangal;padding-top:-6px">'.$voter->assembly_consituency_r.'<div style="font-size:8px;font-family:arial;padding-top:-5px">Assembly Constituency No. & Name: <div style="padding-top:-3px">'.$voter->assembly_consituency.'</div><div style="font-size:8px;font-family:mangal;padding-top:-5px">भाग संख्या और नाम:&nbsp;'.$voter->bhag_sankhya.'&nbsp;'.$voter->bhag_name_r.'</div>
    <div style="font-size:8px;font-family:arial;padding-top:-5px">Part No. & Name.:&nbsp;'.$voter->bhag_sankhya.'&nbsp;'.$voter->bhag_name.'</div>



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
'margin_right' =>0,
'margin_top' =>2,
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
$pdf->Output(); 
//echo $html.$html1; 
