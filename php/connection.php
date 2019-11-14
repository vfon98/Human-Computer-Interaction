<?php
	// $host = 'localhost';
	// $username = 'id11207168_root';
	// $pass = '123456';
	// $db = 'id11207168_education_program';

	$host = 'localhost';
	$username = 'root';
	$pass = '';
	$db = 'education_program';

	$conn = new mysqli($host, $username, $pass, $db);
	if ($conn->connect_error) {
		die('Connection failed');
	}
	$conn->set_charset('utf8');
?>
