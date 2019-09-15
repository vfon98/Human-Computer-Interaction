<?php
	session_start();
	if (isset($_POST['s_id'])) {
		require_once '../connection.php';
		$s_id = $_POST['s_id'];
		$t_id = $_SESSION['teacher_id'];
		$sql = "SELECT st.name as st_name, s.name as s_name, st.birthday, st.email, p.name as p_name
				FROM subjects s JOIN program_subject ps JOIN program_student pst JOIN students st JOIN programs p
				ON s.id=ps.subject_id AND ps.program_id=pst.program_id AND pst.student_id=st.id AND pst.program_id=p.id
				WHERE s.id='$s_id' AND s.teacher_id='$t_id' AND pst.status='Đăng ký'";
		$result = $conn->query($sql);
		if ($result->num_rows <= 0) {
			echo '<script>alert("Không thể xuất file vì không có sinh viên đăng ký !")</script>';
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
	$excel->getActiveSheet()->setTitle('Danh sách lớp');
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
	$excel->getActiveSheet()->setCellValue('B1', 'Họ tên');
	$excel->getActiveSheet()->setCellValue('C1', 'Ngày sinh');
	$excel->getActiveSheet()->setCellValue('D1', 'Email');
	$excel->getActiveSheet()->setCellValue('E1', 'Chương trình');
	// thực hiện thêm dữ liệu vào từng ô bằng vòng lặp
	// dòng bắt đầu = 2
	$numRow = 2;
	$i = 1;
	while ($row = $result->fetch_assoc()) {
		$excel->getActiveSheet()->setCellValue('A'.$numRow, $i++);
		$excel->getActiveSheet()->setCellValue('B'.$numRow, $row['st_name']);
		$excel->getActiveSheet()->setCellValue('C'.$numRow, $row['birthday']);
		$excel->getActiveSheet()->setCellValue('D'.$numRow, $row['email']);
		$excel->getActiveSheet()->setCellValue('E'.$numRow, $row['p_name']);
		$numRow++;
		$s_name = $row['s_name'];
	}
	// Khởi tạo đối tượng PHPExcel_IOFactory để thực hiện ghi file
	// PHPExcel_IOFactory::createWriter($excel, 'Excel2007')->save('data.xlsx');
	header('Content-type: application/vnd.ms-excel');
	header('Content-Disposition: attachment; filename="DSSV_'.$s_name.'_'.time().'.xlsx"');
	PHPExcel_IOFactory::createWriter($excel, 'Excel2007')->save('php://output');
?>