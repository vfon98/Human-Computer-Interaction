$(document).ready(function() {
	$('#inp-username').change(function() {
		let username = $(this).val();
		$.post('/php/account/check_username.php', {
			username: username
		}).then(res => {
			if (res === 'existed') {
				$(this).addClass('is-invalid');
				$('#btn-submit').prop('disabled', true);
			}
			else {
				$(this).removeClass('is-invalid');
				$('#btn-submit').prop('disabled', false);
			}
		});
	});

	$('#inp-email').focus(function(event) {
		this.setSelectionRange(0, 7);
	});
});