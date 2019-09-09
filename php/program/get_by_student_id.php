<?php
	// SESSION ALREADY STATED
	if (isset($_SESSION['student_id'])) {
		require_once '../../php/connection.php';
		$st_id = $_SESSION['student_id'];
		$sql = "SELECT * 
				FROM program_student ps JOIN programs p ON ps.program_id = p.id
				WHERE student_id='$st_id'";
		$result = $conn->query($sql);
		$i = 1;
		while ($row = $result->fetch_assoc()) {
			echo 
			'<tr>
				<td>'.$i++.'</td>
				<td>'.$row['name'].'</td>
				<td>'.$row['duration'].'</td>
				<td>'.
					( $row['is_paid'] ? 'Đã đóng' : 'Chưa đóng' )
				.'</td>
				<td>'.$row['status'].'</td>
			</tr>';
		}
	}
?>