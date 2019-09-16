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
			$sql = "UPDATE student_subject
				SET mark='$arr_mark[$i]'
				WHERE student_id='$arr_id[$i]' AND subject_id='$s_id';";
			// echo $sql.'<br>';
			$conn->query($sql);
		}
		header('location: '.$_SERVER['HTTP_REFERER']);
	}
?>