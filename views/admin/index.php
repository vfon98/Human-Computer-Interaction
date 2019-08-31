<?php require 'check_role.php'; ?>
<?php include '../template/header.php'; ?>

<div class="container-fluid pt-2">
	<div class="row">
		<div class="col-5">
			<div class="card shadow">
				<div class="card-header bg-secondary text-white pb-0 text-center">
					<h5>Thêm tài khoản</h5>
				</div>
				<div class="card-body">
					<form action="/php/teacher/create.php" method="POST">
						<div class="form-group row">
							<label class="col-4 col-form-label">Loại tài khoản</label>
							<div class="col-sm-8 p-0 ml-n3">
								<select class="form-control" name="acc-role" id="sel-acc-role" autofocus>
									<option value="teacher">Giáo viên</option>
									<option value="manager">Quản lý CTDT</option>
								</select>
							</div>
						</div>
						<hr>
						<fieldset class="form-group" id="inp-name">
							<label>Tên giáo viên</label>
							<input class="form-control" type="text" name="name" placeholder="VD: Nguyễn Văn A">
						</fieldset>
						<fieldset class="form-group" id="inp-email">
							<label>Email</label>
							<input class="form-control" type="text" name="email" value="example@ctu.edu.vn"
								id="inp" 
							>
						</fieldset>
						<fieldset class="form-group">
							<label>Tên đăng nhập</label>
							<input class="form-control" type="text" name="username" placeholder="VD: nguyenvana">
						</fieldset>
						<fieldset class="form-group">
							<label>Mật khẩu</label>
							<input class="form-control" type="password" name="pass" placeholder="Tối thiểu 4 ký tự" minlength="4">
						</fieldset>

						<button class="btn btn-success" type="submit">
							Thêm tài khoản <i class="fa fa-angle-double-right"></i>
						</button>
					</form>
				</div>
			</div>
		</div>
		<div class="col-7">
			<div class="card shadow">
				<div class="card-header bg-secondary text-white pb-0 text-center">
					<h5>Danh sách tài khoản</h5>
				</div>
				<div class="card-body">
					<table class="table table-inverse">
						<thead>
							<tr>
								<th>STT</th>
								<th>Tên đăng nhập</th>
								<th>Loại tài khoản</th>
								<th>Đổi mật khẩu</th>
							</tr>
						</thead>
						<tbody>
							<?php include '../../php/account/admin_get_all.php'; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		$('#sel-acc-role').change(function() {
			let role = $(this).val();
			if (role == 'teacher') {
				$('#inp-name').slideDown('slow');
				$('#inp-email').slideDown('slow');
			}
			else if (role == 'manager') {
				$('#inp-name').slideUp('slow');
				$('#inp-email').slideUp('slow');
			}
		});
		$('#inp').focusin(function() {
			this.focus();
			this.setSelectionRange(0, 7);
		});
	});
</script>

<?php include '../template/footer.php'; ?>