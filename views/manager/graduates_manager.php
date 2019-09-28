<?php require 'check_role.php'; ?>
<?php include '../template/header.php'; ?>

<div class="container-fluid p-3">
	<div class="row">
		<div class="col">
			<div class="card shadow">
				<div class="card-header bg-info text-white text-center pb-1">
					<h4>Danh sách sinh viên đủ điều kiện tốt nghiệp</h4>
				</div>
				<div class="card-body py-3 px-3">
					<table class="table table-inverse table-sm table-hover table-striped text-center mb-0" id="tbl-graduates">
						<thead>
							<tr>
								<th>STT</th>
								<th>Họ tên</th>
								<th>Ngày sinh</th>
								<th>Email</th>
								<th>Chương trình</th>
								<th>Điểm TB</th>
								<th>Xếp loại</th>
								<th>Tùy chọn</th>
							</tr>
						</thead>
						<tbody>
							<?php include '../../php/student/get_all_graduates.php' ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		$('#tbl-graduates').DataTable({
			dom: "<'row'<'col-md-6'l><'col-md-6'f>>tip",
			ordering: false,
			language: {
				url: "/assets/lang-vi.json"
			}
		});
	});
</script>

<?php include '../template/footer.php'; ?>