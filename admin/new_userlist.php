
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="http://crsorgiup.co.in/admin-assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="http://crsorgiup.co.in/admin-assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="http://crsorgiup.co.in/admin-assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="http://crsorgiup.co.in/admin-assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="http://crsorgiup.co.in/admin-assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="http://crsorgiup.co.in/admin-assets/plugins/jqvmap/jqvmap.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="http://crsorgiup.co.in/admin-assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="http://crsorgiup.co.in/admin-assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="http://crsorgiup.co.in/admin-assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="http://crsorgiup.co.in/admin-assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="http://crsorgiup.co.in/admin-assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="http://crsorgiup.co.in/admin-assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="http://crsorgiup.co.in/admin-assets/plugins/summernote/summernote-bs4.min.css">

  <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css" integrity="sha512-8D+M+7Y6jVsEa7RD6Kv/Z7EImSpNpQllgaEIQAtqHcI0H6F4iZknRj0Nx1DCdB+TwBaS+702BGWYC0Ze2hpExQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <style>
  label.error {
    color: red;
    font-weight: normal!important;
  }
  .form-img {
    border: 1px solid #eee;
    height: 100px;
    width: 100px;
    object-fit: cover;
    margin-top: 15px;
  }
  .gallery-images {
    margin-top: 15px;
  }
  .gallery-image-box {
    margin-right: 15px;
    display: inline-block;
    height: 110px;
    width: 110px;
    border: 1px solid #eee;
    text-align: center;
    position: relative;
    padding-top: 4px;
  }
  .gallery-img {
    height: 100px;
    width: 100px;
    object-fit: cover;
  }
  .gallery-image-close {
    position: absolute;
    top: 5px;
    right: 5px;
    color: red;
    cursor: pointer;
  }
  .btn-tb-status {
    min-width: 70px;
    padding:3px 10px;
    border-radius:50px;
    font-size:13px;
  }
  .user-panel .image {
    display: inline-block;
    padding-left: 0.8rem;
    padding-top: 10px;
}
  </style>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center d-none">
    <img class="animation__shake" src="http://crsorgiup.co.in/admin-assets/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <li class="nav-item dropdown">
        <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fas fa-user"></i></a>
        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
          <li><a href="javascript:void(0);" class="dropdown-item">Hi MD.GULAM RASUL</a></li>
          <li><a href="http://crsorgiup.co.in/logout" class="dropdown-item"><i class="fas fa-sign-out-alt"></i> Logout </a></li>
        </ul>
      </li>

          </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="http://crsorgiup.co.in" class="brand-link">
      <img src="http://crsorgiup.co.in/admin-assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Registration</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="border: none;">
        <div class="image">
          <img src="http://crsorgiup.co.in/admin-assets/dist/img/user.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="javascript:void(0)" class="d-block">MD.GULAM RASUL</a>
          <a href="javascript:void(0)" class="d-block" style="font-size: 14px;">Wallet Balance: <b>₹100.00</b></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
            <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="http://crsorgiup.co.in/admin" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

                    <li class="nav-item">
            <a href="http://crsorgiup.co.in/admin/profile" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Profile
              </p>
            </a>
          </li>
          
                    <li class="nav-item">
            <a href="http://crsorgiup.co.in/admin/wallet" class="nav-link">
              <i class="nav-icon fas fa-money-check""></i>
              <p>
                Wallet
              </p>
            </a>
          </li>
          
          
                    <li class="nav-item">
            <a href="http://crsorgiup.co.in/admin/births" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Birth Certificates
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                            <li class="nav-item">
                <a href="http://crsorgiup.co.in/admin/births" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Birth Certificate List</p>
                </a>
              </li>
                                          <li class="nav-item">
                <a href="http://crsorgiup.co.in/admin/births/create" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Birth Certificate</p>
                </a>
              </li>
                          </ul>
          </li>
          

                    <li class="nav-item">
            <a href="http://crsorgiup.co.in/admin/deaths" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Death Certificates
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                            <li class="nav-item">
                <a href="http://crsorgiup.co.in/admin/deaths" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Death Certificate List</p>
                </a>
              </li>
                                          <li class="nav-item">
                <a href="http://crsorgiup.co.in/admin/deaths/create" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Death Certificate</p>
                </a>
              </li>
                          </ul>
          </li>
          
                    <li class="nav-item">
            <a href="http://crsorgiup.co.in/admin/hospitals" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Hospitals
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                            <li class="nav-item">
                <a href="http://crsorgiup.co.in/admin/hospitals" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Hospital List</p>
                </a>
              </li>
                                        </ul>
          </li>
          
                    <li class="nav-item">
            <a href="http://crsorgiup.co.in/admin/states" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                States
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                            <li class="nav-item">
                <a href="http://crsorgiup.co.in/admin/states" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>State List</p>
                </a>
              </li>
                                        </ul>
          </li>
          
                    <li class="nav-item menu-open">
            <a href="http://crsorgiup.co.in/admin/users" class="nav-link active">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Users
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                            <li class="nav-item">
                <a href="http://crsorgiup.co.in/admin/users" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User List</p>
                </a>
              </li>
                                          <li class="nav-item">
                <a href="http://crsorgiup.co.in/admin/users/create" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
                          </ul>
          </li>
          
          
          <!--
          
          
          
           -->

          <!-- <li class="nav-item">
            <a href="http://crsorgiup.co.in/admin/forms" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Forms
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="http://crsorgiup.co.in/admin/forms" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Form List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="http://crsorgiup.co.in/admin/forms/create" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="http://crsorgiup.co.in/admin/formentries" class="nav-link">
              <i class="nav-icon fas fa-tags"></i>
              <p>
                Form Entries
              </p>
            </a>
          </li> -->

          
          <li class="nav-item">
            <a href="http://crsorgiup.co.in/logout" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">User List</h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
	<div class="container-fluid">

		<div class="row">
	          <div class="col-12">

	            <div class="card">

	              <div class="card-body">

	              	
	                <table id="example2" class="table table-bordered table-hover">
	                  <thead>
	                  <tr>
	                    <th style="width: 50px;" class="text-center">ID</th>
	                    <th>Name</th>
	                    <th>Mobile</th>
	                    <th>Email</th>
                      <th class="text-center" style="width: 80px;">Role</th>
	                    <th class="text-center" style="width: 80px;">Wallet</th>
	                    <th class="text-center" style="width: 190px;">Action</th>
	                  </tr>
	                  </thead>
	                  <tbody>

	                  	                  <tr>
	                    <td class="text-center">513</td>
	                    <td>MD.GULAM RASUL
	                    </td>
	                    <td>09507945670</td>
	                    <td>9507945670@GMAIL.COM</td>
                      <td class="text-center">Admin</td>
	                    <td class="text-center">₹0.00</td>
	                    <td class="text-center">
	                        	                    		                    	<a target="_blank" href="http://crsorgiup.co.in/admin/users/513/wallet-histories" title="Wallet History" class="btn btn-dark btn-sm mr-2"><i class="fa fa-history"></i></a> 
	                    	
                                                <a href="http://crsorgiup.co.in/admin/users/513" class="btn btn-info btn-sm mr-2"><i class="fa fa-eye"></i></a> 
                        
	                    		                    	<a href="http://crsorgiup.co.in/admin/users/513/edit" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a> 
	                    		                    		                    	<form action="http://crsorgiup.co.in/admin/users/513" method="post" class="d-inline">
	                    	<input type="hidden" name="_token" value="GB0xYJ3XrPnPAMMPleg2fiHvNsJw6STvQAILwseu">	                    	<input type="hidden" name="_method" value="DELETE">	                    	<button type="button" class="btn btn-danger btn-sm ml-2" onclick="deleteRecord(this)"><i class="fa fa-trash"></i></button>
	                    	</form>
	                    		                    </td>
	                  </tr>
	              	  	                  <tr>
	                    <td class="text-center">219</td>
	                    <td>MD FARHAN
	                    </td>
	                    <td>8252477355</td>
	                    <td>PHOTOFARHAN2002@GMAIL.COM</td>
                      <td class="text-center">Agent</td>
	                    <td class="text-center">₹100.00</td>
	                    <td class="text-center">
	                        	                    		                    	<a target="_blank" href="http://crsorgiup.co.in/admin/users/219/wallet-histories" title="Wallet History" class="btn btn-dark btn-sm mr-2"><i class="fa fa-history"></i></a> 
	                    	
                                                <a href="http://crsorgiup.co.in/admin/users/219" class="btn btn-info btn-sm mr-2"><i class="fa fa-eye"></i></a> 
                        
	                    		                    	<a href="http://crsorgiup.co.in/admin/users/219/edit" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a> 
	                    		                    		                    	<form action="http://crsorgiup.co.in/admin/users/219" method="post" class="d-inline">
	                    	<input type="hidden" name="_token" value="GB0xYJ3XrPnPAMMPleg2fiHvNsJw6STvQAILwseu">	                    	<input type="hidden" name="_method" value="DELETE">	                    	<button type="button" class="btn btn-danger btn-sm ml-2" onclick="deleteRecord(this)"><i class="fa fa-trash"></i></button>
	                    	</form>
	                    		                    </td>
	                  </tr>
	              	  	                  <tr>
	                    <td class="text-center">260</td>
	                    <td>Md Aftab Ansari
	                    </td>
	                    <td>6202352365</td>
	                    <td>csc811303@gmail.com</td>
                      <td class="text-center">Agent</td>
	                    <td class="text-center">₹160.00</td>
	                    <td class="text-center">
	                        	                    		                    	<a target="_blank" href="http://crsorgiup.co.in/admin/users/260/wallet-histories" title="Wallet History" class="btn btn-dark btn-sm mr-2"><i class="fa fa-history"></i></a> 
	                    	
                                                <a href="http://crsorgiup.co.in/admin/users/260" class="btn btn-info btn-sm mr-2"><i class="fa fa-eye"></i></a> 
                        
	                    		                    	<a href="http://crsorgiup.co.in/admin/users/260/edit" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a> 
	                    		                    		                    	<form action="http://crsorgiup.co.in/admin/users/260" method="post" class="d-inline">
	                    	<input type="hidden" name="_token" value="GB0xYJ3XrPnPAMMPleg2fiHvNsJw6STvQAILwseu">	                    	<input type="hidden" name="_method" value="DELETE">	                    	<button type="button" class="btn btn-danger btn-sm ml-2" onclick="deleteRecord(this)"><i class="fa fa-trash"></i></button>
	                    	</form>
	                    		                    </td>
	                  </tr>
	              	  	                  <tr>
	                    <td class="text-center">261</td>
	                    <td>Vikram choudhary
	                    </td>
	                    <td>8510065457</td>
	                    <td>vikramchoudhary164@gmail.com</td>
                      <td class="text-center">Agent</td>
	                    <td class="text-center">₹100.00</td>
	                    <td class="text-center">
	                        	                    		                    	<a target="_blank" href="http://crsorgiup.co.in/admin/users/261/wallet-histories" title="Wallet History" class="btn btn-dark btn-sm mr-2"><i class="fa fa-history"></i></a> 
	                    	
                                                <a href="http://crsorgiup.co.in/admin/users/261" class="btn btn-info btn-sm mr-2"><i class="fa fa-eye"></i></a> 
                        
	                    		                    	<a href="http://crsorgiup.co.in/admin/users/261/edit" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a> 
	                    		                    		                    	<form action="http://crsorgiup.co.in/admin/users/261" method="post" class="d-inline">
	                    	<input type="hidden" name="_token" value="GB0xYJ3XrPnPAMMPleg2fiHvNsJw6STvQAILwseu">	                    	<input type="hidden" name="_method" value="DELETE">	                    	<button type="button" class="btn btn-danger btn-sm ml-2" onclick="deleteRecord(this)"><i class="fa fa-trash"></i></button>
	                    	</form>
	                    		                    </td>
	                  </tr>
	              	  	                  <tr>
	                    <td class="text-center">262</td>
	                    <td>RAJAT KUMAR
	                    </td>
	                    <td>6397425302</td>
	                    <td>rajat6065@gmail.com</td>
                      <td class="text-center">Agent</td>
	                    <td class="text-center">₹100.00</td>
	                    <td class="text-center">
	                        	                    		                    	<a target="_blank" href="http://crsorgiup.co.in/admin/users/262/wallet-histories" title="Wallet History" class="btn btn-dark btn-sm mr-2"><i class="fa fa-history"></i></a> 
	                    	
                                                <a href="http://crsorgiup.co.in/admin/users/262" class="btn btn-info btn-sm mr-2"><i class="fa fa-eye"></i></a> 
                        
	                    		                    	<a href="http://crsorgiup.co.in/admin/users/262/edit" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a> 
	                    		                    		                    	<form action="http://crsorgiup.co.in/admin/users/262" method="post" class="d-inline">
	                    	<input type="hidden" name="_token" value="GB0xYJ3XrPnPAMMPleg2fiHvNsJw6STvQAILwseu">	                    	<input type="hidden" name="_method" value="DELETE">	                    	<button type="button" class="btn btn-danger btn-sm ml-2" onclick="deleteRecord(this)"><i class="fa fa-trash"></i></button>
	                    	</form>
	                    		                    </td>
	                  </tr>
	              	  	                  <tr>
	                    <td class="text-center">266</td>
	                    <td>Anand Kumar
	                    </td>
	                    <td>8544610244</td>
	                    <td>rk10bh@gmail.com</td>
                      <td class="text-center">Agent</td>
	                    <td class="text-center">₹100.00</td>
	                    <td class="text-center">
	                        	                    		                    	<a target="_blank" href="http://crsorgiup.co.in/admin/users/266/wallet-histories" title="Wallet History" class="btn btn-dark btn-sm mr-2"><i class="fa fa-history"></i></a> 
	                    	
                                                <a href="http://crsorgiup.co.in/admin/users/266" class="btn btn-info btn-sm mr-2"><i class="fa fa-eye"></i></a> 
                        
	                    		                    	<a href="http://crsorgiup.co.in/admin/users/266/edit" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a> 
	                    		                    		                    	<form action="http://crsorgiup.co.in/admin/users/266" method="post" class="d-inline">
	                    	<input type="hidden" name="_token" value="GB0xYJ3XrPnPAMMPleg2fiHvNsJw6STvQAILwseu">	                    	<input type="hidden" name="_method" value="DELETE">	                    	<button type="button" class="btn btn-danger btn-sm ml-2" onclick="deleteRecord(this)"><i class="fa fa-trash"></i></button>
	                    	</form>
	                    		                    </td>
	                  </tr>
	              	  	                  <tr>
	                    <td class="text-center">271</td>
	                    <td>manmohan Kumar
	                    </td>
	                    <td>7266071893</td>
	                    <td>manmohan7088@gmail.com</td>
                      <td class="text-center">Agent</td>
	                    <td class="text-center">₹120.00</td>
	                    <td class="text-center">
	                        	                    		                    	<a target="_blank" href="http://crsorgiup.co.in/admin/users/271/wallet-histories" title="Wallet History" class="btn btn-dark btn-sm mr-2"><i class="fa fa-history"></i></a> 
	                    	
                                                <a href="http://crsorgiup.co.in/admin/users/271" class="btn btn-info btn-sm mr-2"><i class="fa fa-eye"></i></a> 
                        
	                    		                    	<a href="http://crsorgiup.co.in/admin/users/271/edit" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a> 
	                    		                    		                    	<form action="http://crsorgiup.co.in/admin/users/271" method="post" class="d-inline">
	                    	<input type="hidden" name="_token" value="GB0xYJ3XrPnPAMMPleg2fiHvNsJw6STvQAILwseu">	                    	<input type="hidden" name="_method" value="DELETE">	                    	<button type="button" class="btn btn-danger btn-sm ml-2" onclick="deleteRecord(this)"><i class="fa fa-trash"></i></button>
	                    	</form>
	                    		                    </td>
	                  </tr>
	              	  	                  <tr>
	                    <td class="text-center">273</td>
	                    <td>Suman gangwar
	                    </td>
	                    <td>7078557252</td>
	                    <td>rgangwar723@gmail.com</td>
                      <td class="text-center">Agent</td>
	                    <td class="text-center">₹110.00</td>
	                    <td class="text-center">
	                        	                    		                    	<a target="_blank" href="http://crsorgiup.co.in/admin/users/273/wallet-histories" title="Wallet History" class="btn btn-dark btn-sm mr-2"><i class="fa fa-history"></i></a> 
	                    	
                                                <a href="http://crsorgiup.co.in/admin/users/273" class="btn btn-info btn-sm mr-2"><i class="fa fa-eye"></i></a> 
                        
	                    		                    	<a href="http://crsorgiup.co.in/admin/users/273/edit" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a> 
	                    		                    		                    	<form action="http://crsorgiup.co.in/admin/users/273" method="post" class="d-inline">
	                    	<input type="hidden" name="_token" value="GB0xYJ3XrPnPAMMPleg2fiHvNsJw6STvQAILwseu">	                    	<input type="hidden" name="_method" value="DELETE">	                    	<button type="button" class="btn btn-danger btn-sm ml-2" onclick="deleteRecord(this)"><i class="fa fa-trash"></i></button>
	                    	</form>
	                    		                    </td>
	                  </tr>
	              	  	                  <tr>
	                    <td class="text-center">275</td>
	                    <td>RANJEET KUMAR
	                    </td>
	                    <td>7250560799</td>
	                    <td>ranjeetkumar7250560799@gmail.com</td>
                      <td class="text-center">Agent</td>
	                    <td class="text-center">₹110.00</td>
	                    <td class="text-center">
	                        	                    		                    	<a target="_blank" href="http://crsorgiup.co.in/admin/users/275/wallet-histories" title="Wallet History" class="btn btn-dark btn-sm mr-2"><i class="fa fa-history"></i></a> 
	                    	
                                                <a href="http://crsorgiup.co.in/admin/users/275" class="btn btn-info btn-sm mr-2"><i class="fa fa-eye"></i></a> 
                        
	                    		                    	<a href="http://crsorgiup.co.in/admin/users/275/edit" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a> 
	                    		                    		                    	<form action="http://crsorgiup.co.in/admin/users/275" method="post" class="d-inline">
	                    	<input type="hidden" name="_token" value="GB0xYJ3XrPnPAMMPleg2fiHvNsJw6STvQAILwseu">	                    	<input type="hidden" name="_method" value="DELETE">	                    	<button type="button" class="btn btn-danger btn-sm ml-2" onclick="deleteRecord(this)"><i class="fa fa-trash"></i></button>
	                    	</form>
	                    		                    </td>
	                  </tr>
	              	  	                  <tr>
	                    <td class="text-center">276</td>
	                    <td>RAJEEV KUMAR
	                    </td>
	                    <td>7739667280</td>
	                    <td>Rajeevmahto327@gmail.com</td>
                      <td class="text-center">Agent</td>
	                    <td class="text-center">₹100.00</td>
	                    <td class="text-center">
	                        	                    		                    	<a target="_blank" href="http://crsorgiup.co.in/admin/users/276/wallet-histories" title="Wallet History" class="btn btn-dark btn-sm mr-2"><i class="fa fa-history"></i></a> 
	                    	
                                                <a href="http://crsorgiup.co.in/admin/users/276" class="btn btn-info btn-sm mr-2"><i class="fa fa-eye"></i></a> 
                        
	                    		                    	<a href="http://crsorgiup.co.in/admin/users/276/edit" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a> 
	                    		                    		                    	<form action="http://crsorgiup.co.in/admin/users/276" method="post" class="d-inline">
	                    	<input type="hidden" name="_token" value="GB0xYJ3XrPnPAMMPleg2fiHvNsJw6STvQAILwseu">	                    	<input type="hidden" name="_method" value="DELETE">	                    	<button type="button" class="btn btn-danger btn-sm ml-2" onclick="deleteRecord(this)"><i class="fa fa-trash"></i></button>
	                    	</form>
	                    		                    </td>
	                  </tr>
	              	  	                  <tr>
	                    <td class="text-center">289</td>
	                    <td>Govind Kumar Yadav
	                    </td>
	                    <td>8863099067</td>
	                    <td>govind.ky067@gmail.com</td>
                      <td class="text-center">Agent</td>
	                    <td class="text-center">₹100.00</td>
	                    <td class="text-center">
	                        	                    		                    	<a target="_blank" href="http://crsorgiup.co.in/admin/users/289/wallet-histories" title="Wallet History" class="btn btn-dark btn-sm mr-2"><i class="fa fa-history"></i></a> 
	                    	
                                                <a href="http://crsorgiup.co.in/admin/users/289" class="btn btn-info btn-sm mr-2"><i class="fa fa-eye"></i></a> 
                        
	                    		                    	<a href="http://crsorgiup.co.in/admin/users/289/edit" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a> 
	                    		                    		                    	<form action="http://crsorgiup.co.in/admin/users/289" method="post" class="d-inline">
	                    	<input type="hidden" name="_token" value="GB0xYJ3XrPnPAMMPleg2fiHvNsJw6STvQAILwseu">	                    	<input type="hidden" name="_method" value="DELETE">	                    	<button type="button" class="btn btn-danger btn-sm ml-2" onclick="deleteRecord(this)"><i class="fa fa-trash"></i></button>
	                    	</form>
	                    		                    </td>
	                  </tr>
	              	  	                  <tr>
	                    <td class="text-center">315</td>
	                    <td>Sonu Kumar
	                    </td>
	                    <td>9631080200</td>
	                    <td>sks.rajpoot87@gmail.com</td>
                      <td class="text-center">Agent</td>
	                    <td class="text-center">₹120.00</td>
	                    <td class="text-center">
	                        	                    		                    	<a target="_blank" href="http://crsorgiup.co.in/admin/users/315/wallet-histories" title="Wallet History" class="btn btn-dark btn-sm mr-2"><i class="fa fa-history"></i></a> 
	                    	
                                                <a href="http://crsorgiup.co.in/admin/users/315" class="btn btn-info btn-sm mr-2"><i class="fa fa-eye"></i></a> 
                        
	                    		                    	<a href="http://crsorgiup.co.in/admin/users/315/edit" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a> 
	                    		                    		                    	<form action="http://crsorgiup.co.in/admin/users/315" method="post" class="d-inline">
	                    	<input type="hidden" name="_token" value="GB0xYJ3XrPnPAMMPleg2fiHvNsJw6STvQAILwseu">	                    	<input type="hidden" name="_method" value="DELETE">	                    	<button type="button" class="btn btn-danger btn-sm ml-2" onclick="deleteRecord(this)"><i class="fa fa-trash"></i></button>
	                    	</form>
	                    		                    </td>
	                  </tr>
	              	  	                  <tr>
	                    <td class="text-center">336</td>
	                    <td>SHIV KISHOR RAY
	                    </td>
	                    <td>8340681611</td>
	                    <td>shivkishorray5@rediffmail.com</td>
                      <td class="text-center">Agent</td>
	                    <td class="text-center">₹140.00</td>
	                    <td class="text-center">
	                        	                    		                    	<a target="_blank" href="http://crsorgiup.co.in/admin/users/336/wallet-histories" title="Wallet History" class="btn btn-dark btn-sm mr-2"><i class="fa fa-history"></i></a> 
	                    	
                                                <a href="http://crsorgiup.co.in/admin/users/336" class="btn btn-info btn-sm mr-2"><i class="fa fa-eye"></i></a> 
                        
	                    		                    	<a href="http://crsorgiup.co.in/admin/users/336/edit" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a> 
	                    		                    		                    	<form action="http://crsorgiup.co.in/admin/users/336" method="post" class="d-inline">
	                    	<input type="hidden" name="_token" value="GB0xYJ3XrPnPAMMPleg2fiHvNsJw6STvQAILwseu">	                    	<input type="hidden" name="_method" value="DELETE">	                    	<button type="button" class="btn btn-danger btn-sm ml-2" onclick="deleteRecord(this)"><i class="fa fa-trash"></i></button>
	                    	</form>
	                    		                    </td>
	                  </tr>
	              	  	                  <tr>
	                    <td class="text-center">372</td>
	                    <td>Deepu punit singh
	                    </td>
	                    <td>7078878811</td>
	                    <td>deepupunit1@gmail.com</td>
                      <td class="text-center">Agent</td>
	                    <td class="text-center">₹191.00</td>
	                    <td class="text-center">
	                        	                    		                    	<a target="_blank" href="http://crsorgiup.co.in/admin/users/372/wallet-histories" title="Wallet History" class="btn btn-dark btn-sm mr-2"><i class="fa fa-history"></i></a> 
	                    	
                                                <a href="http://crsorgiup.co.in/admin/users/372" class="btn btn-info btn-sm mr-2"><i class="fa fa-eye"></i></a> 
                        
	                    		                    	<a href="http://crsorgiup.co.in/admin/users/372/edit" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a> 
	                    		                    		                    	<form action="http://crsorgiup.co.in/admin/users/372" method="post" class="d-inline">
	                    	<input type="hidden" name="_token" value="GB0xYJ3XrPnPAMMPleg2fiHvNsJw6STvQAILwseu">	                    	<input type="hidden" name="_method" value="DELETE">	                    	<button type="button" class="btn btn-danger btn-sm ml-2" onclick="deleteRecord(this)"><i class="fa fa-trash"></i></button>
	                    	</form>
	                    		                    </td>
	                  </tr>
	              	  	                  <tr>
	                    <td class="text-center">403</td>
	                    <td>parmjeet singh
	                    </td>
	                    <td>7808506821</td>
	                    <td>Pskasiyan2001@gmail.com</td>
                      <td class="text-center">Agent</td>
	                    <td class="text-center">₹180.00</td>
	                    <td class="text-center">
	                        	                    		                    	<a target="_blank" href="http://crsorgiup.co.in/admin/users/403/wallet-histories" title="Wallet History" class="btn btn-dark btn-sm mr-2"><i class="fa fa-history"></i></a> 
	                    	
                                                <a href="http://crsorgiup.co.in/admin/users/403" class="btn btn-info btn-sm mr-2"><i class="fa fa-eye"></i></a> 
                        
	                    		                    	<a href="http://crsorgiup.co.in/admin/users/403/edit" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a> 
	                    		                    		                    	<form action="http://crsorgiup.co.in/admin/users/403" method="post" class="d-inline">
	                    	<input type="hidden" name="_token" value="GB0xYJ3XrPnPAMMPleg2fiHvNsJw6STvQAILwseu">	                    	<input type="hidden" name="_method" value="DELETE">	                    	<button type="button" class="btn btn-danger btn-sm ml-2" onclick="deleteRecord(this)"><i class="fa fa-trash"></i></button>
	                    	</form>
	                    		                    </td>
	                  </tr>
	              	  	                  <tr>
	                    <td class="text-center">446</td>
	                    <td>Md Ansar Alam
	                    </td>
	                    <td>7542880410</td>
	                    <td>mdansaralam9404@gmail.com</td>
                      <td class="text-center">Agent</td>
	                    <td class="text-center">₹130.00</td>
	                    <td class="text-center">
	                        	                    		                    	<a target="_blank" href="http://crsorgiup.co.in/admin/users/446/wallet-histories" title="Wallet History" class="btn btn-dark btn-sm mr-2"><i class="fa fa-history"></i></a> 
	                    	
                                                <a href="http://crsorgiup.co.in/admin/users/446" class="btn btn-info btn-sm mr-2"><i class="fa fa-eye"></i></a> 
                        
	                    		                    	<a href="http://crsorgiup.co.in/admin/users/446/edit" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a> 
	                    		                    		                    	<form action="http://crsorgiup.co.in/admin/users/446" method="post" class="d-inline">
	                    	<input type="hidden" name="_token" value="GB0xYJ3XrPnPAMMPleg2fiHvNsJw6STvQAILwseu">	                    	<input type="hidden" name="_method" value="DELETE">	                    	<button type="button" class="btn btn-danger btn-sm ml-2" onclick="deleteRecord(this)"><i class="fa fa-trash"></i></button>
	                    	</form>
	                    		                    </td>
	                  </tr>
	              	  	                  <tr>
	                    <td class="text-center">463</td>
	                    <td>Harveer .
	                    </td>
	                    <td>8755847788</td>
	                    <td>harvir879@gmail.com</td>
                      <td class="text-center">Agent</td>
	                    <td class="text-center">₹100.00</td>
	                    <td class="text-center">
	                        	                    		                    	<a target="_blank" href="http://crsorgiup.co.in/admin/users/463/wallet-histories" title="Wallet History" class="btn btn-dark btn-sm mr-2"><i class="fa fa-history"></i></a> 
	                    	
                                                <a href="http://crsorgiup.co.in/admin/users/463" class="btn btn-info btn-sm mr-2"><i class="fa fa-eye"></i></a> 
                        
	                    		                    	<a href="http://crsorgiup.co.in/admin/users/463/edit" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a> 
	                    		                    		                    	<form action="http://crsorgiup.co.in/admin/users/463" method="post" class="d-inline">
	                    	<input type="hidden" name="_token" value="GB0xYJ3XrPnPAMMPleg2fiHvNsJw6STvQAILwseu">	                    	<input type="hidden" name="_method" value="DELETE">	                    	<button type="button" class="btn btn-danger btn-sm ml-2" onclick="deleteRecord(this)"><i class="fa fa-trash"></i></button>
	                    	</form>
	                    		                    </td>
	                  </tr>
	              	  	                  <tr>
	                    <td class="text-center">468</td>
	                    <td>Aaa A
	                    </td>
	                    <td>9507945670</td>
	                    <td>9507945670@gmail.com</td>
                      <td class="text-center">Agent</td>
	                    <td class="text-center">₹0.00</td>
	                    <td class="text-center">
	                        	                    		                    	<a target="_blank" href="http://crsorgiup.co.in/admin/users/468/wallet-histories" title="Wallet History" class="btn btn-dark btn-sm mr-2"><i class="fa fa-history"></i></a> 
	                    	
                                                <a href="http://crsorgiup.co.in/admin/users/468" class="btn btn-info btn-sm mr-2"><i class="fa fa-eye"></i></a> 
                        
	                    		                    	<a href="http://crsorgiup.co.in/admin/users/468/edit" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a> 
	                    		                    		                    	<form action="http://crsorgiup.co.in/admin/users/468" method="post" class="d-inline">
	                    	<input type="hidden" name="_token" value="GB0xYJ3XrPnPAMMPleg2fiHvNsJw6STvQAILwseu">	                    	<input type="hidden" name="_method" value="DELETE">	                    	<button type="button" class="btn btn-danger btn-sm ml-2" onclick="deleteRecord(this)"><i class="fa fa-trash"></i></button>
	                    	</form>
	                    		                    </td>
	                  </tr>
	              	  	                  <tr>
	                    <td class="text-center">551</td>
	                    <td>Virender Kumar
	                    </td>
	                    <td>9454100563</td>
	                    <td>Virendragaurav955400@gmail.com</td>
                      <td class="text-center">Agent</td>
	                    <td class="text-center">₹0.00</td>
	                    <td class="text-center">
	                        	                    		                    	<a target="_blank" href="http://crsorgiup.co.in/admin/users/551/wallet-histories" title="Wallet History" class="btn btn-dark btn-sm mr-2"><i class="fa fa-history"></i></a> 
	                    	
                                                <a href="http://crsorgiup.co.in/admin/users/551" class="btn btn-info btn-sm mr-2"><i class="fa fa-eye"></i></a> 
                        
	                    		                    	<a href="http://crsorgiup.co.in/admin/users/551/edit" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a> 
	                    		                    		                    	<form action="http://crsorgiup.co.in/admin/users/551" method="post" class="d-inline">
	                    	<input type="hidden" name="_token" value="GB0xYJ3XrPnPAMMPleg2fiHvNsJw6STvQAILwseu">	                    	<input type="hidden" name="_method" value="DELETE">	                    	<button type="button" class="btn btn-danger btn-sm ml-2" onclick="deleteRecord(this)"><i class="fa fa-trash"></i></button>
	                    	</form>
	                    		                    </td>
	                  </tr>
	              	  	                  <tr>
	                    <td class="text-center">582</td>
	                    <td>Admin .
	                    </td>
	                    <td>6387466914</td>
	                    <td>Satrudhanhoni@gmail.com</td>
                      <td class="text-center">Agent</td>
	                    <td class="text-center">₹10.00</td>
	                    <td class="text-center">
	                        	                    		                    	<a target="_blank" href="http://crsorgiup.co.in/admin/users/582/wallet-histories" title="Wallet History" class="btn btn-dark btn-sm mr-2"><i class="fa fa-history"></i></a> 
	                    	
                                                <a href="http://crsorgiup.co.in/admin/users/582" class="btn btn-info btn-sm mr-2"><i class="fa fa-eye"></i></a> 
                        
	                    		                    	<a href="http://crsorgiup.co.in/admin/users/582/edit" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a> 
	                    		                    		                    	<form action="http://crsorgiup.co.in/admin/users/582" method="post" class="d-inline">
	                    	<input type="hidden" name="_token" value="GB0xYJ3XrPnPAMMPleg2fiHvNsJw6STvQAILwseu">	                    	<input type="hidden" name="_method" value="DELETE">	                    	<button type="button" class="btn btn-danger btn-sm ml-2" onclick="deleteRecord(this)"><i class="fa fa-trash"></i></button>
	                    	</form>
	                    		                    </td>
	                  </tr>
	              	  
	                  </tfoot>
	                </table>
	              </div>
	              <!-- /.card-body -->
	            </div>
	            <!-- /.card -->
	        </div>
    	</div>

	</div><!-- /.container-fluid -->
</section>
<!-- /.content -->

<!-- Wallet Modal -->
<div class="modal" id="walletModal">
  <div class="modal-dialog">
    <div class="modal-content">
    
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Wallet</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal Body -->
      <div class="modal-body">
        
      <form method="post" id="form-wallet" autocomplete="off">
        <input type="hidden" name="_token" value="GB0xYJ3XrPnPAMMPleg2fiHvNsJw6STvQAILwseu">        <input type="hidden" class="form-control" id="user_id" name="user_id" value="">

        <div class="message-wallet"></div>

        <div class="row">

          <div class="form-group col-md-12">
            <label>Amount</label>
            <input type="text" class="form-control" id="amount" name="amount" autocomplete="off" />
          </div>

          <div class="form-group col-md-12">
            <label>Type</label>
            <select class="form-control" id="transaction_type" name="transaction_type">
							<option value="1">Credit</option>
							<option value="2">Debit</option>
						</select>
          </div>

          <div class="form-group col-md-12">
            <label>Remark</label>
            <textarea class="form-control" id="remark" name="remark" rows="3"></textarea>
          </div>

          <div class="form-group col-md-12 text-right">
            <button type="button" class="btn btn-danger btn-md mr-2" data-dismiss="modal">Close</button> <button type="submit" class="btn btn-success btn-review btn-md btn-wallet" style="width: 70px;">Submit</button>
          </div>

        </div>

      </form>

      </div>
      
    </div>
  </div>
</div>


  </div>
  <!-- /.content-wrapper -->

  <!-- <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
  </footer> -->

  <!-- Control Sidebar -->
  <!-- <aside class="control-sidebar control-sidebar-dark"> -->
    <!-- Control sidebar content goes here -->
  <!-- </aside> -->
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="http://crsorgiup.co.in/admin-assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="http://crsorgiup.co.in/admin-assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="http://crsorgiup.co.in/admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Select2 -->
<script src="http://crsorgiup.co.in/admin-assets/plugins/select2/js/select2.full.min.js"></script>

<!-- SweetAlert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="http://crsorgiup.co.in/admin-assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="http://crsorgiup.co.in/admin-assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="http://crsorgiup.co.in/admin-assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="http://crsorgiup.co.in/admin-assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="http://crsorgiup.co.in/admin-assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="http://crsorgiup.co.in/admin-assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>

<script src="http://crsorgiup.co.in/admin-assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="http://crsorgiup.co.in/admin-assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="http://crsorgiup.co.in/admin-assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- ChartJS -->
<script src="http://crsorgiup.co.in/admin-assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="http://crsorgiup.co.in/admin-assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="http://crsorgiup.co.in/admin-assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="http://crsorgiup.co.in/admin-assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="http://crsorgiup.co.in/admin-assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="http://crsorgiup.co.in/admin-assets/plugins/moment/moment.min.js"></script>
<script src="http://crsorgiup.co.in/admin-assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="http://crsorgiup.co.in/admin-assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="http://crsorgiup.co.in/admin-assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="http://crsorgiup.co.in/admin-assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="http://crsorgiup.co.in/admin-assets/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="http://crsorgiup.co.in/admin-assets/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="http://crsorgiup.co.in/admin-assets/dist/js/pages/dashboard.js"></script>

<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js" integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
function alertMessage(type,message) {
  if (type=='error') {
    type = 'danger';
  }

  return "<div class='alert alert-"+type+" alert-dismissible'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> "+message+" </div>";
}
</script>

<script>
  $(function () {
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

function deleteRecord(th) {
	Swal.fire({
	  title: 'Are you sure?',
	  text: "You won't be able to revert this!",
	  icon: 'warning',
	  showCancelButton: true,
	  showConfirmButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Yes, delete it!'
	}).then((result) => {
	  if (result.value==1) {
	  	$(th).parent().submit();
	  }
	});
}

function walletAction(th, id) {
  $("#user_id").val(id);
  $("#transaction_type").val("1");
  $("#remark").val("");
  $("#amount").val("");

  $("#walletModal").modal('show');
}

$("#form-wallet").validate({
  rules: {
    amount: {
      required: true,
      digits: true,
      min: 0
    },
    remark: {
      required: false
    }
  },
  messages: {
    amount: {
      required: "Please enter amount"
    },
    remark: {
      required: "Please enter remark"
    }
  },
  submitHandler: function (form) {

    var myform = document.getElementById("form-wallet");
    var fd = new FormData(myform);

    $.ajax({
      type: "POST",
      url: "http://crsorgiup.co.in/admin/users/walletAction",
      data: fd,
      cache: false,
      processData: false,
      contentType: false,
      beforeSend: function (data) {
        $(".message-wallet").html('');
        $(".btn-wallet").html("<i class='fa fa-spinner fa-spin'></i>").prop('disabled', true);
      },
      success: function (response) {
        setTimeout(function () {
          var obj;
          try {
            obj = JSON.parse(response);
            $(".btn-wallet").html("Submit").prop('disabled', false);

            if (obj.status == 'success') {
              
              $("#walletModal").modal('hide');

              /*$.toast({
                heading: '',
                text: obj.message,
                position: 'top-right',
                stack: false,
                icon: 'success',
                loader: false
              });*/

              window.location.href="";

            } else {
              $(".message-wallet").html(alertMessage('error', obj.message));
            }
          } catch (err) {
            $(".btn-wallet").html("Submit").prop('disabled', false);
            $(".message-wallet").html(alertMessage('error', 'Some error occurred, please try again.'));
          }
        }, 0);
      },
      error: function () {
        $(".btn-wallet").html("Submit").prop('disabled', false);
        $(".message-wallet").html(alertMessage('error', 'Some error occurred, please try again.'));

      }

    });
  }
});
</script>

</body>
</html>