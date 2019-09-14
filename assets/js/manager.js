$(document).ready(function() {
	changeActiveClass();
	// CONFIRM BUTTON CLICK
	$('.js-btn-approve').click(function(e) {
		if ($('.selected-id:checkbox:checked').length <= 0) {
			alert('Vui lòng chọn học viên muốn xét duyệt !');
			e.preventDefault();
			return;
		}
		if (!confirm('Đồng ý xét duyệt đơn đăng ký ?')) {
			e.preventDefault();
		} 
	});
	$('.js-btn-decline').click(function(e) {
		if ($('.selected-id:checkbox:checked').length <= 0) {
			alert('Vui lòng chọn học viên muốn loại !');
			e.preventDefault();
			return;
		}
		if (!confirm('Xác nhận loại hồ sơ ?')) {
			e.preventDefault();
		} 
	});
	$('.js-btn-del').click(function(e) {
		if (!confirm('Xác nhận xóa ?')) {
			e.preventDefault();
		} 
	});

});

function changeActiveClass() {
	let pathname = location.pathname;
	if (pathname == '/views/manager/programs_manager.php' || pathname.startsWith('/views/manager/program_detail.php')) {
		$('.list-group-item.active').removeClass('active');
		$('.list-group-item').eq(1).addClass('active');
	}
	if (pathname == '/views/manager/subjects_manager.php') {
		$('.list-group-item.active').removeClass('active');
		$('.list-group-item').eq(2).addClass('active');
	}
	if (pathname == '/views/student/personal_programs.php') {
		$('.list-group-item.active').removeClass('active');
		$('.list-group-item').eq(1).addClass('active');
	}
	if (pathname == '/views/teacher/subject_detail.php') {
		$('.list-group-item.active').removeClass('active');
		$('.list-group-item').eq(1).addClass('active');
	}
}