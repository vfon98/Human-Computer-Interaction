<div class="bg-dark border-right" id="sidebar-wrapper">
	<div class="sidebar-heading" title="<?php echo $_SESSION['teacher_id'] ?>">
		<?php echo $_SESSION['logged_user'] ?>
	</div>
	<div class="list-group list-group-flush">
		<a href="/views/teacher" class="list-group-item list-group-item-action bg-dark active">
			Quản lý giảng dạy
		</a>
		<a href="/views/teacher/subject_detail.php" class="list-group-item list-group-item-action bg-dark">
			Đánh giá môn học
		</a>
		<a href="#" class="list-group-item list-group-item-action bg-dark"></a>
<!-- 				<a href="#" class="list-group-item list-group-item-action bg-dark">Events</a>
		<a href="#" class="list-group-item list-group-item-action bg-dark">Profile</a>
		<a href="#" class="list-group-item list-group-item-action bg-dark">Status</a> -->
	</div>
</div>

<!-- TEACHER ACCOUNT MODAL -->
<div class="modal fade" id="modal-account">
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