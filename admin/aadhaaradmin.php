<?php include('userHeader.php'); ?>
<?php 

if($_SESSION['userid']!=1){
    header('panel.php');
}


?>
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
									<h1>Aadhar Dublicate Pdf Upload</h1>
            </script>

								</div>
    </div>
        <div class="card-content collpase show">
          <div class="card-body card-dashboard table-responsive">
             
						    <thead>								<table class="table table-striped table-bordered zero-configuration" width="100%" cellpadding="10" cellspacing="0" style="font-size:12px;font-weight:bold;" >
	<td align="left" valign="left">   Sn.No.       </td>
								 	<td align="left" valign="left"> User Id </td>	
										<td align="left" valign="left">   Aadhar Name      </td>
										<td align="left" valign="left">   Aadharcard No    </td>
																			<td align="left" valign="left">   Pin Code   </td>
										<td align="left" valign="left">   Date Of Birth   </td>
										<td align="left" valign="left">   Time    </td>
										<td align="left" valign="left">   State    </td>

										<td align="left" valign="left">   Create Date Time  </td>
										<td align="middle" valign="middle">   Print      </td>
											<td align="middle" valign="middle">   PVC Print      </td>


									</tr>
									</thead>
									<tbody>
									 <?php 

                                        $q = "SELECT * FROM `aadhaarfind` WHERE 1 order by id desc";
                                        $a = mysqli_query($connection,$q);
                                        $x=1;
                                        while($b = mysqli_fetch_array($a)){ ?>
                                          <tr>
                                          <td > <?php echo $x++;?> </td>
                                                                                      <td > <?php echo $b['id'];?> </td>

                                            <td > <?php echo $b['name'];?> </td>
                                           <td > <?php echo $b['aadhar'];?> </td>
                                           <td > <?php echo $b['pincode'];?> </td>
                                           <td > <?php echo $b['dob'];?> </td>
                                            <td > <?php echo $b['fathername'];?> </td>
                                           <td > <?php echo $b['state'];?> </td>
                                           <td > <?php echo $b['status'];?> </td>
                                           <td > <a class="btn btn-primary" href="aadhaarfindview.php?id=<?php echo $b['id'];?>" target="_blank">View</a> </td>

                                           <td > <?php if($b['payment_status']=='1'){ ?>
                                           <button class="btn btn-success" id="upload" data="" onclick="upload('<?php echo $b['id'];?>')">Upload</button>
                                           
                                           </td>
                                            <?php }else {?>
                                                <button class="btn btn-danger">Payment Pending</button>
                                            <?php } 
                                            ?>
                                           
                                           </tr>
                                       <?php }
                                    ?>
									</tbody>
								</table>
								
									
											
						
								 </div>
								<div class="clearfix"></div>
							 </div>
						</section>
					</div>
				</div>
            </div>
        </div>

<!-- Modal Upload  start -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
       
       <h3 class="modal-title" id="exampleModalLabel">Upload Certificate</h3>
      <div class="col-sm-4">
      
      <div class="p-2 text-light" style="border-radius:10px;" id="status"></div>
        </div>
                                            
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="row m-5">
      <input type="file" class="input" name="cert" id="cert">
      <input type="hidden" id="bspdf">
      <button class="btn btn-success disabled" id="uploadcert" >Upload</button>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         
      </div>
    </div>
  </div>
</div>


<!-- Modal Upload Start -->
<!-- modal view start -->
        
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Applicant Information</h5>
      
        </button>
      </div>
      <div class="modal-body">
       <div class="row p-3">
       <div class="col-sm-4">
        <h4><b>Name:</b></h4>
       </div>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
<script>
function upload(id){
    $('#exampleModal').modal('show');
    $('#cert').on('change',()=>{
        // upload file here 
        $('#uploadcert').removeClass('disabled');
        filereader  = new FileReader();
        filereader.onload = function(){
           //   alert(filereader.result);
              
              $('#bspdf').val(filereader.result);
            
       
        }
        filereader.readAsDataURL(document.getElementById('cert').files[0]);

    });

    $('#uploadcert').on('click',()=>{
        $('#status').addClass('alert-danger');
        $('#status').text("Please Wait");
        var formdata = new FormData();
        
        formdata.append('id',id);
        formdata.append('file',$('#bspdf').val());
        
        //console.log(formdata.get('id')+"file "+formdata.get('file'));
       
        $.ajax({
        url: 'uploadaadhaar.php', // point to server-side PHP script 
        dataType: 'text',  // what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: formdata,                         
        type: 'post',
        success: function(php_script_response){
           console.log(php_script_response); // display response from the PHP script, if any
           $('#status').addClass('alert-success');
        $('#status').text("Certificate Uploaded");
        }
     });

        
    })


}
$('#upload').on('click',()=>{
    //alert("upload");
    console.log(this.event.target.getAttribute('data'));
    var id = this.event.target.getAttribute('data');

   


});
</script>

<!-- modal view -->
		<style>
		tbody tr td
		{
			padding:6px !important;
		}
		thead tr th
		{
			text-align:center !important;
		}
		</style>
<!-- General JS Scripts -->
<script src="assets/bundles/lib.vendor.bundle.js"></script>
<script src="js/CodiePie.js"></script>

<!-- JS Libraies -->
<script src="assets/modules/jquery.sparkline.min.js"></script>
<script src="assets/modules/chart.min.js"></script>
<script src="assets/modules/owlcarousel2/dist/owl.carousel.min.js"></script>
<script src="assets/modules/summernote/summernote-bs4.js"></script>
<script src="assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

<!-- Page Specific JS File -->
<script src="js/page/panel.js"></script>

<!-- Template JS File -->
<script src="js/scripts.js"></script>
<script src="js/custom.js"></script>
</body>

<!--   Tue, 07 Jan 2020 03:35:12 GMT -->
</html>