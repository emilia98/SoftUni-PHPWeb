USE `php-course`; 

INSERT INTO students
(first_name, last_name, 
student_number, phone_number, 
record_date, last_change,is_active)
VALUES (
'Pesho',
'Peshev',
'123456789012',
'0897123456',
NOW(),
NOW() + 1,
0
); 

INSERT INTO students
(first_name, last_name, 
student_number, phone_number, 
record_date, last_change,is_active)
VALUES (
'Тошо',
'Тошев',
'123456789018',
'0897123654',
NOW(),
NOW() + 1,
0
); 