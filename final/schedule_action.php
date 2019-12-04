<?php
	session_start();
	$con = new mysqli("cs4750.cs.virginia.edu", "amh4wk", "123456", "amh4wk_project");

	//if (isset($_POST['reqs'])) {
		echo("works");
		$value = $_POST['reqs'];
		$computing = $_SESSION['email'];

		
		// Outputs what the user has checked off if any
		$major_result = $con->query("SELECT * FROM `major_requirements` WHERE `requirement`= '".$value." ' ");
		$student_id_query = $con->query("SELECT student_id FROM `student` WHERE computing_id='".$computing."'");
		$result = $con->query("SELECT * FROM `major_check_table` LEFT JOIN `student` ON major_check_table.student_id = student.student_id LEFT JOIN `major_requirements` ON major_check_table.major_requirement_id = major_requirements.major_requirement_id WHERE computing_id = '".$computing."' AND requirement = '".$value."'");



		while ($row = $major_result->fetch_assoc()){
			$major_requirement_id = $row['major_requirement_id'];
		}

		while ($row = $student_id_query->fetch_assoc()){
			$student_id = $row['student_id'];
		}


		if($result->num_rows == 0){
			//check if we need to update school table instead

			$school_result = $con->query("SELECT * FROM `school_requirements` WHERE `requirement`='".$value."'");
			while($row = $school_result->fetch_assoc()){
				$school_requirement_id = $row['school_requirement_id'];
			}

			if ($school_result->num_rows > 0){
				//check if we need to insert into school_check table
				$school_check = $con->query("SELECT * FROM `school_check_table` LEFT JOIN `student` ON school_check_table.student_id = student.student_id LEFT JOIN `school_requirements` ON school_check_table.school_requirement_id = school_requirements.school_requirement_id WHERE computing_id = '".$computing."' AND requirement='".$value."'");
				if($school_check->num_rows>0){
					//update row
					//$result = mysqli_fetch_assoc($check_result);
            		//$checked = $result['checked'];
					$school_checked = mysqli_fetch_assoc($school_check);
					$checked = $school_checked['checked'];

					if($checked == 1){
						$uncheck_query = $con->query("UPDATE `school_check_table` SET `checked`=0 WHERE student_id=".$student_id." AND school_requirement_id=".$school_requirement_id);
					}
					else{
						//update to 1
						$check_query = $con->query("UPDATE `school_check_table` SET `checked`=1 WHERE student_id=".$student_id." AND school_requirement_id=".$school_requirement_id);
					}
				}
				else{
					//insert row with checked = 1
					$insert_school_check = $con->query("INSERT INTO `school_check_table` (`student_id`, `school_requirement_id`, `checked`) VALUES (".$student_id.", ".$school_requirement_id.", 1)");
				}
			}
			// then insert into major_requirements_check table
			else{
				while ($row = $student_id_query->fetch_assoc()){
					$student_id = $row['student_id'];
				}

				$insert_result = $con->query("INSERT INTO `major_check_table` (`student_id`, `major_requirement_id`, `checked`) VALUES (".$student_id.", ".$major_requirement_id.", 1)");
			}
		}
		else{
			// update major_check table with 1 or 0

			while ($row = $result->fetch_assoc()){
				$checked = $row['checked'];

			}

			if($checked == 1){
				//update to 0 --> uncheck the checkbox
				$uncheck_query = $con->query("UPDATE `major_check_table` SET `checked`=0 WHERE student_id=".$student_id." AND major_requirement_id=".$major_requirement_id);
			}
			else{
				//update to 1 --> check the checkbox
				$check_query = $con->query("UPDATE `major_check_table` SET `checked`=1 WHERE student_id=".$student_id." AND major_requirement_id=".$major_requirement_id);
			}
		}
		

	//header('Location: http://192.168.64.2/schedule2_practice.php');



	//}
	// else{
	// 	echo "does not work";
	// 	$check=0;

	// }
?>
<!-- <body>
	<h2>Action.php</h2>
</body> -->
