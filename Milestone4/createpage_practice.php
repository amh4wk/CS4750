<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>Create Page</title>
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<?php
	require "dbutil_practice.php";
	session_start();
	// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 //    	echo "here1";
 //    	echo($_POST['cname']);
	// }

	if (isset($_POST['cname']) && isset($_POST['cpass'])) {
        $username = $_POST['cname'];
        $school = $_POST['college'];
        $major = $_POST['major'];
        $first_name = $_POST['fname'];
        $last_name = $_POST['lname'];
        $password = $_POST['cpass'];


   		$con = new mysqli("192.168.64.2", "amh4wk", "123456", "amh4wk_project");
  //  		$db = DbUtil::loginConnection();
		// $stmt = $db->stmt_init();
		$query = "INSERT INTO student (computing_id, college_name, dept_name, first_name, last_name, password) VALUES('$username', '$school', '$major', '$first_name', '$last_name', '$password')";
		mysqli_query($con,$query);


    }
?>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Create Account</h3>
				<div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div>
			</div>
			<div class="card-body">
				<form method="POST">
					<!-- USERNAME -->
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" name = "cname" id="cname" class="form-control" placeholder="username">
						<div class="input-group-prepend" style="margin-left: 7px;">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" name="cpass" id="cpass" class="form-control" placeholder="password">
						
					</div>
					<!-- PASSWORD -->
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" name="fname" id="fname" class="form-control" placeholder="First name">

						<div class="input-group-prepend" style="margin-left: 7px;">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" name="lname" id="lname" class="form-control" placeholder="Last name">
					</div>
					<!-- School -->
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input list="college" name="college" class="form-control" placeholder="Choose School">
						<datalist id="college">
							<option value= "CLAS">
							<option value = "SEAS">
							<option value = "COMM">
						</datalist>
					</div>
					<!-- Major -->
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input list="major" name="major" class="form-control" placeholder="Major">
						<datalist id="major">
							<option value = "CS">
						</datalist>
					</div>

					<div class="form-group">
						<input type="submit" name="create" id="button" value="Create" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			
		</div>
	</div>
</div>
</body>
</html>
