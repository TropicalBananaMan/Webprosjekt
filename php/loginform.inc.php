<?php


//Inkludert fra index hvis bruker ikke er logget in

//Brukernavn- og passord-sjekk
if(isset($_POST['username'])&&isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $password_hash = md5 ($password);
    
    //Hente bruker-id fra database:
    
    //Dersom fylt inn brukernavn og passord
    if (!empty($username)&&!empty($password)) {
    //Spørring etter utfyllt data sin id
    $query = "SELECT id FROM users WHERE username='".mysql_real_escape_string($username)."' AND password='".mysql_real_escape_string($password_hash)."'";
    //Returnerer antall rader funnet
    if ($query_run = mysql_query($query)) {
        $query_num_rows = mysql_num_rows($query_run);
        //Hvis rader funnet er null
        if ($query_num_rows==0) {
            echo 'Ugyldig brukernavn/passord kombinasjon.';
        //Hvis det finnes en rad fra spørringen
        //Finner frem id fra session
        //Sender bruker til index
        } else if ($query_num_rows==1) {
            $user_id = mysql_result($query_run, 0, 'id');
            $_SESSION['user_id']=$user_id;
            header('Location: hjemmeside.php');
        }
    }
    //Hvis bruker ikke har fyllt in feltene
    } else {
        echo 'Du må oppgi brukernavn og passord';
    }
}

?>

<html>

<!-- Logg inn formen -->

<link rel="stylesheet" type="text/css" href="login_register.css">
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    
<form action="<?php echo $current_file; ?>" method="POST">

  <div class="container">
    <label><p>Brukernavn</p></label>
    <input type="text" name="username">

    <label><p>Passord</p></label>
    <input type="password" name="password">

    <button type="submit">Logg inn</button>
    
    <a href="register.php">Registrer deg her</a>
  </div>
</form>
    
</html>
