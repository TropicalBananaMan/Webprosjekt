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
            echo 'Invalid username/password combination.';
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
        echo 'You must supply username and password';
    }
}

?>

<form action="<?php echo $current_file; ?>" method="POST">
Brukernavn: <input type="text" name="username"> 
Passord: <input type="password" name="password"> 
<input type="submit" value="Log in">
</form>