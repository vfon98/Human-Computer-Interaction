<?php
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		require_once '../../php/connection.php';
		$sql = "SELECT * FROM subjects
			WHERE id IN (
				SELECT subject_id FROM program_subject WHERE program_id='$id'
			)";
		$result = $conn->query($sql);
		$i = 1;
		while ($row = $result->fetch_assoc()) {
			echo
			'<tr>
				<td>'.$i++.'</td>
				<td>'.$row['sub_id'].'</td>
				<td>'.$row['name'].'</td>
				<td>
					<button type="button" class="btn btn-danger">
						<i class="fa fa-trash-o"></i> Xóa
					</button>
				</td>
			</tr>';
		}
	}
?>