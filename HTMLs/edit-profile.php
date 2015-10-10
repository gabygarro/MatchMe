<?php
    /* Proyecto I Bases de Datos - Prof. Adriana Álvarez
   * match.me - Oracle
   * Alexis Arguedas, Gabriela Garro, Yanil Gómez
   * -------------------------------------------------
   * edit-profile.php - Created: 29/09/2015
   * Lets the user edit its information. It submits to change-profile.php
   * City, Country and birthday can be left null and it will not affect the profile change.
   */
    include('session.php');
    if(!isset($_SESSION['usernameID'])) {
        header("Location: index.php#notloggedin");
    }
    if($_SESSION['userType'] != 2) { //if it's not a normal user
        header("Location: index.php#notnormaluser");
    }
?>

<!DOCTYPE html>
<html>

  <head>
    <link rel="shortcut icon" href= "imgs/logo (1).png">
    <title><?php echo "Create profile - match.me"?></title>

    <link href="http://s3.amazonaws.com/codecademy-content/courses/ltp/css/shift.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="utils/bootstrap.css">
    <link rel="stylesheet" href="utils/bootstrap.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="assets/css/form-elements.css">
    <link rel="stylesheet" href="assets/css/style.css">
    
    <link rel="stylesheet" href="utils/bootstrap-theme.min.css">
    <script src="utils/jquery-1.11.1.min.js"></script>
    <script src="utils/bootstrap.min.js"></script>
    <link rel="stylesheet" type="css" href="utils/main.css"/>

    <script> //populate countries and cities selection boxes
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

  <!-- Upper navigation bar -->
    <div class="nav">
      <div class="container">
        <ul class = "pull-left">
            <img src = "imgs/logopeq.png">
            <li><a href="homepage.php" >match.me</a></li>
        </ul>
        <ul class = "pull-right">
          <li><a href="profile.php">Profile</a></li>
          <li><a href="#">Messages</a></li>
          <li><a href="#">Notifications</a></li>
          <li><a href="#">Settings</a></li>
          <li><a href="logout.php" onclick="return confirm('Are you sure to logout?');">Log out</a></li>
        </ul>
      </div>
    </div>

    <div class = "profile-body">
        <div class = "container">
            <div class="panel with-nav-tabs panel-default">
                <form role="form" action="change-profile.php" method="POST" enctype="multipart/form-data">
                    <div class = "create-profile-container">
                        <div class = "obligatory-field">
                            <p>* indicates an obligatory field</p> 
                        </div>

                        <div class = "error">
                            <?php if (isset($_SESSION['error'])) {
                                echo $_SESSION['error'];
                                $_SESSION['error'] = "";
                            } ?>
                        </div>
                                                   
                        <h3><b>Basic information</b></h3>
                        <hr>

                        <div class = "row">
                            <div class="container">
                                <h3>Profile picture</h3>
                                <input type="file" name="picture" id = "picture" accept="image/*">
                            </div>
                                
                            <div class = "col-md-4">

                                <h3>Name<b> *</b></h3>
                                <input type="text" name="name" placeholder="Name..." class="form-full-name form-control" 
                                    id="form-full-name" maxlength="50" value = <?php if (isset($_SESSION["name"])) echo "\"" . $_SESSION["name"] . "\"" ?> >
                            </div>
                            <div class = "col-md-4">
                                <h3>Last name<b> *</b></h3>
                                <input type="text" name="last-name" placeholder="Last name..." class="form-full-name form-control" 
                                    id="form-full-name" maxlength="50" value = <?php if (isset($_SESSION["lastName"])) echo "\"" . $_SESSION["lastName"] . "\"" ?> >
                            </div>
                            <div class = "col-md-4">
                                <h3>Second last name</h3>
                                <input type="text" name="last-name2" placeholder="Second last name..." class="form-full-name form-control" 
                                    id="form-full-name" maxlength="50" value = <?php if (isset($_SESSION["lastName2"])) echo "\"" . $_SESSION["lastName2"] . "\"" ?> >
                            </div>
                        </div>
                        <div class="row">
                            <div class = "col-md-4">
                                <h3>Nickname</h3>
                                <input type="text" name="nickname" placeholder="Nickname..." class="form-surname form-control" 
                                    id="form-surname" maxlength="25" value = <?php if (isset($_SESSION["nickname"])) echo "\"" . $_SESSION["nickname"] . "\"" ?> >
                            </div>
                            <div class = "col-md-4">
                                <h3>Birthdate<b> *</b></h3>
                                <input type="date" name="bday" class="form-control">
                            </div>
                            <div class = "col-md-4">
                                <h3>Zodiac Sign<b> *</b></h3>
                                <select name = "zodiac"> <?php
                                    $cursor = oci_new_cursor($connection);
                                    $query = 'BEGIN getCatalog.zodiacSign(:cursor); END;';
                                    $compiled = oci_parse($connection, $query);
                                    oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
                                    oci_execute($compiled);
                                    oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
                                    if (isset($_SESSION["zodiacID"])) {
                                        while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                                            if ($row['TYPENAMEID'] == $_SESSION["zodiacID"]) {
                                                echo "<option value=" . $row['TYPENAMEID'] . " selected = \"selected\" " . ">" . 
                                                    $row['TYPENAME'] . "</option>";
                                            }
                                            else {
                                                echo "<option value=" . $row['TYPENAMEID'] . ">" . $row['TYPENAME'] . "</option>";
                                            }
                                        }
                                    }
                                    else {
                                        while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                                            echo "<option value=" . $row['TYPENAMEID'] . ">" . $row['TYPENAME'] . "</option>";
                                        }
                                    }
                                    oci_free_statement($compiled);
                                    oci_free_statement($cursor);
                                ?></select>
                            </div>
                        </div>

                        <h3>Tagline</h3>
                        <input type="text" name = "tagline" placeholder = "Describe yourself in a few words..." maxlength="200"
                             value = <?php if (isset($_SESSION["tagline"])) echo "\"" . $_SESSION["tagline"] . "\"" ?> > 
                           
                        <div class="row">
                            <div class = "col-md-4">
                                <h3>Gender<b> *</b></h3>
                                <select name = "gender"><?php
                                    $cursor = oci_new_cursor($connection);
                                    $query = 'BEGIN getCatalog.gender(:cursor); END;';
                                    $compiled = oci_parse($connection, $query);
                                    oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
                                    oci_execute($compiled);
                                    oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
                                    if (isset($_SESSION["genderID"])) {
                                        while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                                            if ($row['TYPENAMEID'] == $_SESSION["genderID"]) {
                                                echo "<option value=" . $row['TYPENAMEID'] . " selected = \"selected\" " . ">" . 
                                                    $row['TYPENAME'] . "</option>";
                                            }
                                            else {
                                                echo "<option value=" . $row['TYPENAMEID'] . ">" . $row['TYPENAME'] . "</option>";
                                            }
                                        }
                                    }
                                    else {
                                        while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                                            echo "<option value=" . $row['TYPENAMEID'] . ">" . $row['TYPENAME'] . "</option>";
                                        }
                                    }
                                    oci_free_statement($compiled);
                                    oci_free_statement($cursor);
                                ?></select>
                            </div>
                            
                            <div class = "col-md-4">
                                <h3>Sexual Orientation<b> *</b></h3>
                                <select name = "sexual-orientation"><?php
                                    $cursor = oci_new_cursor($connection);
                                    $query = 'BEGIN getCatalog.sexualorientation(:cursor); END;';
                                    $compiled = oci_parse($connection, $query);
                                    oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
                                    oci_execute($compiled);
                                    oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
                                    if (isset($_SESSION["sexualOrientationID"])) {
                                        while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                                            if ($row['TYPENAMEID'] == $_SESSION["sexualOrientationID"]) {
                                                echo "<option value=" . $row['TYPENAMEID'] . " selected = \"selected\" " . ">" . 
                                                    $row['TYPENAME'] . "</option>";
                                            }
                                            else {
                                                echo "<option value=" . $row['TYPENAMEID'] . ">" . $row['TYPENAME'] . "</option>";
                                            }
                                        }
                                    }
                                    else {
                                        while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                                            echo "<option value=" . $row['TYPENAMEID'] . ">" . $row['TYPENAME'] . "</option>";
                                        }
                                    }
                                    oci_free_statement($compiled);
                                    oci_free_statement($cursor);
                                ?></select>
                            </div>
                            
                            <div class = "col-md-4">
                                <h3>Relationship status<b> *</b></h3>
                                <select name = "relationship-status"><?php
                                    $cursor = oci_new_cursor($connection);
                                    $query = 'BEGIN getCatalog.relationshipstatus(:cursor); END;';
                                    $compiled = oci_parse($connection, $query);
                                    oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
                                    oci_execute($compiled);

                                    oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
                                    if (isset($_SESSION["relationshipStatusID"])) {
                                        while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                                            if ($row['TYPENAMEID'] == $_SESSION["relationshipStatusID"]) {
                                                echo "<option value=" . $row['TYPENAMEID'] . " selected = \"selected\" " . ">" . 
                                                    $row['TYPENAME'] . "</option>";
                                            }
                                            else {
                                                echo "<option value=" . $row['TYPENAMEID'] . ">" . $row['TYPENAME'] . "</option>";
                                            }
                                        }
                                    }
                                    else {
                                        while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                                            echo "<option value=" . $row['TYPENAMEID'] . ">" . $row['TYPENAME'] . "</option>";
                                        }
                                    }
                                    oci_free_statement($compiled);
                                    oci_free_statement($cursor);
                                ?></select>
                            </div>
                        </div>

                        <div class="row">
                            <div class = "col-md-6">
                                <h3>Country<b> *</b></h3>
                                <select id="country" name ="country"></select>
                            </div>
                            <div class = "col-md-6">
                                <h3>City<b> *</b></h3>
                                
                            </div>
                        </div>

                        <h3>Address</h3>
                        <input type="text" name = "address" placeholder = "Address..." maxlength="140"
                            value = <?php if (isset($_SESSION["address"])) echo "\"" . $_SESSION["address"] . "\"" ?> >

                        <br><br>
                        <h3><b>Match information</b></h3><hr>
                        <h3>Desired partner's age range<b> *</b></h3>
                        <select name = "age-range"><?php
                            $cursor = oci_new_cursor($connection);
                            $query = 'BEGIN getCatalog.agerange(:cursor); END;';
                            $compiled = oci_parse($connection, $query);
                            oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
                            oci_execute($compiled);

                            oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
                            if (isset($_SESSION["ageRangeID"])) {
                                while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                                    if ($row['TYPENAMEID'] == $_SESSION["ageRangeID"]) {
                                        echo "<option value=" . $row['TYPENAMEID'] . " selected = \"selected\" " . ">" . 
                                            $row['TYPENAME'] . "</option>";
                                    }
                                    else {
                                        echo "<option value=" . $row['TYPENAMEID'] . ">" . $row['TYPENAME'] . "</option>";
                                    }
                                }
                            }
                            else {
                                while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                                    echo "<option value=" . $row['TYPENAMEID'] . ">" . $row['TYPENAME'] . "</option>";
                                }
                            }
                            oci_free_statement($compiled);
                            oci_free_statement($cursor);
                        ?></select>
                        <h3>Have you found a partner through this network?<b> *</b></h3>
                            <input type="radio" name="found-partner" value=0 <?php if ($_SESSION["foundPartner"] == 0) echo "checked"?>> No
                            <input type="radio" name="found-partner" value=1 <?php if ($_SESSION["foundPartner"] == 1) echo "checked"?>> Yes
                        <h3>Have you got married through this network?<b> *</b></h3>
                            <input type="radio" name="got-married" value=0 <?php if ($_SESSION["gotMarried"] == 0) echo "checked"?>> No
                            <input type="radio" name="got-married" value=1 <?php if ($_SESSION["gotMarried"] == 1) echo "checked"?>> Yes



                        <br><br>
                        <h3><b>Education and work</b></h3>
                        <hr>

                        <div class="row">
                            <div class = "col-md-6">
                                <h3>High school</h3>
                                <input type="text" name = "highschool" placeholder = "High school..." maxlength="100"
                                    value = <?php if (isset($_SESSION["highschool"])) echo "\"" . $_SESSION["highschool"] . "\"" ?> >
                            </div>
                            <div class = "col-md-6">
                                <h3>University</h3>
                                <input type="text" name = "university" placeholder="University..." maxlength="100"
                                    value = <?php if (isset($_SESSION["university"])) echo "\"" . $_SESSION["university"] . "\"" ?> >
                            </div>
                        </div>

                        <div class="row">
                            <div class = "col-md-6">
                                <h3>Work</h3>
                                <br>
                                <input type="text" name = "work" placeholder="Workplace..." maxlength="100"
                                    value = <?php if (isset($_SESSION["work"])) echo "\"" . $_SESSION["work"] . "\"" ?> >
                            </div>
                            <div class = "col-md-6">
                                <h3>Salary</h3>
                                <p>How much dollars you earn a year</p>
                                <input type="number" name = "salary" min="1" max="1000000000"
                                    value = <?php if (isset($_SESSION["salary"])) echo "\"" . $_SESSION["salary"] . "\"" ?> >
                            </div>
                        </div>

                        <h3>Languages</h3>
                        <?php
                            $countLanguages = 0;
                            $cursor = oci_new_cursor($connection);
                            $query = 'BEGIN getCatalog.languages(:cursor, :countLanguages); END;';
                            $compiled = oci_parse($connection, $query);
                            oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
                            oci_bind_by_name($compiled, ':countLanguages', $countLanguages, 3);
                            oci_execute($compiled);

                            oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
                            $_SESSION['countLanguages'] = $countLanguages;
                            
                            echo "<div class = \"row\">";
                            $currentLanguage = 0;
                            $currentColumn = 0;
                            //$numberColumns = 3;
                            while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                                //if currentLanguage is the first of the current column
                                if($currentLanguage == round($countLanguages/3*$currentColumn, 0, PHP_ROUND_HALF_DOWN)) {
                                    echo "<div class = \"col-md-4\">";
                                }

                                if (isset($_SESSION['language' . $currentLanguage]) && 
                                    $row['TYPENAMEID'] == $_SESSION['language' . $currentLanguage]) {

                                    echo "<input type=\"checkbox\" name = \"language" . $currentLanguage . "\" value=\"" . 
                                    $row['TYPENAMEID'] . "\" checked>" . $row['TYPENAME'] . "<br>";
                                }
                                else {
                                    echo "<input type=\"checkbox\" name = \"language" . $currentLanguage . "\" value=\"" . 
                                    $row['TYPENAMEID'] . "\">" . $row['TYPENAME'] . "<br>";
                                }
                                $currentLanguage++;
                                //if the next language to show is the same as the first language number of the next column
                                if ($currentLanguage == round($countLanguages/3*($currentColumn+1), 0, PHP_ROUND_HALF_DOWN)) {
                                    echo "</div>";  //close this column
                                    $currentColumn++;
                                }
                            }
                            echo "</div>";  //close the row class

                            oci_free_statement($compiled);
                            oci_free_statement($cursor);
                        ?>
                        
                        <h3>Religion<b> *</b></h3>
                        <select name = "religion"><?php
                            $cursor = oci_new_cursor($connection);
                            $query = 'BEGIN getCatalog.religion(:cursor); END;';
                            $compiled = oci_parse($connection, $query);
                            oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
                            oci_execute($compiled);

                            oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
                            if (isset($_SESSION["religionID"])) {
                                while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                                    if ($row['TYPENAMEID'] == $_SESSION["religionID"]) {
                                        echo "<option value=" . $row['TYPENAMEID'] . " selected = \"selected\" " . ">" . 
                                            $row['TYPENAME'] . "</option>";
                                    }
                                    else {
                                        echo "<option value=" . $row['TYPENAMEID'] . ">" . $row['TYPENAME'] . "</option>";
                                    }
                                }
                            }
                            else {
                                while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                                    echo "<option value=" . $row['TYPENAMEID'] . ">" . $row['TYPENAME'] . "</option>";
                                }
                            }
                            oci_free_statement($compiled);
                            oci_free_statement($cursor);
                        ?></select>

                        <br><br>
                        <h3><b>Physical information</b></h3>
                        <hr>
                           
                        <div class="row">
                            <div class = "col-md-6">
                                <h3>Height (meters)<b> *</b></h3>
                                <input type="number" name="height" min="0.3" max="3" step="0.1"
                                    value = <?php if (isset($_SESSION["height"])) echo "\"" . $_SESSION["height"] . "\"" ?> >
                            </div>
                            <div class = "col-md-6">
                                <h3>Body type<b> *</b> <a href = "#" class="btn-link" data-toggle="modal" data-target="#myModal4">
                                <font size="3"> [i]</font></a></h3>
                                <select name = "body-type"><?php
                                    $cursor = oci_new_cursor($connection);
                                    $query = 'BEGIN getCatalog.bodyType(:cursor); END;';
                                    $compiled = oci_parse($connection, $query);
                                    oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
                                    oci_execute($compiled);

                                    oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
                                    if (isset($_SESSION["bodyTypeID"])) {
                                        while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                                            if ($row['TYPENAMEID'] == $_SESSION["bodyTypeID"]) {
                                                echo "<option value=" . $row['TYPENAMEID'] . " selected = \"selected\" " . ">" . 
                                                    $row['TYPENAME'] . "</option>";
                                            }
                                            else {
                                                echo "<option value=" . $row['TYPENAMEID'] . ">" . $row['TYPENAME'] . "</option>";
                                            }
                                        }
                                    }
                                    else {
                                        while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                                            echo "<option value=" . $row['TYPENAMEID'] . ">" . $row['TYPENAME'] . "</option>";
                                        }
                                    }
                                    oci_free_statement($compiled);
                                    oci_free_statement($cursor);
                                ?></select>
                            </div>
                        </div>
                                
                        <div class="row">
                            <div class = "col-md-6">
                                <h3>Skin color<b> *</b></h3>
                                <select name = "skin-color"><?php
                                    $cursor = oci_new_cursor($connection);
                                    $query = 'BEGIN getCatalog.skinColor(:cursor); END;';
                                    $compiled = oci_parse($connection, $query);
                                    oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
                                    oci_execute($compiled);

                                    oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
                                    if (isset($_SESSION["skinColorID"])) {
                                        while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                                            if ($row['TYPENAMEID'] == $_SESSION["skinColorID"]) {
                                                echo "<option value=" . $row['TYPENAMEID'] . " selected = \"selected\" " . ">" . 
                                                    $row['TYPENAME'] . "</option>";
                                            }
                                            else {
                                                echo "<option value=" . $row['TYPENAMEID'] . ">" . $row['TYPENAME'] . "</option>";
                                            }
                                        }
                                    }
                                    else {
                                        while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                                            echo "<option value=" . $row['TYPENAMEID'] . ">" . $row['TYPENAME'] . "</option>";
                                        }
                                    }
                                    oci_free_statement($compiled);
                                    oci_free_statement($cursor);
                                ?></select>
                            </div>
                            <div class = "col-md-6">
                                <h3>Eye color<b> *</b></h3>
                                <select name = "eye-color"><?php
                                    $cursor = oci_new_cursor($connection);
                                    $query = 'BEGIN getCatalog.eyeColor(:cursor); END;';
                                    $compiled = oci_parse($connection, $query);
                                    oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
                                    oci_execute($compiled);

                                    oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
                                    if (isset($_SESSION["eyeColorID"])) {
                                        while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                                            if ($row['TYPENAMEID'] == $_SESSION["eyeColorID"]) {
                                                echo "<option value=" . $row['TYPENAMEID'] . " selected = \"selected\" " . ">" . 
                                                    $row['TYPENAME'] . "</option>";
                                            }
                                            else {
                                                echo "<option value=" . $row['TYPENAMEID'] . ">" . $row['TYPENAME'] . "</option>";
                                            }
                                        }
                                    }
                                    else {
                                        while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                                            echo "<option value=" . $row['TYPENAMEID'] . ">" . $row['TYPENAME'] . "</option>";
                                        }
                                    }
                                    oci_free_statement($compiled);
                                    oci_free_statement($cursor);
                                ?></select>
                            </div>
                        </div>
                                
                        <div class="row">
                            <div class = "col-md-6">
                                <h3>Hair color<b> *</b></h3>
                                <select name = "hair-color"><?php
                                    $cursor = oci_new_cursor($connection);
                                    $query = 'BEGIN getCatalog.hairColor(:cursor); END;';
                                    $compiled = oci_parse($connection, $query);
                                    oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
                                    oci_execute($compiled);

                                    oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
                                    if (isset($_SESSION["hairColorID"])) {
                                        while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                                            if ($row['TYPENAMEID'] == $_SESSION["hairColorID"]) {
                                                echo "<option value=" . $row['TYPENAMEID'] . " selected = \"selected\" " . ">" . 
                                                    $row['TYPENAME'] . "</option>";
                                            }
                                            else {
                                                echo "<option value=" . $row['TYPENAMEID'] . ">" . $row['TYPENAME'] . "</option>";
                                            }
                                        }
                                    }
                                    else {
                                        while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                                            echo "<option value=" . $row['TYPENAMEID'] . ">" . $row['TYPENAME'] . "</option>";
                                        }
                                    }
                                    oci_free_statement($compiled);
                                    oci_free_statement($cursor);
                                ?></select>
                            </div>
                            <div class = "col-md-6">
                                
                            </div>
                        </div>
                         
                        <br><br>
                        <h3><b>Lifestyle</b></h3>
                        <hr>
                        
                        <div class="row">
                            <div class = "col-md-6">
                                <h3>Smoker<b> *</b></h3>
                                <input type="radio" name="smoker" value=0 <?php if ($_SESSION["smoker"] == 0) echo "checked"?> > No
                                <input type="radio" name="smoker" value=1 <?php if ($_SESSION["smoker"] == 1) echo "checked"?> > Yes
                            </div>
                            <div class = "col-md-6">
                                <h3>Drinker<b> *</b></h3>
                                <input type="radio" name="drinker" value=0 <?php if ($_SESSION["drinker"] == 0) echo "checked"?> > No
                                <input type="radio" name="drinker" value=1 <?php if ($_SESSION["drinker"] == 1) echo "checked"?> > Yes
                            </div>
                        </div>        
                         
                        <h3>Exercise Frequency<b> *</b></h3>
                        <p>On a week period</p>
                        <select name = "exercise-frequency"><?php
                            $cursor = oci_new_cursor($connection);
                            $query = 'BEGIN getCatalog.exerciseFrequency(:cursor); END;';
                            $compiled = oci_parse($connection, $query);
                            oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
                            oci_execute($compiled);

                            oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
                            if (isset($_SESSION["exerciseFrequencyID"])) {
                                while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                                    if ($row['TYPENAMEID'] == $_SESSION["exerciseFrequencyID"]) {
                                        echo "<option value=" . $row['TYPENAMEID'] . " selected = \"selected\" " . ">" . 
                                            $row['TYPENAME'] . "</option>";
                                    }
                                    else {
                                        echo "<option value=" . $row['TYPENAMEID'] . ">" . $row['TYPENAME'] . "</option>";
                                    }
                                }
                            }
                            else {
                                while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                                    echo "<option value=" . $row['TYPENAMEID'] . ">" . $row['TYPENAME'] . "</option>";
                                }
                            }
                            oci_free_statement($compiled);
                            oci_free_statement($cursor);
                        ?></select>

                        <div class="row">
                            <div class = "col-md-6">
                                <h3>Number of kids<b> *</b></h3>
                                <input type="number" name="number-kids" min="0" max="20" step="1"
                                    <?php if (isset($_SESSION['numberKids'])) echo "value = " . $_SESSION['numberKids'] ?> >
                            </div>
                            <div class = "col-md-6">
                                <h3>Interested in having children<b> *</b></h3>
                                <input type="radio" name="interested-children" value=0 <?php if ($_SESSION["interestedChildren"] == 0) echo "checked"?>> No
                                <input type="radio" name="interested-children" value=1 <?php if ($_SESSION["interestedChildren"] == 1) echo "checked"?>> Yes
                            </div>
                        </div>
                        
                        <h3>Likes pets<b> *</b></h3>
                        <input type="radio" name="likes-pets" value=0 <?php if ($_SESSION["likesPets"] == 0) echo "checked"?>> No
                        <input type="radio" name="likes-pets" value=1 <?php if ($_SESSION["likesPets"] == 1) echo "checked"?>> Yes
                        <br><br>
                        <h3><b>Interests and hobbies</b></h3>
                        <hr>

                        <h3>Interests</h3>
                        <div class = "interests">
                            <?php
                                $countInterests = 0;
                                $cursor = oci_new_cursor($connection);
                                $query = 'BEGIN getCatalog.interest(:cursor, :countInterests); END;';
                                $compiled = oci_parse($connection, $query);
                                oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
                                oci_bind_by_name($compiled, ':countInterests', $countInterests, 3);
                                oci_execute($compiled);

                                oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
                                $_SESSION['countInterests'] = $countInterests;

                                echo "<div class = \"row\">";
                                $currentInterest = 0;
                                $currentColumn = 0;
                                //$numberColumns = 3;
                                while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                                    //if currentInterest is the first of the current column
                                    if($currentInterest == round($countInterests/3*$currentColumn, 0, PHP_ROUND_HALF_DOWN)) {
                                        echo "<div class = \"col-md-4\">";
                                    }
                                    if (isset($_SESSION['interest' . $currentInterest]) && 
                                        $row['TYPENAMEID'] == $_SESSION['interest' . $currentInterest]) {

                                        echo "<input type=\"checkbox\" name = \"interest" . $currentInterest . "\" value=\"" . 
                                        $row['TYPENAMEID'] . "\" checked>" . $row['TYPENAME'] . "<br>";
                                    }
                                    else {
                                        echo "<input type=\"checkbox\" name = \"interest" . $currentInterest . "\" value=\"" . 
                                        $row['TYPENAMEID'] . "\">" . $row['TYPENAME'] . "<br>";
                                    }
                                        
                                    $currentInterest++;
                                    //if the next interest to show is the same as the first interest number of the next column
                                    if ($currentInterest == round($countInterests/3*($currentColumn+1), 0, PHP_ROUND_HALF_DOWN)) {
                                        echo "</div>";  //close this column
                                        $currentColumn++;
                                    }
                                }
                                echo "</div>";  //close the row class

                                oci_free_statement($compiled);
                                oci_free_statement($cursor);
                            ?>
                        </div>
                        <h3>Hobbies</h3>
                        <div class = "hobbies">
                            <?php
                                $countHobbies = 0;
                                $cursor = oci_new_cursor($connection);
                                $query = 'BEGIN getCatalog.Hobbie(:cursor, :countHobbies); END;';
                                $compiled = oci_parse($connection, $query);
                                oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
                                oci_bind_by_name($compiled, ':countHobbies', $countHobbies, 3);
                                oci_execute($compiled);

                                oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
                                $_SESSION['countHobbies'] = $countHobbies;

                                echo "<div class = \"row\">";
                                $currentHobbie = 0;
                                $currentColumn = 0;
                                //$numberColumns = 3;
                                while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                                    //if currentHobbie is the first of the current column
                                    if($currentHobbie == round($countHobbies/3*$currentColumn, 0, PHP_ROUND_HALF_DOWN)) {
                                        echo "<div class = \"col-md-4\">";
                                    }
                                    if (isset($_SESSION['hobbie' . $currentHobbie]) && 
                                        $row['TYPENAMEID'] == $_SESSION['hobbie' . $currentHobbie]) {

                                        echo "<input type=\"checkbox\" name = \"hobbie" . $currentHobbie . "\" value=\"" . 
                                        $row['TYPENAMEID'] . "\" checked>" . $row['TYPENAME'] . "<br>";
                                    }
                                    else {
                                        echo "<input type=\"checkbox\" name = \"hobbie" . $currentHobbie . "\" value=\"" . 
                                    $row['TYPENAMEID'] . "\">" . $row['TYPENAME'] . "<br>";
                                    }
                                    $currentHobbie++;
                                    //if the next hobbie to show is the same as the first hobbie number of the next column
                                    if ($currentHobbie == round($countHobbies/3*($currentColumn+1), 0, PHP_ROUND_HALF_DOWN)) {
                                        echo "</div>";  //close this column
                                        $currentColumn++;
                                    }
                                }
                                echo "</div>";  //close the row class

                                oci_free_statement($compiled);
                                oci_free_statement($cursor);
                            ?>
                            <br>
                            <input type = "submit" value = "Edit profile">
                            <br>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--DISCLAIMER MODAL-->
    <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Legal Disclaimer</h4>
          </div>
          <div class="modal-body">
            <p>We are not responsible for psychopaths contacting you because of your profile</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!--BODY TYPE MODAL-->
    <div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Body type information</h4>
          </div>
          <div class="modal-body">
            <img src = "http://www.gffi-fitness.org/wp-content/uploads/2015/09/body_types.jpg">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
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