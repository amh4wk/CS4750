<?php
	session_start();

	//change these credentials 
	$con = new mysqli("cs4750.cs.virginia.edu", "amh4wk", "123456", "amh4wk_project");
	$computing= $_SESSION['email'];
	$result = mysqli_query($con, "SELECT requirement, major_requirement_id FROM `major_requirements` LEFT JOIN `major` ON major_requirements.major_id = major.major_id LEFT JOIN `student` ON major.dept_name = student.dept_name WHERE computing_id='".$computing."'");

	//$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$fp = fopen('file.csv', 'w') or die("can't open file");
	fputcsv($fp, array('Requirement', 'Completed'));

	while ($row = $result->fetch_assoc()){
		$check_result = mysqli_query($con, "SELECT * FROM `major_check_table` LEFT JOIN `student` ON major_check_table.student_id = student.student_id WHERE computing_id='".$computing."'");

		$major_requirement_id = $row['major_requirement_id'];
		$array = array();
		$array[0] = $row['requirement'];
		while ($row1 = $check_result->fetch_assoc()){

			if ($major_requirement_id == $row1['major_requirement_id']){
				$array[1]=1;
			}
			else{
				$array[1]=0;
			}
		}

		fputcsv($fp, $array);
	}
	// $fileip = file_get_contents("file.csv");
	// echo $fileip;
	fclose($fp);
	header('Location: https://cs4750.cs.virginia.edu/~amh4wk/project/schedule.php');
	


?>
