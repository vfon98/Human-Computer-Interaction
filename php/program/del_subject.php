<?php
	session_start();
	if (isset($_GET['p_id']) && isset($_GET['s_id']) && $_SESSION['logged_role'] == 'manager') {
		$p_id = $_GET['p_id'];
		$s_id = $_GET['s_id'];

		require_once '../../php/connection.php';
		$sql = "DELETE FROM program_subject 
			WHERE program_id='$p_id' AND subject_id='$s_id'";
		echo $sql;
		$conn->query($sql);

		header('location: '.$_SERVER['HTTP_REFERER']);
	}
	else {
		header('location: ../../views/error/unauthorized.php');
	}
?>