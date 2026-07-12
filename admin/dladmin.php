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
								<h1>Driving Licence Print List</h1>
            </script>


      <div class="content-wrap">
            <div class="main">
			    <div class="col-md-12">
					<div class="container-fluid">
						<div class="row">
							<div class="page-header">
								<div class="page-title">
							</div>
						</div>
						<!-- /# row -->
						<section id="main-content">
							<div class="row dgnform"> 
							    <div class="col-md-12 col-sm-12 col-xs-12" style="    margin-left: 14px;">
							
								<table id="ulist" width="100%" cellpadding="10" cellspacing="0" style="font-size:12px;" >
								<thead>
									<tr style="background:#ff0000;">
									<th style="color:#fff">   Sn.No.       </th>
									<th style="color:#fff">   Dl no       </th>
									<th style="color:#fff">    Dob      </th>
				
									<th style="color:#fff">   Date      </th>
									<th style="color:#fff">   Status      </th>
                                    <th style="color:#fff">   View      </th>
									 
								 									
									<th style="color:#fff">   Action      </th>
									<th style="color:#fff">  Delete      </th>
								 
								 
								 
									</tr>
									</thead>
									<tbody>
									 <?php 

                                        $q = "SELECT * FROM `dlm` WHERE 1 order by id desc";
                                        $a = mysqli_query($connection,$q);
                                        $x=1;
                                        while($b = mysqli_fetch_array($a)){ ?>
                                          <tr>
                                          <td > <?php echo $x++;?> </td>
                                            <td > <?php echo $b['name'];?> </td>
                                           <td > <?php echo $b['dob'];?> </td>
                                           
                                          
                                           
                                           <td > <?php echo $b['date'];?> </td>
                                           <td > <?php echo $b['status'];?> </td>
                                           <td > <a class="btn btn-primary" href="dlmv.php?name=<?php echo $b['name'];?>" target="_blank">View</a> </td>
                                           <td > <?php if($b['payment_status']=='1'){ ?>
                                           <button class="btn btn-success" id="upload" data="" onclick="upload('<?php echo $b['name'];?>')">Upload</button>
                                           
                                           </td>
                                            <?php }else {?>
                                                <button class="btn btn-danger">Payment Pending</button>

                                            <?php } 
                                            ?>
												
											</form>
										</td>
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
       
       <h3 class="modal-title" id="exampleModalLabel">Upload  Card</h3>
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
function upload(name){
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
        
        formdata.append('name',name);
        formdata.append('file',$('#bspdf').val());
        
        //console.log(formdata.get('name')+"file "+formdata.get('file'));
       
        $.ajax({
        url: 'pdlm.php', // point to server-side PHP script 
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
    var aadhar = this.event.target.getAttribute('data');

   


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
		
<?php include('userFooter.php'); ?>