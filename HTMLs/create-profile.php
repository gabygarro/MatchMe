<?php
    //user profile
    //include ('login.php');
    include('session.php');
    if(!isset($_SESSION['userID'])) {
        header("Location: http://localhost/MatchMe/HTMLs/index.php#notloggedin");
    }
    if ($_SESSION['userType'] != 2) { //if it's not a normal user
        header("Location: http://localhost/MatchMe/HTMLs/index.php#notnormaluser");
    }
    //echo $_SESSION['firstName'];
?>

<!DOCTYPE html>
<!--match.me :: Alexis Arguedas - Gabriela Garro - Yanil Gómez -->

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

    <div class = "profile-body">
        <div class = "container">
            <div class="panel with-nav-tabs panel-default">
                <form role="form" action="create-person.php" method="POST">
                    <div class = "create-profile-container">
                        <h3><b>Basic information</b></h3>
                        <hr>

                        <div class = "row">
                            <div class = "col-md-4">
                                <h3>Name</h3>
                                <input type="text" name="name" placeholder="Name..." class="form-full-name form-control" 
                                    id="form-full-name" maxlength="50" value = <?php if (isset($_SESSION["name"])) echo "\"" . $_SESSION["name"] . "\"" ?> >
                            </div>
                            <div class = "col-md-4">
                                <h3>Last name</h3>
                                <input type="text" name="last-name" placeholder="Last name..." class="form-full-name form-control" 
                                    id="form-full-name" maxlength="50" value = <?php if (isset($_SESSION["last-name"])) echo "\"" . $_SESSION["last-name"] . "\"" ?>>
                            </div>
                            <div class = "col-md-4">
                                <h3>Second last name</h3>
                                <input type="text" name="last-name2" placeholder="Second last name..." class="form-full-name form-control" 
                                    id="form-full-name" maxlength="50">
                            </div>
                        </div>
                        <div class="row">
                            <div class = "col-md-4">
                                <h3>Nickname</h3>
                                <input type="text" name="nickname" placeholder="Nickname..." class="form-surname form-control" 
                                    id="form-surname" maxlength="25">
                            </div>
                            <div class = "col-md-4">
                                <h3>Birthdate</h3>
                                <input type="date" name="bday" class="form-control">
                            </div>
                            <div class = "col-md-4">
                                <h3>Zodiac Sign</h3>
                                <select name = "zodiac"> <?php
                                    $cursor = oci_new_cursor($connection);
                                    $query = 'BEGIN getCatalog.zodiacSign(:cursor); END;';
                                    $compiled = oci_parse($connection, $query);
                                    oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
                                    oci_execute($compiled);

                                    oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
                                    while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                                        echo "<option value=" . $row['TYPENAMEID'] . ">" . $row['TYPENAME'] . "</option>";
                                    }
                                    oci_free_statement($compiled);
                                    oci_free_statement($cursor);
                                ?></select>
                            </div>
                        </div>

                        <h3>Tagline</h3>
                        <input type="text" name = "tagline" placeholder = "Describe yourself in a few words..." maxlength="200"> 
                           
                        <div class="row">
                            <div class = "col-md-4">
                                <h3>Gender</h3>
                                <select name = "gender"><?php
                                    $cursor = oci_new_cursor($connection);
                                    $query = 'BEGIN getCatalog.gender(:cursor); END;';
                                    $compiled = oci_parse($connection, $query);
                                    oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
                                    oci_execute($compiled);

                                    oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
                                    while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                                        echo "<option value=" . $row['TYPENAMEID'] . ">" . $row['TYPENAME'] . "</option>";
                                    }
                                    oci_free_statement($compiled);
                                    oci_free_statement($cursor);
                                ?></select>
                            </div>
                            <div class = "col-md-4">
                                <h3>Sexual Orientation</h3>
                                <select name = "sexual-orientation"><?php
                                    $cursor = oci_new_cursor($connection);
                                    $query = 'BEGIN getCatalog.sexualorientation(:cursor); END;';
                                    $compiled = oci_parse($connection, $query);
                                    oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
                                    oci_execute($compiled);

                                    oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
                                    while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                                        echo "<option value=" . $row['TYPENAMEID'] . ">" . $row['TYPENAME'] . "</option>";
                                    }
                                    oci_free_statement($compiled);
                                    oci_free_statement($cursor);
                                ?></select>
                            </div>
                            <div class = "col-md-4">
                                <h3>Relationship status</h3>
                                <select name = "relationship-status"><?php
                                    $cursor = oci_new_cursor($connection);
                                    $query = 'BEGIN getCatalog.relationshipstatus(:cursor); END;';
                                    $compiled = oci_parse($connection, $query);
                                    oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
                                    oci_execute($compiled);

                                    oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
                                    while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                                        echo "<option value=" . $row['TYPENAMEID'] . ">" . $row['TYPENAME'] . "</option>";
                                    }
                                    oci_free_statement($compiled);
                                    oci_free_statement($cursor);
                                ?></select>
                            </div>
                        </div>

                        <div class="row">
                            <div class = "col-md-6">
                                <h3>Country</h3>
                                <select id="country" name ="country"></select>
                            </div>
                            <div class = "col-md-6">
                                <h3>City</h3>
                                <select name ="state" id ="state"></select>
                                <script>
                                    populateCountries("country", "state");
                                </script>
                            </div>
                        </div>

                        <h3>Address</h3>
                        <input type="text" name = "adress" placeholder = "Address..." maxlength="140">

                        <h3><b>Partner information</b></h3><hr>
                        <h3>Desired age range</h3>
                        <select name = "age-range"><?php
                            $cursor = oci_new_cursor($connection);
                            $query = 'BEGIN getCatalog.agerange(:cursor); END;';
                            $compiled = oci_parse($connection, $query);
                            oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
                            oci_execute($compiled);

                            oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
                            while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                                echo "<option value=" . $row['TYPENAMEID'] . ">" . $row['TYPENAME'] . "</option>";
                            }
                            oci_free_statement($compiled);
                            oci_free_statement($cursor);
                        ?></select>


                        <br><br>
                        <h3><b>Education and work</b></h3>
                        <hr>

                        <div class="row">
                            <div class = "col-md-6">
                                <h3>High school</h3>
                                <input type="text" name = "highschool" placeholder = "High school..." maxlength="100">
                            </div>
                            <div class = "col-md-6">
                                <h3>University</h3>
                                <input type="text" name = "university" placeholder="University..." maxlength="100">
                            </div>
                        </div>

                        <div class="row">
                            <div class = "col-md-6">
                                <h3>Work</h3>
                                <br>
                                <input type="text" name = "work" placeholder="Workplace..." maxlength="100">
                            </div>
                            <div class = "col-md-6">
                                <h3>Salary</h3>
                                <p>How much dollars you earn a year</p>
                                <input type="number" name = "salary" min="1" max="1000000000">
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
                            
                            echo "<div class = \"row\">";
                            $currentLanguage = 0;
                            $currentColumn = 0;
                            //$numberColumns = 3;
                            while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                                //if currentLanguage is the first of the current column
                                if($currentLanguage == round($countLanguages/3*$currentColumn, 0, PHP_ROUND_HALF_DOWN)) {
                                    echo "<div class = \"col-md-4\">";
                                }
                                echo "<input type=\"checkbox\" name = \"language" . $row['TYPENAMEID'] . "\" value=\"" . 
                                    $row['TYPENAMEID'] . "\">" . $row['TYPENAME'] . "<br>";
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
                        <h3>Religion</h3>
                        <select name = "religion"><?php
                            $cursor = oci_new_cursor($connection);
                            $query = 'BEGIN getCatalog.religion(:cursor); END;';
                            $compiled = oci_parse($connection, $query);
                            oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
                            oci_execute($compiled);

                            oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
                            while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                                echo "<option value=" . $row['TYPENAMEID'] . ">" . $row['TYPENAME'] . "</option>";
                            }
                            oci_free_statement($compiled);
                            oci_free_statement($cursor);
                        ?></select>

                        <br><br>
                        <h3><b>Physical information</b></h3>
                        <hr>
                           
                        <div class="row">
                            <div class = "col-md-6">
                                <h3>Height (meters)</h3>
                                <input type="number" name="height" min="0.3" max="3" step="0.1">
                            </div>
                            <div class = "col-md-6">
                                <h3>Body type</h3>
                                <select name = "body-type"><?php
                                    $cursor = oci_new_cursor($connection);
                                    $query = 'BEGIN getCatalog.bodyType(:cursor); END;';
                                    $compiled = oci_parse($connection, $query);
                                    oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
                                    oci_execute($compiled);

                                    oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
                                    while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                                        echo "<option value=" . $row['TYPENAMEID'] . ">" . $row['TYPENAME'] . "</option>";
                                    }
                                    oci_free_statement($compiled);
                                    oci_free_statement($cursor);
                                ?></select>
                            </div>
                        </div>
                                
                        <div class="row">
                            <div class = "col-md-6">
                                <h3>Skin color</h3>
                                <select name = "skin-color"><?php
                                    $cursor = oci_new_cursor($connection);
                                    $query = 'BEGIN getCatalog.skinColor(:cursor); END;';
                                    $compiled = oci_parse($connection, $query);
                                    oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
                                    oci_execute($compiled);

                                    oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
                                    while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                                        echo "<option value=" . $row['TYPENAMEID'] . ">" . $row['TYPENAME'] . "</option>";
                                    }
                                    oci_free_statement($compiled);
                                    oci_free_statement($cursor);
                                ?></select>
                            </div>
                            <div class = "col-md-6">
                                <h3>Eye color</h3>
                                <select name = "eye-color"><?php
                                    $cursor = oci_new_cursor($connection);
                                    $query = 'BEGIN getCatalog.eyeColor(:cursor); END;';
                                    $compiled = oci_parse($connection, $query);
                                    oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
                                    oci_execute($compiled);

                                    oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
                                    while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                                        echo "<option value=" . $row['TYPENAMEID'] . ">" . $row['TYPENAME'] . "</option>";
                                    }
                                    oci_free_statement($compiled);
                                    oci_free_statement($cursor);
                                ?></select>
                            </div>
                        </div>
                                
                        <div class="row">
                            <div class = "col-md-6">
                                <h3>Hair color</h3>
                                <select name = "hair-color"><?php
                                    $cursor = oci_new_cursor($connection);
                                    $query = 'BEGIN getCatalog.hairColor(:cursor); END;';
                                    $compiled = oci_parse($connection, $query);
                                    oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
                                    oci_execute($compiled);

                                    oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
                                    while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                                        echo "<option value=" . $row['TYPENAMEID'] . ">" . $row['TYPENAME'] . "</option>";
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
                                <h3>Smoker</h3>
                                <input type="radio" name="smoker" value="0" checked> No
                                <input type="radio" name="smoker" value="1"> Yes
                            </div>
                            <div class = "col-md-6">
                                <h3>Drinker</h3>
                                <input type="radio" name="drinker" value="0" checked> No
                                <input type="radio" name="drinker" value="1"> Yes
                            </div>
                        </div>        
                         
                        <h3>Exercise Frequency</h3>
                        <p>On a week period</p>
                        <select name = "exercise-frequency"><?php
                            $cursor = oci_new_cursor($connection);
                            $query = 'BEGIN getCatalog.exerciseFrequency(:cursor); END;';
                            $compiled = oci_parse($connection, $query);
                            oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
                            oci_execute($compiled);

                            oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
                            while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                                echo "<option value=" . $row['TYPENAMEID'] . ">" . $row['TYPENAME'] . "</option>";
                            }
                            oci_free_statement($compiled);
                            oci_free_statement($cursor);
                        ?></select>

                        <div class="row">
                            <div class = "col-md-6">
                                <h3>Number of kids</h3>
                                <input type="number" name="number-kids" min="0" max="20" step="1">
                            </div>
                            <div class = "col-md-6">
                                <h3>Interested in having children</h3>
                                <input type="radio" name="interested-children" value="no" checked> No
                                <input type="radio" name="interested-children" value="yes"> Yes
                            </div>
                        </div>
                        
                        <h3>Likes pets</h3>
                        <input type="radio" name="likes-pets" value="no" checked> No
                        <input type="radio" name="likes-pets" value="yes"> Yes
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
                                
                                echo "<div class = \"row\">";
                                $currentInterest = 0;
                                $currentColumn = 0;
                                //$numberColumns = 3;
                                while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                                    //if currentLanguage is the first of the current column
                                    if($currentInterest == round($countInterests/3*$currentColumn, 0, PHP_ROUND_HALF_DOWN)) {
                                        echo "<div class = \"col-md-4\">";
                                    }
                                    echo "<input type=\"checkbox\" name = \"interest" . $row['TYPENAMEID'] . "\" value=\"" . 
                                    $row['TYPENAMEID'] . "\">" . $row['TYPENAME'] . "<br>";
                                    $currentInterest++;
                                    //if the next language to show is the same as the first language number of the next column
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
                                
                                echo "<div class = \"row\">";
                                $currentHobbie = 0;
                                $currentColumn = 0;
                                //$numberColumns = 3;
                                while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                                    //if currentLanguage is the first of the current column
                                    if($currentHobbie == round($countHobbies/3*$currentColumn, 0, PHP_ROUND_HALF_DOWN)) {
                                        echo "<div class = \"col-md-4\">";
                                    }
                                    echo "<input type=\"checkbox\" name = \"hobbie" . $row['TYPENAMEID'] . "\" value=\"" . 
                                    $row['TYPENAMEID'] . "\">" . $row['TYPENAME'] . "<br>";
                                    $currentHobbie++;
                                    //if the next language to show is the same as the first language number of the next column
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
                            <input type = "submit" value = "Create profile">
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

    <div class = "footer">
        <a href = "#" class="btn-link" data-toggle="modal" data-target="#myModal3">Legal Disclaimer</a>
        <p>Bases de Datos 1, Proyecto 1 - Match.Me, Profesora: Adriana Alvarez</p>
        <p>Estudiantes: Alexis Arguedas, Gabriela Garro, Yanil Gomez</p>
        <p>2015, II Semestre</p>
    </div>


  </body>
</html>