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

<!-- CHANGE PASSWORD MODAL -->

		<div class="modal fade" id="modal-change-password">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Đổi mật khẩu tài khoản</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form action="/php/account/change_password.php" method="POST">
						<div class="modal-body">
							<input type="hidden" name="acc-id" id="hid-acc-id" value="">
							<fieldset class="form-group was-validated">
								<label>Mật khẩu mới</label>
								<input name="new-pass" id="new-pass" type="password" class="form-control" placeholder="Tối thiểu 4 ký tự" minlength="4" required>
							</fieldset>
							<fieldset class="form-group">
								<label>Nhập lại mật khẩu mới</label>
								<input id="re-pass" type="password" class="form-control" placeholder="Tối thiểu 4 ký tự" minlength="4" required>
							</fieldset>
						</div>
						<div class="modal-footer">
							<button type="submit" id="btn-submit" class="btn btn-secondary" disabled>
								<i class="fa fa-save"></i> Lưu thay đổi
							</button>
							<button type="button" class="btn btn-danger" data-dismiss="modal">
								<i class="fa fa-close"></i> Đóng
							</button>
						</div>
					</form>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

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
		// AUTO SELECT FIRST PART OF EMAIL
		$('#inp').focusin(function() {
			this.focus();
			this.setSelectionRange(0, 7);
		});
		// CHECK SIMILAR PASSWORD
		$('#re-pass').keyup(function() {
			let newPass = $('#new-pass').val();
			let rePass = $('#re-pass').val();
			if (rePass !== newPass) {
				$(this).addClass('is-invalid');
				$('#btn-submit').prop('disabled', true);
			}
			else {
				$(this).removeClass('is-invalid').addClass('is-valid');
				$('#btn-submit').prop('disabled', false);
			}
		});
	});
	function passIdToModal(id) {
		$('#hid-acc-id').val(id);
	}
</script>

<?php include '../template/footer.php'; ?>