<?php require 'check_role.php'; ?>
<?php include '../template/header.php'; ?>

<div class="container-fluid">
	<h2 class="text-center p-2">Danh sách học viên đăng ký</h2>
	<div class="table-responsive">
		<table class="table table-sm table-hover table-striped shadow">
			<thead>
				<tr>
					<th>STT</th>
					<th>Tên học viên</th>
					<th>Ngày sinh</th>
					<th>Email</th>
					<th>Địa chỉ</th>
					<th>Chương trình</th>
					<th>Ngày đăng ký</th>
					<th class="text-center">Tùy chọn</th>
				</tr>
			</thead>
			<tbody>
				<?php require '../../php/student/manager_get_registrars.php'; ?>
			</tbody>
		</table>
	</div>
</div>

<?php include '../template/footer.php'; ?>