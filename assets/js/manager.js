$(document).ready(function() {
	changeActiveClass();
	// CONFIRM BUTTON CLICK
	$('.js-btn-approve').click(function(e) {
		if (!confirm('Xác nhận xóa')) {
			e.preventDefault();
		} 
	});
	$('.js-btn-decline').click(function(e) {
		if (!confirm('Xác nhận xóa')) {
			e.preventDefault();
		} 
	});
	$('.js-btn-del').click(function(e) {
		if (!confirm('Xác nhận xóa')) {
			e.preventDefault();
		} 
	});

	$('#sidebar-wrapper .list-group-item').click(function(event) {
		// event.preventDefault();
		// let sidebarIndex = $('.list-group-item').index(this);
	});
});

function changeActiveClass() {
	let pathname = location.pathname;
	if (pathname == '/views/manager/education_programs.php') {
		$('.list-group-item.active').removeClass('active');
		$('.list-group-item').eq(1).addClass('active');
	}
}