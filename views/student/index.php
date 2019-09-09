<?php require 'check_role.php'; ?>
<?php require '../../php/student/get_by_username.php'; ?>
<?php include '../template/header.php'; ?>

<div class="container-fluid pt-3">
	<div class="row">
		<div class="col-5">
			<div class="card shadow">
				<div class="card-header text-center pb-1 bg-secondary text-white">
					<h5>Thông tin sinh viên</h5>
				</div>
				<div class="card-body py-2">
					<table class="table table-sm table-inverse table-hover table-borderless" id="table-student">
						<thead>
						</thead>
						<tbody>
							<tr>
								<td>Họ tên: </td>
								<td><?php echo $row['st_name'] ?></td>
							</tr>
							<tr>
								<td>Tài khoản: </td>
								<td><?php echo $logged_user ?></td>
							</tr>
							<tr>
								<td>Ngày sinh: </td>
								<td><?php echo $row['birthday'] ?></td>
							</tr>
							<tr>
								<td>Email: </td>
								<td><?php echo $row['email'] ?></td>
							</tr>
							<tr>
								<td>Địa chỉ: </td>
								<td><?php echo $row['address'] ?></td>
							</tr>
							<tr>
								<td>Chương trình: </td>
								<td><?php echo $row['p_name'] ?></td>
							</tr>
							<tr>
								<td>Ngày đăng ký: </td>
								<td><?php echo $row['created_at']; ?></td>
							</tr>
							<tr>
								<td>Học phí: </td>
								<td class="font-weight-bold 
									<?php echo ($row['is_paid'] ? 'text-success' : 'text-danger') ?>">
									<?php echo ($row['is_paid'] ? 'Đã đóng' : 'Chưa đóng') ?>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!-- TUITION MODAL -->
		<?php
			if ($_SESSION['student_is_paid'] == false) {
				require 'pay_tuition.php';
			}
		?>

		<div class="col-7">
			<div class="card shadow">
				<div class="card-header text-center pb-1 bg-secondary text-white">
					<h5>
						Chương trình hiện tại
					</h5>
				</div>
				<div class="card-body">
					<table class="table table-inverse table-hover table-striped">
						<thead>
							<tr>
								<th>STT</th>
								<th>Mã môn</th>
								<th>Tên môn</th>
								<th>GV phụ trách</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$sql = "SELECT sub_id, s.name as s_name, t.name as t_name 
								FROM subjects s JOIN teachers t ON s.teacher_id = t.id
								WHERE s.id IN (
									SELECT subject_id FROM program_subject WHERE program_id=".$row['p_id']."
								)";
							$result = $conn->query($sql);
							$i = 1;
							while ($row = $result->fetch_assoc()) {
								echo
								'<tr>
									<td>'.$i++.'</td>
									<td>'.$row['sub_id'].'</td>
									<td>'.$row['s_name'].'</td>
									<td>'.$row['t_name'].'</td>
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


<?php include '../template/footer.php'; ?>