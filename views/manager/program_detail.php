<?php require 'check_role.php'; ?>
<?php include '../template/header.php'; ?>
<?php
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	require '../../php/connection.php';
	$sql = "SELECT * FROM programs WHERE id='$id'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();

	$p_name = $row['name'];
	$duration = $row['duration'];
}
?>
<div class="container-fluid">
	<a href="programs_manager.php" class="btn btn-link"><i class="fa fa-reply"></i> Trở về</a>
	<div class="card shadow">
		<div class="card-header bg-info text-white p-2 text-center">
			<h4 class="em">Chương trình: <em><?php echo $p_name; ?></em></h5>
			<h6>Thời gian đào tạo: <?php echo $duration ?></h5>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-4">
					<div class="card shadow">
						<div class="card-header">
							<h4 class="mb-0 text-center">Thêm môn học</h4>
						</div>
						<div class="card-body">
							<form action="/php/program/add_subject.php" method="POST">
								<input type="hidden" name="program-id" value="<?php echo $id; ?>">
								<fieldset class="form-group">
									<label>Chọn môn học</label>
									<select name="subject-id[]" class="form-control" size="10" multiple>
										<?php require '../../php/subject/manager_get_name.php' ?>
									</select>
								</fieldset>
								<button type="submit" class="btn btn-success">Thêm môn học</button>
							</form>
						</div>
					</div>
				</div>
				<div class="col-8">
					<div class="card shadow">
						<div class="card-header">
							<h4 class="mb-0 text-center">Danh sách môn học</h4>
						</div>
						<div class="card-body">
							<table class="table table-striped table-inverse table-hover">
								<thead>
									<tr>
										<th>STT</th>
										<th>Mã môn</th>
										<th>Tên môn</th>
										<th>Tùy chọn</th>
									</tr>
								</thead>
								<tbody>
									<?php require '../../php/subject/manager_get_by_program.php'; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include '../template/footer.php'; ?>