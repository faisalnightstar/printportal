<?php include('userHeader.php'); ?>

<?php 

function get_captcha(){
    $ch = curl_init("https://skprints.online/vskcap.php");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $res = curl_exec($ch);
    return "$res";
}

?>
<script type="text/javascript">
     function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>

      <div class="content-wrap">
            <div class="main">
			    <div class="col-md-12">
					<div class="container-fluid">
						<div class="row">
							<div class="page-header">
								<div class="page-title">
					       <h1><button style="background-color:green; color:white;">फोटो केवल 50 KB से कम की ही अपलोड करे / और वो भी JPG  या PNG में ही अपलोड करे अगर इससे ज्यादा KB की अपलोड करोगे तो कार्ड प्रिंट नहीं होगा </button></h1>
                            </div>
							</div>
						</div>

						<!-- /# row -->
						<section id="main-content">
							<div class="row">
							    <?php if($msg !='') { ?>
									<div style="width=100%"  class="row cvmsgok"><?php echo $msg; ?></div>
								<?php } elseif($msgno !='') { ?>
									<div style="width=100%"  class="row cvmsgno"><?php echo $msgno; ?></div>
								<?php  } ?>
							 	<form method="post" name="form" autocomplete="off"  enctype="multipart/form-data" action="voterdetail.php" style="width:100%">
									
									                                           <div class="row dgnform">
																			    <div class="col-md-8 col-sm-12 col-xs-12">
											<div class="row">
                                                <div class="col-sm-4 col-xs-20">
                                                    <label>Epic No.</label>
                                                    <div class="form-group">
                                                        <input class="form-control" name="epicno"  type="text" placeholder="Enter Epic No" required="">
                                                    </div>
                                                </div>
                                              </div>
                                              
                                              <?php 
                                              $img = get_captcha();
                                              ?>
                                                    <!--<div class="row">
                                                       <div class="col-sm-4 col-xs-20" style="margin-top:0px;">
                                                            	<img src=<?php echo "https://skprints.online/".$img.""?> />
                                                            <div class="form-group">
                                                                <input class="form-control" name="captcha" type="text" placeholder="Enter Captcha" required="">
                                                            </div>
                                                        </div>
                                                    </div>-->
            <style>
        		.image-preview__image{
          			max-width:110px;
          			min-height: 110px;
        		}
        			.image-preview{
                			width: 110px;
                			min-height: 110px;
                			border: 2px solid #ddd;
                			margin-top: 5px;

                			display: flex;
                			align-items: center;
                			justify-content: center;
                			font-weight: bold;
                			color: #ccc;
        			}
        		.image-preview__image{
                		//display: none;
                		width: 100%;
        		}
		</style>
                                        	
							<label style="margin-top: 15px;">Image</label>
                                                    <div class="row">
                                                       <div class="col-sm-4 col-xs-20">
                                                    		<div class="image-preview" id="imagePreview">
                                                        		<img class="image-preview__image" id="blah" src="" />
                                                    		</div>
							</div>
						   </div>
                                                   <label>Upload Photo </label>
                                                        <input type='file' id="filedata" name="filedata" onchange="readURL(this);" />
											
										
											
											</div>
							
											<br><br>
										    <div class="row" style="margin-left:35px; margin-top:15px;">
												<label>&nbsp;</label>
												<div class="form-group">              
												   <input type="submit" id="submit" name="submit" class="btn btn-success btn-block " style="border-radius: 30px;
    padding:7px 20px;background-color:#28a745;border:1px solid orange; font-size: 15px;" value="Submit" </input>
	<div id="result"></div>
<br><br>


	
	<script>
	
	$(document).ready(
    function(){
        $('input:file').change(
            function(){
                if ($(this).val()) {
                    $('input:submit').attr('disabled',false); 
                } 
            }
            );
    });
	</script> </div> 
	
											</div>
											<a href="https://play.google.com/store/apps/details?id=com.eci.citizen" target="_blank">
								<div class="btn btn-success btn-block" style="border-radius: 30px;
    padding:7px 20px;background-color:#1f4cad;border:1px solid orange; font-size: 15px;">App Link </div>
                                </a>
                                <br><br><br>
                                <div><a href="download_voter_slip.pdf" target="_blank">
								<div class="btn btn-success btn-block" style="border-radius: 30px;
    padding:7px 20px;background-color:#e35f1e;border:1px solid orange; font-size: 15px;">STEPS TO BE FOLLOW</div>
                                </a></div>
                                
										</div>
										
										</div>
										
									</div>
								</form>
								
							</div>
					   <section id="main-content">
                        <br><br><br>
                           <div class="col-md-12 col-sm-12 col-xs-12" >
                                
								
								
								
												 
                                            <input type="hidden" id="deviceport" />
                                        </div>
                                    </div>
                                </div>
							<!-- /# row -->
						</section>
					</div>
				</div>
            </div>
        </div>



<!------- For popup video------------->


<!------- For popup video------------->
<?php include('userFooter.php'); ?>

    </script>
