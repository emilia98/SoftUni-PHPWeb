USE `php-course`; 

CREATE TABLE `students`(
	id INT NOT NULL AUTO_INCREMENT,
	first_name VARCHAR(50) NOT NULL,
	last_name VARCHAR(50) NOT NULL,
	student_number CHAR(12) NOT NULL,
	phone_number CHAR(10) NOT NULL,
	record_date TIMESTAMP NOT NULL,
	last_change TIMESTAMP NOT NULL,
	is_active BIT NOT NULL,
	PRIMARY KEY (id),
	UNIQUE (student_number),
	UNIQUE (phone_number)
);