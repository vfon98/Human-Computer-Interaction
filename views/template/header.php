<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Quản lý đào tạo</title>
	<link rel="shortcut icon" type="image/x-icon" href="/assets/img/favicon.ico">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="/assets/css/sidebar.css">
	<link rel="stylesheet" href="/assets/css/main.css">
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
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom">
				<button class="btn btn-dark" id="menu-toggle"><span class="navbar-toggler-icon"></span></button>
				<a class="navbar-brand ml-2" href="/">Quản lý đào tạo</a>
				<ul class="navbar-nav ml-auto mt-2 mt-lg-0">
					<li class="nav-item active">
						<a class="nav-link" href="/">Trang chủ</a>
					</li>
			<!-- 					<li class="nav-item">
						<a class="nav-link" href="#">Link</a>
					</li> -->
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fa fa-user"></i> Tài khoản
						</a>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
							<!-- <a class="dropdown-item" href="#">Thay đổi quyền</a> -->
							<a class="dropdown-item" href="#">
								<i class="fa fa-wrench text-dark"></i>&nbsp; Sửa thông tin
							</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="../logout.php">
								<i class="fa fa-power-off text-danger"></i>&nbsp; Đăng xuất
							</a>
						</div>
					</li>
				</ul>
			</nav>			