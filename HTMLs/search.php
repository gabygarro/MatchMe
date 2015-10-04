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
                select.id = "searchAgeRange";
                select.name = "searchAgeRange";
                for(var i = 0; i < ageRangeNames.length; i++) {
                    select.options[select.length] = new Option(ageRangeNames[i], ageRangeIDs[i]);
                }
            }
            else if (catalog == "bodyType") {
                select.options[0] = new Option('Select body type','-1');
                select.selectedIndex = 0;
                select.id = "searchBodyType";
                select.name = "searchBodyType";
                for(var i = 0; i < bodyTypeNames.length; i++) {
                    select.options[select.length] = new Option(bodyTypeNames[i], bodyTypeIDs[i]);
                }
            }
            else if (catalog == "exerciseFrequency") {
                select.options[0] = new Option('Select exercise frequency','-1');
                select.selectedIndex = 0;
                select.id = "searchExerciseFrequency";
                select.name = "searchExerciseFrequency";
                for(var i = 0; i < exerciseFrequencyNames.length; i++) {
                    select.options[select.length] = new Option(exerciseFrequencyNames[i], exerciseFrequencyIDs[i]);
                }
            }
            else if (catalog == "eyeColor") {
                select.options[0] = new Option('Select eye color','-1');
                select.selectedIndex = 0;
                select.id = "searchEyeColor";
                select.name = "searchEyeColor";
                for(var i = 0; i < eyeColorNames.length; i++) {
                    select.options[select.length] = new Option(eyeColorNames[i], eyeColorIDs[i]);
                }
            }
            else if (catalog == "gender") {
                select.options[0] = new Option('Select gender','-1');
                select.selectedIndex = 0;
                select.id = "searchGender";
                select.name = "searchGender";
                for(var i = 0; i < genderNames.length; i++) {
                    select.options[select.length] = new Option(genderNames[i], genderIDs[i]);
                }
            }
            else if (catalog == "hairColor") {
                select.options[0] = new Option('Select hair color','-1');
                select.selectedIndex = 0;
                select.id = "searchHairColor";
                select.name = "searchHairColor";
                for(var i = 0; i < hairColorNames.length; i++) {
                    select.options[select.length] = new Option(hairColorNames[i], hairColorIDs[i]);
                }
            }
            else if (catalog == "hobbie") {
                select.options[0] = new Option('Select hobbie','-1');
                select.selectedIndex = 0;
                select.id = "searchHobbie";
                select.name = "searchHobbie";
                for(var i = 0; i < hobbieNames.length; i++) {
                    select.options[select.length] = new Option(hobbieNames[i], hobbieIDs[i]);
                }
            }
            else if (catalog == "interest") {
                select.options[0] = new Option('Select interest','-1');
                select.selectedIndex = 0;
                select.id = "searchInterest";
                select.name = "searchInterest";
                for(var i = 0; i < interestNames.length; i++) {
                    select.options[select.length] = new Option(interestNames[i], interestIDs[i]);
                }
            }
            else if (catalog == "language") {
                select.options[0] = new Option('Select language','-1');
                select.selectedIndex = 0;
                select.id = "searchLanguage";
                select.name = "searchLanguage";
                for(var i = 0; i < languageNames.length; i++) {
                    select.options[select.length] = new Option(languageNames[i], languageIDs[i]);
                }
            }
            else if (catalog == "relationshipStatus") {
                select.options[0] = new Option('Select relationship status','-1');
                select.selectedIndex = 0;
                select.id = "searchRelationshipStatus";
                select.name = "searchRelationshipStatus";
                for(var i = 0; i < relationshipStatusNames.length; i++) {
                    select.options[select.length] = new Option(relationshipStatusNames[i], relationshipStatusIDs[i]);
                }
            }
            else if (catalog == "religion") {
                select.options[0] = new Option('Select religion','-1');
                select.selectedIndex = 0;
                select.id = "searchReligion";
                select.name = "searchReligion";
                for(var i = 0; i < religionNames.length; i++) {
                    select.options[select.length] = new Option(religionNames[i], religionIDs[i]);
                }
            }
            else if (catalog == "sexualOrientation") {
                select.options[0] = new Option('Select sexual orientation','-1');
                select.selectedIndex = 0;
                select.id = "searchSexualOrientation";
                select.name = "searchSexualOrientation";
                for(var i = 0; i < sexualOrientationNames.length; i++) {
                    select.options[select.length] = new Option(sexualOrientationNames[i], sexualOrientationIDs[i]);
                }
            }
            else if (catalog == "skinColor") {
                select.options[0] = new Option('Select skin color','-1');
                select.selectedIndex = 0;
                select.id = "searchSkinColor";
                select.name = "searchSkinColor";
                for(var i = 0; i < skinColorNames.length; i++) {
                    select.options[select.length] = new Option(skinColorNames[i], skinColorIDs[i]);
                }
            }
            else if (catalog == "zodiacSign") {
                select.options[0] = new Option('Select zodiac sign','-1');
                select.selectedIndex = 0;
                select.id = "searchZodiacSign";
                select.name = "searchZodiacSign";
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
                input.name = "searchName";
                input.max = "50";
                input.placeholder = "Search by name..."
            }
            else if (field == "lastName") {
                input.name = "searchLastName";
                input.placeholder = "Search by last name..."
            }
            else if (field == "lastName2") {
                input.name = "searchLastName2";
                input.placeholder = "Search by second last name..."
            }
            else if (field == "nickname") {
                input.name = "searchNickname";
                input.placeholder = "Search by nickname..."
            }
            else if (field == "city") {
                input.name = "searchCity";
                input.placeholder = "Search for people by city..."
            }
            else if (field == "country") {
                input.name = "searchCountry";
                input.placeholder = "Search for people by country..."
            }
        }

        function goToProfile(form, usernameID) {
            var submit = document.getElementById(form);
            submit.submit();
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
        <form action="search.php" method="POST">
            <div class = "row">
                <div class = "col-md-3">
                    <div class = "search-sidebar">
                        <div class="box-header">
                            <h3>Search by person's...</h3>
                        </div>
                        <div class="box-body">
                            <ul>
                                <input type="radio" name = "search" value="name" id="name" onchange="createTextField(this.id)">Name<br>
                                <input type="radio" name = "search" value="lastName" id="lastName" onchange="createTextField(this.id)">Last name<br>
                                <input type="radio" name = "search" value="lastName2" id="lastName2" onchange="createTextField(this.id)">Second last name<br>
                                <input type="radio" name = "search" value="nickname" id="nickname" onchange="createTextField(this.id)">Nickname<br>
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
                        </div>
                    </div>
                    
                </div>
                <div class = "col-md-7">
                    <div class="search-content">
                        <div class = "row">
                            <div class = "col-md-11">
                                <div id = "search-bar" class = "search-bar">
                                    <h3>Select a search value on the left...</h3>
                                </div>
                                <form id="person" action="other-profile.php" method="POST"></form>
                                <?php
                                    //Search for text field values
                                    if (isset($_POST["searchName"])) {
                                        $cursor = oci_new_cursor($connection);
                                        $query = 'BEGIN find.findName(:searchName,:cursor); END;';
                                        $compiled = oci_parse($connection, $query);
                                        oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
                                        oci_bind_by_name($compiled, ':searchName', $_POST["searchName"], 50);
                                        oci_execute($compiled);
                                        oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
                                        $count = 0;
                                        while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                                            echo "<div class = \"row\">";
                                            echo "<div class = \"col-md-3\">";
                                            echo "<div class = \"thumbnail-container\"><div class = \"thumbnail\"><img src = \"imgs/dog-of-wisdom-profile-picture.png\"></div></div>";
                                            echo "</div>";
                                            echo "<div class = \"col-md-9\">";
                                            echo "<form id=\"person" . $count . "\" action=\"other-profile.php\" method=\"POST\">";
                                            echo "<input type=\"hidden\" name=\"other-usernameID\" value=\"" . $row['UNID'] . "\" />";
                                            echo "<input type=\"hidden\" name=\"other-name\" value=\"" . $row['FNAME'] . "\" />";
                                            echo "<h3><b><a href=\"#\" onclick=\"document.getElementById('person" . $count . "').submit();\">" . $row['FNAME'] . " "
                                            . $row['LNAME'] . " " . $row['LNAME2'] . "</a></b>, " . $row['AGE'] . "</h3>";
                                            echo "<p>" . $row['TAG'] . "</p>";
                                            echo "<p>Lives in: " . $row['CITY'] . ", " . $row['COUNTRY'] . "</p>";
                                            echo "<hr><br>";
                                            echo "</form>";
                                            echo "</div>";
                                            echo "</div>";
                                            $count++;
                                        }
                                        oci_free_statement($compiled);
                                        oci_free_statement($cursor);
                                        unset($_POST["searchName"]);
                                    }
                                    else if (isset($_POST["searchLastName"])) {
                                        $cursor = oci_new_cursor($connection);
                                        $query = 'BEGIN find.LastName(:searchLastName,:cursor); END;';
                                        $compiled = oci_parse($connection, $query);
                                        oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
                                        oci_bind_by_name($compiled, ':searchLastName', $_POST["searchLastName"], 50);
                                        oci_execute($compiled);
                                        oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
                                        $count = 0;
                                        while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                                            echo "<form id=\"person" . $count . "\" action=\"other-profile.php\" method=\"POST\">";
                                            echo "<input type=\"hidden\" name=\"other-usernameID\" value=\"" . $row['UNID'] . "\" />";
                                            echo "<input type=\"hidden\" name=\"other-name\" value=\"" . $row['FNAME'] . "\" />";
                                            echo "<h3><b><a href=\"#\" onclick=\"document.getElementById('person" . $count . "').submit();\">" . $row['FNAME'] . " "
                                            . $row['LNAME'] . " " . $row['LNAME2'] . "</a></b>, " . $row['AGE'] . "</h3>";
                                            echo "<p>" . $row['TAG'] . "</p>";
                                            echo "<p>Lives in: " . $row['CITY'] . ", " . $row['COUNTRY'] . "</p>";
                                            echo "<hr><br>";
                                            echo "</form>";
                                            $count++;
                                        }
                                        oci_free_statement($compiled);
                                        oci_free_statement($cursor);
                                        unset($_POST["searchLastName"]);
                                    }
                                    else if (isset($_POST["searchLastName2"])) {
                                        $cursor = oci_new_cursor($connection);
                                        $query = 'BEGIN find.LastName2(:searchLastName2,:cursor); END;';
                                        $compiled = oci_parse($connection, $query);
                                        oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
                                        oci_bind_by_name($compiled, ':searchLastName2', $_POST["searchLastName2"], 50);
                                        oci_execute($compiled);
                                        oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
                                        $count = 0;
                                        while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                                            echo "<form id=\"person" . $count . "\" action=\"other-profile.php\" method=\"POST\">";
                                            echo "<input type=\"hidden\" name=\"other-usernameID\" value=\"" . $row['UNID'] . "\" />";
                                            echo "<input type=\"hidden\" name=\"other-name\" value=\"" . $row['FNAME'] . "\" />";
                                            echo "<h3><b><a href=\"#\" onclick=\"document.getElementById('person" . $count . "').submit();\">" . $row['FNAME'] . " "
                                            . $row['LNAME'] . " " . $row['LNAME2'] . "</a></b>, " . $row['AGE'] . "</h3>";
                                            echo "<p>" . $row['TAG'] . "</p>";
                                            echo "<p>Lives in: " . $row['CITY'] . ", " . $row['COUNTRY'] . "</p>";
                                            echo "<hr><br>";
                                            echo "</form>";
                                            $count++;
                                        }
                                        oci_free_statement($compiled);
                                        oci_free_statement($cursor);
                                        unset($_POST["searchLastName2"]);
                                    }
                                    else if (isset($_POST["searchNickname"])) {
                                        $cursor = oci_new_cursor($connection);
                                        $query = 'BEGIN find.nickname(:searchNickname,:cursor); END;';
                                        $compiled = oci_parse($connection, $query);
                                        oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
                                        oci_bind_by_name($compiled, ':searchNickname', $_POST["searchNickname"], 50);
                                        oci_execute($compiled);
                                        oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
                                        $count = 0;
                                        while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                                            echo "<form id=\"person" . $count . "\" action=\"other-profile.php\" method=\"POST\">";
                                            echo "<input type=\"hidden\" name=\"other-usernameID\" value=\"" . $row['UNID'] . "\" />";
                                            echo "<input type=\"hidden\" name=\"other-name\" value=\"" . $row['FNAME'] . "\" />";
                                            echo "<h3><b><a href=\"#\" onclick=\"document.getElementById('person" . $count . "').submit();\">" . $row['FNAME'] . " "
                                            . $row['LNAME'] . " " . $row['LNAME2'] . "</a></b>, " . $row['AGE'] . "</h3>";
                                            echo "<p>" . $row['TAG'] . "</p>";
                                            echo "<p>Lives in: " . $row['CITY'] . ", " . $row['COUNTRY'] . "</p>";
                                            echo "<hr><br>";
                                            echo "</form>";
                                            $count++;
                                        }
                                        oci_free_statement($compiled);
                                        oci_free_statement($cursor);
                                        unset($_POST["searchNickname"]);
                                    }
                                    else if (isset($_POST["searchCity"])) {
                                        $cursor = oci_new_cursor($connection);
                                        $query = 'BEGIN find.city(:searchCity,:cursor); END;';
                                        $compiled = oci_parse($connection, $query);
                                        oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
                                        oci_bind_by_name($compiled, ':searchCity', $_POST["searchCity"], 50);
                                        oci_execute($compiled);
                                        oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
                                        $count = 0;
                                        while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                                            echo "<form id=\"person" . $count . "\" action=\"other-profile.php\" method=\"POST\">";
                                            echo "<input type=\"hidden\" name=\"other-usernameID\" value=\"" . $row['UNID'] . "\" />";
                                            echo "<input type=\"hidden\" name=\"other-name\" value=\"" . $row['FNAME'] . "\" />";
                                            echo "<h3><b><a href=\"#\" onclick=\"document.getElementById('person" . $count . "').submit();\">" . $row['FNAME'] . " "
                                            . $row['LNAME'] . " " . $row['LNAME2'] . "</a></b>, " . $row['AGE'] . "</h3>";
                                            echo "<p>" . $row['TAG'] . "</p>";
                                            echo "<p>Lives in: " . $row['CITY'] . ", " . $row['COUNTRY'] . "</p>";
                                            echo "<hr><br>";
                                            echo "</form>";
                                            $count++;
                                        }
                                        oci_free_statement($compiled);
                                        oci_free_statement($cursor);
                                        unset($_POST["searchCity"]);
                                    }
                                    else if (isset($_POST["searchCountry"])) {
                                        $cursor = oci_new_cursor($connection);
                                        $query = 'BEGIN find.country(:searchCountry,:cursor); END;';
                                        $compiled = oci_parse($connection, $query);
                                        oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
                                        oci_bind_by_name($compiled, ':searchCountry', $_POST["searchCountry"], 50);
                                        oci_execute($compiled);
                                        oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
                                        $count = 0;
                                        while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                                            echo "<form id=\"person" . $count . "\" action=\"other-profile.php\" method=\"POST\">";
                                            echo "<input type=\"hidden\" name=\"other-usernameID\" value=\"" . $row['UNID'] . "\" />";
                                            echo "<input type=\"hidden\" name=\"other-name\" value=\"" . $row['FNAME'] . "\" />";
                                            echo "<h3><b><a href=\"#\" onclick=\"document.getElementById('person" . $count . "').submit();\">" . $row['FNAME'] . " "
                                            . $row['LNAME'] . " " . $row['LNAME2'] . "</a></b>, " . $row['AGE'] . "</h3>";
                                            echo "<p>" . $row['TAG'] . "</p>";
                                            echo "<p>Lives in: " . $row['CITY'] . ", " . $row['COUNTRY'] . "</p>";
                                            echo "<hr><br>";
                                            echo "</form>";
                                            $count++;
                                        }
                                        oci_free_statement($compiled);
                                        oci_free_statement($cursor);
                                        unset($_POST["searchCountry"]);
                                    }
                                    //Search for catalog values
                                    else if (isset($_POST["searchAgeRange"])) {
                                        $cursor = oci_new_cursor($connection);
                                        $query = 'BEGIN find.ageRange(:searchAgeRange,:cursor); END;';
                                        $compiled = oci_parse($connection, $query);
                                        oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
                                        oci_bind_by_name($compiled, ':searchAgeRange', $_POST["searchAgeRange"], 50);
                                        oci_execute($compiled);
                                        oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
                                        $count = 0;
                                        while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                                            echo "<form id=\"person" . $count . "\" action=\"other-profile.php\" method=\"POST\">";
                                            echo "<input type=\"hidden\" name=\"other-usernameID\" value=\"" . $row['UNID'] . "\" />";
                                            echo "<input type=\"hidden\" name=\"other-name\" value=\"" . $row['FNAME'] . "\" />";
                                            echo "<h3><b><a href=\"#\" onclick=\"document.getElementById('person" . $count . "').submit();\">" . $row['FNAME'] . " "
                                            . $row['LNAME'] . " " . $row['LNAME2'] . "</a></b>, " . $row['AGE'] . "</h3>";
                                            echo "<p>" . $row['TAG'] . "</p>";
                                            echo "<p>Lives in: " . $row['CITY'] . ", " . $row['COUNTRY'] . "</p>";
                                            echo "<hr><br>";
                                            echo "</form>";
                                            $count++;
                                        }
                                        oci_free_statement($compiled);
                                        oci_free_statement($cursor);
                                        unset($_POST["searchAgeRange"]);
                                    }
                                    else if (isset($_POST["searchBodyType"])) {
                                        $cursor = oci_new_cursor($connection);
                                        $query = 'BEGIN find.bodytype(:searchBodyType,:cursor); END;';
                                        $compiled = oci_parse($connection, $query);
                                        oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
                                        oci_bind_by_name($compiled, ':searchBodyType', $_POST["searchBodyType"], 50);
                                        oci_execute($compiled);
                                        oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
                                        $count = 0;
                                        while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                                            echo "<form id=\"person" . $count . "\" action=\"other-profile.php\" method=\"POST\">";
                                            echo "<input type=\"hidden\" name=\"other-usernameID\" value=\"" . $row['UNID'] . "\" />";
                                            echo "<input type=\"hidden\" name=\"other-name\" value=\"" . $row['FNAME'] . "\" />";
                                            echo "<h3><b><a href=\"#\" onclick=\"document.getElementById('person" . $count . "').submit();\">" . $row['FNAME'] . " "
                                            . $row['LNAME'] . " " . $row['LNAME2'] . "</a></b>, " . $row['AGE'] . "</h3>";
                                            echo "<p>" . $row['TAG'] . "</p>";
                                            echo "<p>Lives in: " . $row['CITY'] . ", " . $row['COUNTRY'] . "</p>";
                                            echo "<hr><br>";
                                            echo "</form>";
                                            $count++;
                                        }
                                        oci_free_statement($compiled);
                                        oci_free_statement($cursor);
                                        unset($_POST["searchBodyType"]);
                                    }
                                    else if (isset($_POST["searchExerciseFrequency"])) {
                                        $cursor = oci_new_cursor($connection);
                                        $query = 'BEGIN find.exerciseFrequency(:searchExerciseFrequency,:cursor); END;';
                                        $compiled = oci_parse($connection, $query);
                                        oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
                                        oci_bind_by_name($compiled, ':searchExerciseFrequency', $_POST["searchExerciseFrequency"], 50);
                                        oci_execute($compiled);
                                        oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
                                        $count = 0;
                                        while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                                            echo "<form id=\"person" . $count . "\" action=\"other-profile.php\" method=\"POST\">";
                                            echo "<input type=\"hidden\" name=\"other-usernameID\" value=\"" . $row['UNID'] . "\" />";
                                            echo "<input type=\"hidden\" name=\"other-name\" value=\"" . $row['FNAME'] . "\" />";
                                            echo "<h3><b><a href=\"#\" onclick=\"document.getElementById('person" . $count . "').submit();\">" . $row['FNAME'] . " "
                                            . $row['LNAME'] . " " . $row['LNAME2'] . "</a></b>, " . $row['AGE'] . "</h3>";
                                            echo "<p>" . $row['TAG'] . "</p>";
                                            echo "<p>Lives in: " . $row['CITY'] . ", " . $row['COUNTRY'] . "</p>";
                                            echo "<hr><br>";
                                            echo "</form>";
                                            $count++;
                                        }
                                        oci_free_statement($compiled);
                                        oci_free_statement($cursor);
                                        unset($_POST["searchExerciseFrequency"]);
                                    }
                                    else if (isset($_POST["searchEyeColor"])) {
                                        $cursor = oci_new_cursor($connection);
                                        $query = 'BEGIN find.eyeColor(:searchEyeColor,:cursor); END;';
                                        $compiled = oci_parse($connection, $query);
                                        oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
                                        oci_bind_by_name($compiled, ':searchEyeColor', $_POST["searchEyeColor"], 50);
                                        oci_execute($compiled);
                                        oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
                                        $count = 0;
                                        while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                                            echo "<form id=\"person" . $count . "\" action=\"other-profile.php\" method=\"POST\">";
                                            echo "<input type=\"hidden\" name=\"other-usernameID\" value=\"" . $row['UNID'] . "\" />";
                                            echo "<input type=\"hidden\" name=\"other-name\" value=\"" . $row['FNAME'] . "\" />";
                                            echo "<h3><b><a href=\"#\" onclick=\"document.getElementById('person" . $count . "').submit();\">" . $row['FNAME'] . " "
                                            . $row['LNAME'] . " " . $row['LNAME2'] . "</a></b>, " . $row['AGE'] . "</h3>";
                                            echo "<p>" . $row['TAG'] . "</p>";
                                            echo "<p>Lives in: " . $row['CITY'] . ", " . $row['COUNTRY'] . "</p>";
                                            echo "<hr><br>";
                                            echo "</form>";
                                            $count++;
                                        }
                                        oci_free_statement($compiled);
                                        oci_free_statement($cursor);
                                        unset($_POST["searchEyeColor"]);
                                    }
                                    else if (isset($_POST["searchGender"])) {
                                        $cursor = oci_new_cursor($connection);
                                        $query = 'BEGIN find.gender(:searchGender,:cursor); END;';
                                        $compiled = oci_parse($connection, $query);
                                        oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
                                        oci_bind_by_name($compiled, ':searchGender', $_POST["searchGender"], 50);
                                        oci_execute($compiled);
                                        oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
                                        $count = 0;
                                        while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                                            echo "<form id=\"person" . $count . "\" action=\"other-profile.php\" method=\"POST\">";
                                            echo "<input type=\"hidden\" name=\"other-usernameID\" value=\"" . $row['UNID'] . "\" />";
                                            echo "<input type=\"hidden\" name=\"other-name\" value=\"" . $row['FNAME'] . "\" />";
                                            echo "<h3><b><a href=\"#\" onclick=\"document.getElementById('person" . $count . "').submit();\">" . $row['FNAME'] . " "
                                            . $row['LNAME'] . " " . $row['LNAME2'] . "</a></b>, " . $row['AGE'] . "</h3>";
                                            echo "<p>" . $row['TAG'] . "</p>";
                                            echo "<p>Lives in: " . $row['CITY'] . ", " . $row['COUNTRY'] . "</p>";
                                            echo "<hr><br>";
                                            echo "</form>";
                                            $count++;
                                        }
                                        oci_free_statement($compiled);
                                        oci_free_statement($cursor);
                                        unset($_POST["searchGender"]);
                                    }
                                    else if (isset($_POST["searchHairColor"])) {
                                        $cursor = oci_new_cursor($connection);
                                        $query = 'BEGIN find.hairColor(:searchHairColor,:cursor); END;';
                                        $compiled = oci_parse($connection, $query);
                                        oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
                                        oci_bind_by_name($compiled, ':searchHairColor', $_POST["searchHairColor"], 50);
                                        oci_execute($compiled);
                                        oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
                                        $count = 0;
                                        while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                                            echo "<form id=\"person" . $count . "\" action=\"other-profile.php\" method=\"POST\">";
                                            echo "<input type=\"hidden\" name=\"other-usernameID\" value=\"" . $row['UNID'] . "\" />";
                                            echo "<input type=\"hidden\" name=\"other-name\" value=\"" . $row['FNAME'] . "\" />";
                                            echo "<h3><b><a href=\"#\" onclick=\"document.getElementById('person" . $count . "').submit();\">" . $row['FNAME'] . " "
                                            . $row['LNAME'] . " " . $row['LNAME2'] . "</a></b>, " . $row['AGE'] . "</h3>";
                                            echo "<p>" . $row['TAG'] . "</p>";
                                            echo "<p>Lives in: " . $row['CITY'] . ", " . $row['COUNTRY'] . "</p>";
                                            echo "<hr><br>";
                                            echo "</form>";
                                            $count++;
                                        }
                                        oci_free_statement($compiled);
                                        oci_free_statement($cursor);
                                        unset($_POST["searchHairColor"]);
                                    }
                                    else if (isset($_POST["searchHobbie"])) {
                                        $cursor = oci_new_cursor($connection);
                                        $query = 'BEGIN find.hobbie(:searchHobbie,:cursor); END;';
                                        $compiled = oci_parse($connection, $query);
                                        oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
                                        oci_bind_by_name($compiled, ':searchHobbie', $_POST["searchHobbie"], 50);
                                        oci_execute($compiled);
                                        oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
                                        $count = 0;
                                        while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                                            echo "<form id=\"person" . $count . "\" action=\"other-profile.php\" method=\"POST\">";
                                            echo "<input type=\"hidden\" name=\"other-usernameID\" value=\"" . $row['UNID'] . "\" />";
                                            echo "<input type=\"hidden\" name=\"other-name\" value=\"" . $row['FNAME'] . "\" />";
                                            echo "<h3><b><a href=\"#\" onclick=\"document.getElementById('person" . $count . "').submit();\">" . $row['FNAME'] . " "
                                            . $row['LNAME'] . " " . $row['LNAME2'] . "</a></b>, " . $row['AGE'] . "</h3>";
                                            echo "<p>" . $row['TAG'] . "</p>";
                                            echo "<p>Lives in: " . $row['CITY'] . ", " . $row['COUNTRY'] . "</p>";
                                            echo "<hr><br>";
                                            echo "</form>";
                                            $count++;
                                        }
                                        oci_free_statement($compiled);
                                        oci_free_statement($cursor);
                                        unset($_POST["searchHobbie"]);
                                    }
                                    else if (isset($_POST["searchInterest"])) {
                                        $cursor = oci_new_cursor($connection);
                                        $query = 'BEGIN find.interest(:searchInterest,:cursor); END;';
                                        $compiled = oci_parse($connection, $query);
                                        oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
                                        oci_bind_by_name($compiled, ':searchInterest', $_POST["searchInterest"], 50);
                                        oci_execute($compiled);
                                        oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
                                        $count = 0;
                                        while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                                            echo "<form id=\"person" . $count . "\" action=\"other-profile.php\" method=\"POST\">";
                                            echo "<input type=\"hidden\" name=\"other-usernameID\" value=\"" . $row['UNID'] . "\" />";
                                            echo "<input type=\"hidden\" name=\"other-name\" value=\"" . $row['FNAME'] . "\" />";
                                            echo "<h3><b><a href=\"#\" onclick=\"document.getElementById('person" . $count . "').submit();\">" . $row['FNAME'] . " "
                                            . $row['LNAME'] . " " . $row['LNAME2'] . "</a></b>, " . $row['AGE'] . "</h3>";
                                            echo "<p>" . $row['TAG'] . "</p>";
                                            echo "<p>Lives in: " . $row['CITY'] . ", " . $row['COUNTRY'] . "</p>";
                                            echo "<hr><br>";
                                            echo "</form>";
                                            $count++;
                                        }
                                        oci_free_statement($compiled);
                                        oci_free_statement($cursor);
                                        unset($_POST["searchInterest"]);
                                    }
                                    else if (isset($_POST["searchLanguage"])) {
                                        $cursor = oci_new_cursor($connection);
                                        $query = 'BEGIN find.languages(:searchLanguage,:cursor); END;';
                                        $compiled = oci_parse($connection, $query);
                                        oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
                                        oci_bind_by_name($compiled, ':searchLanguage', $_POST["searchLanguage"], 50);
                                        oci_execute($compiled);
                                        oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
                                        $count = 0;
                                        while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                                            echo "<form id=\"person" . $count . "\" action=\"other-profile.php\" method=\"POST\">";
                                            echo "<input type=\"hidden\" name=\"other-usernameID\" value=\"" . $row['UNID'] . "\" />";
                                            echo "<input type=\"hidden\" name=\"other-name\" value=\"" . $row['FNAME'] . "\" />";
                                            echo "<h3><b><a href=\"#\" onclick=\"document.getElementById('person" . $count . "').submit();\">" . $row['FNAME'] . " "
                                            . $row['LNAME'] . " " . $row['LNAME2'] . "</a></b>, " . $row['AGE'] . "</h3>";
                                            echo "<p>" . $row['TAG'] . "</p>";
                                            echo "<p>Lives in: " . $row['CITY'] . ", " . $row['COUNTRY'] . "</p>";
                                            echo "<hr><br>";
                                            echo "</form>";
                                            $count++;
                                        }
                                        oci_free_statement($compiled);
                                        oci_free_statement($cursor);
                                        unset($_POST["searchLanguage"]);
                                    }
                                    else if (isset($_POST["searchRelationshipStatus"])) {
                                        $cursor = oci_new_cursor($connection);
                                        $query = 'BEGIN find.relationshipStatus(:searchRelationshipStatus,:cursor); END;';
                                        $compiled = oci_parse($connection, $query);
                                        oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
                                        oci_bind_by_name($compiled, ':searchRelationshipStatus', $_POST["searchRelationshipStatus"], 50);
                                        oci_execute($compiled);
                                        oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
                                        $count = 0;
                                        while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                                            echo "<form id=\"person" . $count . "\" action=\"other-profile.php\" method=\"POST\">";
                                            echo "<input type=\"hidden\" name=\"other-usernameID\" value=\"" . $row['UNID'] . "\" />";
                                            echo "<input type=\"hidden\" name=\"other-name\" value=\"" . $row['FNAME'] . "\" />";
                                            echo "<h3><b><a href=\"#\" onclick=\"document.getElementById('person" . $count . "').submit();\">" . $row['FNAME'] . " "
                                            . $row['LNAME'] . " " . $row['LNAME2'] . "</a></b>, " . $row['AGE'] . "</h3>";
                                            echo "<p>" . $row['TAG'] . "</p>";
                                            echo "<p>Lives in: " . $row['CITY'] . ", " . $row['COUNTRY'] . "</p>";
                                            echo "<hr><br>";
                                            echo "</form>";
                                            $count++;
                                        }
                                        oci_free_statement($compiled);
                                        oci_free_statement($cursor);
                                        unset($_POST["searchRelationshipStatus"]);
                                    }
                                    else if (isset($_POST["searchReligion"])) {
                                        $cursor = oci_new_cursor($connection);
                                        $query = 'BEGIN find.religion(:searchReligion,:cursor); END;';
                                        $compiled = oci_parse($connection, $query);
                                        oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
                                        oci_bind_by_name($compiled, ':searchReligion', $_POST["searchReligion"], 50);
                                        oci_execute($compiled);
                                        oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
                                        $count = 0;
                                        while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                                            echo "<form id=\"person" . $count . "\" action=\"other-profile.php\" method=\"POST\">";
                                            echo "<input type=\"hidden\" name=\"other-usernameID\" value=\"" . $row['UNID'] . "\" />";
                                            echo "<input type=\"hidden\" name=\"other-name\" value=\"" . $row['FNAME'] . "\" />";
                                            echo "<h3><b><a href=\"#\" onclick=\"document.getElementById('person" . $count . "').submit();\">" . $row['FNAME'] . " "
                                            . $row['LNAME'] . " " . $row['LNAME2'] . "</a></b>, " . $row['AGE'] . "</h3>";
                                            echo "<p>" . $row['TAG'] . "</p>";
                                            echo "<p>Lives in: " . $row['CITY'] . ", " . $row['COUNTRY'] . "</p>";
                                            echo "<hr><br>";
                                            echo "</form>";
                                            $count++;
                                        }
                                        oci_free_statement($compiled);
                                        oci_free_statement($cursor);
                                        unset($_POST["searchReligion"]);
                                    }
                                    else if (isset($_POST["searchSexualOrientation"])) {
                                        $cursor = oci_new_cursor($connection);
                                        $query = 'BEGIN find.sexualOrientation(:searchSexualOrientation,:cursor); END;';
                                        $compiled = oci_parse($connection, $query);
                                        oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
                                        oci_bind_by_name($compiled, ':searchSexualOrientation', $_POST["searchSexualOrientation"], 50);
                                        oci_execute($compiled);
                                        oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
                                        $count = 0;
                                        while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                                            echo "<form id=\"person" . $count . "\" action=\"other-profile.php\" method=\"POST\">";
                                            echo "<input type=\"hidden\" name=\"other-usernameID\" value=\"" . $row['UNID'] . "\" />";
                                            echo "<input type=\"hidden\" name=\"other-name\" value=\"" . $row['FNAME'] . "\" />";
                                            echo "<h3><b><a href=\"#\" onclick=\"document.getElementById('person" . $count . "').submit();\">" . $row['FNAME'] . " "
                                            . $row['LNAME'] . " " . $row['LNAME2'] . "</a></b>, " . $row['AGE'] . "</h3>";
                                            echo "<p>" . $row['TAG'] . "</p>";
                                            echo "<p>Lives in: " . $row['CITY'] . ", " . $row['COUNTRY'] . "</p>";
                                            echo "<hr><br>";
                                            echo "</form>";
                                            $count++;
                                        }
                                        oci_free_statement($compiled);
                                        oci_free_statement($cursor);
                                        unset($_POST["searchSexualOrientation"]);
                                    }
                                    else if (isset($_POST["searchSkinColor"])) {
                                        $cursor = oci_new_cursor($connection);
                                        $query = 'BEGIN find.skinColor(:searchSkinColor,:cursor); END;';
                                        $compiled = oci_parse($connection, $query);
                                        oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
                                        oci_bind_by_name($compiled, ':searchSkinColor', $_POST["searchSkinColor"], 50);
                                        oci_execute($compiled);
                                        oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
                                        $count = 0;
                                        while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                                            echo "<form id=\"person" . $count . "\" action=\"other-profile.php\" method=\"POST\">";
                                            echo "<input type=\"hidden\" name=\"other-usernameID\" value=\"" . $row['UNID'] . "\" />";
                                            echo "<input type=\"hidden\" name=\"other-name\" value=\"" . $row['FNAME'] . "\" />";
                                            echo "<h3><b><a href=\"#\" onclick=\"document.getElementById('person" . $count . "').submit();\">" . $row['FNAME'] . " "
                                            . $row['LNAME'] . " " . $row['LNAME2'] . "</a></b>, " . $row['AGE'] . "</h3>";
                                            echo "<p>" . $row['TAG'] . "</p>";
                                            echo "<p>Lives in: " . $row['CITY'] . ", " . $row['COUNTRY'] . "</p>";
                                            echo "<hr><br>";
                                            echo "</form>";
                                            $count++;
                                        }
                                        oci_free_statement($compiled);
                                        oci_free_statement($cursor);
                                        unset($_POST["searchSkinColor"]);
                                    }
                                    else if (isset($_POST["searchZodiacSign"])) {
                                        $cursor = oci_new_cursor($connection);
                                        $query = 'BEGIN find.zodiacSign(:searchZodiacSign,:cursor); END;';
                                        $compiled = oci_parse($connection, $query);
                                        oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
                                        oci_bind_by_name($compiled, ':searchZodiacSign', $_POST["searchZodiacSign"], 50);
                                        oci_execute($compiled);
                                        oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
                                        $count = 0;
                                        while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                                            echo "<form id=\"person" . $count . "\" action=\"other-profile.php\" method=\"POST\">";
                                            echo "<input type=\"hidden\" name=\"other-usernameID\" value=\"" . $row['UNID'] . "\" />";
                                            echo "<input type=\"hidden\" name=\"other-name\" value=\"" . $row['FNAME'] . "\" />";
                                            echo "<h3><b><a href=\"#\" onclick=\"document.getElementById('person" . $count . "').submit();\">" . $row['FNAME'] . " "
                                            . $row['LNAME'] . " " . $row['LNAME2'] . "</a></b>, " . $row['AGE'] . "</h3>";
                                            echo "<p>" . $row['TAG'] . "</p>";
                                            echo "<p>Lives in: " . $row['CITY'] . ", " . $row['COUNTRY'] . "</p>";
                                            echo "<hr><br>";
                                            echo "</form>";
                                            $count++;
                                        }
                                        oci_free_statement($compiled);
                                        oci_free_statement($cursor);
                                        unset($_POST["searchZodiacSign"]);
                                    }
                                ?>
                            </div>
                            <div class = "col-md-1">
                                <div class = "search-icon">
                                    <div class = "thumbnail">
                                        <input type="image" src = "imgs/search-button.png" alt="submit">
                                    </div>
                                </div>
                            </div>
                        </div>       
                    </div>
                </div>
                <div class = "col-md-2">
                    <div class="search-information"></div>
                    <div class="search-statistics"></div>
                </div>
            </div>
        </form>
    </div>
    
    <div class = "footer">
        <a href = "#" class="btn-link" data-toggle="modal" data-target="#myModal3">Legal Disclaimer</a>
        <p>Bases de Datos 1, Proyecto 1 - Match.Me, Profesora: Adriana Alvarez</p>
        <p>Estudiantes: Alexis Arguedas, Gabriela Garro, Yanil Gomez</p>
        <p>2015, II Semestre</p>
    </div>
	
</body>
</html>