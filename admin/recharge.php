<?php include('userHeader.php'); 
include('manu.php'); 
include('userFooter.php'); ?>
      


<div class="main-content" style="min-height: 662px;">
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


<style>
    body {
        background-color: #f7f7f7;
        margin-top: 0px;
    }

    /* pricing tables */
    .pricing-table {
        background: #e9f0f4;
        text-align: center;
        margin: 0px 0;
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
        width: 60px;
        height: 60px;
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





<style type="text/css">
            .scroll {
                
                
                width: auto;
                height: 900px;
                overflow-x: hidden;
                overflow-y: auto;
                text-align:justify;
            }
            
            .hide-menu{
                font-size: 8px;
                
            }
            </style>

<h4> <marquee behavior="alternate" > <b> Print Portal आपना अकाउंट रिचार्ज  करे रिचार्ज के बिना ID Active Nahi Hoga   Recharge Kare </b> </marquee></h4> 



<div class="white-box p-0">
<section id="pricing" class="bg-white">
<div class="container">
<div class="row">
<div class="col-md-3">
<div class="pricing-table">
<div class="pricing-table-title">
<h5 class="pricing-title bg-info-hover text-white">Retailer</h5>
</div>
<div class="pricing-table-price text-center bg-info">
<p class="title-font">
<span class="pricing-period text-white mr-1">From</span>
<span class="pricing-currency text-white">₹</span>
<span class="pricing-price text-white">299</span>
</p>
</div>
<div class="pricing-table-content">
<ul>
<li><strong>400 points</strong></li>
<li><strong>Personal Uses Only/-</strong></li>
<li><strong>Aadhar card</strong></li>
<li><strong>Pan card</strong></li>
<li><strong>Advance Voter card</strong></li>
<li><strong>CSC All Services</strong></li>
<li><strong>24/7 Support</strong></li>
</ul>
<div class="pricing-table-button">
 <form action="HBConnect/retailer/index.php?userid=<?php echo $_SESSION['userid'];?>&amount=299&usertype=RETAILER" method="POST">
                  <input type="hidden" name="amount" value="299" class="form-control" readonly size="20" style="width: 224px;margin-top:10px;">
                  <input type="hidden" name="point" value="299" class="form-control" readonly size="20" style="width: 224px;margin-top:10px;">
                  <input class="form-control "  id="aadharno" name="pay_uidss" type="hidden" readonly  value="<?php echo $_SESSION['userid'];?>">
                  <input type="submit" name="sub_val" class="btn btn-dark" style="background:dark" value="Recharge Now" id="pay_now"/>
                  </form>

</div>
</div>
</div>
</div>
<div class="col-md-3">
<div class="pricing-table bg-lightgrey">
<div class="pricing-table-title">
 <h5 class="pricing-title bg-primary-hover text-white">DISTRIBUTER</h5>
</div>
<div class="pricing-table-price text-center bg-primary">
<p class="title-font">
<span class="pricing-period text-white mr-1">From</span>
<span class="pricing-currency text-white">₹</span>
<span class="pricing-price text-white">999</span>
</p>
</div>
<div class="pricing-table-content">
<ul>
<li><strong>19999 Points</strong></li>
<li><strong>Create Unlimited Retailer</strong></li>
<li><strong>CSC ID Free Login</strong></li>
<li><strong>Aadhar card</strong></li>
<li><strong>Pan card</strong></li>
<li><strong>Advance Voter card</strong></li>
<li><strong>CSC All Services</strong></li>
<li><strong>24/7 Support</strong></li>
</ul>
<div class="pricing-table-button">
 <form action="HBConnect/distributor/index.php?userid=<?php echo $_SESSION['userid'];?>&amount=999&usertype=DISTRIBUTER" method="POST">
                  <input type="hidden" name="amount" value="999" class="form-control" readonly size="20" style="width: 224px;margin-top:10px;">
            <input class="form-control "  id="aadharno" name="pay_uidss" type="hidden" readonly  value="<?php echo $_SESSION['userid'];?>">
                 <input type="submit" name="sub_val" class="btn btn-dark" style="background:dark" value="Recharge Now" id="pay_now"/>
                  </form>
</div>
</div>
</div>
</div>


<div class="col-md-3">
<div class="pricing-table">
<div class="pricing-table-title">
<h5 class="pricing-title bg-info-hover text-white">MASTER</h5>
</div>
<div class="pricing-table-price text-center bg-info">
<p class="title-font">
<span class="pricing-period text-white mr-1">From</span>
<span class="pricing-currency text-white">₹</span>
<span class="pricing-price text-white">1499</span>
</p>
</div>
<div class="pricing-table-content">
<ul>
<li><strong>Unlimited points</strong></li>
<li><strong>Unlimited Retailer &amp; Distributer</strong></li>
<li><strong>CSC ID Free Login</strong></li>
<li><strong>Aadhar card</strong></li>
<li><strong>Pan card</strong></li>
<li><strong>Advance Voter card</strong></li>
<li><strong>CSC All Services</strong></li>
<li><strong>24/7 Support</strong></li>
</ul>
<div class="pricing-table-button">
 <form action="HBConnect/master/index.php?userid=<?php echo $_SESSION['userid'];?>&amount=1499&usertype=SUPER DISTRIBUTER" method="POST">
                  <input type="hidden" name="amount" value="1499" class="form-control" readonly size="20" style="width: 224px;margin-top:10px;">
            <input class="form-control "  id="aadharno" name="pay_uidss" type="hidden" readonly  value="<?php echo $_SESSION['userid'];?>">
                 <input type="submit" name="sub_val" class="btn btn-dark" style="background:dark" value="Recharge Now" id="pay_now"/>
                  </form>

</div>
</div>
</div>
</div>
<div class="col-md-3">
<div class="pricing-table bg-lightgrey">
<div class="pricing-table-title">
 <h5 class="pricing-title bg-primary-hover text-white">White Label</h5>
</div>
<div class="pricing-table-price text-center bg-primary">
<p class="title-font">
<span class="pricing-period text-white mr-1">From</span>
<span class="pricing-currency text-white">₹</span>
<span class="pricing-price text-white">2999</span>
</p>
</div>
<div class="pricing-table-content">
<ul>
<li><strong>unlimited points</strong></li>
<li><strong>Unlimited All Users</strong></li>
<li><strong>CSC ID Free Login</strong></li>
<li><strong>Aadhar card</strong></li>
<li><strong>Pan card</strong></li>
<li><strong>Advance Voter card</strong></li>
<li><strong>CSC All Services</strong></li>
<li><strong>24/7 Support</strong></li>
</ul>
<div class="pricing-table-button">
 <form action="HBConnect/whitelabel/index.php?userid=<?php echo $_SESSION['userid'];?>&amount=2999&usertype=MASTER ADMIN" method="POST">
                  <input type="hidden" name="amount" value="2999" class="form-control" readonly size="20" style="width: 224px;margin-top:10px;">
            <input class="form-control "  id="aadharno" name="pay_uidss" type="hidden" readonly  value="<?php echo $_SESSION['userid'];?>">
                 <input type="submit" name="sub_val" class="btn btn-dark" style="background:dark" value="Recharge Now" id="pay_now"/>
                  </form>
</div></div></div></div></div></div></section>





</div>
</div></div></div></div></div></div></section></div></div></div></div></div></section></div></div>

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