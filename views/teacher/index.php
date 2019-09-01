<?php require 'check_role.php'; ?>
<?php include '../template/header.php'; ?>

<div class="container-fluid pt-2">
	<div class="row">
		<div class="col-6">
			<div class="card shadow">
				<div class="card-header">
					<h5 class="text-center mb-0">Môn học phụ trách</h5>
				</div>
				<div class="card-body pt-2">
					<table class="table table-inverse">
						<thead>
							<tr>
								<th>STT</th>
								<th>Mã môn</th>
								<th>Tên môn học</th>
								<th>Tùy chọn</th>
							</tr>
						</thead>
						<tbody>
							<?php include '../../php/subject/teacher_get_all.php'; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="col-6"></div>
	</div>
</div>

<?php include '../template/footer.php'; ?>