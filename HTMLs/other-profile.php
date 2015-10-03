<?php
    //user profile
    //include ('login.php');
    include('session.php');
    if(!isset($_SESSION['usernameID'])) {
        header("Location: index.php#notloggedin");
    }
    if ($_SESSION['userType'] != 2) { //if it's not a normal user
        header("Location: index.php#notnormaluser");
    }
    //echo $_SESSION['firstName'];
?>

<!DOCTYPE html>
<!--match.me
  Alexis Arguedas - Gabriela Garro - Yanil Gómez
  Perfil de muestra de la aplicacion -->

<html>

  <head>
    <link rel="shortcut icon" href= "imgs/logo (1).png">
    <title><?php echo $_POST['name'] ?>'s Profile - match.me</title>

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
            <li><a href="logout.php">Log out</a></li>
        </ul>
      </div>
    </div>


    <div class = "profile-body">
        <div class = "container">
            <div class = "row">
                <div class = "col-md-4">
                    <div class = "thumbnail-container">
                        <div class = "thumbnail">
                            <img src = "imgs/dog-of-wisdom-profile-picture.png">
                        </div>
                    </div>
                    
                    <h2><?php
                        echo $_SESSION['name'];
                    ?></h2>
                    <div class = "tagline">
                        <p><?php
                            echo $_SESSION['tagline'];
                        ?></p>
                        
                        <p><b>Interested in: </b>
                        <?php
                            if ($_SESSION['sexualOrientation'] == "Bisexual" || $_SESSION['sexualOrientation'] == "Pansexual"){
                                $interestedIn = "Men and women";
                            }
                            else if ($_SESSION['gender'] == "Male") {
                                switch ($_SESSION['sexualOrientation']) {
                                    case "Heterosexual":
                                        $interestedIn = "Women";
                                        break;
                                    case "Homosexual":
                                        $interestedIn = "Men";
                                        break;
                                    default:
                                        $interestedIn = $_SESSION['sexualOrientation'];
                                        break;
                                }
                            }
                            else if ($_SESSION['gender'] == "Female") {
                                switch ($_SESSION['sexualOrientation']) {
                                    case "Heterosexual":
                                        $interestedIn = "Men";
                                        break;
                                    case "Homosexual":
                                        $interestedIn = "Women";
                                        break;
                                    default:
                                        $interestedIn = $_SESSION['sexualOrientation'];
                                        break;
                                }
                            }
                            else $interestedIn = $_SESSION['sexualOrientation'];
                            echo $interestedIn;
                        ?></p>
                        
                        <p><b>Desired partner's age range: </b>
                        <?php
                            echo $_SESSION['ageRange'];
                        ?></p>
                        
                        <p><b>Lives in: </b>
                        <?php
                            echo $_SESSION['cityName'] . ", " . $_SESSION['country'];
                        ?></p>
                        
                        <p><b>Has found a partner through the network: </b>
                        <?php
                            if ($_SESSION['foundPartner'] == 0) echo "No";
                            else echo "Yes";
                        ?></p>

                        <p><b>Got married through the network: </b>
                        <?php
                            if ($_SESSION['gotMarried'] == 0) echo "No";
                            else echo "Yes";
                        ?></p>
                    </div>
                    <div class = "row">
                        <div class = "col-md-6">
                            <div class = "message-button">
                                <button type="button" class="btn-primary">Match</button>
                            </div>
                        </div>
                        <div class = "col-md-6">
                            <div class = "message-button">
                                <button type="button" class="btn-primary">Wink</button>
                            </div>
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
                                                                echo $_SESSION['name'] . " " . $_SESSION['lastName'] . " " . $_SESSION['lastName2'];
                                                            ?>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h3>Nickname</h3>
                                                        <p><?php
                                                            echo $_SESSION['nickname'];
                                                        ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h3>Birthdate</h3>
                                                        <p><?php
                                                            echo $_SESSION['birthday'];
                                                        ?></p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h3>Zodiac Sign</h3>
                                                        <p><?php
                                                            echo $_SESSION['zodiacSign'];
                                                        ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h3>Gender</h3>
                                                        <p><?php
                                                            echo $_SESSION['gender'];
                                                        ?></p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h3>Sexual Orientation</h3>
                                                        <p><?php
                                                            echo $_SESSION['sexualOrientation'];
                                                        ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h3>Relationship Status</h3>
                                                        <p><?php
                                                            echo $_SESSION['relationshipStatus'];
                                                        ?></p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h3>Email</h3>
                                                        <p><?php
                                                            echo $_SESSION['email'];
                                                        ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h3>Address</h3>
                                                        <p><?php
                                                            echo $_SESSION['address'];
                                                        ?></p>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <h3>City</h3>
                                                        <p><?php
                                                            echo $_SESSION['cityName'];
                                                        ?></p>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <h3>Country</h3>
                                                        <p><?php
                                                            echo $_SESSION['country'];
                                                        ?></p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="tab2default">
                                                <h3>Highschool</h3>
                                                <p>
                                                    <?php
                                                        echo $_SESSION['highschool'];
                                                    ?>
                                                </p>
                                                
                                                <h3>University</h3>
                                                <p>
                                                    <?php
                                                        echo $_SESSION['university'];
                                                    ?>
                                                </p>
                                                
                                                <h3>Work</h3>
                                                <p><?php
                                                    echo $_SESSION['work'];
                                                ?></p>
                                               
                                                <h3>Salary</h3>
                                                <p><?php
                                                    echo "$" . $_SESSION['salary'] . " a year";
                                                ?></p>
                                                
                                                <h3>Languages</h3>
                                                <?php
                                                    $cursor = oci_new_cursor($connection);
                                                    $query = 'BEGIN getPerson.languages(:usernameID, :cursor); END;';
                                                    $compiled = oci_parse($connection, $query);
                                                    oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
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
                                                    echo $_SESSION['religion'];
                                                ?></p>
                                            </div>
                                            <div class="tab-pane fade" id="tab3default">
                                                <h3>Height</h3>
                                                <p><?php
                                                    echo $_SESSION['height'];
                                                ?></p>
                                                
                                                <h3>Skin color</h3>
                                                <p><?php
                                                    echo $_SESSION['skinColor'];
                                                ?></p>
                                                
                                                <h3>Eye color</h3>
                                                <p><?php
                                                    echo $_SESSION['eyeColor'];
                                                ?></p>
                                                
                                                <h3>Hair color</h3>
                                                <p><?php
                                                    echo $_SESSION['hairColor'];
                                                ?></p>
                                                
                                                <h3>Body type</h3>
                                                <p><?php
                                                    echo $_SESSION['bodyType'];
                                                ?></p>
                                                
                                            </div>
                                            <div class="tab-pane fade" id="tab4default">
                                                <h3>Smoker</h3>
                                                <p><?php
                                                    if ($_SESSION['smoker'] == 0) echo "No";
                                                    else echo "Yes";
                                                ?></p>
                                                
                                                <h3>Drinker</h3>
                                                <p><?php
                                                    if ($_SESSION['drinker'] == 0) echo "No";
                                                    else echo "Yes";
                                                ?></p>
                                                
                                                <h3>Exercise Frequency</h3>
                                                <p><?php
                                                    echo $_SESSION['exerciseFrequency'];
                                                ?></p>
                                                
                                                <h3>Number of kids</h3>
                                                <p><?php
                                                    echo $_SESSION['numberKids'];
                                                ?></p>
                                                
                                                <h3>Interested in children</h3>
                                                <p><?php
                                                    if ($_SESSION['interestedChildren'] == 0) echo "No";
                                                    else echo "Yes";
                                                ?></p>
                                                
                                                <h3>Likes pets</h3>
                                                <p><?php
                                                    if ($_SESSION['likesPets'] == 0) echo "No";
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
                                                        oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
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
                                                        oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
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