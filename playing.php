<?php
    session_start();

    require_once 'functions/functions.php';
    require_once 'classes/Autoloader.php';

    Autoloader::register();
    
    // récupère le jeu de cartes mélangé
    // DEBUG
    prp($_SESSION);

    // retour de l'objet $game = new Memory()
    $game = unserialize($_SESSION['game']);

    // DEBUG
    // vdp($game);

    // DEBUG
    // vdp($_SESSION['shuffledDeck']);
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" href="styles/styleG.css">
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
        <article class="game">
        <?php
            $game->buildDeck($_SESSION['shuffledDeck']);
        ?>
        </article>
    </body>
</html>