<?php
	if (isset($_POST)) {
		echo '<pre>'; print_r($_POST); echo '</pre>';
		$arr_id = $_POST['st_id'];
		$arr_mark = $_POST['mark'];
		$length = count($_POST['st_id']);
		for ($i=0; $i < $length ; $i++) { 
			$sql = "INSERT INTO student_subject (student_id, subject_id) 
					VALUES ('$arr_id[$i]', '$arr_mark[$i]')";
			echo "$sql <br>";
		}
	}
?>