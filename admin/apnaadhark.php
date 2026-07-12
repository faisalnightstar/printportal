<?php
include('userHeader.php'); 
include('manu.php'); 
?>
      <div class="main-content">
<section class="section">


 <div class="d-flex justify-content-center">
        <div class="col-lg-6">
			<div class="card">
			<div class="alert alert-primary bg-primary text-light border-0 alert-dismissible fade show" role="alert">
              Advance Aadhar Successfully Working On All Devices. 
           
	<input id="piddata" name="piddata" type="hidden" value="">
          
              </div>
            <div class="card-body">
            <br>

              <div class="col-md-12">
                                   <label>Aadhar No.</label>
                    <input class="form-control valid" id="txtUID" maxlength="12" name="EnterAadhaarNumber" type="text" autocomplete="off"placeholder="********4512" />
                   
                				 <div class="text-center" style="margin-top: 20px;">
                				     
<?php if($adstastus['code'] == 1){?>  
<?php echo $adscode['code'] ;?>
<?php }else{}
?>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1189130708558549"
     crossorigin="anonymous"></script>
<!-- Display ads -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-1189130708558549"
     data-ad-slot="2264768977"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
    <button type="submit"  class="btn btn-primary"name="capture" id="capture">Capture Fingure</button>
</div>
</form>
</div>
</div>
</div>
</form>
</section>
</div>
<form action="aadhar_info_hkb.php" method="post" name="f1" style="display:none;">
  <input type="hidden" name="aadhar" id="aadhar"/>
  <textarea name="bioenc" id="biodata"></textarea>
</form>
<script>
  setTimeout(function(){ $('#myModal').modal('show'); }, 3000);
  </script> 
<script>
$(document).ready(function()
{
$("#capture").on('click',function()
{
	var alen = $("#txtUID").val().length;
	if( $("#txtUID").val() == '')
	{
		alert('please enter Proper aadhar number');
	}
	else if(alen != 12)
	{
		alert('please enter Proper 12 digit aadhar number');
	}
	else 
	{
	var hdnPIDData = $("#hdnPIDData");
	//var cape = $("#cap").val();
var ssoauth_ver = $.now();
			
				var data = { p: 'http', type:'AUTH', device: 'bio', isHttpsService: 'false' };
				initCapture(data);
			
	

			function initCapture(d) {
				$.getScript("https://test.axenapi.co.in/Dashboard/Verify_api/aad/printcapture.js?v=" + ssoauth_ver).done(function (script, textStatus) {
					if (textStatus == "success") { startCaptureRD({ authType: d.type, fpDevice: d.device, env: "P", isHttpsService: d.isHttpsService }, function (data) { if (d.p === "http") hdnPIDData.val(data.data); else  hdnPIDData.val(data.data);
 $("#biodata").val(data.data);
 $("#aadhar").val(txtUID.val());
 //$("#captch").val($("#cap").val());
				document.f1.submit();
				alert("Finger Captured Successfully");
			       // alert(data.data);
				//console.log(data.data);
                //window.location.href="http://data.edreamkart.com/testc.php?aadhar="+txtUID.val()+"&bioenc="+hdnPIDData.val();
					}); }
				});
				
					 
                   
			}
	} 
});

});
</script>
<script type="text/javascript">
        var txtUID, txtConfirmUID;
        var btnProceed;
        var lblMessage;
        var oData;
        var btnSentOTP;
        var txtVerifyOTP;
        var btnVerifyOTP;
        var oLocalProfile;
        var btnSave;
        var hdnFinalData;
        var IsFreshUID;
        var txtMobile;
        var sValue, cValue;

        var hdnServerMessage, hdnShowServerMessage;
        var txtDOB, txtConfirmDOB;
        var txtSamagraID;
        $(document).ready(function () {
            txtSamagraID = $('#txtSamagraID');
            txtDOB = $('#txtDOB');
            txtConfirmDOB = $('#txtConfirmDOB');

            btnSentOTP = $('#btnSentOTP');
            btnProceed = $('#btnProceed');
            lblMessage = $('#lblMessage');
            btnVerifyOTP = $("#btnVerifyOTP");

            txtMobile = $('#txtMobile');
            btnSave = $('#btnSave');
            hdnFinalData = $('#hdnFinalData');

            hdnServerMessage = $('#hdnServerMessage');
            hdnShowServerMessage = $('#hdnShowServerMessage');


            txtUID = $('#txtUID');
            txtConfirmUID = $('#txtConfirmUID');
            txtVerifyOTP = $('#txtVerifyOTP');

           

            txtDOB.mask('99-99-9999');
            txtConfirmDOB.mask('99-99-9999');


            

            txtConfirmUID.blur(function () {
                
            });

            
            
            

            txtSamagraID.blur(function () {
                if (txtSamagraID.val().length == 9) {
                    Get_Samagra_Details(txtSamagraID.val());
                }
                else {
                    $("#dvSamagraDetails").html('');
                    $("#dvSamagraDetails").fadeOut(100);
                }
            });

            


            
           

            
            


        });
        
        
        

        

    </script> 
<script src="jquery.maskedinput.js" type="text/javascript"></script> 
<script src="jqueryold.js" type="text/javascript"></script> 

<script>
$(".Announcement_Banners").hide();
$(".Announcement_Bannerss").hide();

$(".btnReadThumbs").click(function () {
                
               var dp = $('#Port').val();

            var pidoptions = "<PidOptions ver="1.0"> <Opts env="P" fCount="1" fType="2" iCount="0" iType="0" pCount="0" pType="0" format="0" pidVer="2.0" timeout=\"20000\" otp=\"\" posh=\"LEFT_INDEX\" env=\"P\" wadh=\'E0jzJ/P8UopUHAieZn8CKqS4WPMi5ZSYXgfnlfkWjrc=\' /> <Demo></Demo>  </PidOptions>";
            if (!dp) {
                alert('RD Service Unavailable');
                return;
            }

            var rdsURL = "http://127.0.0.1:" + dp + "/rd/capture";
            
            $.support.cors = true;

            $.ajax({
                type: "CAPTURE", async: false, crossDomain: true, url: rdsURL, data: pidoptions, contentType: "text/xml; charset=utf-8", processData: false, dataType: "text",
                success: function (data) {
                    var errCode = $(data).find('Resp').attr('errCode');

                    if (errCode == "0") {
                        $('#bioData').val(data);
                        
                       $(".Announcement_Banner").hide();
                         $(".Announcement_Banners").hide();
                         $(".Announcement_Bannerss").show();
                       
                       $('#hdnPIDData').val(data);
                       
                       
                        
                    }
                    else if(errCode != "0"){
                       
                       
                         $('#hdnPIDData').val("Device not connected");
                         $(".Announcement_Banner").hide();
                         $(".Announcement_Banners").show();
                    }
                },
                error: function (xhr, ajaxOptions, error) {
                    alert(rdsURL);
                }
            });
});


     	
</script> 
<?php include('userFooter.php');?>