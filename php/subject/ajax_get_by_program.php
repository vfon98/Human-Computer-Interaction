<?php
	if (isset($_POST['id'])) {
		$p_id = $_POST['id'];
		require_once '../connection.php';
		$sql = "SELECT sub_id, s.name as s_name, t.name as t_name
				FROM subjects s JOIN teachers t
				ON s.teacher_id = t.id
				WHERE s.id IN (
				    SELECT subject_id FROM program_subject WHERE program_id='$p_id' ORDER BY s.created_at
				)";
		$result = $conn->query($sql);
		$i = 1;
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				echo
				'<tr>
					<td>'.$i++.'</td>
					<td>'.$row['sub_id'].'</td>
					<td>'.$row['s_name'].'</td>
					<td>'.$row['t_name'].'</td>
				</tr>';
			}
		}
		else {
			echo 
			'<tr>
				<td colspan="4" class="text-center text-primary">Chưa có môn nào !</td>
			</tr>';
		}
	}
?>