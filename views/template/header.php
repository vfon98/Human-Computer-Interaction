<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title i18n lang-key="eduMgr">Quản lý đào tạo</title>
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
			};

			$('#js-caret-menu').click(function() {
				$(this).toggleClass('fa-rotate-180');
			});
		});
		// The url that define which language of data table to display
		var dtLangUrl = "/assets/lang-vi.json";
	</script>
	<script src="/assets/js/i18n.js"></script>
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
				<a class="navbar-brand ml-2" href="/" i18n lang-key="eduMgr">Quản lý đào tạo</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
					<i class="fa fa-caret-down fa-lg" id="js-caret-menu"></i>
				</button>
				<div class="collapse navbar-collapse" id="collapsibleNavbar">
					<ul class="navbar-nav ml-auto mt-2 mt-lg-0">
						<li class="nav-item active">
							<a class="nav-link" href="/" i18n lang-key="home">Trang chủ</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-globe"></i> <span id="js-cur-lang">Tiếng Việt</span>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item m-0 btn" id="btn-change-lang"><i class="fa fa-fw fa-language mx-2"></i> <span id="js-toggle-lang">English</span>
								</a>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-user"></i> <span i18n lang-key="account">Tài khoản</span>
							</a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
								<!-- <a class="dropdown-item" href="#">Thay đổi quyền</a> -->
								<a class="dropdown-item" href="#"
									data-toggle="modal" data-target="#modal-account"
								>
									<i class="fa fa-fw fa-wrench text-dark"></i>&nbsp; <span i18n lang-key="changeInfo">Sửa thông tin</span>
								</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="../logout.php" title="Ctrl+Shift+X">
									<i class="fa fa-fw fa-power-off text-danger"></i>&nbsp; <span i18n lang-key="logout">Đăng xuất</span>
								</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>			
