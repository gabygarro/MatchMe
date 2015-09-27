<?php
	//establishes a connection to the db
	$connection = oci_connect("ADMINISTRATOR", "ADMINISTRATOR", "(DESCRIPTION = (ADDRESS_LIST =
      							(ADDRESS = (PROTOCOL = TCP)(HOST = 172.26.50.118)(PORT = 1521)))
								(CONNECT_DATA =(SERVICE_NAME = MATCHME)))");
	if (!$connection) {
		echo "Invalid connection " . var_dump(ocierror());
		die();
	}

	// Starting Session
	session_start();

	//Store userID
	$usernameID = $_SESSION['usernameID'];

	//Store the user's first name
	$userFirstName = "";
	$query = 'BEGIN getPerson.FirstName(:usernameID, :userFirstName); END;';
	$compiled = oci_parse($connection, $query);

	oci_bind_by_name($compiled, ':usernameID', $usernameID, 5);
	oci_bind_by_name($compiled, ':userFirstName', $userFirstName, 50);
	oci_execute($compiled, OCI_NO_AUTO_COMMIT);
	oci_commit($connection);

	$_SESSION['firstName'] = $userFirstName;

	//Store the user´s tagline
	$tagline = "";
    $query = 'BEGIN getPerson.TagLine(:usernameID,:tagline); END;';
    $compiled = oci_parse($connection, $query);
    oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
    oci_bind_by_name($compiled, ':tagline', $tagline, 200);
    oci_execute($compiled, OCI_NO_AUTO_COMMIT);
    oci_commit($connection);
    $_SESSION['tagline'] = $tagline;

    //Store the user's sexual orientation
    $sexualOrientation;
    $query = 'BEGIN getPerson.orientation(:usernameID,:sexualOrientation); END;';
    $compiled = oci_parse($connection, $query);
    oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
    oci_bind_by_name($compiled, ':sexualOrientation', $sexualOrientation, 20);
    oci_execute($compiled, OCI_NO_AUTO_COMMIT);
    oci_commit($connection);
    $_SESSION['sexualOrientation'] = $sexualOrientation;	

     //Store the user's gender
    $gender;
    $query = 'BEGIN getPerson.gender(:usernameID,:gender); END;';
    $compiled = oci_parse($connection, $query);
    oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
    oci_bind_by_name($compiled, ':gender', $gender, 15);
    oci_execute($compiled, OCI_NO_AUTO_COMMIT);
    oci_commit($connection);
    $_SESSION['gender'] = $gender;

    //Store the user's age range
    $ageRange;
    $query = 'BEGIN getPerson.age_Range(:userID,:ageRange); END;';
    $compiled = oci_parse($connection, $query);
    oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
    oci_bind_by_name($compiled, ':ageRange', $ageRange, 20);
    oci_execute($compiled, OCI_NO_AUTO_COMMIT);
    oci_commit($connection);
    $_SESSION['ageRange'] = $ageRange;

    //Store the user's 
    
    //Store the user's 
    //Store the user's 
    //Store the user's 
    //Store the user's 


	//Store the user's email

	//oci_close($connection);
?>