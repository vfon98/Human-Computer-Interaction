<?php
	if (isset($_SESSION['student_id'])) {
		require_once '../../php/connection.php';
		$st_id = $_SESSION['student_id'];

		$sql = "SELECT * FROM programs WHERE id NOT IN (
					SELECT program_id FROM program_student WHERE student_id='$st_id'
				);";
		$result = $conn->query($sql);
	}
?>
<table class="table table-responsive-md table-inverse table-sm table-hover table-striped text-center mb-n3">
	<thead>
		<tr>
			<th>STT</th>
			<th>Tên chương trình</th>
			<th>Thời gian</th>
			<th>Ngày bắt đầu</th>
			<th>Học phí</th>
			<th>Tùy chọn</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$i = 1;
		while ($row = $result->fetch_assoc()) {
			echo
			'<tr>
				<td>'.$i++.'</td>
				<td>'.$row['name'].'</td>
				<td>'.$row['duration'].'</td>
				<td>'.$row['begin_at'].'</td>
				<td>'.number_format($row['tuition']).' &#8363;</td>
				<td>
					<button type="submit" name="p_id" value="'.$row['id'].'" class="btn btn-link">Đăng ký <i class="fa fa-paper-plane"></i></button>
				</td>
			</tr>';
		}
		?>
	</tbody>
</table>