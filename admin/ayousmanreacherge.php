<?php if (file_exists(__DIR__ . '/config.php')) {
    include_once(__DIR__ . '/config.php');
} elseif (file_exists(__DIR__ . '/../config.php')) {
    include_once(__DIR__ . '/../config.php');
} elseif (file_exists(__DIR__ . '/../../config.php')) {
    include_once(__DIR__ . '/../../config.php');
} elseif (file_exists(__DIR__ . '/../../../config.php')) {
    include_once(__DIR__ . '/../../../config.php');
} include('userHeader.php'); error_reporting(0); session_start(); if($_SESSION["user"]==""){ header("location: index.php"); exit();
}?>
	
	
	<?php
												error_reporting(0);
												if (file_exists(__DIR__ . '/config.php')) {
    include_once(__DIR__ . '/config.php');
} elseif (file_exists(__DIR__ . '/../config.php')) {
    include_once(__DIR__ . '/../config.php');
} elseif (file_exists(__DIR__ . '/../../config.php')) {
    include_once(__DIR__ . '/../../config.php');
} elseif (file_exists(__DIR__ . '/../../../config.php')) {
    include_once(__DIR__ . '/../../../config.php');
}

												
												$sqla="select * from setting";
												$updt = mysqli_query($connection,$sqla) ;
												$slct = mysqli_fetch_array($updt);
												//$slct = mysqli_fetch_assoc($r);
												//$slct['aadharpoint'];

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
 <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
  
          <h4 class="card-title"></h4>
<div class="container-fluid">
<html dir="ltr" lang="en">
<head>
<style>
    body {
        background-color: #f7f7f7;
        margin-top: 20px;
    }

    /* pricing tables */
    .pricing-table {
        background: #e9f0f4;
        text-align: center;
        margin: 15px 0;
    }

    .pricing-table ul,
    .pricing-table ol {
        margin-bottom: 0;
        padding-left: 0;
    }

    .pricing-title {
        font-size: 1.5rem;
        font-weight: 700;
        padding: 30px;
        margin-bottom: 0;
    }

    .pricing-table-price {
        background: #cdd4d8;
        font-weight: 700;
        padding: 10px;
        margin-bottom: 30px;
    }

    .pricing-table-price.w-rounded-price {
        display: table;
        width: 150px;
        height: 150px;
        border-radius: 50%;
        margin: 0 auto 30px auto;
        padding: 0;
    }

    .rounded-price {
        display: table-cell;
        text-align: center;
        vertical-align: middle;
    }

    .rounded-price .pricing-price {
        font-size: 1.75rem;
    }

    .rounded-price .pricing-currency {
        vertical-align: 10px;
    }

    .pricing-table-price p {
        color: #000;
        margin-bottom: 0;
    }

    .pricing-currency {
        font-size: 1rem;
        font-weight: 700;
        vertical-align: 25px;
    }

    .pricing-price {
        font-size: 3rem;
        font-weight: 700;
    }

    .pricing-period {
        font-weight: 700;
    }

    .pricing-table-content li {
        margin-bottom: 15px;
    }

    .pricing-table-button {
        padding: 15px 0 35px;
    }

    .featured.pricing-table {
        background: #9c64b8;
    }

    .featured.pricing-table .pricing-title {
        color: #fff;
    }

    .featured.pricing-table .pricing-table-content ul li {
        color: #eee;
    }

    .featured.pricing-table .pricing-table-price {
        background: #8853a1;
    }

    .featured.pricing-table .pricing-table-price p {
        color: #fff;
    }

    ul {
        list-style: none;
        padding: 0;
    }

    .bg-info-hover {
        background-color: #1397af !important;
    }

    .bg-info {
        background-color: #21b9d5 !important;
    }

    .bg-primary-hover {
        background-color: #8853a1 !important;
    }

    .bg-primary {
        background-color: #a54949 !important;
    }

    .text-white {
        color: #fff !important;
    }
    </style>
</head>
<body>



<style type="text/css">
            .scroll {
                
                
                width: auto;
                height: 900px;
                overflow-x: hidden;
                overflow-y: auto;
                text-align:justify;
            }
            
            .hide-menu{
                font-size: 18px;
                
            }
            </style>






<div class="white-box p-0">
<section id="pricing" class="bg-white">
<div class="container">
<div class="row">
    <div class="col-md-4 col-sm-6">
        <div class="pricing-table-1 premium">
            <div class="pricing-table-header">
                <h4><strong>AYUSHMAN PRINT</strong></h4>
                <h4><strong>₹ 10 PLAN</strong></h4>
            </div>
            <div class="price">01 Ayushman Download</div>
            <div class="pricing-body">
                <ul class="pricing-table-ul">
                    <li><i class="fa fa-database"></i>You will get 10 Ayushman Wallet Point</li>
                    <li><i class="fa fa-envelope"></i>Ayusman Print Cost 10 Ayushman Points</li>
                    <li><i class="fa fa-send"></i>Anytime Recharge</li>
                    <li><i class="fa fa-cloud"></i> Instant Automatic Wallet</li>
                    <li><i class="fa fa-database"></i> No Extra Charges for PDF</li>
                </ul></div>
                                    <!-- Pricing Features End -->
                  <form action="findwallet.php" method="POST">               
                 <input type="submit" name="sub_val" class="view-more" value="Click Here To Buy This Plan" id="pay_now" style="margin-top:5px;background: #cc0a1a;
    border: none;padding: 13px;
    border-radius: 25px;
"/>
                  </form>
        </div>
    </div>
    
    
    <div class="col-md-4 col-sm-6">
        <div class="pricing-table-3 basic">
            <div class="pricing-table-header">
                <h4><strong>AYUSHMAN PRINT</strong></h4>
                <h4><strong>₹ 100 PLAN</strong></h4>
            </div>
            <div class="price">12 Ayushman Download</div>
            <div class="pricing-body">
                <ul class="pricing-table-ul">
                    <li><i class="fa fa-database"></i>You will get 120 Ayushman Wallet Point</li>
                    <li><i class="fa fa-envelope"></i>Ayusman Print Cost 10 Ayushman Points</li>
                    <li><i class="fa fa-send"></i>Anytime Recharge</li>
                    <li><i class="fa fa-cloud"></i> Instant Automatic Wallet</li>
                    <li><i class="fa fa-database"></i> No Extra Charges for PDF</li>
                </ul></div>
                                   <!-- Pricing Features End -->
                  <form action="findwallet.php" method="POST">
                  <input type="hidden" name="amount" value="100" class="form-control" readonly size="20" style="width: 224px;margin-top:10px;">
                  <input type="hidden" name="did" value="1" class="form-control" readonly size="20" style="width: 224px;margin-top:10px;">
                  <input type="hidden" name="userid" value="ADMIN" class="form-control" readonly size="20" style="width: 224px;margin-top:10px;">
                 <input type="submit" name="sub_val" class="view-more" value="Click Here To Buy This Plan" id="pay_now" style="margin-top:5px;background: #3b7a07;
    border: none;padding: 13px;
    border-radius: 25px;
"/>
                  </form>
        </div>
    </div>
    <div class="col-md-4 col-sm-12">
        <div class="pricing-table-3 business">
            <div class="pricing-table-header">
                <h4><strong>AYUSHMAN PRINT</strong></h4>
                <h4><strong>₹ 199 PLAN</strong></h4>
            </div>
            <div class="price">28 Ayushman Download</div>
            <div class="pricing-body">
                <ul class="pricing-table-ul">
                    <li><i class="fa fa-database"></i>You will get 280 Ayushman Wallet Point</li>
                    <li><i class="fa fa-envelope"></i>Ayusman Print Cost 10 Ayushman Points</li>
                    <li><i class="fa fa-send"></i>Anytime Recharge</li>
                    <li><i class="fa fa-cloud"></i> Instant Automatic Wallet</li>
                    <li><i class="fa fa-database"></i> No Extra Charges for PDF</li>
                </ul></div>
                                  <!-- Pricing Features End -->
                  <form action="findwallet.php" method="POST">
                  <input type="hidden" name="amount" value="199" class="form-control" readonly size="20" style="width: 224px;margin-top:10px;">
                  <input type="hidden" name="did" value="1" class="form-control" readonly size="20" style="width: 224px;margin-top:10px;">
                  <input type="hidden" name="userid" value="ADMIN" class="form-control" readonly size="20" style="width: 224px;margin-top:10px;">
                 <input type="submit" name="sub_val" class="view-more" value="Click Here To Buy This Plan" id="pay_now" style="margin-top:5px;background: #093adb;
    border: none;padding: 13px;
    border-radius: 25px;
"/>
                  </form>
        </div>
    </div>
</div>

<style>
    
    @charset "utf-8";
/* CSS Document */
@import url(http://fonts.googleapis.com/css?family=Open+Sans:300italic,500,400,300,800);
@import url(http://fonts.googleapis.com/css?family=Ubuntu:300,400,700);
@import url(http://fonts.googleapis.com/css?family=Roboto:100,300,400);

body{ 
    background-color:#f0f3f6;
	overflow-x: hidden;

}
h1,h2,h3,h4,h5,h6,div,input,p,a{
    font-family: "Open Sans";  
    margin:0px; 
}

h3{ 
    font-size:22px;
}
.container-fluid,.container { 
    margin:auto;
	padding:0px 15px;
	max-width:1200px;
}
label{
	font-weight:500;
}
.form-group{
	margin-bottom:5px;
}


input,textarea,select,button{	
    margin: 5px 0px ;
    font-size:13px !important; 
    border-radius:0px;
}
input[type=text],input[type=password],textarea,input[type=email],select,textarea{ 
    width: 100%; 
    border:1px solid #DADADA;	
    padding: 5px 10px;	
    height:45px; 	
}
input[type=submit],input[type=button],input[type=reset],button{
    border:none; 
    font-size: 11px; 	
	border-radius:3px;
	height:45px;
	color:#FFF;
}

.btn:hover,.btn:focus{  
    cursor:pointer; 
    color:#FFF;
}
input[type=radio]{
    margin:0px;
    padding:0px; 
    height:auto;
}
.form-control{ 
    box-shadow:none !important;  
	border-radius:0px;
}
.form-control:focus{
    border:1px solid #CCC;
}
.btn:focus{
	box-shadow:none !important;
}

textarea{ 
    width: 100%;
}
input[type=reset]{ 
    margin-left: 10px;
}
textarea{
	min-height:100px;
}
a{ 
    color: inherit;
}
a:hover,a:focus{ 
    text-decoration: none !important; 
    color: inherit !important;
}
ul{
    margin: 0px; 
    padding: 0px; 
    list-style: none;
}
.relative{ 
    position: relative;
}
.absolute{ 
    position: absolute;
}
.fixed{ 
    position: fixed;
}

.pricing-table-container{
	padding:50px 0px;
}
.description{
	padding:15px 0px;
}
.description a{
	padding:10px;
	font-size:13px;
	display:block;
	font-weight:bold;
	border-bottom:1px solid #DDD;
}
.description a.active{
	background-color:#FFF;
	padding-left:25px;
}
@charset "utf-8";
/* DEMO 01 */
.pricing-table-3{
	background-color:#FFF;
	margin:15px auto;
	box-shadow:0px 0px 25px rgba(0,0,0,0.1);
	max-width:300px;
	border-radius:0px 10px 0px 10px;
	overflow:hidden;
	position:relative;
	min-height:250px;
	transition:all ease-in-out 0.25s;
}
.pricing-table-3:hover{
	transform:scale(1.1,1.1);
	cursor:pointer;
}

.pricing-table-3.basic .price{
	background-color:#28b6f6;
	color:#FFF;
}
.pricing-table-3.premium .price{
	background-color:#ff9f00;
	color:#FFF;
}
.pricing-table-3.business .price{
	background-color:#c3185c;
	color:#FFF;
}

.pricing-table-3 .pricing-table-header{
	background-color:#212121;
	color:#FFF;
	padding:20px 0px 0px 20px;
	position:absolute;
	z-index:5;
}
.pricing-table-3 .pricing-table-header p{
	font-size:12px;
	opacity:0.7;
}
.pricing-table-3 .pricing-table-header::before{
	content:"";
	position:absolute;
	left:-50px;
	right:-180px;
	height:125px;
	top:-50px;
	background-color:#212121;
	z-index:-1;
	transform:rotate(-20deg)
}

.pricing-table-3 .price{
	position:absolute;
	top:0px;
	text-align:right;
	padding:110px 20px 0px 0px;
	right:0px;
	left:0px;
	font-size:20px;
	z-index:4;
}
.pricing-table-3 .price::before{
	content:"";
	position:absolute;
	left:0px;
	right:0px;
	height:100px;
	bottom:-25px;
	background-color:inherit;
	transform:skewY(10deg);
	z-index:-1;
	box-shadow:0px 5px 0px 5px rgba(0,0,0,0.05);
}


.pricing-table-3 .pricing-body{
	padding:20px;
	padding-top:200px;	
}
.pricing-table-3 .pricing-table-ul li{
	color:rgba(0,0,0,0.7);
	font-size:13px;
	padding:10px;
	border-bottom:1px solid rgba(0,0,0,0.1);
}
.pricing-table-3 .pricing-table-ul .fa{
	margin-right:10px;
}
.pricing-table-3.basic .pricing-table-ul .fa{
	color:#28b6f6;
}
.pricing-table-3.premium .pricing-table-ul .fa{
	color:#ff9f00;
}
.pricing-table-3.business .pricing-table-ul .fa{
	color:#c3185c;
}
.pricing-table-3 .view-more{
	margin:10px 20px;
	display:block;
	text-align:center;
	background-color:#212121;
	padding:10px 0px;
	color:#FFF;
}
h1,h2,h3,h4,h5,h6,div,input,p,a{
    font-family: "Open Sans";  
    margin:0px; 
}

h3{ 
    font-size:22px;
}
.container-fluid,.container { 
    margin:auto;
	padding:0px 15px;
	max-width:1200px;
}
label{
	font-weight:500;
}
.form-group{
	margin-bottom:5px;
}


input,textarea,select,button{	
    margin: 5px 0px ;
    font-size:13px !important; 
    border-radius:0px;
}
input[type=text],input[type=password],textarea,input[type=email],select,textarea{ 
    width: 100%; 
    border:1px solid #DADADA;	
    padding: 5px 10px;	
    height:45px; 	
}
input[type=submit],input[type=button],input[type=reset],button{
    border:none; 
    font-size: 11px; 	
	border-radius:3px;
	height:45px;
	color:#FFF;
}

.btn:hover,.btn:focus{  
    cursor:pointer; 
    color:#FFF;
}
input[type=radio]{
    margin:0px;
    padding:0px; 
    height:auto;
}
.form-control{ 
    box-shadow:none !important;  
	border-radius:0px;
}
.form-control:focus{
    border:1px solid #CCC;
}
.btn:focus{
	box-shadow:none !important;
}

textarea{ 
    width: 100%;
}
input[type=reset]{ 
    margin-left: 10px;
}
textarea{
	min-height:100px;
}
a{ 
    color: inherit;
}
a:hover,a:focus{ 
    text-decoration: none !important; 
    color: inherit !important;
}
ul{
    margin: 0px; 
    padding: 0px; 
    list-style: none;
}
.relative{ 
    position: relative;
}
.absolute{ 
    position: absolute;
}
.fixed{ 
    position: fixed;
}

.pricing-table-container{
	padding:50px 0px;
}
.description{
	padding:15px 0px;
}
.description a{
	padding:10px;
	font-size:13px;
	display:block;
	font-weight:bold;
	border-bottom:1px solid #DDD;
}
.description a.active{
	background-color:#FFF;
	padding-left:25px;
}
@charset "utf-8";
/* DEMO 01 */
.pricing-table-1{
	background-color:#FFF;
	margin:15px auto;
	box-shadow:0px 0px 25px rgba(0,0,0,0.1);
	max-width:300px;
	border-radius:0px 10px 0px 10px;
	overflow:hidden;
	position:relative;
	min-height:250px;
	transition:all ease-in-out 0.25s;
}
.pricing-table-1:hover{
	transform:scale(1.1,1.1);
	cursor:pointer;
}

.pricing-table-1.basic .price{
	background-color:#fa3ced;
	color:#FFF;
}
.pricing-table-1.premium .price{
	background-color:#38ba14;
	color:#FFF;
}
.pricing-table-1.business .price{
	background-color:#f20f53;
	color:#FFF;
}

.pricing-table-1 .pricing-table-header{
	background-color:#212121;
	color:#FFF;
	padding:20px 0px 0px 20px;
	position:absolute;
	z-index:5;
}
.pricing-table-1 .pricing-table-header p{
	font-size:12px;
	opacity:0.7;
}
.pricing-table-1 .pricing-table-header::before{
	content:"";
	position:absolute;
	left:-50px;
	right:-180px;
	height:125px;
	top:-50px;
	background-color:#212121;
	z-index:-1;
	transform:rotate(-20deg)
}

.pricing-table-1 .price{
	position:absolute;
	top:0px;
	text-align:right;
	padding:110px 20px 0px 0px;
	right:0px;
	left:0px;
	font-size:20px;
	z-index:4;
}
.pricing-table-1 .price::before{
	content:"";
	position:absolute;
	left:0px;
	right:0px;
	height:100px;
	bottom:-25px;
	background-color:inherit;
	transform:skewY(10deg);
	z-index:-1;
	box-shadow:0px 5px 0px 5px rgba(0,0,0,0.05);
}


.pricing-table-1 .pricing-body{
	padding:20px;
	padding-top:200px;	
}
.pricing-table-1 .pricing-table-ul li{
	color:rgba(0,0,0,0.7);
	font-size:13px;
	padding:10px;
	border-bottom:1px solid rgba(0,0,0,0.1);
}
.pricing-table-1 .pricing-table-ul .fa{
	margin-right:10px;
}
.pricing-table-1.basic .pricing-table-ul .fa{
	color:#fa3ced;
}
.pricing-table-1.premium .pricing-table-ul .fa{
	color:#38ba14;
}
.pricing-table-1.business .pricing-table-ul .fa{
	color:#f20f53;
}
.pricing-table-1 .view-more{
	margin:10px 20px;
	display:block;
	text-align:center;
	background-color:#212121;
	padding:10px 0px;
	color:#FFF;
}
</style>



                   
<!-- footer -->






        <!-- jquery vendor -->
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="assets/js/lib/jquery.nanoscroller.min.js"></script>
        <!-- nano scroller -->
        <script src="assets/js/lib/menubar/sidebar.js"></script>
        <script src="assets/js/lib/preloader/pace.min.js"></script>
        <!-- sidebar -->
        <script src="assets/js/lib/bootstrap.min.js"></script>

        <!-- bootstrap -->
        <script src="assets/js/lib/owl-carousel/owl.carousel.min.js"></script>
        <script src="assets/js/lib/owl-carousel/owl.carousel-init.js"></script>
     
<script>
$(".hamburger").on('click', function() {
        $(this).toggleClass("is-active");
    });


    /*  
    -------------------
    List item active
    -------------------*/
    $('.header li, .sidebar li').on('click', function() {
        $(".header li.active, .sidebar li.active").removeClass("active");
        $(this).addClass('active');
    });

    $(".header li").on("click", function(event) {
        event.stopPropagation();
    });

    $(document).on("click", function() {
        $(".header li").removeClass("active");

    });
</script>

		
		<script src="assets/js/bootstrap-datepicker.min.js"></script>
		
		
		<script type="text/javascript">
		/*	jQuery(function($) {
				$('.date-picker').datepicker({
					autoclose: true,
					todayHighlight: true
				})
				//show datepicker when clicking on the icon
				.next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
			});*/
		</script>
		 
		
        <!-- scripit init-->
		
		<script src="demo.js"></script>
<link rel="stylesheet" href="whatsapp-chat-support.css">
        <script src="moment.min.js"></script>
	<script src="moment-timezone-with-data.min.js"></script>
	<script src="whatsapp-chat-support.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/scoop.min.js"></script>
	<script src="assets/js/demo-25.js"></script> 	 

	<script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script> 
	<script src="assets/js/jquery.mousewheel.min.js"></script>
		 
	<script>
		$('#example_1').whatsappChatSupport();
		</script>
		
				<style>
		#myModal,.modal-backdrop
		{
			display:none !important;
		}
		</style>
		<script>
		setTimeout(function(){ jQuery('#myModal').modal('hide'); 
    }, 3000);
   
  </script>
  
																								
											
<style>
    body {
    background: #e9ecf3 !important;
    }
</style> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
   <script>
    $(document).ready(function()
    {
       $(".rech_now").on('click',function()
       {
         $('#nemd').modal('show');  
       });
    });
</script>
		
		
	<!-- disable right click and ctrl u-->	
		<script>
		document.addEventListener('contextmenu', event => event.preventDefault());
document.onkeydown = function(e) {
    if(e.keyCode == 123) {
     return false;
    }
    if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
     return false;
    }
    if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
     return false;
    }
    if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
     return false;
    }

    if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)){
     return false;
    }      
 }
		</script>
	 
<!-- /disable right click and ctrl u-->
		
		<style>
		body
		{
			padding:inherit !important;
		}
		</style>
		
<style>
        .tw-price-box {
    padding: 1px 0 19px;
    color: #fff;
    text-align: center;
}
.bg-orange {
    background: #FA6742 !important;
}
.bg-shrock {
    background: #2BC2A7 !important;
}
.bg-green {
    background: #32CC73 !important;
}
.bg-blue {
    background: #478FFF !important;
}
.pricing-feaures {
    text-align: center;
    margin-top: 15px;
}
.pricing-price {
    margin: 30px 0 25px;
    text-align: center;
}

.tw-price-box .pricing-price strong {
    color: #fff;
}
.pricing-price strong {
    font-size: 16px;
    color: #2f2c2c;
    font-weight: 700;
    -webkit-transition: all 0.3s linear;
    transition: all 0.3s linear;
}

.pricing-feaures ul {
    list-style: none;
    padding: 0;
    margin: 0;
}



.razorpay-payment-button
{
    display:none;
}

.pricing-feaures ul li {
    display: block;
    margin-bottom: 5px;
}
            .awesome {
      
      font-family: futura;
      font-style: italic;
      
      width:100%;
      
      margin: 0 auto;
      text-align: center;
      
      color:#313131;
      font-size:45px;
      font-weight: bold;
     
      -webkit-animation:colorchange 10s infinite alternate;
      
      
    }

    @-webkit-keyframes colorchange {
      0% {
        
        color: blue;
      }
      
      10% {
        
        color: #8e44ad;
      }
      
      20% {
        
        color: #1abc9c;
      }
      
      30% {
        
        color: green;
      }
      
      40% {
        
        color: blue;
      }
      
      50% {
        
        color: #34495e;
      }
      
      60% {
        
        color: blue;
      }
      
      70% {
        
        color: #2980b9;
      }
      80% {
     
        color: red;
      }
      
      90% {
     
        color: #2980b9;
      }
      
      100% {
        
        color: green;
      }
    }
        </style>
        <style>
.modal-body
{
	flex:inherit !important;
	padding:inherit !important;
}
.modal-footer
{
	border:none !important;
}
.modal-dialog {
	margin: 30px 248px auto !important;
    max-width: auto !important;
	width : 100% !important;
}
.bg-aqua, .callout.callout-info, .alert-info, .label-info, .modal-info .modal-body {
    background-color: #00c0ef !important;
}
.bg-red, .callout.callout-danger, .alert-danger, .alert-error, .label-danger, .modal-danger .modal-body {
    background-color: #dd4b39 !important;
}
.bg-green, .callout.callout-success, .alert-success, .label-success, .modal-success .modal-body {
    background-color: #00a65a !important;
}
.bg-yellow, .callout.callout-warning, .alert-warning, .label-warning, .modal-warning .modal-body {
    background-color: #f39c12 !important;
}
.info-box {
    display: block;
    min-height: 90px;
    background: #fff;
    width: 100%;
    color:#000;
    padding : 0px;
    box-shadow: 0 1px 1px rgba(0,0,0,0.1);
    border-radius: 2px;
    margin-bottom: 15px;
}

.info-box-content {
    padding: 20px 10px;
    margin-left: 90px;
}

.progress-description, .info-box-text {
    display: block;
    font-size: 14px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.info-box-number {
    display: block;
    font-weight: bold;
    font-size: 18px;
}

.info-box-icon {
    border-top-left-radius: 2px;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 2px;
    display: block;
    float: left;
    height: 90px;
    width: 90px;
    text-align: center;
    font-size: 45px;
    line-height: 90px;
    background: rgba(0,0,0,0.2);
}

</style>
<script type="text/javascript">
function start_countdown()
{
 var counter= 1800;
 myVar= setInterval(function()
 { 
  if(counter>=0)
  {
	  mins = Math.floor(counter / 60);
secs = counter % 60;
  document.getElementById("countdown").innerHTML="You Will Be Logged Out In "+mins+":"+secs;
  }
  if(counter==0)
  {
   $.ajax
   ({
     type:'post',
     url:'logout.php',
     success:function(response) 
     {
      window.location="https://google.com/";
     }
   });
   }
   counter--;
 }, 1000)
}

</script>
<script>start_countdown();</script>
    </body>
</html>
 <script src="popup/videopopup.js"></script>

	<script type="text/javascript">
	
	
		$(function(){
			// Init Plugin
			$(".video1").videopopup({
				'videoid' : 'p6L9u_MzKdg',
				'videoplayer' : 'youtube', //options - youtube or vimeo
				'autoplay' : 'true',// options - true or false
				'width' : '900',
				'height' : '510'
			});
			$(".video2").videopopup({
				'videoid' : '9ipw_IQp8bg',
				'videoplayer' : 'youtube', //options - youtube or vimeo
				'autoplay' : 'true',// options - true or false
				'width' : '900',
				'height' : '510'
			});
		});
    </script>