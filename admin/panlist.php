<?php include('userHeader.php');
include('manu.php'); ?>


    <div class="content-wrap">
    <div class="main">
        <div class="col-md-12">
            <div class="main-content">
                    <div class="section-header">
                        <div class="container-fluid">
      <div class="content-wrap">
            <div class="main">
			    <div class="col-md-12">
					<div class="container-fluid">
						<div class="row">
							<div class="page-header">
								<div class="page-title">
									<h1>Pan Card List</h1>
								</div>
							</div>
						</div>
						<!-- /# row -->
						<section id="main-content">
							<div class="row dgnform"> 
							    <div class="col-md-12 col-sm-12 col-xs-12">
								<table class="table-striped table-hover tbifrmae" width="100%" cellpadding="10" cellspacing="0" style="font-size:12px;font-weight:bold;" >
									<tr style="background:#ff9b00;">
										<td align="left" valign="left">   Sn.No.       </td>
										<td align="left" valign="left">   Pan Name      </td>
										<td align="left" valign="left">   Pancard No    </td>
										
										<td align="middle" valign="middle">   Preview      </td>
										<td align="middle" valign="middle">   Edit      </td>
									
										<td align="middle" valign="middle">   Delete      </td>
									</tr>
									
									<?php
									$sql="";
									$sql="SELECT `id`,`panno`, `name`,`create_time` FROM `panauto` WHERE userid='".$_SESSION['userid']."' order by id desc";
									$a = mysqli_query($connection,$sql); $x = 0 ; ?>
									<?php while($b = mysqli_fetch_array($a)){ $x++;  $date = date_create($b['create_time']);?>
									<tr id="a">
										<td align="left" valign="left"> <?=$x?> </td>
										<td align="left" valign="left"> <?=$b['name']?> </td>
										<td align="left" valign="left"> <?=$b['panno']?> </td>
										
										
									<td align="center" valign="middle" class="td_preview"> <button  style="margin-top:2px;margin-bottom:2px;padding-top:2px;padding-bottom:2px;"  class="btn btn-success active setframe" data-url="aadhar/pan.php?searchid=<?php echo $b['id']?>" target="_blank" data-toggle="modal" data-target="#myaadhar"><i class="fa fa-eye" style="color:black"></i> Preview </button> </td>
									
										<td align="center" valign="middle">
											<form action="panmanual.php" method="post" enctype="multipart/form-data" >
												<input name="eid" type="hidden" value="<?=$b['id']?>" />
												<button style="margin-top:2px;margin-bottom:2px;padding-top:2px;padding-bottom:2px;" class="btn btn-info" type="submit"/>
												<i class="fa fa-pencil-square-o" style="color:black"></i> Edit </button>
											</form>
										</td>
										
									
										<td align="center" valign="middle">
											<form action="remove.php" method="post" enctype="multipart/form-data" >
												<input name="id" type="hidden" value="<?=$b['id']?>" />
												<button style="margin-top:2px;margin-bottom:2px;padding-top:2px;padding-bottom:2px;" class="btn btn-danger " type="submit" value="Delete" ><i class="fa fa-trash" style="color:black"></i> Delete </button>
											</form>
										</td>
									</tr>
									<?php } mysqli_close($connection);	?>
								</table>
								 </div>
								<div class="clearfix"></div>
							 </div>
						</section>
					</div>
				</div>
            </div>
        </div>
        
        		<div id="myaadhar" class="modal fade" role="dialog" >
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background: lightblue;
    color: #fff;
">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Pan Preview</h4>
        
      </div>
      <div class="modal-body">
          <div style="position: absolute;
    
    right: 40px;
    top: 10px;">
          <button   onclick="document.getElementById('print-iframe').contentWindow.print();"style="margin-top:2px;margin-bottom:2px;padding-top:6px;padding-bottom:6px;"  class="btn btn-success active"  target="_blank"><i class="fa fa-print" style="color:black"></i> Print </button>
									
										 <button  style="margin-top: 2px;
    margin-bottom: 2px;
    padding-top: 6px;
    padding-bottom: 6px;"  class="btn btn-danger " id="save_image_locally"><i class="fa fa-file-image-o" style="color:white"></i> JPEG Download </button> 
										 <button  style="margin-top:2px;margin-bottom:2px;padding-top:6px;padding-bottom:6px;"  class="btn btn-info" id="download"><i class="fa fa-file-pdf-o" style="color:white"></i> PDF Download </button>
										 </div>
        <p id="content" style="overflow: auto;
    height: 500px;"><iframe src="" id="print-iframe" width="100%" height="1290px" style="border:0px;"></iframe></p>
      </div>
     <style>
         button.close {
    position: absolute;
    right: -38px;
    top: -16px;
    height: 40px;
    width: 40px;
    opacity: 1;
    z-index: 1;
    background-color: red !important;
    padding: 1px;
    color: #fff;
    border-radius: 50%;
}
     </style>
    </div>

  </div>
</div>
			
<?php include('userFooter.php'); ?>
<script>
$(document).ready(function()
{
$('.tbifrmae').on('click','.setframe',function(e) {
	

    var v = $(this).attr('data-url');
    $('#print-iframe').attr('src',v);
	
});
});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>

<script>


$('#download').click(function () {
    var body = $("#print-iframe").contents().find('body')[0];
    html2canvas(body, {
        scale: 2,
        useCORS: true,
            onrendered: function(canvas) {

                var imgData = canvas.toDataURL('image/png');
               
                 var doc = new jsPDF('p', 'pt', 'a4');
                var d = new Date();
                var month = d.getMonth()+1;
var day = d.getDate();
                var output = d.getFullYear() + '/' +
    (month<10 ? '0' : '') + month + '/' +
    (day<10 ? '0' : '') + day;
                doc.addImage(imgData, 'PNG', 0, 10);
                doc.save('<?php echo $fetch['fullname'];?>'+'.pdf');
            }
});
});

$('#save_image_locally').click(function(){
    var body = $("#print-iframe").contents().find('body')[0];
    var scaleBy = 5;
    var w = 1200;
    var h = 1000;
    var div = body;
    var canvas = document.createElement('canvas');
    canvas.width = w * scaleBy;
    canvas.height = h * scaleBy;
    canvas.style.width = w + 'px';
    canvas.style.height = h + 'px';
    var context = canvas.getContext('2d');
    context.scale(scaleBy, scaleBy);
    html2canvas(body, {
        canvas:canvas,
        useCORS: true,
      onrendered: function (canvas) {
        var a = document.createElement('a');
        // toDataURL defaults to png, so we need to request a jpeg, then convert for file download.
        a.href = canvas.toDataURL('image/png').replace('image/png', "image/octet-stream");
         var d = new Date();
                var month = d.getMonth()+1;
var day = d.getDate();
                var output = d.getFullYear() + '/' +
    (month<10 ? '0' : '') + month + '/' +
    (day<10 ? '0' : '') + day;
        a.download = <?php echo $fetch['fullname'];?>+'.jpg';
        a.click();
      }
    });
  });
</script>