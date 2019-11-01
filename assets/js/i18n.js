$(function () {
    let currentLang = getCurrentLang();
    if (currentLang && currentLang === 'en') {
        changeLangEN();
    }
    $('#btn-change-lang').click(function() {
        currentLang = getCurrentLang();
        console.log("Language changed");
        if (currentLang === 'en') {
            setCurrentLang('vi');
            window.location.reload();
            return;
        }
        changeLangEN();
    });
});

let langEN = {
    // Basic
    home: 'Home',
    none: 'None',
    gradeNow: 'Grade now',
    save: 'Save',
    back: 'Back',
    years: 'Years',
    cancel: 'Cancel',
    update: 'Update',
    close: 'Close',
    change: 'Change',
    homepage: 'Homepage',
    print: 'Print diploma',
    manage: 'Manage',
    delete: 'Delete',
    program: 'Program',
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
    accType: 'Acc type:',
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
    proControl: 'Programs under controlling',
    addPro: 'Add new program',
    addSub: 'Add new subject',
    subList: 'Subjects list',
    chooseTeacher: '-- Choose one teacher --',
    avgMark: 'Avg',
    grade: 'Grade',
    excellent: 'Excellent',
    veryGood: 'Very Good',
    good: 'Good',
    average: 'Average',
    graduationStu: 'Students that could be graduated',
    addNewSub: 'Add new subject',
    addSubToPro: 'Add subject to program',
    updatePro: 'Update program information',
    updateSub: 'Update subject information',
    requestGraduation: 'Graduation request',
    // User pages
    login: 'Log in',
    noRegistered: 'Do not registered ?',
    regNow: 'Register now !',
    backHome: 'Back to Homepage',
    contact: 'Contact',
    register: 'Register',
    proList: 'Programs list',
    choosePro: 'Choose program',
    generalInfo: 'General information',
    pleaseChoosePro: '--- Please choose one---',
    loginInfo: 'Login information',
    feedbackDate: 'Your birthday can not bigger than current date',
    // Index page
    homeBanner: 'Programmer training center - PTST',
    carTitle1: 'Quality',
    carDetail1: 'Is our working purpose !',
    carTitle2: 'Knowledge',
    carDetail2: 'Is what we would bring to you !',
    carTitle3: 'Success',
    carDetail3: 'Is what you would definately obtain !',
    phpTitle: 'PHP Programmer',
    phpDetail: 'Server-side programming language of majority servers all over the world!',
    nodeTitle: 'NodeJs Programmer',
    nodeDetail: 'A robust and powerful language suitable for high interactive web apps',
    pyTitle: 'Python Programmer',
    pyDetail: 'A comprehensive language for Big data, Machine learning, Deep learning and AI',
    frontTitle: 'Frontend Programmer',
    frontDetail: 'Be able to create interactive interfaces and design UX/UI for users',
    androidTitle: 'Android Programmer',
    androidDetail: 'Creating apps, games for Android - The most popular OS currently',
    reactTitle: 'ReactJs Programmer',
    reactDetail: 'A Frontend Framework created to boost up productivity and effectiveness',
    centerAddress: 'Nink Kieu District, Can Tho',
    // Diploma template
    nationalBrand: 'SOCIALIST REPUBLIC OF VIETNAM',
    hasConferred: 'has conferred',
    centerName: 'PTST TRAINING CENTER',
    diploma: 'GRADUATION DIPLOMA',
    upon: 'Upon:',
    DOB: 'Date of birth:',
    yearOfGradution: 'Year of graduation:',
    degreeClass: 'Classification:',
    modeOfStudy: 'Mode of study:',
    fulltime: 'Full-time',
    gpa: 'GPA:',
    cantho: 'Can Tho',
    dNone: '',
    // DATA TABLE i18n
    dtEntries: 'entries',
    dtRowPerPage: 'Showing',
    dtSearch: 'Search:',
    dtNotFound: 'No matching record found !',
    dtShowing: 'Showing',
    of: 'of',
    dtProcessing: 'Processing...',
    dtFilteredFrom: 'Filtered from',
    dtFirst: 'First',
    dtLast: 'Last',
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
