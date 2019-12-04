<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

	<?php
	
		require "dbutil.php";
		session_start();

		if (isset($_GET['username']) && isset($_GET['password'])){
			$username = $_GET['username'];
			$pass = $_GET['password'];
			
			$db = DbUtil::loginConnection();
			$stmt = $db->stmt_init();
			
			$sql = "select * from student where computing_id = ? AND password = ?";
			
			if($stmt->prepare($sql) or die(mysqli_error($db))) {
				$searchString = '"'. $_GET['username'] . '"';
				$stmt->bind_param("ss", $_GET['username'], $_GET['password']);
				$stmt->execute();
				$stmt->store_result();
				$stmt->bind_result($student_id, $computing_id, $college_name, $dept_name, $first_name, $last_name, $password);

				if ($stmt->num_rows == 0){
					echo "<script type='text/javascript'>alert('Account does not exist or password does not match email, please try again');</script>";
				}
				else{
					while($stmt->fetch()) {
						$_SESSION['email'] = $computing_id;
						$_SESSION['password'] = $password;
						$_SESSION['name'] = $first_name." ".$last_name;
					}
					header('Location: schedule.php');
				}
				
			}
		}

	?>


	<div class="container">
		<div class="d-flex justify-content-center h-100">
			<div class="card">
				<div class="card-header">
					<h3>Sign In</h3>
					<div class="d-flex justify-content-end social_icon">
						<span><i class="fab fa-facebook-square"></i></span>
						<span><i class="fab fa-google-plus-square"></i></span>
						<span><i class="fab fa-twitter-square"></i></span>
					</div>
				</div>
				<div class="card-body">
					<form method="GET">
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="username" class="form-control" placeholder="Computing ID">
							
						</div>

						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="password" class="form-control" placeholder="password">
						</div>

						<div class="row align-items-center remember">
							<input type="checkbox">Remember Me
						</div>
						<div class="form-group">
							<input type="submit" value="Login" class="btn float-right login_btn">
						</div>
					</form>
				</div>
				<div class="card-footer">
					<div class="d-flex justify-content-center links">
						Don't have an account?<a href="https://cs4750.cs.virginia.edu/~amh4wk/project/createpage.php">Sign Up</a>
					</div>
					<!-- <div class="d-flex justify-content-center">
						<a href="#">Forgot your password?</a>
					</div> -->
				</div>
			</div>
		</div>
	</div>
</body>
</html>
