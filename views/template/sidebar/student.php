<div class="bg-dark border-right" id="sidebar-wrapper">
	<div class="sidebar-heading" title="<?php echo $_SESSION['student_id'] ?>" i18n lang-key="studentMgr">
		QL Sinh Viên
	</div>
	<div class="list-group list-group-flush">
		<a href="/views/student" class="list-group-item list-group-item-action bg-dark active">
			<i class="fa fa-graduation-cap fa-fw mr-1"></i> <span i18n lang-key="studentInfo">Thông tin sinh viên</span>
		</a>
		<!-- CHECK PAID TUITION -->
		<?php 
			// SESSION INITIALIZED IN /php/student/get_by_username.php
		if ($_SESSION['student_is_paid'] == 1) {
			echo
			'<a href="/views/student/personal_programs.php" class="list-group-item list-group-item-action bg-dark">
				<i class="fa fa-television fa-fw mr-1"></i> <span  i18n lang-key="trainingPro">Chương trình đào tạo</span>
			</a>';
			echo
			'<a href="/views/student/study_result.php" class="list-group-item list-group-item-action bg-dark">
				<i class="fa fa-bar-chart fa-fw mr-1"></i> <span i18n lang-key="studyResult">Kết quả học tập</span>
			</a>';
		}
		else {
			echo 
			'<a href="#" data-toggle="modal" data-target="#modal-notification" class="list-group-item list-group-item-action bg-dark"><i class="fa fa-television fa-fw mr-1"></i> <span i18n lang-key="trainingPro">Chương trình đào tạo</span>
			</a>';
			echo 
			'<a href="#" data-toggle="modal" data-target="#modal-notification" class="list-group-item list-group-item-action bg-dark"><i class="fa fa-bar-chart fa-fw mr-1"></i> <span i18n lang-key="studyResult">Kết quả học tập</span>
			</a>';
			echo 
			'<a class="list-group-item list-group-item-action bg-dark"
				data-toggle="modal" href="#modal-tuition"
				><i class="fa fa-usd fa-fw mr-1"></i> <span i18n lang-key="payTuition">Đóng học phí</span>
			</a>';
		}
		?>
		<a href="" class="list-group-item list-group-item-action bg-dark empty-list-group-item"></a>
	</div>
</div>
<!-- ACCOUNT MODAL -->
<?php
	if ($_SERVER['REQUEST_URI'] != '/views/student/' && $_SERVER['REQUEST_URI'] != '/views/student/?m=paid') {
		require_once '../../php/connection.php';
		$st_id = $_SESSION['student_id'];
		$sql = "SELECT name as st_name, birthday, email, address FROM students WHERE id='$st_id'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
	}
?>
<div class="modal fade" id="modal-account" tabindex="-1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" i18n lang-key="accountInfo">Thông tin tài khoản</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="/php/account/update_student_info.php" method="POST">
				<div class="modal-body py-2">
					<input type="hidden" name="user_id" value="<?php echo $_SESSION['logged_id'] ?>">
					<fieldset class="form-group">
						<label i18n lang-key="username">Tên đăng nhập</label>
						<input type="text" name="st_username" class="form-control" value="<?php echo $_SESSION['logged_user'] ?>" readonly>
					</fieldset>
					<fieldset class="form-group">
						<label i18n lang-key="fullName">Họ tên</label>
						<input type="text" name="st_name" class="form-control" value="<?php echo $row['st_name'] ?>" required>
					</fieldset>
					<fieldset class="form-group">
						<label i18n lang-key="birthday">Ngày sinh</label>
						<input type="date" name="st_birthday" class="form-control" value="<?php echo $row['birthday'] ?>" required>
					</fieldset>
					<fieldset class="form-group">
						<label>Email</label>
						<input type="email" name="st_email" class="form-control" value="<?php echo $row['email'] ?>" required>
					</fieldset>
					<fieldset class="form-group">
						<label i18n lang-key="address">Địa chỉ</label>
						<input type="text" name="st_address" class="form-control" value="<?php echo $row['address'] ?>" required>
					</fieldset>
					<fieldset class="form-group was-validated">
						<label i18n lang-key="newPass">Mật khẩu mới</label>
						<input type="password" name="new_pass" class="form-control" id="new-pass" placeholder="Tối thiểu 4 ký tự" minlength="4" required>
					</fieldset>
					<fieldset class="form-group">
						<label i18n lang-key="rePass">Nhập lại mật khẩu mới</label>
						<input type="password" class="form-control" id="re-pass" placeholder="Tối thiểu 4 ký tự" required>
					</fieldset>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success" id="btn-submit">
						<i class="fa fa-download"></i> <span i18n lang-key="update">Cập nhật</span>
					</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">
						<i class="fa fa-times"></i> <span i18n lang-key="close">Đóng</span>
					</button>
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
	$(document).ready(function() {
		$('#modal-account').on('shown.bs.modal', function () {
			$('input[name="st_name"]').focus().select();
		})
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
<!-- TUITION NOTIFICATION MODAL -->
<div class="modal fade" id="modal-notification" tabindex="-1">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" i18n lang-key="notice">Thông báo</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body pt-0 pb-4">
				<div class="container">
					<div class="text-center text-danger" style="font-size: 6rem"><i class="fa fa-frown-o"></i></div>
					<h2 class="text-center" id="banner"  i18n lang-key="pleasePay">Vui lòng thanh toán học phí để sử dụng chức năng này !</h2>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">
					<i class="fa fa-times"></i> <span  i18n lang-key="close">Đóng</span>
				</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>