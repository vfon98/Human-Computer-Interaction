<?php
	if ($_SESSION['logged_role'] == 'manager') {
		require_once '../../php/connection.php';
		$sql = "SELECT st.name as st_name, st.birthday, st.email, p.name as p_name, pst.avg_mark
				FROM program_student pst
				JOIN students st ON st.id=pst.student_id
				JOIN programs p ON p.id=pst.program_id
				WHERE is_graduated=true";
		$result = $conn->query($sql);
		if ($result->num_rows <= 0) {
			echo 
			'<tr>
				<th class="text-center text-danger bg-light" colspan="8"><h4>Chưa có sinh viên xét tốt nghiệp !</h4></th>
			</tr>';
			exit;
		}
		$i = 1;
		while ($row = $result->fetch_assoc()) {
			echo
			'<tr>
				<td>'.$i++.'</td>
				<td>'.$row['st_name'].'</td>
				<td>'.$row['birthday'].'</td>
				<td>'.$row['email'].'</td>
				<td>'.$row['p_name'].'</td>
				<td>'.$row['avg_mark'].'</td>
				<td>'.'Xuất sắc'.'</td>
				<td>
					<a href="#" class="btn btn-link"><i class="fa fa-print"></i> In bằng tốt nghiệp</a>
				</td>
			</tr>';
		}
	}
	else {
		header('location: /views/error/unauthorized.php');
	}
?>