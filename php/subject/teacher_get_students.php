<?php
	if (isset($_GET['id'])) {
		require_once '../../php/connection.php';
		$s_id = $_GET['id'];
		$sql = "SELECT *
				FROM students s JOIN program_subject ps
				ON s.program_id = ps.program_id
				WHERE subject_id = '$s_id'";
		$result = $conn->query($sql);
		$i = 1;
		while ($row = $result->fetch_assoc()) {
			echo
			'<tr>
				<td>'.$i++.'</td>
				<td>'.$row['name'].'</td>
				<td class="text-center">10</td>
			</tr>';
		}
	}
?>