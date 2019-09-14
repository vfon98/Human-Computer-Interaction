<?php
	if (isset($_POST['username'])) {
		require_once '../connection.php';
		$username = $_POST['username'];
		$sql = "SELECT id FROM accounts WHERE username='$username'";
		$result = $conn->query($sql);
		if ($result->num_rows == 1) {
			echo "existed";
		}
		else {
			echo "ok";
		}
	}
?>