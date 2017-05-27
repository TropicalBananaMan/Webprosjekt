<?php
require 'connect.inc.php';
require 'core.inc.php';

if (loggedin()) {
    echo 'Logget in';
        
} else {
    
    die ('<a href="login_register.php">Log in/Register</a><br>');
}



?>
