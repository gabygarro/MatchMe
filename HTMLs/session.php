<?php
	//establishes a connection to the db
	$connection = oci_connect("ADMINISTRATOR", "ADMINISTRATOR", "(DESCRIPTION = (ADDRESS_LIST =
								(ADDRESS = (PROTOCOL = TCP)(HOST = 172.26.50.20)(PORT = 1521)))
								(CONNECT_DATA = (SID = MATCHDB) (SERVER = DEDICATED)))");
	if (!$connection) {
		echo "Invalid connection " . var_dump(ocierror());
		die();
	}

	// Starting Session
	session_start();

	//Store userID
	$userID = $_SESSION['userID'];

	//Store the user's first name
	$userFirstName = "";
	$query = 'BEGIN getPerson.FirstName(:userID, :userFirstName); END;';
	$compiled = oci_parse($connection, $query);

	oci_bind_by_name($compiled, ':userID', $userID, 3);
	oci_bind_by_name($compiled, ':userFirstName', $userFirstName, 50);
	oci_execute($compiled, OCI_NO_AUTO_COMMIT);
	oci_commit($connection);

	$_SESSION['firstName'] = $userFirstName;

	//Store the user's email

	//oci_close($connection);
?>