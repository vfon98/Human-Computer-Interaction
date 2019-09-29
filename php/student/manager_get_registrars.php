<?php
	if (true) {
		require '../../php/connection.php';
		$sql = "SELECT st.id as st_id, st.name as st_name, DATE_FORMAT(birthday, '%d/%m/%Y') as birthday, email, username, address,
					 p.name as p_name, ps.created_at, ps.is_paid, ps.is_extra
				FROM students st JOIN program_student ps JOIN programs p
				ON st.id = ps.student_id AND ps.program_id = p.id
				WHERE ps.status = 'Có ý thích' ORDER BY ps.created_at ASC";
		$result = $conn->query($sql);
		$i = 1;
		while ($row = $result->fetch_assoc()) {
			echo
			'<tr title="id: '.$row['st_id'].'" class="'.($row['is_extra'] ? 'text-info' : '').'">
				<td class="text-center">'.$i++.'</td>
				<td>'.$row['st_name'].($row['is_extra'] ? ' *' : '').'</td>
				<td>'.$row['birthday'].'</td>
				<td>'.$row['address'].'</td>
				<td>'.$row['p_name'].'</td>
				<td>'.$row['username'].'</td>
				<td>'.$row['created_at'].'</td>
				<td class="text-center">
					<input type="checkbox" class="selected-id" name="selected-id[]" style="width: 1.2em; height: 1.2em; margin: 0.4em 0" value="'.$row['st_id'].'">
				</td>
			</tr>';
		}
		echo 
		'<tr class="bg-light">
			<td colspan="4" class="font-italic text-info pl-3">* Sinh viên đăng ký nhiều CTDT</td>
			<td colspan="4" class="text-right">
				<button name="btn-approve" type="submit" class="btn btn-success js-btn-approve">
					<i class="fa fa-check"></i> Duyệt
				</button>

				<button name="btn-decline" type="submit" class="btn btn-danger js-btn-decline">
					<i class="fa fa-times"></i> Loại
				</button>
			</td>
		</tr>';
	}
?>