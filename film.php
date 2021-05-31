<?php

$mysqli = new mysqli('localhost', 'root', '', 'elaborato_maturita');
/* ------------------------------------------------------------------------------------------------------- 
if ($mysqli->connect_error) {
    die('Errore di connessione(' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
} else {
    echo 'Connesso. ' . $mysqli->host_info . "\n<br>";
}
/* ------------------------------------------------------------------------------------------------------ */

$query = "SELECT titolo FROM `film`";


$result = $mysqli->query($query);

 echo "<div class=film>";

while ($film = $result->fetch_assoc()) {
    
        //mostra immagine
        $container = " <div class='copertina'>";
                        if(file_exists("img/${film['titolo']}.jpg")){
                            $container= $container."<img src='img/${film['titolo']}.jpg' alt='cover coming soon'>";
                        } else {
                            $container= $container."<img src='img/notFound.jpg' alt='non trovata'>";
                        }
    $container= $container."</div>";
    echo $container;
}

echo "</div>";
?>