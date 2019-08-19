<?php include '../template/header.php'; ?>

<div class="container-fluid">
	<h2 class="text-center p-2">Danh sách học viên đăng ký</h2>
	<table class="table table-sm table-hover table-striped">
		<thead>
			<tr>
				<th>STT</th>
				<th>Tên học viên</th>
				<th>Ngày sinh</th>
				<th>Email</th>
				<th>Địa chỉ</th>
				<th>Chương trình đăng ký</th>
				<th>Ngày đăng ký</th>
				<th>Tùy chọn</th>
			</tr>
		</thead>
		<tbody>
			<?php require '../../php/manager_load_registrars.php'; ?>
		</tbody>
	</table>
</div>

<?php include '../template/footer.php'; ?>