<?php
	if (isset($_POST) && isset($_POST['submit-btn'])) {
		require_once '../connection.php';
		$name = $_POST['name'];
		$birthday = $_POST['birthday'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$program_id = $_POST['program_id'];
		$username = $_POST['username'];
		$password = md5($_POST['password']);

		// INSERT NEW CANDIDATE
		$sql = "INSERT INTO students (name, birthday, email, address, status, program_id, username)
			VALUES ('$name', '$birthday', '$email', '$address', 'Có ý thích', '$program_id', '$username')";
		$conn->query(htmlspecialchars($sql));
		echo $sql;
		// INSERT CANDIDATE ACCOUNT
		$sql = "INSERT INTO accounts (username, password) VALUES ('$username', '$password')";
		$conn->query(htmlspecialchars($sql));
		// header('location: /');
	}
?>