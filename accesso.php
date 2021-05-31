<?php

$mysqli = new mysqli('localhost', 'root', '', 'elaborato_maturita');
/*------------------------------------------------------------------------------------------------------- /
if ($mysqli->connect_error) {
    die('Errore di connessione(' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
} else {
    echo 'Connesso. ' . $mysqli->host_info . "\n<br>";
}
/ ------------------------------------------------------------------------------------------------------ */

$email = $_POST['email'];
$password = $_POST['psw'];

$query = "SELECT nome, cognome, password FROM utente WHERE email= '$email'";
$result = $mysqli->query($query);
$utente = $result->fetch_array();

if (empty($utente)) {
    //non esiste, registrazione
    //collegarsi alla schermata di registrazione
    header("Refresh:0; url=register.php");
} else {
    //account presente nel database
    //controllare la sua password

    if ($utente['password'] === $password) {
        //utente correttamente loggato
        //collegare la pagina del negozio
        session_start();
        $_SESSION['email']=$email;
        header("Refresh:0; url=paginaDue.php?name=${utente['nome']}&surname=${utente['cognome']}");

    } else {
        //password errata
        //ricaricare solo la password
        header("Refresh:0; url=login.php");
    }
}
?>