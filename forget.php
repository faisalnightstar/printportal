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
												//$slct = mysqli_fetch_assoc($r);
												//$slct['aadharpoint'];

												?>
												
						<!------------------------------ # connection ------------------------------->
<script>
    alert("आईडी पासवर्ड
किसी के साथ साझा न करे धन्यवाद्.in");
</script>
 				
<!doctype html>
<html>
<head>
<style>
body {margin:0;}
.navbar {
overflow: hidden;
background-color: #0039e6;
position: fixed;
top: 0;
width: 100%;
}

.navbar a {
float: left;
display: block;
color: #f2f2f2;
text-align: center;
padding: 3px 20px;
text-decoration: none;
font-size: 15px;
}

.navbar a:hover {
background: #ddd;
color: black;
}
.navbar-right {
float: right;
}
.main {
padding: 16px;
margin-top: 70px;
}
</style>
<link href=" https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet">
</head>
 <script src="//code.jivosite.com/widget/KASPUSj5y1" async></script>
<body>
<div style="color:#002db3" class="navbar">
<div class="navbar-right">
<a href="index.php">          Home             </a>

</div>
</div>
<meta name="google-site-verification" content="hcl-Jqwp1MOp5NPH7w34dDulCYYH3haxX4MmAacpdDs" />
  <title> PRINT PORTAL - REGISTER |PRINT PORTAL | DIGITAL FAST PRINT PORTAL | PRINT PORTAL LOGIN | PRINT PORTAL |BEST PRINT PORTAL | AADHAR PRINT | BALAJI PRINT PORTAL | PRINT PORTAL | HARSHIT PRINT PORTAL | KYAMAT PRINT PORTAL | PRINT KARO | PRINT SEVA | AADHAR PRINT PORTAL | AADHAR CARD PRINT | PRINT PORTAL | PRINT PORTAL | PRINT PORTAL | PRINT PORTAL | AADHAR PRINT PORTAL | CARD PRINT PORTAL | digital fast print | balaji print portal | harshit print portal | somnath print portal </title>
<html lang="en">
<head>
<meta charset="utf-8">
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/css/common.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&amp;display=swap" rel="stylesheet">
<link href="assets/css/theme.css" rel="stylesheet">
<link rel="apple-touch-icon" sizes="180x180" href="https://theinstantprint.com//apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/logo1.png">
<link rel="icon" type="image/png" sizes="16x16" href="/logo1.png">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#ff0000">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ff0000">
</head>
<body>
<div class="forny-container" style="background-image: url(INGBI.jpg);">
    <div class="forny-inner" >
        <div class="forny-two-pane"></div>
<div class="forny-form" style="background-image: url(1.jpeg);">
    							

<div class="text-center" style="color:white";>
    							                                            <table>
    <!--<tr>-->
    <!--    <th>YOUR PASSWORD</th>-->
    <!--</tr><br>-->
                                            <?php
        $connection = mysqli_connect("localhost", "mybestpr_my", "mybestpr_my");
        $db = mysqli_select_db($connection, 'mybestpr_my');
        if(isset($_POST['search']))
        {
            $mobileno = strtoupper ($_POST['mobileno']);
            $query = "SELECT * FROM `tbluser` where mobileno='$mobileno'";
            $query_run = mysqli_query($connection, $query);
            //while ($row = mysqli_fetch_array($query))
            while($row = mysqli_fetch_array($query_run))
            {
                ?>
                <script>
                alert("YOUR PASSWORD IS :- <? echo $row['pswrd']; ?> ")
                </script>
                <tr>
                     <td><div class="alert alert-success">Dear User Your Username :- <? echo $row['loginname']; ?> And Password :- <? echo $row['pswrd']; ?> </div> </td>
                </tr>
                <?php
            }

        }
  
					

				?>	
<h4><div style="color:white";>Login into account</h4>
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
<input required="" class="form-control" name="mobileno" id="mobileno" type="text" autocomplete="new-password" placeholder="User Id Here (यूजर आईडी यहाँ डालें)" autofocus=""></div>
</div>
<div class="row mt-6 mb-6">
<div class="col-6 d-flex align-items-center"> </div>
</div>
<div>

<button type="submit" name="search" class="btn btn-primary btn-block" style="background:linear-gradient(-62deg, #ffebcc,#cc7a00 , #ff3399);"> ▶ Submit</button>
</div>
<hr>
<br>
<br>
<br>
                                            
                                                       


          
                                            </center>   
                                            </div>
    
 
                                            </div>
                                        
				