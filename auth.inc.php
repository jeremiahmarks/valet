<?php
    session_start();
    if (isset ($_SESSION['logged']) && $_SESSION['logged']==1) {
        //User is logged in, there is nothing to do
    } else {
        $redirect = $_SERVER['PHP_SELF'];
        header("Refresh: 5; URL=user_login.php?redirect=$redirect");
        echo "You are being redirected to the login page.<br>";
        echo "<a href=\"login.php?redirect=$redirect\">Click Here</a> if the " .
            "redirect does not automatically happen";
        die();
    }
?>

