<?php
	/* Proyecto I Bases de Datos - Prof. Adriana Álvarez
     * match.me - Oracle
     * Alexis Arguedas, Gabriela Garro, Yanil Gómez
     * -------------------------------------------------
     * admin-homepage.php - Created: 04/10/2015
     * Customization of catalogs. Only working with zodiac sign.
     */
	include('session.php');
	if (!isset($_SESSION['usernameID'])) {
		header("Location: http://localhost/MatchMe/HTMLs/index.php#notloggedin");
	}
    if ($_SESSION['userType'] != 1) { //if it's not an admin
        header("Location: http://localhost/MatchMe/HTMLs/index.php#notanadmin");
    }
    //echo the error message if any
    if (isset($_POST['error'])) {
    	echo $_POST['error'];
    }
    //check if a catalog changed
    $query = 'BEGIN getCatalog.zodiacSignCount(:zodiaccount); END;';
	$compiled = oci_parse($connection, $query);
	oci_bind_by_name($compiled, ':zodiaccount', $zodiaccount, 2);
	oci_execute($compiled, OCI_NO_AUTO_COMMIT);
	oci_commit($connection);
    if (isset($_POST['submit'])) {
        for ($i = 2; $i < $zodiaccount + 2; $i++) {
        	if (isset($_POST['delete' . $i]) && $_POST['delete' . $i] == 1) {
        		try {
        			$query = 'BEGIN deletes.zodiacSign(:zodiacSign); END;';
					$compiled = oci_parse($connection, $query);
					oci_bind_by_name($compiled, ':zodiacSign', $i, 2);
					oci_execute($compiled, OCI_NO_AUTO_COMMIT);
					oci_commit($connection);
        		}
		        catch  (Exception $e) {
		        	//do nothing
		        }	
			}
        }
        if (isset($_POST['entry'])) {
        	$query = 'BEGIN inserts.ZodiacSignCat(:zodiacname); END;';
			$compiled = oci_parse($connection, $query);
			oci_bind_by_name($compiled, ':zodiacname', $_POST['entry'], 30);
			oci_execute($compiled, OCI_NO_AUTO_COMMIT);
			oci_commit($connection);
        }
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
    	function addEntry() {
    		//delete button from div
    		var element = document.getElementById("entryButton");
			element.parentNode.removeChild(element);
            //get the div to which the function will append a select object
            var addEntry = document.getElementById("add-entry"); 
            var newEntry = document.createElement("input");
            newEntry.type = "text";
            newEntry.name = "entry";
            addEntry.appendChild(newEntry);
            //create the button again
            var button = document.createElement("button");
            button.id = "entryButton"; 
            button.onclick = addEntry();
            button.innerHTML = "Add another entry"
            //addEntry.appendChild(button);
            entryCount++;
    	}
    </script>
</head>
<body>

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
    	<div class = "box-header">
    		<h3>Modify <?php echo $_POST['catalog']; ?> Catalog</h3>
    	</div>
    	<div class = "box-body">
    		<form action = "modify-catalog.php" method="POST">
    		<?php
    			switch ($_POST['catalog']) {
    			case 'zodiacSign':
    				$cursor = oci_new_cursor($connection);
                    $query = 'BEGIN getCatalog.zodiacSign(:cursor); END;';
                    $compiled = oci_parse($connection, $query);
                    oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
                    oci_execute($compiled);
                    oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
                    echo "<div class=\"row\">";
                    echo "<div class=\"col-md-11\"><p><b>&nbsp;&nbsp;&nbsp;&nbsp;Value</b></p></div>";
                    echo "<div class=\"col-md-1\"><p><b>Delete</b></p></div>";
                    while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                    	echo "<div class=\"col-md-11\">";
                        echo "<input type=\"text\" name=\"" . $row['TYPENAMEID'] . "\" value=\"" . $row['TYPENAME'] . "\">";
                        echo "</div>";
                        echo "<div class=\"col-md-1\">";
                        echo "<input type=\"checkbox\" value=\"1\" name=\"delete" . $row['TYPENAMEID'] . "\">";
                        echo "</div>";
                    }
                    echo "</div>";
                    oci_free_statement($compiled);
                    oci_free_statement($cursor);
    				break;
    			}
    		?>
    		<div class = "row">
    			<div class = "col-md-11">
    				<div id = "add-entry">
    					<button id="entryButton" onclick="addEntry()">Add another</button>
    				</div>
    			</div>
    		</div>
    		<input type="hidden" name="error" value = <?php if (isset($e)) echo $e->getMessage(); ?>>
    		<input type="hidden" name="catalog" value = <?php echo $_POST['catalog']?>>
    		<br><input type="submit" name = "submit" value="Submit catalog changes">
    		</form>
    	</div>
    </div>
    

	
</body>
</html>