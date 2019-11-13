CREATE TABLE `schedule` (
`schedule_id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
`year` int(4) NOT NULL,
`semester` INT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `creates` (
`student_id` INT  NOT NULL,
`schedule_id` INT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE `in_schedule` (
`schedule_id` INT NOT NULL,
`course_id` INT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE `course` (
`course_id` INT AUTO_INCREMENT PRIMARY KEY NOT NULL , 
`title` VARCHAR(100) NOT NULL, 
`numeric` INT NOT NULL, 
`dept_name` VARCHAR(10), 
`credits` INT NOT NULL, 
`semester` INT NOT NULL,
`year` INT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE `prerequisite` (
`course_id` INT NOT NULL, 
`pre_req_id` INT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `takes` (
`student_id` INT NOT NULL, 
`course_id` INT NOT NULL,
PRIMARY KEY (`student_id`,`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE `minor` (
`minor_id` INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
`minor_abbreviation` varchar(50) NOT NULL, 
`name` varchar(50) NOT NULL ) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE `minors_in` (
`student_id` INT NOT NULL,
`minor_id` INT NOT NULL,
PRIMARY KEY (`student_id`,`minor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `student` (
`student_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY , 
`computing_id` VARCHAR(6) NOT NULL,
 	`dept_name` varchar(50) NOT NULL,
`first_name` varchar(30) NOT NULL,
`last_name` varchar(30) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE `major`  (
	`major_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
`major_abbreviation` VARCHAR(10) NOT NULL, 
`student_id` INT NOT NULL,
`college_id` INT NOT NULL, 
`distinguished` BOOLEAN NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE `majors_in` (
`student_id` INT NOT NULL,
`major_id` INT NOT NULL,
PRIMARY KEY (`student_id`,`major_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE `belongs_to` (
`major_id` INT NOT NULL, 
`college_id` INT NOT NULL,
PRIMARY KEY (`major_id`,`college_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `college`(
`college_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
`college_name` VARCHAR(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






-- Constraints for table `in_schedule`
--
ALTER TABLE `in_schedule`
ADD CONSTRAINT `in_schedule_fk_1` FOREIGN KEY (`schedule_id`) REFERENCES `schedule` (`schedule_id`) ON DELETE CASCADE;

-- Constraints for table `prerequisite`
--
ALTER TABLE `prerequisite`
ADD CONSTRAINT `prerequisite_fk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE,
ADD CONSTRAINT `prerequisite_fk_2` FOREIGN KEY (`pre_req_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE;

-- Constraints for table `takes`
--
ALTER TABLE `takes`
ADD CONSTRAINT `takes_fk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE,
ADD CONSTRAINT `takes_fk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE;


