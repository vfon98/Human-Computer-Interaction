<?php require 'check_role.php'; ?>
<?php include '../template/header.php'; ?>

<?php include '../../php/subject/suggest_next_id.php'; ?>

<div class="container-fluid pt-2">
	<div class="row">
		<div class="col-lg-4">
			<div class="card shadow">
				<div class="card-header bg-info text-white">
					<h5 class="mb-0" i18n lang-key="addSub">Thêm môn học</h5>
				</div>
				<div class="card-body">
					<form action="/php/subject/create.php" method="POST">
						<fieldset class="form-group">
							<label i18n lang-key="subID">Mã môn</label>
							<input name="sub-id" type="text" class="form-control" placeholder="Nhập tên chương trình" maxlength="50" value="<?php echo $next_id; ?>" readonly>
						</fieldset>
						<fieldset class="form-group">
							<label i18n lang-key="subName">Tên môn</label>
							<input name="name" type="text" class="form-control" 
								placeholder="VD: Lập trình căn bản" i18n-place="Ex: Basic programming" autofocus required>
						</fieldset>
						<fieldset class="form-group">
							<label i18n lang-key="resTeacher">Giáo viên phụ trách</label>
							<select name="teacher" class="form-control" required>
								<option i18n lang-key="chooseTeacher" value="" disabled selected>-- Chọn giáo viên phụ trách --</option>
								<?php require '../../php/teacher/get_name.php'; ?>
							</select>
						</fieldset>
						<button type="submit" class="btn btn-success"><span i18n lang-key="addSub">Thêm môn học</span> <i class="fa fa-angle-double-right"></i></button>
					</form>
					
				</div>
			</div>
		</div>
		<!-- TABLE OF PROGRAMS -->
		<div class="col-lg-8">
			<div class="card shadow p-0 mb-5">
				<div class="card-header bg-info text-white">
					<h5 class="mb-0 text-center" i18n lang-key="subList">Danh sách môn học</h5>
				</div>
				<div class="card-body">
					<table class="text-center table table-sm text-nowrap table-responsive-lg table-inverse table-striped table-hover" id="tbl-subject">
						<thead>
							<tr>
								<th i18n lang-key="no">STT</th>
								<th i18n lang-key="subID">Mã môn</th>
								<th i18n lang-key="subName">Tên môn</th>
								<th i18n lang-key="resTeacher">GV phụ trách</th>
								<th i18n lang-key="option">Tùy chọn</th>
							</tr>
						</thead>
						<tbody>
							<?php require '../../php/subject/manager_get_all.php'; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- UPDATE SUBJECT MODAL -->
<div class="modal fade" id="modal-subject" tabindex="-1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" i18n lang-key="updateSub">Sửa thông tin môn học</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
			</div>
			<form action="/php/subject/update.php" method="POST">
				<div class="modal-body">
					<fieldset class="form-group">
						<label i18n lang-key="subID">Mã môn</label>
						<input type="text" name="sub_id" class="form-control" id="inp-sub-id" required readonly>
					</fieldset>
					<fieldset class="form-group">
						<label i18n lang-key="subName">Tên môn</label>
						<input type="text" name="s_name" class="form-control" id="inp-s-name" required>
					</fieldset>
					<fieldset class="form-group">
						<label i18n lang-key="resTeacher">Giáo viên phụ trách</label>
						<select name="t_id" class="form-control" id="sel-t-id" required>
							<option i18n lang-key="chooseTeacher" value="" disabled selected>-- Chọn giáo viên phụ trách --</option>
							<?php require '../../php/teacher/get_name.php'; ?>
						</select>
					</fieldset>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-secondary"><i class="fa fa-save"></i> <span i18n lang-key="save">Lưu lại</span></button>
					<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> <span i18n lang-key="close">Đóng</span></button>
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<script>
	$(document).ready(function() {
		$('.js-btn-update').click(function() {
			let sub_id = $(this).closest('tr').find('td').eq(1).text();
			let s_name = $(this).closest('tr').find('td').eq(2).text();
			let t_id = $(this).attr('data-t-id');

			$('#inp-sub-id').val(sub_id);
			$('#inp-s-name').val(s_name);
			$('#sel-t-id').val(t_id);
		});
		$('#tbl-subject').DataTable({
			dom: "<'row'<'col-md-6'l><'col-md-6'f>>tip",
			ordering: false,
			language: {
				url: dtLangUrl
			},
			initComplete: function () {
				// Change lang after dtTable loaded
				if (sessionStorage.getItem('currentLang') === 'en') {
					changeLangEN();
				}
			}
		});
	});
</script>

<?php include '../template/footer.php'; ?>
