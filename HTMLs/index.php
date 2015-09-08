<!DOCTYPE html>
<html>
	<head>
		<title>Prueba de ingreso de usuarios a BD</title>
		<link rel="shortcut icon" href= "imgs/logo (1).png">

	    <link href="http://s3.amazonaws.com/codecademy-content/courses/ltp/css/shift.css" rel="stylesheet">
	    <link href='http://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>
	    <link rel="stylesheet" href="utils/bootstrap.css">
	    <link rel="stylesheet" href="utils/bootstrap.min.css">

	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">

	    <!-- CSS -->
	    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
	    <link rel="stylesheet" href="assets/css/form-elements.css">
	    <link rel="stylesheet" href="assets/css/style.css">
	    
	    <link rel="stylesheet" href="utils/bootstrap-theme.min.css">
	    <script src="utils/jquery-1.11.1.min.js"></script>
	    <script src="utils/bootstrap.min.js"></script>
	    <link rel="stylesheet" type="css" href="utils/main.css"/>
	</head>

	<body>
		<form action = "register.php" method = "POST">
			<div class = "container">
				<div class = "row">
					<div class = "col-md-4"></div>
					<div class = "col-md-4">
						<div class="form-group">
			                <label>Username</label>
			                <input type="text" name="user" placeholder="Username..." class="form-first-name form-control" id="form-first-name">
			            </div>
						<div class = "form-group">
			                <label for="exampleInputPassword1">Password</label>
			                <input type="password" name = "password" class="form-first-name form-control" id="exampleInputPassword1" placeholder="Password...">
			            </div>
						<input type = "submit" value = "Send">
						<br>
						<h3><a href = "consult.php">Check registered users</a></h3>
					</div>
					<div class = "col-md-4"></div>
				</div>
			</div>
		</form>
	</body>
</html>