<?php require 'check_role.php'; ?>
<?php include '../template/header.php'; ?>

<div class="container-fluid">
	<div class="card shadow mt-2">
		<div class="card-header bg-info text-white">
			<h5 class="text-center mb-0">Danh sách học viên đăng ký</h5>
		</div>
		<div class="card-body px-1 py-2">
			<div class="table-responsive">
				<table class="table table-sm table-hover table-striped shadow" id="tbl-registrar">
					<thead>
						<tr>
							<th class="text-center">STT</th>
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
	</div>
</div>

<script>
	$(document).ready(function() {
		if (performance && performance.navigation.type === 0) {
		<?php
			if (isset($_GET['m'])) {
				$method = $_GET['m'];
				if ($method == 'approve') {
					echo 'toastr.success("Xét duyệt sinh viên thành công !", "Thông báo");';
				}
				elseif ($method == 'decline') {
					echo 'toastr.error("Loại bỏ sinh viên thành công !", "Thông báo");';
				}
			}
		?>
		}
		let cbType = "checked";
		$('#btn-check-all').click(function() {
			if (cbType == "checked") {
				$('.selected-id').prop('checked', true).trigger('change');
				// $('#js-chbx-all').html('Bỏ chọn');
				cbType = "unchecked";
			}
			else {
				$('.selected-id').prop('checked', false).trigger('change');
				// $('#js-chbx-all').html('Chọn tất');
				cbType = "checked";
			}
		});	
		$('.selected-id').change(function() {
			if (this.checked) {
				$(this).closest('tr').css('backgroundColor', '#ffe69d');;
			}
			else {
				$(this).closest('tr').css('backgroundColor', 'initial');
			}
		});
});
</script>
<?php include '../template/footer.php'; ?>