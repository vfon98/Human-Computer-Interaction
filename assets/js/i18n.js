$(function () {
    $('#btn-change-lang-en').click(function() {
        console.log("Language changed");
        $('#js-cur-lang').text('English');
        $('#js-toggle-lang').text('Tiếng Việt');
        changeLangEN();
    });
});

let langEN = {
	// Basic
	home: 'Home',
	update: 'Update',
	close: 'Close',
	delete: 'Delete',
	// Sidebar
	eduMgr: 'Education Manager',
	studentMgr: 'Student Manager',
	studentInfo: 'Student info',
	trainingPro: 'Training programs',
	studyResult: 'Study result',
	payTuition: 'Pay tuition',
	// Account dropdown
	account: 'Account',
	changeInfo: 'Change info',
	logout: 'Logout',
	// Account modal
	accountInfo: 'Account info',
	username: 'Username',
	fullName: 'Full name',
	birthday: 'Birthday',
	address: 'Address',
	newPass: 'New password',
	rePass: 'Retype new password',
	// Unpaid announce
	notice: 'Notice',
	pleasePay: 'Please pay tuition to unlock full features',
	// Placeholder
	placePass: 'Minimum at 4 characters',
	// Student index
	proName: 'Program name',
	regTime: 'Register time',
	tuition: 'Tuition',
	paid: 'Paid',
	unpaid: 'Unpaid',
	currentPro: 'Current program',
	no: 'No.',
	subID: 'ID',
	subName: 'Subject name',
	resTeacher: 'Responsible teacher',
	// Personal program
	duration: 'Duration',
	status: 'Status',
	courseName: 'Program name',
	beginDate: 'Begin date',
	endDate: 'End date',
	option: 'Option',
	regNewPro: 'Register extra program',
	addCourse: 'Add course',
	partiCourses: 'Participated courses',
	reg: 'Register',
	pause: 'Pause',
	registered: 'Registered',
	paused: 'Paused',
	interested: 'Interested',
	times: 'Times',
	mark: 'Mark',
	accum: 'Accumulated',
	noSub: 'There is no subject in the programs'
}

function changeLangEN(lang) {
	console.log("Change language to EN");
	$('[i18n]').each(function(index, elem) {
		let key = $(elem).attr('lang-key');
		$(elem).text(langEN[key]);
	});
}