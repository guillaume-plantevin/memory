<?php
    session_start();

    require_once 'functions/functions.php';

    require_once 'classes/Autoloader.php';
    Autoloader::register();

    if (isset($_GET['difficulty'])) {
        $game = new Memory;
        $game->setDifficulty($_GET['difficulty']);
        $game->createDesk();
        $_SESSION['shuffledDesk'] = $game->shuffleDesk();
        header('Location: playing.php');
        return;
    }
    // vdp($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>index</title>
    </head>
    <body>
        <header>
            <ul>
                <li><a href="index.php">index</a></li>
                <li><a href="playing.php">Jeu</a></li>
                <li><a href="deconnexion.php">Deconnexion</a></li>
            </ul>
        </header>
        <form action="" method='get'>
            <label for="diff">nombre de paires</label>
            <select name="difficulty" id="diff">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
            </select>
            <input type="submit" value="GO">
        </form>
    </body>
</html>