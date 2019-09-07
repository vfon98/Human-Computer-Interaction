<?php
	if (true) {
		require '../../php/connection.php';
		$sql = "SELECT s.id as st_id, s.name as st_name, birthday, email, address, p.name as pro_name, created_at
			 FROM students s JOIN programs p 
			 WHERE s.program_id = p.id AND status='Có ý thích'";
		$result = $conn->query($sql);
		$i = 1;
		while ($row = $result->fetch_assoc()) {
			echo
			'<tr>
				<td class="text-center">'.$i++.'</td>
				<td>'.$row['st_name'].'</td>
				<td>'.$row['birthday'].'</td>
				<td>'.$row['email'].'</td>
				<td>'.$row['address'].'</td>
				<td>'.$row['pro_name'].'</td>
				<td>'.$row['created_at'].'</td>
				<td class="text-center">
					<input type="checkbox" class="selected-id" name="selected-id[]" style="width: 1.2em; height: 1.2em; margin: 0.4em 0" value="'.$row['st_id'].'">
				</td>
			</tr>';
		}
		echo 
		'<tr>
			<td colspan="8" class="text-right">
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