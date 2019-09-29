<?php
	function getGradeByMark($mark)
	{
		if ($mark >= 9 && $mark <= 10) {
			return 'Xuất sắc';
		}
		else if ($mark >= 8) {
			return 'Giỏi';
		}
		else if ($mark >= 7) {
			return 'Khá';
		}
		else if ($mark >= 6.5) {
			return 'Trung bình';
		}
		else {
			return 'Lỗi';
		}
	}
	if ($_SESSION['logged_role'] == 'manager') {
		require_once '../../php/connection.php';
		$sql = "SELECT st.id as st_id, st.name as st_name, DATE_FORMAT(st.birthday, '%d/%m/%Y') as birthday, 
					st.email, p.name as p_name, pst.avg_mark
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
				<td>'.
					getGradeByMark($row['avg_mark'])
				.'</td>
				<td>
					<button onclick="printDiploma('.$row['st_id'].')" class="btn btn-link">
						<i class="fa fa-print"></i> In bằng tốt nghiệp
					</button>
				</td>
			</tr>';
		}
	}
	else {
		header('location: /views/error/unauthorized.php');
	}
?>

<script>
	$(document).ready(function() {
		
	});
	function printDiploma(st_id) {
		console.log("st_id", st_id);
		var myWindow = window.open(`/views/template/diploma.php?st_id=${st_id}`, 'In bằng tốt nghiệp', 'width=850,height=550,top=60,left=100');
		myWindow.print();
	}
</script>