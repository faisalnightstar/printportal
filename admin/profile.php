<?php
include('header.php');
if (isset($_POST['s_profile']) && $_POST['s_profile'] == "ahkweb" && $_POST['phone'] != "ADMIN" && $_POST['email'] != "ADMIN") {
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$phone = mysqli_real_escape_string($conn, $_POST['phone']);

	$sres = mysqli_query($conn, "UPDATE usertable SET name='$name', emailid='$email', phone='$phone' WHERE emailid='$mail' ");
	if ($sres) {
?>
		<script>
			$(function() {
				Swal.fire(
					'Success!',
					'Your Profile data Updated Successfully',
					'success'
				)
			});
		</script>
	<?php
	} else {
	?>
		<script>
			$(function() {
				Swal.fire(
					'Opps!',
					'Internal Server Error, Please Try Again Later',
					'error'
				)
			});
		</script>
		<?php
	}
}

if (isset($_POST['s_password']) && $_POST['s_password'] == "ahkwebsolutions") {
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
	if ($password == $cpassword) {
		$fpassword = password_hash($password, PASSWORD_DEFAULT);
		$pres = mysqli_query($conn, "UPDATE usertable SET password='$fpassword' WHERE emailid='$mail' ");

		if ($pres) {
		?>
			<script>
				$(function() {
					Swal.fire(
						'Success!',
						'Your Password Updated Successfully',
						'success'
					)
				});
			</script>
		<?php
		} else {
		?>
			<script>
				$(function() {
					Swal.fire(
						'Opps!',
						'Internal Server Error, Please Try Again Later',
						'error'
					)
				});
			</script>
		<?php
		}
	} else {
		?>
		<script>
			$(function() {
				Swal.fire(
					'Opps!',
					'Confirm Password Does not Match',
					'error'
				)
			});
		</script>
<?php
	}
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Profile</h1>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">

			<div class="row">
				<div class="col-md-3">

					<!-- Profile Image -->
					<div class="card card-primary card-outline">
						<div class="card-body box-profile">
							<div class="text-center">
								<img class="profile-user-img img-fluid img-circle" src="uploads/user.png" alt="User profile picture">
							</div>

							<h3 class="profile-username text-center"><?php echo $_SESSION['name'] ?></h3>

							<p class="text-muted text-center"><?php echo $_SESSION['usertype'] ?></p>

							<ul class="list-group list-group-unbordered mb-3">
								<li class="list-group-item">
									<b>Mobile</b> <a class="float-right"><?php echo $_SESSION['phone'] ?></a>
								</li>
								<li class="list-group-item">
									<b>Email</b> <a class="float-right"><?php echo $_SESSION['emailid'] ?></a>
								</li>
								<li class="list-group-item">
									<b>Created At</b> <a class="float-right"><?php echo $udata['joineddate'] ?> 19:28:55</a>
								</li>
								<li class="list-group-item">
									<b>Wallet balance</b> <a class="float-right"><b>₹<?php echo $udata['walletamount'] ?></b></a>
								</li>
							</ul>

						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->

				</div>
				<!-- /.col -->
				<div class="col-md-9">
					<div class="card">
						<div class="card-header p-2">
							<ul class="nav nav-pills">
								<li class="nav-item"><a class="nav-link active" href="#profile-setting" data-toggle="tab">Profile Update</a></li>
								<li class="nav-item"><a class="nav-link" href="#births" data-toggle="tab">Birth Certificates</a></li>
								<li class="nav-item"><a class="nav-link" href="#deaths" data-toggle="tab">Death Certificates</a></li>
							</ul>
						</div><!-- /.card-header -->
						<div class="card-body">
							<div class="tab-content">


								<!-- /.tab-pane -->

								<div class="active tab-pane" id="profile-setting">
									<form action="" method="POST" name="profile" class="form-horizontal">
										<div class="form-group row">
											<label for="inputName" class="col-sm-2 col-form-label">Name</label>
											<div class="col-sm-10">
												<input type="name" class="form-control" id="inputName" name="name" value="<?php echo $udata['name'] ?>" placeholder="Name">
											</div>
										</div>
										<div class="form-group row">
											<label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
											<div class="col-sm-10">
												<input type="email" class="form-control" name="email" id="inputEmail" value="<?php echo $udata['emailid'] ?>" placeholder="Email">
											</div>
										</div>
										<input type="hidden" name="s_profile" value="ahkweb">
										<div class="form-group row">
											<label for="inputName2" class="col-sm-2 col-form-label">Phone</label>
											<div class="col-sm-10">
												<input type="text" class="form-control" name="phone" value="<?php echo $udata['phone'] ?>" id="inputName2" placeholder="Phone">
											</div>
										</div>


										<div class="form-group row">
											<div class="offset-sm-2 col-sm-10">
												<button type="submit" class="btn btn-success">Submit</button>
											</div>
										</div>
									</form>
									<!-- Password  -->
									<hr>
									<form action="" name="pass" method="POST" class="form-horizontal">
										<div class="form-group row">
											<label for="inputName" class="col-sm-2 col-form-label">Password</label>
											<div class="col-sm-10">
												<input type="hidden" name="s_password" value="ahkwebsolutions">
												<input type="password" class="form-control" id="inputName" name="password" placeholder="Password">
											</div>
										</div>
										<div class="form-group row">
											<label for="inputEmail" class="col-sm-2 col-form-label">Confirm Password</label>
											<div class="col-sm-10">
												<input type="password" class="form-control" id="inputEmail" name="cpassword" placeholder="Confirm Password">
											</div>
										</div>




										<div class="form-group row">
											<div class="offset-sm-2 col-sm-10">
												<button type="submit" class="btn btn-danger">Submit</button>
											</div>
										</div>
									</form>
								</div>
								<!-- /.tab-pane -->
								<!-- /.tab-pane -->
								<div class="tab-pane" id="births">

									<table id="tb-births" class="table table-bordered table-hover">
										<thead>
											<tr>
												<th style="width: 50px;" class="text-center">ID</th>
												<th>Name</th>
												<th style="width: 120px;" class="text-center">Payment Status</th>
												<th style="width: 150px;" class="text-center">Action</th>
											</tr>
										</thead>
										<tbody>

											<?php
											$res = mysqli_query($conn, "SELECT * FROM `birthmanual` WHERE username='$s_phone' ");

											?>

											<?php
											if (mysqli_num_rows($res) > 0) {
												while ($data = mysqli_fetch_array($res)) {
											?>
													<tr>
														<td class="text-center"><?php echo $data['id'] ?></td>
														<td><?php echo $data['name'] ?></td>
														<td class="text-center"><button type="button" class="btn btn-success btn-tb-status">Success</button>
														</td>
														<td class="text-center">
															<a href="web/index.php/auth/birthCertificate/view/B/bWF4VExRZC9GTnhBWkhtZTNrdWhUZz09.php?id=<?php echo $data['id'] ?>&cont=Anjsjdn" class="btn btn-primary btn-sm" title="Download Birth Certificate"><i class="fa fa-download"></i></a>
															<a href="birthview.php?id=<?php echo base64_encode($data['id']) ?>" class="btn btn-dark btn-sm ml-2"><i class="fa fa-eye"></i></a>
															<a href="birthedit.php?id=<?php echo base64_encode($data['id']) ?>" class="btn btn-success btn-sm ml-2"><i class="fa fa-edit"></i></a>
														</td>
													</tr>


											<?php
												}
											}
											?>


										</tbody>
									</table>

								</div>
								<!-- /.tab-pane -->
								<!-- /death tab-pane -->
								<div class="tab-pane" id="deaths">

									<table id="tb-deaths" class="table table-bordered table-hover">
										<thead>
											<tr>
												<th style="width: 50px;" class="text-center">ID</th>
												<th>Name</th>
												<th style="width: 120px;" class="text-center">Payment Status</th>
												<th style="width: 150px;" class="text-center">Action</th>
											</tr>
										</thead>
										<tbody>
										<?php
											$dres = mysqli_query($conn, "SELECT * FROM `dmanual` WHERE username='$s_phone' ");

											?>

											<?php
											if (mysqli_num_rows($dres) > 0) {
												while ($ddata = mysqli_fetch_array($dres)) {
											?>
											<tr>
												<td class="text-center"><?php echo $ddata['id'] ?></td>
												<td><?php echo $ddata['name'] ?></td>
												<td class="text-center"><button type="button" class="btn btn-success btn-tb-status">Success</button>
												</td>
												<td class="text-center">
													<a href="web/index.php/auth/deathCertificate/view/B/bWF4VExRZC9GTnhBWkhtZTNrdWhUZz09.php?id=<?php echo $ddata['id'] ?>&cont=Anjsjdn" class="btn btn-primary btn-sm" title="Download Death Certificate"><i class="fa fa-download"></i></a>
													<a href="deathview.php?id=<?php echo base64_encode($ddata['id']) ?>" class="btn btn-dark btn-sm ml-2"><i class="fa fa-eye"></i></a>
													<a href="deathedit.php?id=<?php echo base64_encode($ddata['id']) ?>" class="btn btn-success btn-sm ml-2"><i class="fa fa-edit"></i></a>
												</td>
											</tr>

											<?php
												}
											}
											?>


											



										</tbody>
									</table>

								</div>
								<!-- /.tab-pane -->

							</div>
							<!-- /.tab-content -->
						</div><!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->

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
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
	$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>

<!-- SweetAlert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>

<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>

<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js" integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
	function alertMessage(type, message) {
		if (type == 'error') {
			type = 'danger';
		}

		return "<div class='alert alert-" + type + " alert-dismissible'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> " + message + " </div>";
	}
</script>

<script>
	$(function() {
		$('#tb-wallet').DataTable({
			"paging": true,
			"lengthChange": true,
			"searching": true,
			"ordering": true,
			"info": true,
			"autoWidth": false,
			"responsive": true,
		});
		$('#tb-births').DataTable({
			"paging": true,
			"lengthChange": true,
			"searching": true,
			"ordering": true,
			"info": true,
			"autoWidth": false,
			"responsive": true,
		});
		$('#tb-deaths').DataTable({
			"paging": true,
			"lengthChange": true,
			"searching": true,
			"ordering": true,
			"info": true,
			"autoWidth": false,
			"responsive": true,
		});
	});
</script>

</body>

</html>