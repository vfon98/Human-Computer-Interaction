<?php
	session_start();
	if (isset($_GET['st_id']) && $_SESSION['logged_role'] == 'manager') {
		$st_id = $_GET['st_id'];
		require_once '../../php/connection.php';
		$sql = "SELECT p.name as p_name, st.name as st_name, DATE_FORMAT(birthday, '%d/%m/%Y') as birthday, pst.avg_mark, DAY(CURDATE()) as cur_day, MONTH(CURDATE()) as cur_month, YEAR(CURDATE()) as cur_year
			FROM students st JOIN program_student pst ON st.id=pst.student_id
			JOIN programs p ON p.id=pst.program_id
			WHERE pst.is_graduated=1 AND pst.avg_mark IS NOT NULL AND st.id='$st_id'";
		$result = $conn->query($sql);
		if ($result->num_rows <= 0) {
			header('location: /views/error/unauthorized.php');
			exit;
		}
		$row = $result->fetch_assoc();
	}
	else {
		header('location: /views/error/unauthorized.php');
	}
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/assets/css/diploma.css">
	<title>In bằng tốt nghiệp</title>
</head>
<body>
	<div class="page">
        <div class="subpage">
        	<p>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</p>
        	<br>
			<strong>
				<p>TRUNG TÂM ĐÀO TẠO LẬP TRÌNH VIÊN PTST</p>
				<p>cấp</p>
			</strong>
        	<h1 style="color: red">BẰNG TỐT NGHIỆP</h1>
        	<h3 style="text-transform: uppercase"><strong><?php echo $row['p_name'] ?></strong></h3>
        	<br>
        	<table>
        		<tr>
        			<td>Cho:</td>
        			<td><?php echo $row['st_name'] ?></td>
        		</tr>
        		<tr>
        			<td>Ngày sinh:</td>
        			<td><?php echo $row['birthday'] ?></td>
        		</tr>
        		<tr>
        			<td>Năm tốt nghiệp:</td>
        			<td><?php echo $row['cur_year'] ?></td>
        		</tr>
        		<tr>
        			<td>Điểm trung bình:</td>
        			<td><?php echo $row['avg_mark'] ?></td>
        		</tr>
        		<tr>
        			<td>Xếp loại tốt nghiệp:</td>
        			<td><?php echo getGradeByMark($row['avg_mark']) ?></td>
        		</tr>
        		<tr>
        			<td>Hình thức đào tạo:</td>
        			<td>Chính quy</td>
        		</tr>
        	</table>
        	<br> 
        	<div id="footer">
        		<p>Cần Thơ, <?php echo 'ngày '.$row['cur_day'].' tháng '.$row['cur_month']. ' năm '.$row['cur_year'] ?></p>
        		<div id="footer--logo">
        			<img src="/assets/img/ptst_logo_edited.png" alt="Logo trung tâm PTST">
        			<p><strong>Trung Tâm PTST</strong></p>
        		</div>
        	</div>
        </div>    
    </div>
</body>
</html>