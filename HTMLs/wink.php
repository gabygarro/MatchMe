<?php
    include('session.php');

    //check if user is winking or unwinking
    if ($_POST['submit'] == "Wink") { //the user is winking
        $query = 'BEGIN insertWink(:usernameID, :otherUsernameID); END;';
        $compiled = oci_parse($connection, $query);
        oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
        oci_bind_by_name($compiled, ':otherUsernameID', $_POST['other-usernameID'], 5);
        oci_execute($compiled, OCI_NO_AUTO_COMMIT);
        oci_commit($connection);
        echo "Winked!";
    }
    else if ($_POST['submit'] == "Winked!") { // the users were matched
        $query = 'BEGIN deleteWink(:usernameID, :otherUsernameID); END;';
        $compiled = oci_parse($connection, $query);
        oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
        oci_bind_by_name($compiled, ':otherUsernameID', $_POST['other-usernameID'], 5);
        oci_execute($compiled, OCI_NO_AUTO_COMMIT);
        oci_commit($connection);
        echo "Unwinked :(";
    }

    $_SESSION['other-usernameID'] = $_POST['other-usernameID'];
    echo $_SESSION['other-usernameID'];
    header("Location: other-profile.php");

?>