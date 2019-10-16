<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Đăng ký học</title>
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
	    <a class="navbar-brand" href="/">Quản lý đào tạo</a>
	      <ul class="navbar-nav ml-auto">
	        <li class="nav-item">
	          <a class="nav-link" href="/">Trang chủ</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link" href="#">Liên hệ</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link" href="program_list.php">Chương trình đào tạo</a>
	        </li>
	        <li class="nav-item active">
	          <a class="nav-link" href="/views/register.php">Đăng ký học</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link" href="/views/login.php">Đăng nhập</a>
	        </li>
	      </ul>
	  </div>
	</nav>

	<div class="container-fluid">
		<div class="row">
			<div class="col-6 pt-2">
				<div class="card shadow">
					<div class="card-body pt-2">
						<form id="js-register-form" action="/php/student/register_program.php" method="POST">
							<legend class="pb-1 mb-2 border-bottom text-primary">Thông tin chung</legend>
							<fieldset class="form-group">
								<label>Họ tên</label>
								<input type="text" name="name" class="form-control" placeholder="VD: Nguyễn Văn A" required autofocus>
							</fieldset>
							<fieldset class="form-group">
								<label>Ngày sinh</label>
								<input type="date" name="birthday" class="form-control" placeholder="VD: Nguyễn Văn A" id="inp-bday">
								<div class="invalid-feedback">Ngày sinh không thể lớn hơn ngày hiện tại !</div>
							</fieldset>
							<fieldset class="form-group">
								<label>Email</label>
								<input type="text" id="inp-email" name="email" class="form-control" placeholder="VD: example@mail.com" value="example@mail.com" pattern="[^@]+@[^\.]+\..+" title="Email không hợp lệ !">
							</fieldset>
							<fieldset class="form-group">
								<label>Địa chỉ</label>
								<input type="text" name="address" class="form-control" placeholder="VD: 3/2, Ninh Kiều, Cần Thơ">
							</fieldset>
							<fieldset class="form-group">
								<label>Chọn khóa học</label>
								<select id="sel-program" name="program_id" class="form-control" required>
									<option value="" disabled selected>--- Chọn khóa học muốn đăng ký ---</option>
									<?php require '../php/program/get_name.php'; ?>
								</select>
							</fieldset>
						
							<legend class="pb-1 mt-4 mb-2 border-bottom text-primary">Thông tin đăng nhập</legend>
							<fieldset class="form-group">
								<label>Tên đăng nhập</label>
								<input type="text" name="username" id="inp-username" class="form-control" placeholder="VD: nguyenvana" maxlength="20" required>
								<div class="invalid-feedback">Tài khoản đã tồn tại !</div>
							</fieldset>
							<fieldset class="form-group">
								<label>Mật khẩu</label>
								<input type="password" name="password" class="form-control" placeholder="Tối thiểu 4 ký tự" minlength="4" required>
							</fieldset>
							<hr>
							<button type="submit" name="submit-btn" id="btn-submit" class="btn btn-primary btn-lg btn-block">Đăng ký ngay</button>
						</form>
					</div>
				</div>
			</div>

			<div class="col-md-6">
				<div class="card mt-2 shadow">
					<div class="card-header bg-info text-white">
						<h4 class="text-center mb-0">Danh sách chương trình đào tạo</h4>
					</div>
					<div class="card-body">
						<table class="table table-inverse table-hover table-striped">
							<thead>
								<tr>
									<th class="text-center">STT</th>
									<th>Tên chương trình</th>
									<th>Học phí</th>
									<th>Tùy chọn</th>
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