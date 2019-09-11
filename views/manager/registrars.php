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
					<th>Địa chỉ</th>
					<th>Chương trình</th>
					<th>Tài khoản</th>
					<th>Ngày đăng ký</th>
					<th class="text-center">
						<button id="btn-check-all" class="btn btn-light p-0" style="width: 100px">
							<i class="fa fa-check-square-o fa-lg"></i> <strong id="js-chbx-all">Chọn tất</strong>
						</button>
					</th>
				</tr>
			</thead>
			<tbody>
				<form action="/php/student/handle_student_form.php" method="POST">
					<?php require '../../php/student/manager_get_registrars.php'; ?>
				</form>
			</tbody>
		</table>
	</div>
</div>

<script>
	$(document).ready(function() {
		let cbType = "checked";
		$('#btn-check-all').click(function() {
			if (cbType == "checked") {
				$('.selected-id').prop('checked', true);
				// $('#js-chbx-all').html('Bỏ chọn');
				cbType = "unchecked";
			}
			else {
				$('.selected-id').prop('checked', false);
				// $('#js-chbx-all').html('Chọn tất');
				cbType = "checked";
			}
		});	
});
</script>

<?php include '../template/footer.php'; ?>