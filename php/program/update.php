<?php
	session_start();
	if (isset($_POST) && $_SESSION['logged_role'] == 'manager') {
		require_once '../connection.php';
		$p_id = $_POST['p_id'];
		$duration = $_POST['p_duration'].' năm';
		$begin_at = $_POST['p_begin_at'];
		$tuition = $_POST['p_tuition'];
		// print_r($_POST);
		$sql = "UPDATE programs 
				SET duration='$duration', begin_at='$begin_at', tuition='$tuition'
				WHERE id='$p_id'";
		echo $sql;
		$conn->query($sql);
		header('location: '.parse_url($_SERVER['HTTP_REFERER'])['path'].'?m=changed');
	}
?>