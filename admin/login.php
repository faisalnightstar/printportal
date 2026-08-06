				<?php session_start();  if (file_exists(__DIR__ . '/config.php')) {
    include_once(__DIR__ . '/config.php');
} elseif (file_exists(__DIR__ . '/../config.php')) {
    include_once(__DIR__ . '/../config.php');
} elseif (file_exists(__DIR__ . '/../../config.php')) {
    include_once(__DIR__ . '/../../config.php');
} elseif (file_exists(__DIR__ . '/../../../config.php')) {
    include_once(__DIR__ . '/../../../config.php');
} error_reporting(0); ?>
<!------------------------------ # connection ------------------------------->
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
											
												?>
												
						<!------------------------------ # connection ------------------------------->
<!doctype html> <!-- Header -->
    <?php include 'header.php';?>
    <!-- .Header -->
    
    <?php
                if(isset($_POST['submit'])) {
					$loginname   =  strtoupper($_POST['loginid']) ;
					$password =  $_POST['pass'] ;
          
					$a = mysqli_query($connection,"SELECT * FROM tbluser Where loginname LIKE '".$loginname."'");
					$b = mysqli_fetch_array($a);

					if($b['pswrd']==$password and $b['ispaid'] == 1 and $b['status'] == 1){
						
						$_SESSION["user"] = "";
						$_SESSION["user"] = "OK";
						$_SESSION['username'] = $b['fullname'];
						$_SESSION['usertype'] = $b['usertype'];
						$_SESSION['userid'] = $b['userid'];
						$_SESSION['aadharpoint'] = $b['aadharpoint'];
						$_SESSION['cardrate'] = $b['cardrate'];
						
						//header("location: panel.php");
						$msg='Login Success Wait 1 Second...';?>
						<script>
						setTimeout(function () {
						   window.location.href= 'dashboard/dashboard.php';
						}, 1);
						</script>
						<?php
						//'<script> window.location.href="login.php"; </script>'
					}
					else{
					$msgno='Incorect username/password Please Enter Correct !';
					}					
				}

				?><?php session_start();  if (file_exists(__DIR__ . '/config.php')) {
    include_once(__DIR__ . '/config.php');
} elseif (file_exists(__DIR__ . '/../config.php')) {
    include_once(__DIR__ . '/../config.php');
} elseif (file_exists(__DIR__ . '/../../config.php')) {
    include_once(__DIR__ . '/../../config.php');
} elseif (file_exists(__DIR__ . '/../../../config.php')) {
    include_once(__DIR__ . '/../../../config.php');
} error_reporting(0); ?>
<!------------------------------ # connection ------------------------------->
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
											
												?>
												
						<!------------------------------ # connection ------------------------------->
<!doctype html> <!-- Header -->
    <?php include 'header.php';?>
    <!-- .Header -->
    
    <?php
                if(isset($_POST['submit'])) {
					$loginname   =  strtoupper($_POST['loginid']) ;
					$password =  $_POST['pass'] ;
          
					$a = mysqli_query($connection,"SELECT * FROM tbluser Where loginname LIKE '".$loginname."'");
					$b = mysqli_fetch_array($a);

					if($b['pswrd']==$password and $b['ispaid'] == 1 and $b['status'] == 1){
						
						$_SESSION["user"] = "";
						$_SESSION["user"] = "OK";
						$_SESSION['username'] = $b['fullname'];
						$_SESSION['usertype'] = $b['usertype'];
						$_SESSION['userid'] = $b['userid'];
						$_SESSION['aadharpoint'] = $b['aadharpoint'];
						$_SESSION['cardrate'] = $b['cardrate'];
						
						//header("location: panel.php");
						$msg='Login Success Wait 1 Second...';?>
						<script>
						setTimeout(function () {
						   window.location.href= 'admin/panel.php';
						}, 1);
						</script>
						<?php
						//'<script> window.location.href="login.php"; </script>'
					}
					else{
					$msgno='Incorect username/password Please Enter Correct !';
					}					
				}

				?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Ad Print | Print Portal </title>
  <meta content="Ad Print | Print Portal" name="description">
  <meta content="Ad Print | Print Portal" name="keywords">
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/css/common.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&amp;display=swap" rel="stylesheet">
<link href="assets/css/theme.css" rel="stylesheet">
<link rel="apple-touch-icon" sizes="180x180" href="https://www.conquestgraphics.com/images/default-source/blog/timing.png?sfvrsn=45a81b8d_0">
<link rel="icon" type="image/png" sizes="32x32" href="https://www.conquestgraphics.com/images/default-source/blog/timing.png?sfvrsn=45a81b8d_0">
<link rel="icon" type="image/png" sizes="16x16" href="https://www.conquestgraphics.com/images/default-source/blog/timing.png?sfvrsn=45a81b8d_0">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">

</head>
<body>
<div class="forny-container">
<div class="forny-inner">
<div class="mb-6 text-center forny-logo"> <a href="index.php"></a></div>

<div class="forny-form">
    							

<div class="text-center">
    <marquee width="100%" style="color:blue;"><b> DL Print Available Here :- डीएल प्रिंट यहां उपलब्ध है
Aadhar Number To Pan Number Find Instant Only 30 Rupees Go To Admin Pan service ,, आधार नंबर से पैन नंबर तुरंत पाएं सिर्फ 30 रुपये एडमिन पैनल सर्विस पर जाएं
</marquee width="100%">
<h4>Login into account</h4>
<p class="mb-10">Use your credentials to access your account.</p>
</div>
								<form method="post" action="">

<div class="form-group">
    
<div class="input-group">
<div class="input-group-prepend"> <span class="input-group-text">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="16" viewBox="0 0 24 16">
<g transform="translate(0)">
<path d="M23.983,101.792a1.3,1.3,0,0,0-1.229-1.347h0l-21.525.032a1.169,1.169,0,0,0-.869.4,1.41,1.41,0,0,0-.359.954L.017,115.1a1.408,1.408,0,0,0,.361.953,1.169,1.169,0,0,0,.868.394h0l21.525-.032A1.3,1.3,0,0,0,24,115.062Zm-2.58,0L12,108.967,2.58,101.824Zm-5.427,8.525,5.577,4.745-19.124.029,5.611-4.774a.719.719,0,0,0,.109-.946.579.579,0,0,0-.862-.12L1.245,114.4,1.23,102.44l10.422,7.9a.57.57,0,0,0,.7,0l10.4-7.934.016,11.986-6.04-5.139a.579.579,0,0,0-.862.12A.719.719,0,0,0,15.977,110.321Z" transform="translate(0 -100.445)" />
</g>
</svg>
</span> </div>
<input required="" class="form-control" name="loginid" type="text" autocomplete="new-password" placeholder="User Id Here (यूजर आईडी यहाँ डालें)" autofocus=""></div>
</div>
<div class="form-group password-field">
<div class="input-group">
<div class="input-group-prepend"> <span class="input-group-text">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="24" viewBox="0 0 16 24">
<g transform="translate(0)">
<g transform="translate(5.457 12.224)">
<path d="M207.734,276.673a2.543,2.543,0,0,0-1.749,4.389v2.3a1.749,1.749,0,1,0,3.5,0v-2.3a2.543,2.543,0,0,0-1.749-4.389Zm.9,3.5a1.212,1.212,0,0,0-.382.877v2.31a.518.518,0,1,1-1.035,0v-2.31a1.212,1.212,0,0,0-.382-.877,1.3,1.3,0,0,1-.412-.955,1.311,1.311,0,1,1,2.622,0A1.3,1.3,0,0,1,208.633,280.17Z" transform="translate(-205.191 -276.673)" />
</g>
<path d="M84.521,9.838H82.933V5.253a4.841,4.841,0,1,0-9.646,0V9.838H71.7a1.666,1.666,0,0,0-1.589,1.73v10.7A1.666,1.666,0,0,0,71.7,24H84.521a1.666,1.666,0,0,0,1.589-1.73v-10.7A1.666,1.666,0,0,0,84.521,9.838ZM74.346,5.253a3.778,3.778,0,1,1,7.528,0V9.838H74.346ZM85.051,22.27h0a.555.555,0,0,1-.53.577H71.7a.555.555,0,0,1-.53-.577v-10.7a.555.555,0,0,1,.53-.577H84.521a.555.555,0,0,1,.53.577Z" transform="translate(-70.11)" />
</g>
</svg>
</span> </div>
<input type="password"required class="form-control" name="pass" id="password" placeholder="Password Here (पासवर्ड यहाँ डालें)" required autocomplete="off">
</div>
</div>
<div class="row mt-6 mb-6">
<div class="col-6 d-flex align-items-center"> </div>
<div class="col-12 text-right"> <a href="pass.php">Forgot password?</a> </div>
</div>
<div>
    

<button type="submit" name="submit" class="btn btn-primary btn-block" style="background-image: linear-gradient(to bottom,rgba(0,123,255,.5),#12344d);">Login</button>


</div>
<hr>
<br>
<br>
<br>
<div class="text-center mt-10"><a href="reg.php">नया आईडी बनाने के लिए निचे वाले बटन पे क्लिक करें </a>
<div> <a href="reg.php">
<button type="button" name="btn-check" class="btn btn-primary btn-block" style="background-image: linear-gradient(to bottom,rgba(0,123,255,.5),#12344d);">Create New User</button>
</a> </div>
</form>
</div>
</div>
</div>
<style>
	.bfix {
    position: fixed;
    bottom: 0px;
    width: 100%;
    height: 26px;
    background: #127cba;
    z-index: 99;
	border-radius: 2px;
}

	
	</style>
<style>
      marquee{
      font-size: 16px;
      font-weight: 800;
      color: #8ebf42;
      font-family: sans-serif;
      }
    </style>
</div>
</div>
</div>
<style>
input:-webkit-autofill,
input:-webkit-autofill:hover, 
input:-webkit-autofill:focus, 
input:-webkit-autofill:active  {
  transition: background-color #004085;
  -webkit-text-fill-color: #004085 !important;
}
    }
    
    input:-webkit-autofill {
      -webkit-animation-name: autofill;
      -webkit-animation-fill-mode: both;
    }
    
</style>

</body>
</html>