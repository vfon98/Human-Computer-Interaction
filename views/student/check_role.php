<?php
	session_start();
	if (isset($_SESSION['logged_user']) && $_SESSION['logged_role'] == 'student') {
		$logged_user = $_SESSION['logged_user'];
		$logged_role = $_SESSION['logged_role'];
	}
	else {
		echo "<h2>Bạn không thể truy cập vào trang này</h2>";
		echo "<a href='/'>Home</a>";
		exit;
	}
?>