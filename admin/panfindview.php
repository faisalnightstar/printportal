<?php
include 'config.php';

$id = $_GET['id'];
$id = mysqli_real_escape_string($connection,$id);
$query = "SELECT * FROM panfind WHERE id='$id'";
$res = mysqli_fetch_assoc(mysqli_query($connection,$query));

//print_r($res);


?>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<style>

th{
    border:2px solid;
}
  td{
    padding:10px;
    border:2px solid;
    }
</style>
<div class="row m-3">
<div style="float:left; width:30%">
   <div class="col-sm-3 m-3">
        <img src="<?php echo $res['photo'];?>" style="width:120px;height:150;">
   <button class="btn btn-success" id="download">Download Image</button>
 
   </div>
</div>
<div class="left" style="width:70%; float:left" >
        <table>
   
    <tr><th>PAN Holder Name:</th><td><?php echo $res['name'];?></td></tr>
     <tr><th>Aadhar NUMBER:</th><td><?php echo $res['aadhar'];?></td></tr>
     <tr><th>Father's name :</th><td><?php echo $res['fathername'];?></td></tr>
     <tr><th>DOB:</th><td><?php echo $res['dob'];?></td></tr>
      <tr><th>State:</th><td><?php echo $res['state'];?></td></tr>
</table>
   </div>
   
</div>
<script>
    $('#download').on('click',()=>{
       
    var a = document.createElement("a"); //Create <a>
     a.href = "<?php echo $res['photo'];?>"; //Image Base64 Goes here
     
    a.download = "<?php echo $res['id'];?>.png"; //File name Here
    a.click(); 
    
        
    });
</script>