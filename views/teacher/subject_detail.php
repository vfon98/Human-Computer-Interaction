<?php require 'check_role.php'; ?>
<?php include '../template/header.php'; ?>

<div class="container-fluid pt-2">
	<div class="row">
		<form class="form-inline">
			<div class="form-group">
				<label for="exampleInputName2">Name</label>
				<input type="text" class="form-control" name="exampleInputName2" id="exampleInputName2" placeholder="Jane Doe">
			</div>
		</form>
	</div>
	<div class="row">
		<div class="col">
			<table class="table table-inverse">
				<thead>
					<tr>
						<th>STT</th>
						<th>Tên sinh viên</th>
						<th>Điểm</th>
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