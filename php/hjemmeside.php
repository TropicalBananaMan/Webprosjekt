<?php
require 'connect.inc.php';
require 'core.inc.php';

if (loggedin()) {
    $firstname = getuserfield('firstname');
    $surname = getuserfield('surname');

    echo 'Logget inn som '.$firstname.' '.$surname.'<br>';
    
    echo '<a href="logout.php">Log out</a><br>';
        
} else {
    
    echo '<a href="login_register.php">Log in/Register</a><br>';
}

?>