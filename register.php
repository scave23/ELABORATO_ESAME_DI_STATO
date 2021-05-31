<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Register</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="grafica.css" rel="stylesheet" type="text/css"/>
    </head>
    <body style="background-color: black; width: 90%; height:100%;">
        <div><h2 style="font-size: 40px; text-align:center;">Registrati</h2></div>
        
            <form action="registrati.php" method="POST">
            <div id="divForm">
                <div>
                    <b style="color:purple">* Nome: </b>
                    <input type="text" style="color:purple" name="name" placeholder="Insert name..."></div>
                <p></p><br>
                <div>
                    <b style="color:purple">* Cognome: </b>
                    <input type="text" style="color:purple" name="sname" placeholder="Insert surname..."></div>
                <p></p><br>
                <div>
                    <b style="color:purple">* Codice Fiscale: </b>
                    <input type="text" style="color:purple" name="cf" placeholder="Insert fiscal code..."></div>
                <p></p><br>
                <div>
                    <b style="color:purple">* Email: </b>
                    <input type="email" style="color:purple" name="email" placeholder="Insert email..."></div>
                <p></p><br>
                <div>
                    <b style="color:purple">* Password: </b>
                    <input type="password" style="color:purple" name="psw" placeholder="Insert password..."></div>
                <p></p><br>                
                </div>
                <div style="text-align:center;"><input type="submit" value="Register"></div>
            </form>
            <br>
            
    </body>
</html>