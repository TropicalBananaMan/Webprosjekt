<?php
require 'core.inc.php';
require 'connect.inc.php';

if(!loggedin()) {
    
if (isset($_POST['username'])&& isset($_POST['password'])&& isset($_POST['password_again'])&& isset($_POST['firstname'])&& isset($_POST['surname']))
    @$username = $_POST['username'];
    @$password = $_POST['password'];
    @$password_again = $_POST['password_again'];
    
    $password_hash = md5($password);
    
    @$firstname = $_POST['firstname'];
    @$surname = $_POST['surname'];
    
    if(!empty($username)&&!empty($password)&&!empty($password_again)&&!empty($firstname)&&!empty($surname)) {
    if ($password!=$password_again) {
        echo 'Passordene må være identiske.';
    } else {
        //spørre om brukernavn finnes i db
        $query = "SELECT `username` FROM `users` WHERE `username` = '$username'";
        $query_run = mysql_query($query);
        //Hvis brukernavnet finnes: 
        if (mysql_num_rows($query_run)==1) {
            echo 'Brukernavnet '.$username.' er allerede i bruk.';
        //Hvis brukernavnet er ledig
        } else {
            //Setter verdiene inn i db
            $query = "INSERT INTO `users` VALUES ('','".mysql_real_escape_string($username)."','".mysql_real_escape_string($password_hash)."','".mysql_real_escape_string($firstname)."','".mysql_real_escape_string($surname)."')";
            //Bli redirected til register_success.php
            if ($query_run = mysql_query($query)) {
                header ('Location: register_success.php');
            //Feilmelding
            } else {
                echo 'Beklager, vi kunne ikke registrere deg, prøv igjen siden.';
            }
        }
        
    }
    //Hvis alt ikke er fylt inn
    } else {
        echo 'Alle felter må fylles inn.';
    }
    
    
}

?>

<form action="register.php" method="POST">
Brukernavn:<br> <input type="text" name="username" value="<?php if (isset($username)) { echo $username; } ?>"><br><br>
Passord:<br> <input type="password" name="password"><br><br>
Gjenta passord:<br> <input type="password" name="password_again"><br><br>
Fornavn:<br> <input type="text" name="firstname" value="<?php if (isset($firstname)) { echo $firstname; } ?>"><br><br>
Etternavn:<br> <input type="text" name="surname" value="<?php if(isset($surname)) { echo $surname; } ?>"><br><br>
<input type="submit" value="Registrer">


</form>

<?php
/*else if (loggedin()) {
    echo 'You\'re already registered and logged in.';
}*/

?>