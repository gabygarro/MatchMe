<?php
    //user homepage
	//include ('login.php');
	include('session.php');
	if(!isset($_SESSION['usernameID'])) {
		header("Location: http://localhost/MatchMe/HTMLs/index.php#notloggedin");
	}
    if ($_SESSION['userType'] != 2) { //if it's not a normal user
        header("Location: http://localhost/MatchMe/HTMLs/index.php#notnormaluser");
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Your Home Page</title>
	<link rel="shortcut icon" href= "imgs/logo (1).png">
    <title>Admin Homepage</title>

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

	<div class="nav">
      <div class="container">
        <ul class = "pull-left">
            <img src = "imgs/logopeq.png">
            <li><a href="homepage.html" >match.me</a></li>
        </ul>
        <ul class = "pull-right">
          <li><a href="#">Profile</a></li>
          <li><a href="#">Messages</a></li>
          <li><a href="#">Notifications</a></li>
          <li><a href="#">Settings</a></li>
          <li><a href="logout.php">Log out</a></li>
        </ul>
      </div>
    </div>

    <div class = "container">
    	<br>
    	<div class = "row">
    		<div class = "col-md-3">
    			<div class = "profile-overview">
                    <h3><a href = "profile.php">
                        <?php
                            echo $_SESSION['firstName'];
                        ?>
                    </a></h3>
    				
    			</div>
                <form action="edit-profile.php" method="get">
                    <input type="submit" value="Edit profile" name="Submit" id="frm1_submit"/>
                </form>
    		</div>

    		<div class = "col-md-6">
    			<div class = "statistics">
    				<div class = "box-header">
    					
    				</div>
    				<div class = "box-body">
    					
    				</div>
    			</div>
    			<br>
    			<div class = "create-event">

    			</div>
    		</div>

            <div class = "col-md-3">
                <div class = "wink">
                    <div class = "box-header">
                        <h3>Wink</h3>
                    </div>
                    <div class = "box-body">
                        <ul>
                            <li><a href="user/people-ive-winked.php">People I've winked</a></li>
                            <li><a href="user/my-winks.php">People who have winked at me</a></li>
                        </ul>
                    </div>
                </div>
            </div>

    	</div>
    </div>
    

	
</body>
</html>