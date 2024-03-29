<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title i18n lang-key="regNow">Đăng ký học</title>
	<link rel="shortcut icon" type="image/x-icon" href="/assets/img/favicon.ico">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		html {
			scroll-behavior: smooth;
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
	  <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img src="/assets/img/PTST-logo-white.png" alt="logo" width="50" class="my-n3 mx-n1 ml-n2">
            <span i18n lang-key="eduMgr">Quản lý đào tạo</span>
        </a>
	    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
		</button>
	      <div class="collapse navbar-collapse" id="collapsibleNavbar">
	      	<ul class="navbar-nav ml-auto">
	      	  <li class="nav-item">
	      	    <a class="nav-link" href="/" i18n lang-key="homepage">Trang chủ</a>
	      	  </li>
	      	  <li class="nav-item">
	      	    <a class="nav-link" href="/#footer-link" i18n lang-key="contact">Liên hệ</a>
	      	  </li>
	      	  <li class="nav-item dropdown">
	      	  	<a href="#" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown">
	      	  		<i class="fa fa-globe"></i> <span id="js-cur-lang">Tiếng Việt</span>
	      	  	</a>
	      	  	<div class="dropdown-menu dropdown-menu-right">
	      	  		<a class="dropdown-item m-0 btn" id="btn-change-lang"><i class="fa fa-fw fa-language mx-2"></i> <span id="js-toggle-lang">English</span>
	      	  		</a>
	      	  	</div>
	      	  </li>
	      	  <li class="nav-item">
	      	    <a class="nav-link" href="program_list.php" i18n lang-key="proList">Chương trình đào tạo</a>
	      	  </li>
	      	  <li class="nav-item active">
	      	    <a class="nav-link" href="/views/register.php" i18n lang-key="register">Đăng ký học</a>
	      	  </li>
	      	  <li class="nav-item">
	      	    <a class="nav-link" href="/views/login.php" i18n lang-key="login">Đăng nhập</a>
	      	  </li>
	      	</ul>
	      </div>
	  </div>
	</nav>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6 pt-2">
				<div class="card shadow">
					<div class="card-body pt-2">
						<form id="js-register-form" action="/php/student/register_program.php" method="POST">
							<legend class="pb-1 mb-2 border-bottom text-primary" i18n lang-key="generalInfo">Thông tin chung</legend>
							<fieldset class="form-group">
								<label i18n lang-key="fullName">Họ tên</label>
								<input type="text" name="name" class="form-control" placeholder="VD: Nguyễn Văn A" i18n-place="Ex: John Doe" required autofocus>
							</fieldset>
							<fieldset class="form-group">
								<label i18n lang-key="birthday">Ngày sinh</label>
								<input type="date" name="birthday" class="form-control" id="inp-bday">
								<div class="invalid-feedback" i18n lang-key="feedbackDate">Ngày sinh không thể lớn hơn ngày hiện tại !</div>
							</fieldset>
							<fieldset class="form-group">
								<label>Email</label>
								<input type="text" id="inp-email" name="email" class="form-control" placeholder="VD: example@mail.com" i18n-place="Ex: example@mail.com" value="example@mail.com" pattern="[^@]+@[^\.]+\..+" title="Email không hợp lệ !">
							</fieldset>
							<fieldset class="form-group">
								<label i18n lang-key="address">Địa chỉ</label>
								<input type="text" name="address" class="form-control" placeholder="VD: 3/2, Ninh Kiều, Cần Thơ" i18n-place="Ex: New York, USA">
							</fieldset>
							<fieldset class="form-group">
								<label i18n lang-key="program">Chọn khóa học</label>
								<select id="sel-program" name="program_id" class="form-control" required>
									<option i18n lang-key="pleaseChoosePro" value="" disabled selected>--- Chọn khóa học muốn đăng ký ---</option>
									<?php require '../php/program/get_name.php'; ?>
								</select>
							</fieldset>
						
							<legend class="pb-1 mt-4 mb-2 border-bottom text-primary" i18n lang-key="loginInfo">Thông tin đăng nhập</legend>
							<fieldset class="form-group">
								<label i18n lang-key="username">Tên đăng nhập</label>
								<input type="text" name="username" id="inp-username" class="form-control" placeholder="VD: nguyenvana" i18n-place="Ex: johndoe" maxlength="20" required>
								<div class="invalid-feedback" i18n lang-key="existedAcc">Tài khoản đã tồn tại !</div>
							</fieldset>
							<fieldset class="form-group">
								<label i18n lang-key="password">Mật khẩu</label>
								<input type="password" name="password" class="form-control" placeholder="Tối thiểu 4 ký tự" i18n-place="At least 4 characters" minlength="4" required>
							</fieldset>
							<hr>
							<button type="submit" name="submit-btn" id="btn-submit" class="btn btn-primary btn-lg btn-block" i18n lang-key="regNow">Đăng ký ngay</button>
						</form>
					</div>
				</div>
			</div>

			<div class="col-md-6 d-none d-sm-block">
				<div class="card mt-2 shadow">
					<div class="card-header bg-info text-white">
						<h4 class="text-center mb-0" i18n lang-key="proList">Danh sách chương trình đào tạo</h4>
					</div>
					<div class="card-body pt-2 text-nowrap">
						<table class="table table-responsive-lg table-inverse table-hover table-striped">
							<thead>
								<tr>
									<th i18n lang-key="no" class="text-center">STT</th>
									<th i18n lang-key="proName">Tên chương trình</th>
									<th i18n lang-key="tuition">Học phí</th>
									<th i18n lang-key="option">Tùy chọn</th>
								</tr>
							</thead>
							<tbody>
								<?php
								require '../php/program/get_all.php';
								$i = 1;
								while($row = $result->fetch_assoc()) {
									echo
									'<tr>
									<td class="text-center">'.$i++.'</td>
									<td>'.$row['name'].'</td>
									<td>'.number_format($row['tuition']).' VND</td>
									<td><button onclick="setProgram('.$row['id'].')" class="btn btn-link p-0">
										Đăng ký <i class="fa fa-paper-plane"></i></button>
									</td>
									</tr>';
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="/assets/js/register.js"></script>
	<script src="/assets/js/i18n.js"></script>
	<script>
		$(document).ready(function() {
			// document.getElementById("inp-bday").valueAsDate = new Date();
			$('#inp-bday').val("1999-01-01");
		});
		function setProgram(p_id) {
			location.assign('#sel-program');
			$('#sel-program').val(p_id).focus();
		}
	</script>
</body>
</html>
