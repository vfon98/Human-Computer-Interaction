$(document).ready(function() {
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
});