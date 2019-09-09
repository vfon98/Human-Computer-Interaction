<?php
	// SESSION ALREADY STARTED
	if (isset($_SESSION['student_id'])) {
		$st_id = $_SESSION['student_id'];
		require '../../php/connection.php';
		$sql = "SELECT * FROM courses WHERE student_id='$st_id'";
		$result = $conn->query($sql);
		$i = 1;
		while ($row = $result->fetch_assoc()) {
			echo 
			'<tr>
				<td>'.$i++.'</td>
				<td>'.$row['name'].'</td>
				<td>'.$row['begin_at'].'</td>
				<td>'.$row['end_at'].'</td>
				<td>
					<a href="/php/course/delete.php?id='.$row['id'].'" class="btn btn-danger js-btn-del"> <i class="fa fa-trash-o"></i> Xóa</a>
				</td>
			</tr>';
		}
	}
?>