<?php
	if ($_SESSION['logged_role'] == 'teacher') {
		require_once '../../php/connection.php';
		$username = $_SESSION['logged_user'];
		// $sql = "SELECT s.sub_id, s.id as s_id, s.name as s_name
		// 		FROM teachers t JOIN subjects s
		// 		ON t.id = s.teacher_id
		// 		WHERE t.username='$username'";
		$sql = "SELECT s.id AS s_id, sub_id, s.name AS s_name, COUNT(pst.student_id) AS total_students
				FROM teachers t JOIN subjects s ON t.id = s.teacher_id
				LEFT JOIN program_subject ps ON s.id = ps.subject_id
				LEFT JOIN program_student pst ON pst.program_id = ps.program_id AND pst.status='Đăng ký'
				WHERE t.username='$username' GROUP BY sub_id, s.name";
		// echo $sql;
		$result = $conn->query($sql);
		$i = 1;
		while ($row = $result->fetch_assoc()) {
			echo
			'<tr>
				<td>'.$i++.'</td>
				<td>'.$row['sub_id'].'</td>
				<td>'.$row['s_name'].'</td>
				<td>'.$row['total_students'].'</td>
				<td>
					<button onclick="ajaxGetDetail('.$row['s_id'].')" data-toggle="modal" data-target="#modal-student-list" class="btn btn-link">
						<span i18n lang-key="details">Chi tiết</span> <i class="fa fa-info-circle"></i>
					</button>
				</td>
			</tr>';
		}
	}
?>