<?php
require 'core.inc.php';
require 'connect.inc.php';
/*require 'hjemmeside.php';*/

if (loggedin()) {
    $firstname = getuserfield('firstname');
    $surname = getuserfield('surname');

    echo 'You\'re logged in as '.$firstname.' '.$surname.' <a href="logout.php">Log out</a><br>';
    
//Hvis bruker ikke er logget inn går får man en loginform
} else {
    include 'loginform.inc.php';
}
?>


<a href="hjemmeside.php">Hjemmeside</a>
