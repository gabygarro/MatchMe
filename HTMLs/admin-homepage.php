<?php
	//include ('login.php');
	include('session.php');
	if (!isset($_SESSION['userID'])) {
		header("Location: http://localhost/MatchMe/HTMLs/index.php#notloggedin");
	}
    if ($_SESSION['userType'] != 1) { //if it's not an admin
        header("Location: http://localhost/MatchMe/HTMLs/index.php#notanadmin");
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
            <li><a href="index.php" >match.me</a></li>
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
    		<div class = "col-md-6">
    			<div class = "modify-catalogs">
    				<div class = "box-header">
    					<h3>Modify catalogs</h3>
    				</div>
    				<div class = "box-body">
    					<ul>
    						<li><a href="admin/catalogs/age-range.php">Age range</a></li>
		    				<li><a href="admin/catalogs/body-type.php">Body type</a></li>
		    				<li><a href="admin/catalogs/city.php">City</a></li>
		    				<li><a href="admin/catalogs/country.php">Country</a></li>
		    				<li><a href="admin/catalogs/exercise-frequency.php">Exercise frequency</a></li>
		    				<li><a href="admin/catalogs/eye-color.php">Eye color</a></li>
		    				<li><a href="admin/catalogs/gender.php">Gender</a></li>
		    				<li><a href="admin/catalogs/hair-color.php">Hair color</a></li>
		    				<li><a href="admin/catalogs/hobbie.php">Hobbie</a></li>
		    				<li><a href="admin/catalogs/interest.php">Interest</a></li>
		    				<li><a href="admin/catalogs/language.php">Language</a></li>
		    				<li><a href="admin/catalogs/relationship-status.php">Relationship Status</a></li>
		    				<li><a href="admin/catalogs/religion.php">Religion</a></li>
		    				<li><a href="admin/catalogs/sexual-orientation.php">Sexual orientation</a></li>
		    				<li><a href="admin/catalogs/skin-color.php">Skin color</a></li>
		    				<li><a href="admin/catalogs/user-type.php">User type</a></li>
		    				<li><a href="admin/catalogs/zodiac-sign.php">Zodiac Sign</a></li>
    					</ul>
    				</div>
    			</div>
    		</div>
    		<div class = "col-md-6">
    			<div class = "statistics">
    				<div class = "box-header">
    					<h3>Statistics</h3>
    				</div>
    				<div class = "box-body">
    					<ul>
    						<li><a href="admin/statistics/registered-users.php">Registered users</a></li>
		    				<li>Persons by...</li>
		    				<ul>
		    					<li><a href="admin/statistics/age-range.php">Age range</a></li>
			    				<li><a href="admin/statistics/country.php">Country</a></li>
			    				<li><a href="admin/statistics/city.php">City</a></li>
			    				<li><a href="admin/statistics/gender.php">Gender</a></li>
			    				<li><a href="admin/statistics/relationship-status.php">Relationship status</a></li>
			    				<li><a href="admin/statistics/hobbie.php">Hobbie</a></li>
			    				<li><a href="admin/statistics/interest.php">Interest</a></li>
		    				</ul>
		    				<li><a href="admin/statistics/found-partner.php">People who a found partner through the network</a></li>
		    				<li><a href="admin/statistics/got-married.php">People who got married through the network</a></li>
		    				<li><a href="admin/statistics/top10-most-winked.php">Top 10 most winked people</a></li>
		    				<li><a href="admin/statistics/most-wanted-age-range.php">Most wanted age range</a></li>
    					</ul>
    				</div>
    			</div>
    			<br>
    			<div class = "create-event">
    				<form action="admin/create-event.php" method="get">
					    <input type="submit" value="Create an event" name="Submit" id="frm1_submit"/>
					</form>
    			</div>
    		</div>
    	</div>
    </div>
    

	
</body>
</html>