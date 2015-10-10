<?php
	/* Proyecto I Bases de Datos - Prof. Adriana Álvarez
   * match.me - Oracle
   * Alexis Arguedas, Gabriela Garro, Yanil Gómez
   * -------------------------------------------------
   * register.php - Created: 08/09/2015
   * Validates that the email is in a correct format, checks if both passwords are correct, and 
   * proceeds to register the user and redirect to profile creation.
   */
	session_start(); //start the session
	$registerError = ""; //variable to store a register error
	if (empty($_POST["form-email"]) || empty($_POST["password1"]) || empty($_POST["password2"])) {
		$registerError = "Username or Passwords are invalid";
		$_SESSION['registerError'] = $registerError;
		header("Location: index.php#invaliddata");
    }
    else { //if the data wasn't empty
    	$connection = oci_connect("ADMINISTRATOR", "ADMINISTRATOR", "(DESCRIPTION = (ADDRESS_LIST =
      							(ADDRESS = (PROTOCOL = TCP)(HOST = 172.26.50.118)(PORT = 1521)))
								(CONNECT_DATA =(SERVICE_NAME = MATCHME)))");
		if (!$connection) {
			echo "Invalid connection " . var_dump(ocierror());
			die();
		}

		//gets values from index.php
		$email = $_POST["form-email"];
		$pass1 = $_POST["password1"];
		$pass2 = $_POST["password2"];

		//set the userType by default
		$userType = 2;

		//check the email format
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		  $_SESSION['registerError'] = "Invalid email format"; 
		  header("Location: index.php#invalidmailformat");
		}
		
		if ($pass1 == $pass2) { //if passwords match
			//create new user
			$query = 'BEGIN newuser(:email, :pass, :userType); END;';
			$compiled = oci_parse($connection, $query);
			oci_bind_by_name($compiled, ':email', $email);
			oci_bind_by_name($compiled, ':pass', $pass1);
			oci_bind_by_name($compiled, ':userType', $userType);
			oci_execute($compiled, OCI_NO_AUTO_COMMIT);
			oci_commit($connection);
			$_SESSION['userType'] = $userType; 	//save the user's type
			$_SESSION['email'] = $_POST['form-email'];

			//get the new user's ID
			$usernameID = 0;
			$query = 'BEGIN getID(:email, :usernameID); END;';
			$compiled = oci_parse($connection, $query);
			oci_bind_by_name($compiled, ':email', $email, 50);
			oci_bind_by_name($compiled, ':usernameID', $usernameID, 5);
			oci_execute($compiled, OCI_NO_AUTO_COMMIT);
			oci_commit($connection);
			$_SESSION['usernameID'] = $usernameID; 	//save the usernameID
			header("Location: create-profile.php"); //since the registration went well, go on to create your profile
		}
		else {	//if passwords don't match
			$registerError = "Passwords did not match";
			$_SESSION['registerError'] = $registerError;
			oci_close($connection);
			header("Location: index.php#passwordsdontnotmatch");
		}
		oci_close($connection);
    }
?>