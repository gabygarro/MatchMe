<?php
	//page should check if the object coming is null and redirect to index.php
	$connection = oci_connect("ADMINISTRATOR", "ADMINISTRATOR", "(DESCRIPTION =
													    (ADDRESS_LIST =
													      (ADDRESS = (PROTOCOL = TCP)(HOST = 172.26.50.20)(PORT = 1521))
													    )
													    (CONNECT_DATA =
													      (SID = MATCHDB)
													      (SERVER = DEDICATED)
													    )
													)");

	//captures error
	if (!$connection) {
		echo "Invalid connection " . var_dump(ocierror());
		die();
	}

	//gets values from index.php
	$nickname = $_POST["user"];
	$pass = $_POST["password"];

	$query = 'INSERT INTO USERNAME (usernameID, usernamePassword) ' . 'VALUES (:nickname, :pass)';
	$compiled = oci_parse($connection, $query);

	oci_bind_by_name($compiled, ':nickname', $nickname);
	oci_bind_by_name($compiled, ':pass', $pass);
	oci_execute($compiled, OCI_NO_AUTO_COMMIT);

	oci_commit($connection);
	oci_close($connection);
	echo "You have registered succesfully!";
?>