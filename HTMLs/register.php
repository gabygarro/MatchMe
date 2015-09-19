<?php
	$registerError = " ";
	if (empty($_POST["form-email"]) || empty($_POST["password1"]) || empty($_POST["password2"])) {
		$registerError = "Username or Passwords are invalid";
		header("Location: http://localhost/MatchMe/HTMLs/index.php#invaliddata");
    }
    else { //if the data wasn't empty
    	$connection = oci_connect("ADMINISTRATOR", "ADMINISTRATOR", "(DESCRIPTION = (ADDRESS_LIST =
													      (ADDRESS = (PROTOCOL = TCP)(HOST = 172.26.50.20)(PORT = 1521)))
													    (CONNECT_DATA = (SID = MATCHDB) (SERVER = DEDICATED)))");
		if (!$connection) {
			echo "Invalid connection " . var_dump(ocierror());
			die();
		}

		//gets values from index.php
		$email = $_POST["form-email"];
		$pass1 = $_POST["password1"];
		$pass2 = $_POST["password2"];
		
		if (isset($_POST["admin"])) {
			$userType = 1;				//if user is admin
		}
		else {
			$userType = 2;
		}
		
		if ($pass1 == $pass2) { //if passwords match
			$query = 'BEGIN newuser(:email, :pass, :userType); END;';
			$compiled = oci_parse($connection, $query);

			oci_bind_by_name($compiled, ':email', $email);
			oci_bind_by_name($compiled, ':pass', $pass1);
			oci_bind_by_name($compiled, ':userType', $userType);
			oci_execute($compiled, OCI_NO_AUTO_COMMIT);
			oci_commit($connection);
			
			echo "Registration successful. ";
			echo "<a href = \"index.php\">Continue to log in.</a>";
		}
		else {					//if passwords don't match
			$registerError = "Passwords did not match";
			oci_close($connection);
			header("Location: http://localhost/MatchMe/HTMLs/index.php#passwordsdontnotmatch");
		}
		oci_close($connection);
    }
?>