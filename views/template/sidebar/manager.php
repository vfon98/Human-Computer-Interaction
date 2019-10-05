<div class="bg-dark border-right" id="sidebar-wrapper">
	<div class="sidebar-heading"><?php echo $_SESSION['logged_user'] ?></div>
	<div class="list-group list-group-flush">
		<a href="../manager/registrars.php" class="list-group-item list-group-item-action bg-dark active">
			<i class="fa fa-graduation-cap fa-fw mr-1"></i> Danh sách đăng ký
		</a>
		<a href="../manager/programs_manager.php" class="list-group-item list-group-item-action bg-dark">
			<i class="fa fa-television fa-fw mr-1"></i> Quản lý CTDT
		</a>
		<a href="../manager/subjects_manager.php" class="list-group-item list-group-item-action bg-dark">
			<i class="fa fa-wrench fa-fw mr-1"></i> Quản lý môn học
		</a>
		<a href="../manager/graduates_manager.php" class="list-group-item list-group-item-action bg-dark">
			<i class="fa fa-calendar-check-o fa-fw mr-1"></i> Xét tốt nghiệp
		</a>
		<a href="#" class="list-group-item list-group-item-action bg-dark empty-list-group-item"></a>
<!-- 		<a href="#" class="list-group-item list-group-item-action bg-dark">Profile</a>
		<a href="#" class="list-group-item list-group-item-action bg-dark">Status</a> -->
	</div>
</div>
<!-- TEACHER ACCOUNT MODAL -->
<div class="modal fade" id="modal-account" tabindex="-1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Thông tin tài khoản</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="/php/account/update_manager_account.php" method="POST">
				<div class="modal-body">
					<input type="hidden" name="user_id" value="<?php echo $_SESSION['logged_id'] ?>">
					<fieldset class="form-group">
						<label>Tên đăng nhập</label>
						<input type="text" class="form-control" value="<?php echo $_SESSION['logged_user'] ?>" disabled>
					</fieldset>
					<fieldset class="form-group was-validated">
						<label>Mật khẩu mới</label>
						<input type="password" name="new_pass" class="form-control" id="new-pass" placeholder="Tối thiểu 4 ký tự" required minlength="4">
					</fieldset>
					<fieldset class="form-group">
						<label>Nhập lại mật khẩu mới</label>
						<input type="password" class="form-control" id="re-pass" placeholder="Tối thiểu 4 ký tự" required>
					</fieldset>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success" id="btn-submit">
						<i class="fa fa-download"></i> Cập nhật
					</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">
						<i class="fa fa-times"></i> Đóng
					</button>
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
	$(document).ready(function() {
		$('#re-pass').keyup(function() {
			handleInput();
		});
		$('#new-pass').keyup(function() {
			handleInput();
		});
	});
	function handleInput() {
		let newPass = $('#new-pass').val();
		let rePass = $('#re-pass').val();
		if (rePass !== newPass || rePass === '') {
			$('#re-pass').addClass('is-invalid');
			$('#btn-submit').prop('disabled', true);
		}
		else {
			$('#re-pass').removeClass('is-invalid').addClass('is-valid');
			$('#btn-submit').prop('disabled', false);
		}
	}
</script>