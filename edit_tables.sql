INSERT INTO `schedule` (`year`, `semester`) VALUES
(2019,1),
(2019,1),
(2019,1),
(2019,1),
(2019,1);


INSERT INTO `creates` (`student_id`, `schedule_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);


INSERT INTO `course` (`title`, `numeric`, `dept_name`, `credits`, `semester`, `year`) VALUES
("Algorithms",4102, "CS", 3, 1, 4),
("Internet Scale Applications",4260, "CS", 3, 2, 4),
("Operating Systems",6456, "CS", 3, 2, 4),
("Computer Architecture",3330, "CS", 3, 2, 3),
("Database Systems",6750, "CS", 3, 1, 4);


INSERT INTO `prerequisite` (`course_id`, `pre_req_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);


INSERT INTO `takes` (`student_id`, `course_id`) VALUES
(1, 2),
(2, 3);

INSERT INTO `minor` (`minor_abbreviation`, `name`) VALUES
('ANTH', 'Anthropology'),
('BME', 'Biomedical Engineering'),
('CME', 'Chemical Engineering'),
('CS', 'Computer Science'),
('MAE', 'Mechanical and Aerospace Engineering');

INSERT INTO `minors_in` (`student_id`, `minor_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);


INSERT INTO `student` ( `computing_id`, `dept_name`, `first_name`, `last_name`) VALUES
('amh4wk', 'CS', 'Ashley', 'Hoang'),
('bt2kg', 'CS', 'Bryan', 'Tran'),
('cc8en', 'CS', 'Corban', 'Cress'),
('jt2f', 'CS', 'Terry', 'Tsai'),
( 'sv3hf', 'CS', 'Ram', 'Vuppaladadiyam');


INSERT INTO `major` (`major_abbreviation`,  `student_id`, `college_id`, `distinguished`) VALUES
("CS", 1, 1, 0),
("CS", 2,  1, 0),
("CS", 3, 1, 0),
("CS", 4, 1, 0),
("CS", 5, 2, 0),
("CS", 5, 1, 0);


INSERT INTO `majors_in` (`student_id`, `major_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);

INSERT INTO belongs_to (major_id, college_id) 
VALUES (1, 1), (2, 2),(3, 3), (4, 4), (5, 5);


INSERT INTO college (college_name) 
VALUES  ("College of Arts and Science"), 
("Mcintire School of Commerce"), 
("School of Engineering and Applied Science"), 
("School of Architecture"), 
("School of Nursing");

--Update statement for when a user changes their schedule
UPDATE schedule SET semester="2" WHERE schedule_id = 1
--Update statement for if a user changes their college
UPDATE major SET college_id = 2 WHERE student_id = 1
--Update statement for if a user wants to change their major
UPDATE student SET dept_name = 'PSYC' WHERE student_id = 1

--Select
select * from student where computing_id = 'amh4wk';

select * from schedule where schedule_id = 1;

select * from prerequisite where course_id = 4;
