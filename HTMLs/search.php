<?php
    //user homepage
	//include ('login.php');
	include('session.php');
	if(!isset($_SESSION['usernameID'])) {
		header("Location: index.php#notloggedin");
	}
    if ($_SESSION['userType'] != 2) { //if it's not a normal user
        header("Location: index.php#notnormaluser");
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Search</title>
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
    <link rel="stylesheet" href="utils/main.css"/>
    <script>
        <?php //Definition of the catalog arrays

            //ageRange
            $ageRangeNames = array();
            $ageRangeIDs = array();
            $names = "";           // string to define the catalog's names
            $ids = "";             // string to define the catalog's ids 
            $cursor = oci_new_cursor($connection);
            $query = 'BEGIN getCatalog.ageRange(:cursor); END;';
            $compiled = oci_parse($connection, $query);
            oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
            oci_execute($compiled);
            oci_execute($cursor, OCI_DEFAULT);
            $count = 0;
            while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                $names = $names . "\"" .  $row['TYPENAME'] . "\", ";
                $ageRangeNames[$count] = $row['TYPENAME'];
                $ids = $ids . "\"" .  $row['TYPENAMEID'] . "\", ";
                $ageRangeIDs[$count] = $row['TYPENAMEID'];
                $count++;
            }
            oci_free_statement($compiled);
            oci_free_statement($cursor);
            //remove the last comma
            $names = substr($names, 0, -2);
            echo "var ageRangeNames = new Array(" . $names . ");";
            $ids = substr($ids, 0, -2);
            echo "var ageRangeIDs = new Array(" . $ids . ");";

            //bodyType
            $bodyTypeNames = array();
            $bodyTypeIDs = array();
            $names = "";           // string to define the catalog's names
            $ids = "";             // string to define the catalog's ids 
            $cursor = oci_new_cursor($connection);
            $query = 'BEGIN getCatalog.bodyType(:cursor); END;';
            $compiled = oci_parse($connection, $query);
            oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
            oci_execute($compiled);
            oci_execute($cursor, OCI_DEFAULT);
            $count = 0;
            while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                $names = $names . "\"" .  $row['TYPENAME'] . "\", ";
                $bodyTypeNames[$count] = $row['TYPENAME'];
                $ids = $ids . "\"" .  $row['TYPENAMEID'] . "\", ";
                $bodyTypeIDs[$count] = $row['TYPENAMEID'];
                $count++;
            }
            oci_free_statement($compiled);
            oci_free_statement($cursor);
            //remove the last comma
            $names = substr($names, 0, -2);
            echo "var bodyTypeNames = new Array(" . $names . ");";
            $ids = substr($ids, 0, -2);
            echo "var bodyTypeIDs = new Array(" . $ids . ");";

            //excercisefrequency
            $exerciseFrequencyNames = array();
            $exerciseFrequencyIDs = array();
            $names = "";           // string to define the catalog's names
            $ids = "";             // string to define the catalog's ids 
            $cursor = oci_new_cursor($connection);
            $query = 'BEGIN getCatalog.exerciseFrequency(:cursor); END;';
            $compiled = oci_parse($connection, $query);
            oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
            oci_execute($compiled);
            oci_execute($cursor, OCI_DEFAULT);
            $count = 0;
            while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                $names = $names . "\"" .  $row['TYPENAME'] . "\", ";
                $exerciseFrequencyNames[$count] = $row['TYPENAME'];
                $ids = $ids . "\"" .  $row['TYPENAMEID'] . "\", ";
                $exerciseFrequencyIDs[$count] = $row['TYPENAMEID'];
                $count++;
            }
            oci_free_statement($compiled);
            oci_free_statement($cursor);
            //remove the last comma
            $names = substr($names, 0, -2);
            echo "var exerciseFrequencyNames = new Array(" . $names . ");";
            $ids = substr($ids, 0, -2);
            echo "var exerciseFrequencyIDs = new Array(" . $ids . ");";

            //eyeColor
            $eyeColorNames = array();
            $eyeColorIDs = array();
            $names = "";           // string to define the catalog's names
            $ids = "";             // string to define the catalog's ids 
            $cursor = oci_new_cursor($connection);
            $query = 'BEGIN getCatalog.eyeColor(:cursor); END;';
            $compiled = oci_parse($connection, $query);
            oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
            oci_execute($compiled);
            oci_execute($cursor, OCI_DEFAULT);
            $count = 0;
            while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                $names = $names . "\"" .  $row['TYPENAME'] . "\", ";
                $eyeColorNames[$count] = $row['TYPENAME'];
                $ids = $ids . "\"" .  $row['TYPENAMEID'] . "\", ";
                $eyeColorIDs[$count] = $row['TYPENAMEID'];
                $count++;
            }
            oci_free_statement($compiled);
            oci_free_statement($cursor);
            //remove the last comma
            $names = substr($names, 0, -2);
            echo "var eyeColorNames = new Array(" . $names . ");";
            $ids = substr($ids, 0, -2);
            echo "var eyeColorIDs = new Array(" . $ids . ");";

            //gender
            $genderNames = array();
            $genderIDs = array();
            $names = "";           // string to define the catalog's names
            $ids = "";             // string to define the catalog's ids 
            $cursor = oci_new_cursor($connection);
            $query = 'BEGIN getCatalog.gender(:cursor); END;';
            $compiled = oci_parse($connection, $query);
            oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
            oci_execute($compiled);
            oci_execute($cursor, OCI_DEFAULT);
            $count = 0;
            while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                $names = $names . "\"" .  $row['TYPENAME'] . "\", ";
                $genderNames[$count] = $row['TYPENAME'];
                $ids = $ids . "\"" .  $row['TYPENAMEID'] . "\", ";
                $genderIDs[$count] = $row['TYPENAMEID'];
                $count++;
            }
            oci_free_statement($compiled);
            oci_free_statement($cursor);
            //remove the last comma
            $names = substr($names, 0, -2);
            echo "var genderNames = new Array(" . $names . ");";
            $ids = substr($ids, 0, -2);
            echo "var genderIDs = new Array(" . $ids . ");";

            //hair color
            $hairColorNames = array();
            $hairColorIDs = array();
            $names = "";           // string to define the catalog's names
            $ids = "";             // string to define the catalog's ids 
            $cursor = oci_new_cursor($connection);
            $query = 'BEGIN getCatalog.hairColor(:cursor); END;';
            $compiled = oci_parse($connection, $query);
            oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
            oci_execute($compiled);
            oci_execute($cursor, OCI_DEFAULT);
            $count = 0;
            while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                $names = $names . "\"" .  $row['TYPENAME'] . "\", ";
                $hairColorNames[$count] = $row['TYPENAME'];
                $ids = $ids . "\"" .  $row['TYPENAMEID'] . "\", ";
                $hairColorIDs[$count] = $row['TYPENAMEID'];
                $count++;
            }
            oci_free_statement($compiled);
            oci_free_statement($cursor);
            //remove the last comma
            $names = substr($names, 0, -2);
            echo "var hairColorNames = new Array(" . $names . ");";
            $ids = substr($ids, 0, -2);
            echo "var hairColorIDs = new Array(" . $ids . ");";

            //hobbie
            $hobbieNames = array();
            $hobbieIDs = array();
            $names = "";           // string to define the catalog's names
            $ids = "";             // string to define the catalog's ids 
            $cursor = oci_new_cursor($connection);
            $query = 'BEGIN getCatalog.hobbie(:cursor, :hobbieNumber); END;';
            $compiled = oci_parse($connection, $query);
            oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
            oci_bind_by_name($compiled, ':hobbieNumber', $hobbieNumber, 3);
            oci_execute($compiled);
            oci_execute($cursor, OCI_DEFAULT);
            $count = 0;
            while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                $names = $names . "\"" .  $row['TYPENAME'] . "\", ";
                $hobbieNames[$count] = $row['TYPENAME'];
                $ids = $ids . "\"" .  $row['TYPENAMEID'] . "\", ";
                $hobbieIDs[$count] = $row['TYPENAMEID'];
                $count++;
            }
            oci_free_statement($compiled);
            oci_free_statement($cursor);
            //remove the last comma
            $names = substr($names, 0, -2);
            echo "var hobbieNames = new Array(" . $names . ");";
            $ids = substr($ids, 0, -2);
            echo "var hobbieIDs = new Array(" . $ids . ");";

            //interest
            $interestNames = array();
            $interestIDs = array();
            $names = "";           // string to define the catalog's names
            $ids = "";             // string to define the catalog's ids 
            $cursor = oci_new_cursor($connection);
            $query = 'BEGIN getCatalog.interest(:cursor, :interestNumber); END;';
            $compiled = oci_parse($connection, $query);
            oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
            oci_bind_by_name($compiled, ':interestNumber', $interestNumber, 3);
            oci_execute($compiled);
            oci_execute($cursor, OCI_DEFAULT);
            $count = 0;
            while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                $names = $names . "\"" .  $row['TYPENAME'] . "\", ";
                $interestNames[$count] = $row['TYPENAME'];
                $ids = $ids . "\"" .  $row['TYPENAMEID'] . "\", ";
                $interestIDs[$count] = $row['TYPENAMEID'];
                $count++;
            }
            oci_free_statement($compiled);
            oci_free_statement($cursor);
            //remove the last comma
            $names = substr($names, 0, -2);
            echo "var interestNames = new Array(" . $names . ");";
            $ids = substr($ids, 0, -2);
            echo "var interestIDs = new Array(" . $ids . ");";

            //language
            $languageNames = array();
            $languageIDs = array();
            $names = "";           // string to define the catalog's names
            $ids = "";             // string to define the catalog's ids 
            $cursor = oci_new_cursor($connection);
            $query = 'BEGIN getCatalog.languages(:cursor, :languageNumber); END;';
            $compiled = oci_parse($connection, $query);
            oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
            oci_bind_by_name($compiled, ':languageNumber', $languageNumber, 3);
            oci_execute($compiled);
            oci_execute($cursor, OCI_DEFAULT);
            $count = 0;
            while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                $names = $names . "\"" .  $row['TYPENAME'] . "\", ";
                $languageNames[$count] = $row['TYPENAME'];
                $ids = $ids . "\"" .  $row['TYPENAMEID'] . "\", ";
                $languageIDs[$count] = $row['TYPENAMEID'];
                $count++;
            }
            oci_free_statement($compiled);
            oci_free_statement($cursor);
            //remove the last comma
            $names = substr($names, 0, -2);
            echo "var languageNames = new Array(" . $names . ");";
            $ids = substr($ids, 0, -2);
            echo "var languageIDs = new Array(" . $ids . ");";

            //relationship status
            $relationshipStatusNames = array();
            $relationshipStatusIDs = array();
            $names = "";           // string to define the catalog's names
            $ids = "";             // string to define the catalog's ids 
            $cursor = oci_new_cursor($connection);
            $query = 'BEGIN getCatalog.relationshipStatus(:cursor); END;';
            $compiled = oci_parse($connection, $query);
            oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
            oci_execute($compiled);
            oci_execute($cursor, OCI_DEFAULT);
            $count = 0;
            while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                $names = $names . "\"" .  $row['TYPENAME'] . "\", ";
                $relationshipStatusNames[$count] = $row['TYPENAME'];
                $ids = $ids . "\"" .  $row['TYPENAMEID'] . "\", ";
                $relationshipStatusIDs[$count] = $row['TYPENAMEID'];
                $count++;
            }
            oci_free_statement($compiled);
            oci_free_statement($cursor);
            //remove the last comma
            $names = substr($names, 0, -2);
            echo "var relationshipStatusNames = new Array(" . $names . ");";
            $ids = substr($ids, 0, -2);
            echo "var relationshipStatusIDs = new Array(" . $ids . ");";

            //religion
            $religionNames = array();
            $religionIDs = array();
            $names = "";           // string to define the catalog's names
            $ids = "";             // string to define the catalog's ids 
            $cursor = oci_new_cursor($connection);
            $query = 'BEGIN getCatalog.religion(:cursor); END;';
            $compiled = oci_parse($connection, $query);
            oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
            oci_execute($compiled);
            oci_execute($cursor, OCI_DEFAULT);
            $count = 0;
            while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                $names = $names . "\"" .  $row['TYPENAME'] . "\", ";
                $religionNames[$count] = $row['TYPENAME'];
                $ids = $ids . "\"" .  $row['TYPENAMEID'] . "\", ";
                $religionIDs[$count] = $row['TYPENAMEID'];
                $count++;
            }
            oci_free_statement($compiled);
            oci_free_statement($cursor);
            //remove the last comma
            $names = substr($names, 0, -2);
            echo "var religionNames = new Array(" . $names . ");";
            $ids = substr($ids, 0, -2);
            echo "var religionIDs = new Array(" . $ids . ");";

            //sexual orientation
            $sexualOrientationNames = array();
            $sexualOrientationIDs = array();
            $names = "";           // string to define the catalog's names
            $ids = "";             // string to define the catalog's ids 
            $cursor = oci_new_cursor($connection);
            $query = 'BEGIN getCatalog.sexualOrientation(:cursor); END;';
            $compiled = oci_parse($connection, $query);
            oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
            oci_execute($compiled);
            oci_execute($cursor, OCI_DEFAULT);
            $count = 0;
            while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                $names = $names . "\"" .  $row['TYPENAME'] . "\", ";
                $sexualOrientationNames[$count] = $row['TYPENAME'];
                $ids = $ids . "\"" .  $row['TYPENAMEID'] . "\", ";
                $sexualOrientationIDs[$count] = $row['TYPENAMEID'];
                $count++;
            }
            oci_free_statement($compiled);
            oci_free_statement($cursor);
            //remove the last comma
            $names = substr($names, 0, -2);
            echo "var sexualOrientationNames = new Array(" . $names . ");";
            $ids = substr($ids, 0, -2);
            echo "var sexualOrientationIDs = new Array(" . $ids . ");";

            //skin color
            $skinColorNames = array();
            $skinColorIDs = array();
            $names = "";           // string to define the catalog's names
            $ids = "";             // string to define the catalog's ids 
            $cursor = oci_new_cursor($connection);
            $query = 'BEGIN getCatalog.skinColor(:cursor); END;';
            $compiled = oci_parse($connection, $query);
            oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
            oci_execute($compiled);
            oci_execute($cursor, OCI_DEFAULT);
            $count = 0;
            while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                $names = $names . "\"" .  $row['TYPENAME'] . "\", ";
                $skinColorNames[$count] = $row['TYPENAME'];
                $ids = $ids . "\"" .  $row['TYPENAMEID'] . "\", ";
                $skinColorIDs[$count] = $row['TYPENAMEID'];
                $count++;
            }
            oci_free_statement($compiled);
            oci_free_statement($cursor);
            //remove the last comma
            $names = substr($names, 0, -2);
            echo "var skinColorNames = new Array(" . $names . ");";
            $ids = substr($ids, 0, -2);
            echo "var skinColorIDs = new Array(" . $ids . ");";

            //zodiac Sign
            $zodiacSignNames = array();
            $zodiacSignIDs = array();
            $names = "";           // string to define the catalog's names
            $ids = "";             // string to define the catalog's ids 
            $cursor = oci_new_cursor($connection);
            $query = 'BEGIN getCatalog.zodiacSign(:cursor); END;';
            $compiled = oci_parse($connection, $query);
            oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
            oci_execute($compiled);
            oci_execute($cursor, OCI_DEFAULT);
            $count = 0;
            while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                $names = $names . "\"" .  $row['TYPENAME'] . "\", ";
                $zodiacSignNames[$count] = $row['TYPENAME'];
                $ids = $ids . "\"" .  $row['TYPENAMEID'] . "\", ";
                $zodiacSignIDs[$count] = $row['TYPENAMEID'];
                $count++;
            }
            oci_free_statement($compiled);
            oci_free_statement($cursor);
            //remove the last comma
            $names = substr($names, 0, -2);
            echo "var zodiacSignNames = new Array(" . $names . ");";
            $ids = substr($ids, 0, -2);
            echo "var zodiacSignIDs = new Array(" . $ids . ");";


        ?>
        function populateCatalog(catalog) {
            //delete everything from the div
            document.getElementById("search-bar").innerHTML = "";
            //get the div to which the function will append a select object
            var searchBar = document.getElementById("search-bar");  
            //Create and append select list
            var selectCatalog = document.createElement("select");
            selectCatalog.id = "select-catalog";
            selectCatalog.name = "select-catalog";
            searchBar.appendChild(selectCatalog);
            //populate with options
            var select = document.getElementById("select-catalog");
            select.length = 0;
            if (catalog == "ageRange") {
                select.options[0] = new Option('Select age range','-1');
                select.selectedIndex = 0;
                for(var i = 0; i < ageRangeNames.length; i++) {
                    select.options[select.length] = new Option(ageRangeNames[i], ageRangeIDs[i]);
                }
            }
            else if (catalog == "bodyType") {
                select.options[0] = new Option('Select body type','-1');
                select.selectedIndex = 0;
                for(var i = 0; i < bodyTypeNames.length; i++) {
                    select.options[select.length] = new Option(bodyTypeNames[i], bodyTypeIDs[i]);
                }
            }
            else if (catalog == "exerciseFrequency") {
                select.options[0] = new Option('Select exercise frequency','-1');
                select.selectedIndex = 0;
                for(var i = 0; i < exerciseFrequencyNames.length; i++) {
                    select.options[select.length] = new Option(exerciseFrequencyNames[i], exerciseFrequencyIDs[i]);
                }
            }
            else if (catalog == "eyeColor") {
                select.options[0] = new Option('Select eye color','-1');
                select.selectedIndex = 0;
                for(var i = 0; i < eyeColorNames.length; i++) {
                    select.options[select.length] = new Option(eyeColorNames[i], eyeColorIDs[i]);
                }
            }
            else if (catalog == "gender") {
                select.options[0] = new Option('Select gender','-1');
                select.selectedIndex = 0;
                for(var i = 0; i < genderNames.length; i++) {
                    select.options[select.length] = new Option(genderNames[i], genderIDs[i]);
                }
            }
            else if (catalog == "hairColor") {
                select.options[0] = new Option('Select hair color','-1');
                select.selectedIndex = 0;
                for(var i = 0; i < hairColorNames.length; i++) {
                    select.options[select.length] = new Option(hairColorNames[i], hairColorIDs[i]);
                }
            }
            else if (catalog == "hobbie") {
                select.options[0] = new Option('Select hobbie','-1');
                select.selectedIndex = 0;
                for(var i = 0; i < hobbieNames.length; i++) {
                    select.options[select.length] = new Option(hobbieNames[i], hobbieIDs[i]);
                }
            }
            else if (catalog == "interest") {
                select.options[0] = new Option('Select interest','-1');
                select.selectedIndex = 0;
                for(var i = 0; i < interestNames.length; i++) {
                    select.options[select.length] = new Option(interestNames[i], interestIDs[i]);
                }
            }
            else if (catalog == "language") {
                select.options[0] = new Option('Select language','-1');
                select.selectedIndex = 0;
                for(var i = 0; i < languageNames.length; i++) {
                    select.options[select.length] = new Option(languageNames[i], languageIDs[i]);
                }
            }
            else if (catalog == "relationshipStatus") {
                select.options[0] = new Option('Select relationship status','-1');
                select.selectedIndex = 0;
                for(var i = 0; i < relationshipStatusNames.length; i++) {
                    select.options[select.length] = new Option(relationshipStatusNames[i], relationshipStatusIDs[i]);
                }
            }
            else if (catalog == "religion") {
                select.options[0] = new Option('Select religion','-1');
                select.selectedIndex = 0;
                for(var i = 0; i < religionNames.length; i++) {
                    select.options[select.length] = new Option(religionNames[i], religionIDs[i]);
                }
            }
            else if (catalog == "sexualOrientation") {
                select.options[0] = new Option('Select sexual orientation','-1');
                select.selectedIndex = 0;
                for(var i = 0; i < sexualOrientationNames.length; i++) {
                    select.options[select.length] = new Option(sexualOrientationNames[i], sexualOrientationIDs[i]);
                }
            }
            else if (catalog == "skinColor") {
                select.options[0] = new Option('Select skin color','-1');
                select.selectedIndex = 0;
                for(var i = 0; i < skinColorNames.length; i++) {
                    select.options[select.length] = new Option(skinColorNames[i], skinColorIDs[i]);
                }
            }
            else if (catalog == "zodiacSign") {
                select.options[0] = new Option('Select zodiac sign','-1');
                select.selectedIndex = 0;
                for(var i = 0; i < zodiacSignNames.length; i++) {
                    select.options[select.length] = new Option(zodiacSignNames[i], zodiacSignIDs[i]);
                }
            }
        }

        function createTextField(field) {
            //delete everything from the div
            document.getElementById("search-bar").innerHTML = "";
            //get the div to which the function will append a select object
            var searchBar = document.getElementById("search-bar"); 
            var input = document.createElement("input");
            input.type = "text";
            searchBar.appendChild(input);
            if (field == "name") {
                input.placeholder = "Search for name..."
            }
            else if (field == "lastName") {
                input.placeholder = "Search for last name..."
            }
            else if (field == "lastName") {
                input.placeholder = "Search for lastName..."
            }
            else if (field == "city") {
                input.placeholder = "Search for people in a city..."
            }
            else if (field == "country") {
                input.placeholder = "Search for people in a country..."
            }
        }
    </script>
</head>
<body>

	<div class="nav">
      <div class="container">
        <ul class = "pull-left">
            <img src = "imgs/logopeq.png">
            <li><a href="homepage.php" >match.me</a></li>
        </ul>
        <ul class = "pull-right">
            <li><a href="search.php"><img src = "imgs/search.png">Search</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="#">Messages</a></li>
            <li><a href="#">Notifications</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="logout.php">Log out</a></li>
        </ul>
      </div>
    </div>
    <br>

    <div class = "container">
        <div class = "row">
            <div class = "col-md-3">
                <div class = "search-sidebar">
                    <div class="box-header">
                        <h3>Search by person's...</h3>
                    </div>
                    <div class="box-body">
                        <form role="form" action="change-profile.php" method="POST">
                            <ul>
                                <input type="radio" name = "search" value="name" id="name" onchange="createTextField(this.id)">Name<br>
                                <input type="radio" name = "search" value="lastName" id="lastName" onchange="createTextField(this.id)">Last name<br>
                                <input type="radio" name = "search" value="city" id="city" onchange="createTextField(this.id)">City<br>
                                <input type="radio" name = "search" value="country" id="country" onchange="createTextField(this.id)">Country<br>
                                <input type="radio" name = "search" value="age" id="age">Age (not implemented)<br>
                                <hr>
                                <input type="radio" name = "search" value="ageRange" id="ageRange" onchange="populateCatalog(this.id)">Age range<br>
                                <input type="radio" name = "search" value="bodyType" id="bodyType" onchange="populateCatalog(this.id)">Body type<br>
                                <input type="radio" name = "search" value="exerciseFrequency" id="exerciseFrequency" onchange="populateCatalog(this.id)">Exercise frequency<br>
                                <input type="radio" name = "search" value="eyeColor" id="eyeColor" onchange="populateCatalog(this.id)">Eye Color<br>
                                <input type="radio" name = "search" value="gender" id="gender" onchange="populateCatalog(this.id)">Gender<br>
                                <input type="radio" name = "search" value="hairColor" id="hairColor" onchange="populateCatalog(this.id)">Hair color<br>
                                <input type="radio" name = "search" value="hobbie" id="hobbie" onchange="populateCatalog(this.id)">Hobbie<br>
                                <input type="radio" name = "search" value="interest" id="interest" onchange="populateCatalog(this.id)">Interest<br>
                                <input type="radio" name = "search" value="language" id="language" onchange="populateCatalog(this.id)">Language<br>
                                <input type="radio" name = "search" value="relationshipStatus" id="relationshipStatus" onchange="populateCatalog(this.id)">Relationship status<br>
                                <input type="radio" name = "search" value="religion" id="religion" onchange="populateCatalog(this.id)">Religion<br>
                                <input type="radio" name = "search" value="sexualOrientation" id="sexualOrientation" onchange="populateCatalog(this.id)">Sexual orientation<br>
                                <input type="radio" name = "search" value="skinColor" id="skinColor" onchange="populateCatalog(this.id)">Skin color<br>
                                <input type="radio" name = "search" value="zodiacSign" id="zodiacSign" onchange="populateCatalog(this.id)">Zodiac Sign<br>
                                <hr>
                            </ul>
                        </form>
                    </div>
                </div>
                
            </div>
            <div class = "col-md-7">
                <div class="search-content">
                    <div id = "search-bar" class = "search-bar">
                    <input type="text" placeholder="Select a search value on the left...">
                    </div>
                        
                </div>
            </div>
            <div class = "col-md-2">
                <div class="search-information"></div>
                <div class="search-statistics"></div>
            </div>
        </div>
    </div>
    
    <div class = "footer">
        <a href = "#" class="btn-link" data-toggle="modal" data-target="#myModal3">Legal Disclaimer</a>
        <p>Bases de Datos 1, Proyecto 1 - Match.Me, Profesora: Adriana Alvarez</p>
        <p>Estudiantes: Alexis Arguedas, Gabriela Garro, Yanil Gomez</p>
        <p>2015, II Semestre</p>
    </div>
	
</body>
</html>