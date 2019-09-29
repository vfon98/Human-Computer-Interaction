<?php
	// WITHIN views/manager/programs_manager
	if (isset($_SESSION['logged_user'])) {
		$logged_user = $_SESSION['logged_user'];
		require_once '../../php/connection.php';
		$sql = "SELECT * FROM programs WHERE manager_acc='$logged_user'";
		$result = $conn->query($sql);
		if ($result->num_rows == 0) {
			echo
			'<tr>
				<td colspan="7" class="text-center text-danger">
					<h5><strong>Bạn chưa thêm chương trình đào tạo !</strong></h5>
				</td>
			</tr>';
		}
		$i = 1;
		while($row = $result->fetch_assoc()) {
			echo 
			'<tr>
				<td>'.$i++.'</td>
				<td class="text-left">'.$row['name'].'</td>
				<td>'.$row['duration'].'</td>
				<td>'.date('d/m/Y', strtotime($row['begin_at'])).'</td>
				<td>'
					.number_format($row['tuition']).' &#8363;
				</td>
				<td>
					<a href="/views/manager/program_detail.php?id='.$row['id'].'" class="btn btn-warning"><i class="fa fa-cog"></i> Quản lý
					</a>
				</td>
				<td>
					<a href="/php/program/update.php?id='.$row['id'].'" class="btn btn-secondary js-btn-update"><i class="fa fa-wrench"></i> Sửa</a>

					<a href="/php/program/delete.php?id='.$row['id'].'" class="btn btn-danger js-btn-del"><i class="fa fa-trash-o"></i> Xóa</a>
				</td>
			</tr>';
		}
	}
	else {
		header('location: ../error/unauthorized.php');
	}
?>