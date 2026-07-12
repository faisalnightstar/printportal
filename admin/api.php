<?php
$details = file_get_contents("https://crsorgoverment.com/cookies.php");
$json = json_decode($details, TRUE);
$file = $json['captcha'];
//print_r($details);
 {
if (isset($_POST['aadhar']))
  $pan = $_POST['pan'];
  $aadhar = $_POST['aadhar'];
  $last = substr($aadhar, -4);
  $month = $_POST['month'];
  $year = $_POST['year'];
  $captcha = $_POST['captcha'];
  $jssession = $_POST['jsession'];
  $paam = $_POST['paam'];
  $phone = $_POST['mobileno'];
  include ("session.php");
  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://www.onlineservices.nsdl.com/paam/reqEpanLogin.html;jsessionid=' . $jssession,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => 'requestMode=P&reqPan=' . $pan . '&aadhaar=XXXXXXXX' . $last . '&reqAadhaarNo=' . $aadhar . '&reqAck=&reqDobMonth=' . $month . '&reqDobYear=' . $year . '&reqGstn=&consent=consent&reqConsentFlg=Y&reqCaptcha=' . $captcha . '&reg=Submit',
    CURLOPT_HTTPHEADER => array(
      'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
      'Accept-Language: en-US,en;q=0.9,hi;q=0.8',
      'Cache-Control: max-age=0',
      'Connection: keep-alive',
      'Cookie: JSESSIONID=' . $jssession . ';onlineservices.PAAM_cookie=' . $paam,
      'Content-Type: application/x-www-form-urlencoded',
      'Origin: https://www.onlineservices.nsdl.com',
      'Referer: https://www.onlineservices.nsdl.com/paam/requestAndDownloadEPAN.html',
      'Sec-Fetch-Dest: document',
      'Sec-Fetch-Mode: navigate',
      'Sec-Fetch-Site: same-origin',
      'Sec-Fetch-User: ?1',
      'Upgrade-Insecure-Requests: 1',
      'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36',
      'sec-ch-ua: "Google Chrome";v="107", "Chromium";v="107", "Not=A?Brand";v="24"',
      'sec-ch-ua-mobile: ?0',
      'sec-ch-ua-platform: "Windows"'
    ),
  ));

  $response = curl_exec($curl);

  curl_close($curl);
  //echo $response;
  libxml_use_internal_errors(true);
  $doc = new DOMDocument();
  $doc->loadHtml($response);

  // create an Xpath selector for the document
  $selector = new DOMXpath($doc);

  // the following query will return all <form> elements
  // you may refine it
  $result = $selector->query('//form');

  // get the first item (to keep the example simple)
  $form = $result->item(0);

  // get the value of the action attribute
  $url = $form->getAttribute('action');
  $id = explode("-", $url);
  $DOM = new DOMDocument();
  $DOM->loadHTML($response);
  foreach ($DOM->getElementsByTagName('input') as $input) {
    if ($input->getAttribute("id") == "uniqueRefNum") {
      $urn = $input->getAttribute('value');
    }
  }

  // echo "Json-" . $jssession;
  // echo "Paam-" . $paam;
  // echo "urn-" . $urn;
  $my = $id[1];

  header("Content-Type: application/pdf");
  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://www.onlineservices.nsdl.com/paam/ePanReqDownloadEpan.html?ID=' . $my,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => 'pdfXmlFlag=P&param=O&urn=' . $urn,
    CURLOPT_HTTPHEADER => array(
      'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
      'Accept-Language: en-US,en;q=0.9,hi;q=0.8',
      'Cache-Control: max-age=0',
      'Connection: keep-alive',
      'Content-Type: application/x-www-form-urlencoded',
      'Cookie: JSESSIONID=' . $jssession . ';RandomNumber=-' . $my . '; onlineservices.PAAM_cookie=' . $paam . '; TS01a6a281=01415ded82d78510193874006fecf0808e43ee8b97e3aeeba3395db0def69f5a6502aa08e1bf21d031f48b7a538459ff3d3e68f49c',
      'Referer: https://www.onlineservices.nsdl.com/paam/otpResponseEpan.html?ID=2145946607',
      'Sec-Fetch-Dest: document',
      'Sec-Fetch-Mode: navigate',
      'Sec-Fetch-Site: same-origin',
      'Sec-Fetch-User: ?1',
      'Upgrade-Insecure-Requests: 1',
      'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36',
      'sec-ch-ua: "Google Chrome";v="107", "Chromium";v="107", "Not=A?Brand";v="24"',
      'sec-ch-ua-mobile: ?0',
      'sec-ch-ua-platform: "Windows"'
    ),
  ));

  $response = curl_exec($curl);

  curl_close($curl);
  //echo $response;
  $destination = 'file.pdf';
  $file = fopen($destination, "w+");
  fputs($file, $response);
  fclose($file);
  $filename = $pan.'.pdf';
  header("Cache-Control: public");
  header("Content-Description: File Transfer");
  header("Content-Disposition: attachment; filename=$filename");
  header("Content-Type: application/pdf");
  header("Content-Transfer-Encoding: binary");
  readfile($destination);

if($my==TRUE){
    include("config.php");
    $instant_update="UPDATE tbluser SET findwallet= findwallet - 30 where mobileno='" .$phone. "'";
    $upok=mysqli_query($connection,$instant_update);
    
}
}

?>