<?php include '../template/header.php'; ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-4">
			<form>
				<fieldset class="form-group">
					<label>Tên chương trình</label>
					<input type="text" class="form-control" placeholder="Nhập tên chương trình" autofocus>
				</fieldset>
				<fieldset class="form-group">
					<label>Học phí</label>
					<input type="number" class="form-control" placeholder="Đơn vị: VND" min="0" step="1000" value="1000000">
				</fieldset>
				<button class="btn btn-success">Thêm chương trình</button>
			</form>
		</div>
		<div class="col-8">
			<table class="table table-inverse table-striped table-hover">
				<thead>
					<tr>
						<th>STT</th>
						<th>Tên chương trình</th>
						<th>Học phí</th>
					</tr>
				</thead>
				<tbody>
					<?php require '../../php/program/get_all_program.php'; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php include '../template/footer.php'; ?>