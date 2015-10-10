<?php
	/* Proyecto I Bases de Datos - Prof. Adriana Álvarez
   * match.me - Oracle
   * Alexis Arguedas, Gabriela Garro, Yanil Gómez
   * -------------------------------------------------
   * login.php - Created: 10/09/2015
   * Checks for mistakes on the login and proceeds to validate the user's data and redirects to the user homepage.
   */
	session_start(); //Start session
	$loginerror = ""; // Variable to store error message

	if (empty($_POST['form-email']) || empty($_POST['password1'])) {
		$loginerror = "Username or password is invalid";
		$_SESSION['loginerror'] = $loginerror;
		header("Location: index.php#invalidData");
	}
	else { //establishes a connection to the db
		$connection = oci_connect("ADMINISTRATOR", "ADMINISTRATOR", "(DESCRIPTION = (ADDRESS_LIST =
  							(ADDRESS = (PROTOCOL = TCP)(HOST = 172.26.50.118)(PORT = 1521)))
							(CONNECT_DATA =(SERVICE_NAME = MATCHME)))");
		if (!$connection) {
			echo "Invalid connection " . var_dump(ocierror());
			die();
		}

		// gets values from index.php
		$email = $_POST["form-email"];
		$pass = $_POST["password1"];
		$usernameID = 0;	//variable to store the usernameID
		$passCheck = 0;		//variable to check if username+password match

		//ask the db to check for if the password matches this email
		$query = 'BEGIN checkpassword(:email, :pass, :passCheck); END;';
		$compiled = oci_parse($connection, $query);
		oci_bind_by_name($compiled, ':email', $email);
		oci_bind_by_name($compiled, ':pass', $pass);
		oci_bind_by_name($compiled, ':passCheck', $passCheck);
		oci_execute($compiled, OCI_NO_AUTO_COMMIT);
		oci_commit($connection);
		$_SESSION['email'] = $_POST['form-email']; //store the user's email

		if ($passCheck == 1) { //if the password+email combination was correct
			//get the ID related to this email
			$query = 'BEGIN getID(:email, :usernameID); END;';
			$compiled = oci_parse($connection, $query);
			oci_bind_by_name($compiled, ':email', $email, 50);
			oci_bind_by_name($compiled, ':usernameID', $usernameID, 5);
			oci_execute($compiled, OCI_NO_AUTO_COMMIT);
			oci_commit($connection);
			
			//Check which type of user logged in
			$userType = 2; 	//Assume it's a normal user by default
			$query = 'BEGIN getUserType(:usernameID, :userType); END;';
			$compiled = oci_parse($connection, $query);
			oci_bind_by_name($compiled, ':usernameID', $usernameID, 5);
			oci_bind_by_name($compiled, ':userType', $userType, 1);
			oci_execute($compiled, OCI_NO_AUTO_COMMIT);
			oci_commit($connection);

			//Store the type of user
			$_SESSION['userType'] = $userType;

			//Store the user ID
			$_SESSION['usernameID'] = $usernameID;

			if ($userType == 1) { //if user is administrator
				header("Location: admin-homepage.php");
			}
			else {
				header("Location: homepage.php");
			}
		}
		else {	//if the combination username+password were denied by the db
			$loginerror = "Username and password combination were invalid.";
			$_SESSION['loginerror'] = $loginerror;
			header("Location: index.php#username+passworddonotmatch");
		}
		oci_close($connection);
	}
?>