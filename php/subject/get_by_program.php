<?php
	if (isset($_GET['id'])) {
		$p_id = $_GET['id'];
		require_once '../../php/connection.php';
		$sql = "SELECT * FROM subjects
			WHERE id IN (
				SELECT subject_id FROM program_subject WHERE program_id='$p_id' ORDER BY created_at
			)";
		$result = $conn->query($sql);
		$i = 1;
		while ($row = $result->fetch_assoc()) {
			echo
			'<tr>
				<td>'.$i++.'</td>
				<td>'.$row['sub_id'].'</td>
				<td>'.$row['name'].'</td>
			</tr>';
		}
	}
?>