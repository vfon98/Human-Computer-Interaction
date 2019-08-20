CREATE TABLE programs (
	id INT AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
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
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    KEY(id)
);

CREATE TABLE accounts (
	id	INT AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(200),
    role VARCHAR(50) DEFAULT 'student',
    KEY(id)
)