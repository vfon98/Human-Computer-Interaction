<?php
	session_start();
	if (isset($_POST['st_id']) && $_SESSION['logged_role'] == 'student') {
		require '../../php/connection.php';
		$st_id = $_POST['st_id'];
		$sql = "UPDATE program_student SET is_paid = 1 WHERE student_id='$st_id'";
		// echo $sql;
		$conn->query($sql);
		echo 
		"<script>
			alert('Thanh toán thành công');
		</script>";
		header('location: '.$_SERVER['HTTP_REFERER']);
	}
?>