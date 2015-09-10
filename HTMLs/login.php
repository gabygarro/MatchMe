<?php
	$connection = oci_connect("ADMINISTRATOR", "ADMINISTRATOR", "(DESCRIPTION = (ADDRESS_LIST =
													      (ADDRESS = (PROTOCOL = TCP)(HOST = 172.26.50.20)(PORT = 1521)))
													    (CONNECT_DATA = (SID = MATCHDB) (SERVER = DEDICATED)))");
	if (!$connection) {
		echo "Invalid connection " . var_dump(ocierror());
		die();
	}

	//gets values from index.php
	$email = $_POST["form-email"];
	$pass = $_POST["pass"];
	$usernameID = 0;
	$passCheck = 0;

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

		oci_bind_by_name($compiled, ':email', $email);
		oci_bind_by_name($compiled, ':usernameID', $usernameID);
		oci_execute($compiled, OCI_NO_AUTO_COMMIT);
		oci_commit($connection);
		echo "Your username ID is: " . $usernameID;
	}
	else {
		echo "Your username-password combination was incorrect <br>";
		echo "<a href = \"index.php\">Go back</a>";
	}
	oci_close($connection);
?>