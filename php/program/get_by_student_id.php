<?php
	// SESSION ALREADY STATED
	if (isset($_SESSION['student_id'])) {
		require_once '../../php/connection.php';
		$st_id = $_SESSION['student_id'];
		$sql = "SELECT ps.id as ps_id, name, duration, is_paid, status
				FROM program_student ps JOIN programs p ON ps.program_id = p.id
				WHERE student_id='$st_id' ORDER BY ps.created_at";
		$result = $conn->query($sql);
		$i = 1;
		while ($row = $result->fetch_assoc()) {
			$btn_delay = 
				'<div class="dropdown">
				  <button type="button" class="btn btn-link p-0 m-0 dropdown-toggle" data-toggle="dropdown">
					'.$row['status'].'
				  </button>
				  <div class="dropdown-menu">
				    <a class="dropdown-item text-danger" href="/php/program/delay_program.php?id='.$row['ps_id'].'">
				    	<i class="fa fa-ban"></i> Tạm hoãn
				    </a>
				  </div>
				</div>';
			$btn_active =
				'<div class="dropdown">
				  <button type="button" class="btn text-danger btn-link p-0 m-0 dropdown-toggle" data-toggle="dropdown">
					'.$row['status'].'
				  </button>
				  <div class="dropdown-menu">
				    <a class="dropdown-item text-info" href="/php/program/active_program.php?id='.$row['ps_id'].'">
				    	<i class="fa fa-check"></i> Đăng ký
				    </a>
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
					'.($row['status'] == 'Đăng ký' ? 
							$btn_delay : 
							($row['status'] == 'Tạm hoãn' ? $btn_active : $row['status'])).'
				</td>
			</tr>';
		}
	}
?>