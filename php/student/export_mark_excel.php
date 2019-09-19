<?php
	session_start();
	if (isset($_POST['avg_mark'])) {
		require_once '../connection.php';
		$st_id = $_SESSION['student_id'];
		$sql = "SELECT sub_id, s.name as s_name, t.name as t_name, mark, st.name as st_name
			FROM students st JOIN program_student pst ON st.id=pst.student_id
			JOIN program_subject ps ON ps.program_id=pst.program_id
			JOIN subjects s ON s.id=ps.subject_id
			JOIN teachers t ON t.id=s.teacher_id
			LEFT JOIN student_subject ss ON ss.subject_id=s.id AND ss.student_id=st.id
			WHERE st.id='$st_id'";
		$result = $conn->query($sql);
		if ($result->num_rows <= 0) {
			echo '<script>alert("Không thể xuất file vì chưa có điểm !")</script>';
			exit;
		}
	}
	else {
		header('location: ../../views/error/unauthorized.php');
		exit;
	}
	require '../../assets/lib/PHPExcel/IOFactory.php';

	$excel = new PHPExcel();
	$excel->setActiveSheetIndex(0);
	$excel->getActiveSheet()->setTitle('Bảng điểm');
	$excel->getActiveSheet()->getStyle('A1:E100')->getFont()->setSize(13);
	$excel->getActiveSheet()->getStyle('A1:E100')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);;

	$excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
	$excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
	$excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
	$excel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
	$excel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
	//Xét in đậm cho khoảng cột
	$excel->getActiveSheet()->getStyle('A1:E1')->getFont()->setBold(true);

	$excel->getActiveSheet()->setCellValue('A1', 'STT');
	$excel->getActiveSheet()->setCellValue('B1', 'Mã môn');
	$excel->getActiveSheet()->setCellValue('C1', 'Tên môn học');
	$excel->getActiveSheet()->setCellValue('D1', 'GV phụ trách');
	$excel->getActiveSheet()->setCellValue('E1', 'Điểm');
	// thực hiện thêm dữ liệu vào từng ô bằng vòng lặp
	// dòng bắt đầu = 2
	$numRow = 2;
	$i = 1;
	while ($row = $result->fetch_assoc()) {
		$excel->getActiveSheet()->setCellValue('A'.$numRow, $i++);
		$excel->getActiveSheet()->setCellValue('B'.$numRow, $row['sub_id']);
		$excel->getActiveSheet()->setCellValue('C'.$numRow, $row['s_name']);
		$excel->getActiveSheet()->setCellValue('D'.$numRow, $row['t_name']);
		$excel->getActiveSheet()->setCellValue('E'.$numRow, ($row['mark'] === NULL ? 'Chưa có' : $row['mark']));
		$numRow++;
		$st_name = $row['st_name'];
	}
	// Khởi tạo đối tượng PHPExcel_IOFactory để thực hiện ghi file
	// PHPExcel_IOFactory::createWriter($excel, 'Excel2007')->save('data.xlsx');
	header('Content-type: application/vnd.ms-excel');
	header('Content-Disposition: attachment; filename="KQHT_'.$st_name.'_'.time().'.xlsx"');
	PHPExcel_IOFactory::createWriter($excel, 'Excel2007')->save('php://output');
?>