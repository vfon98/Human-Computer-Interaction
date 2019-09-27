<div class="bg-dark border-right" id="sidebar-wrapper">
	<div class="sidebar-heading" title="<?php echo $_SESSION['teacher_id'] ?>">
		<?php echo $_SESSION['logged_user'] ?>
	</div>
	<div class="list-group list-group-flush">
		<a href="/views/teacher" class="list-group-item list-group-item-action bg-dark active">
			Quản lý giảng dạy
		</a>
		<a href="/views/teacher/subject_grading.php" class="list-group-item list-group-item-action bg-dark">
			Chấm điểm môn học
		</a>
		<a href="#" class="list-group-item list-group-item-action bg-dark empty-list-group-item"></a>
<!-- 				<a href="#" class="list-group-item list-group-item-action bg-dark">Events</a>
		<a href="#" class="list-group-item list-group-item-action bg-dark">Profile</a>
		<a href="#" class="list-group-item list-group-item-action bg-dark">Status</a> -->
	</div>
</div>

<!-- TEACHER ACCOUNT MODAL -->
<?php
	require_once '../../php/connection.php';
	$t_id = $_SESSION['teacher_id'];
	$sql = "SELECT * FROM teachers WHERE id='$t_id'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
?>
<div class="modal fade" id="modal-account" tabindex="-1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Thông tin tài khoản</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="/php/account/update_teacher_info.php" method="POST">
				<div class="modal-body">
					<input type="hidden" name="user_id" value="<?php echo $_SESSION['logged_id'] ?>">
					<fieldset class="form-group">
						<label>Tên đăng nhập</label>
						<input type="text" name="t_username" class="form-control" value="<?php echo $_SESSION['logged_user'] ?>" readonly>
					</fieldset>
					<fieldset class="form-group">
						<label>Họ tên</label>
						<input type="text" name="t_name" class="form-control" value="<?php echo $row['name'] ?>" required>
					</fieldset>
					<fieldset class="form-group">
						<label>Email</label>
						<input type="email" name="t_email" class="form-control" value="<?php echo $row['email'] ?>" required>
					</fieldset>
					<fieldset class="form-group was-validated">
						<label>Mật khẩu mới</label>
						<input type="password" name="new_pass" class="form-control" id="new-pass" placeholder="Tối thiểu 4 ký tự" minlength="4" required>
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