<?php
    /* Proyecto I Bases de Datos - Prof. Adriana Álvarez
   * match.me - Oracle
   * Alexis Arguedas, Gabriela Garro, Yanil Gómez
   * -------------------------------------------------
   * homepage.php - Created: 28/09/2015
   * Acts as the starter page for the user, from which it can see its interactions, current statistics, see its own profile,
   * edit it and search for other people.
   */
	include('session.php'); //include a php script that captures fresh values of the current user from the db
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
	<title>Your Home Page</title>
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
    <link rel="stylesheet" type="css" href="utils/main.css"/>
</head>
<body>

    <!-- Visit modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <h4 class="modal-title" id="myModalLabel">Visits to my profile</h4>
            </div>
            <div class="modal-body">
              <?php
                $cursor = oci_new_cursor($connection);
                $query = 'BEGIN getVisits(:usernameID,:cursor); END;';
                $compiled = oci_parse($connection, $query);
                oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
                oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
                oci_execute($compiled);
                oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
                echo "<div class = \"row\"><div class = \"col-md-7\"><h3><b>Person</b></h3></div><div class = \"col-md-5\"><h3><b>Visit date</b></h3></div></div>";
                while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                    echo "<div class = \"row\">";
                    echo "<div class = \"col-md-7\">";
                    echo "<p>" . $row['FNAME'] . " " . $row['LNAME1'] . " " . $row['LNAME2'] . "</p>";
                    echo "</div>";
                    echo "<div class = \"col-md-5\">";
                    echo "<p>" . $row['VISITDATE'] . "</p>";
                    echo "</div>";
                    echo "</div>";
                }
                oci_free_statement($compiled);
                oci_free_statement($cursor);
              ?>
              <div class="modal-footer">
                 <div class = "container">
                    <div class="row">
                        <div class="col-md-4">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                 </div>
              </div>
            </div>
         </div>
      </div>
   </div> 

    <!-- Winks I've got modal -->
    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <h4 class="modal-title" id="myModalLabel">Winks I've got</h4>
            </div>
            <div class="modal-body">
              <?php
                $cursor = oci_new_cursor($connection);
                $query = 'BEGIN winksIveGot(:usernameID,:cursor); END;';
                $compiled = oci_parse($connection, $query);
                oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
                oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
                oci_execute($compiled);
                oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
                echo "<h3><b>People who have winked at you</b></h3>";
                while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                    echo "<li><p>" . $row['FNAME'] . " " . $row['LNAME1'] . " " . $row['LNAME2'] . "</p></li>";
                }
                oci_free_statement($compiled);
                oci_free_statement($cursor);
              ?>
              <div class="modal-footer">
                 <div class = "container">
                    <div class="row">
                        <div class="col-md-4">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                 </div>
              </div>
            </div>
         </div>
      </div>
   </div> 

   <!-- Winks I've given modal -->
    <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <h4 class="modal-title" id="myModalLabel">Winks I've given</h4>
            </div>
            <div class="modal-body">
              <?php
                $cursor = oci_new_cursor($connection);
                $query = 'BEGIN winksIveGiven(:usernameID,:cursor); END;';
                $compiled = oci_parse($connection, $query);
                oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
                oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
                oci_execute($compiled);
                oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
                echo "<h3><b>People you have winked at</b></h3>";
                while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                    echo "<li><p>" . $row['FNAME'] . " " . $row['LNAME1'] . " " . $row['LNAME2'] . "</p></li>";
                }
                oci_free_statement($compiled);
                oci_free_statement($cursor);
              ?>
              <div class="modal-footer">
                 <div class = "container">
                    <div class="row">
                        <div class="col-md-4">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                 </div>
              </div>
            </div>
         </div>
      </div>
   </div> 

   <!-- Matches I've given modal -->
    <div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <h4 class="modal-title" id="myModalLabel">Winks I've given</h4>
            </div>
            <div class="modal-body">
              <?php
                $cursor = oci_new_cursor($connection);
                $query = 'BEGIN matchesIveGiven(:usernameID,:cursor); END;';
                $compiled = oci_parse($connection, $query);
                oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
                oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
                oci_execute($compiled);
                oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
                echo "<h3><b>Matches I've given</b></h3>";
                while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                    echo "<li><p>" . $row['FNAME'] . " " . $row['LNAME1'] . " " . $row['LNAME2'] . "</p></li>";
                }
                oci_free_statement($compiled);
                oci_free_statement($cursor);
              ?>
              <div class="modal-footer">
                 <div class = "container">
                    <div class="row">
                        <div class="col-md-4">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                 </div>
              </div>
            </div>
         </div>
      </div>
   </div> 

   <!-- Matches I've got modal -->
    <div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <h4 class="modal-title" id="myModalLabel">Winks I've got</h4>
            </div>
            <div class="modal-body">
              <?php
                $cursor = oci_new_cursor($connection);
                $query = 'BEGIN matchesIveGot(:usernameID,:cursor); END;';
                $compiled = oci_parse($connection, $query);
                oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
                oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
                oci_execute($compiled);
                oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
                echo "<h3><b>Matches I've got</b></h3>";
                while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                    echo "<li><p>" . $row['FNAME'] . " " . $row['LNAME1'] . " " . $row['LNAME2'] . "</p></li>";
                }
                oci_free_statement($compiled);
                oci_free_statement($cursor);
              ?>
              <div class="modal-footer">
                 <div class = "container">
                    <div class="row">
                        <div class="col-md-4">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                 </div>
              </div>
            </div>
         </div>
      </div>
   </div> 

   <!-- Mutual matches modal -->
    <div class="modal fade" id="myModal6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <h4 class="modal-title" id="myModalLabel">Winks I've got</h4>
            </div>
            <div class="modal-body">
              <?php
                $cursor = oci_new_cursor($connection);
                $query = 'BEGIN mutualMatches(:usernameID,:cursor); END;';
                $compiled = oci_parse($connection, $query);
                oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
                oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
                oci_execute($compiled);
                oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
                echo "<h3><b>Mutual matches</b></h3>";
                while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                    echo "<li><p>" . $row['FNAME'] . " " . $row['LNAME1'] . " " . $row['LNAME2'] . "</p></li>";
                }
                oci_free_statement($compiled);
                oci_free_statement($cursor);
              ?>
              <div class="modal-footer">
                 <div class = "container">
                    <div class="row">
                        <div class="col-md-4">
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

   <!-- Upper navigation bar -->
	<div class="nav">
      <div class="container">
        <ul class = "pull-left">
            <img src = "imgs/logopeq.png">
            <li><a href="homepage.php">match.me</a></li>
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

    <!-- container for the whole homepage -->
    <div class = "container">
    	<br>
    	<div class = "row">
    		<div class = "col-md-3">
    			<div class = "profile-overview">
                    <!--user picture and name with a link to the profile -->
                    <div class="row">
                        <div class="col-md-4">
                            <div class = "thumbnail-container">
                                <div class="thumbnail">
                                    <img src = <?php echo $_SESSION['picture']; ?>>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h3><a href = "profile.php">
                                <?php echo $_SESSION['name']; ?>
                            </a></h3>
                        </div>
                    </div>

    			</div>
                <form action="edit-profile.php">
                    <input type="submit" value="Edit profile">
                </form>
    		</div>

            <!-- statistics -->
    		<div class = "col-md-6">
    			<div class = "statistics">
    				<div class = "box-header">
    					<h3>Statistics</h3>
    				</div>
    				<div class = "box-body">
    					<ul>
                            <li><a href="#" class="btn-link" data-toggle="modal" data-target="#foundPartner">People who a found a partner through the network</a></li>
                            <li><a href="#" class="btn-link" data-toggle="modal" data-target="#gotMarried">People who got married through the network</a></li>
                            <li><a href="#" class="btn-link" data-toggle="modal" data-target="#top10MostWinked">Top 10 most winked people</a></li>
                            <li><a href="#" class="btn-link" data-toggle="modal" data-target="#mostWantedAgeRange">Most wanted age range</a></li>
                        </ul>
    				</div>
    			</div>
    			<br>
    			<div class = "create-event">

    			</div>
    		</div>

            <!-- winks, visits and matches information boxes -->
            <div class = "col-md-3">
                <div class = "wink">
                    <div class = "box-header">
                        <h3>Wink</h3>
                    </div>
                    <div class = "box-body">
                        <ul>
                            <li><a href="#" class="btn-link" data-toggle="modal" data-target="#myModal3">People I've winked</a></li>
                            <li><a href="#" class="btn-link" data-toggle="modal" data-target="#myModal2">People who have winked at me</a></li>
                        </ul>
                    </div>
                </div><br>
                <div class = "visits">
                    <div class="box-header">
                        <h3>Visits</h3>
                    </div>
                    <div class="box-body">
                        <ul>
                            <li><a href="#" class="btn-link" data-toggle="modal" data-target="#myModal">Visits to my profile</a></li>
                        </ul>
                    </div>
                </div><br>
                <div class="matches">
                    <div class="box-header">
                        <h3>Matches</h3>
                    </div>
                    <div class="box-body">
                        <ul>
                            <li><a href="#" class="btn-link" data-toggle="modal" data-target="#myModal4">People I've matched</a></li>
                            <li><a href="#" class="btn-link" data-toggle="modal" data-target="#myModal5">People who have matched me</a></li>
                            <li><a href="#" class="btn-link" data-toggle="modal" data-target="#myModal6">Mutual matches</a></li>
                        </ul>
                    </div>
                </div>
            </div>
    	</div>
    </div>	
</body>
</html>