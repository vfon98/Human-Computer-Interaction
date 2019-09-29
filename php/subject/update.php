<?php
	if (isset($_POST)) {
		echo '<pre>'; print_r($_POST); echo '</pre>';
		require_once '../connection.php';
		$sub_id = $_POST['sub_id'];
		$s_name = $_POST['s_name'];
		$t_id = $_POST['t_id'];
		$sql = "UPDATE subjects SET name='$s_name', teacher_id='$t_id' WHERE sub_id='$sub_id'";
		echo $sql;
		$conn->query($sql);
		header('location: '.parse_url($_SERVER['HTTP_REFERER'])['path'].'?m=changed');
	}
?>