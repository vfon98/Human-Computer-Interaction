CREATE TABLE programs (
	id INT AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    duration VARCHAR(50) DEFAULT '4 năm',
    begin_at DATE DEFAULT CURRENT_DATE;
    tuition DECIMAL(12, 0) DEFAULT 0,
    KEY(id)
);

INSERT INTO programs(name, tuition) VALUES 
	('Kỹ sư công nghệ thông tin', 5600000),
    ('Kỹ sư phần cứng', 5500000),
    ('Kỹ sư phần mềm', 5700000),
    ('Kỹ sư an toàn thông tin', 5800000),
    ('Kỹ sư mạng máy tính', 5900000),
    ('Kỹ sư hệ thống thông tin', 6000000),
    ('Lập trình viên Android', 7000000),
    ('Lập trình viên IOS', 7000000),
    ('Lập trình viên Web', 7000000);


CREATE TABLE students (
	id INT AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    birthday DATE,
    email VARCHAR(100),
    address VARCHAR(200),
    status VARCHAR(50),
    program_id INT NOT NULL,
    is_paid BIT DEFAULT FALSE,
    username VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    KEY(id)
);

CREATE TABLE accounts (
	id	INT AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(200),
    role VARCHAR(50) DEFAULT 'student',
    KEY(id)
);

CREATE TABLE teachers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100),
    username VARCHAR(50),
    created_at DATE DEFAULT CURRENT_DATE
);

CREATE TABLE subjects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    sub_id VARCHAR(10) NOT NULL,
    name VARCHAR(100),
    teacher_id INT,
    created_at DATE DEFAULT CURRENT_DATE
);

CREATE TABLE program_subject (
    id INT AUTO_INCREMENT PRIMARY KEY,
    program_id INT,
    subject_id INT
);

CREATE TABLE program_student (
    id INT AUTO_INCREMENT PRIMARY KEY,
    program_id INT NOT NULL,
    student_id INT NOT NULL,
    status VARCHAR(50) DEFAULT 'Có ý thích',
    is_paid BIT DEFAULT 0
);

CREATE TABLE courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    begin_at DATE DEFAULT CURRENT_DATE,
    end_at DATE DEFAULT CURRENT_DATE,
    student_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);