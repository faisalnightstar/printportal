
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
          
                    <li class="nav-item menu-open">
            <a href="http://crsorgiup.co.in/admin/states" class="nav-link active">
              <i class="nav-icon fas fa-list"></i>
              <p>
                States
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                            <li class="nav-item">
                <a href="http://crsorgiup.co.in/admin/states" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>State List</p>
                </a>
              </li>
                                        </ul>
          </li>
          
                    <li class="nav-item">
            <a href="http://crsorgiup.co.in/admin/users" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Users
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                            <li class="nav-item">
                <a href="http://crsorgiup.co.in/admin/users" class="nav-link">
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
        <h1 class="m-0">State List</h1>
      </div><!-- /.col -->
      <div class="col-sm-6 text-right">
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
	                    <th>State Name</th>
	                    <th style="width: 80px;" class="text-center">Status</th>
	                    <th style="width: 100px;" class="text-center">Action</th>
	                  </tr>
	                  </thead>
	                  <tbody>

	                  	                  <tr>
	                    <td class="text-center">14</td>
	                    <td>CHANDIGARH (चंडीगढ)</td>
	                    <td class="text-center"><button type="button" class="btn btn-success btn-tb-status">Active</button>
	                    </td>
	                    <td class="text-center">
	                    		                    		                    </td>
	                  </tr>
	              	  	                  <tr>
	                    <td class="text-center">13</td>
	                    <td>PUNJAB (ਪੰਜਾਬ)</td>
	                    <td class="text-center"><button type="button" class="btn btn-success btn-tb-status">Active</button>
	                    </td>
	                    <td class="text-center">
	                    		                    		                    </td>
	                  </tr>
	              	  	                  <tr>
	                    <td class="text-center">12</td>
	                    <td>MAHARASHTRA (महाराष्ट्र)</td>
	                    <td class="text-center"><button type="button" class="btn btn-success btn-tb-status">Active</button>
	                    </td>
	                    <td class="text-center">
	                    		                    		                    </td>
	                  </tr>
	              	  	                  <tr>
	                    <td class="text-center">11</td>
	                    <td>ANDHRA PRADESH (ఆంధ్రప్రదేశ్)</td>
	                    <td class="text-center"><button type="button" class="btn btn-success btn-tb-status">Active</button>
	                    </td>
	                    <td class="text-center">
	                    		                    		                    </td>
	                  </tr>
	              	  	                  <tr>
	                    <td class="text-center">10</td>
	                    <td>WEST BENGAL (পশ্চিমবঙ্গ)</td>
	                    <td class="text-center"><button type="button" class="btn btn-success btn-tb-status">Active</button>
	                    </td>
	                    <td class="text-center">
	                    		                    		                    </td>
	                  </tr>
	              	  	                  <tr>
	                    <td class="text-center">9</td>
	                    <td>MADHYA PRADESH (मध्य प्रदेश)</td>
	                    <td class="text-center"><button type="button" class="btn btn-success btn-tb-status">Active</button>
	                    </td>
	                    <td class="text-center">
	                    		                    		                    </td>
	                  </tr>
	              	  	                  <tr>
	                    <td class="text-center">8</td>
	                    <td>CHHATTISGARH (छतीसगढ़)</td>
	                    <td class="text-center"><button type="button" class="btn btn-success btn-tb-status">Active</button>
	                    </td>
	                    <td class="text-center">
	                    		                    		                    </td>
	                  </tr>
	              	  	                  <tr>
	                    <td class="text-center">7</td>
	                    <td>UTTARAKHAND (उत्तराखंड)</td>
	                    <td class="text-center"><button type="button" class="btn btn-success btn-tb-status">Active</button>
	                    </td>
	                    <td class="text-center">
	                    		                    		                    </td>
	                  </tr>
	              	  	                  <tr>
	                    <td class="text-center">1</td>
	                    <td>UTTAR PRADESH (उत्तर प्रदेश)</td>
	                    <td class="text-center"><button type="button" class="btn btn-success btn-tb-status">Active</button>
	                    </td>
	                    <td class="text-center">
	                    		                    		                    </td>
	                  </tr>
	              	  	                  <tr>
	                    <td class="text-center">6</td>
	                    <td>NCT OF DELHI (राष्ट्रीय राजधानी क्षेत्र दिल्ली)</td>
	                    <td class="text-center"><button type="button" class="btn btn-success btn-tb-status">Active</button>
	                    </td>
	                    <td class="text-center">
	                    		                    		                    </td>
	                  </tr>
	              	  	                  <tr>
	                    <td class="text-center">5</td>
	                    <td>RAJASTHAN (राजस्थान)</td>
	                    <td class="text-center"><button type="button" class="btn btn-success btn-tb-status">Active</button>
	                    </td>
	                    <td class="text-center">
	                    		                    		                    </td>
	                  </tr>
	              	  	                  <tr>
	                    <td class="text-center">4</td>
	                    <td>JHARKHAND (झारखंड)</td>
	                    <td class="text-center"><button type="button" class="btn btn-success btn-tb-status">Active</button>
	                    </td>
	                    <td class="text-center">
	                    		                    		                    </td>
	                  </tr>
	              	  	                  <tr>
	                    <td class="text-center">3</td>
	                    <td>HARYANA (हरियाणा)</td>
	                    <td class="text-center"><button type="button" class="btn btn-success btn-tb-status">Active</button>
	                    </td>
	                    <td class="text-center">
	                    		                    		                    </td>
	                  </tr>
	              	  	                  <tr>
	                    <td class="text-center">2</td>
	                    <td>BIHAR (बिहार)</td>
	                    <td class="text-center"><button type="button" class="btn btn-success btn-tb-status">Active</button>
	                    </td>
	                    <td class="text-center">
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
</script>

</body>
</html>