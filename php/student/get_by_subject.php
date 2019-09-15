<?php
	// CALL BY AJAX
	session_start();
	if (isset($_POST['s_id'])) {
		require_once '../connection.php';
		$s_id = $_POST['s_id'];
		$t_id = $_SESSION['teacher_id'];
		$sql = "SELECT st.name as st_name, st.birthday, st.email, p.name as p_name
				FROM subjects s JOIN program_subject ps JOIN program_student pst JOIN students st JOIN programs p
				ON s.id=ps.subject_id AND ps.program_id=pst.program_id AND pst.student_id=st.id AND pst.program_id=p.id
				WHERE s.id='$s_id' AND s.teacher_id='$t_id' AND pst.status='Đăng ký'";
		$result = $conn->query($sql);
	}
?>

<input type="hidden" name="s_id" value="<?php echo $s_id ?>">
<table class="table table-sm table-inverse table-hover table-striped mb-2">
	<thead>
		<tr>
			<th>STT</th>
			<th>Tên SV</th>
			<th>Ngày sinh</th>
			<th>Email</th>
			<th>Chương trình</th>
		</tr>
	</thead>
	<tbody>
		<?php
		if ($result->num_rows <= 0) {
			echo 
			'<tr>
				<td colspan="5" class="text-danger text-center p-2"><h5>Chưa có sinh viên đăng ký !</h5></td>
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
			</tr>';
		}
		?>
	</tbody>
</table>