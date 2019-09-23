<?php require 'check_role.php'; ?>
<?php include '../template/header.php'; ?>

<div class="container-fluid p-3" id="root">
	<div class="row">
		<!-- ADD NEW PROGRAM MODEL -->
		<div class="col-12">
			<button class="btn btn-success mb-2" data-toggle="modal" data-target="#modalAdd">
				<i class="fa fa-plus"></i> Thêm mới CTDT
			</button>
		</div>

		<div class="modal fade" id="modalAdd">
		    <div class="modal-dialog modal-dialog-centered">
		      <div class="modal-content">
		        <!-- Modal Header -->
		        <div class="modal-header">
		          <h4 class="modal-title">Thêm mới CTDT</h4>
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		        </div>
		        <!-- Modal body -->
		        <div class="modal-body">
		        	<form action="/php/program/create.php" method="POST">
		        		<input type="hidden" name="manager-acc" value="<?php echo $_SESSION['logged_user'] ?>">
		        		<fieldset class="form-group">
		        			<label>Tên chương trình</label>
		        			<input name="name" type="text" class="form-control" placeholder="Nhập tên chương trình" maxlength="50" autofocus required>
		        		</fieldset>
		        		<fieldset class="form-group row col-4">
		        			<label>Thời gian đào tạo</label>
		        			<div class="input-group">
		        				<input name="duration" type="number" class="form-control" min="1" max="10" step="0.5" value="4">
		        				<div class="input-group-append">
		        					<span class="input-group-text">Năm</span>
		        				</div>
		        			</div>
		        		</fieldset>
		        		<fieldset class="form-group">
		        			<label>Ngày bắt đầu</label>
		        			<input name="begin-at" type="date" class="form-control">
		        		</fieldset>
		        		<fieldset class="form-group">
		        			<label>Học phí</label>
		        			<div class="input-group">
		        				<input name="tuition" type="number" class="form-control" placeholder="Đơn vị: VND" min="0" max="1000000000" step="1000" value="1000000">
		        				<div class="input-group-append">
		        					<span class="input-group-text">VND</span>
		        				</div>
		        			</div>
		        		</fieldset>
		        		<button class="btn btn-success">Thêm chương trình <i class="fa fa-angle-double-right"></i></button>
		        	</form>
		        </div>
		        <!-- Modal footer -->
		        <div class="modal-footer">
		          <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
		        </div>
		      </div>
		    </div>
		  </div>
		<!-- TABLE OF PROGRAMS -->
		<div class="col-12">
			<div class="card shadow p-0">
				<div class="card-header bg-info text-white">
					<h4 class="mb-0 text-center">Danh sách CTDT đang quản lý</h4>
				</div>
				<div class="card-body py-2">
					<table class="text-center table table-inverse table-striped table-hover">
						<thead>
							<tr>
								<th>STT</th>
								<th class="text-left">Tên chương trình</th>
								<th>Thời gian</th>
								<th>Ngày bắt đầu</th>
								<th>Học phí</th>
								<th>Quản lý</th>
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