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
		<div class="card-body py-2">
			<button type="button" class="btn btn-light text-primary mb-2"
				data-toggle="modal" data-target="#modal-student-list">
				<i class="fa fa-address-card-o"></i> Danh sách sinh viên
			</button>
			<div class="row">
				<div class="col-4">
					<div class="card shadow">
						<div class="card-header">
							<h4 class="mb-0 text-center">Thêm môn học</h4>
						</div>
						<div class="card-body pt-0">
							<form action="/php/program/add_subject.php" method="POST">
								<input type="hidden" name="program-id" value="<?php echo $id; ?>">
								<button type="button" class="btn btn-sm btn-secondary my-2"
									data-toggle="modal" data-target="#modal-new-subject"
								>
									<i class="fa fa-plus"></i> Tạo mới môn học
								</button>
								<fieldset class="form-group">
									<select name="subject-id[]" class="form-control" size="10" multiple>
										<?php require '../../php/subject/manager_get_name.php' ?>
									</select>
								</fieldset>
								<button type="submit" class="btn btn-success">
									Thêm vào CTDT <i class="fa fa-angle-double-right"></i>
								</button>
							</form>
						</div>
					</div>
				</div>
				<div class="col-8">
					<div class="card shadow mb-4">
						<div class="card-header">
							<h4 class="mb-0 text-center">Danh sách môn học</h4>
						</div>
						<div class="card-body py-2">
							<table class="table table-striped table-inverse table-hover" id="tbl-subject">
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

<!-- MODAL FOR NEW SUBJECT -->
<?php include '../../php/subject/suggest_next_id.php'; ?>

<div class="modal fade" id="modal-new-subject" tabindex="-1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Thêm mới môn học</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="/php/subject/create.php" method="POST">
					<fieldset class="form-group">
						<label>Mã môn</label>
						<input name="sub-id" type="text" class="form-control" placeholder="Nhập tên chương trình" maxlength="50" value="<?php echo $next_id; ?>" readonly>
					</fieldset>
					<fieldset class="form-group">
						<label>Tên môn</label>
						<input name="name" type="text" class="form-control" 
							placeholder="VD: Lập trình căn bản" autofocus required>
					</fieldset>
					<fieldset class="form-group">
						<label>Giáo viên phụ trách</label>
						<select name="teacher" id="" class="form-control" required>
							<option value="" disabled selected>-- Chọn giáo viên phụ trách --</option>
							<?php require '../../php/teacher/get_name.php'; ?>
						</select>
					</fieldset>
					<button type="submit" class="btn btn-success">
						<i class="fa fa-plus"></i> Thêm môn học
					</button>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Đóng</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- MODAL FOR STUDENT LIST -->
<div class="modal fade" id="modal-student-list" tabindex="-1">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Danh sách sinh viên đăng ký</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
			</div>
			<div class="modal-body py-2">
				<?php include '../../php/student/get_by_program_id.php' ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Đóng</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
	$(document).ready(function() {
		$('#tbl-subject').DataTable({
			dom: "<'row'<'col-md-6'l><'col-md-6'f>>tip",
			ordering: false,
			language: {
				url: "/assets/lang-vi.json"
			}
		});
	});
</script>

<?php include '../template/footer.php'; ?>