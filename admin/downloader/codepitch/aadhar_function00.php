<?php

 function get_view_state()
   {
      $ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"http://ssdm.mp.gov.in/CandidateReg.aspx");

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

   function get_view_state_multiple() {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://ssdm.mp.gov.in/CandidateRegMultiple.aspx");
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
    $headers[] = "Cookie: ASP.NET_SessionId=" . get_asp_id(); //; __AntiXsrfToken=db2b135e8dda408d8faa4a62f5c80cf4";
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
    include_once dirname(__FILE__, 2) . '/simple_html_dom.php';
    $html = new simple_html_dom();
    // Load HTML from a string
    $html->load($server_output);
    // Load HTML from a string
    $data = array();
    foreach ($html->find('#__VIEWSTATE') as $e) {
        $data['__VIEWSTATE'] = $e->value;
    }
    foreach ($html->find('#__VIEWSTATEGENERATOR') as $e) {
        $data['__VIEWSTATEGENERATOR'] = $e->value;
    }
    foreach ($html->find('#__EVENTVALIDATION') as $e) {
        $data['__EVENTVALIDATION'] = $e->value;
    }
    if ($data) {
        $_SESSION['viewdata_multiple'] = $data;
        return $data;
    } else {
        return false;
    }
  }

function get_asp_id()
   {

    
     
      return file_get_contents('http://roboprints.in/ap.php');
    
   }

 function get_asp_id()
   {
$conn = db_connect();
   $sql = "select * from asptble"; 
   $es = mysqli_fetch_assoc(mysqli_query($conn,$sql));
     
      return  $es['asptext'];
    
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
if($_POST['device_name'] != 'morpho')
{
  $json = '__EVENTTARGET=&__EVENTARGUMENT=&__LASTFOCUS=&__VIEWSTATE=XzhYUIW1%2FdPtvxs%2BZqOe%2BgXtEptFLkVtzudmszLvGLHrl5KLS5QmtQGIxUF%2BfHGw4IL2Bx%2BLBv9%2BL%2FpchzYeEFQ%2BEagchv65cdINVCHcE8JIFsk%2BQEUh3B2S55e4McNeLeiQ2iyes5yAd29OURgfYRjLTG8AZfDcTEYLiPw1m4pfMq4QHJfi%2FeFZm3hRe5bcI47bBApauLZm0Xk4jac6RS%2BDJ6%2BSGVSQ%2FNG5cLjUuVgB2UgqvMAsNLE3nE7qyaqbjIHO667ZdIrAROGpYhfeMCFBYuEyvByPH%2FUYZvAAo%2BizhSyGq83ZbMco8QSG6IGGcNLXafTr%2BIZQZXDpsIth8A8g1fnFARgEd4Pn48Cg%2BFulPhFhAPM513olGVrLeyiVrI7xwqJh1fcuS%2FuIGiyzb885Ce8VCGhDnXT3H0cm0pRWXohEOf7v%2Fd1AtpoWBRauWVqIeTdfDWtNxacDCquFmWT5%2B1GNeh%2B2%2FCRueJi%2BPjadqw5GJieyXOoQ%2BazdDrOt0HJ0oTdSgrEy0g248sOm5z5KQvYUjjhupOqwdRSSDzacXFc3GbdNEfHQts%2Bb3vdzzGeTd16NO7LknF4Yhd04J44ylWa7i%2BXSEktSOHc73P3x2wZOY%2FCOyTZjm3GxemVMowcIR8kTWCrC3OHtVbAn39ayralueIK0GTIfobBqABDZwR7cD4LC5dckwJ9edFvG8rJ9s8%2FLzDtVhE71accM49IjAtNn7mODDvNaev2WPRsr8MfA6CcnHvhRMlGiynubRP%2FjYNnFx0hkgmHUmIMMvy%2F0KvJDbYuO9LzQuNbY3Qe%2BU%2FLR%2BkcHjywL2TgHjcweln5iycER3ZsRt8rqatevJ9PqNM7lr6zy%2Bpdq%2F2CFlWb5EbkfhWnlR5CyNnBqksvC1jZaPlVV%2B8fnCRbfmfvEej9dQf8wMLGoLUx5cCMPFyxHGffVIywFJh2JgpHIF0XQCElxMX6JxZA5smaXd26sNe46L9FS0SN3wBC7W3HGDo1l9r%2F1D8qRs4RUE4TDMgHyQGr5B7cZyVJXcdjNpaMoVu2%2BC0%2Br6bq8fzlYmpyG88dY5qbZ6gHpSLwXh%2FcnqNdzGUovJGg1jKOmd16gkie%2FbJLciLlNSm69AC%2Froqx1bygDZWBOjQW%2BMTR9aXVy%2Fh%2F4o0i38Ir64zvuU%2Bbz2jaKw0gwZesc4P6lLwoZZLpVh45WN%2FxYZPsGn1nKfZpnxjRPQf%2BFiMgpit3l%2FHx40VF%2BNtTpom7sQL%2Bg2eZY6nf52M2D3A%2F5ZW2C75XrOHlfGaO%2BCH%2BdL2nVQiLB7OYMlp42uRx7N3uvxl6JcISSqdglKCImAMF%2BlH1nKuTb6Bo7OmL6Y%2BeTyxF2q8Fn32T29yGEkUaV15BYY3fW7Gkt6wqq3nqRqviaHk4fZJ03G5FrGeo6nW0sQKNAOc00%2B3wivRbi0BtFtrBiG%2FFyeqHpqKSoBcQEZ7FJte5BruYhs7KJ1YTql%2B%2FbrVt3CWpFQ%2Bp%2BxhsFyVlUHQbuFPEXY9gCYvk7FSI3pbFR99eKT4%2B682Ffeb8Ps17RnLHiZo1OeFaHG7dlmbnkaeYAhNngKdTeNAIfoHEBBYSN%2Fr1j0SEN9p1wtC5tW1Qy7pad2mBD35jGVIyMbkt0wbWCvjEB9Xddy2QQf5e9e1qoOF8aFhZySjRtVfWt98GdJishmAYaLV9PealovqdO4HPvB2nIFChpA%2F32pGjPJflexRcWt7xYK7OK0K13VkVAbQpUMX8EmJ0XnK84LYg2Np0bIssRUmobpoA%2B44FVSGyiS2sqR1E7pziVm%2BGhNcmQwrKQz779lOSzbmv2%2BkLXX%2B%2BxMlFqAtX6Zkvm9M8ajVt%2FxQbfqb5xF1wtsDiv6sgCEDLdIxPDM525deeYs5OVW%2FPQaESKm089rdaPo1FRo3FQ%2BNfrGcCQpTT90soEps%2BFhSMQveLDoJ3w71%2F5eBUI9NT2wBqmDGEA8iVf%2FuzVvUE6nQT4ZbE4%2BVkD2yZ797EEHcAv7rXuzbIPCyg9tWFKs8gg7%2BTe6OlWmHqQkpQnG7lc1ytzfSF8Yn6z2xJduMIqKokOAk3v0fK9gwklKHgN%2BDak5CsEyfKYRghYBITQSvt%2FV8v8eWbIjLcO3VcqjoRUqB%2FumdJm8zRK3Yu%2FuA3%2BraKcmobaERCwGi9P%2BBDpcVrHs5Aagmed6oBORWGQ9aCFml01s7K9gmMlFpgUSNCiNJoTTANyxdDp5hg%2FToBqlUANrPiFGMlXEZZ91sKtwz%2BVS6yZQDiSrPYXUNYh5z%2Ft6egsDyB0IRsiRLKyAaqMzNAfPJCUAQ0SJQ45uJHlaCi%2FS5jGsMA8cDl7xe8dyLPcXUpZyqEHLG5RuErTt5H2m8%2F2Z4Mmmuf9uPWTzzR%2BZYvnDor%2BhQ1kFgUqkPKgHt4RLpWdfdx5aSnw1AshaDRevZiVr8BELtV041ZcKghWNyFQ8%2B%2BC%2F1FW1fqaXKabNimVMzbrlWDBsv1cDynb4dtEhNuUelbof%2BHC9nTNBLZPpu3eZRfZOBFofYBSq70A6B4Rc4uqh1ihZ%2Bm22KqcntO2ExBvXoVG9PQ9eS1QE3MTHqGaMYIgR2yT9cGqHJ9iBcENI8BCPmUBgfh%2BrmoRW2RRCy1C2wGg7lfJeIKgxHYe8fLAFIJfs%2FgC6re%2Fl5D0qIuC%2Fl0q6gmkIQM9S1lfzzkA5hMK0rTdiwmtKIIobSPfRZCrD8kwJBJyNZ2ja3NBv4xwiqTt%2FAE1orCXg6D%2BI7zA61aVMC5VqdJyB6OY7VUiWlQkL%2FuZ28H3QcNuwwYJuTtpOPvh6%2BW5xazZeKgggqOktQScAFFEeFHDkNlBPL7eQ0KhEiQEcDWJO9RIsJryT39XIjDQkzyx23qm%2BauE%2F%2B0wEJHHVTeLBAhoKkSRZS%2BYnQ1eaWWA5NR9ym2dz%2FVVm6OePX%2BwqThL%2BERUmQ9IIG8o7LHRmH7t7OHyeg58NIqi6baspm9Oz1yciT0iEdyaJru%2F1UaJxyN2NaH8KvX5LDhVFbwN15xsh6BbWg7HpUSAibydyw5MtDxC5zME9EdZ195sEgUBSv%2BZdE%2BLSolaY63ytgoZZGVrS19fpjrXLe0s6qYp2M%2F991Vf6OqmUKTEQH9pmb6k%2BLQyDmpZbWRq8E%2B1kgS2fa72CNU4oqY%2FuhhC&__VIEWSTATEGENERATOR=6EB50B9A&__VIEWSTATEENCRYPTED=&__EVENTVALIDATION=M5UmFjEBX%2FYSkbUNOz6o6k2BSkYz54qrqTJn7%2BOpQY6MK3vLYb9nJjvs1PN%2B3RfviFUXEnmH7yBud0M1Bww%2FmGCQt%2FL4whO8L2tZsux6rDyoIQfjzJz2oQ5zFw3vfD0AjEbn2Fw2JXGcjXc%2FURTshPaudEKpXxGTfdJvudzvMhpj%2B8lZPlmfBGVWxGANCJ7wf98i1q%2BM3iPrBNi3EGMTtevYs7Ab%2FvlC5WNIHyLaD4hfQGtCixbAY0Vy56%2BJ4qsf0bHUPLx6g6i1uWqVesR780wJLtjda%2BkViHXuiKo7Bqcu0Pr4hQLdkf2gVheAm9Bvr70c%2B0pkldcBR80InHsy6Dm57EZKpHzZ2ZeUur5M%2FfBZeDQiiJBdoGK7NYynfVMrFPuRTz4KBwgPSfghifUssXEIwp73qVOcLChhKbWE4xevr799SVRLC08PPvjPPdmL5MFnmH1n0iJOnDFayM%2BWZvzhTzdA%2FTExN%2BMfb9R%2BqUM%2F3p%2FCLjsIPAHCpWHHpUeWLWHqbMshYOQiEe%2FZjPwbeQWYSbMMf7GU473O0YH7hObJAtsdURm6cqVhyxHJzJaNIFQyYYmkLeqjoM%2BspVckW8uLuTXswa4YuJ%2Fqs9HHNvr35OkRRyHtYed6xc6y6AtcTjiHG%2BtyTxDp7ZrHkvWO%2F1P8fyovKLrlfEKnJPkRSw8JQM389JOtxKhztuJaf4vmhJBgXKTNnmgmOQSzbPlwp5p5ArGv0LX8zJvLllBxEhP0i5afyEKArpmF4AMWn0IlpNa56pQMdhCoUY%2B7b5BubygRqF6meff3AbUbiUpVYsRpdIKd3eXlP%2FlQyy2vZ0SLyE0lYdHk7xX37RN5Sz7dkhzc3vQaA%2FrxqGdkujyH372BC%2F733j7gKq1iA9xH389PV22%2FcyynDGDDi7zwaF3GKr6xgNr8AxstcWEPlbwCekE0obWbZ80D1bg3udj59sffO4PzgM3PhDzueVrhA0LtUp4LocZmO%2BkSIUT3v5LEL%2Bgbg3nBRkwzNyEXSxbRepofDlVfL9ozMTxlma3TFYk94Yd4woH8EuCOUZ5YAWLoW%2Fea5bBC2WeqjvL1RtfVcizxudfdhY%2FHOUBAuIwBa1MsRFCtww0PE6m38ZWLbCtpE%2BsEiFIdQxuIDwI7wbBkAn%2B%2B40iIpIQgRMTUfjLH4E8R0CmugBHN4phITqtb9VCzNO4tPuZetYOkdDVLDibH%2BMzhaWjSKx5qB7JJ0B80j36tAk5PZAVdjyGgSC%2F8f7n4awuPxrRDWCYBMWYSRGRxd8Lrt%2Fw8aOp84yQ1%2FiCPpd1qA88DGS%2B8quVQwICnax8Je8UdKVfB93MV3EBO%2B369IP58bFnotDf%2Bt%2FLPvPiZ7ZV5dzH%2FKZm6862d%2BG2i%2BlnrQUUcR693zGbjLlIbLYn5QaMEng3aiyMmjNHz362NeacsRmaUdCvAB9MTSjW%2F%2FWG7xuQ90kuDvMsN95%2BilXRfaBEWD4IqjiPya3K0dMxt5wDqXD1TYhZvaAGTsJ%2FZYZudZRAHkdRiLH4HWJrlBRziYunRy49hW6uPdJM%2FoYZ1Ge0Gv2JqISLeKL%2FN%2BWeKbWJxsMRxHdBFGoX%2Bqer2WNBJiE%2BJOmuABaI5GkVbOq1AbgcGxGmmSZz7ioSX7e73xEsbEpKv09zFO%2FhjnJ5uM%2BOdwO058rMraB1J07kQiRJQfk4ZKCc86d041Lk7x0Wq19QLq21SqyrJ9AHN5Pfx2nmTwFVu%2BDpupPf476AtqaMfjNYt45tzgAt93Zii5EGiRXq69lJvI6AooDDqoHYedtJ7fa4397jNIeno6IsXlbb%2BMpl6BgaKIpFi5n3oQpKFBCt4ZvjVKlC%2BUMMkJg%2BSse8GD%2FHzXknQQm5emhAONlCTY4K7zJDVFy51NMpvVoKP%2B1l6k9ANvb%2F%2BVtmFCzZaIZWi8%2F%2BtiJCKqfucb5Qu7M0U%2BT7badAebO3ccPdPjeE87hOEXiwDAVBLnH7Lr%2BjEnZfgBdC1k7Tra58jAqFHo5RgOQskftqyA%2FDtYBF1ch%2FSkJ53QF62PTn%2FqDepWZ6AKRYFhvPgkSZ%2BeKQvq8jHp8bfu6nTccfL6ISETolfKlQPIaVzWoZb6XhnJ%2FowTlbvCklPv%2FAUhU%2BhDEYS99fbQLBGnPpsdlrGip0CS76K3%2BIinqpcS2LkxzlUB3%2FMb%2Fvl%2Fa3ntIea9HmT6%2FY29SNd%2BGdha%2BEZiy2t279qCpyy9CMDb73nUgsEN3JAxrpqr%2BMziB4WdkKzA9%2Ftxmb7fOprccZXPfcJIY7KYq3mdOmnbL5shNafvCZ%2Bxmi9L7geaFkMkmOHzo3mRyIiagAlrJ0qlXhynNPRBWHiH%2FBYaEUBdZ7gg54%2FIkJlVijP9Da%2FuPlAlFRudaBZerS8N%2F5%2B%2BBVX4sOGEoooZXh2pdLz%2BmbfYSKuj0%2BvXCUIZSPfmmSTqiFkvIJGf3L5IIDuJdSHOlOMv5%2BEvc7MBfGyvPhjY2kbvUHWtsMY%2BLT2nYEHn%2FeZI8MKVN6OqQ9XUU1DOqVIkUoDrbuATiTZ9a7aUTZm8NkdUocobXT0G0UCcmx4uKh1KqDQrSd%2FncRC1xskjvwWtzmxyGR%2BOAcwdqDpCtTCxDMGVm5GhtSduIwmKBboL4FJH7ftdksnS2bKOD47RCKanizoQ%2BIpxggMew54ABvryEmkbnWN%2BGpymJqokRE6QCWylh04b3e%2F5iwKDkJ%2Bc9LW%2FuamWUlS4O0EQszlx50zmrpPEiUm%2FZ5%2BZy02yayp8ljD9u6qilEI9AVZ2OU0T%2FY5dpirKY%2F%2Fh2YEC%2FmFMFk%2FeoTx%2BtBwDxJKFzAV6b3z9RdM7ePuzt%2BVbdBJU45vcygNMKV4%2BFa%2FBhjozsSo%2B5t8xyLifqwRv1WecS76ibSb%2FMy0oDjTfCCsDM4jJbYWsfIES%2FHbQ3yavFiFrJdL%2BnomZz%2BkXsnwVbBtDpzTmig3OCpcmEnJZ9nMC4Cgm69SxtmWgjD70cu7AiR5F0qU6d109WIYZuXK2fH9BZbcCLqQCrvra8v8AThESzJjx67di0NQmklVSnjVIacrD4SeFbi0jnaYDDpm17leTss3B8ggSEDZQ7x%2BPBXxs%2BlYz95bVgPihbd2%2Fwqkf14iCU6DjpN%2F2ZZcqMaLQdVwjMrQ50YCscyyxK5pu5xcadlUSfxvWXcitHknMgiaX8O%2BdlFfyjxp82ajUlJYsRYH%2FKeGhaLRPj7iJXU82rBI217aGBENOd5ntyT3QPSzze9NzVH7vhjeMZyWWSwAFgJP94z75B73xVBmy23Klb8oPgAP642i%2Fr%2F5j9pcScTiBvn3wOvfq94AfbBBa7UG1h8o1tTGWSPdy0y739S8RoQ5vCMbABN9VeSE%2BNrZT26aTfezsaKr3aKleQ4nuUDGUjsVrrzd9B3q2watfZRbQltVe1GZRMezf3D6919VDCs5xC3zEA%2Bzd5kGO%2B%2BNRPzMtgiiquS7mY%2BDDc23PRdGz3Dr4ik2i6T2IUIwvYNyQ1RVOjl7YR3yPQT9Gt%2FoXAvejuZZDc9G5YM2WIzyPgGLiX6j63RHcKeqIsnqZTBeNkf84iq%2Fzrdr0DeYqwldVaK7r%2F5aCKY%3D&hdfrid=&hd_UIDTOKEN=&hd_adhar=&hf_img=&hf_agency=&hf_Kiosk_channel_id=&hf_crn=&hddnimgFingure=&hddnVender=&hddnModel=&hddnSerial=&PidData=%3C%3Fxml+version%3D%221.0%22%3F%3E%0D%0A%3CPidData%3E%0D%0A++%3CResp+errCode%3D%220%22+errInfo%3D%22Success%22+fCount%3D%221%22+fType%3D%220%22+nmPoints%3D%2244%22+qScore%3D%2281%22+%2F%3E%0D%0A++%3CDeviceInfo+dpId%3D%22MANTRA.MSIPL%22+rdsId%3D%22MANTRA.WIN.001%22+rdsVer%3D%221.0.1%22+mi%3D%22MFS100%22+mc%3D%22MIIEFzCCAv%2BgAwIBAgIEA1Z%2BADANBgkqhkiG9w0BAQsFADCB6TEqMCgGA1UEAxMhRFMgTWFudHJhIFNvZnRlY2ggSW5kaWEgUHZ0IEx0ZCA1MU0wSwYDVQQzE0RCIDIwMyBTaGFwYXRoIEhleGEgb3Bwb3NpdGUgR3VqYXJhdCBIaWdoIENvdXJ0IFMgRyBIaWdod2F5IEFobWVkYWJhZDESMBAGA1UECRMJQWhtZWRhYmFkMRAwDgYDVQQIEwdHdWphcmF0MRIwEAYDVQQLEwlUZWNobmljYWwxJTAjBgNVBAoTHE1hbnRyYSBTb2Z0ZWNoIEluZGlhIFB2dCBMdGQxCzAJBgNVBAYTAklOMB4XDTIwMDEwNzA2NTIzMloXDTIwMDEyNjA3MjU1NlowgbAxJTAjBgNVBAMTHE1hbnRyYSBTb2Z0ZWNoIEluZGlhIFB2dCBMdGQxHjAcBgNVBAsTFUJpb21ldHJpYyBNYW51ZmFjdHVyZTEOMAwGA1UEChMFTVNJUEwxEjAQBgNVBAcTCUFITUVEQUJBRDEQMA4GA1UECBMHR1VKQVJBVDELMAkGA1UEBhMCSU4xJDAiBgkqhkiG9w0BCQEWFXN1cHBvcnRAbWFudHJhdGVjLmNvbTCCASIwDQYJKoZIhvcNAQEBBQADggEPADCCAQoCggEBAM4HjfyTMeP2uLPQUMDUEDkADxqfB3seSCjad71nBcAKBiDUBW0CH9Rw8rZt734p1WXjk7x8XikTfWNxnWjTiSOrp8lUYpZhrGiJtDGf5AXi2Zzh64oqsKKVsQ2e8E7lg%2BBPInDcj8zTL7UDfsMDrQbWVVyva92WvEvHTaNSAJ5mhjVpjGL1K0w9czk7qU07W1eaqdqubb6vXxEydto1rp7hu0lSi2dRwjv1s%2BrEz6bwweJJWhSYk2tPdXnH9kRZC2z7JCtV44AOsX%2BLwrRXWHP3UxDxgIrGFePlTHPve3H5XVoMaqIw8yWtBqhBkMJ53N%2FJvmwCZZxBSquWKPaRb2MCAwEAATANBgkqhkiG9w0BAQsFAAOCAQEAWVV%2FexpFLItqaq2%2FQhNy%2Btt4q5lAKvl1qQQ6zppgoyYp48%2B0aBHVArd4tnrToqiC7jmfvqRbgcTtid1KJvqs32kyhZbvT%2FiAAVEetyOO7aJGCHGT27PeJobaHoUS7OWGIJPhOl3FmxcmaG8B%2FkFjt%2BE1j54PMNPcugaVz9x8YThU2FehzzWvG7noZpgPAYQ3oH349KGh4L1d1LCEfeqZWEwEe%2Fh%2FyAEZzICt8lifRII2inKqnGLpxKrdbPwVXUc81MCkcFyZa9PqCE7Nx%2F%2FBWcqkYdYj17zA6cbohnqrTeJg7sBnKCmmAUByWLyJ8VmCckOwt9SxFqd%2FigPDLJjlZA%3D%3D%22+dc%3D%22e51b5af6-61ba-46f9-9c50-c3f65b8a8c09%22%3E%0D%0A++++%3Cadditional_info%3E%0D%0A++++++%3CParam+name%3D%22srno%22+value%3D%221784187%22+%2F%3E%0D%0A++++++%3CParam+name%3D%22sysid%22+value%3D%226E9FEBFB47C6306FBFF0%22+%2F%3E%0D%0A++++++%3CParam+name%3D%22ts%22+value%3D%222020-01-11T15%3A21%3A51%2B05%3A30%22+%2F%3E%0D%0A++++%3C%2Fadditional_info%3E%0D%0A++%3C%2FDeviceInfo%3E%0D%0A++%3CSkey+ci%3D%2220221021%22%3EX2Ep6iHrPdocd6jGbHSB7EtRPSs1dx4CozOnneyJXONB0TYWDFsq5FV54FuhOfeDDGXm0gwWeEzXkeMZBkO9A%2B80pYLZmeehDytryd6zJTr9zLQ9AnxFMmzrzDIMwSgMWZ3vuAEEXc3vdfqx1DGGPf3x8HMxWjS7tCalyKO%2FJsWczvVy9oirjR68gUprF1tw4AG4LsJNE7rkvBQtlHVohkOrtbcrYGKQBdAorfbYCKF0CDRNjgdzg%2F%2B6fEkmr9871%2FyMl0f%2B3jT6j0w%2F225Jv3VuvJX1QhThXMpu6IfzMnBXwnOIM%2B5tRyl4Laeu2UQ0K8yxCHx%2BYiYPWFsZXiJ3hg%3D%3D%3C%2FSkey%3E%0D%0A++%3CHmac%3EOt3gN4lHATeziDRzvRAzjw8%2Fxoveyf1MCZV1MwZ%2Bb03zMNDiMjtI2sFA%2FVNrN%2FJs%3C%2FHmac%3E%0D%0A++%3CData+type%3D%22X%22%3EMjAyMC0wMS0xMVQxNToyMTo1Mf6nq3juTIYLdbFm%2FfWBxQBzwk7p12OnrCiCu3V8wPzxnbSpIw72i5hGWTrTqpeIAe5vNrQ%2Frxss6e0%2BEmI5O71nrfotvK2TrbBjyhBU8gc8aUgNeFWKanYMMOyka6ktJY%2F4WKHjqNr9Kf8%2BSQlwruRoFXGm1Dhg92UiNLXPLO9qDzKurWvAuaYpZgHx%2FNsj2S%2Bp9Woz2rUv2g8JjoqRB40DdQrqYWJDJJrn00pim6yjrWoFyzO1yCtiIWrLqdy8EWgZhTUD0hzFQkhvC17%2B6dhEwyGX%2FSc914RFQTwCrj0hIaLBUSRkbBMx8%2BMocCgAbGz2Rog9zwdz8bHIz1H%2Bske30LyQ5yUZp%2B7krT4Oi8Q8SYHywGzucxDu6sH4nhyZKOKVvpX6bEot1keyzpdH6UTo%2F1atU3FNQqrN0DQI1u8jJUxHe%2B9x8bMAt6IhC2LPp6cmrWAxVBr4a3IR7fcn0xYjT5Q20lnFWQhNSndmWnwYHIJWvNGlufEFD1%2FFh%2BiqSuc6dOa5jBa26geQoGzVXZ1%2FLw%2BXY1sXcSI1B1RxyeLpIsDpDeoSPMgwNApvDvJifWnP8ep0bbS4VE4bFgt%2F1hMTuZTlUzn9VH8q8D1hlmup1bXHaU%2B%2FUsjfeZhbkEKofqClxNnts0bNBtx18bkoQV1i%2BS39nJxHW8YnCthy%2FMcAaqxNWwQcOc1HPwmZV5wWs2qQj6lrtn4tJsjLHAMLGyl3M6yLbSCYlMJ6Fxe91d%2FhrGF%2FjQqnNgDJRR0CCDtRnsAoZbMrPNdFVKAV0R2XyFpXpWETtpPnxCmRozYiC4cYkSc%2BMLTyVSFGEu2S5j78Bsw4dXpCdsi7PQUNHVYhNhRE4z%2BC8YBIyqq7wmfZdi2OPt%2FPZwEcsuE8FEoxqWwqHGie2bjSBhrjTt8qWDyg2HCJenbLaHL%2BTfOqIINxkl9uLHUdccIvJg4wNlA14OndjWar3%2ByPQe0hRV5gQrBrnpuNXooMHwqt2PwODw0gxflbzoI2LmHBXkAR6fk18yGWi2lU7r%2FAYS3Yohdi7dlFRPWq%2FT%2Fmkqw1Xv4nPFY9wFpyg308SqZUyqOMxHqzYYskdgeKlN0S3a8XqobkughE0N4hh7Iki2rtiKeffj7ue7QEBVuxj88XT0s5RqyD2pDlYaT40N%2F3ecPtcaLyGIslWVoR6OtkJCGsKFeoj0pcROSvL2ogsTBK0rktwweZTrWzt84XUYhcZyxbvEkNfvwQUykIqMiCZwUK1cG8ZsM%2Fs2RzUx%2Bp%2BQ%2B5m7XcByvcBbviaggp6X%2BqtOilertj2jlY2M7NLKULYasXmdhpy%2ButhIoK%3C%2FData%3E%0D%0A%3C%2FPidData%3E&hduidToken=&hdn_lblApplicant_Name=&hdn_lblFather_Name=&hdn_lblDOB=&hdn_lblAddress=&hdn_lblMobile_Number=&hdn_lblWorkID=&hdn_lblULB_ID=&hdn_lblUserImage=&hdn_lblApplicant_First_Name=&hdn_lblApplicant_Middle_Name=&hdn_lblApplicant_Last_Name=&hdn_lblDistrict_Code_C11=&hdn_lblAnyExperience=&hdn_lblQualification=&hdn_lblWorkAllotment_ID=&hdn_lblBatchID=&hdn_lblWork_ID=&hdn_lblLB_Type=&hdn_lblGender=&hdn_Vacancy_ID=&hdn_Category=&hdn_LB_Name_en=&hdn_Trade_ID=&hdn_Trade=&hdn_MinEdu=&hdn_CID=&hdn_TCID=&hdn_CenterAddress=&hdn_refKey=&hdn_Aadhar_Masked=&hdn_TrainingCentreName=&otpvalue=&hdmobile=&hdmobileserver=&hdrefKey=&txt_aadhar=&ddlDeviceList=2&rb_otpbio=Aadhaar+e-KYC%28Biometric-Capture+Finger%29&TextBox3=&btn_Biometric=Submit&chk_Consent=on&txt_NameE=&txt_Gender=&txt_Father=&txt_MotherF=&txt_MotherM=&txt_MotherL=&txt_DOB=&ddlIDProofType=&txtIDProofNumber=&ddl_Religion=&ddl_SC=&hf_SOI=&hf_TPD=&txt_State=&txt_District=&hf_District=&txt_Building=&txt_Street=&txt_Locality=&txt_vtc=&txt_Pincode=&txt_Address=&txt_Mobile=&txt_AMobile=&txt_Email=&txt_Adhar=&txt_Pan=&txt_Ration=&ddl_HQ=&txt_BU=&txt_SC=&txt_YP=&txt_Stream=&ddl_Score=&txt_PGC=&txt_captcha=&hdret=';
}
else
{
$json = '__EVENTTARGET=rb_otpbio%241&__EVENTARGUMENT=&__LASTFOCUS=&__VIEWSTATE=T1BBt2PWSRyMsoQBFvaB0V9RQizowAIihfHiGfIi%2B9ZKRYSVkGcJpkXe9wzOom7bWpK5BTfSRxHmdt%2FM%2BZoTu9x0McPB4A22w8zgMlnjrKa8omG%2FkpMzrxqOmOQfDaDzK%2BvTqcFqmFsNmKNQrT4IiHpBmcWYbk1APXh4ku0%2FWlVdDeqSXIISa1f19Lc9HoPKKFiQP2ch%2FK%2FWortU8SSH3FRwQyM%2Bra2BlBfKdOpz1pZmY8W8c8sezdKwDYgYBMG5RxDehAIdYSg1YVZpnuMADd7V5Rw1XnnptBlmmB%2Ba5KBUe8Y3OFqapEdTd%2Fs4FtwaFAYUikpqvOBMoNaFRpzF23sTc2fTsy1%2BBCz9%2FPJw44%2Fr5%2FBfmdWFQoQs8ZA9yQBThk4iiC%2FGwYMrP%2BqkOFpyz73%2B39idoCHRqVUQ3hIJooMgR5drPREVS4VpnglYTfHPtZk2Wol5vQc4LGFFpd72PzLAcap%2F%2B7gaNTweDEylxAK4Yp0e1F%2BkQ6u3Eo2%2F27yTW3yaai9rzO7rtAoL8H2EJ9juPTr02P6aKYi00GQNMPdxKOuNPIf00GAffZXs1FAvAvyYHUu%2FooqKPaaDISfIbRt%2F8MXC5LbP6vzGaZFA6veQ8QcZFcQvkXzN5DZN%2Bszlxuv4t4BI3e4IJYPt3Sk3E3jg5dpLAQAhkJLSQQ%2F8ac7A1SkUa%2Fv6XWf62nWx2z56%2Ft9wEBZ3TBDaIwLCHEtPwZsAueUahePN%2BDKGirf%2BKcb4%2Fi5%2BmW6fltCOjR%2BgjEHdOWS%2Fr9LDkdSZhCKGOUG7oRyASi45NlSOn8ZRisvt3fT6agxR39bUhBeOZbVc5Fp9%2BJPSDnFUkOyzc4mseHw98wqK1qpmbuPR5h7ITmZ%2FtmK%2FwNwes%2BIv9n0eFIWtotY%2Brqf0XjvUsNyGkLAPNmJtgYewo1amDWEEOoAU45BlLO4OADa4%2FCJVUPIIHE7HeBzvGcX%2FnitQbRD%2BrbSJzbeNjLlSWf7Cv%2FLAIzQBxOOj7smkrF6NBmf07%2FFcHR2CxvaYZydxdj519J1UH%2FP6Y9dVjWjjh2Lmr7n6Hft%2F70RndV7W9d9ozpfiVjtJ1j6jIeExqjyKqXnijlS9G9kT4BoSJWcswroh9jTmAdgWj71OfX99R%2BPL2zm%2BhYRjSHBhc3CFCY3o5VHP8S%2FgieO81eBMSFmQBzObf8FlP02sOfAmrUyI7GDrokazqOr1jaNcl20CB882SqwMfDj6RF0%2FbenENdrVGBWu70VqVnkrcknXHMvL3jzuax1oYxwhkstrtMOiw3sRZeR37AZQZumXF4sF9JC8mvxetStAZCHZmQaXRf3Zb1DNy%2BiQgvg4HNEUM5QheIVxfYi6qWcEtH4M1JAasYWSSMLIgm%2BVB6ZeNTb%2BlPganmi4MO0gui6lcrHKbYNRXoJMCQ1TNIzQtaaRWoyGN0dAzB309NY0xDJKjiJavyl57jOitoJX8RhywNIReuXo%2Bn%2BEckjegZmcb94r3mOuch10Id%2BY4417g1TrLxAsHKz7plOkaUP%2F3vitIXo9Xf4juJRDZJPcT0LPQY4EIzIJEppDNl0lW5nTBXy55rXuqoMO6ri9jgcTx7RvJ7BdeuO3YpTOnNNB9KDFrOoN%2BQNVUxmDdxaBDvYpc0D1z%2BnQ479Pr8vJ4o88iKdNf0iv5oX95XWJ9dnnizkwQgSG79R9J1MvQpPjXMz%2BZJfx4%2BSZxKw4O6oGH62pXPuI3bXHnvD7MRwNZtD36sV2jqttMu9IqjVUrSyf0IXVfJbW92PbuiyQKUPGB0T76nlWbduMuLCgf1F2FvlAGfmlV%2Fbi%2Fq9IMic5kZJthPa%2F3EISCWayE2yee%2F12LsE0av4uRw9keY2E0UgZmyU%2Fk5PaS0lH%2FMUDllRE51sFo%2FRB0UxSjoy%2BnUbAvcX9ij44EikGOAt9S0dDMH5cpGFftcqOJGNfqZ6%2B3wAhwuMw4ojjNWBnEiu4s4juOExeUlKkN5%2ByIaWrc6A%2FR%2FJslpyGFzSXiS%2FRKwKSiDORHYc4tX7yRW1JQmf%2FqHBKnJWKqObKRJOY%2FgUXsL0Smf4egPXkrS96xkv7S1lB%2FO1S7%2Ba6TibTRO4eRD3z0AYChi8WK4EB9hD%2F2ZoEKqmHj%2FVBin2L7MWONhhz%2FOG4dpOShx%2FlTtEc5HkPPaTG112sa6FGTdhLppUB%2FXNSpt1q0y%2FGYOtLWpQlZku7v2uv3xiFtjo%2FfisP5RoAnIUBClZ7pGCG0FDxngkJbVe%2F19mK%2Fi33isx5Q1zq4JoKoJJpdWPBIUjb0lKj2dQ660fRKexRum0CxxSc%2Bxi2qB3FWKorf822kUKYSFDkK6ntHndfrhzQYxtly4R1nNx3qfKkkMKi1eDEAwznTLHIPtVXZPknnPnlbl9EA7HyZ1Ad%2FwSVWd2fxmHFJXs87NClI4qtUvXiRVOdj5ejhxnsTg4cHvVH6iOdDcnZIUMlZ8enoOTCWXoJvY%2B7k7HvbBi4TxCFa9SLCLdK47UCryf4HthV9FLHwxZLjkVCVyihqlvOohlJqk6%2FL93wEFyyFZd4XB8f9I2s%2BIgGSjLDzuN6JdpG8pxFb7h6%2FOquK0AdgIN3KVaat6rpHhvBpG7KFbLR7vytCQltCiszRa18EeF0bbmjlTMOoC87AIEm2IcXJNqPOYgbOu1lnCTSQ8S1AM7U4YtVo%2B9apdJhnPiLViYu4KRarXaSLCN5k2pnlW%2BaGdLxYI44rNPl9uufB0EmaxA3zwMNFLiWW7OF4ElY3kdbBJdj2IdVTxQW6sZkCcM1QY1%2BE0Z4UCWqrexbO8xeGS4Ljdj9MpZoJ579h7S%2BK2OpwhI5s9OOnKNsZh0OIsTWUkf3s0DtZdWzTckKdCxHde7E9KIHBPei2y9HaTKWSHtUVxxXX1NDI2%2BOA1qC%2B0nxsQLqaqrtQ5vzmXmzJo4Njpzq6i%2BHAZ7Ixb6Im%2FR2JsjHNKpI15dLBBIAYmlqUF28kdfvSNTEN8Ki6ULQT2nlzb7la1Oww1aBfUWsz2EuMG60UGUzG850u%2BhfHs7ftNsmkVOBw4F3UTjwHrfbuxnvXq80mrZohPsVxF6vmwVk16rOgCwENOPQ&__VIEWSTATEGENERATOR=40C1ED78&__VIEWSTATEENCRYPTED=&__EVENTVALIDATION=sXUmCtiBUXL6AA6ZmvMEpAVb%2B%2F%2F5NEcSiaV74LqBbNXdcgB0w8uQ66W1pwQn32L6CUTdKFiBrbmA%2BJAIXp70CzKm9DFuSnqL1pZEOtqsYrQ6D5BeQnzylC4IWCAenqC90EigGYqIjMAVt7VC25iaWY2Gk2mK%2F0ArbCCWJJf9J9WXTnYWEquZyYoPNXv25HhwWEwR0BKf%2BojxENEmzQ37HYmqjOLvCb%2FKiRFA9kMvTw8ZYsaHEgblDz3f6T8KpR7sSSEkgzlBrdvLgqdE9csaIDp8T5aRTklLjmwK8Lno%2Bo5%2BhX2e1SrA3s8SDhFXiPo0u8GjUHuEP11IBdgWynaJ%2FkDh5rEp7vii0Kl5R1BmrkzxfwyMgnleHNzGTYVIetgQRf6g5zFokShyM2d4bO3Pkl2S7BnlwMZBs5BGR2CtBCFysyUIVZ0kWaZJekvcRkbp2pzPG%2FDBKRDzHJ0aOmVdBkQxiilysNJeReNmi%2FB8Soe2N38Dv%2BqF5%2BE2gEWZNEK0SrEAZDfkXAcMG2mTSgzxX1MQlWY57yjh3OSV7R%2FToq9SQK7HeenVUvXBJiIgv3L1WHd9WLZziH%2BfzyqdH1%2FLVHquF7aXGk4Akxwz3Srohl%2BtLrw54nrbWt5N1lrI%2BbwVa4ntu1v5kBPClHClHErXZuaYAZnQ7yxzHkMwOPruurG1H6ZOIwREeuA2FLb%2FT6gkDl%2F%2FePGlOWFEbKivI1Xcr7uAPTEykWevtzAaCWZciZ0tM%2Fcpi%2FJPpX%2BiMRhQAFjn8xfHPEd1WRfYbEjlUA9aLEmcaSGmol3Gzgo0T1vds1CCR420ti9SvCRhpecT%2BcBboL1XjumgCPFrBWjStiu4SDd0hc6dDXjtoYuSNNNYrD9vpM3D6ERBxh%2F1GyQxYLM6jX%2FlKkT2Tv8j%2B0Im9yU%2BAPRjfm%2Fh0Zne5HJRox636GQWRiSxj3SgZE7aRkky8gAco%2BqzuEPj9ij8nkGdlZ4tvEtMAv%2Fly5hTyajpQGlKKMY5zhXRfWwa%2BJeAu18NACExyIKV9ophvet7kPSFMZLjWet1yR8nj350RimC21r0YwHeYgjMvnPmLtD%2BaZF9ryLRrN2cLJagX8HlXsnfZcGQZDnnhHzVUSdj%2B4sAvIkHvkZHi1biv%2FQRpkVqm98hryYECiFznzjedMNPFULLpqVg85Tmom97SDGQloyUB6cztRdRfA4e9e03BWZ8rGIUPmx8FhkDPfb0VqKjCEYzJwdeYKcWNfQiSG1vk%2BnzMcnQHXGxnTiW61SIwcBl5uJSCMDPU37tjB6zhFlZDEnkJc%2FPTqk3gqznmSSK6TjM6V6focgWRtVxxt7cJcwOSbL6XAT8Z8g5D6fS%2FtXUGVDCxBRo9IOiNYMZx2K6CVBbAlZCsv7vZGviSThmZ4C2aMS7namOhXsUjnxkhDdwR3%2BxOw%2F2KHzQ0X5XAquLdAr9o1bzLXDeEXVFngM35kO7z10kmF%2BUOy5HaksFzNKc5QrthmOXUIUARiE6ixNa21CUJhYJdWXuyIe%2BgsuMSRCAIvm9vCTHwF%2BdX6bmcgSXa0z6OKkuMVJ%2BV7TjFrVvjrvLlBUo6hh4ItlG4kO%2BFsKxj%2Br2AAo9DpFuUE1xEN5LGYjiSI9OprF0eRo5kVQ7%2FaZQCws7D6yvaix%2FWo2m8eMSMqbsrbw9oWgae6knJcrhBkp64HprkbWzZHFpMDtF6QoNU8%2B2WqOHL4XMeVTzH2%2B49HVGAsspIagwUvKioDBNlzlP3KrAfphv%2BDg8ctwhLIBk5kLfudx8RLvPGpyxt9rm9HubygaS5uOxP1HkyITTfM%2F5xxq%2BTlCm25Bm4YBYRlFI9dh3e%2FHrQFJDDMITCcEV7IrFykFSiBE7ddKbRDqXy4uYc5Hg1uwHAE330V6k61E6T0GFksW0WAUj3WsVDIm9tHHEhWzf2WZ8vtraEGB3%2Bv8JuliW%2B4mlpi8kS7%2FpGK%2FJLHo0W77PmS7QviLzD%2Fc7lnAEe1W7I6R2MtHG0VLFomebQaDabHflSo5C%2FwGwDUTtc4nKNrsDWCnkIy1UfMcwVW%2Flb6FXfNCqhn1CV%2FUf0BZD2dojHMYDBt%2FC38tt6RaqU9izulF1Mh%2FkDj9Wyn9cJ1F1Q1Jr4Rrh%2FodcL%2BnATXF2yTLCGtRzPdFC2b1jTBYkpEcgUZkh%2FfSYCb62Fi27Q%2BmUzIrGL%2FIZINw41EHoBTzjB5YHqjMoljQRBgzJZ%2FZiTmEv1ASUoGu5XQ%2Bpy8h6FpfKwJsJAAg9nxXTgovvmvUX2CbiVVjuMp%2BDLFFZ2dIePbdgoircanl5QTIlGOBYPZ0VfAnozCl9mGsGWPXtoaWs5rP4c6OblzGwtYYWdWvazx4hUirA1WPyB2j9v6qdZTPmw8XFTzsy3cP8aiPjaEvwheilYR1PRu3WtOZZTOfF8datEMQTLSo%2FHSHBo6ilD%2BdChollmgUEBSGxJCXxvrqxLXhrfh3CHNI0duCkfCrLXS2dxWep%2FywG%2F2PB1OuvHK2UnCr8vGor138MenZAcmKFk8PTxNE%2FJt0%2FZlBgjJeGzEUEgru0pQOVRAhcuTgQWFJMKyxH3UsurmNMchbAstUaYbWN06KD53EgYF6DH1A%2BwihMoacnVrSbdGEEzJSR6GbejF3Paj79q26tzzKH%2F7DDKwY6UFQ0gmSZ2IyQcAkIZTLUZ%2F0%3D&otpvalue=&hdmobile=&hdmobileserver=&hdrefKey=&txt_aadhar=&rb_otpbio=Aadhaar+e-KYC%28Biometric-Capture+Finger%29&hf_img=&hf_agency=&hf_Kiosk_channel_id=&hf_crn=&hddnimgFingure=&hddnVender=&hddnModel=&hddnSerial=&PidData=&hduidToken=&txt_NameE=&txt_Gender=&txt_Father=&txt_MotherF=&txt_MotherM=&txt_MotherL=&txt_DOB=&ddlIDProofType=&txtIDProofNumber=&ddl_Religion=&ddl_SC=&hf_SOI=&hf_TPD=&txt_State=&txt_District=&hf_District=&txt_Building=&txt_Street=&txt_Locality=&txt_vtc=&txt_Pincode=&txt_Address=&txt_Mobile=&txt_AMobile=&txt_Email=&txt_Adhar=&txt_Pan=&txt_Ration=&ddl_HQ=&txt_BU=&txt_SC=&txt_YP=&txt_Stream=&ddl_Score=&txt_PGC=&txt_captcha=&hdret=';
}
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

   function viewbiostate_multiple($aadhar) {


    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://ssdm.mp.gov.in/CandidateRegMultiple.aspx");
    $json = '__EVENTTARGET=rb_otpbio%241&__EVENTARGUMENT=&__LASTFOCUS=&__VIEWSTATE=Rd4u2Kjk2fdsFYltEeOmv26rGE8JW285P7R4JFmX8E%2FwjHKJs%2FIYyMzrzBPk74unvm3%2FdNGwJh1bukGCcWQrsWRFwz5dB4dyFgwNQcwQ9cOTLAaSdP3D6hS%2FY1%2FbX9QgihYN%2BjBc9qxn7uksBTO9pTQvAIGjzn6%2BvS7qAMQUuL2CiMsO5xu9HNbvXsuJQZrB3mGg253JrZKjKNFytzBsWfKxnIO5qDuZ%2FNfC6wibH3Q9vLEATT9oXyGs%2BLWnYcTW4JTTRIR79%2B%2FkcpmvpZj3K79FKPUWi%2BL8iTQbNGSZpyYXh2Knl2LB9OvnIVgkHBs77FcXgf4jgfatN%2FcOsqivOLk%2B8dq%2F6ynZPywQpzrK2Q%2Fz3vO5C1eDy3asYpKem5ZnHP5Uoiz7somATuPDTxlG1eIh0vwaqW%2FLdo6OBdo3bDOL9B1iP9E%2BjZ82fsuPC8EmFvLheJXkonHfRXQki7pr2WmvYOVKOpNyly9gH9MN3su5Zln8HLVoJcx9hVKx%2FyCkYVnvGIQnOA4TnrjgP10khhXClbinOfQ47c0sPQRdEE4OjHN6PxSNhd6g6Z5ac0sHgai0DWBaNzdxlupPi7RcBkZ2GMx2GMnPR75CG39YwBe2hr3Ckf9pY6Pe7TqTnq2W%2BXWVDqvml3GGO4v%2F3Isvt3TC6ezNXzCysvL9PrRQd6nXXF%2BUpOIE4OffvlPNZqRJ3GKINJR3em4WwIpTMi2dXzZyg3fnA2%2BMItSqXX8VUz7prY0ayQXL5Jlj9%2Bhl42ujnL1BaL4vaSrc46aI6y3KtIXAn1kri6DfKv60K9H3BtKbixmmTBCuX8R8PFZr%2BK%2BjNDxztCbMuqB0ryaoF4j%2FZdhLvRnVCSu5hxXOzSuGdELFzBehI5p2CyBw%2FDkCeNlzXqmMx4uS03%2F7ugqpjl6giw7lshGzq5PSqh29GZjEKcqJdrqZVBPzOMa9SNFsayIy4eWg8BnXzzrr8P0UxAS5Wphhe8viMVow9mJBBzG9w6DyrdADPhSmD6zN1DS3DaP5%2FMfwgNF6Nwk8zjazNpggFREWnr0k%2FM%2Fdm9DHgvRCnW2AGl3wUTnmtsCvsdUECeYMpRkW3xVD0SMABW4Obphqr%2F%2F4xmnFI9ysZqxTMmqvNTl%2BbX8R1KT7rF8f%2F52ULIk%2FhKhTWSqA9XxPJCqxVm1btJBNGQrKKTkgj1VkV8b%2B4epAzstIPq0XFQnzVyWnT8mR2bngrfuW8lzyn%2F8KQG2dBADPiNej6lyDvuyIU4NR2acKw8nkUIO7ZWsFFO0AO%2FMW97KNOsCCklne9DzdKzz4RmPBnjRt2wcxC2GRbPokUn%2FAZz4olMO21Y%2FvgLIRK%2BfIcp4VqTeD%2B1CdTIMkXo3zkclI1z8odxPM%2B2CDoDS12rJIGxN2cxc09lrk2jBJQVkW%2Bv%2FRpdNZ6wa6e2ICUu8SLT%2BbuutfON38FQmZETE397HBfptYNqIhPAm7Blzp81nJ%2FFqn2Ct26EM8JgrdqNcb8UjxJWuf0IQ1%2BWhAMUTnawt5h1Ob9FjDIX7sD%2ByVYScme%2FhCfLe8u9L4cs0GsjCNJj1zC%2FZMisGOYurnaY2Fb2cSgXD0VeIwVKYibrMvQyImmrqBAJ6Vn277XTm4igG%2FriNvZDCcZLWanMFrAmju2RZIUh8pivbVPQBnhVmqcS%2BTkvL8CuJv1iZaQP3LEJfOSxEMIco92ndLOaZVeGakUUW7q11Vvk0nEx5NE9lpSk9a%2BAydiCGLRpufoWLNiECfOOOlJR%2FYdPBxh9KnStj1qow5d4t7UFcVvQgwzV9xOpWUdVuMNJnKaU52UWXWWWlQxO250DU%2FZ%2BblFruVCU%2BFtT89EQxpi5dibCibZNRw%2B9QCJqPfkX3gDCv%2BIT2%2FhIK3UnFPESm2UWL3vJMqJUik5ZGFCxrOBMN%2BbpiJw9K%2FYaJL6ZPVck%2BtevH4HsuCuNGzQSMX3x9oN%2F4WTymG7gyS2n0r5byU%2FmDKhC6zf5%2Bs31B6Ge49Qd%2B%2BRnhgIXtdjU8bqcsGoJKphhAePLDCy%2FfJTi94aFLUyEFEikZkqV94VehktOYgO80EjBguvVagkfv0sWy3%2BXONSB0pYh7jyk0FmjL%2BXqhmv5pJcbr3EwPakQF1xSu2w0OPghkC9f7%2FBisWl45eEfobvMS3ilOGwLNUTRPC9gs4W2OE3Y1LHqavoyMLmEF2Hl7r1zh7QFWSEH8bNsgpeV4MTge6ulYWNchfXb%2FmrdjbXfeBRYyMX8fKmhOIuXyMn8udq%2B3K9MFZJaBVIMtu1qF8UMkkOrFZxjKzzbG%2Bc1kovsAKi1EI2MD3bDihxxehhiAqaapTn%2Bl2LbLG59LEdWT9VC4k09ethEXmPSVdkU%2BQpUbJSDIicxp5Aumt%2F48gjwew1B%2B1NXF00xa5ClZJX9QWa81PGV5ljfe9bJSVUm1QyDeh2ZPsV317Oys5ixt%2FwLvRMHvAwN15Slc0oYXZGiyF675R2tpcttSZ1b9JT%2Bs4fa%2B4djzNP%2FM2Iqw%2FzouMQELbTDAGxdOR8AD%2Fcw9G7PuOFwmGPnVoJSDuVvYQjc%2BOmoj7x2pygjJQfzu%2FjMGVo0%2BMZ0gnymdryrjjdjntBqBIeqNAFE1Nj90xr3GaYYCiwLkx1b4s9sF30XUZ9ZPWDP1Pl5PAC6rdfB2oSy%2BzWLicHcyDDA1XbfGGGBuJtQHs8yMqg7eLn%2BlWpA8HzAlbLJ%2F0gFEHUw0Pf%2BK8Y21MSAG33UzuOXmPiPw6oQSc928anRdubuwU0E4eSTZut2AA1GO%2B4N4Growzo3kMHqOQYdjmHVp1FumRyyVyGUd5JZ0KSS%2FjB2gX1Xkn%2Fomx3ezeNKIGUQbEgpbi4%2BkPQmnjH3lSbIYn%2Bvm%2BbVCN1mchZwKLQISTMOymp6CgDrYbv5kPEOGYzhmY7KqPc%2B%2F21hsVBvBLW%2Bof68RTVZyabFneWsbwhc2tBaE0TQ3s3ECRa5kEdWxnd53oUp%2FyWwSEoKdOFv4a%2B1RgT0VGm6r2diTm4%2Fp62xeUNrqyHt1xp3Vkge0y1Tflm1iB2jao7FD6FlZa1KC4uoRelaVSPmXwOknBaBCVO37Dy3JMpEg97rwWKZ3Ud%2Fj1fbnOgN%2BPb%2BxDKeSx8bvO9rgAh12d7fiVduFVbFzb3bbRHhvOXqbTpqBR&__VIEWSTATEGENERATOR=6EB50B9A&__VIEWSTATEENCRYPTED=&__EVENTVALIDATION=vNREt1PI2lrf5%2BskvFgx6o2fQPOqZGjOj1N0AFmOV3YX4DoSoTgEg7W%2BunXu94jXC%2FFB%2FEpaPUZHyzPvXybif3l7O8QG8%2FfWZU1CWuD9zAPm7%2FGuI1ecRR1vRCpbd%2FUDDUsiudjCTC9EV7YMsx1FuRcUcvOvcPGRKwYWrD5tMAo87CYcL%2BHK90tTvrTZSYol9Ca7a%2BkMAcYHvi6MRNIgFUn8XzVtN2G%2FI3dLghJWiN2Pgmt2BfazgQSsN6y1%2FDi45SRyZSwnUayJfX0Ke0pgUgE7eVqJmzbkHPTKOWxtr1PGD2qFno3dRGZmmI219AtRJUZjT%2FLHi14TyDGDh5fOK5DxyWXEy3dUwWbBJqaWUTtYEwyZUaEWOXwyRGCL9Gjp0BP%2Fp4zn4I5DO3ZadEilrPKQZBb0lH7ATv3XFZsqSMNqFppu4sivREEYwRYLEXaMZLDZhQYIdJCvpMlHVrvoe%2BZ7Yb%2BzLGHYgR1V6HDyJ0D8OPUA02lQKDA%2FkHkza%2Bxk58jydgkDZEsjJgbVUbSy7JTyEKD1Rgj9gm3JOJw1xCzPkBoJuAV42DEiSoGsViju%2BCcSZ4vjR%2BtP%2FDGymn%2Feu8WI7kLKnezYRHuevonfSFOQdYfM%2Fw3zkzMZmHdHlUSGbcXKm%2BdLNmhRRZjnHCp4PNZc6WAizmF3wSxKfqRGvXW8WZociqfRYLu7kg7t5MQecyuiGA9KbjvyH6lxwZXTVM3oFhQHQFmdfEIvYDC1q5y9DRX1CMMih%2BMH1fZSvSSQbZ3G5YQ4em9Mih93juwoxOD7oUpxwkEtx5BkEDyq9WxUPq29rRmmjVUrU%2B4aU%2BFj6vcfs8B2ukONkjEp1ehu0keo3xt7bvqAeFQAW%2BHZPTbNp6HxCFdz8b98H7iIic%2FDU52wKk6fdL8OIej%2BsU3jniNJsUYUckdLgbYzwAelTUj7yPwT9IznQ2KX%2B%2Bod4qKXRv5k9CsC%2B0ZfkYbG6ouBMjKu9pe56Ce%2FaDt5Dkk0icjglrnva6YNWNQqxJJegu%2BRtg1%2FfvCich4W7pKXD2ZQcq1kSXk4VVhf5n6gQi%2FM6LlQBzVAl1%2ByNzj7A%2FCAcmAWB%2FNuhVqgPymkLG5IWUxI7y9qeL%2FbdtVcbepnC4ESU%2Fqfld8kli8hqumxYLFtyKEM5qEKhHOQmQLDMGGHTSRQ8%2FN0X22Qc6CzBm3jtlLtxohqkkUIvo%2FNR%2Fw9%2B6YTfEUvXNs47Qx%2FpjUntP4Y%2B5KCw7L6pURnNTlxXn1UrS3NN70t0GN8eMEjuLpFdjr%2F9alG0mCiO1yzeeGY6P1msMZXpCXMN1Z9KbzXAxjLD4mkkS0ZW4j8Fv3cSbmMj%2Bo8ZQYa3dxtWMA%2B7k2Qw7TfanugYb%2F5u2O%2BUu7Y1eK%2BPIeKSaMuj9dSw%2BbC0GeXCjSnfT%2FlgfeAxKx3iZwdh5x%2FDtDy333nY3dNqs53AC2Cm7xCqzR5Xyz0M1ZaIl1sH47yjTg6sVnWnu%2BGNzlD7ZzovA2y1EpQGg2db%2BJocQeQ%2FJ8oLOtdcBtQse5PJtJoP0F4XfTx%2BuE%2BrhPBDEzd6iGd%2F1RCNUmuxF9C98koGap1tojCkbron4Z7KYqOP5XKmU8APLTE7%2B5TLWYYqRcOdjzDgORy8wQDnlOVCOt6RGSqqLhJ4%2BJkiJTdQvuk9iww9ENiJZK3T5N0Ia87gYot1K5OjpztCLIVorTeQdwvXQvrpwXewMu5Jv%2F0qESn8JG6s%2BnMgPJa7tvcY1gS5II8ds%2FIdzrfJDjk7AeduiZ%2Fe02ZJrNOIk%2FoLEFg98a3B5NNmFIaStbjO82ufGopLCFMURsfY1UmPOC2Qw8d8HwR1CuZg%2FDvMrrM%2BIWJu5z1T2te5%2Bo5U11mVHedP7vyfrUDEcwZZ3e%2Be9CclIc0Nc%2FtZ%2BWqZsVCMdvDMT4eydxxWj3CbgmODAXXPHRqQWWjbDIkoHmYYysKJRKAPmisEaWWBbravM8Qf2IlGn7%2BEroqC5vPnPrQfEqtoltnuSsPDQaDWj5tg60T6h3YNrrAvaJCbqtkb2q9LCZFeTy8x5Uh%2By%2FtXreD5wxGvf5zptLKtAoemVV6ZiV2qA5DITYYLc5yPrmIXuxy0HRbtxtsS64tKBzEA6IPRxEbZWys11%2FiuaGegZcUA7kd%2FdDNL8NoQLGO0lKJs9ynIU6MltdEJr%2B7qSuKN3gf8u0XwouDh1GW30lcqDdRMELIGc%2Bxdab0Yllu9%2FeiiL227IAsuS%2FihJe4LqMPLJXgXHlZUyODYZ17WuXYg0J2Jc%2Bi%2BU1lKtOvrhqeAmImZjQcWpwa4%2B74HAHhct2Aa3poQRB1OWvLdHIazTGU9SLwiTqW1oR80Hoz%2FJFpTzMH93R1ypVzeHN71ME3X%2FM4I5bLBYy4MWxv9bIUeW4bBIoIe0253W6ez4JKn8gAjUUFfkqTEIq2XbeTLMBGkd27jbfHVJv56h1rCt8EXUw2yBHhn8EiFxkw95yVlo%2F4RmQJKsvxFM8ErXA8h8MfghjclCc1g1tkyFp3hOwfoYxTx3QXV1I01fPgBREJwCsBXK62g3bSs1glNhwv%2Fazwn4KTlihhKSev2HEsxRuVGZ16sRUKlYpIcsG57Xlw3uDvO311PkgT0e8NjhKd4aqs2Y7Z37Eo2INbLIYK4d5DXfFYxLMOAYlC%2Fe23wK7XdTX1PWo2p7%2Bvy6EFLsHrDst1XFclpoSfVtPjxdZqj2ocmn8GuxTTlc9iB9kjwMS%2FfNeap3fCHU9wY79Y7nBij7d1i2eRRj8HGtDya2UyTf0Q%2BCWakToEF8Xi%2FlHnyXeqzRbSMJ%2BvVBIGCoyhiDQhqvKG8hT95NikvF2JOa%2BLwOKgr3TxtmM4js6gUygMTqUqzycF4P2X%2BrvwyIPDMzt9slj22%2FVf2eqCjO8v4jpn3O%2B3Ea9m%2BJIQGvjSUxLtyyzp6TDoKPmXVSdvaao3ysxFdwPS%2BcYrhsBYr9Fg3rZRJ3pI4iZsICoUWZ8NhC%2BE0MUsiH%2FwOdvvskcxkabUdYT2Sqg9Al2DFTDY30s1vDqRWF57TXJnVSU7oYakYLQgFjuTnBGwIFMDQeVKbinqnEmfB3qOXeX4zbv%2BkQhOCrwbRsr%2FKPdZdIP03RVJ0ITHRkJsIq93mdplPQcc5wn2OgaE3h5eR9IwaXchq5olEDPFvZ2rR0B1rudXxtvhk6NZtOhttIlu5VAijo73NrerDTBOkzzhdH06J8NVGzuc6HGINo34gU3RwWNM7X8b87vU42P0k%2F2Dp93SSt0%2FuZ9Pk9n0A0fZHhGQMeLR9sVAQbMUzbpgzFxoVxvgg8ST15e18yrRTcTgWKxcQpJFHC2UhacGWTQ6aSuuM3wKfX8J3yxqcWHqh4WLQD4op5xpFbMnCICZNnxRC33ojW6QqlmImzQ4PItldlkhsgXqXeV60OLBzZ34tZ8KSMn%2FQ8NxdJIEBeCbRKC9PrkpiRu5Qf5aZ9V2nsyBmc%2B9Pg31R0mOckUKok1FJGojc08jlHDn1sQ%2FuSX%2BRdwLEsCy6Y95x4g%3D&hdfrid=&hd_UIDTOKEN=&hd_adhar=&hf_img=&hf_agency=&hf_Kiosk_channel_id=&hf_crn=&hddnimgFingure=&hddnVender=&hddnModel=&hddnSerial=&PidData=&hduidToken=&hdn_lblApplicant_Name=&hdn_lblFather_Name=&hdn_lblDOB=&hdn_lblAddress=&hdn_lblMobile_Number=&hdn_lblWorkID=&hdn_lblULB_ID=&hdn_lblUserImage=&hdn_lblApplicant_First_Name=&hdn_lblApplicant_Middle_Name=&hdn_lblApplicant_Last_Name=&hdn_lblDistrict_Code_C11=&hdn_lblAnyExperience=&hdn_lblQualification=&hdn_lblWorkAllotment_ID=&hdn_lblBatchID=&hdn_lblWork_ID=&hdn_lblLB_Type=&hdn_lblGender=&hdn_Vacancy_ID=&hdn_Category=&hdn_LB_Name_en=&hdn_Trade_ID=&hdn_Trade=&hdn_MinEdu=&hdn_CID=&hdn_TCID=&hdn_CenterAddress=&hdn_refKey=&hdn_Aadhar_Masked=&hdn_TrainingCentreName=&otpvalue=&hdmobile=&hdmobileserver=&hdrefKey=&txt_aadhar=&ddlDeviceList=3&rb_otpbio=Aadhaar+e-KYC%28Biometric-Capture+Finger%29&txt_NameE=&txt_Gender=&txt_Father=&txt_MotherF=&txt_MotherM=&txt_MotherL=&txt_DOB=&ddlIDProofType=&txtIDProofNumber=&ddl_Religion=&ddl_SC=&hf_SOI=&hf_TPD=&txt_State=&txt_District=&hf_District=&txt_Building=&txt_Street=&txt_Locality=&txt_vtc=&txt_Pincode=&txt_Address=&txt_Mobile=&txt_AMobile=&txt_Email=&txt_Adhar=&txt_Pan=&txt_Ration=&ddl_HQ=&txt_BU=&txt_SC=&txt_YP=&txt_Stream=&ddl_Score=&txt_PGC=&txt_captcha=&hdret=';
    parse_str($json, $arr);
    $json = $arr;
    $viewdata = $_SESSION['viewdata_multiple'];

    $temp = array();
    foreach ($json as $key => $value) {
        if ($key == '__VIEWSTATE') {
            $value = $viewdata['__VIEWSTATE'];
        }
        if ($key == '__EVENTVALIDATION') {
            $value = $viewdata['__EVENTVALIDATION'];
        }
        if ($key == '__VIEWSTATEGENERATOR') {
            $value = $viewdata['__VIEWSTATEGENERATOR'];
        }
        if ($key == 'txt_aadhar') {
            $value = $aadhar;
        }
        $temp[$key] = $value;
    }
    //$json['txt_aadhar'] = $aadhar;
    //$json['PidData'] = '';
    //var_dump($request->post());
    //exit;
    
   
    
    
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($temp));
    // In real life you should use something like:
    // curl_setopt($ch, CURLOPT_POSTFIELDS,
    //          http_build_query(array('postvar1' => 'value1')));
    // Receive server response ...
    $headers = array();
    $headers[] = "Host: ssdm.mp.gov.in";
    $headers[] = "User-Agent: Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36";
    $headers[] = "Content-Type: application/x-www-form-urlencoded";
    $headers[] = "Content-Length: ".strlen(http_build_query($temp));;
    $headers[] = "Cache-Control: max-age=0";
    $headers[] = "Upgrade-Insecure-Requests: 1";
    $headers[] = "Origin: http://ssdm.mp.gov.in";
    $headers[] = "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3";
    $headers[] = "Accept-Language: en-US,en;q=0.5";
    //$headers[] = "Accept-Encoding: gzip, deflate";
    $headers[] = "Referer: http://ssdm.mp.gov.in/CandidateRegMultiple.aspx";
    $headers[] = "Connection: keep-alive";
    //$headers[] = "Cookie: ASP.NET_SessionId=aq43pvmof35vdyrxbkq0hum1"; //__AntiXsrfToken=db2b135e8dda408d8faa4a62f5c80cf4";
    //$headers[] = "Cookie: __AntiXsrfToken=db2b135e8dda408d8faa4a62f5c80cf4";
    //$headers[] = "Upgrade-Insecure-Requests: 1";
    $headers[] = "Cookie: ASP.NET_SessionId=" . get_asp_id();
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
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
    curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
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
    include_once dirname(__FILE__, 2) . '/simple_html_dom.php';
    $html = new simple_html_dom();
    // Load HTML from a string
    $html->load($server_output);
    // Load HTML from a string
    $data = array();
    foreach ($html->find('#__VIEWSTATE') as $e) {
        $data['__VIEWSTATE'] = $e->value;
    }
    foreach ($html->find('#__VIEWSTATEGENERATOR') as $e) {
        $data['__VIEWSTATEGENERATOR'] = $e->value;
    }
    foreach ($html->find('#__EVENTVALIDATION') as $e) {
        $data['__EVENTVALIDATION'] = $e->value;
    }
    
    if ($data) {
        $_SESSION['viewdata_multiple'] = $data;
        return $data;
    } else {
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
?>
