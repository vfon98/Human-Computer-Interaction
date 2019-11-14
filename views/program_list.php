<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title i18n lang-key="homepage">Trang chủ</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/x-icon" href="/assets/img/favicon.ico">
	<link rel="stylesheet" href="/assets/css/main.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
	
	<style>
		ul.pagination {
			display: flex;
			justify-content: center !important;
		}
		#tbl-program_info {
			padding: 0;
		}
	</style>
</head>
<body>
	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
	  <div class="container-fluid">
	    <a class="navbar-brand" href="/">
            <img src="/assets/img/PTST-logo-white.png" alt="logo" width="50" class="my-n3 mx-n1 ml-n2">
	    	<span i18n lang-key="eduMgr">Quản lý đào tạo</span>
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
		</button>
	      <div class="collapse navbar-collapse" id="collapsibleNavbar">
	      	<ul class="navbar-nav ml-auto">
	      	  <li class="nav-item">
	      	    <a class="nav-link" href="/" i18n lang-key="homepage">Trang chủ</a>
	      	  </li>
	      	  <li class="nav-item">
	      	    <a class="nav-link" href="/#footer-link" i18n lang-key="contact">Liên hệ</a>
	      	  </li>
	      	  <li class="nav-item dropdown">
	      	  	<a href="#" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown">
	      	  		<i class="fa fa-globe"></i> <span id="js-cur-lang">Tiếng Việt</span>
	      	  	</a>
	      	  	<div class="dropdown-menu dropdown-menu-right">
	      	  		<a class="dropdown-item m-0 btn" id="btn-change-lang"><i class="fa fa-fw fa-language mx-2"></i> <span id="js-toggle-lang">English</span>
	      	  		</a>
	      	  	</div>
	      	  </li>
	      	  <li class="nav-item">
	      	    <a class="nav-link active" href="#" i18n lang-key="proList">Chương trình đào tạo</a>
	      	  </li>
	      	  <li class="nav-item">
	      	    <a class="nav-link" href="register.php" i18n lang-key="register">Đăng ký học</a>
	      	  </li>
	      	  <li class="nav-item">
	      	    <a class="nav-link" href="login.php" i18n lang-key="login">Đăng nhập</a>
	      	  </li>
	      	</ul>
	      </div>
	  </div>
	</nav>

	<!-- Page Content -->
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card shadow mt-2 mb-4">
					<div class="card-header bg-info text-white">
						<h4 class="text-center mb-0" i18n lang-key="proList">Danh sách chương trình đào tạo</h4>
					</div>
					<div class="card-body table-responsive-lg">
						<table class="table table-inverse table-hover table-striped text-center" id="tbl-program">
							<thead>
								<tr>
									<th i18n lang-key="no">STT</th>
									<th i18n lang-key="proName">Tên chương trình</th>
									<th i18n lang-key="duration">Thời gian</th>
									<th i18n lang-key="beginDate">Ngày bắt đầu</th>
									<th i18n lang-key="tuition">Học phí</th>
									<th i18n lang-key="subList">Danh sách môn học</th>
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
												<span i18n lang-key="details">Chi tiết</span> <i class="fa fa-info-circle"></i>
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
	<div class="modal fade" id="modal-detail" tabindex="-1">
		<div class="modal-dialog modal-dialog-scrollable" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" i18n lang-key="subList">Danh sách môn học</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only">Close</span>
					</button>
				</div>
				<div class="modal-body py-2 pb-0">
					<table class="table table-inverse table-hover table-striped text-center">
						<thead>
							<tr>
								<th i18n lang-key="no">STT</th>
								<th i18n lang-key="subID">Mã môn</th>
								<th i18n lang-key="subName">Tên môn học</th>
								<th i18n lang-key="resTeacher">GV phụ trách</th>
							</tr>
						</thead>
						<tbody id="table-content">
						</tbody>
					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">
						<i class="fa fa-times"></i> <span i18n lang-key="close">Đóng</span>
					</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<script src="/assets/js/i18n.js"></script>
	<script>
		$(document).ready(function() {
			$('#tbl-program').DataTable({
				dom: "<'row'<'col-md-6'l><'col-md-6'f>>tip",
				language: {
					url: "/assets/lang-vi.json"
				},
				initComplete: function () {
					// Change lang after dtTable loaded
					if (sessionStorage.getItem('currentLang') === 'en') {
						changeLangEN();
					}
				}
			});

			$('#js-toggle-lang').click(function() {
				changeLocaleUnit();
			});
			if (sessionStorage.getItem('currentLang') === 'en') {
				changeLocaleUnit();
			}
		});
		function changeLocaleUnit() {
			$('#tbl-program tr').each(function () {
				let moneyRow = $(this).find('td').eq(4);
				moneyRow.text(moneyRow.text().replace(/,/g, '.'));
			});
			$('#tbl-program tr').each(function () {
				let dateRow = $(this).find('td').eq(3);
				let date = dateRow.text().split('/');
				dateRow.text(date[2]+'/'+date[1]+'/'+date[0]);
			});
			$('#tbl-program tr').each(function () {
				let durationRow = $(this).find('td').eq(2);
				durationRow.text(durationRow.text().replace(/năm/g, 'years'));
			});
		}
	</script>
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
