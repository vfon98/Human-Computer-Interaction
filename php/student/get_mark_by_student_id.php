<?php
	if ($_SESSION['logged_role'] == 'student') {
		require_once '../../php/connection.php';
		$st_id = $_SESSION['student_id'];
		$sql = "SELECT sub_id, s.name as s_name, t.name as t_name, mark
			FROM students st JOIN program_student pst ON st.id=pst.student_id
			JOIN program_subject ps ON ps.program_id=pst.program_id
			JOIN subjects s ON s.id=ps.subject_id
			JOIN teachers t ON t.id=s.teacher_id
			LEFT JOIN student_subject ss ON ss.subject_id=s.id AND ss.student_id=st.id
			WHERE st.id='$st_id'";
		$result = $conn->query($sql);
		$i = 1;
		while ($row = $result->fetch_assoc()) {
			echo
			'<tr>
				<td>'.$i++.'</td>
				<td>'.$row['sub_id'].'</td>
				<td>'.$row['s_name'].'</td>
				<td>'.$row['t_name'].'</td>
				<td style="font-weight: 550">'.($row['mark'] === NULL ? '<span class="">Chưa có</span>' : $row['mark']).'</td>
			</tr>';
		}
	}
?>