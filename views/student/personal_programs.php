<?php require 'check_role.php'; ?>
<?php include '../template/header.php'; ?>

<div class="container-fluid pt-2">
	<div class="row">
		<div class="col-lg-6">
			<div class="card shadow">
				<div class="card-header text-center pb-1 bg-info text-white">
					<h4 i18n lang-key="trainingPro">Chương trình đào tạo</h4>
				</div>
				<div class="card-body pt-2">
					<button type="button" class="btn btn-sm btn-success mb-2"
						data-toggle="modal" data-target="#modal-programs"
					>
						<i class="fa fa-plus-circle"></i> <span i18n lang-key="regNewPro">Đăng ký mới CTDT</span>
					</button>
					<div class="table-responsive-lg">
						<table class="table table-sm table-inverse table-hover table-striped text-center">
							<thead>
								<tr>
									<th i18n lang-key="no">STT</th>
									<th i18n lang-key="proName">Tên CTDT</th>
									<th class="text-nowrap" i18n lang-key="duration">Thời gian</th>
									<th i18n lang-key="tuition">Học phí</th>
									<th i18n lang-key="status">Trạng thái</th>
								</tr>
							</thead>
							<tbody>
								<?php require '../../php/program/get_by_student_id.php'; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="card shadow">
				<div class="card-header text-center pb-1 bg-info text-white">
					<h4 i18n lang-key="partiCourses">Khóa đào tạo đã tham gia</h4>
				</div>
				<div class="card-body pt-2">
					<button type="button" class="btn btn-sm btn-success mb-2"
						data-toggle="modal" data-target="#modal-courses"
					>
						<i class="fa fa-plus-circle"></i> <span i18n lang-key="addCourse">Thêm khóa đào tạo</span>
					</button>
					<table class="table table-responsive-md text-nowrap table-sm table-inverse table-hover table-striped text-center">
						<thead>
							<tr>
								<th i18n lang-key="no">STT</th>
								<th i18n lang-key="courseName">Tên khóa</th>
								<th i18n lang-key="beginDate">Ngày bắt đầu</th>
								<th i18n lang-key="endDate">Ngày kết thúc</th>
								<th i18n lang-key="option">Tùy chọn</th>
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