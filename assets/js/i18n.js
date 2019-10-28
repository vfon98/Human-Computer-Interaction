$(function () {
    let currentLang = getCurrentLang();
    if (currentLang && currentLang === 'en') {
    	changeLangEN();
    }
    $('#btn-change-lang').click(function() {
        console.log("Language changed");
        if (currentLang === 'en') {
        	window.location.reload();
        	setCurrentLang('vi');
        	return;
        }
        changeLangEN();
    });
});

let langEN = {
	// Basic
	home: 'Home',
	none: 'None',
	save: 'Save',
	cancel: 'Cancel',
	update: 'Update',
	close: 'Close',
	change: 'Change',
	delete: 'Delete',
	teacher: 'Teacher',
	password: 'Password',
	existedAcc: 'Existed account !',
	personalInfo: 'Personal infomation',
	studentName: 'Student name',
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
	resSubjects: 'Responsible subjects',
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
	noSub: 'There is no subject in the programs',
	// Admin UI
	sysadmin: 'System Admin',
	accountMgr: 'Accounts managers',
	accType: 'Acc type',
	addAcc: 'Add account',
	accountList: 'Account list',
	teacherName: 'Teacher name',
	changePass: 'Change password',
	// Teacher UI
	teachingMgr: 'Teaching manager',
	subjectGrading: 'Subject grading',
	totals: 'Totals',
	studentList: 'Student list',
	details: 'Details',
	chooseSub: 'Choose subject to grade:',
	pleaseChoose: '-- Please choose one --',
	grade: 'Grade',
	changeMark: 'Change mark',
	retestStu: '* Second test students',
	noStudent: 'There is no student in the subject',
	// Manager UI
	registrars: 'Registrars list',
	programMgr: 'Programs manager',
	subjectMgr: 'Subjects manager',
	graduationMgr: 'Graduation manager',
	selectAll: 'Select all',
	approve: 'Approve',
	decline: 'Decline',
	multiPro: '* Students that registered for multiple programs',
}

function getCurrentLang() {
	return sessionStorage.getItem('currentLang');
}

function setCurrentLang(lang) {
	sessionStorage.setItem('currentLang', lang);
}

function swapOptionText() {
	$('#js-cur-lang').text('English');
    $('#js-toggle-lang').text('Tiếng Việt');
}

function changeLangEN() {
	console.log("Change language to EN");
	swapOptionText();
	$('[i18n]').each(function(index, elem) {
		let key = $(elem).attr('lang-key');
		$(elem).text(langEN[key]);
	});
	$('[i18n-place]').each(function(index, elem) {
		let newPlace = $(elem).attr('i18n-place');
		$(elem).attr('placeholder', newPlace);
	});
	setCurrentLang('en');
}