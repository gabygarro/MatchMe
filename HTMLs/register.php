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
	$pass1 = $_POST["password1"];
	$pass2 = $_POST["password2"];

	if ($pass1 == $pass2) {
		$query = 'BEGIN newuser(:email, :pass); END;';
		$compiled = oci_parse($connection, $query);

		oci_bind_by_name($compiled, ':email', $email);
		oci_bind_by_name($compiled, ':pass', $pass1);
		oci_execute($compiled, OCI_NO_AUTO_COMMIT);
		oci_commit($connection);
	}
	else {
		//devuelve al homepage
	}

	oci_close($connection);
	echo "You have registered succesfully!";
?>