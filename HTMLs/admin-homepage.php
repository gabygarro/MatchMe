<?php
	//include ('login.php');
	include('session.php');
	if (!isset($_SESSION['usernameID'])) {
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
                            <form id="ageRangeCatalog" action = "modify-catalog.php" method = "POST">
                                <input type="hidden" name="catalog" value="ageRange"/>
                                <li><a href="#" onclick = "document.getElementById('ageRangeCatalog').submit();">Age range</a></li> 
                            </form>
    						<form id="bodyTypeCatalog" action = "modify-catalog.php" method = "POST">
                                <input type="hidden" name="catalog" value="bodyType"/>
                                <li><a href="#" onclick = "document.getElementById('bodyTypeCatalog').submit();">Body type</a></li>
                            </form>
		    				<form id="cityCatalog" action = "modify-catalog.php" method = "POST">
                                <input type="hidden" name="catalog" value="city"/>
                                <li><a href="#" onclick = "document.getElementById('cityCatalog').submit();">City</a></li>
                            </form>
		    				<form id="countryCatalog" action = "modify-catalog.php" method = "POST">
                                <input type="hidden" name="catalog" value="country"/>
                                <li><a href="#" onclick = "document.getElementById('countryCatalog').submit();">Country</a></li>
                            </form>
		    				<form id="exerciseFrequencyCatalog" action = "modify-catalog.php" method = "POST">
                                <input type="hidden" name="catalog" value="exerciseFrequency"/>
                                <li><a href="#" onclick = "document.getElementById('exerciseFrequencyCatalog').submit();">Exercise frequency</a></li>
                            </form>
		    				<form id="eyeColorCatalog" action = "modify-catalog.php" method = "POST">
                                <input type="hidden" name="catalog" value="eyeColor"/>
                                <li><a href="#" onclick = "document.getElementById('eyeColorCatalog').submit();">Eye color</a></li>
                            </form>
		    				<form id="genderCatalog" action = "modify-catalog.php" method = "POST">
                                <input type="hidden" name="catalog" value="gender"/>
                                <li><a href="#" onclick = "document.getElementById('genderCatalog').submit();">Gender</a></li>
                            </form>
		    				<form id="hairColorCatalog" action = "modify-catalog.php" method = "POST">
                                <input type="hidden" name="catalog" value="hairColor"/>
                                <li><a href="#" onclick = "document.getElementById('hairColorCatalog').submit();">Hair color</a></li>
                            </form>
		    				<form id="hobbieCatalog" action = "modify-catalog.php" method = "POST">
                                <input type="hidden" name="catalog" value="hobbie"/>
                                <li><a href="#" onclick = "document.getElementById('hobbieCatalog').submit();">Hobbie</a></li>
                            </form>
		    				<form id="interestCatalog" action = "modify-catalog.php" method = "POST">
                                <input type="hidden" name="catalog" value="interest"/>
                                <li><a href="#" onclick = "document.getElementById('interestCatalog').submit();">Interest</a></li>
                            </form>
		    				<form id="languageCatalog" action = "modify-catalog.php" method = "POST">
                                <input type="hidden" name="catalog" value="language"/>
                                <li><a href="#" onclick = "document.getElementById('languageCatalog').submit();">Language</a></li>
                            </form>
		    				<form id="relationshipStatusCatalog" action = "modify-catalog.php" method = "POST">
                                <input type="hidden" name="catalog" value="relationshipStatus"/>
                                <li><a href="#" onclick = "document.getElementById('relationshipStatusCatalog').submit();">Relationship Status</a></li>
                            </form>
		    				<form id="religionCatalog" action = "modify-catalog.php" method = "POST">
                                <input type="hidden" name="catalog" value="religion"/>
                                <li><a href="#" onclick = "document.getElementById('religionCatalog').submit();">Religion</a></li>
                            </form>
		    				<form id="sexualOrientationCatalog" action = "modify-catalog.php" method = "POST">
                                <input type="hidden" name="catalog" value="sexualOrientation"/>
                                <li><a href="#" onclick = "document.getElementById('sexualOrientationCatalog').submit();">Sexual orientation</a></li>
                            </form>
		    				<form id="skinColorCatalog" action = "modify-catalog.php" method = "POST">
                                <input type="hidden" name="catalog" value="skinColor"/>
                                <li><a href="#" onclick = "document.getElementById('skinColorCatalog').submit();">Skin color</a></li>
                            </form>
		    				<form id="zodiacSignCatalog" action = "modify-catalog.php" method = "POST">
                                <input type="hidden" name="catalog" value="zodiacSign"/>
                                <li><a href="#" onclick = "document.getElementById('zodiacSignCatalog').submit();">Zodiac Sign</a></li>
                            </form>
    					</ul>
    				</div>
    			</div>
    		</div>
    		<div class = "col-md-6">
                <div class = "create-event">
                    <form action="admin/create-event.php" method="get">
                        <input type="submit" value="Create an event" name="Submit" id="frm1_submit"/>
                    </form>
                </div><br>
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
    		</div>
    	</div>
    </div>
    

	
</body>
</html>