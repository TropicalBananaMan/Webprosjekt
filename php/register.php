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
        echo 'Alle feltene må fylles inn.';
    }
    
    
}

?>

<html>

<!-- Registreringsformen -->    

<link rel="stylesheet" type="text/css" href="login_register.css">

<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">

<form action="register.php" method="POST">
  <div class="container"> 
      
<label><p>Brukernavn</p></label>
<input type="text" name="username" value="<?php if (isset($username)) { echo $username; } ?>"><br><br>
      
<label><p>Passord</p></label>
<input type="password" name="password"><br><br>

<label><p>Gjenta passord</p></label>
<input type="password" name="password_again"><br><br>

<label><p>Fornavn</p></label>
<input type="text" name="firstname" value="<?php if (isset($firstname)) { echo $firstname; } ?>"><br><br>

<label><p>Etternavn</p></label>
<input type="text" name="surname" value="<?php if(isset($surname)) { echo $surname; } ?>"><br><br>
<button type="submit">Registrer</button>
      
<a href="login_register.php">Gå tilbake</a>
  </div>

</form>
    
</html>


<?php
/*else if (loggedin()) {
    echo 'You\'re already registered and logged in.';
}*/

?>