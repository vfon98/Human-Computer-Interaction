<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Trang chủ</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/x-icon" href="/assets/img/favicon.ico">
	<link rel="stylesheet" href="/assets/css/main.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
	  <div class="container">
	    <a class="navbar-brand" href="#">
	    	<!-- <img src="/assets/img/logo_ctu.gif" alt="logo" style="height: 2rem"> -->
	    	Quản lý đào tạo
		</a>
	      <ul class="navbar-nav ml-auto">
	        <li class="nav-item">
	          <a class="nav-link" href="/">Trang chủ</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link" href="#">Liên hệ</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link active" href="#">Chương trình đào tạo</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link" href="register.php">Đăng ký học</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link" href="login.php">Đăng nhập</a>
	        </li>
	      </ul>
	  </div>
	</nav>

	<!-- Page Content -->
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="card shadow mt-2">
					<div class="card-header bg-info text-white">
						<h4 class="text-center mb-0">Danh sách chương trình đào tạo</h4>
					</div>
					<div class="card-body">
						<table class="table table-inverse table-hover table-striped text-center">
							<thead>
								<tr>
									<th>STT</th>
									<th>Tên chương trình</th>
									<th>Thời gian</th>
									<th>Ngày bắt đầu</th>
									<th>Học phí</th>
									<th>Danh sách môn học</th>
								</tr>
							</thead>
							<tbody>
								<?php
								include '../php/program/get_all.php';
								$i = 1;
								while ($row = $result->fetch_assoc()) {
									echo
									'<tr>
										<td>'.$i++.'</td>
										<td>'.$row['name'].'</td>
										<td>'.$row['duration'].'</td>
										<td>'.$row['begin_at'].'</td>
										<td>'.number_format($row['tuition']).' &#8363;</td>
										<td>
											<button 
												type="button" class="btn btn-link"
												data-toggle="modal" data-target="#modal-detail"
												onclick="ajaxGetDetail('.$row['id'].')"
											>
												Chi tiết <i class="fa fa-info-circle"></i>
											</button>
										</td>
									</tr>';
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /.container -->

	<!-- MODEL DETAIL OF PROGRAM -->
	<div class="modal fade" id="modal-detail">
		<div class="modal-dialog modal-dialog-scrollable" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Danh sách môn học</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only">Close</span>
					</button>
				</div>
				<div class="modal-body py-2">
					<table class="table table-inverse table-hover table-striped m-0">
						<thead>
							<tr>
								<th>STT</th>
								<th>Mã môn</th>
								<th>Tên môn học</th>
								<th>GV phụ trách</th>
							</tr>
						</thead>
						<tbody id="table-content">
						</tbody>
					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">
						<i class="fa fa-times"></i> Close
					</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	<script>
		function ajaxGetDetail(id) {
			console.log("ajaxGetDetail", id);
			$.post('../php/subject/ajax_get_by_program.php', {
				id
			}).then(data => {
				$('#table-content').html(data);
			});
		}
	</script>

</body>
</html>