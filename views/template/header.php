<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Quản lý đào tạo</title>
	<link rel="shortcut icon" type="image/x-icon" href="/assets/img/favicon.ico">
	<!-- BOOSTRAP CDN -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<!-- JQUERY DATATABLE CDN -->
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
	<!-- TOASTR CDN -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	<!-- FONTAWESOME CDN -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- SELF DEFINED CSS -->
	<link rel="stylesheet" href="/assets/css/sidebar.css">
	<link rel="stylesheet" href="/assets/css/main.css">
	<style>
		.table > tbody > tr > td {
		     vertical-align: middle;
		}
		ul.pagination {
			display: flex;
			justify-content: center !important;
		}
		#tbl-program_info {
			padding: 0;
		}
	</style>
	<script src="/assets/js/main.js"></script>
	<script>
		// TOASTR CONFIG
		$(document).ready(function() {
			toastr.options = {
			  "closeButton": true,
			  "newestOnTop": true,
			  "positionClass": "toast-top-right",
			  "preventDuplicates": true,
			  "showDuration": "1000",
			  "hideDuration": "1500",
			  "timeOut": "1600",
			  "showEasing": "swing",
			  "hideEasing": "linear",
			  "showMethod": "slideDown",
			  "hideMethod": "slideToggle",
			  "tapToDismiss": true
			}
		});
	</script>
</head>
<body>
	<div class="d-flex" id="wrapper">
		<!-- Sidebar -->
		<!-- CHECK CURRENT ROLE BASED ON SITE ADDRESS -->
		<?php
			switch (basename(getcwd())) {
				case 'student':
					include 'sidebar/student.php';
					break;
				case 'teacher':
					include 'sidebar/teacher.php';
					break;
				case 'manager':
					include 'sidebar/manager.php';
					break;
				case 'admin':
					include 'sidebar/admin.php';
					break;
			}
		?>
		<!-- /#sidebar-wrapper -->

		<!-- Page Content -->
		<div id="page-content-wrapper">
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom"  style="font-size: 17px">
				<button class="btn btn-dark btn-outline-secondary" id="menu-toggle"><span class="navbar-toggler-icon"></span></button>
				<a class="navbar-brand ml-2" href="/">Quản lý đào tạo</a>
				<ul class="navbar-nav ml-auto mt-2 mt-lg-0">
					<li class="nav-item active">
						<a class="nav-link" href="/">Trang chủ</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown">
							<i class="fa fa-globe"></i> Tiếng Việt
						</a>
						<div class="dropdown-menu dropdown-menu-right text-center">
							<button class="dropdown-item m-0"><i class="fa fa-fw fa-language mx-2"></i> English</button>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fa fa-user"></i> Tài khoản
						</a>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
							<!-- <a class="dropdown-item" href="#">Thay đổi quyền</a> -->
							<a class="dropdown-item" href="#"
								data-toggle="modal" data-target="#modal-account"
							>
								<i class="fa fa-fw fa-wrench text-dark"></i>&nbsp; Sửa thông tin
							</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="../logout.php" title="Ctrl+Shift+X">
								<i class="fa fa-fw fa-power-off text-danger"></i>&nbsp; Đăng xuất
							</a>
						</div>
					</li>
				</ul>
			</nav>			