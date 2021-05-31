<?php

$mysqli = new mysqli('localhost', 'root', '', 'elaborato_maturita');
/*------------------------------------------------------------------------------------------------------- 
if ($mysqli->connect_error) {
    die('Errore di connessione(' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
} else {
    echo 'Connesso. ' . $mysqli->host_info . "\n<br>";
}
/* ------------------------------------------------------------------------------------------------------ */

$nome = $_POST['name'];
$cognome = $_POST['sname'];
@$cf = $_POST['cf'];
@$email = $_POST['email'];
@$password = $_POST['psw'];

$query = "INSERT INTO utente(CF, nome, cognome, email, password) VALUES ('$cf', '$nome', '$cognome', '$email', '$password')";
$queryLogin = "SELECT email FROM utente WHERE email = '$email'";
$array = $mysqli->query($queryLogin)->fetch_array();

if(!is_null($array['email'])){
    //significa che esiste già una persona con quella mail
    header("Refresh:0; url=login.php");
} else {
    //inserire nel database il nuovo utente
    $result = $mysqli->query($query);
    header("Refresh:0; url=/index.php");
}

?>