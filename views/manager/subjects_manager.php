<?php include '../template/header.php'; ?>

<?php include '../../php/subject/suggest_next_id.php'; ?>

<div class="container-fluid p-3">
	<div class="row">
		<div class="col-4">
			<div class="card shadow">
				<div class="card-header bg-secondary text-white">
					<h4 class="mb-0">Thêm CTDT</h4>
				</div>
				<div class="card-body">
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
						<button type="submit" class="btn btn-success">Thêm môn học <i class="fa fa-angle-double-right"></i></button>
					</form>
					
				</div>
			</div>
		</div>
		<!-- TABLE OF PROGRAMS -->
		<div class="col-8">
			<div class="card shadow p-0">
				<div class="card-header bg-secondary text-white">
					<h4 class="mb-0 text-center">Danh sách môn học</h4>
				</div>
				<div class="card-body">
					<table class="text-center table table-inverse table-striped table-hover">
						<thead>
							<tr>
								<th>STT</th>
								<th>Mã môn</th>
								<th>Tên môn</th>
								<th>GV phụ trách</th>
								<th>Tùy chọn</th>
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

<?php include '../template/footer.php'; ?>