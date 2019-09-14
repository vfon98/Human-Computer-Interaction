<?php
	// SESSION ALREADY STARTED IN check_role.php
	if ($_SESSION['logged_role'] == 'teacher' && isset($_SESSION['logged_user'])) {
		require_once '../../php/connection.php';
		$username = $_SESSION['logged_user'];
		$sql = "SELECT * FROM teachers WHERE username='$username'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		$_SESSION['teacher_id'] = $row['id'];
	}
?>