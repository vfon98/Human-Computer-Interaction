<?php require 'check_role.php'; ?>
<?php require '../../php/teacher/get_info_by_username.php'; ?>
<?php include '../template/header.php'; ?>

<div class="container-fluid pt-2">
	<div class="row">
		<div class="col-md-5 col-sm-6">
			<div class="card shadow">
				<div class="card-header text-center pb-1 bg-info text-white">
					<h5 i18n lang-key="personalInfo">Thông tin cá nhân</h5>
				</div>
				<div class="card-body py-2">
					<table class="table table-sm table-inverse table-hover table-borderless" id="table-student">
						<thead>
						</thead>
						<tbody>
							<tr>
								<td><span i18n lang-key="fullName">Họ tên</span>: </td>
								<td><?php echo $row['name'] ?></td>
							</tr>
							<tr>
								<td>Email: </td>
								<td><?php echo $row['email'] ?></td>
							</tr>
							<tr>
								<td><span i18n lang-key="username">Tài khoản</span>: </td>
								<td><?php echo $_SESSION['logged_user'] ?></td>
							</tr>
							<tr>
								<td><span i18n lang-key="regTime">Ngày đăng ký</span>: </td>
								<td><?php echo $row['created_at']; ?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="col-md-7 col-sm-6">
			<div class="card shadow">
				<div class="card-header bg-info text-white">
					<h5 class="text-center mb-0" i18n lang-key="resSubjects">Môn học phụ trách</h5>
				</div>
				<div class="card-body pt-2">
					<table class="table table-responsive-md table-sm table-hover table-striped table-inverse text-center">
						<thead>
							<tr>
								<th i18n lang-key="no">STT</th>
								<th i18n lang-key="subID">Mã môn</th>
								<th i18n lang-key="subName">Tên môn học</th>
								<th i18n lang-key="totals">Sỉ số</th>
								<th i18n lang-key="studentList">Danh sách lớp</th>
							</tr>
						</thead>
						<tbody>
							<?php include '../../php/subject/teacher_get_all.php'; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- MODAL STUDENT LIST -->
<div class="modal fade" id="modal-student-list" tabindex="-1">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Danh sách sinh viên</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="../../php/student/export_student_excel.php" method="POST">
				<div class="modal-body pt-2 pb-0" id="ajax-content">
					<!-- LOAD BY AJAX LINE 89 -->
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success">
						<i class="fa fa-cloud-download"></i> Xuất file Excel
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
	function ajaxGetDetail(s_id) {
		$.post('../../php/student/get_by_subject.php', {
			s_id: s_id
		}).then(res => {
			$('#ajax-content').html(res);
		});
	}
</script>

<?php include '../template/footer.php'; ?>