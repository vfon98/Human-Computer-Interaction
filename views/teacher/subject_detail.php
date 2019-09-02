<?php require 'check_role.php'; ?>
<?php include '../template/header.php'; ?>

<div class="container-fluid pt-2">
	<div class="row">
	</div>
	<div class="row">
		<div class="col-6">
			<table class="table table-inverse">
				<thead>
					<tr>
						<th>STT</th>
						<th>Tên sinh viên</th>
						<th class="text-center">Điểm</th>
					</tr>
				</thead>
				<tbody>
					<?php require '../../php/subject/teacher_get_students.php'; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php include '../template/footer.php'; ?>