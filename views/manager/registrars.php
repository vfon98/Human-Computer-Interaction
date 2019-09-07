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
					<th class="text-center">
						<button id="btn-check-all" class="btn btn-light p-0">
							<i class="fa fa-check-square-o fa-lg"></i> <strong>Chọn tất</strong>
						</button>
					</th>
				</tr>
			</thead>
			<tbody>
				<form action="/php/student/approve_student.php" method="POST">
					<?php require '../../php/student/manager_get_registrars.php'; ?>
				</form>
			</tbody>
		</table>
	</div>
</div>

<script>
	$(document).ready(function() {
		$('#btn-check-all').click(function() {
			$('.selected-id').prop('checked', true);
		});
		$('#btn-approve').click(function() {
			$('.selected-id:checkbox:checked').each(function() {
				console.log($(this).val());
			});
		});
	});
</script>

<?php include '../template/footer.php'; ?>