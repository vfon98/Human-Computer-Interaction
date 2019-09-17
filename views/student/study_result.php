<?php require 'check_role.php'; ?>
<?php require '../template/header.php'; ?>

<div class="container-fluid pt-2">
	<div class="row">
		<div class="col">
			<div class="card shadow">
				<div class="card-header text-center pb-1 bg-info text-white">
					<h4>Kết quả học tập</h4>
				</div>
				<div class="card-body pt-2 pb-1">
					<table class="table table-inverse table-hover table-striped text-center">
						<thead>
							<tr>
								<th>STT</th>
								<th>Mã môn</th>
								<th>Tên môn học</th>
								<th>GV phụ trách</th>
								<th>Điểm</th>
							</tr>
						</thead>
						<tbody>
							<?php include '../../php/student/get_mark_by_student_id.php'; ?>
						</tbody>
					</table>		
				</div>
			</div>
		</div>
	</div>
</div>

<?php require '../template/footer.php'; ?>