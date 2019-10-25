<?php require 'check_role.php'; ?>
<?php include '../template/header.php'; ?>

<div class="container-fluid pt-2">
	<div class="row">
		<div class="col-md-6">
			<div class="card shadow">
				<div class="card-header text-center pb-1 bg-info text-white">
					<h4>Chương trình đào tạo</h4>
				</div>
				<div class="card-body pt-2">
					<button type="button" class="btn btn-sm btn-success mb-2"
						data-toggle="modal" data-target="#modal-programs"
					>
						<i class="fa fa-plus-circle"></i> Đăng ký mới CTDT
					</button>
					<table class="table table-responsive-sm table-sm table-inverse table-hover table-striped text-center">
						<thead>
							<tr>
								<th>STT</th>
								<th>Tên CTDT</th>
								<th>Thời gian</th>
								<th>Học phí</th>
								<th>Trạng thái</th>
							</tr>
						</thead>
						<tbody>
							<?php require '../../php/program/get_by_student_id.php'; ?>
						</tbody>
					</table>		
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card shadow">
				<div class="card-header text-center pb-1 bg-info text-white">
					<h4>Khóa đào tạo đã tham gia</h4>
				</div>
				<div class="card-body pt-2">
					<button type="button" class="btn btn-sm btn-success mb-2"
						data-toggle="modal" data-target="#modal-courses"
					>
						<i class="fa fa-plus-circle"></i> Thêm khóa đào tạo
					</button>
					<table class="table table-responsive-md table-sm table-inverse table-hover table-striped text-center">
						<thead>
							<tr>
								<th>STT</th>
								<th>Tên khóa</th>
								<th>Ngày bắt đầu</th>
								<th>Ngày kết thúc</th>
								<th>Tùy chọn</th>
							</tr>
						</thead>
						<tbody>
							<?php include '../../php/course/get_by_student_id.php'; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- PROGRAM REGISTRATION MODAL -->
<div class="modal fade" id="modal-programs" tabindex="-1">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Đăng ký chương trình đào tạo</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span>&times;</span>
				</button>
			</div>
			<div class="modal-body pt-2">
				<form action="/php/student/register_extra_program.php" method="POST">
					<!-- SESSION created from index.php load -->
					<input type="hidden" name="st_id" value="<?php echo $_SESSION['student_id'] ?>">
					<?php include '../../php/program/student_get_all.php'; ?>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Đóng</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<!-- COURSES MODAL -->
<div class="modal fade" id="modal-courses" tabindex="-1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Thêm khóa đào tạo</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span>&times;</span>
				</button>
			</div>
			<form action="/php/course/create.php" method="POST">
				<div class="modal-body">
					<!-- SESSION created from index.php load -->
					<input type="hidden" name="st_id" value="<?php echo $_SESSION['student_id'] ?>">
					<fieldset class="form-group">
						<label>Tên khóa đào tạo</label>
						<input type="text" name="c-name" class="form-control" placeholder="VD: Kỹ năng mềm" required>
					</fieldset>
					<fieldset class="form-group">
						<label>Ngày bắt đầu</label>
						<input type="date" id="begin-date" name="c-begin" class="form-control" value="2015-01-01">
					</fieldset>
					<fieldset class="form-group">
						<label>Ngày kết thúc</label>
						<input type="date" id="end-date" name="c-end" class="form-control" value="2016-01-01">
						<div class="invalid-feedback">Ngày kết thúc không thể nhỏ hơn ngày bắt đầu !</div>
					</fieldset>
				</div>
				<div class="modal-footer">
					<button type="submit" id="js-btn-submit" name="btn-submit" class="btn btn-success"><i class="fa fa-download"></i> Thêm</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Đóng</button>
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
	$(document).ready(function() {
		$('#modal-courses').on('shown.bs.modal', function() {
			$('input[name="c-name"]').focus();
		});

		$('#end-date').change(function() {
			let endDate = new Date($(this).val());
			let beginDate = new Date($('#begin-date').val());
			if (endDate < beginDate) {
				$(this).addClass('is-invalid');
				$('#js-btn-submit').prop('disabled', true);
			}
			else {
				$(this).removeClass('is-invalid');
				$('#js-btn-submit').prop('disabled', false);
			}
		});
	});
</script>

<?php include '../template/footer.php'; ?>