<?php
	// SESSION ALREADY STATED
	if (isset($_SESSION['student_id'])) {
		require_once '../../php/connection.php';
		$st_id = $_SESSION['student_id'];
		$sql = "SELECT * 
				FROM program_student ps JOIN programs p ON ps.program_id = p.id
				WHERE student_id='$st_id' ORDER BY ps.status DESC, ps.created_at";
		$result = $conn->query($sql);
		$i = 1;
		while ($row = $result->fetch_assoc()) {
			$status_changable = 
				'<div class="dropdown">
				  <button type="button" class="btn btn-link dropdown-toggle p-0 m-0" data-toggle="dropdown">
					'.$row['status'].'
				  </button>
				  <div class="dropdown-menu">
				    <a class="dropdown-item text-danger" href="#"><i class="fa fa-ban"></i> Tạm hoãn</a>
				  </div>
				</div>';
			echo 
			'<tr>
				<td>'.$i++.'</td>
				<td>'.$row['name'].'</td>
				<td>'.$row['duration'].'</td>
				<td>
					'.($row['is_paid'] ? 'Đã đóng' : 'Chưa đóng').'
				</td>
				<td>
					'.($row['status'] == 'Đăng ký' ? $status_changable : $row['status']).'
				</td>
			</tr>';
		}
	}
?>