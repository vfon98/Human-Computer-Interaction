<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Đăng ký học</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
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
							<?php require '../php/program/get_program_name.php'; ?>
						</select>
					</fieldset>

					<legend class="pb-1 mt-4 mb-2 border-bottom text-primary">Thông tin đăng nhập</legend>
					<fieldset class="form-group">
						<label>Tên đăng nhập</label>
						<input type="text" name="username" class="form-control" placeholder="VD: nguyenvana">
					</fieldset>
					<fieldset class="form-group">
						<label>Mật khẩu</label>
						<input type="password" name="password" class="form-control" placeholder="Tối thiểu 4 ký tự">
					</fieldset>
					<hr>
					<button type="submit" name="submit-btn" class="btn btn-primary btn-lg btn-block">Đăng ký ngay</button>
				</form>
			</div>

			<div class="col-md-6">
				<table class="table">
					<h2>Danh sách chương trình đào tạo</h2>
					<thead>
						<tr>
							<th>STT</th>
							<th>Tên chương trình</th>
							<th>Học phí</th>
						</tr>
					</thead>
					<tbody>
						<?php require '../php/program/get_all_program.php'; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<script src="/assets/js/register.js"></script>
</body>
</html>