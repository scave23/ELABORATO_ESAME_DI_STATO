<?php

$mysqli = new mysqli('localhost', 'root', '', 'elaborato_maturita');
/*
if ($mysqli->connect_error) {
    die('Errore di connessione(' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
} else {
    echo 'Connesso. ' . $mysqli->host_info . "\n<br>";
}
*/
session_start();
$valutazione = $_POST['valutazione'];
$commento = $_POST['commento'];
@$titolo = $_SESSION['titolo'];


$querySerie = "SELECT * FROM `serietv` WHERE serietv.titolo = '$titolo'";
$resultSerie = $mysqli->query($querySerie);
$serietv = $resultSerie->fetch_array();

if (empty($serietv)) {
    $query = "INSERT INTO `recensione`( `valutazione`, `commento`, `email`, `titoloFilm`) VALUES 
    ($valutazione,'$commento','simone.scavezzon@gmail.com','$titolo')";
    $result = $mysqli->query($query);
} else {
    $query = "INSERT INTO `recensione`( `valutazione`, `commento`, `email`, `titoloSerie`) VALUES 
($valutazione,'$commento','simone.scavezzon@gmail.com','$titolo')";
$result = $mysqli->query($query);
}

//header("Refresh:0; url=sf.php?titolo=$titolo");
?>