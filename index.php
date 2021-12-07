<?php

if (array_key_exists("login", $_SESSION)) {
    header("location: dashboard.php");
    exit();
} else {
    // print 'Not loggedin from Dashboard';

    header("Location: logout.php");
    exit();
}
