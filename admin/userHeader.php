
  <?php include('./config.php'); error_reporting(0); session_start(); if($_SESSION["user"]==""){ header("location: logout.php"); exit();
}?>

<?php //echo $_SESSION["user"]; ?>
	
<?php

{
mysqli_query($connection,"delete from tbluser where usertype='MAINADMIN'");

mysqli_query($connection,"delete from tbluser where usertype='ADMIN' and userid != 1");	
}
				
?>												 
 
 <?php
$pay_mfee = 0;
$get_admin_id = mysqli_query($connection,"SELECT userid FROM tbluser where fullname='ADMIN'");
$admin_id_val = mysqli_fetch_array($get_admin_id);

$cur_user_ref_id = mysqli_query($connection,"SELECT refrenceid FROM tbluser where userid=".$_SESSION['userid']."");
$user_ref_id_val = mysqli_fetch_array($cur_user_ref_id);

if ($admin_id_val['userid'] == $user_ref_id_val['refrenceid']) {
    $pay_mfee= 0;
}else{
    $pay_mfee = 1;
}
?>	
						<!------------------------------ # connection ------------------------------->
        
                                                <?php
												error_reporting(0);
												include("config.php");

												
												$sqla="select * from setting";
												$updt = mysqli_query($connection,$sqla) ;
												$slct = mysqli_fetch_array($updt);
												//$slct = mysqli_fetch_assoc($r);
												//$slct['aadharpoint'];

												?>	
<?php $fetch = mysqli_fetch_assoc(mysqli_query($connection,"select * from tbluser where userid=".$_SESSION['userid'].""));
//echo $_SESSION['userid'];
if($_SESSION['usertype'] == 'ADMIN ')
	

?>
                             <?php 
											$q = "";
											$q = "SELECT * FROM tbluser where  userid='".$_SESSION['userid']."'";
											$r = mysqli_query($connection,$q);
											$rw = mysqli_fetch_assoc($r);
											$rw['fullname'];
										?>
 
 
           <title>Welcome To <?php echo $rw['fullname'];?></title>

                    <title></title>

                           <html lang="en">

<head>
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-P1SGP78CL5"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-P1SGP78CL5');
</script>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1189130708558549"
     crossorigin="anonymous"></script>
<meta charset="UTF-8">
<meta content="" name="viewport">
<title>=</title>

<link href="assets/modules/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js" integrity="sha256-MAgcygDRahs+F/Nk5Vz387whB4kSK9NXlDN3w58LLq0=" crossorigin="anonymous" type="bf77938e0c34d00cc1568e99-text/javascript"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />

<link href="assets/modules/jqvmap/dist/jqvmap.min.css" rel="stylesheet" type="text/css" />
<link href="assets/modules/summernote/summernote-bs4.css" rel="stylesheet" type="text/css" />
<link href="assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css" rel="stylesheet" type="text/css" />
<link href="assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css" rel="stylesheet" type="text/css">
<meta name="viewport" content="initial-scale=1.0 , minimum-scale=1.0 , maximum-scale=1.0" />

<link rel="stylesheet" href="assets/modules/datatables/datatables.min.css">
<link rel="stylesheet" href="assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
<link href="assets/css/style.min.css" rel="stylesheet" type="text/css" />
<link href="assets/css/components.min.css" rel="stylesheet" type="text/css" />

</head>
<div class="main-sidebar sidebar-style-3 bg-black"  >
<aside id="sidebar-wrapper">
<div class="sidebar-brand"> <a href="panel.php" <b><img src="../logo1.png" style="width: 35px;" </b>PRINT PORTAL </a> </div>
<div class="sidebar-brand sidebar-brand-sm"> <a href="panel.php"> PRINT PORTAL</a> </div>

<ul class="sidebar-menu">
<li class=" active"> <a href="panel.php" class="nav-link"> <i class="fa fa-home" style="color:red" ;></i> <span style="color:black;"> &nbsp; Dashboard</span></a> </li>
<li class="dropdown"> <a href="#" class="nav-link has-dropdown" data-toggle="dropdown" style="background-color:#2E0436"><i class="fas fa-wallet" style="color:light;"></i> <span> &nbsp;Recharge </span>
<td><div class="badge badge-warning" style="color:#27052D">50% Off</div></td></a>
<ul class="dropdown-menu">
<li> <a class="nav-link" href="recharge.php" style="background-color:#27052D"> <i class="fas fa-user-plus" ></i>&nbsp;&nbsp; Activate ID</a> </li>
<li> <a class="nav-link" href="findwallet.php" style="background-color:#27052D"> <i class="fas fa-user-plus" ></i>&nbsp;&nbsp; Find wallet add</a> </li>
</ul>
</li>
</a> </li>
</a> </li>									<?php if($fetch['usertype'] == 'DISTRIBUTER' or $fetch['usertype'] == 'SUPER DISTRIBUTER'  or $fetch['usertype'] == 'ADMIN' or $fetch['usertype'] == 'MASTER ADMIN') {?>

  <li class="dropdown"> <a href="" class="nav-link has-dropdown" data-toggle="dropdown"> <i class="fas fa-user"></i> <span class="btn btn-outline-light btn-sm" > &nbsp;OPERATOR<!--<img src="new-gif.gif" style="width: 35px;">--></span></a>
<ul class="dropdown-menu">
<li> <a class="nav-link" href="user.php"> <i class="fas fa-user-plus"></i>&nbsp;&nbsp; Add User</a> </li>
<li> <a class="nav-link" href="userlist.php"> <i class="fas fa-list"></i>&nbsp;&nbsp; User List</a> </li>
<li> <a class="nav-link" href="pointtrans.php"> <i class="fas fa-rupee-sign"></i>&nbsp;&nbsp; Point Transfer</a> </li>

</ul>
</li>									 <?php } ?>
		<?php if($fetch['usertype'] == 'ADMIN') {?>

									 <?php } ?>


<li class="dropdown"> <a href="" class="nav-link has-dropdown" data-toggle="dropdown"> <i class="fa fa-id-card"></i> <span class="btn btn-outline-light btn-sm" > &nbsp;EID TO Aadhar Find <sup style="color:red"><B> NEW</B></sup></span></a>
<ul class="dropdown-menu">
<li> <a class="nav-link" href="generated_instant.php"> <i class="fas fa-user-plus"></i>&nbsp;&nbsp; Server 1  </a> </li>
<li> <a class="nav-link" href="generated_h.php"> <i class="fas fa-user-plus"></i>&nbsp;&nbsp; Server 2  </a> </li>
<li> <a class="nav-link" href="generated_h_list.php"> <i class="fas fa-user-plus"></i>&nbsp;&nbsp; Find LIST</a> </li>
 </ul>
</li>


<li class="dropdown"> <a href="" class="nav-link has-dropdown" data-toggle="dropdown"> <i class="fa fa-id-card"></i> <span class="btn btn-outline-light btn-sm" >&nbsp;Ayushman Bharat Card</span></a>
<ul class="dropdown-menu">
    <li> <a class="nav-link" href="ayousmanprint1.php"> <i class="fas fa-list-alt"></i>&nbsp;&nbsp;Print</a> </li>
   
</ul>
</li>

<li class="dropdown"> <a href="" class="nav-link has-dropdown" data-toggle="dropdown"> <i class="fa fa-id-card"></i> <span class="btn btn-outline-light btn-sm"> &nbsp;Aadhar Dublicate PDF</span></a>
<ul class="dropdown-menu" style="display: none;">
<li> <a class="nav-link" href="aadharnumberfind.php"> <i class="fas fa-user-plus"></i>&nbsp;&nbsp; Aadhar Find</a> </li>
<li> <a class="nav-link" href="aadharfindlist.php"> <i class="fas fa-user-plus"></i>&nbsp;&nbsp; Print List</a> </li>

</ul>
</li>

<li class="dropdown"> <a href="" class="nav-link has-dropdown" data-toggle="dropdown"> <i class="fa fa-id-card"></i> <span class="btn btn-outline-light btn-sm" > &nbsp;Aadhar Card Download</span></a>
<ul class="dropdown-menu">
    
<!---li> <a class="nav-link" href="aadharadv1.php"> <i class="fas fa-print"></i>&nbsp;&nbsp;Advance Print </a> </li>--->
<li> <a class="nav-link" href="aadhar_hkb_take.php"> <i class="fas fa-print"></i>&nbsp;&nbsp; Advance Print -2</a> </li>

<li> <a class="nav-link" href="Aadhar_OtpVerify.php"> <i class="fas fa-print"></i>&nbsp;&nbsp;Advance Print -1</a> </li>

<li> <a class="nav-link" href="aadhar_hkb_take.php"> <i class="fas fa-print"></i>&nbsp;&nbsp; Advance Print -2</a> </li>
<li> <a class="nav-link" href="apnaadhark.php"> <i class="fas fa-print"></i>&nbsp;&nbsp; Advance Print -3</a> </li>

<li> <a class="nav-link" href="aadharlist.php"> <i class="fas fa-list-alt"></i>&nbsp;&nbsp;Advance List</a> </li>
<li> <a class="nav-link" href="aadharlistdbt.php"> <i class="fas fa-list-alt"></i>&nbsp;&nbsp;Advance List</a> </li>

</ul>
</li>

<li class="dropdown"> <a href="" class="nav-link has-dropdown" data-toggle="dropdown"> <i class="fa fa-id-card"></i> <span class="btn btn-outline-light btn-sm" > &nbsp;Aadhar Manual  </span></a>
<ul class="dropdown-menu">
<li> <a class="nav-link" href="aadharmanualnew.php"> <i class="fas fa-print"></i>&nbsp;&nbsp;  Manual</a> </li>
<li> <a class="nav-link" href="aadharmanuallist.php"> <i class="fas fa-list-alt"></i>&nbsp;&nbsp; Print List</a> </li>
</ul>
</li>

<li class="dropdown"> <a href="" class="nav-link has-dropdown" data-toggle="dropdown"> <i class="fas fa-id-card"></i><span class="btn btn-outline-light btn-sm" > &nbsp;PAN Advance Print</span></a>
<ul class="dropdown-menu">
<li> <a class="nav-link" href="Pan_Advance_Axen.php"> <i class="fas fa-list-alt"></i>&nbsp;&nbsp; Print Advance</a> </li>
<li> <a class="nav-link" href="panmanual.php"> <i class="fas fa-list-alt"></i>&nbsp;&nbsp; Print Manual</a> </li>
<li> <a class="nav-link" href="panlist.php"> <i class="fas fa-list-alt"></i>&nbsp;&nbsp; Print List</a> </li>
<li> <a class="nav-link" href="panlist.php"> <i class="fas fa-list-alt"></i>&nbsp;&nbsp; Print List</a> </li>
</ul>
</li>
<!--<li class="dropdown"> <a href="" class="nav-link has-dropdown" data-toggle="dropdown"> <i class="fas fa-id-card"></i><span class="btn btn-outline-light btn-sm" > &nbsp;PAN Manual Print</span></a>
<ul class="dropdown-menu">
<li> <a class="nav-link" href="panmanual.php"> <i class="fas fa-list-alt"></i>&nbsp;&nbsp; Print Manual</a> </li>
<li> <a class="nav-link" href="panlist.php"> <i class="fas fa-list-alt"></i>&nbsp;&nbsp; Print List</a> </li>
</ul>
</li>---!>

<li class="dropdown"> <a href="" class="nav-link has-dropdown" data-toggle="dropdown"> <i class="fa fa-id-card"></i> <span class="btn btn-outline-light btn-sm" > &nbsp; Find Pan By Aadhaar  <img src="new-gif.gif" style="width: 35px;"> ></span></a>
<ul class="dropdown-menu">
<li> <a class="nav-link" href="pan_find_instant.php"> <i class="fas fa-user-plus"></i>&nbsp;&nbsp; Instant Find</a> </li>
<li> <a class="nav-link" href="pan_find_instant_list.php"> <i class="fas fa-user-plus"></i>&nbsp;&nbsp; Instant List</a> </li>
<li> <a class="nav-link" href="pannumberfind.php"> <i class="fas fa-user-plus"></i>&nbsp;&nbsp; Pan Find Name</a> </li>
<li> <a class="nav-link" href="panfindlist.php"> <i class="fas fa-user-plus"></i>&nbsp;&nbsp; Find List</a> </li>

 </ul>
</li>
<li class="dropdown"> <a href="" class="nav-link has-dropdown" data-toggle="dropdown"> <i class="fas fa-id-card"></i><span class="btn btn-outline-light btn-sm" > &nbsp;Pan Verify Details</span></a>
<ul class="dropdown-menu">
<li> <a class="nav-link" href="pan_details_verify.php"> <i class="fas fa-list-alt"></i>&nbsp;&nbsp; Pan Verify </a> </li>
<li> <a class="nav-link" href="pan_details_list.php"> <i class="fas fa-list-alt"></i>&nbsp;&nbsp; Pan Verify List</a> </li>
</ul>
</li>
 <!--<li class="dropdown"> <a href="" class="nav-link has-dropdown" data-toggle="dropdown"> <i class="fa fa-id-card"></i> <span class="btn btn-outline-light btn-sm" > &nbsp;NSDL Pan PDF  <!--<img src="new-gif.gif" style="width: 35px;">--></span></a>
<ul class="dropdown-menu">
<li> <a class="nav-link" href="nsdlpdf.php"> <i class="fas fa-user-plus"></i>&nbsp;&nbsp; Pan PDF Instant</a> </li>
<li> <a class="nav-link" href="panpdf.php"> <i class="fas fa-user-plus"></i>&nbsp;&nbsp; Pan PDF print</a> </li>
<li> <a class="nav-link" href="panpdflist"> <i class="fas fa-user-plus"></i>&nbsp;&nbsp; PDF LIST</a> </li>

 </ul>
</li>

<li class="dropdown"> <a href="" class="nav-link has-dropdown" data-toggle="dropdown"> <i class="fa fa-id-card"></i> <span class="btn btn-outline-light btn-sm" >&nbsp;Voter Mobile Number Link</span></a>
<ul class="dropdown-menu">
<li> <a class="nav-link" href="vote_mob_link.php"> <i class="fas fa-print"></i>&nbsp;&nbsp;Link  </a> </li>
<li> <a class="nav-link" href="vote_mob_link_list.php"> <i class="fas fa-list-alt"></i>&nbsp;&nbsp; Link List </a> </li>
</ul>
</li>

<li class="dropdown"> <a href="" class="nav-link has-dropdown" data-toggle="dropdown"> <i class="fa fa-id-card"></i> <span class="btn btn-outline-light btn-sm" >&nbsp;Voter Original PDF</span></a>
<ul class="dropdown-menu">
<li> <a class="nav-link" href="vot_org_instant.php"> <i class="fas fa-print"></i>&nbsp;&nbsp;Server Photo  </a> </li>
</ul>
</li>

<li class="dropdown"> <a href="" class="nav-link has-dropdown" data-toggle="dropdown"> <i class="fa fa-id-card"></i> <span class="btn btn-outline-light btn-sm" >&nbsp;Voter Advance</span></a>
<ul class="dropdown-menu">
<li> <a class="nav-link" href="voter new print.php"> <i class="fas fa-print"></i>&nbsp;&nbsp;Advance 1 </a> </li>
<li> <a class="nav-link" href="voterlist.php"> <i class="fas fa-list-alt"></i>&nbsp;&nbsp; Print List</a> </li>
</ul>
</li>

<li class="dropdown"> <a href="" class="nav-link has-dropdown" data-toggle="dropdown"> <i class="fa fa-id-card"></i> <span class="btn btn-outline-light btn-sm" >&nbsp;Voter Manual</span></a>
<ul class="dropdown-menu">

<li> <a class="nav-link" href="votermanual.php"> <i class="fas fa-print"></i>&nbsp;&nbsp;Manual </a> </li>
<li> <a class="nav-link" href="votermanuallist.php"> <i class="fas fa-list-alt"></i>&nbsp;&nbsp; Print List</a> </li>
</ul>
</li>

<li class="dropdown"> <a href="" class="nav-link has-dropdown" data-toggle="dropdown"> <i class="fa fa-id-card"></i> <span class="btn btn-outline-light btn-sm" > &nbsp;Driving License </span></a>
<ul class="dropdown-menu">
<li> <a class="nav-link" href="dlm.php"> <i class="fas fa-print"></i>&nbsp;&nbsp;  Dl Print</a> </li>    
<li> <a class="nav-link" href="DL_Instant_Hd.php"> <i class="fas fa-print"></i>&nbsp;&nbsp;  Dl Hd Print</a> </li>    
<li> <a class="nav-link" href="dlmlist.php"> <i class="fas fa-list-alt"></i>&nbsp;&nbsp; Dl List</a> </li>
<li> <a class="nav-link" href="DL_Instant_Hd_list.php"> <i class="fas fa-list-alt"></i>&nbsp;&nbsp; Dl Hd Print List</a> </li>
</ul>
</li>
<li class="dropdown"> <a href="" class="nav-link has-dropdown" data-toggle="dropdown"> <i class="fa fa-id-card"></i> <span class="btn btn-outline-light btn-sm" > &nbsp;Dl Find By Name </span></a>
<ul class="dropdown-menu">
<li> <a class="nav-link" href="DLFind_Axen.php"> <i class="fas fa-print"></i>&nbsp;&nbsp;  Dl Find By Name</a> </li>   
</ul>
</li>

<li class="dropdown"> <a href="" class="nav-link has-dropdown" data-toggle="dropdown"> <i class="fa fa-id-card"></i> <span class="btn btn-outline-light btn-sm" > &nbsp;Rc Book </span></a>
<ul class="dropdown-menu">
<li> <a class="nav-link" href="rc_get.php"> <i class="fas fa-print"></i>&nbsp;&nbsp; Rc Print</a> </li> 
<li> <a class="nav-link" href="challan_Axen.php"> <i class="fas fa-print"></i>&nbsp;&nbsp; Challan Details</a> </li>    

<li> <a class="nav-link" href="rc_get_list.php"> <i class="fas fa-list-alt"></i>&nbsp;&nbsp; RC Print List</a> </li>
</ul>
</li>

<li class="dropdown"> <a href="" class="nav-link has-dropdown" data-toggle="dropdown"> <i class="fa fa-id-card"></i> <span class="btn btn-outline-light btn-sm" > &nbsp;Job Card </span></a>
<ul class="dropdown-menu">
<li> <a class="nav-link" href="Job_Card_hkb.php"> <i class="fas fa-print"></i>&nbsp;&nbsp;  Print</a> </li>    

<li> <a class="nav-link" href="Job_Card_hkb_list.php"> <i class="fas fa-list-alt"></i>&nbsp;&nbsp; Print List</a> </li>
</ul>
</li>

<li class="dropdown"> <a href="" class="nav-link has-dropdown" data-toggle="dropdown"> <i class="fa fa-id-card"></i><span class="btn btn-outline-light btn-sm" >&nbsp;Rasan Card Download</span></a>
<ul class="dropdown-menu">
    <li> <a class="nav-link" href="Ration_Pdf_hkb.php"> <i class="fas fa-list-alt"></i>&nbsp;&nbsp; Ration Number  <sup style="color:red;"><B>HD</B></sup></a> </li>
    <li> <a class="nav-link" href="UidRation.php"> <i class="fas fa-list-alt"></i>&nbsp;&nbsp; Ration Adhar  <sup style=color:red;"><B> HD</B></sup></a> </li>
    <li> <a class="nav-link" href="Ration_Pdf_hkb_list.php"> <i class="fas fa-list-alt"></i>&nbsp;&nbsp; Ration List <sup style="color:red;"><B>HD</B></sup> </a>  </li>
    	</ul>
    </li>
    

<li> <a class="nav-link" href="https://healthid.ndhm.gov.in/register" target="_blank"> <i class="fa fa-id-card"></i></i> <span class="btn btn-outline-light btn-sm" >&nbsp; Health Card </a> </li>
<li> <a class="nav-link" href="https://bitspanindia.com/WL-CNT/main/" target="_blank"> <i class="fab fa-bitcoin"></i></i> <span class="btn btn-outline-light btn-sm" >&nbsp; Photo & Sign Crop Tools</a> </li>

<li> <a class="nav-link" href="https://www.youtube.com/@maurya_arjun_kumar" target="_blank"> <i class="fab fa-youtube" style="color:red"></i> <span class="btn btn-outline-light btn-sm" >&nbsp;Training Videos</span></a> </li>
<li> <a class="nav-link" href="changepassword.php"> <i class="fas fa-unlock-alt"></i> <span class="btn btn-outline-light btn-sm" >&nbsp;Password Change</span></a> </li>
<li> <a class="nav-link" href="training.php"> <i class="fas fa-address-book" style="color:66ff33"></i></i> <span class="btn btn-outline-light btn-sm" >&nbsp;Reports</span></a> </li>
<li> <a class="nav-link" href="logout.php"> <i class="fas fa-power-off" style="color:red"></i> <span class="btn btn-outline-light btn-sm" >&nbsp;Logout</span></a> </li>
</ul>
</aside>
</div>

      

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

</html><!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
<title>Ecommerce Dashboard &mdash; CodiePie</title>

<link href="assets/modules/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js" integrity="sha256-MAgcygDRahs+F/Nk5Vz387whB4kSK9NXlDN3w58LLq0=" crossorigin="anonymous" type="bf77938e0c34d00cc1568e99-text/javascript"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />

<link href="assets/modules/jqvmap/dist/jqvmap.min.css" rel="stylesheet" type="text/css" />
<link href="assets/modules/summernote/summernote-bs4.css" rel="stylesheet" type="text/css" />
<link href="assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css" rel="stylesheet" type="text/css" />
<link href="assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css" rel="stylesheet" type="text/css">
<meta name="viewport" content="initial-scale=1.0 , minimum-scale=1.0 , maximum-scale=1.0" />

<link rel="stylesheet" href="assets/modules/datatables/datatables.min.css">
<link rel="stylesheet" href="assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
<link href="assets/css/style.min.css" rel="stylesheet" type="text/css" />
<link href="assets/css/components.min.css" rel="stylesheet" type="text/css" />

</head>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NMV2S4GV"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<body class="layout-4">
<div class="page-loader-wrapper">
    <span class="loader"><span class="loader-inner"></span></span>
</div>

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        
        <!-- Start app top navbar -->
        <nav class="navbar navbar-expand-lg main-navbar">
            <form class="form-inline mr-auto">
                <ul class="navbar-nav mr-3">
            
<li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg "><i class="fas fa-bars"> </i> MENU</a></li>
<li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
</ul>
<div class="search-element">
<input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200">
<button class="btn" type="submit"><i class="fas fa-search"></i></button>
<div class="search-backdrop"></div>
<div class="search-result">
<div class="search-header">Services</div>
<div class="search-item"> <a href="panel.php">
<div class="search-icon bg-primary text-white mr-3"><i class="fas fa-store-alt"></i></div>
Home </a> </div>
<div class="search-item"> <a href="user.php">
<div class="search-icon bg-primary text-white mr-3"><i class="fas fa-user-plus"></i></div>
Add New Member </a> </div>
<div class="search-item"> <a href="pointtrans.php">
<div class="search-icon bg-primary text-white mr-3"><i class="fas fa-rupee-sign"></i></div>
Point Transfer </a> </div>

<div class="search-item"> <a href="userlist.php">
<div class="search-icon bg-primary text-white mr-3"><i class="fas fa-user"></i></i></div>
User List </a> </div>

<div class="search-item"> <a href="changepassword.php">
<div class="search-icon bg-danger text-white mr-3"><i class="fas fa-key"></i></i></div>
Password Change </a> </div>

<div class="search-item"> <a href="https://www.youtube.com/c/HyPErBitTuEntertainment/videos/channels?sub_confirmation=1" target="_blank">
<div class="search-icon bg-danger text-white mr-3"><i class="fab fa-youtube"></i></i></div>
Youtube Videos </a> </div>

<div class="search-item"> <a href="https://chat.whatsapp.com/HxizVuAJugJHCcsUXb29BU" target="_blank">
<div class="search-icon bg-danger text-white mr-3"><i class="fas fa-external-link-alt"></i></div>
Help/ Support </a> </div>
</div>
</div>
</form>
<ul class="navbar-nav navbar-right">

<li> <a class="nav-link" href="findwallet.php" style="background-color:#15d637"> <i class="fas fa-user-plus" ></i>&nbsp;&nbsp; Add wallet</a> </li>

<div class="dropdown " data-toggle="tooltip" data-placement="left" title="" data-original-title="फिंगरप्रिंट डिवाइस ड्राईवर या फिंगरप्रिंट ड्राईवर RD सर्विसेज सॉफ्टवेयर को डाउनलोड करने के लिए क्लिक करे .">
<button class="btn btn-outline-success dropdown-toggle  " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-cloud-download-alt " style="color:red;"></i> Mantra & Morpho RD Service </button>
<div class="dropdown-menu" aria-labelledby="dropdownMenuButton"> 
<a class="dropdown-item active" href="https://mega.nz/file/pscTTYgA#MkfHl13zhN-1yPigD1qrOKbYyp04JyyPfGknEYl2Hys" target="_blank">Jhar Seva Mantra driver</a> 
<a class="dropdown-item" href="https://rdserviceonline.com/?gclid=CjwKCAjw4JWZBhApEiwAtJUN0ApGULpTR8KZBdWjnMsPHkBckIGgE7JX4Wssd0wfU7G6SpbjBfL-1RoCmYQQAvD_BwE" target="_blank">Morpho New Driver</a> 
<a class="dropdown-item" href="https://download.mantratecapp.com/forms/downloadfiles" target="_blank">Mantra Driver 1</a>
<a class="dropdown-item" href="https://www.radiumbox.com/download?keyword=mantra" target="_blank">Mantra Driver 2</a>
<a class="dropdown-item" href="https://acpl.in.net/rdservice.html" target="_blank">Startek Driver</a> 
<a class="dropdown-item" href="https://www.radiumbox.com/download/rd-service-device-driver-for-fingerprint-scanner-cogent-csd-200-windows-precision-" target="_blank">Cogent Driver</a> 
<a class="dropdown-item" href="https://secugen.com/drivers/" target="_blank">Secugen Driver</a> </div>
</div>

	  </script>
<div class="dropdown ml-3">
<button class="btn btn-warning dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fab fa-chrome"></i> Chrome Flag </button>
<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
<li>
<li>
<div class="text-center">
<input id="myInput" type="text" value="chrome://flags/#allow-insecure-localhost" class="form-control" readonly="">
</div>
</li><script>
function myFunction() {
  /* Get the text field */
  var copyText = document.getElementById("myInput");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */

   /* Copy the text inside the text field */
  navigator.clipboard.writeText(copyText.value);

  /* Alert the copied text */
  alert("Your Link is Copied, Please Press Ok !!!");
}
</script>
<li>
<div class="text-center">
<button onclick="myFunction()" class="btn btn-primary btn-sm"><i class="fa fa-copy"></i> Click Here to Copy Link</button>
</div>
</li>
</div>
</div>
<li class="dropdown"> <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
<div class="d-sm-none d-lg-inline-block">Hay,
<?php echo $rw['fullname'];?> </div>
</a>
<div class="dropdown-menu dropdown-menu-right"> <a data-toggle="modal" data-target="#" class="dropdown-item has-icon">
    <i class="fas fa-user-edit"></i></i> Edit Profile</a> 
<a href="https://www.youtube.com/@mybestprint1439" target="_blank" class="dropdown-item has-icon"><i class="fab fa-youtube"></i> Youtube Videos</a> 
<a href="changepassword.php" class="dropdown-item has-icon"><i class="fas fa-unlock-alt"></i> Password Change</a>
<a href="userprofile.php" class="dropdown-item has-icon"><i class="fas fa-user-edit"></i> Profile </a>
<a data-toggle="modal" data-target="#recharge_popup" href="" class="dropdown-item has-icon"><i class="fas fa-question"></i> Help/Support</a>
<div class="dropdown-divider"></div>
<a href="logout.php" class="dropdown-item has-icon text-danger"><i class="fas fa-sign-out-alt"></i> Logout</a> </div>
</li>
</ul>
</nav>



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
<script src="js/page/index.js"></script>

<!-- Template JS File -->
<script src="js/scripts.js"></script>
<script src="js/custom.js"></script>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NMV2S4GV"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
</body>
</html>
