<?php
    session_start();

    require_once 'functions/functions.php';
    require_once 'classes/Autoloader.php';
    
    Autoloader::register();

    if (isset($_REQUEST['difficulty'])) {
        $_SESSION['difficulty'] = $_REQUEST['difficulty'];
        $game = new Memory(0, 1);
        $game->setDifficulty($_REQUEST['difficulty']);
        $game->createDeck();
        $game->shuffleDeck();
        // $_SESSION['shuffledDeck'] = $game->shuffleDeck();
        $_SESSION['game'] = serialize($game);
        // vdp($_SESSION);
        // vdp($game);
        // die;

        header('Location: game.php');
        return;
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" href="styles/styleG.css">
        <title>choix de la difficulté</title>
    </head>
    <body>
        <header>
            <ul>
                <li><a href="index.php">index</a></li>
                <li><a href="playing.php">Jeu</a></li>
                <li><a href="deconnexion.php">Deconnexion</a></li>
            </ul>
        </header>
        <form action="" method='GET'>
            <label for="diff">nombre de paires</label>
            <select name="difficulty" id="diff">
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
            <input type="submit" value="GO">
        </form>
    </body>
</html>