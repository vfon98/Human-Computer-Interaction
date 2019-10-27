<?php require 'check_role.php'; ?>
<?php require '../template/header.php'; ?>

<div class="container-fluid pt-2">
	<div class="row">
		<div class="col-md">
			<div class="card shadow">
				<div class="card-header text-center pb-1 bg-info text-white">
					<h4 i18n lang-key="studyResult">Kết quả học tập</h4>
				</div>
				<div class="card-body pt-2 pb-1">
					<table class="table table-responsive-md table-inverse table-hover table-striped text-center">
						<thead>
							<tr>
								<th i18n lang-key="no">STT</th>
								<th i18n lang-key="subID">Mã môn</th>
								<th i18n lang-key="subName">Tên môn học</th>
								<th i18n lang-key="resTeacher">GV phụ trách</th>
								<th i18n lang-key="times">Lần thi</th>
								<th i18n lang-key="mark" style="width: 180px">Điểm</th>
								<th i18n lang-key="accum">Tích lũy</th>
							</tr>
						</thead>
						<tbody>
							<?php include '../../php/student/get_mark_by_student_id.php'; ?>
						</tbody>
					</table>		
				</div>
			</div>
		</div>
	</div>
</div>

<?php require '../template/footer.php'; ?>