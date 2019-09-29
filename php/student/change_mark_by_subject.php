<?php
	session_start();
	if (isset($_POST) && $_SESSION['logged_role'] == 'teacher') {
		require_once '../connection.php';
		// echo '<pre>'; print_r($_POST); echo '</pre>';
		$arr_id = $_POST['st_id'];
		$s_id = $_POST['s_id'];
		$arr_mark = $_POST['mark'];
		$length = count($_POST['st_id']);
		for ($i=0; $i < $length ; $i++) { 
			if ($arr_mark[$i]  != '') {
				$sql = "INSERT INTO student_subject (student_id, subject_id, mark)
						VALUES ($arr_id[$i], $s_id, $arr_mark[$i]) ON DUPLICATE KEY 
						UPDATE mark=IF(count >= 2 AND $arr_mark[$i] >= 5.5, 5.5, $arr_mark[$i])";
				// echo $sql.'<br>';
				$conn->query($sql);
			}
		}
		header('location: '.parse_url($_SERVER['HTTP_REFERER'])['path'].'?m=changed&s_id='.$s_id);
	}
?>