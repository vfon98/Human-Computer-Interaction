<?php
	if (true) {
		require_once '../../php/connection.php';
		$sql = "SELECT s.id as id, sub_id, s.name as s_name, t.name as t_name
			FROM subjects s JOIN teachers t
			ON s.teacher_id = t.id";
		$result = $conn->query($sql);
		$i = 1;
		while ($row = $result->fetch_assoc()) {
			echo 
			'<tr>
				<td>'.$i++.'</td>
				<td>'.$row['sub_id'].'</td>
				<td>'.$row['s_name'].'</td>
				<td>'.$row['t_name'].'</td>
				<td>
					<a href="#" class="btn btn-secondary js-btn-update mb-1"><i class="fa fa-wrench"></i> Sửa</a>

					<a href="/php/subject/delete.php?id='.$row['id'].'" class="btn btn-danger js-btn-del">
						<i class="fa fa-trash-o"></i> Xóa
					</a>
				</td>
			</tr>';
		}
	}
?>