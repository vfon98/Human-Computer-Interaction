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
				<td>
					<a class="btn btn-success js-btn-approve"
						href="/php/student/approve_student.php?id='.$row['st_id'].'"
					>
						<i class="fa fa-check"></i> Duyệt
					</a>

					<a class="btn btn-danger js-btn-decline"
						href="/php/student/decline_student.php?id='.$row['st_id'].'"
					>
						<i class="fa fa-times"></i> Loại
					</a>
				</td>
			</tr>';
		}
	}
?>