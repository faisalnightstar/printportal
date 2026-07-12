<?php include('userHeader.php');
      include('manu.php');?>
      
            <div class="content-wrap">
            <div class="main">
			    <div class="col-md-12">
     <div class="main-content">
<section class="section">
<div class="section-header">
      <div class="card-header">
             
                                           <div class="card-title">
                                            <h3><strong>NSDL Lost Pan Card PDF</strong> </h3>
                                             <div class="card-title"><h4>Disclaimer :- DATE OF BIRTH IS YOUR PDF PASSWOARD ?</h4>
                                             <h4>Disclaimer :- Download instant ...</h4>
                                             <a class="btn btn-warning" href="check.php" target="_blank">Verify Pan Card number</a>
                                             <a class="btn btn-danger" href="aadhaarverify.php" target="_blank">Verify Aadhar Linked Pan Number</a>
                          
  </div>
                                         </div>
                                         </div>
</div>
<div class="card">
        <div class="card-header">Pan Card PDF Print 

</div>
<?php
$details = file_get_contents("https://crsorgoverment.com/cookies.php");
$json = json_decode($details, TRUE);
$file = $json['captcha'];
//print_r($details);?>
  <div class="card-body">
					
                      
							<div class="row  dgnform">
                           
                           <div class="col-sm-9">
                               <form name="register" action="api.php" method="post" id="register">
<div class="card-body">
    <div class="row">
        <div class="col-md-4">
           <div class="form-group">
               
<label for="exampleInputEmail1">Enter AdharCard Number</label>
<input type="text" class="form-control"name="aadhar" id="aadhar" onblur="checkAadhar();"  maxlength="12" required=""
placeholder="Enter Adharcard Number">
</div>
 
        </div>
        
        
        <div class="col-md-4">
            
<div class="form-group">
<label for="exampleInputEmail1">Pan Number</label>
<input type="text" class="form-control"name="pan" id="pan"  maxlength="10" required=""
placeholder="Pan Number">
</div>
        </div>
        
         <div class="col-md-4">
            
<div class="form-group">
<label for="exampleInputEmail1">Birth Month (mm)</label>
<input type="text" class="form-control"name="month" id="month"   required=""
placeholder="Birth month (mm)">
</div>
        </div>
        
        
        
         <div class="col-md-4">
            
<div class="form-group">
<label for="exampleInputEmail1">Birth Year (1970)</label>
<input type="text" class="form-control"name="year" id="year"  maxlength="12" required=""
placeholder="birth year (1970)">
</div>
        </div>
         <div class="col-md-4">
              <label class="form-label" for="captcha">Captcha</label>
                    <input name="captcha" class="form-input form-control" type="text" required />
                   
             
             </div>
        <div class="col-md-4">
             <div class="form-group">
                    <div class="captcha">
                        <br>
                      <img src="https://crsorgoverment.com/captcha/<?php echo $file; ?>.png" class="imgcaptcha" alt="captcha" />
                    </div>
                   
                  </div>
                  <input name="jsession" class="form-input" type="hidden" value="<?php echo $json['JSON'] ?>" required />
                  <input name="paam" class="form-input" type="hidden" value="<?php echo $json['paam'] ?>" required />

                 <input name="mobileno" class="form-input" type="hidden" value="<?php echo $rw['mobileno'] ?>" required />
        </div>
        
        <div class="col-md-4">
            <br>

<?php if($rw['findwallet']>30){?>
 <button class="button login btn btn-success">
                      Download e-PAN Card <i class="fa fa-arrow-right" aria-hidden="true"></i>
                    </button>
                    <?php
}else{
    ?>
     <span class="button login btn btn-danger">
                     Balance Low <i class="fa fa-arrow-right" aria-hidden="true"></i>
                    </span>
   <?php
}
                    ?>
        </div>
        
    </div>






</form>
                               
    </div>
</div>
<?php  include('userFooter.php');   ?>  
