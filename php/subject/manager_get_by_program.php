<?php
	if (isset($_GET['id'])) {
		$p_id = $_GET['id'];
		require_once '../../php/connection.php';
		$sql = "SELECT * FROM subjects
			WHERE id IN (
				SELECT subject_id FROM program_subject WHERE program_id='$p_id' ORDER BY created_at
			)";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$i = 1;
			while ($row = $result->fetch_assoc()) {
				echo
				'<tr>
					<td>'.$i++.'</td>
					<td>'.$row['sub_id'].'</td>
					<td>'.$row['name'].'</td>
					<td>
						<a href="/php/program/del_subject.php?p_id='.$p_id.'&s_id='.$row['id'].'" 
							class="btn btn-danger js-btn-del"
						>
							<i class="fa fa-trash-o"></i> Xóa
						</a>
					</td>
				</tr>';
			}
		}
		else {
			echo 
			'<tr>
				<td colspan="4" class="text-center text-danger"><strong>Bạn chưa thêm môn nào !</strong></td>
			</tr>';
		}
	}
?>