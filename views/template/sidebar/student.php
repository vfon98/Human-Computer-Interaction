<div class="bg-dark border-right" id="sidebar-wrapper">
	<div class="sidebar-heading">QL Sinh Viên</div>
	<div class="list-group list-group-flush">
		<a href="/views/student" class="list-group-item list-group-item-action bg-dark active">
			Thông tin sinh viên
		</a>
		<!-- CHECK PAID TUITION -->
		<?php 
			// SESSION INITIALIZED IN /php/student/get_by_username.php
		if ($_SESSION['student_is_paid'] == true) {
			echo
			'<a href="/views/student/personal_programs.php" class="list-group-item list-group-item-action bg-dark">Chương trình đào tạo</a>';
		}
		else {
			echo '<a href="#" data-toggle="modal" data-target="#modal-notification" class="list-group-item list-group-item-action bg-dark">Chương trình đào tạo</a>';
			echo 
			'<a class="list-group-item list-group-item-action bg-dark"
			data-toggle="modal" href="#modal-tuition"
			>Đóng học phí</a>';
		}
		?>
		<a href="" class="list-group-item list-group-item-action bg-dark"></a>
	</div>
</div>
<!-- ACCOUNT MODAL -->
<div class="modal fade" id="modal-account" tabindex="-1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Thông tin tài khoản</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form>
					<fieldset class="form-group">
						<label>Mật khẩu</label>
						<input type="password" class="form-control" placeholder="Example input">
					</fieldset>
					<fieldset class="form-group">
						<label>Nhập lại mật khẩu</label>
						<input type="password" class="form-control" placeholder="Example input">
					</fieldset>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success">
					<i class="fa fa-check"></i> Cập nhật
				</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">
					<i class="fa fa-times"></i> Đóng
				</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- TUITION NOTIFICATION MODAL -->
<div class="modal fade" id="modal-notification" tabindex="-1">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Thông báo</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body pt-0 pb-4">
				<div class="container">
					<div class="text-center text-danger" style="font-size: 6rem"><i class="fa fa-frown-o"></i></div>
					<h2 class="text-center" id="banner">Vui lòng thanh toán học phí để sử dụng chức năng này !</h2>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">
					<i class="fa fa-times"></i> Đóng
				</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>