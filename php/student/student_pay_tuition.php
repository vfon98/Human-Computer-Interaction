<?php
	session_start();
	if (isset($_POST['st_id']) && $_SESSION['logged_role'] == 'student') {
		require '../../php/connection.php';
		$st_id = $_POST['st_id'];
		$sql = "UPDATE program_student SET is_paid = 1 WHERE student_id='$st_id'";
		// echo $sql;
		$conn->query($sql);
		// echo 
		// "<script>
		// 	alert('Thanh toán thành công');
		// </script>";
		// $_SESSION['student_is_paid'] = 1;
		header('location: '.parse_url($_SERVER['HTTP_REFERER'])['path'].'?m=paid');
	}
?>