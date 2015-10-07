<?php
    include('session.php');

    //check if user is matching or unmatching
    if ($_POST['submit'] == "Match") { //the users were unmatched
        $query = 'BEGIN insertMatch(:usernameID, :otherUsernameID); END;';
        $compiled = oci_parse($connection, $query);
        oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
        oci_bind_by_name($compiled, ':otherUsernameID', $_POST['other-usernameID'], 5);
        oci_execute($compiled, OCI_NO_AUTO_COMMIT);
        oci_commit($connection);
        echo "Matched!";
    }
    else if ($_POST['submit'] == "Matched!") { // the users were matched
        $query = 'BEGIN deleteMatch(:usernameID, :otherUsernameID); END;';
        $compiled = oci_parse($connection, $query);
        oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
        oci_bind_by_name($compiled, ':otherUsernameID', $_POST['other-usernameID'], 5);
        oci_execute($compiled, OCI_NO_AUTO_COMMIT);
        oci_commit($connection);
        echo "Unmatched :(";
    }

    $_SESSION['other-usernameID'] = $_POST['other-usernameID'];
    echo $_SESSION['other-usernameID'];
    header("Location: other-profile.php");

?>