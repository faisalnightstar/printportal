<?php

 function get_view_state()
   {
      $ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"http://ssdm.mp.gov.in/CandidateRegMultiple.aspx");

$headers = array();
$headers[] = "Host: ssdm.mp.gov.in";
$headers[] = "User-Agent: Mozilla/5.0 (Windows NT 6.1; rv:70.0) Gecko/20100101 Firefox/70.0";
$headers[] = "Content-Type: application/x-www-form-urlencoded";
//$headers[] = "Content-Length: 10881";
$headers[] = "Origin: http://ssdm.mp.gov.in";
//$headers[] = "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8";
//$headers[] = "Accept-Language: en-US,en;q=0.5";
//$headers[] = "Accept-Encoding: gzip, deflate";
//$headers[] = "Referer: http://ssdm.mp.gov.in/CandidateLogin.aspx";
//$headers[] = "Connection: keep-alive";
$headers[] = "Cookie: ASP.NET_SessionId=".get_asp_id();//; __AntiXsrfToken=db2b135e8dda408d8faa4a62f5c80cf4";
//$headers[] = "Upgrade-Insecure-Requests: 1";


/*

Accept-Language: en-US,en;q=0.5
Accept-Encoding: gzip, deflate



Connection: keep-alive
Referer: http://ssdm.mp.gov.in/CandidateReg.aspx
Cookie: ASP.NET_SessionId=um2hwim4po2hifcg2rnjzwwu
Upgrade-Insecure-Requests: 1

*/





curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
//curl_setopt($curlhandle, CURLOPT_VERBOSE, true);

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                                                   
$server_output = curl_exec($ch);




$dom = new \DOMDocument();
//$dom->loadHtml($server_output);

//$viewstate = $dom->getElementById('__VIEWSTATE');

//var_dump($viewstate);

include_once dirname(__FILE__,2).'/simple_html_dom.php';

$html = new simple_html_dom();
// Load HTML from a string

$html->load($server_output);
// Load HTML from a string
$data = array();

                                foreach($html->find('#__VIEWSTATE') as $e) 
                                {
                                 
                                   $data['__VIEWSTATE'] = $e->value;
                                }
                                foreach($html->find('#__VIEWSTATEGENERATOR') as $e) 
                                {
                                 
                                   $data['__VIEWSTATEGENERATOR'] = $e->value;
                                }
                                foreach($html->find('#__EVENTVALIDATION') as $e) 
                                {
                                 
                                   $data['__EVENTVALIDATION'] = $e->value;
                                }
                                
                                
                                
                              
   if($data){
     
      $_SESSION['viewdata'] = $data;
      return $data;
   }
   else{
    return false;
   }
       

   }

/*
   function get_asp_id()
   {

    
     
      return file_get_contents('http://aadhaarsoftware.com/code.php');
    
   }


   function get_asp_id2()
   {

    $conn = db_connect();

    $sql = "select asp_id2 from tbluser where userid = 1";

    $resp = mysqli_query($conn,$sql);

    if($resp)
    {
      $data = mysqli_fetch_array($resp);
      return $data['asp_id2'];
    }
   }


   function get_asp_id3()
   {

    $conn = db_connect();

    $sql = "select asp_id3 from tbluser where userid = 1";

    $resp = mysqli_query($conn,$sql);

    if($resp)
    {
      $data = mysqli_fetch_array($resp);
      return $data['asp_id3'];
    }
   }

   

   function viewbiostate($aadhar)
   {
       $ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"http://ssdm.mp.gov.in/CandidateReg.aspx");
$json = '__EVENTTARGET=rb_otpbio%241&__EVENTARGUMENT=&__LASTFOCUS=&__VIEWSTATE=T1BBt2PWSRyMsoQBFvaB0V9RQizowAIihfHiGfIi%2B9ZKRYSVkGcJpkXe9wzOom7bWpK5BTfSRxHmdt%2FM%2BZoTu9x0McPB4A22w8zgMlnjrKa8omG%2FkpMzrxqOmOQfDaDzK%2BvTqcFqmFsNmKNQrT4IiHpBmcWYbk1APXh4ku0%2FWlVdDeqSXIISa1f19Lc9HoPKKFiQP2ch%2FK%2FWortU8SSH3FRwQyM%2Bra2BlBfKdOpz1pZmY8W8c8sezdKwDYgYBMG5RxDehAIdYSg1YVZpnuMADd7V5Rw1XnnptBlmmB%2Ba5KBUe8Y3OFqapEdTd%2Fs4FtwaFAYUikpqvOBMoNaFRpzF23sTc2fTsy1%2BBCz9%2FPJw44%2Fr5%2FBfmdWFQoQs8ZA9yQBThk4iiC%2FGwYMrP%2BqkOFpyz73%2B39idoCHRqVUQ3hIJooMgR5drPREVS4VpnglYTfHPtZk2Wol5vQc4LGFFpd72PzLAcap%2F%2B7gaNTweDEylxAK4Yp0e1F%2BkQ6u3Eo2%2F27yTW3yaai9rzO7rtAoL8H2EJ9juPTr02P6aKYi00GQNMPdxKOuNPIf00GAffZXs1FAvAvyYHUu%2FooqKPaaDISfIbRt%2F8MXC5LbP6vzGaZFA6veQ8QcZFcQvkXzN5DZN%2Bszlxuv4t4BI3e4IJYPt3Sk3E3jg5dpLAQAhkJLSQQ%2F8ac7A1SkUa%2Fv6XWf62nWx2z56%2Ft9wEBZ3TBDaIwLCHEtPwZsAueUahePN%2BDKGirf%2BKcb4%2Fi5%2BmW6fltCOjR%2BgjEHdOWS%2Fr9LDkdSZhCKGOUG7oRyASi45NlSOn8ZRisvt3fT6agxR39bUhBeOZbVc5Fp9%2BJPSDnFUkOyzc4mseHw98wqK1qpmbuPR5h7ITmZ%2FtmK%2FwNwes%2BIv9n0eFIWtotY%2Brqf0XjvUsNyGkLAPNmJtgYewo1amDWEEOoAU45BlLO4OADa4%2FCJVUPIIHE7HeBzvGcX%2FnitQbRD%2BrbSJzbeNjLlSWf7Cv%2FLAIzQBxOOj7smkrF6NBmf07%2FFcHR2CxvaYZydxdj519J1UH%2FP6Y9dVjWjjh2Lmr7n6Hft%2F70RndV7W9d9ozpfiVjtJ1j6jIeExqjyKqXnijlS9G9kT4BoSJWcswroh9jTmAdgWj71OfX99R%2BPL2zm%2BhYRjSHBhc3CFCY3o5VHP8S%2FgieO81eBMSFmQBzObf8FlP02sOfAmrUyI7GDrokazqOr1jaNcl20CB882SqwMfDj6RF0%2FbenENdrVGBWu70VqVnkrcknXHMvL3jzuax1oYxwhkstrtMOiw3sRZeR37AZQZumXF4sF9JC8mvxetStAZCHZmQaXRf3Zb1DNy%2BiQgvg4HNEUM5QheIVxfYi6qWcEtH4M1JAasYWSSMLIgm%2BVB6ZeNTb%2BlPganmi4MO0gui6lcrHKbYNRXoJMCQ1TNIzQtaaRWoyGN0dAzB309NY0xDJKjiJavyl57jOitoJX8RhywNIReuXo%2Bn%2BEckjegZmcb94r3mOuch10Id%2BY4417g1TrLxAsHKz7plOkaUP%2F3vitIXo9Xf4juJRDZJPcT0LPQY4EIzIJEppDNl0lW5nTBXy55rXuqoMO6ri9jgcTx7RvJ7BdeuO3YpTOnNNB9KDFrOoN%2BQNVUxmDdxaBDvYpc0D1z%2BnQ479Pr8vJ4o88iKdNf0iv5oX95XWJ9dnnizkwQgSG79R9J1MvQpPjXMz%2BZJfx4%2BSZxKw4O6oGH62pXPuI3bXHnvD7MRwNZtD36sV2jqttMu9IqjVUrSyf0IXVfJbW92PbuiyQKUPGB0T76nlWbduMuLCgf1F2FvlAGfmlV%2Fbi%2Fq9IMic5kZJthPa%2F3EISCWayE2yee%2F12LsE0av4uRw9keY2E0UgZmyU%2Fk5PaS0lH%2FMUDllRE51sFo%2FRB0UxSjoy%2BnUbAvcX9ij44EikGOAt9S0dDMH5cpGFftcqOJGNfqZ6%2B3wAhwuMw4ojjNWBnEiu4s4juOExeUlKkN5%2ByIaWrc6A%2FR%2FJslpyGFzSXiS%2FRKwKSiDORHYc4tX7yRW1JQmf%2FqHBKnJWKqObKRJOY%2FgUXsL0Smf4egPXkrS96xkv7S1lB%2FO1S7%2Ba6TibTRO4eRD3z0AYChi8WK4EB9hD%2F2ZoEKqmHj%2FVBin2L7MWONhhz%2FOG4dpOShx%2FlTtEc5HkPPaTG112sa6FGTdhLppUB%2FXNSpt1q0y%2FGYOtLWpQlZku7v2uv3xiFtjo%2FfisP5RoAnIUBClZ7pGCG0FDxngkJbVe%2F19mK%2Fi33isx5Q1zq4JoKoJJpdWPBIUjb0lKj2dQ660fRKexRum0CxxSc%2Bxi2qB3FWKorf822kUKYSFDkK6ntHndfrhzQYxtly4R1nNx3qfKkkMKi1eDEAwznTLHIPtVXZPknnPnlbl9EA7HyZ1Ad%2FwSVWd2fxmHFJXs87NClI4qtUvXiRVOdj5ejhxnsTg4cHvVH6iOdDcnZIUMlZ8enoOTCWXoJvY%2B7k7HvbBi4TxCFa9SLCLdK47UCryf4HthV9FLHwxZLjkVCVyihqlvOohlJqk6%2FL93wEFyyFZd4XB8f9I2s%2BIgGSjLDzuN6JdpG8pxFb7h6%2FOquK0AdgIN3KVaat6rpHhvBpG7KFbLR7vytCQltCiszRa18EeF0bbmjlTMOoC87AIEm2IcXJNqPOYgbOu1lnCTSQ8S1AM7U4YtVo%2B9apdJhnPiLViYu4KRarXaSLCN5k2pnlW%2BaGdLxYI44rNPl9uufB0EmaxA3zwMNFLiWW7OF4ElY3kdbBJdj2IdVTxQW6sZkCcM1QY1%2BE0Z4UCWqrexbO8xeGS4Ljdj9MpZoJ579h7S%2BK2OpwhI5s9OOnKNsZh0OIsTWUkf3s0DtZdWzTckKdCxHde7E9KIHBPei2y9HaTKWSHtUVxxXX1NDI2%2BOA1qC%2B0nxsQLqaqrtQ5vzmXmzJo4Njpzq6i%2BHAZ7Ixb6Im%2FR2JsjHNKpI15dLBBIAYmlqUF28kdfvSNTEN8Ki6ULQT2nlzb7la1Oww1aBfUWsz2EuMG60UGUzG850u%2BhfHs7ftNsmkVOBw4F3UTjwHrfbuxnvXq80mrZohPsVxF6vmwVk16rOgCwENOPQ&__VIEWSTATEGENERATOR=40C1ED78&__VIEWSTATEENCRYPTED=&__EVENTVALIDATION=sXUmCtiBUXL6AA6ZmvMEpAVb%2B%2F%2F5NEcSiaV74LqBbNXdcgB0w8uQ66W1pwQn32L6CUTdKFiBrbmA%2BJAIXp70CzKm9DFuSnqL1pZEOtqsYrQ6D5BeQnzylC4IWCAenqC90EigGYqIjMAVt7VC25iaWY2Gk2mK%2F0ArbCCWJJf9J9WXTnYWEquZyYoPNXv25HhwWEwR0BKf%2BojxENEmzQ37HYmqjOLvCb%2FKiRFA9kMvTw8ZYsaHEgblDz3f6T8KpR7sSSEkgzlBrdvLgqdE9csaIDp8T5aRTklLjmwK8Lno%2Bo5%2BhX2e1SrA3s8SDhFXiPo0u8GjUHuEP11IBdgWynaJ%2FkDh5rEp7vii0Kl5R1BmrkzxfwyMgnleHNzGTYVIetgQRf6g5zFokShyM2d4bO3Pkl2S7BnlwMZBs5BGR2CtBCFysyUIVZ0kWaZJekvcRkbp2pzPG%2FDBKRDzHJ0aOmVdBkQxiilysNJeReNmi%2FB8Soe2N38Dv%2BqF5%2BE2gEWZNEK0SrEAZDfkXAcMG2mTSgzxX1MQlWY57yjh3OSV7R%2FToq9SQK7HeenVUvXBJiIgv3L1WHd9WLZziH%2BfzyqdH1%2FLVHquF7aXGk4Akxwz3Srohl%2BtLrw54nrbWt5N1lrI%2BbwVa4ntu1v5kBPClHClHErXZuaYAZnQ7yxzHkMwOPruurG1H6ZOIwREeuA2FLb%2FT6gkDl%2F%2FePGlOWFEbKivI1Xcr7uAPTEykWevtzAaCWZciZ0tM%2Fcpi%2FJPpX%2BiMRhQAFjn8xfHPEd1WRfYbEjlUA9aLEmcaSGmol3Gzgo0T1vds1CCR420ti9SvCRhpecT%2BcBboL1XjumgCPFrBWjStiu4SDd0hc6dDXjtoYuSNNNYrD9vpM3D6ERBxh%2F1GyQxYLM6jX%2FlKkT2Tv8j%2B0Im9yU%2BAPRjfm%2Fh0Zne5HJRox636GQWRiSxj3SgZE7aRkky8gAco%2BqzuEPj9ij8nkGdlZ4tvEtMAv%2Fly5hTyajpQGlKKMY5zhXRfWwa%2BJeAu18NACExyIKV9ophvet7kPSFMZLjWet1yR8nj350RimC21r0YwHeYgjMvnPmLtD%2BaZF9ryLRrN2cLJagX8HlXsnfZcGQZDnnhHzVUSdj%2B4sAvIkHvkZHi1biv%2FQRpkVqm98hryYECiFznzjedMNPFULLpqVg85Tmom97SDGQloyUB6cztRdRfA4e9e03BWZ8rGIUPmx8FhkDPfb0VqKjCEYzJwdeYKcWNfQiSG1vk%2BnzMcnQHXGxnTiW61SIwcBl5uJSCMDPU37tjB6zhFlZDEnkJc%2FPTqk3gqznmSSK6TjM6V6focgWRtVxxt7cJcwOSbL6XAT8Z8g5D6fS%2FtXUGVDCxBRo9IOiNYMZx2K6CVBbAlZCsv7vZGviSThmZ4C2aMS7namOhXsUjnxkhDdwR3%2BxOw%2F2KHzQ0X5XAquLdAr9o1bzLXDeEXVFngM35kO7z10kmF%2BUOy5HaksFzNKc5QrthmOXUIUARiE6ixNa21CUJhYJdWXuyIe%2BgsuMSRCAIvm9vCTHwF%2BdX6bmcgSXa0z6OKkuMVJ%2BV7TjFrVvjrvLlBUo6hh4ItlG4kO%2BFsKxj%2Br2AAo9DpFuUE1xEN5LGYjiSI9OprF0eRo5kVQ7%2FaZQCws7D6yvaix%2FWo2m8eMSMqbsrbw9oWgae6knJcrhBkp64HprkbWzZHFpMDtF6QoNU8%2B2WqOHL4XMeVTzH2%2B49HVGAsspIagwUvKioDBNlzlP3KrAfphv%2BDg8ctwhLIBk5kLfudx8RLvPGpyxt9rm9HubygaS5uOxP1HkyITTfM%2F5xxq%2BTlCm25Bm4YBYRlFI9dh3e%2FHrQFJDDMITCcEV7IrFykFSiBE7ddKbRDqXy4uYc5Hg1uwHAE330V6k61E6T0GFksW0WAUj3WsVDIm9tHHEhWzf2WZ8vtraEGB3%2Bv8JuliW%2B4mlpi8kS7%2FpGK%2FJLHo0W77PmS7QviLzD%2Fc7lnAEe1W7I6R2MtHG0VLFomebQaDabHflSo5C%2FwGwDUTtc4nKNrsDWCnkIy1UfMcwVW%2Flb6FXfNCqhn1CV%2FUf0BZD2dojHMYDBt%2FC38tt6RaqU9izulF1Mh%2FkDj9Wyn9cJ1F1Q1Jr4Rrh%2FodcL%2BnATXF2yTLCGtRzPdFC2b1jTBYkpEcgUZkh%2FfSYCb62Fi27Q%2BmUzIrGL%2FIZINw41EHoBTzjB5YHqjMoljQRBgzJZ%2FZiTmEv1ASUoGu5XQ%2Bpy8h6FpfKwJsJAAg9nxXTgovvmvUX2CbiVVjuMp%2BDLFFZ2dIePbdgoircanl5QTIlGOBYPZ0VfAnozCl9mGsGWPXtoaWs5rP4c6OblzGwtYYWdWvazx4hUirA1WPyB2j9v6qdZTPmw8XFTzsy3cP8aiPjaEvwheilYR1PRu3WtOZZTOfF8datEMQTLSo%2FHSHBo6ilD%2BdChollmgUEBSGxJCXxvrqxLXhrfh3CHNI0duCkfCrLXS2dxWep%2FywG%2F2PB1OuvHK2UnCr8vGor138MenZAcmKFk8PTxNE%2FJt0%2FZlBgjJeGzEUEgru0pQOVRAhcuTgQWFJMKyxH3UsurmNMchbAstUaYbWN06KD53EgYF6DH1A%2BwihMoacnVrSbdGEEzJSR6GbejF3Paj79q26tzzKH%2F7DDKwY6UFQ0gmSZ2IyQcAkIZTLUZ%2F0%3D&otpvalue=&hdmobile=&hdmobileserver=&hdrefKey=&txt_aadhar=451430264670&rb_otpbio=Aadhaar+e-KYC%28Biometric-Capture+Finger%29&hf_img=&hf_agency=&hf_Kiosk_channel_id=&hf_crn=&hddnimgFingure=&hddnVender=&hddnModel=&hddnSerial=&PidData=&hduidToken=&txt_NameE=&txt_Gender=&txt_Father=&txt_MotherF=&txt_MotherM=&txt_MotherL=&txt_DOB=&ddlIDProofType=&txtIDProofNumber=&ddl_Religion=&ddl_SC=&hf_SOI=&hf_TPD=&txt_State=&txt_District=&hf_District=&txt_Building=&txt_Street=&txt_Locality=&txt_vtc=&txt_Pincode=&txt_Address=&txt_Mobile=&txt_AMobile=&txt_Email=&txt_Adhar=&txt_Pan=&txt_Ration=&ddl_HQ=&txt_BU=&txt_SC=&txt_YP=&txt_Stream=&ddl_Score=&txt_PGC=&txt_captcha=&hdret=';

parse_str($json,$arr);

$json = $arr;
$viewdata = $_SESSION['viewdata'];


$temp =array();
foreach($json as $key => $value)
{

    if($key == '__VIEWSTATE')
    {
      $value = $viewdata['__VIEWSTATE'];
    }


    if($key == '__EVENTVALIDATION')
    {
      $value = $viewdata['__EVENTVALIDATION'];
    }


     if($key == '__VIEWSTATEGENERATOR')
    {
      $value = $viewdata['__VIEWSTATEGENERATOR'];
    }

     if($key == 'txt_aadhar')
    {
      $value = $aadhar;
    }


    $temp[$key] = $value;
}

//$json['txt_aadhar'] = $aadhar;
//$json['PidData'] = '';

//var_dump($request->post());
//exit;

/*
echo '<pre>';
print_r($json);
echo '</pre>';

exit;
*/
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($json));

// In real life you should use something like:
// curl_setopt($ch, CURLOPT_POSTFIELDS, 
//          http_build_query(array('postvar1' => 'value1')));

// Receive server response ...
$headers = array();
$headers[] = "Host: ssdm.mp.gov.in";
$headers[] = "User-Agent: Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36";
$headers[] = "Content-Type: application/x-www-form-urlencoded";
$headers[] = "Content-Length: 6887";
$headers[] = "Cache-Control: max-age=0";
$headers[] = "Upgrade-Insecure-Requests: 1";
$headers[] = "Origin: http://ssdm.mp.gov.in";
$headers[] = "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3";
$headers[] = "Accept-Language: en-US,en;q=0.5";
//$headers[] = "Accept-Encoding: gzip, deflate";
$headers[] = "Referer: http://ssdm.mp.gov.in/CandidateReg.aspx";
$headers[] = "Connection: keep-alive";
//$headers[] = "Cookie: ASP.NET_SessionId=aq43pvmof35vdyrxbkq0hum1"; //__AntiXsrfToken=db2b135e8dda408d8faa4a62f5c80cf4";
//$headers[] = "Cookie: __AntiXsrfToken=db2b135e8dda408d8faa4a62f5c80cf4";
//$headers[] = "Upgrade-Insecure-Requests: 1";

$headers[] = "Cookie: ASP.NET_SessionId=".get_asp_id();
/*

Accept-Language: en-US,en;q=0.5
Accept-Encoding: gzip, deflate



Connection: keep-alive
Referer: http://ssdm.mp.gov.in/CandidateReg.aspx
Cookie: ASP.NET_SessionId=um2hwim4po2hifcg2rnjzwwu
Upgrade-Insecure-Requests: 1

*/





curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
//curl_setopt($ch,  CURLOPT_VERBOSE, true);
//curl_setopt($ch,  CURLOPT_COOKIE,'ASP.NET_SessionId=aq43pvmof35vdyrxbkq0hum1;__AntiXsrfToken=db2b135e8dda408d8faa4a62f5c80cf4');

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLINFO_HEADER_OUT, true);

curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT , 0);
curl_setopt ($ch, CURLOPT_TIMEOUT  , 1000);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
 
 /*
 echo '<pre>';
 var_dump($headers);
 var_dump($json);
 echo '</pre>';
 exit;
 */                                            
$server_output = curl_exec($ch);

//var_dump($viewstate);
include_once dirname(__FILE__,2).'/simple_html_dom.php';

$html = new simple_html_dom();
// Load HTML from a string

$html->load($server_output);
// Load HTML from a string
$data = array();

                                foreach($html->find('#__VIEWSTATE') as $e) 
                                {
                                 
                                   $data['__VIEWSTATE'] = $e->value;
                                }
                                foreach($html->find('#__VIEWSTATEGENERATOR') as $e) 
                                {
                                 
                                   $data['__VIEWSTATEGENERATOR'] = $e->value;
                                }
                                foreach($html->find('#__EVENTVALIDATION') as $e) 
                                {
                                 
                                   $data['__EVENTVALIDATION'] = $e->value;
                                }
                                
                                
  
                              
   if($data){
       
        $_SESSION['viewdata'] = $data;
        return $data;
   }
   else{
    return false;
   }
       

   }

   function voter_count($userid)
   {
       $count = 0;
     $sql = "select count(id) from  voterids where add_by = $userid";
     $conn = db_connect();
     $res = mysqli_query($conn,$sql);
      
     
     if($res)
     {
       $data = mysqli_fetch_row($res);

       $count += $data[0];
     }
      
     return $count; 
   }

   function aadhar_count($userid)
   {
     $count = 0;
     $sql = "select count(aadharmanualid) from aadharmanual where userid = $userid";
     $conn = db_connect();
     $res = mysqli_query($conn,$sql);
      
     
     if($res)
     {
       $data = mysqli_fetch_row($res);

       $count += $data[0];
     }


     $sql = "select count(aadharautoid) from aadharauto where userid = $userid";
     $conn = db_connect();
     $res = mysqli_query($conn,$sql);
      
     
     if($res)
     {
       $data = mysqli_fetch_row($res);

       $count += $data[0];
     }

     $sql = "select count(aadharautoid) from aadharautodbt where userid = $userid";
     $conn = db_connect();
     $res = mysqli_query($conn,$sql);
      
     
     if($res)
     {
       $data = mysqli_fetch_row($res);

       $count += $data[0];
     }

     return $count;
   }


   function aadhar_count_today()
   {
     $count = 0;
     $date =  date('Y-m-d',strtotime('today')).' 00:00:00';
     

     $sql = "select count(aadharmanualid) from aadharmanual where createdatetime > '".$date."'";
     
     $conn = db_connect();
     $res = mysqli_query($conn,$sql);
      
     
     if($res)
     {
       $data = mysqli_fetch_row($res);

       $count += $data[0];
     }


     $sql = "select count(aadharautoid) from aadharauto where createdatetime > '".$date."'";
     $conn = db_connect();
     $res = mysqli_query($conn,$sql);
      
     
     if($res)
     {
       $data = mysqli_fetch_row($res);

       $count += $data[0];
     }

     $sql = "select count(aadharautoid) from aadharautodbt where createdatetime > '".$date."'";
     $conn = db_connect();
     $res = mysqli_query($conn,$sql);
      
     
     if($res)
     {
       $data = mysqli_fetch_row($res);

       $count += $data[0];
     }

     return $count;
   }

   function aadhar_count_total()
   {
     $count = 0;
     $date =  date('Y-m-d',strtotime('today')).' 00:00:00';
     

     $sql = "select count(aadharmanualid) from aadharmanual where 1";
     
     $conn = db_connect();
     $res = mysqli_query($conn,$sql);
      
     
     if($res)
     {
       $data = mysqli_fetch_row($res);

       $count += $data[0];
     }


     $sql = "select count(aadharautoid) from aadharauto where 1";
     $conn = db_connect();
     $res = mysqli_query($conn,$sql);
      
     
     if($res)
     {
       $data = mysqli_fetch_row($res);

       $count += $data[0];
     }

     $sql = "select count(aadharautoid) from aadharautodbt where 1";
     $conn = db_connect();
     $res = mysqli_query($conn,$sql);
      
     
     if($res)
     {
       $data = mysqli_fetch_row($res);

       $count += $data[0];
     }

     return $count;
   }

   function voter_count_total()
   {
     $count = 0;
     $date =  date('Y-m-d',strtotime('today')).' 00:00:00';
     

     $sql = "select count(id) from voterids where 1";
     
     $conn = db_connect();
     $res = mysqli_query($conn,$sql);
      
     
     if($res)
     {
       $data = mysqli_fetch_row($res);

       $count += $data[0];
     }



     return $count;
   }

   function voter_count_today()
   {
     $count = 0;
     $date =  date('Y-m-d',strtotime('today')).' 00:00:00';
     

     $sql = "select count(id) from voterids where created_at > '".$date."'";
     
     $conn = db_connect();
     $res = mysqli_query($conn,$sql);
      
     
     if($res)
     {
       $data = mysqli_fetch_row($res);

       $count += $data[0];
     }



     return $count;
   }

   function active_users_count()
   {
     $count = 0;
     $date =  date('Y-m-d',strtotime('today'));
     

     $sql = "select count(userid) from tbluser where membership_end_date >= '".$date."'";
     
     $conn = db_connect();
     $res = mysqli_query($conn,$sql);
      
     
     if($res)
     {
       $data = mysqli_fetch_row($res);

       $count += $data[0];
     }



     return $count;
   }


   function aadhar_count_today_manual()
   {
     $count = 0;
     $date =  date('Y-m-d',strtotime('today')).' 00:00:00';
     

     $sql = "select count(aadharmanualid) from aadharmanual where createdatetime > '".$date."'";
     
     $conn = db_connect();
     $res = mysqli_query($conn,$sql);
      
     
     if($res)
     {
       $data = mysqli_fetch_row($res);

       $count += $data[0];
     }


     

     

     return $count;
   }


   function aadhar_count_today_advanced()
   {
     $count = 0;
     $date =  date('Y-m-d',strtotime('today')).' 00:00:00';
     

      $sql = "select count(aadharautoid) from aadharautodbt where createdatetime > '".$date."'";
     $conn = db_connect();
     $res = mysqli_query($conn,$sql);
      
     
     if($res)
     {
       $data = mysqli_fetch_row($res);

       $count += $data[0];
     }


     

     

     return $count;
   }


   function aadhar_count_today_auto()
   {
     $count = 0;
     $date =  date('Y-m-d',strtotime('today')).' 00:00:00';
     

     $sql = "select count(aadharautoid) from aadharauto where createdatetime > '".$date."'";
     $conn = db_connect();
     $res = mysqli_query($conn,$sql);
      
     
     if($res)
     {
       $data = mysqli_fetch_row($res);

       $count += $data[0];
     }

     return $count;
   }


   function get_view_state_student_portal()
   {
      $ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"http://scholarshipportal.mp.nic.in/Public/Registration/Process.aspx");

$headers = array();
$headers[] = "Host: scholarshipportal.mp.nic.in";
$headers[] = "User-Agent: Mozilla/5.0 (Windows NT 6.1; rv:70.0) Gecko/20100101 Firefox/70.0";
$headers[] = "Content-Type: application/x-www-form-urlencoded";
//$headers[] = "Content-Length: 10881";
$headers[] = "Origin: http://scholarshipportal.mp.nic.in";
//$headers[] = "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8";
//$headers[] = "Accept-Language: en-US,en;q=0.5";
//$headers[] = "Accept-Encoding: gzip, deflate";
$headers[] = "http://scholarshipportal.mp.nic.in/Public/Registration/";
//$headers[] = "Connection: keep-alive";
$headers[] = "Cookie: ASP.NET_SessionId=".get_asp_id2();//; __AntiXsrfToken=db2b135e8dda408d8faa4a62f5c80cf4";
//$headers[] = "Upgrade-Insecure-Requests: 1";


/*

Accept-Language: en-US,en;q=0.5
Accept-Encoding: gzip, deflate



Connection: keep-alive
Referer: http://ssdm.mp.gov.in/CandidateReg.aspx
Cookie: ASP.NET_SessionId=um2hwim4po2hifcg2rnjzwwu
Upgrade-Insecure-Requests: 1

*/





curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
//curl_setopt($curlhandle, CURLOPT_VERBOSE, true);

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                                                   
$server_output = curl_exec($ch);




$dom = new \DOMDocument();
//$dom->loadHtml($server_output);

//$viewstate = $dom->getElementById('__VIEWSTATE');

//var_dump($viewstate);

include_once dirname(__FILE__,2).'/simple_html_dom.php';

$html = new simple_html_dom();
// Load HTML from a string

$html->load($server_output);
// Load HTML from a string
$data = array();

                                foreach($html->find('#__VIEWSTATE') as $e) 
                                {
                                 
                                   $data['__VIEWSTATE'] = $e->value;
                                }
                                foreach($html->find('#__VIEWSTATEGENERATOR') as $e) 
                                {
                                 
                                   $data['__VIEWSTATEGENERATOR'] = $e->value;
                                }
                                foreach($html->find('#__EVENTVALIDATION') as $e) 
                                {
                                 
                                   $data['__EVENTVALIDATION'] = $e->value;
                                }
                                
                                
                                
                              
   if($data){
     
      $_SESSION['viewdata'] = $data;
      return $data;
   }
   else{
    return false;
   }
       

   }


   function fetch_aadhar_data($aadhar,$bio)
   {

       //$aadhar = '4514-3026-4670';
       $ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"http://scholarshipportal.mp.nic.in/Public/Registration/Handlers/Read_Biometric.ashx");

$count = 0;
$count += strlen($bio); 
$count += strlen($aadhar); 
$args = array('AadharNo'=>$aadhar,'BioEnc'=>$bio);

curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($args));

// In real life you should use something like:
// curl_setopt($ch, CURLOPT_POSTFIELDS, 
//          http_build_query(array('postvar1' => 'value1')));

// Receive server response ...
$headers = array();
$headers[] = "Host: scholarshipportal.mp.nic.in";
$headers[] = "User-Agent: Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36";
$headers[] = "Content-Type: application/x-www-form-urlencoded";
//$headers[] = "Content-Length: 3820";
$headers[] = "X-Requested-With: XMLHttpRequest";
$headers[] = "Cache-Control: max-age=0";
$headers[] = "Upgrade-Insecure-Requests: 1";
$headers[] = "Origin: http://scholarshipportal.mp.nic.in";
$headers[] = "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3";
$headers[] = "Accept-Language: en-US,en;q=0.5";
//$headers[] = "Accept-Encoding: gzip, deflate";
$headers[] = "Referer: http://scholarshipportal.mp.nic.in/Public/Registration/Process.aspx";
$headers[] = "Connection: keep-alive";
//$headers[] = "Cookie: ASP.NET_SessionId=aq43pvmof35vdyrxbkq0hum1"; //__AntiXsrfToken=db2b135e8dda408d8faa4a62f5c80cf4";
//$headers[] = "Cookie: __AntiXsrfToken=db2b135e8dda408d8faa4a62f5c80cf4";
//$headers[] = "Upgrade-Insecure-Requests: 1";

$headers[] = "Cookie: ASP.NET_SessionId=".get_asp_id2();
/*

Accept-Language: en-US,en;q=0.5
Accept-Encoding: gzip, deflate



Connection: keep-alive
Referer: http://ssdm.mp.gov.in/CandidateReg.aspx
Cookie: ASP.NET_SessionId=um2hwim4po2hifcg2rnjzwwu
Upgrade-Insecure-Requests: 1

*/





curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
//curl_setopt($ch,  CURLOPT_VERBOSE, true);
//curl_setopt($ch,  CURLOPT_COOKIE,'ASP.NET_SessionId=aq43pvmof35vdyrxbkq0hum1;__AntiXsrfToken=db2b135e8dda408d8faa4a62f5c80cf4');

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLINFO_HEADER_OUT, true);

curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT , 0);
curl_setopt ($ch, CURLOPT_TIMEOUT  , 1000);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
 
 /*
 echo '<pre>';
 var_dump($headers);
 var_dump($json);
 echo '</pre>';
 exit;
 */                                            
$server_output = curl_exec($ch);

return $server_output;


   }



   function verify_aadhar_number($aadhar)
   {

       //$aadhar = '4514-3026-4670';
       $ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"http://scholarshipportal.mp.nic.in/Public/Registration/Handlers/Checking_Aadhar_Fresh_To_DB.ashx");

$args = array('AadharNo'=>$aadhar);

curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($args));

// In real life you should use something like:
// curl_setopt($ch, CURLOPT_POSTFIELDS, 
//          http_build_query(array('postvar1' => 'value1')));

// Receive server response ...
$headers = array();
$headers[] = "Host: scholarshipportal.mp.nic.in";
$headers[] = "User-Agent: Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36";
$headers[] = "Content-Type: application/x-www-form-urlencoded";
$headers[] = "Content-Length: 23";
$headers[] = "X-Requested-With: XMLHttpRequest";
$headers[] = "Cache-Control: max-age=0";
$headers[] = "Upgrade-Insecure-Requests: 1";
$headers[] = "Origin: http://scholarshipportal.mp.nic.in";
$headers[] = "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3";
$headers[] = "Accept-Language: en-US,en;q=0.5";
//$headers[] = "Accept-Encoding: gzip, deflate";
$headers[] = "Referer: http://scholarshipportal.mp.nic.in/Public/Registration/Process.aspx";
$headers[] = "Connection: keep-alive";
//$headers[] = "Cookie: ASP.NET_SessionId=aq43pvmof35vdyrxbkq0hum1"; //__AntiXsrfToken=db2b135e8dda408d8faa4a62f5c80cf4";
//$headers[] = "Cookie: __AntiXsrfToken=db2b135e8dda408d8faa4a62f5c80cf4";
//$headers[] = "Upgrade-Insecure-Requests: 1";

$headers[] = "Cookie: ASP.NET_SessionId=".get_asp_id2();
/*

Accept-Language: en-US,en;q=0.5
Accept-Encoding: gzip, deflate



Connection: keep-alive
Referer: http://ssdm.mp.gov.in/CandidateReg.aspx
Cookie: ASP.NET_SessionId=um2hwim4po2hifcg2rnjzwwu
Upgrade-Insecure-Requests: 1

*/





curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
//curl_setopt($ch,  CURLOPT_VERBOSE, true);
//curl_setopt($ch,  CURLOPT_COOKIE,'ASP.NET_SessionId=aq43pvmof35vdyrxbkq0hum1;__AntiXsrfToken=db2b135e8dda408d8faa4a62f5c80cf4');

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLINFO_HEADER_OUT, true);

curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT , 0);
curl_setopt ($ch, CURLOPT_TIMEOUT  , 1000);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
 
 /*
 echo '<pre>';
 var_dump($headers);
 var_dump($json);
 echo '</pre>';
 exit;
 */                                            
return $server_output = curl_exec($ch);


//var_dump($viewstate);
include_once dirname(__FILE__,2).'/simple_html_dom.php';

$html = new simple_html_dom();
// Load HTML from a string

$html->load($server_output);
// Load HTML from a string
$data = array();

                                foreach($html->find('#__VIEWSTATE') as $e) 
                                {
                                 
                                   $data['__VIEWSTATE'] = $e->value;
                                }
                                foreach($html->find('#__VIEWSTATEGENERATOR') as $e) 
                                {
                                 
                                   $data['__VIEWSTATEGENERATOR'] = $e->value;
                                }
                                foreach($html->find('#__EVENTVALIDATION') as $e) 
                                {
                                 
                                   $data['__EVENTVALIDATION'] = $e->value;
                                }
                                
                                
  
                              
   if($data){
       
        $_SESSION['viewdata'] = $data;
        return $data;
   }
   else{
    return false;
   }
       

   }

   function get_view_state_evp_portal()
   {
      $ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"https://evp.ecinet.in/Verification/Index");

$headers = array();
$headers[] = "Host: evp.ecinet.in";
$headers[] = "User-Agent: Mozilla/5.0 (Windows NT 6.1; rv:70.0) Gecko/20100101 Firefox/70.0";
//$headers[] = "Content-Type: application/x-www-form-urlencoded";
//$headers[] = "Content-Length: 10881";
$headers[] = "Referer: https://evp.ecinet.in/";
//$headers[] = "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8";
//$headers[] = "Accept-Language: en-US,en;q=0.5";
//$headers[] = "Accept-Encoding: gzip, deflate";
//$headers[] = "http://scholarshipportal.mp.nic.in/Public/Registration/";
//$headers[] = "Connection: keep-alive";
$headers[] = "Cookie: ".get_asp_id3();
//$headers[] = "Upgrade-Insecure-Requests: 1";


/*

Accept-Language: en-US,en;q=0.5
Accept-Encoding: gzip, deflate



Connection: keep-alive
Referer: http://ssdm.mp.gov.in/CandidateReg.aspx
Cookie: ASP.NET_SessionId=um2hwim4po2hifcg2rnjzwwu
Upgrade-Insecure-Requests: 1

*/





curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
//curl_setopt($curlhandle, CURLOPT_VERBOSE, true);

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                                                   
$server_output = curl_exec($ch);



$dom = new \DOMDocument();
//$dom->loadHtml($server_output);

//$viewstate = $dom->getElementById('__VIEWSTATE');

//var_dump($viewstate);

include_once dirname(__FILE__,2).'/simple_html_dom.php';

$html = new simple_html_dom();
// Load HTML from a string

$html->load($server_output);
// Load HTML from a string
$data = array();

                                foreach($html->find('#epicno') as $e) 
                                {
                                 
                                   $data['name'] = $e->name;
                                }
                                
   if($data){
     
      $_SESSION['evp_access'] = $data;
      return $data;
   }
   else{
    return false;
   }
       

   }


   function get_evp_details($epic)
   {
      $ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"https://evp.ecinet.in/Verification/SearchVoters?epic_no=".$epic);

$headers = array();
$headers[] = "Host: evp.ecinet.in";
$headers[] = "User-Agent: Mozilla/5.0 (Windows NT 6.1; rv:70.0) Gecko/20100101 Firefox/70.0";
//$headers[] = "Content-Type: application/x-www-form-urlencoded";
//$headers[] = "Content-Length: 10881";
$headers[] = "Referer: https://evp.ecinet.in/";
//$headers[] = "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8";
//$headers[] = "Accept-Language: en-US,en;q=0.5";
//$headers[] = "Accept-Encoding: gzip, deflate";
//$headers[] = "http://scholarshipportal.mp.nic.in/Public/Registration/";
//$headers[] = "Connection: keep-alive";
$headers[] = "Cookie: ".get_asp_id3();
//$headers[] = "Upgrade-Insecure-Requests: 1";


/*

Accept-Language: en-US,en;q=0.5
Accept-Encoding: gzip, deflate



Connection: keep-alive
Referer: http://ssdm.mp.gov.in/CandidateReg.aspx
Cookie: ASP.NET_SessionId=um2hwim4po2hifcg2rnjzwwu
Upgrade-Insecure-Requests: 1

*/





curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
//curl_setopt($curlhandle, CURLOPT_VERBOSE, true);

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                                                   
$server_output = curl_exec($ch);



$dom = new \DOMDocument();
//$dom->loadHtml($server_output);

//$viewstate = $dom->getElementById('__VIEWSTATE');

//var_dump($viewstate);

include_once dirname(__FILE__,2).'/simple_html_dom.php';

$html = new simple_html_dom();
// Load HTML from a string

$html->load($server_output);
// Load HTML from a string

                             $eci_detail = array();
                             foreach($html->find('#formDetails tr td:nth-child(2)') as $e) 
                                {
                                  
                                 if(strpos( strip_tags($e->innertext), 'Gender') != false)
                                  {
                                   
                                   $data = explode(":",strip_tags($e->innertext));
                                   $eci_detail['gender'] = trim($data[1]);
                                   }
                     
                                   if(strpos( strip_tags($e->innertext), 'Date of Birth') != false)
                                  {
                                   
                                   $data = explode(":",strip_tags($e->innertext));
                                   $eci_detail['dob'] = trim($data[1]);
                                   }
                     
                                    if(strpos( strip_tags($e->innertext), 'Age') != false)
                                  {
                                   
                                   $data = explode(":",strip_tags($e->innertext));
                                   $eci_detail['age'] = trim($data[1]);
                                   }
                     
                                   else if(strpos( strip_tags($e->innertext), 'Relative Name') != false)
                                  {
                                   
                                   $data = explode(":",strip_tags($e->innertext));
                                   $eci_detail['relative_name'] = trim($data[1]);
                                   }
                                 else if(strpos( strip_tags($e->innertext), 'Name') != false)
                                  {
                                  
                                  $data = explode(":",strip_tags($e->innertext));
                                   $eci_detail['name'] = trim($data[1]);
                                   }
                                   
                                   else if(strpos( strip_tags($e->innertext), 'Relation Type') != false)
                                  {
                                   
                                    $data = explode(":",strip_tags($e->innertext));
                                   $eci_detail['relation_type'] =  trim($data[1]);
                                   }
                     
                                // $eci_detail[] = strip_tags($e->innertext);
                                }
                     
                             foreach($html->find('#VVIPForm input') as $e) 
                                {
                                   
                     
                                 //  $eci_detail[$e->name] = $e->value;
                                }
                     
                                foreach($html->find('.form-group div') as $e) 
                                {
                                 
                                // foreach($child->childNodes() as $e) { 
                                 if(strpos( strip_tags($e->innertext), 'State') != false)
                                  {
                                   
                                   $data = explode(":",strip_tags($e->innertext));
                                   $eci_detail['state'] = $data[1];
                                   }
                                   else if(strpos( strip_tags($e->innertext), 'District') != false)
                                  {
                                    $data = explode(":",strip_tags($e->innertext));
                                   $eci_detail['district'] = $data[1];
                                   }
                                   else if(strpos( strip_tags($e->innertext), 'PC :') != false)
                                  {
                                   
                                    $data = explode(":",strip_tags($e->innertext));
                                   $eci_detail['pc'] = $data[1];
                                   }
                                   else if(strpos( strip_tags($e->innertext), 'AC :') != false)
                                  {
                                  
                                    $data = explode(":",strip_tags($e->innertext));
                                   $eci_detail['ac'] = $data[1];
                                   }
                     
                                    else if(strpos( strip_tags($e->innertext), 'Part :') != false)
                                  {
                                  
                                    $data = explode(":",strip_tags($e->innertext));
                                   $eci_detail['part'] = $data[1];
                                   }
                                   else 
                                   {
                                 
                                   //$eci_detail[] = strip_tags($e->innertext);
                                    }
                                 //  }
                                }

               
                     
                                foreach($html->find('#elector_image_v') as $e) 
                                {
                                 
                                   $eci_detail['image'] = $e->src;
                                }
                     
                                foreach($html->find('.col-md-3') as $e) 
                                {
                                 if(strpos( strip_tags($e->innertext), 'House no.') != false)
                                  {
                                  
                                  $data = explode(":",strip_tags($e->innertext));
                                   $eci_detail['house'] = $data[1];
                     
                                  }
                                }
                     
                                foreach($html->find('.col-md-9') as $e) 
                                {
                                 if(strpos( strip_tags($e->innertext), 'Address') != false)
                                  {
                                  
                                   
                     
                                    $data = explode(":",strip_tags($e->innertext));
                                   $eci_detail['address'] = $data[1];
                                   }
                                }
                                $tmp = array();
                              foreach($eci_detail as $k => $v )
                              {
                                $tmp[$k] = trim(str_replace('&nbsp;','',$v));
                              }
                              $eci_detail = $tmp;

                              return $eci_detail;  
                              if($eci_detail)
                              {
                                  $data = explode("-",$eci_detail['ac']);
                                  $assco_name = trim($data[1]);
                                  $assco_no= trim($data[0]);
                                  
                                  $data = explode("/",$eci_detail['name']);
                                  $name = trim($data[0]);
                                  $namelocallang= trim($data[1]);
                                  /*
                                  var_dump($eci_detail['Gender']);
                                  exit;
                                  */
                                  if ($eci_detail['gender']=='Male'){
                                         $gender='Male';
                                     }
                                     else{
                                         $gender='Female'; 
                                     }
                     
                                     $epic_no= $_POST['epic_number'];//$eci_detail['EpicNo'];
                     
                                     $data = explode("/",$eci_detail['relative_name']);
                                  $fname = trim($data[0]);
                                  $fnamelocal = trim($data[1]);
                     
                                  $data = explode("-",$eci_detail['part']);
                                  $part_name  = trim($data[1]);
                                  $part_no= trim($data[0]);
                     
                                  $polling_name = "";
                                  $aadharname = "";
                                  $aadharfname= "";
                                  $txtgali = $txtbuld = $txtlocality =  $txtdistrict = $txtpincode = "";
                                  $txtdob = $eci_detail['dob'];
                     
                                  $data = explode("/",$eci_detail['address']);
                                  $address = trim($data[0]);
                                  $address_r = trim($data[1]);
                     
                     
                                  $txtadd = trim($eci_detail['house']).' '.trim($address);
                                  $imgfpath=$eci_detail['image'];
                                  $_SESSION["IMGPATH"]=$eci_detail['image'];
                              }

}