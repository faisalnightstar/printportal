<?php include('userHeader.php'); 

?><?php
if($fetch['walletamount'] < 100){
    ?>
    <script>
  alert("Dear User Your  Wallet Recharge Now to use it");
  window.location.href = "../admin/recharge.php";
</script>
<?php  } ?>

<div class="main-panel">
        <!-- BEGIN : Main Content-->
        <div class="main-content">
          <div class="content-wrapper">
					<section id="basic-form-layouts">
					      <div class="row">
					          
					          </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
       <div class="card-body">
          <div class="px-3">

</script>

      <div class="content-wrap">
            <div class="main">
			    <div class="col-md-12">
					<div class="container-fluid">
						<div class="row">
							<div class="page-header">
								<div class="page-title">
									<h1><sup></sup></h1><button style="background-color:black; color:white;">निर्देश
अगर 1 बार मे डाटा नहीं आता है दूसरी बार capture करे  ।</button>
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
							 	<form method="post" name="form" autocomplete="off"  enctype="multipart/form-data" action="paninfo.php" style="width:100%">
									
									                                           <div class="row dgnform">
																			    <div class="col-md-8 col-sm-12 col-xs-12">
											<div class="row">
                                                <div class="col-sm-4 col-xs-20">
                                                    <label>Pan No.</label>
                                                    <div class="form-group">
                                                         <input class="form-control stylec" value=""  id="panno" placeholder="Enter Pan no"  autocomplete="off" name="panno" type="text" maxlength="10" required onkeyup="this.value = this.value.toUpperCase();" onblur='ValidatePAN(this)'>
                                                    </div>
                                                </div>
                                              </div>
                                              
                                              
                                                    </div>
                                        
                                                    <style>
                                                  
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
                                        	
						
                                                    <div class="row">
                                                       <div class="col-sm-4 col-xs-20">
                                                    		
                                                        		
                                                    
							</div>
						   </div>
                                                   
											
										
											
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
