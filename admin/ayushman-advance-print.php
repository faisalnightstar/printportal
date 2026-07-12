<?php include('userHeader.php');

$sqla="select * from charges";
$updt = mysqli_query($connection,$sqla) ;
$slct = mysqli_fetch_array($updt);

?>
<?php if($fetch['walletamount'] < 20){
             //$msg = 'Voter Photo Balance is Low Recahgre now';
                        ?>  <script>
          //     alert(" Balance is Low Please Recahgre now");
	  

                window.location.href= "../admin/activate%20id.php";
                        </script>
                 <?php }else{
                 }
?>
<style>
    td, th {
    border: 1px solid #0c0a0a;
    text-align: left;
    padding: 5px!important;
    width: 18%!important;
    background: #5bc0de;
}
.bg-white {
    background-color: #d9d7d7!important;
}
</style>
    <!--Flat Buttons Starts -->
  
							<!--<div class="page-header">
							<!--	<div class="page-title">-->
							<!--		<h1>Advance Licence Information</h1>-->
							<!--	</div>-->
							<!--</div>-->-->
							 <div class="col-md-12 text-center">
							     	<h3>Ayushman Card Print</h3>
							 </div>
							


						<!-- /# row -->
							    <section id="main-content"
                    <div style="padding: 0 25%;">
                       <form method="post" name="f1">
		       
 <div class="form-group">
                               <label>
                           Select State
                        </label>
                        
                       <select name="s1" id="s1" class="form-control">
                    <option value="">Select State</option>
                    <option value="35">ANDAMAN AND NICOBAR ISLANDS</option>
                    <option value="28">ANDHRA PRADESH</option>
                    

                      
                    <option value="12">ARUNACHAL PRADESH</option>
                    
                    
                      
                    <option value="18">ASSAM</option>
                    
                    
                      
                    <option value="10">BIHAR</option>
                    
                    
                      
                    <option value="4">CHANDIGARH</option>
                    
                    
                      
                    <option value="22">CHHATTISGARH</option>
                    
                    
                      
                    <option value="26">DADRA AND NAGAR HAVELI</option>
                    
                    
                      
                    <option value="25">DAMAN AND DIU</option>
                    
                    
                      
                    <option value="7">DELHI</option>
                    
                    
                      
                    <option value="30">GOA</option>
                    
                    
                      
                    <option value="24">GUJARAT</option>
                    
                    
                      
                    <option value="6">HARYANA</option>
                    
                    
                      
                    <option value="2">HIMACHAL PRADESH</option>
                    
                    
                      
                    <option value="1">JAMMU AND KASHMIR</option>
                    
                    
                      
                    <option value="20">JHARKHAND</option>
                    
                    
                      
                    <option value="29">KARNATAKA</option>
                    
                    
                      
                    <option value="32">KERALA</option>
                    
                    
                      
                    <option value="31">LAKSHADWEEP</option>
                    
                    
                      
                    <option value="23">MADHYA PRADESH</option>
                    
                    
                      
                    <option value="27">MAHARASHTRA</option>
                    
                    
                      
                    <option value="14">MANIPUR</option>
                    
                    
                      
                    <option value="17">MEGHALAYA</option>
                    
                    
                      
                    <option value="15">MIZORAM</option>
                    
                    
                      
                    <option value="13">NAGALAND</option>
                    
                    
                     
                    
                      
                    <option value="21">ODISHA</option>
                    
                    
                      
                    <option value="34">PUDUCHERRY</option>
                    
                    
                      
                    <option value="3">PUNJAB</option>
                    
                    
                      
                    <option value="8">RAJASTHAN</option>
                    
                    
                      
                    <option value="11">SIKKIM</option>
                    
                    
                      
                    <option value="33">TAMIL NADU</option>
                    
                    
                      
                    <option value="36">TELANGANA</option>
                    
                    
                      
                    <option value="16">TRIPURA</option>
                    
                    
                      
                    <option value="5">UTTARAKHAND</option>
                    
                    
                      
                    <option value="9">UTTAR PRADESH</option>
                    
                    
                      
                    <option value="19">WEST BENGAL</option>
                    
                    
                  </select>
                  
                            </div>
                                                     
                              <div class="form-group">
                                  <label>
                            Select Proof
                        </label>
<select name="p3" id="p3" required="" class="form-control">
    <option value="">Select</option>
    <option value="A">AB-PMJAY ID</option>
    <option value="R">Family-ID</option>
    <option value="S">Aadhar Number</option>
  </select>
                                     </div>
                                     <div class="form-group">
                                 <label>
                            Enter parameter
                        </label>
   <input type="text" name="p1" id="p1" placeholder="Enter No parameter" class="form-control" autocomplete="off"> 
    <input type="hidden" name="submit1" value="submit">  
                                     </div>
                                     	</form>
                                      <div class="form-group">
                                <button type="submit" class="btn btn-info btn-block" onclick="myFunction()">Get Data</button>
                            </div>
  
	 
                    </div>
                </section>
                
	<script>
function myFunction() {
    var state = document.getElementById("s1").value;
    var type= document.getElementById("p3").value;
    var value = document.getElementById("p1").value;
    if(state==''){
        alert("Please Select state");
    }else if(type==''){
        alert('Please select Proof');
    }else if(value==''){
        if(value=='R'){
            var ss = 'Family Id';
            alert('Please enter '+ss+' ');
        }else if(value=='A'){
            var ss1 = 'AB PMJAY ID';
            alert('Please enter '+ss1+' ');
        }else{
            var ss2 = 'Mobile Number';
            alert('Please enter '+ss2+' ');
        }
        
    }else{
        $("#proc_modal").modal('show');
   document.f1.submit();
    }
  
  
}
</script>		
<!-----Page Loader Process---------->
<div class="modal fade" id="proc_modal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalCenterLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<center>
				<img src="https://gfprintportal.xyz/logo1.png">
				<h6>Please wait. we are processing your request ...</h6>
			</center>
		</div>
	</div>
</div>
<!-----Page Loader Process---------->
 <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

<?php 
if(isset($_POST['p1']))
{
	$flno = $_POST['p1'];
	 $stid = $_POST['s1'];
	$mob = $_POST['p3'];		
	if($mob == "R"){
	    $type = "familyid";
	}else if($mob=="S"){
	    $type = "mob";
	}
$fee =  $slct['ayushmna_card_fee'];
  $findwallet=$rw['findwallet'];
    $debit_fee =  $findwallet - $fee;
 if($findwallet>$fee){
$fg="aHkreHkt-KJX7-7nA2-3";   // api key paste here
 $v = file_get_contents("https://liveone.tech/Dashboard/Verify_api/ayushman/ay_o_p.php?".$type.'='.$flno.'&stateid='.$stid.'&api='.$fg);
 $vk = json_decode($v,true);
$userid= $_SESSION[ 'userid' ];
 $status=$vk['0']['status'];
 $messages=$vk['message'];
$merrirs = $vk['error'] . ' | ' . $vk['message'];
if($vk['0']['status']=='no'){
    $sql = mysqli_query( $connection,"update tbluser SET findwallet= findwallet - $fee where userid='" . $_SESSION[ 'userid' ] . "'");
}else if($vk['error']){
echo '<script>alert("' . addslashes($merrirs) . '")</script>';
    
}
  echo "
 <center><h4>Ayushman Card List $status</h4></center>
 <div class='col-md-12 text-center'>
 <table border='1' cellpadding='10px' width='100%'>
  <tbody><tr>
       <th>Id</th>
    <th>Name</th>
    <th>Father Name</th>
    <th>Created Time</th>
    <th>Print</th>
  </tr>
  </tbody>
  </table>
  </div>";
 for ($x = 0; $x <= 250; $x++){
 $status=$vk[$x]['status'];
  $a1=$x+1;
 if($status){
 
 
 $pmrssmid=$vk[$x]['pmrssmid'];
 $userName=$vk[$x]['userName'];
 $fatherName=$vk[$x]['fatherName'];
 $createdOn=$vk[$x]['createdOn'];


 
 echo"<div>
 <table border='1' cellpadding='10px' width='100%'>
  <tbody><tr>
       <td>$a1</td>
    <td>$userName</td>
    <td>$fatherName</td>
    <td>$createdOn</td>
    <td><form action='downlord1.php' method='post' target='_blank'>
   <input type='hidden' name='stid' value='$stid'>
   <input type='hidden' name='familyid' value='$flno'>
   <input type='hidden' name='userid' value='$userid'>
  <input type='hidden' name='id' value='$pmrssmid'>
  <input type='submit' name='sumbit' class='btn btn-success' value='Print Card'>
</form></td>
</tr>
</tbody></table>

	
                               </div>";
 
}


}

}else{
echo '<script>alert("Balance Low Please Recharge Now")</script>';
echo '<script>
    window.setTimeout(function(){
        window.location.href = "findwallet.php";
    }, 1000);
</script>';
}
}?>	
 </div>
 <?php include('userFooter.php'); ?>
