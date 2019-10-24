<?php
	if (isset($_GET['id']) && $_SESSION['logged_role'] == 'manager') {
		require_once '../../php/connection.php';
		$p_id = $_GET['id'];
		$sql = "SELECT st.name, DATE_FORMAT(st.birthday, '%d/%m/%Y') as birthday, 
					st.email, st.address, st.username, st.created_at, pst.status 
				FROM programs p JOIN program_student pst ON p.id = pst.program_id
				JOIN students st ON st.id = pst.student_id
				WHERE p.id='$p_id'";
		$result = $conn->query($sql);
	}
	else {
		header('location: ../error/unauthorized.php');
	}
?>
<table class="table table-responsive-md table-inverse table-striped table-hover text-center m-0">
	<thead>
		<tr>
			<th>STT</th>
			<th>Họ tên</th>
			<th>Ngày sinh</th>
			<th>Email</th>
			<th>Địa chỉ</th>
			<th>Tên đăng nhập</th>
			<th>Ngày nhập học</th>
			<th>Trạng thái</th>
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
					<td>'.$row['birthday'].'</td>
					<td>'.$row['email'].'</td>
					<td>'.$row['address'].'</td>
					<td>'.$row['username'].'</td>
					<td>'.$row['created_at'].'</td>
					<td>'.$row['status'].'</td>
				</tr>';
			}
		?>
	</tbody>
</table>