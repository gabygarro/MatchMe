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

	//store the user's picture
	if ($_SESSION['userType'] != 1) {
		$query = 'BEGIN getPicture(:usernameID, :fileLocation); END;';
		$compiled = oci_parse($connection, $query);
		oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
		oci_bind_by_name($compiled, ':fileLocation', $picture, 200);
		oci_execute($compiled, OCI_NO_AUTO_COMMIT);
		oci_commit($connection);
		$_SESSION['picture'] = $picture;
	}

	//Store the user's first name
	$userFirstName = "";
	$query = 'BEGIN getPerson.FirstName(:usernameID, :userFirstName); END;';
	$compiled = oci_parse($connection, $query);
	oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
	oci_bind_by_name($compiled, ':userFirstName', $userFirstName, 50);
	oci_execute($compiled, OCI_NO_AUTO_COMMIT);
	oci_commit($connection);
	$_SESSION['name'] = $userFirstName;

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
    $sexualOrientationID = 0;
    $query = 'BEGIN getPerson.orientation(:usernameID,:sexualOrientation,:sexualOrientationID); END;';
    $compiled = oci_parse($connection, $query);
    oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
    oci_bind_by_name($compiled, ':sexualOrientation', $sexualOrientation, 20);
    oci_bind_by_name($compiled, ':sexualOrientationID', $sexualOrientationID, 4);
    oci_execute($compiled, OCI_NO_AUTO_COMMIT);
    oci_commit($connection);
    $_SESSION['sexualOrientation'] = $sexualOrientation;	
    $_SESSION['sexualOrientationID'] = $sexualOrientationID;	

    //Store the user's gender
    $gender;
    $query = 'BEGIN getPerson.gender(:usernameID,:gender, :genderID); END;';
    $compiled = oci_parse($connection, $query);
    oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
    oci_bind_by_name($compiled, ':gender', $gender, 15);
    oci_bind_by_name($compiled, ':genderID', $genderID, 15);
    oci_execute($compiled, OCI_NO_AUTO_COMMIT);
    oci_commit($connection);
    $_SESSION['gender'] = $gender;
    $_SESSION['genderID'] = $genderID;

    //Store the user's age range
    $ageRange;
    $query = 'BEGIN getPerson.age_Range(:usernameID,:ageRange, :ageRangeID); END;';
    $compiled = oci_parse($connection, $query);
    oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
    oci_bind_by_name($compiled, ':ageRange', $ageRange, 20);
    oci_bind_by_name($compiled, ':ageRangeID', $ageRangeID, 20);
    oci_execute($compiled, OCI_NO_AUTO_COMMIT);
    oci_commit($connection);
    $_SESSION['ageRange'] = $ageRange;
    $_SESSION['ageRangeID'] = $ageRangeID;

    //Store the user's city and country
    $query = 'BEGIN getPerson.city_country(:userID, :city, :country); END;';
    $compiled = oci_parse($connection, $query);
    oci_bind_by_name($compiled, ':userID', $_SESSION['usernameID'], 5);
    oci_bind_by_name($compiled, ':city', $city, 50);
    oci_bind_by_name($compiled, ':country', $country, 50);
    oci_execute($compiled, OCI_NO_AUTO_COMMIT);
    oci_commit($connection);
    $_SESSION['cityName'] = $city;
    $_SESSION['country'] = $country;

    
    //Store the user's found partner variable
    $foundPartner;
    $query = 'BEGIN getPerson.foundPartner(:usernameID, :foundPartner); END;';
    $compiled = oci_parse($connection, $query);
    oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
    oci_bind_by_name($compiled, ':foundPartner', $foundPartner, 1);
    oci_execute($compiled, OCI_NO_AUTO_COMMIT);
    oci_commit($connection);
    $_SESSION['foundPartner'] = $foundPartner;
    
    //Store the user's got married value
    $gotMarried;
    $query = 'BEGIN getPerson.got_Married(:usernameID, :gotMarried); END;';
    $compiled = oci_parse($connection, $query);
    oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
    oci_bind_by_name($compiled, ':gotMarried', $gotMarried, 1);
    oci_execute($compiled, OCI_NO_AUTO_COMMIT);
    oci_commit($connection);
    $_SESSION['gotMarried'] = $gotMarried;
    
    //Store the user's lastname 1
    $lastName = "";
    $query = 'BEGIN getPerson.LastName1(:usernameID,:lastname1); END;';
    $compiled = oci_parse($connection, $query);
    oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
    oci_bind_by_name($compiled, ':lastname1', $lastName, 50);
    oci_execute($compiled, OCI_NO_AUTO_COMMIT);
    oci_commit($connection);
    $_SESSION['lastName'] = $lastName;

    //Store the user's lastname 2
    $lastName2 = "";
    $query = 'BEGIN getPerson.LastName2(:usernameID,:lastname2); END;';
    $compiled = oci_parse($connection, $query);
    oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
    oci_bind_by_name($compiled, ':lastname2', $lastName2, 50);
    oci_execute($compiled, OCI_NO_AUTO_COMMIT);
    oci_commit($connection);
    $_SESSION['lastName2'] = $lastName2;

	//Store the user's nickname
	$nickname = "";
	$query = 'BEGIN getPerson.Nickname(:usernameID,:nickname); END;';
	$compiled = oci_parse($connection, $query);
	oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
	oci_bind_by_name($compiled, ':nickname', $nickname, 25);
	oci_execute($compiled, OCI_NO_AUTO_COMMIT);
	oci_commit($connection);
	$_SESSION['nickname'] = $nickname;

	//Store the user's birthday
	$birthday;
    $query = 'BEGIN getPerson.birthday(:usernameID,:birthday); END;';
    $compiled = oci_parse($connection, $query);
    oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
    oci_bind_by_name($compiled, ':birthday', $birthday, 25);
    oci_execute($compiled, OCI_NO_AUTO_COMMIT);
    oci_commit($connection);
    $_SESSION['birthday'] = $birthday;

	//Store the user's zodiac sign
	$zodiacSign;
    $query = 'BEGIN getPerson.zodiacsign(:usernameID,:zodiacsign, :zodiacSignID); END;';
    $compiled = oci_parse($connection, $query);
    oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
    oci_bind_by_name($compiled, ':zodiacsign', $zodiacSign, 20);
    oci_bind_by_name($compiled, ':zodiacsignID', $zodiacSignID, 20);
    oci_execute($compiled, OCI_NO_AUTO_COMMIT);
    oci_commit($connection);
    $_SESSION['zodiacSign'] = $zodiacSign;
    $_SESSION['zodiacID'] = $zodiacSignID;

	//Store the user's relationship status
	$relationshipStatus;
    $query = 'BEGIN getPerson.relationshipstatus(:usernameID,:relationshipstatus, :relationshipStatusID); END;';
    $compiled = oci_parse($connection, $query);
    oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
    oci_bind_by_name($compiled, ':relationshipstatus', $relationshipStatus, 30);
    oci_bind_by_name($compiled, ':relationshipstatusID', $relationshipStatusID, 30);
    oci_execute($compiled, OCI_NO_AUTO_COMMIT);
    oci_commit($connection);
    $_SESSION['relationshipStatus'] = $relationshipStatus;
    $_SESSION['relationshipStatusID'] = $relationshipStatusID;

	//Store the user's email
	$email;
    $query = 'BEGIN email(:usernameID,:email); END;';
    $compiled = oci_parse($connection, $query);
    oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
    oci_bind_by_name($compiled, ':email', $email, 30);
    oci_execute($compiled, OCI_NO_AUTO_COMMIT);
    oci_commit($connection);
    $_SESSION['email'] = $email;

	//Store the user's address
	$address;
    $query = 'BEGIN getPerson.address(:usernameID,:address); END;';
    $compiled = oci_parse($connection, $query);
    oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
    oci_bind_by_name($compiled, ':address', $address, 140);
    oci_execute($compiled, OCI_NO_AUTO_COMMIT);
    oci_commit($connection);
    $_SESSION['address'] = $address;

	//Store the user's highschool
	$highschool;
    $query = 'BEGIN getPerson.highschool(:usernameID,:highschool); END;';
    $compiled = oci_parse($connection, $query);
    oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
    oci_bind_by_name($compiled, ':highschool', $highschool, 100);
    oci_execute($compiled, OCI_NO_AUTO_COMMIT);
    oci_commit($connection);
    $_SESSION['highschool'] = $highschool;

	//Store the user's university
	$university;
    $query = 'BEGIN getPerson.university(:usernameID,:university); END;';
    $compiled = oci_parse($connection, $query);
    oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
    oci_bind_by_name($compiled, ':university', $university, 100);
    oci_execute($compiled, OCI_NO_AUTO_COMMIT);
    oci_commit($connection);
    $_SESSION['university'] = $university;

	//Store the user's work
	$work;
    $query = 'BEGIN getPerson.workplace(:usernameID,:workplace); END;';
    $compiled = oci_parse($connection, $query);
    oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
    oci_bind_by_name($compiled, ':workplace', $work, 100);
    oci_execute($compiled, OCI_NO_AUTO_COMMIT);
    oci_commit($connection);
    $_SESSION['work'] = $work;

	//Store the user's salary
	$salary;
    $query = 'BEGIN getPerson.salary(:usernameID,:salary); END;';
    $compiled = oci_parse($connection, $query);
    oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
    oci_bind_by_name($compiled, ':salary', $salary, 7);
    oci_execute($compiled, OCI_NO_AUTO_COMMIT);
    oci_commit($connection);
    $_SESSION['salary'] = $salary;

	//Store the user's religion
	$religion;
    $query = 'BEGIN getPerson.religion(:usernameID,:religion, :religionID); END;';
    $compiled = oci_parse($connection, $query);
    oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
    oci_bind_by_name($compiled, ':religion', $religion, 50);
    oci_bind_by_name($compiled, ':religionID', $religionID, 50);
    oci_execute($compiled, OCI_NO_AUTO_COMMIT);
    oci_commit($connection);
    $_SESSION['religion'] = $religion;
    $_SESSION['religionID'] = $religionID;

	//Store the user's height
	$height;
    $query = 'BEGIN getPerson.height(:usernameID,:height); END;';
    $compiled = oci_parse($connection, $query);
    oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
    oci_bind_by_name($compiled, ':height', $height, 6);
    oci_execute($compiled, OCI_NO_AUTO_COMMIT);
    oci_commit($connection);
    $_SESSION['height'] = str_replace(",", ".", (string) $height); //convert to html format

	//Store the user's skin color
	$skinColor;
    $query = 'BEGIN getPerson.skinColor(:usernameID,:skinColor, :skinColorID); END;';
    $compiled = oci_parse($connection, $query);
    oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
    oci_bind_by_name($compiled, ':skinColor', $skinColor, 15);
    oci_bind_by_name($compiled, ':skinColorID', $skinColorID, 15);
    oci_execute($compiled, OCI_NO_AUTO_COMMIT);
    oci_commit($connection);
    $_SESSION['skinColor'] = $skinColor;
    $_SESSION['skinColorID'] = $skinColorID;

	//Store the user's eye color
	$eyeColor;
    $query = 'BEGIN getPerson.eyeColor(:usernameID,:eyeColor, :eyeColorID); END;';
    $compiled = oci_parse($connection, $query);
    oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
    oci_bind_by_name($compiled, ':eyeColor', $eyeColor, 15);
    oci_bind_by_name($compiled, ':eyeColorID', $eyeColorID, 15);
    oci_execute($compiled, OCI_NO_AUTO_COMMIT);
    oci_commit($connection);
    $_SESSION['eyeColor'] = $eyeColor;
    $_SESSION['eyeColorID'] = $eyeColorID;

	//Store the user's heir color
	$hairColor;
    $query = 'BEGIN getPerson.hairColor(:usernameID,:hairColor, :hairColorID); END;';
    $compiled = oci_parse($connection, $query);
    oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
    oci_bind_by_name($compiled, ':hairColor', $hairColor, 30);
    oci_bind_by_name($compiled, ':hairColorID', $hairColorID, 30);
    oci_execute($compiled, OCI_NO_AUTO_COMMIT);
    oci_commit($connection);
    $_SESSION['hairColor'] = $hairColor;
    $_SESSION['hairColorID'] = $hairColorID;

	//Store the user's body type
	$bodyType;
    $query = 'BEGIN getPerson.bodyType(:usernameID,:bodyType, :bodyTypeID); END;';
    $compiled = oci_parse($connection, $query);
    oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
    oci_bind_by_name($compiled, ':bodyType', $bodyType, 30);
    oci_bind_by_name($compiled, ':bodyTypeID', $bodyTypeID, 30);
    oci_execute($compiled, OCI_NO_AUTO_COMMIT);
    oci_commit($connection);
    $_SESSION['bodyType'] = $bodyType;
    $_SESSION['bodyTypeID'] = $bodyTypeID;

	//Store the user's smoker value
	$smoker;
    $query = 'BEGIN getPerson.smoker(:usernameID,:smoker); END;';
    $compiled = oci_parse($connection, $query);
    oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
    oci_bind_by_name($compiled, ':smoker', $smoker, 1);
    oci_execute($compiled, OCI_NO_AUTO_COMMIT);
    oci_commit($connection);
    $_SESSION['smoker'] = $smoker;

	//Store the user's drinker value
	$drinker;
    $query = 'BEGIN getPerson.drinker(:usernameID,:drinker); END;';
    $compiled = oci_parse($connection, $query);
    oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
    oci_bind_by_name($compiled, ':drinker', $drinker, 1);
    oci_execute($compiled, OCI_NO_AUTO_COMMIT);
    oci_commit($connection);
    $_SESSION['drinker'] = $drinker;

	//Store the user's exercise frequency
	$exerciseFrequency;
    $query = 'BEGIN getPerson.exercisefreq(:usernameID,:exercisefreq, :exercisefreqID); END;';
    $compiled = oci_parse($connection, $query);
    oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
    oci_bind_by_name($compiled, ':exercisefreq', $exerciseFrequency, 30);
    oci_bind_by_name($compiled, ':exercisefreqID', $exerciseFrequencyID, 30);
    oci_execute($compiled, OCI_NO_AUTO_COMMIT);
    oci_commit($connection);
    $_SESSION['exerciseFrequency'] = $exerciseFrequency;
    $_SESSION['exerciseFrequencyID'] = $exerciseFrequencyID;

	//Store the user's number of kids
	$numberKids;
    $query = 'BEGIN getPerson.numberOfKids(:usernameID,:numberOfKids); END;';
    $compiled = oci_parse($connection, $query);
    oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
    oci_bind_by_name($compiled, ':numberOfKids', $numberKids, 2);
    oci_execute($compiled, OCI_NO_AUTO_COMMIT);
    oci_commit($connection);
    $_SESSION['numberKids'] = $numberKids;

	//Store the user's interested in children value
	$interestedChildren;
    $query = 'BEGIN getPerson.interestedInKids(:usernameID,:interestedInKids); END;';
    $compiled = oci_parse($connection, $query);
    oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
    oci_bind_by_name($compiled, ':interestedInKids', $interestedChildren, 1);
    oci_execute($compiled, OCI_NO_AUTO_COMMIT);
    oci_commit($connection);
    $_SESSION['interestedChildren'] = $interestedChildren;

	//Store the user's likes pets value
	$likesPets;
    $query = 'BEGIN getPerson.likesPets(:usernameID,:likesPets); END;';
    $compiled = oci_parse($connection, $query);
    oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
    oci_bind_by_name($compiled, ':likesPets', $likesPets, 1);
    oci_execute($compiled, OCI_NO_AUTO_COMMIT);
    oci_commit($connection);
    $_SESSION['likesPets'] = $likesPets;

	//Get and save the user's languages
	$countLanguages = 0;
    $cursor = oci_new_cursor($connection);
    $query = 'BEGIN getCatalog.languages(:cursor, :countLanguages); END;';
    $compiled = oci_parse($connection, $query);
    oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
    oci_bind_by_name($compiled, ':countLanguages', $countLanguages, 3);
    oci_execute($compiled);
    oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
    $_SESSION['countLanguages'] = $countLanguages;
    
    $currentLanguage = 0;
    $languageCheck = 0;
    while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
        $query1 = 'BEGIN getPerson.checkLanguage(:usernameID,:languageID,:languageCheck); END;';
	    $compiled1 = oci_parse($connection, $query1);
	    oci_bind_by_name($compiled1, ':usernameID', $_SESSION['usernameID'], 5);
	    oci_bind_by_name($compiled1, ':languageID', $row['TYPENAMEID'], 3); //compare to the actual hobbie ID in the catalog
	    oci_bind_by_name($compiled1, ':languageCheck', $languageCheck, 1);
	    oci_execute($compiled1, OCI_NO_AUTO_COMMIT);
	    oci_commit($connection);

	    if ($languageCheck == 1) {
	    	$_SESSION['language' . $currentLanguage] = $row['TYPENAMEID'];
	    }
	    $currentLanguage++;
    }

    oci_free_statement($compiled);
    oci_free_statement($cursor);

    //user's hobbies
	$countHobbies = 0;
    $cursor = oci_new_cursor($connection);
    $query = 'BEGIN getCatalog.Hobbie(:cursor, :countHobbies); END;';
    $compiled = oci_parse($connection, $query);
    oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
    oci_bind_by_name($compiled, ':countHobbies', $countHobbies, 3);
    oci_execute($compiled);
    oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
    $_SESSION['countHobbies'] = $countHobbies;

    $currentHobbie = 0;
    $hobbieCheck = 0;	//assume the person doesn't have the hobbie by default
    while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
        $query1 = 'BEGIN getPerson.checkHobbie(:usernameID,:hobbieID,:hobbieCheck); END;';
	    $compiled1 = oci_parse($connection, $query1);
	    oci_bind_by_name($compiled1, ':usernameID', $_SESSION['usernameID'], 5);
	    oci_bind_by_name($compiled1, ':hobbieID', $row['TYPENAMEID'], 3); //compare to the actual hobbie ID in the catalog
	    oci_bind_by_name($compiled1, ':hobbieCheck', $hobbieCheck, 1);
	    oci_execute($compiled1, OCI_NO_AUTO_COMMIT);
	    oci_commit($connection);

	    if ($hobbieCheck == 1) {
	    	$_SESSION['hobbie' . $currentHobbie] = $row['TYPENAMEID'];
	    }
	    $currentHobbie++;
    }
    
    oci_free_statement($compiled);
    oci_free_statement($cursor);

    //user's interests
    $countInterests = 0;
    $cursor = oci_new_cursor($connection);
    $query = 'BEGIN getCatalog.interest(:cursor, :countInterests); END;';
    $compiled = oci_parse($connection, $query);
    oci_bind_by_name($compiled, ':cursor', $cursor, -1, OCI_B_CURSOR);
    oci_bind_by_name($compiled, ':countInterests', $countInterests, 3);
    oci_execute($compiled);
    oci_execute($cursor, OCI_DEFAULT);       //execute the cursor like a normal statement
    $_SESSION['countInterests'] = $countInterests;

    $currentInterest = 0;
    $interestCheck = 0;
    while (($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
        $query1 = 'BEGIN getPerson.checkInterest(:usernameID,:interestID,:interestCheck); END;';
	    $compiled1 = oci_parse($connection, $query1);
	    oci_bind_by_name($compiled1, ':usernameID', $_SESSION['usernameID'], 5);
	    oci_bind_by_name($compiled1, ':interestID', $row['TYPENAMEID'], 3); //compare to the actual interest ID in the catalog
	    oci_bind_by_name($compiled1, ':interestCheck', $interestCheck, 1);
	    oci_execute($compiled1, OCI_NO_AUTO_COMMIT);
	    oci_commit($connection);

	    if ($interestCheck == 1) {
	    	$_SESSION['interest' . $currentInterest] = $row['TYPENAMEID'];
	    }
	    $currentInterest++;
    }

    oci_free_statement($compiled);
    oci_free_statement($cursor);

	//oci_close($connection);
?>