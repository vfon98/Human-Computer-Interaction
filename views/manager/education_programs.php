<?php include '../template/header.php'; ?>

<div class="container-fluid p-3">
	<div class="row">
		<div class="col-4">
			<div class="card shadow">
				<div class="card-header">
					<h4 class="mb-0">Thêm CTDT</h4>
				</div>
				<div class="card-body">
					<form action="/php/program/create.php" method="POST">
						<fieldset class="form-group">
							<label>Tên chương trình</label>
							<input name="name" type="text" class="form-control" placeholder="Nhập tên chương trình" maxlength="50" autofocus required>
						</fieldset>
						<fieldset class="form-group">
							<label>Học phí</label>
							<input name="tuition" type="number" class="form-control" placeholder="Đơn vị: VND" min="0" max="1000000000" step="1000" value="1000000">
						</fieldset>
						<button class="btn btn-success">Thêm chương trình <i class="fa fa-angle-double-right"></i></button>
					</form>
					
				</div>
			</div>
		</div>
		<div class="col-8">
			<div class="card shadow">
				<div class="card-header">
					<h4 class="mb-0 text-center">Danh sách CTDT</h4>
				</div>
				<div class="card-body">
					<table class="table table-inverse table-striped table-hover">
						<thead>
							<tr>
								<th>STT</th>
								<th>Tên chương trình</th>
								<th>Học phí</th>
								<th>Tùy chọn</th>
							</tr>
						</thead>
						<tbody>
							<?php require '../../php/program/manager_get_all.php'; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include '../template/footer.php'; ?>