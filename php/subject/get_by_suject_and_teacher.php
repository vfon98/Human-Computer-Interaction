<?php
	session_start();
	if ($_POST['s_id']) {
		require_once '../connection.php';
		$t_id = $_SESSION['teacher_id'];
		$s_id = $_POST['s_id'];
		$sql = "SELECT st.id as st_id, st.name as st_name, st.email
				FROM subjects s JOIN program_subject ps JOIN program_student pst JOIN students st
				ON s.id=ps.subject_id AND ps.program_id=pst.program_id AND pst.student_id=st.id
				WHERE s.teacher_id='$t_id' AND s.id='$s_id' AND pst.status='Đăng ký'";
		$result = $conn->query($sql);
	}
?>
<form action="/php/student/grade_by_subject.php" method="POST">
	<table class="table table-inverse table-hover text-center table-striped">
		<thead>
			<th>STT</th>
			<th>Tên sinh viên</th>
			<th>Email</th>
			<th>Điểm</th>
		</thead>
		<tbody>
			<?php
			$i = 1;
			if ($result->num_rows <= 0) {
				echo
				'<tr>
				<td colspan="4" class="text-center text-danger"><h5>Chưa có sinh viên đăng ký !</h5></td>
				</tr>';
				exit;
			}
			while ($row = $result->fetch_assoc()) {
				echo
				'<tr>
					<td>'.$i++.'</td>
					<td>'.$row['st_name'].'</td>
					<td>'.$row['email'].'</td>
					<td>'.
					'<input type="hidden" name="st_id[]" value="'.$row['st_id'].'">'.
					'<span class="js-mark-cell">Chưa có</span>'
					.'</td>
				</tr>';
			}
			?>
			<tr class="bg-light">
				<td colspan="3"></td>
				<td colspan="1" class="text-center">
					<button type="button" class="btn btn-danger" id="btn-grading">
						<i class="fa fa-lg fa-pencil-square-o"></i> Chấm điểm
					</button>
					<button type="submit" class="btn btn-primary">OK</button>
				</td>
			</tr>
		</tbody>
	</table>
</form>
<script>
	$(document).ready(function() {
		$('#btn-grading').click(function() {
			console.log('lcicke');
			$('.js-mark-cell').html(
				'<input type="number" name="mark[]" min="0" max="10" step=".1" class="inp-mark" style="width: 45px" value="5"/>'
			);
			$('.inp-mark').eq(0).focus();
		});
	});
</script>