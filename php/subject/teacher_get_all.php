<?php
	if ($_SESSION['logged_role'] == 'teacher' && isset($_SESSION['logged_user'])) {
		require_once '../../php/connection.php';
		$username = $_SESSION['logged_user'];
		$sql = "SELECT s.id as s_id, sub_id, s.name as s_name
				FROM teachers t JOIN subjects s
				ON t.id = s.teacher_id
				WHERE username='$username'";
		$result = $conn->query($sql);
		$i = 1;
		while ($row = $result->fetch_assoc()) {
			echo
			'<tr>
				<td>'.$i++.'</td>
				<td>'.$row['sub_id'].'</td>
				<td>'.$row['s_name'].'</td>
				<td>
					<a href="subject_detail.php?id='.$row['s_id'].'" class="btn btn-info">Chi tiết</a>
				</td>
			</tr>';
		}
	}
?>