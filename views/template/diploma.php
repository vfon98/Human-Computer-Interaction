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
			return '<span i18n lang-key="excellent">Xuất sắc</span>';
		}
		else if ($mark >= 8) {
			return '<span i18n lang-key="veryGood">Giỏi</span>';
		}
		else if ($mark >= 7) {
			return '<span i18n lang-key="good">Khá</span>';
		}
		else {
			return '<span i18n lang-key="average">Trung bình</span>';
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link rel="stylesheet" href="/assets/css/diploma.css">
	<title i18n lang-key="print">In bằng tốt nghiệp</title>
    <script src="/assets/js/i18n.js"></script>
    <script>
    	$(document).ready(function() {
    		let currentLang = getCurrentLang();
    		if (currentLang && currentLang === 'en') {
    		    changeLangEN();
    		    let monthInNum = parseInt($('#month-in-num').text());
    		    let monthInText = changeMonthToText(monthInNum);
    		    $('#month-in-num').text(monthInText);
    		}
    	});
    	function changeMonthToText(monthIndex) {
    		const monthNames = ["January", "February", "March", "April", "May", "June",
    		  "July", "August", "September", "October", "November", "December"
    		];
    		return monthNames[monthIndex-1];
    	}
    </script>
</head>
<body>
	<div class="page">
        <div class="subpage">
        	<p i18n lang-key="nationalBrand">CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</p>
        	<br>
			<strong>
				<p i18n lang-key="centerName">TRUNG TÂM ĐÀO TẠO LẬP TRÌNH VIÊN PTST</p>
				<p i18n lang-key="hasConferred">cấp</p>
			</strong>
        	<h1 i18n lang-key="diploma" style="color: red">BẰNG TỐT NGHIỆP</h1>
        	<h3 style="text-transform: uppercase"><strong><?php echo $row['p_name'] ?></strong></h3>
        	<br>
        	<table>
        		<tr>
        			<td i18n lang-key="upon">Cho:</td>
        			<td><?php echo $row['st_name'] ?></td>
        		</tr>
        		<tr>
        			<td i18n lang-key="DOB">Ngày sinh:</td>
        			<td><?php echo $row['birthday'] ?></td>
        		</tr>
        		<tr>
        			<td i18n lang-key="yearOfGraduation">Năm tốt nghiệp:</td>
        			<td><?php echo $row['cur_year'] ?></td>
        		</tr>
        		<tr>
        			<td i18n lang-key="gpa">Điểm trung bình:</td>
        			<td><?php echo $row['avg_mark'] ?></td>
        		</tr>
        		<tr>
        			<td i18n lang-key="degreeClass">Xếp loại tốt nghiệp:</td>
        			<td><?php echo getGradeByMark($row['avg_mark']) ?></td>
        		</tr>
        		<tr>
        			<td i18n lang-key="modeOfStudy">Hình thức đào tạo:</td>
        			<td i18n lang-key="fulltime">Chính quy</td>
        		</tr>
        	</table>
        	<br> 
        	<div id="footer">
        		<p><span i18n lang-key="cantho">Cần Thơ</span>, <?php echo '<span i18n lang-key="dNone">ngày </span>'
        			.$row['cur_day'].'<span i18n lang-key="dNone"> tháng</span> '
        			.'<span id="month-in-num">'.$row['cur_month']. '</span><span i18n lang-key="dNone"> năm</span> '
        			.$row['cur_year'] ?>
        		</p>
        		<div id="footer--logo">
        			<img src="/assets/img/ptst_logo_edited.png" alt="Logo trung tâm PTST">
        			<p><strong i18n lang-key="centerName">Trung Tâm PTST</strong></p>
        		</div>
        	</div>
        </div>    
    </div>
</body>
</html>