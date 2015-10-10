<?php
    /* Proyecto I Bases de Datos - Prof. Adriana Álvarez
     * match.me - Oracle
     * Alexis Arguedas, Gabriela Garro, Yanil Gómez
     * -------------------------------------------------
     * other-profile.php - Created: 03/10/2015
     * Used to see a person's profile which is not the actual user's.
     */
    include('session.php');
    if(!isset($_SESSION['usernameID'])) {
        header("Location: index.php#notloggedin");
    }
    if ($_SESSION['userType'] != 2) { //if it's not a normal user
        header("Location: index.php#notnormaluser");
    }
    //check if the post variable is set
    if (isset($_POST['other-usernameID'])) {
        $_SESSION['other-usernameID'] = $_POST['other-usernameID'];
    }
    else if (isset($_SESSION['other-usernameID'])) {
        $_POST['other-usernameID'] = $_SESSION['other-usernameID'];
    }
    //register visit
    $query = 'BEGIN visit(:usernameID, :otherUsernameID); END;';
    $compiled = oci_parse($connection, $query);
    oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
    oci_bind_by_name($compiled, ':otherUsernameID', $_POST['other-usernameID'], 5);
    oci_execute($compiled, OCI_NO_AUTO_COMMIT);
    oci_commit($connection);
    //get the person's name
    $query = 'BEGIN getPerson.FirstName(:usernameID, :userFirstName); END;';
    $compiled = oci_parse($connection, $query);
    oci_bind_by_name($compiled, ':usernameID', $_POST['other-usernameID'], 5);
    oci_bind_by_name($compiled, ':userFirstName', $userFirstName, 50);
    oci_execute($compiled, OCI_NO_AUTO_COMMIT);
    oci_commit($connection);
?>

<!DOCTYPE html>
<!--match.me
  Alexis Arguedas - Gabriela Garro - Yanil Gómez
  Perfil de muestra de la aplicacion -->

<html>

  <head>
    <link rel="shortcut icon" href= "imgs/logo (1).png">
    <title><?php echo $userFirstName; ?>'s Profile - match.me</title>

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
            <li><a href="logout.php" onclick="return confirm('Are you sure to logout?');">Log out</a></li>
        </ul>
      </div>
    </div>


    <div class = "profile-body">
        <div class = "container">
            <div class = "row">
                <div class = "col-md-4">
                    <div class = "thumbnail-container">
                        <div class = "thumbnail">
                            <?php
                                $query = 'BEGIN getPicture(:usernameID, :fileLocation); END;';
                                $compiled = oci_parse($connection, $query);
                                oci_bind_by_name($compiled, ':usernameID', $_POST['other-usernameID'], 5);
                                oci_bind_by_name($compiled, ':fileLocation', $picture, 200);
                                oci_execute($compiled, OCI_NO_AUTO_COMMIT);
                                oci_commit($connection);
                            ?>
                            <img src = <?php echo $picture; ?>>
                        </div>
                    </div>
                    
                    <h2><?php
                        echo $userFirstName;
                    ?></h2>
                    <div class = "tagline">
                        <p><?php
                            $tagline = "";
                            $query = 'BEGIN getPerson.TagLine(:usernameID,:tagline); END;';
                            $compiled = oci_parse($connection, $query);
                            oci_bind_by_name($compiled, ':usernameID', $_POST['other-usernameID'], 5);
                            oci_bind_by_name($compiled, ':tagline', $tagline, 200);
                            oci_execute($compiled, OCI_NO_AUTO_COMMIT);
                            oci_commit($connection);
                            echo $tagline;
                        ?></p>
                        
                        <p><b>Interested in: </b>
                        <?php
                            $sexualOrientation;
                            $query = 'BEGIN getPerson.orientation(:usernameID,:sexualOrientation,:sexualOrientationID); END;';
                            $compiled = oci_parse($connection, $query);
                            oci_bind_by_name($compiled, ':usernameID', $_POST['other-usernameID'], 5);
                            oci_bind_by_name($compiled, ':sexualOrientation', $sexualOrientation, 20);
                            oci_bind_by_name($compiled, ':sexualOrientationID', $sexualOrientationID, 4);
                            oci_execute($compiled, OCI_NO_AUTO_COMMIT);
                            oci_commit($connection);

                            $gender;
                            $query = 'BEGIN getPerson.gender(:usernameID,:gender, :genderID); END;';
                            $compiled = oci_parse($connection, $query);
                            oci_bind_by_name($compiled, ':usernameID', $_POST['other-usernameID'], 5);
                            oci_bind_by_name($compiled, ':gender', $gender, 15);
                            oci_bind_by_name($compiled, ':genderID', $genderID, 15);
                            oci_execute($compiled, OCI_NO_AUTO_COMMIT);
                            oci_commit($connection);

                            if ($sexualOrientation == "Bisexual" || $sexualOrientation == "Pansexual"){
                                $interestedIn = "Men and women";
                            }
                            else if ($gender == "Male") {
                                switch ($sexualOrientation) {
                                    case "Heterosexual":
                                        $interestedIn = "Women";
                                        break;
                                    case "Homosexual":
                                        $interestedIn = "Men";
                                        break;
                                    default:
                                        $interestedIn = $sexualOrientation;
                                        break;
                                }
                            }
                            else if ($gender == "Female") {
                                switch ($sexualOrientation) {
                                    case "Heterosexual":
                                        $interestedIn = "Men";
                                        break;
                                    case "Homosexual":
                                        $interestedIn = "Women";
                                        break;
                                    default:
                                        $interestedIn = $sexualOrientation;
                                        break;
                                }
                            }
                            else $interestedIn = $sexualOrientation;
                            echo $interestedIn;
                        ?></p>
                        
                        <p><b>Desired partner's age range: </b>
                        <?php
                            $ageRange;
                            $query = 'BEGIN getPerson.age_Range(:usernameID,:ageRange, :ageRangeID); END;';
                            $compiled = oci_parse($connection, $query);
                            oci_bind_by_name($compiled, ':usernameID', $_POST['other-usernameID'], 5);
                            oci_bind_by_name($compiled, ':ageRange', $ageRange, 20);
                            oci_bind_by_name($compiled, ':ageRangeID', $ageRangeID, 20);
                            oci_execute($compiled, OCI_NO_AUTO_COMMIT);
                            oci_commit($connection);
                            echo $ageRange;
                        ?></p>
                        
                        <p><b>Lives in: </b>
                        <?php
                            $query = 'BEGIN getPerson.city_country(:userID, :city, :country); END;';
                            $compiled = oci_parse($connection, $query);
                            oci_bind_by_name($compiled, ':userID', $_POST['other-usernameID'], 5);
                            oci_bind_by_name($compiled, ':city', $city, 50);
                            oci_bind_by_name($compiled, ':country', $country, 50);
                            oci_execute($compiled, OCI_NO_AUTO_COMMIT);
                            oci_commit($connection);
                            echo $city . ", " . $country;
                        ?></p>
                        
                        <p><b>Has found a partner through the network: </b>
                        <?php
                            $foundPartner;
                            $query = 'BEGIN getPerson.foundPartner(:usernameID, :foundPartner); END;';
                            $compiled = oci_parse($connection, $query);
                            oci_bind_by_name($compiled, ':usernameID', $_POST['other-usernameID'], 5);
                            oci_bind_by_name($compiled, ':foundPartner', $foundPartner, 1);
                            oci_execute($compiled, OCI_NO_AUTO_COMMIT);
                            oci_commit($connection);
                            if ($foundPartner == 0) echo "No";
                            else echo "Yes";
                        ?></p>

                        <p><b>Got married through the network: </b>
                        <?php
                            $gotMarried;
                            $query = 'BEGIN getPerson.got_Married(:usernameID, :gotMarried); END;';
                            $compiled = oci_parse($connection, $query);
                            oci_bind_by_name($compiled, ':usernameID', $_POST['other-usernameID'], 5);
                            oci_bind_by_name($compiled, ':gotMarried', $gotMarried, 1);
                            oci_execute($compiled, OCI_NO_AUTO_COMMIT);
                            oci_commit($connection);
                            if ($_SESSION['gotMarried'] == 0) echo "No";
                            else echo "Yes";
                        ?></p>
                    </div>
                    <div class = "row">
                        <div class = "col-md-6">
                            <form action = "match.php" method = "POST">
                                <?php
                                    $query = 'BEGIN checkMatch(:matcher, :matchedPerson, :check); END;';
                                    $compiled = oci_parse($connection, $query);
                                    oci_bind_by_name($compiled, ':matcher', $_SESSION['usernameID'], 5);
                                    oci_bind_by_name($compiled, ':matchedPerson', $_POST['other-usernameID'], 5);
                                    oci_bind_by_name($compiled, ':check', $check, 1);
                                    oci_execute($compiled, OCI_NO_AUTO_COMMIT);
                                    oci_commit($connection);
                                    if ($check == 1) {
                                        $class = "disabledButton";
                                        $value = "Matched!";
                                    }
                                    else {
                                        $class = "normal";
                                        $value = "Match";
                                    }
                                ?>
                                <input type="hidden" name = "other-usernameID" value = <?php echo $_POST['other-usernameID']; ?> />
                                <div class = <?php echo $class; ?> >
                                    <input type = "submit" name = "submit" value = <?php echo $value; ?> >
                                </div>
                            </form>
                        </div>
                        <div class = "col-md-6">
                            <form action = "wink.php" method = "POST">
                                <?php
                                    $query = 'BEGIN checkWink(:winker, :winkedPerson, :check); END;';
                                    $compiled = oci_parse($connection, $query);
                                    oci_bind_by_name($compiled, ':winker', $_SESSION['usernameID'], 5);
                                    oci_bind_by_name($compiled, ':winkedPerson', $_POST['other-usernameID'], 5);
                                    oci_bind_by_name($compiled, ':check', $check, 1);
                                    oci_execute($compiled, OCI_NO_AUTO_COMMIT);
                                    oci_commit($connection);
                                    if ($check == 1) {
                                        $class = "disabledButton";
                                        $value = "Winked!";
                                    }
                                    else {
                                        $class = "normal";
                                        $value = "Wink";
                                    }
                                ?>
                                <input type="hidden" name = "other-usernameID" value = <?php echo $_POST['other-usernameID']; ?> />
                                <div class = <?php echo $class; ?> >
                                    <input type = "submit" name = "submit" value = <?php echo $value; ?> >
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class = "col-md-8">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="panel with-nav-tabs panel-default">
                                    <div class="panel-heading">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#tab1default" data-toggle="tab">Basic Information</a></li>
                                            <li><a href="#tab2default" data-toggle="tab">Education and Work</a></li>
                                            <li><a href="#tab3default" data-toggle="tab">Physical Information</a></li>
                                            <li class="dropdown">
                                                <a href="#" data-toggle="dropdown">More <span class="caret"></span></a>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="#tab4default" data-toggle="tab">LifeStyle</a></li>
                                                    <li><a href="#tab5default" data-toggle="tab">Interests and Hobbies</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="panel-body">
                                        <div class="tab-content">
                                            <div class="tab-pane fade in active" id="tab1default">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h3>Full name</h3>
                                                        <p>
                                                            <?php
                                                                $lastName = "";
                                                                $query = 'BEGIN getPerson.LastName1(:usernameID,:lastname1); END;';
                                                                $compiled = oci_parse($connection, $query);
                                                                oci_bind_by_name($compiled, ':usernameID', $_POST['other-usernameID'], 5);
                                                                oci_bind_by_name($compiled, ':lastname1', $lastName, 50);
                                                                oci_execute($compiled, OCI_NO_AUTO_COMMIT);
                                                                oci_commit($connection);
                                                                $lastName2 = "";
                                                                $query = 'BEGIN getPerson.LastName2(:usernameID,:lastname2); END;';
                                                                $compiled = oci_parse($connection, $query);
                                                                oci_bind_by_name($compiled, ':usernameID', $_POST['other-usernameID'], 5);
                                                                oci_bind_by_name($compiled, ':lastname2', $lastName2, 50);
                                                                oci_execute($compiled, OCI_NO_AUTO_COMMIT);
                                                                oci_commit($connection);
                                                                echo $userFirstName . " " . $lastName . " " . $lastName2;
                                                            ?>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h3>Nickname</h3>
                                                        <p><?php
                                                            $nickname = "";
                                                            $query = 'BEGIN getPerson.Nickname(:usernameID,:nickname); END;';
                                                            $compiled = oci_parse($connection, $query);
                                                            oci_bind_by_name($compiled, ':usernameID', $_POST['other-usernameID'], 5);
                                                            oci_bind_by_name($compiled, ':nickname', $nickname, 25);
                                                            oci_execute($compiled, OCI_NO_AUTO_COMMIT);
                                                            oci_commit($connection);
                                                            echo $nickname;
                                                        ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h3>Birthdate</h3>
                                                        <p><?php
                                                            $birthday;
                                                            $query = 'BEGIN getPerson.birthday(:usernameID,:birthday); END;';
                                                            $compiled = oci_parse($connection, $query);
                                                            oci_bind_by_name($compiled, ':usernameID', $_POST['other-usernameID'], 5);
                                                            oci_bind_by_name($compiled, ':birthday', $birthday, 25);
                                                            oci_execute($compiled, OCI_NO_AUTO_COMMIT);
                                                            oci_commit($connection);
                                                            echo $birthday;
                                                        ?></p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h3>Zodiac Sign</h3>
                                                        <p><?php
                                                            $zodiacSign;
                                                            $query = 'BEGIN getPerson.zodiacsign(:usernameID,:zodiacsign, :zodiacSignID); END;';
                                                            $compiled = oci_parse($connection, $query);
                                                            oci_bind_by_name($compiled, ':usernameID', $_POST['other-usernameID'], 5);
                                                            oci_bind_by_name($compiled, ':zodiacsign', $zodiacSign, 20);
                                                            oci_bind_by_name($compiled, ':zodiacsignID', $zodiacSignID, 20);
                                                            oci_execute($compiled, OCI_NO_AUTO_COMMIT);
                                                            oci_commit($connection);
                                                            echo $zodiacSign;
                                                        ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h3>Gender</h3>
                                                        <p><?php
                                                            echo $gender;
                                                        ?></p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h3>Sexual Orientation</h3>
                                                        <p><?php
                                                            echo $sexualOrientation;
                                                        ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h3>Relationship Status</h3>
                                                        <p><?php
                                                            $relationshipStatus;
                                                            $query = 'BEGIN getPerson.relationshipstatus(:usernameID,:relationshipstatus, :relationshipStatusID); END;';
                                                            $compiled = oci_parse($connection, $query);
                                                            oci_bind_by_name($compiled, ':usernameID', $_POST['other-usernameID'], 5);
                                                            oci_bind_by_name($compiled, ':relationshipstatus', $relationshipStatus, 30);
                                                            oci_bind_by_name($compiled, ':relationshipstatusID', $relationshipStatusID, 30);
                                                            oci_execute($compiled, OCI_NO_AUTO_COMMIT);
                                                            oci_commit($connection);
                                                            echo $relationshipStatus;
                                                        ?></p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h3>Email</h3>
                                                        <p><?php
                                                            $email;
                                                            $query = 'BEGIN email(:usernameID,:email); END;';
                                                            $compiled = oci_parse($connection, $query);
                                                            oci_bind_by_name($compiled, ':usernameID', $_POST['other-usernameID'], 5);
                                                            oci_bind_by_name($compiled, ':email', $email, 30);
                                                            oci_execute($compiled, OCI_NO_AUTO_COMMIT);
                                                            oci_commit($connection);
                                                            echo $email;
                                                        ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h3>Address</h3>
                                                        <p><?php
                                                            $address;
                                                            $query = 'BEGIN getPerson.address(:usernameID,:address); END;';
                                                            $compiled = oci_parse($connection, $query);
                                                            oci_bind_by_name($compiled, ':usernameID', $_POST['other-usernameID'], 5);
                                                            oci_bind_by_name($compiled, ':address', $address, 140);
                                                            oci_execute($compiled, OCI_NO_AUTO_COMMIT);
                                                            oci_commit($connection);
                                                            echo $address;
                                                        ?></p>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <h3>City</h3>
                                                        <p><?php
                                                            echo $city;
                                                        ?></p>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <h3>Country</h3>
                                                        <p><?php
                                                            echo $country;
                                                        ?></p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="tab2default">
                                                <h3>Highschool</h3>
                                                <p>
                                                    <?php
                                                        $highschool;
                                                        $query = 'BEGIN getPerson.highschool(:usernameID,:highschool); END;';
                                                        $compiled = oci_parse($connection, $query);
                                                        oci_bind_by_name($compiled, ':usernameID', $_POST['other-usernameID'], 5);
                                                        oci_bind_by_name($compiled, ':highschool', $highschool, 100);
                                                        oci_execute($compiled, OCI_NO_AUTO_COMMIT);
                                                        oci_commit($connection);
                                                        echo $highschool;
                                                    ?>
                                                </p>
                                                
                                                <h3>University</h3>
                                                <p>
                                                    <?php
                                                        $university;
                                                        $query = 'BEGIN getPerson.university(:usernameID,:university); END;';
                                                        $compiled = oci_parse($connection, $query);
                                                        oci_bind_by_name($compiled, ':usernameID', $_POST['other-usernameID'], 5);
                                                        oci_bind_by_name($compiled, ':university', $university, 100);
                                                        oci_execute($compiled, OCI_NO_AUTO_COMMIT);
                                                        oci_commit($connection);
                                                        echo $university;
                                                    ?>
                                                </p>
                                                
                                                <h3>Work</h3>
                                                <p><?php
                                                    $work;
                                                    $query = 'BEGIN getPerson.workplace(:usernameID,:workplace); END;';
                                                    $compiled = oci_parse($connection, $query);
                                                    oci_bind_by_name($compiled, ':usernameID', $_POST['other-usernameID'], 5);
                                                    oci_bind_by_name($compiled, ':workplace', $work, 100);
                                                    oci_execute($compiled, OCI_NO_AUTO_COMMIT);
                                                    oci_commit($connection);
                                                    echo $work;
                                                ?></p>
                                               
                                                <h3>Salary</h3>
                                                <p><?php
                                                    $salary;
                                                    $query = 'BEGIN getPerson.salary(:usernameID,:salary); END;';
                                                    $compiled = oci_parse($connection, $query);
                                                    oci_bind_by_name($compiled, ':usernameID', $_POST['other-usernameID'], 5);
                                                    oci_bind_by_name($compiled, ':salary', $salary, 7);
                                                    oci_execute($compiled, OCI_NO_AUTO_COMMIT);
                                                    oci_commit($connection);
                                                    echo "$" . $salary . " a year";
                                                ?></p>
                                                
                                                <h3>Languages</h3>
                                                <?php
                                                    $cursor = oci_new_cursor($connection);
                                                    $query = 'BEGIN getPerson.languages(:usernameID, :cursor); END;';
                                                    $compiled = oci_parse($connection, $query);
                                                    oci_bind_by_name($compiled, ':usernameID', $_POST['other-usernameID'], 5);
                                                    oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
                                                    oci_execute($compiled);

                                                    oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
                                                    while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                                                        echo "<li>" . $row['LANGUAGENAME'] . "</li>";
                                                    }
                                                    oci_free_statement($compiled);
                                                    oci_free_statement($cursor);
                                                ?>
                                                <h3>Religion</h3>
                                                <p><?php
                                                    $religion;
                                                    $query = 'BEGIN getPerson.religion(:usernameID,:religion, :religionID); END;';
                                                    $compiled = oci_parse($connection, $query);
                                                    oci_bind_by_name($compiled, ':usernameID', $_POST['other-usernameID'], 5);
                                                    oci_bind_by_name($compiled, ':religion', $religion, 50);
                                                    oci_bind_by_name($compiled, ':religionID', $religionID, 50);
                                                    oci_execute($compiled, OCI_NO_AUTO_COMMIT);
                                                    oci_commit($connection);
                                                    echo $religion;
                                                ?></p>
                                            </div>
                                            <div class="tab-pane fade" id="tab3default">
                                                <h3>Height</h3>
                                                <p><?php
                                                    $height;
                                                    $query = 'BEGIN getPerson.height(:usernameID,:height); END;';
                                                    $compiled = oci_parse($connection, $query);
                                                    oci_bind_by_name($compiled, ':usernameID', $_POST['other-usernameID'], 5);
                                                    oci_bind_by_name($compiled, ':height', $height, 6);
                                                    oci_execute($compiled, OCI_NO_AUTO_COMMIT);
                                                    oci_commit($connection);
                                                    echo str_replace(",", ".", (string) $height); //convert to html format
                                                ?></p>
                                                
                                                <h3>Skin color</h3>
                                                <p><?php
                                                    $skinColor;
                                                    $query = 'BEGIN getPerson.skinColor(:usernameID,:skinColor, :skinColorID); END;';
                                                    $compiled = oci_parse($connection, $query);
                                                    oci_bind_by_name($compiled, ':usernameID', $_POST['other-usernameID'], 5);
                                                    oci_bind_by_name($compiled, ':skinColor', $skinColor, 15);
                                                    oci_bind_by_name($compiled, ':skinColorID', $skinColorID, 15);
                                                    oci_execute($compiled, OCI_NO_AUTO_COMMIT);
                                                    oci_commit($connection);
                                                    echo $skinColor;
                                                ?></p>
                                                
                                                <h3>Eye color</h3>
                                                <p><?php
                                                    $eyeColor;
                                                    $query = 'BEGIN getPerson.eyeColor(:usernameID,:eyeColor, :eyeColorID); END;';
                                                    $compiled = oci_parse($connection, $query);
                                                    oci_bind_by_name($compiled, ':usernameID', $_POST['other-usernameID'], 5);
                                                    oci_bind_by_name($compiled, ':eyeColor', $eyeColor, 15);
                                                    oci_bind_by_name($compiled, ':eyeColorID', $eyeColorID, 15);
                                                    oci_execute($compiled, OCI_NO_AUTO_COMMIT);
                                                    oci_commit($connection);
                                                    echo $eyeColor;
                                                ?></p>
                                                
                                                <h3>Hair color</h3>
                                                <p><?php
                                                    $hairColor;
                                                    $query = 'BEGIN getPerson.hairColor(:usernameID,:hairColor, :hairColorID); END;';
                                                    $compiled = oci_parse($connection, $query);
                                                    oci_bind_by_name($compiled, ':usernameID', $_POST['other-usernameID'], 5);
                                                    oci_bind_by_name($compiled, ':hairColor', $hairColor, 30);
                                                    oci_bind_by_name($compiled, ':hairColorID', $hairColorID, 30);
                                                    oci_execute($compiled, OCI_NO_AUTO_COMMIT);
                                                    oci_commit($connection);
                                                    echo $hairColor;
                                                ?></p>
                                                
                                                <h3>Body type</h3>
                                                <p><?php
                                                    $bodyType;
                                                    $query = 'BEGIN getPerson.bodyType(:usernameID,:bodyType, :bodyTypeID); END;';
                                                    $compiled = oci_parse($connection, $query);
                                                    oci_bind_by_name($compiled, ':usernameID', $_POST['other-usernameID'], 5);
                                                    oci_bind_by_name($compiled, ':bodyType', $bodyType, 30);
                                                    oci_bind_by_name($compiled, ':bodyTypeID', $bodyTypeID, 30);
                                                    oci_execute($compiled, OCI_NO_AUTO_COMMIT);
                                                    oci_commit($connection);
                                                    echo $bodyType;
                                                ?></p>
                                                
                                            </div>
                                            <div class="tab-pane fade" id="tab4default">
                                                <h3>Smoker</h3>
                                                <p><?php
                                                    $smoker;
                                                    $query = 'BEGIN getPerson.smoker(:usernameID,:smoker); END;';
                                                    $compiled = oci_parse($connection, $query);
                                                    oci_bind_by_name($compiled, ':usernameID', $_POST['other-usernameID'], 5);
                                                    oci_bind_by_name($compiled, ':smoker', $smoker, 1);
                                                    oci_execute($compiled, OCI_NO_AUTO_COMMIT);
                                                    oci_commit($connection);
                                                    if ($smoker == 0) echo "No";
                                                    else echo "Yes";
                                                ?></p>
                                                
                                                <h3>Drinker</h3>
                                                <p><?php
                                                    $drinker;
                                                    $query = 'BEGIN getPerson.drinker(:usernameID,:drinker); END;';
                                                    $compiled = oci_parse($connection, $query);
                                                    oci_bind_by_name($compiled, ':usernameID', $_POST['other-usernameID'], 5);
                                                    oci_bind_by_name($compiled, ':drinker', $drinker, 1);
                                                    oci_execute($compiled, OCI_NO_AUTO_COMMIT);
                                                    oci_commit($connection);
                                                    if ($drinker == 0) echo "No";
                                                    else echo "Yes";
                                                ?></p>
                                                
                                                <h3>Exercise Frequency (a week)</h3>
                                                <p><?php
                                                    $exerciseFrequency;
                                                    $query = 'BEGIN getPerson.exercisefreq(:usernameID,:exercisefreq, :exercisefreqID); END;';
                                                    $compiled = oci_parse($connection, $query);
                                                    oci_bind_by_name($compiled, ':usernameID', $_POST['other-usernameID'], 5);
                                                    oci_bind_by_name($compiled, ':exercisefreq', $exerciseFrequency, 30);
                                                    oci_bind_by_name($compiled, ':exercisefreqID', $exerciseFrequencyID, 30);
                                                    oci_execute($compiled, OCI_NO_AUTO_COMMIT);
                                                    oci_commit($connection);
                                                    echo $exerciseFrequency;
                                                ?></p>
                                                
                                                <h3>Number of kids</h3>
                                                <p><?php
                                                    $numberKids;
                                                    $query = 'BEGIN getPerson.numberOfKids(:usernameID,:numberOfKids); END;';
                                                    $compiled = oci_parse($connection, $query);
                                                    oci_bind_by_name($compiled, ':usernameID', $_POST['other-usernameID'], 5);
                                                    oci_bind_by_name($compiled, ':numberOfKids', $numberKids, 2);
                                                    oci_execute($compiled, OCI_NO_AUTO_COMMIT);
                                                    oci_commit($connection);
                                                    echo $numberKids;
                                                ?></p>
                                                
                                                <h3>Interested in children</h3>
                                                <p><?php
                                                    $interestedChildren;
                                                    $query = 'BEGIN getPerson.interestedInKids(:usernameID,:interestedInKids); END;';
                                                    $compiled = oci_parse($connection, $query);
                                                    oci_bind_by_name($compiled, ':usernameID', $_POST['other-usernameID'], 5);
                                                    oci_bind_by_name($compiled, ':interestedInKids', $interestedChildren, 1);
                                                    oci_execute($compiled, OCI_NO_AUTO_COMMIT);
                                                    oci_commit($connection);
                                                    if ($interestedChildren == 0) echo "No";
                                                    else echo "Yes";
                                                ?></p>
                                                
                                                <h3>Likes pets</h3>
                                                <p><?php
                                                    $likesPets;
                                                    $query = 'BEGIN getPerson.likesPets(:usernameID,:likesPets); END;';
                                                    $compiled = oci_parse($connection, $query);
                                                    oci_bind_by_name($compiled, ':usernameID', $_POST['other-usernameID'], 5);
                                                    oci_bind_by_name($compiled, ':likesPets', $likesPets, 1);
                                                    oci_execute($compiled, OCI_NO_AUTO_COMMIT);
                                                    oci_commit($connection);
                                                    if ($likesPets == 0) echo "No";
                                                    else echo "Yes";
                                                ?></p>

                                            </div>
                                            <div class="tab-pane fade" id="tab5default">
                                                <h3>Interests</h3>
                                                <ul>
                                                    <?php
                                                        $cursor = oci_new_cursor($connection);
                                                        $query = 'BEGIN getPerson.interests(:usernameID, :cursor); END;';
                                                        $compiled = oci_parse($connection, $query);
                                                        oci_bind_by_name($compiled, ':usernameID', $_POST['other-usernameID'], 5);
                                                        oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
                                                        oci_execute($compiled);

                                                        oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
                                                        while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                                                            echo "<li>" . $row['INTEREST'] . "</li>";
                                                        }
                                                        oci_free_statement($compiled);
                                                        oci_free_statement($cursor);
                                                    ?>
                                                </ul>
                                                <h3>Hobbies</h3>
                                                <ul>
                                                    <?php
                                                        $cursor = oci_new_cursor($connection);
                                                        $query = 'BEGIN getPerson.hobbies(:usernameID, :cursor); END;';
                                                        $compiled = oci_parse($connection, $query);
                                                        oci_bind_by_name($compiled, ':usernameID', $_POST['other-usernameID'], 5);
                                                        oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
                                                        oci_execute($compiled);

                                                        oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
                                                        while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                                                            echo "<li>" . $row['HOBBIE'] . "</li>";
                                                        }
                                                        oci_free_statement($compiled);
                                                        oci_free_statement($cursor);
                                                    ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
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