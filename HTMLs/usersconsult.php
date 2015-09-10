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

	$query = oci_parse($connection, "select * from username");
	OCI_Execute($query, OCI_NO_AUTO_COMMIT);

	echo "<table border=\"1\">\n";
	echo "<tr>";
	echo "<th>Username</th>";
	echo "<th>Password</th>";
	echo "</tr>\n";

	while (oci_fetch($query)) {
		$username = oci_result($query, 'USERNAMEID');
		$password = oci_result($query, 'USERNAMEPASSWORD');

		echo "<tr>";
		echo "<td>$username</td>";
		echo "<td>$password</td>";
		echo "</tr>\n";
	}

	oci_commit($connection);
	oci_close($connection);
?>