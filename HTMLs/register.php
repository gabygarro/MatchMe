<?php
	//page should check if the object coming is null and redirect to index.php
	$connection = oci_connect("administrator", "ADMINISTRATOR", "\\172.26.50.20:1521\MATCHMEDB");

	//captures error
	if (!$connection) {
		echo "Invalid connection" . var_dump(ocierror());
		die();
	}

	//gets values from index.php
	$user = $_POST["user"];
	$password = $_POST["password"];

	$query = 'INSERT INTO USERNAME (usernameID, usernamePassword) ' . 'VALUES (:user, :password);';
	$compiled = oci_parse($connection, $query);

	oci_bind_by_name($compiled, ':user', $user);
	oci_bind_by_name($compiled, ':password', $password);
	oci_execute($compiled, OCI_Default);

	oci_commit($connection);
	oci_close($connection);
?>