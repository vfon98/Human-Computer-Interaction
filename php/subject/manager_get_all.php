<?php
	if (true) {
		require_once '../../php/connection.php';
		$sql = "SELECT s.id as id, sub_id, s.name as s_name, t.name as t_name, t.id as t_id
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
					<button class="btn btn-secondary js-btn-update mb-1 js-btn-update"
						data-toggle="modal" data-target="#modal-subject"
						data-t-id="'.$row['t_id'].'"><i class="fa fa-wrench"></i> <span i18n lang-key="update">Sửa</span></button>

					<a href="/php/subject/delete.php?id='.$row['id'].'" class="btn btn-danger js-btn-del">
						<i class="fa fa-trash-o"></i> <span i18n lang-key="delete">xóa</span>
					</a>
				</td>
			</tr>';
		}
	}
?>
