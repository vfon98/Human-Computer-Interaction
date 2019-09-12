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
			foreach ($arr_id as $st_id) {
				$sql = "SELECT * FROM program_student WHERE student_id='$st_id' AND status='Đăng ký'";
				$result = $conn->query($sql);
				$is_extra = $result->num_rows >= 1;
				if ($is_extra == true) {
					$sql = "UPDATE program_student SET status='Tạm hoãn' WHERE status='Đăng ký'";
					$conn->query($sql);
					
					$sql = "UPDATE program_student SEt status='Đăng ký' WHERE student_id='$st_id' AND is_extra=1";
					$conn->query($sql);
				}
				else {
					$sql = "UPDATE program_student SET status='Đăng ký'
							WHERE student_id='$st_id'";
					$conn->query($sql);
				}
			}
		}
		// HANDLE DECLINE STUDENTS
		if (isset($_POST['btn-decline'])) {
			foreach ($arr_id as $st_id) {
				$sql = "SELECT * FROM program_student WHERE student_id='$st_id' AND status='Đăng ký'";
				$result = $conn->query($sql);
				$is_extra = $result->num_rows >= 1;
				// DELETE student, account WHEN WAS NOT EXTRA STUDENT
				if ($is_extra == false) {
					$sql = "DELETE FROM accounts WHERE username IN (
								SELECT username FROM students WHERE id='$st_id'
							)";
					$conn-> query($sql);

					$sql = "DELETE FROM students WHERE id='$st_id'";
					$conn->query($sql);
				}
				$sql = "DELETE FROM program_student WHERE student_id='$st_id' AND status='Có ý thích'";
				$conn->query($sql);
			}

		}

		header("location: /views/manager/registrars.php");
	}
	else {
		header('location: /views/error/unauthorized.php');
	}
?>