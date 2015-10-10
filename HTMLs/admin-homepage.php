<?php
	/* Proyecto I Bases de Datos - Prof. Adriana Álvarez
     * match.me - Oracle
     * Alexis Arguedas, Gabriela Garro, Yanil Gómez
     * -------------------------------------------------
     * admin-homepage.php - Created: 19/09/2015
     * An admin's control page. It can modify catalogs and see statistics from this page.
     */
	include('session.php');
	if (!isset($_SESSION['usernameID'])) {
		header("Location: http://localhost/MatchMe/HTMLs/index.php#notloggedin");
	}
    if ($_SESSION['userType'] != 1) { //if it's not an admin
        header("Location: http://localhost/MatchMe/HTMLs/index.php#notanadmin");
    }
    //check if an event was created
    if (isset($_POST['create-event'])) {
        //convert the bday to its db format. HTML format is yyyy-mm-dd
        $eventDate = $_POST['date'];
        $date = preg_split('/[- :]/',$eventDate);
        $eventDate = $date[2] . "/" . $date[1] . "/" . $date[0];
        //convert the city's name to its ID and store it
        $cityID; //this will store the city ID
        $query = 'BEGIN getCatalog.cityID(:cityName, :cityID); END;';
        $compiled = oci_parse($connection, $query);
        oci_bind_by_name($compiled, ':cityname', $_POST['state'], 50);
        oci_bind_by_name($compiled, ':cityID', $cityID, 4);
        oci_execute($compiled, OCI_NO_AUTO_COMMIT);
        oci_commit($connection);
        //create the event
        $query = 'BEGIN inserts.Event(:eventName, :eventDate, :city, :description, :location); END;';
        $compiled = oci_parse($connection, $query);
        oci_bind_by_name($compiled, ':eventName', $_POST['title'], 30);
        oci_bind_by_name($compiled, ':eventDate', $eventDate, 50);
        oci_bind_by_name($compiled, ':city', $cityID, 30);
        oci_bind_by_name($compiled, ':description', $_POST['description'], 300);
        oci_bind_by_name($compiled, ':location', $_POST['location'], 300);
        oci_execute($compiled, OCI_NO_AUTO_COMMIT);
        oci_commit($connection);
        echo "Event created!\n";
        //sort the email contents
        $message = wordwrap("An event was created in your city!\nEvent name: " . $_POST['title'] . 
            "\nDescription: " . $_POST['description'] . "\nLocation detail: " . $_POST['location'] .
            ", " . $_POST['state'] . "\nDate: " . $eventDate, 70, "\r\n");
        $headers = "From: matchmebases1@gmail.com\r\n" . "Reply-To: matchmebases1@gmai.com\r\n"
        . "MIME-Version: 1.0 \r\n" . "Content-type: text/html; charset=iso-8859-1\r\n" . "X-Mailer: PHP/"
        . phpversion();
        //send the emails
        $cursor = oci_new_cursor($connection);
        $query = 'BEGIN find.emailsbycity(:city, :cursor); END;';
        $compiled = oci_parse($connection, $query);
        oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
        oci_bind_by_name($compiled, ':city', $cityID, 30);
        oci_execute($compiled);
        oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
        while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
            if (mail($row['EMAIL'], 'MatchMe: New event in your city', $message, $headers)) {
                echo "Emails sent!";
            }
            else {
                echo "Email delivery failed.";
            }
        }
        oci_free_statement($compiled);
        oci_free_statement($cursor);
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
    <script>
        //create countries array
        <?php 
            $countryArray = array();
            $string = "";           // string that goes on to be echoed to declare the countries array
            $cursor = oci_new_cursor($connection);
            $query = 'BEGIN getCatalog.country(:cursor); END;';
            $compiled = oci_parse($connection, $query);
            oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
            oci_execute($compiled);
            oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
            $count = 1;
            //output the code to $string and save the country name to our own array
            while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                $string = $string . "\"" .  $row['TYPENAME'] . "\", ";
                $countryArray[$count] = $row['TYPENAME'];
                $count++;
            }
            oci_free_statement($compiled);
            oci_free_statement($cursor);
            //remove the last comma
            $string = substr($string, 0, -2);
            echo "var countryArray = new Array(" . $string . ");";
        ?>
        var citiesArray = new Array();
        citiesArray[0] = "";
        <?php
            //start assigning cities to countries
            for ($i = 1; $i <= count($countryArray); $i++) {
                $countryName = $countryArray[$i];
                $string = "";
                $cursor = oci_new_cursor($connection);
                $query = 'BEGIN getCatalog.city(:countryName, :cursor); END;';
                $compiled = oci_parse($connection, $query);
                oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
                oci_bind_by_name($compiled, ':countryName', $countryName, 50);
                oci_execute($compiled);
                oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
   
                while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                    $string = $string . $row['TYPENAME'] . "|";
                }
                oci_free_statement($compiled);
                oci_free_statement($cursor);
                $string = substr($string, 0, -1);
                echo "citiesArray[" . $i . "] = \"" . $string . "\";\n";
            }
        ?>

        function populateStates( countryElementId, stateElementId ) {
            var selectedCountryIndex = document.getElementById( countryElementId ).selectedIndex;
            var stateElement = document.getElementById( stateElementId );
            stateElement.length=0;  // Fixed by Julian Woods
            stateElement.options[0] = new Option('Select State','');
            stateElement.selectedIndex = 0;
            
            var state_arr = citiesArray[selectedCountryIndex].split("|");
            
            for (var i=0; i<state_arr.length; i++) {
                stateElement.options[stateElement.length] = new Option(state_arr[i],state_arr[i]);
            }
        }

        function populateCountries(countryElementId, stateElementId){
            // given the id of the <select> tag as function argument, it inserts <option> tags
            var countryElement = document.getElementById(countryElementId);
            countryElement.length = 0;
            countryElement.options[0] = new Option('Select Country','-1');
            countryElement.selectedIndex = 0;
            for (var i = 0; i < countryArray.length; i++) {
                countryElement.options[countryElement.length] = new Option(countryArray[i],countryArray[i]);
            }

            // Assigned all countries. Now assign event listener for the states.

            if( stateElementId ){
                countryElement.onchange = function(){
                    populateStates(countryElementId, stateElementId );
                };
            }
        }
    </script>
</head>
<body>
    <!-- create event modal-->
    <div class="modal fade" id="createEvent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <h4 class="modal-title" id="myModalLabel">Create event</h4>
            </div>
            <div class="modal-body">
               <form role="form" action="admin-homepage.php" method="POST" class="registration-form">
                  <div class="form-group">
                     <label>Event title</label>
                     <input type="text" name="title" placeholder="" class="form-email form-control" id="form-email">
                  </div>
                  <div class = "form-group">
                     <label>Location</label>
                     <input type="text" name = "location" class="form-control" id="exampleInputPassword1" placeholder="">
                  </div>
                  <div class = "form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Country</label>
                            <select id="country" name ="country"></select>
                        </div>
                        <div class="col-md-6">
                            <label>City</label>
                            <select name ="state" id ="state"></select>
                            <script>
                                populateCountries("country", "state");
                            </script>
                        </div>
                    </div>
                  </div>
                  <div class="form-group">
                      <label>Date</label>
                      <input type="date" name="date">
                  </div>
                  <div class="form-group">
                      <label>Description</label>
                      <input type="text" name="description">
                  </div>
                  <div class="modal-footer">
                     <div class = "container">
                        <div class ="row">
                           <div class = "col-md-2">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                           </div>
                           <div class = "col-md-2">
                              <input name="create-event" type = "submit" value = "Create event">
                           </div>
                        </div>
                     </div>                   
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>

    <!-- registered users modal-->
    <div class="modal fade" id="registeredUsers" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <h4 class="modal-title" id="myModalLabel">All registered users</h4>
            </div>
            <div class="modal-body"><?php
                $blank = "";
                $cursor = oci_new_cursor($connection);
                $query = 'BEGIN find.findName(:searchName,:cursor); END;';
                $compiled = oci_parse($connection, $query);
                oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
                oci_bind_by_name($compiled, ':searchName', $blank, 50);
                oci_execute($compiled);
                oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
                $count = 0;
                while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                    $query = 'BEGIN getPicture(:usernameID, :fileLocation); END;';
                    $compiled = oci_parse($connection, $query);
                    oci_bind_by_name($compiled, ':usernameID', $row['UNID'], 5);
                    oci_bind_by_name($compiled, ':fileLocation', $picture, 200);
                    oci_execute($compiled, OCI_NO_AUTO_COMMIT);
                    oci_commit($connection);
                    echo "<div class = \"row\">";
                    echo "<div class = \"col-md-3\">";
                    echo "<div class = \"thumbnail-container\"><div class = \"thumbnail\"><img src =" . $picture . "></div></div>";
                    echo "</div>";
                    echo "<div class = \"col-md-9\">";
                    echo "<h3><b>" . $row['FNAME'] . " " . $row['LNAME'] . " " . $row['LNAME2'] . "</b>, " . $row['AGE'] . "</h3>";
                    echo "<p>" . $row['TAG'] . "</p>";
                    echo "<p>Lives in: " . $row['CITY'] . ", " . $row['COUNTRY'] . "</p>";
                    echo "<hr><br>";
                    echo "</div>";
                    echo "</div>";
                    $count++;
                }oci_free_statement($compiled);
                oci_free_statement($cursor);
                ?>
                <div class="modal-footer">
                    <div class = "container">
                        <div class ="row">
                           <div class = "col-md-3">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                           </div>
                        </div>
                     </div>                   
                  </div>
            </div>
         </div>
      </div>
   </div>

   <!-- people who found a partner modal-->
    <div class="modal fade" id="foundPartner" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <h4 class="modal-title" id="myModalLabel">People who found a partner through the network</h4>
            </div>
            <div class="modal-body"><?php
                $cursor = oci_new_cursor($connection);
                $query = 'BEGIN find.foundPartner(:cursor); END;';
                $compiled = oci_parse($connection, $query);
                oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
                oci_execute($compiled);
                oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
                $count = 0;
                while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                    $query = 'BEGIN getPicture(:usernameID, :fileLocation); END;';
                    $compiled = oci_parse($connection, $query);
                    oci_bind_by_name($compiled, ':usernameID', $row['UNID'], 5);
                    oci_bind_by_name($compiled, ':fileLocation', $picture, 200);
                    oci_execute($compiled, OCI_NO_AUTO_COMMIT);
                    oci_commit($connection);
                    echo "<div class = \"row\">";
                    echo "<div class = \"col-md-3\">";
                    echo "<div class = \"thumbnail-container\"><div class = \"thumbnail\"><img src =" . $picture . "></div></div>";
                    echo "</div>";
                    echo "<div class = \"col-md-9\">";
                    echo "<h3><b>" . $row['FNAME'] . " " . $row['LNAME'] . " " . $row['LNAME2'] . "</b>, " . $row['AGE'] . "</h3>";
                    echo "<p>" . $row['TAG'] . "</p>";
                    echo "<p>Lives in: " . $row['CITY'] . ", " . $row['COUNTRY'] . "</p>";
                    echo "<hr><br>";
                    echo "</div>";
                    echo "</div>";
                    $count++;
                }oci_free_statement($compiled);
                oci_free_statement($cursor);
                ?>
                <div class="modal-footer">
                    <div class = "container">
                        <div class ="row">
                           <div class = "col-md-3">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                           </div>
                        </div>
                     </div>                   
                  </div>
            </div>
         </div>
      </div>
   </div>

   <!-- people who got married modal-->
    <div class="modal fade" id="gotMarried" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <h4 class="modal-title" id="myModalLabel">People who got married through the network</h4>
            </div>
            <div class="modal-body"><?php
                $cursor = oci_new_cursor($connection);
                $query = 'BEGIN find.gotMarried(:cursor); END;';
                $compiled = oci_parse($connection, $query);
                oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
                oci_execute($compiled);
                oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
                $count = 0;
                while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                    $query = 'BEGIN getPicture(:usernameID, :fileLocation); END;';
                    $compiled = oci_parse($connection, $query);
                    oci_bind_by_name($compiled, ':usernameID', $row['UNID'], 5);
                    oci_bind_by_name($compiled, ':fileLocation', $picture, 200);
                    oci_execute($compiled, OCI_NO_AUTO_COMMIT);
                    oci_commit($connection);
                    echo "<div class = \"row\">";
                    echo "<div class = \"col-md-3\">";
                    echo "<div class = \"thumbnail-container\"><div class = \"thumbnail\"><img src =" . $picture . "></div></div>";
                    echo "</div>";
                    echo "<div class = \"col-md-9\">";
                    echo "<h3><b>" . $row['FNAME'] . " " . $row['LNAME'] . " " . $row['LNAME2'] . "</b>, " . $row['AGE'] . "</h3>";
                    echo "<p>" . $row['TAG'] . "</p>";
                    echo "<p>Lives in: " . $row['CITY'] . ", " . $row['COUNTRY'] . "</p>";
                    echo "<hr><br>";
                    echo "</div>";
                    echo "</div>";
                    $count++;
                }oci_free_statement($compiled);
                oci_free_statement($cursor);
                ?>
                <div class="modal-footer">
                    <div class = "container">
                        <div class ="row">
                           <div class = "col-md-3">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                           </div>
                        </div>
                     </div>                   
                  </div>
            </div>
         </div>
      </div>
   </div>

   <!-- top 10 most winked people modal-->
    <div class="modal fade" id="top10MostWinked" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <h4 class="modal-title" id="myModalLabel">Top 10 most winked people</h4>
            </div>
            <div class="modal-body"><?php
                $cursor = oci_new_cursor($connection);
                $query = 'BEGIN find.top10MostWinked(:cursor); END;';
                $compiled = oci_parse($connection, $query);
                oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
                oci_execute($compiled);
                oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
                $count = 0;
                while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                    $query = 'BEGIN getPicture(:usernameID, :fileLocation); END;';
                    $compiled = oci_parse($connection, $query);
                    oci_bind_by_name($compiled, ':usernameID', $row['UNID'], 5);
                    oci_bind_by_name($compiled, ':fileLocation', $picture, 200);
                    oci_execute($compiled, OCI_NO_AUTO_COMMIT);
                    oci_commit($connection);
                    echo "<div class = \"row\">";
                    echo "<div class = \"col-md-3\">";
                    echo "<div class = \"thumbnail-container\"><div class = \"thumbnail\"><img src =" . $picture . "></div></div>";
                    echo "</div>";
                    echo "<div class = \"col-md-9\">";
                    echo "<h3><b>" . $row['FNAME'] . " " . $row['LNAME'] . " " . $row['LNAME2'] . "</b>, " . $row['WINKS'] ." winks</h3>";
                    echo "</div>";
                    echo "<hr><br>";
                    echo "</div>";
                    $count++;
                }oci_free_statement($compiled);
                oci_free_statement($cursor);
                ?>
                <div class="modal-footer">
                    <div class = "container">
                        <div class ="row">
                           <div class = "col-md-3">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                           </div>
                        </div>
                     </div>                   
                  </div>
            </div>
         </div>
      </div>
   </div>

   <!-- most wanted age range modal-->
    <div class="modal fade" id="mostWantedAgeRange" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <h4 class="modal-title" id="myModalLabel">Most wanted Age range</h4>
            </div>
            <div class="modal-body"><?php
                $cursor = oci_new_cursor($connection);
                $query = 'BEGIN mostWantedAgeRange(:cursor); END;';
                $compiled = oci_parse($connection, $query);
                oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
                oci_execute($compiled);
                oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
                $count = 0;
                $row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS);
                    echo "<p>The most looked for age range is " . $row['AGERANGE'] . " with " . $row['COUNTER'] 
                    . " looking for people in this range.</p>";
                oci_free_statement($compiled);
                oci_free_statement($cursor);
                ?>
                <div class="modal-footer">
                    <div class = "container">
                        <div class ="row">
                           <div class = "col-md-3">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                           </div>
                        </div>
                     </div>                   
                  </div>
            </div>
         </div>
      </div>
   </div>

	<div class="nav">
      <div class="container">
        <ul class = "pull-left">
            <img src = "imgs/logopeq.png">
            <li><a href="admin-homepage.php" >match.me</a></li>
        </ul>
        <ul class = "pull-right">
          <li><a href="logout.php" onclick="return confirm('Are you sure to logout?');">Log out</a></li>
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
                    <button type="button" class="btn-primary" data-toggle="modal" data-target="#createEvent">Create an event</button>
                </div><br>
    			<div class = "statistics">
    				<div class = "box-header">
    					<h3>Statistics</h3>
    				</div>
    				<div class = "box-body">
    					<ul>
    						<li><a href="#" class="btn-link" data-toggle="modal" data-target="#registeredUsers">Registered users</a></li>
		    				<li><a href="#" class="btn-link" data-toggle="modal" data-target="#foundPartner">People who a found a partner through the network</a></li>
		    				<li><a href="#" class="btn-link" data-toggle="modal" data-target="#gotMarried">People who got married through the network</a></li>
		    				<li><a href="#" class="btn-link" data-toggle="modal" data-target="#top10MostWinked">Top 10 most winked people</a></li>
		    				<li><a href="#" class="btn-link" data-toggle="modal" data-target="#mostWantedAgeRange">Most wanted age range</a></li>
    					</ul>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
    

	
</body>
</html>