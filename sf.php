<?php

$mysqli = new mysqli('localhost', 'root', '', 'elaborato_maturita');

/* ------------------------------------------------------------------------------------------------------
if ($mysqli->connect_error) {
    die('Errore di connessione(' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
} else {
    echo 'Connesso. ' . $mysqli->host_info . "\n<br>";
}
/* ------------------------------------------------------------------------------------------------------ */


//$titolo= $_GET['titolo'];
$querySerie = "SELECT * FROM `serietv` WHERE titolo = 'Modern family'";
$resultSerie = $mysqli->query($querySerie);
$sf = $resultSerie->fetch_assoc();
$recensioni;
@session_start();
$isSerie =true;
$i=0;

if (empty($sf)) {
    $queryFilm = "SELECT * FROM `film` WHERE titolo = 'Modern family'";
    $resultFilm = $mysqli->query($queryFilm);
    $sf = $resultFilm->fetch_assoc();
    $_SESSION['titolo']=$sf['titolo'];
    $queryPiattaforma= "SELECT nome FROM `fp` WHERE titolo= 'Modern family'";
    $resultPiattaforma = $mysqli->query($queryPiattaforma);
    $queryRecensioni="SELECT * FROM `recensione` WHERE titoloFilm= 'Modern family'";
    $resultRecensioni = $mysqli->query($queryRecensioni);
    $isSerie=false;
}else{    
    $_SESSION['titolo']=$sf['titolo'];
    $queryPiattaforma= "SELECT nome FROM `sp` WHERE titolo= 'Modern family'";
    $resultPiattaforma = $mysqli->query($queryPiattaforma); 
    $queryRecensioni="SELECT * FROM `recensione` WHERE titoloSerie= 'Modern family'";
    $resultRecensioni = $mysqli->query($queryRecensioni);   
}





 echo "<!DOCTYPE html>
 <!--
 To change this license header, choose License Headers in Project Properties.
 To change this template file, choose Tools | Templates
 and open the template in the editor.
 -->
 <html>
     <head>
         <link href='grafica.css' rel='stylesheet' type='text/css'/>
         <title>Elaborato Esame Di Stato</title>
     </head>
     <body>
        <div id='titolo'>
            ${sf['titolo']}
        </div>
        <div>";
        
$container;
if(file_exists("img/${sf['titolo']}.jpg")){
    $container="<img src='img/${sf['titolo']}.jpg' alt='cover coming soon'>";
} else {
    $container="<img src='img/notFound.jpg' alt='non trovata'>";
}
echo $container;
        
echo    "</div>
        <div>
            <b>Anno di produzione: </b>
            ${sf['anno']}
        </div>";
        if($isSerie){
            echo "<div>
            <b>N° Stagioni: </b>
            ${sf['stagioni']}
        </div>
        <div>
            <b>N° Episodi Totali: </b>
            ${sf['episodi']}
        </div>
        <div>
            <b>Durata episodio: </b>
            ${sf['durataEp']}
        </div>";
        }
        
        echo "<div>
            <b>Trama: </b>
            ${sf['trama']}
        </div>
        <div>
            <b>Piattaforma: </b>";
            while($piattaforma=$resultPiattaforma->fetch_assoc()){
                echo"${piattaforma['nome']}"; 
                if($i++ <sizeof($piattaforma)) echo", ";
                else echo ".";
            }            
        echo"</div>
        <form action='recensione.php' method='POST'>
            <div>
                <b>Inserisci una recensione. </b>           
            </div><br>
            <div>
                <b>Inserisci una valutazione da 1 a 5:</b><br>
                <input type='number' id='quantity' name='valutazione' min='1' max='5'>
            </div><br>
            <div><br>
                <b>Inserisci un commento (massimo 500 caratteri):</b><br>
                <input style='width: 100%; height:auto; overflow:scroll; border:solid; background-color:white;' 
                type='text' id='username' name='commento' maxlength='500'>
            </div><br>
            <div>
                <input type='submit' value='Invia'>
            </div>
        </form>
        <div>
            <b>Tutte le recensioni: </b><br>";
            while($recensioni=$resultRecensioni->fetch_assoc()){
                echo "Commento scritto da: ${recensioni['email']} <br>
                Valutazione: ${recensioni['valutazione']} <br>
                Commento: ${recensioni['commento']} <br>";
            }
            
        echo "</div>



    </body>
</html>";

?>