<?php
require 'connect.inc.php';
require 'core.inc.php';

echo 'Hjemmeside!<br>';

if (loggedin()) {
    $firstname = getuserfield('firstname');
    $surname = getuserfield('surname');

    echo 'Hei '.$firstname.' '.$surname.'<br>';
    
    echo '<a href="logout.php">Log out</a><br>';
        
} else {
    
    echo '<a href="login_register.php">Log in/Register</a><br>';
}

echo '<p>Dette er tekst på hjemmesiden</p>';

?>