<?php

	//Start session
	session_start();
	$loginerror = ""; 						// Variable to store error message
	//if (isset($_POST["submit"])) {
		if (empty($_POST['form-email']) || empty($_POST['password1'])) {
		$loginerror = "Username or Password is invalid";
		$_POST['loginerror'] = $loginerror;
		header("Location: http://localhost/MatchMe/HTMLs/index.php#invalidData");
		}
		else {
			//establishes a connection to the db
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
			$usernameID = 0;
			$passCheck = 0;		//variable to check if username+password match

			$query = 'BEGIN checkpassword(:email, :pass, :passCheck); END;';
			$compiled = oci_parse($connection, $query);

			oci_bind_by_name($compiled, ':email', $email);
			oci_bind_by_name($compiled, ':pass', $pass);
			oci_bind_by_name($compiled, ':passCheck', $passCheck);

			oci_execute($compiled, OCI_NO_AUTO_COMMIT);
			oci_commit($connection);

			if ($passCheck == 1) {
				$query = 'BEGIN getID(:email, :usernameID); END;';
				$compiled = oci_parse($connection, $query);

				oci_bind_by_name($compiled, ':email', $email, 50);
				oci_bind_by_name($compiled, ':usernameID', $usernameID, 5);
				oci_execute($compiled, OCI_NO_AUTO_COMMIT);
				oci_commit($connection);
				
				//Check which type of user logged in
				$userType = 2; 													//Assume it's a normal user by default
				$query = 'BEGIN getUserType(:usernameID, :userType); END;';
				$compiled = oci_parse($connection, $query);
				oci_bind_by_name($compiled, ':usernameID', $usernameID, 5); 	//bind the usernameID just to be sure
				oci_bind_by_name($compiled, ':userType', $userType, 1);
				oci_execute($compiled, OCI_NO_AUTO_COMMIT);
				oci_commit($connection);

				//Store the type of user
				$_SESSION['userType'] = $userType;

				//Store the user ID
				$_SESSION["usernameID"] = $usernameID;

				if ($userType == 1) { //if user is administrator
					header("Location: http://localhost/MatchMe/HTMLs/admin-homepage.php");
				}
				else {
					header("Location: http://localhost/MatchMe/HTMLs/homepage.php");
				}
			}
			else {			//if the combination username+password were denied by the db
				$loginerror = "Username and password combination were invalid.";
				$_POST['loginerror'] = $loginerror;
				header("Location: http://localhost/MatchMe/HTMLs/index.php#username+passworddonotmatch");
			}
			oci_close($connection);
		}
	//}
	//else {		//if the submit action wasn't set, redirect
	//	echo "?";
	//	header("Location: http://localhost/MatchMe/HTMLs/index.php#login");
	//}
?>