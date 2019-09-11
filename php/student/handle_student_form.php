<?php
	session_start();
	if (isset($_POST['selected-id']) && $_SESSION['logged_role'] == 'manager') {
		require_once '../../php/connection.php';
		$arr_id = $_POST['selected-id'];
		$str_id = "";
		foreach ($arr_id as $id) {
			if ($id != end($arr_id)) {
				$str_id .= $id.", ";
			}
			else {
				$str_id .= $id;
			}
		}
		// HANDLE APPROVE STUDENTS
		if (isset($_POST['btn-approve'])) {
			$sql = "UPDATE program_student SET status='Đăng ký'
					WHERE student_id IN ($str_id)";
			$conn->query($sql);
		}
		// HANDLE DECLINE STUDENTS
		if (isset($_POST['btn-decline'])) {
			// DELETE FROM students AND accounts AND program_student
			$sql = "DELETE FROM accounts WHERE username IN (
						SELECT username FROM students WHERE id IN ($str_id)
					)";
			$conn-> query($sql);

			$sql = "DELETE FROM students WHERE id IN ($str_id)";
			$conn->query($sql);

			$sql = "DELETE FROM program_student WHERE student_id IN ($str_id)";
			$conn->query($sql);
		}

		header("location: /views/manager/registrars.php");
	}
	else {
		header('location: /views/error/unauthorized.php');
	}
?>