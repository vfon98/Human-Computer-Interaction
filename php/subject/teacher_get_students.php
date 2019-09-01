<?php
	require_once '../../php/connection.php';
	if (isset($_GET['id'])) {
		$s_id = $_GET['id'];
		echo $s_id;
	}
?>