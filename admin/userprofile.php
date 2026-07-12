<?php include('userHeader.php'); ?>



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

          <div class="card">
            <div class="card-body">
  <div class="content-wrapper">
					<section id="basic-form-layouts">

  <div class="row">

  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
       <div class="card-body">
          <div class="px-3">

          <div class="card">
            <div class="card-body">
  
          <h4 class="card-title">Personal Information</h4>

        </div>
        <div class="card-content">
          <div class="card-body">
            <div class="mb-3">
                           
            </div>
            <hr>	<?php 
											$q = "";
											$q = "SELECT * FROM tbluser where  userid='".$_SESSION['userid']."'";
											$r = mysqli_query($connection,$q);
											$rw = mysqli_fetch_assoc($r);
											$rw['fullname'];
										?>
            <div class="row">
              <div class="col-12 col-md-6 col-lg-4">
                <ul class="no-list-style">
                  <li class="mb-2">
                    <span class="text-bold-500 primary"><a><i class="icon-present font-small-3"></i> Username:</a></span>
                    <span class="d-block overflow-hidden"> <?php echo $rw['fullname'];?></span>
                  </li>
                  <li class="mb-2">
                    <span class="text-bold-500 primary"><a><i class="ft-map-pin font-small-3"></i> Address  :</a></span>
                    <span class="d-block overflow-hidden"> <?php echo $rw['cityname'].' '.$rw['statename'];?>  </span>
                  </li>
                  <li class="mb-2">
                    <span class="text-bold-500 primary"><a><i class="ft-globe font-small-3"></i> User Type:</a></span>
                    <span class="d-block overflow-hidden"><?php echo $rw['usertype'];?>  </span>
                  </li>
                </ul>
              </div>
              <div class="col-12 col-md-6 col-lg-4">
                <ul class="no-list-style">
                  <li class="mb-2">
                    <span class="text-bold-500 primary"><a><i class="ft-user font-small-3"></i> Mobile Number :</a></span>
                    <span class="d-block overflow-hidden"> <?php echo $rw['mobileno'];?>  </span>
                  </li>
                  <li class="mb-2">
                    <span class="text-bold-500 primary"><a><i class="ft-mail font-small-3"></i> Total Wallet Amount:</a></span>
                    <a class="d-block overflow-hidden"><?php echo $rw['walletamount'];?>     </a>
              
                  </li>
                </ul>
              </div>
              
            <hr>
           
            
          </div>
        </div>
      </div>
    </div>

  </div>
</div></div></div></div></section>
<!--About section ends-->
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

<!--   Tue, 07 Jan 2020 03:35:12 GMT -->
</html>