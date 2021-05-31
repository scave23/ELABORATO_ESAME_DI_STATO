<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link href="grafica.css" rel="stylesheet" type="text/css"/>
        <title>Elaborato Esame Di Stato</title>
    </head>
    <body>
        <div id="titolo">
            <form class="research" action="index.php">
                RICERCA
                <input style="width:90%; left:5%; color:purple"  type="text" name="ricerca">
            </form>
            <div>
                <h2>Cinefili Time</h2>
            </div>
            <form action="login.php">
                <input class="logBtn" id="bottone" type="submit" value="Login">
            </form>
            <form action="register.php">
                <input class="registerBtn" id="bottone" type="submit" value="Registrati">
            </form>
        </div>
        <br>

        <!-- ---------Elenco Serie TV-------- -->
        <div id="serietv">
            <div style="color: purple; font-size:25px; text-align:center;">
               <h3><b> SERIE TV </b></h3>
            </div>
            <br>
            <?php 
                include('serietv.php') 
            ?>
        </div>

        <!-- ---------Elenco Film--------------- -->
        <div id="film">
            <div style="color: purple; font-size:25px; text-align:center;">
            <h3><b> FILM </b></h3>
            </div>
            <?php            
                include('film.php');               
            ?>
        </div>
        
    </body>
</html>