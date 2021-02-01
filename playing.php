<?php
    session_start();

    require_once 'functions/functions.php';
    require_once 'classes/Autoloader.php';

    Autoloader::register();
    
    // récupère le jeu de cartes mélangé
    vdp($_SESSION['shuffledDesk']);
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Memory: le jeu</title>
    </head>
    <body>
        <header>
            <ul>
                <li><a href="index.php">index</a></li>
                <li><a href="playing.php">Jeu</a></li>
                <li><a href="deconnexion.php">Deconnexion</a></li>
            </ul>
        </header>
        
    </body>
</html>