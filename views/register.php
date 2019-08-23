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
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
	  <div class="container">
	    <a class="navbar-brand" href="/">Quản lý đào tạo</a>
	      <ul class="navbar-nav ml-auto">
	        <li class="nav-item">
	          <a class="nav-link" href="/">Trang chủ</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link" href="#">Liên hệ</a>
	        </li>
	        <li class="nav-item active">
	          <a class="nav-link" href="/views/register.php">Đăng ký học</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link" href="/views/manager/registrars.php">Đăng nhập</a>
	        </li>
	      </ul>
	  </div>
	</nav>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6 shadow">
				<form id="js-register-form" action="/php/student/register_program.php" method="POST">
					<legend class="pb-1 mt-4 mb-2 border-bottom text-primary">Thông tin chung</legend>
					<fieldset class="form-group">
						<label>Họ tên</label>
						<input type="text" name="name" class="form-control" placeholder="VD: Nguyễn Văn A" required autofocus>
					</fieldset>
					<fieldset class="form-group">
						<label>Ngày sinh</label>
						<input type="date" name="birthday" class="form-control" placeholder="VD: Nguyễn Văn A">
					</fieldset>
					<fieldset class="form-group">
						<label>Email</label>
						<input type="email" name="email" class="form-control" placeholder="VD: example@mail.com">
					</fieldset>
					<fieldset class="form-group">
						<label>Địa chỉ</label>
						<input type="text" name="address" class="form-control" placeholder="VD: 3/2, Ninh Kiều, Cần Thơ">
					</fieldset>
					<fieldset class="form-group">
						<label>Chọn khóa học</label>
						<select id="" name="program_id" class="form-control" required>
							<option value="" disabled selected>--- Chọn khóa học muốn đăng ký ---</option>
							<?php require '../php/program/get_name.php'; ?>
						</select>
					</fieldset>

					<legend class="pb-1 mt-4 mb-2 border-bottom text-primary">Thông tin đăng nhập</legend>
					<fieldset class="form-group">
						<label>Tên đăng nhập</label>
						<input type="text" name="username" class="form-control" placeholder="VD: nguyenvana" required>
						<div class="invalid-feedback">Wrong</div>
					</fieldset>
					<fieldset class="form-group">
						<label>Mật khẩu</label>
						<input type="password" name="password" class="form-control" placeholder="Tối thiểu 4 ký tự" required>
					</fieldset>
					<hr>
					<button type="submit" name="submit-btn" class="btn btn-primary btn-lg btn-block">Đăng ký ngay</button>
				</form>
			</div>

			<div class="col-md-6">
				<div class="card mt-2 shadow">
					<div class="card-header">
						<h2 class="text-center">Danh sách chương trình đào tạo</h2>
					</div>
					<div class="card-body">
						<table class="table">
							<thead>
								<tr>
									<th>STT</th>
									<th>Tên chương trình</th>
									<th>Học phí</th>
								</tr>
							</thead>
							<tbody>
								<?php require '../php/program/get_all.php'; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="/assets/js/register.js"></script>
</body>
</html>