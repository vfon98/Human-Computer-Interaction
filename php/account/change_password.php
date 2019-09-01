<?php
	session_start();
	if (isset($_POST) && $_SESSION['logged_role'] == 'admin') {
		require_once '../connection.php';
		$acc_id = $_POST['acc-id'];
		$new_pass = md5($_POST['new-pass']);
		$sql = "UPDATE accounts SET password='$new_pass' WHERE id='$acc_id'";
		$conn->query($sql);
		echo "Đổi mật khẩu thành công ! <br>";
		echo '<a href="'.$_SERVER['HTTP_REFERER'].'">Trở về</a>';
	}
	else {
		header('location: ../../views/error/unauthorized.php');
	}
?>