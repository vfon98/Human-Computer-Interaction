<?php
	if ($_SESSION['logged_role'] == 'teacher') {
		require_once '../../php/connection.php';
		$t_id = $_SESSION['teacher_id'];
		$sql = "SELECT s.id as s_id, sub_id, s.name as s_name
				FROM teachers t JOIN subjects s ON t.id=s.teacher_id 
				WHERE t.id='$t_id'";
		$result = $conn->query($sql);
		while ($row = $result->fetch_assoc()) {
			echo
			'<option value="'.$row['s_id'].'">'.($row['sub_id'] .' - '. $row['s_name']).'</option>';
		}
	}
?>