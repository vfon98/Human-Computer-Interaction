<?php
	session_start();
	if (isset($_POST) && $_SESSION['logged_role'] == 'teacher') {
		require_once '../connection.php';
		echo '<pre>'; print_r($_POST); echo '</pre>';
		$arr_id = $_POST['st_id'];
		$s_id = $_POST['s_id'];
		$arr_mark = $_POST['mark'];
		$length = count($_POST['st_id']);
		for ($i=0; $i < $length ; $i++) { 
			$sql = "INSERT INTO student_subject (student_id, subject_id, mark) 
					VALUES ('$arr_id[$i]', '$s_id', '$arr_mark[$i]')";
			$conn->query($sql);
		}
		header('location: '.$_SERVER['HTTP_REFERER'].'?s_id='.$s_id);
	}
?>