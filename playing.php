<?php
    /**
     * ATTENTION: GROS PROBLEME:
     * Lorsque l'utilisateur rafraichit la page, les deux tours sont effacés de la prop
     * de la class Memory!
     */

     
    require_once 'classes/Autoloader.php';
    session_start();

    require_once 'functions/functions.php';

    Autoloader::register();
    
    // retour de l'objet $game = new Memory()
    $game = unserialize($_SESSION['game']);

    // DEBUG
    prp($game, '$game');
    // prp($_SESSION, '$_SESSION');
    
    // DEBUG
    // vdp($game, '$game');
    // vdp($_SESSION['shuffledDeck']);
    // vdp($game->pTurnExists(), '$game->pTurnExists()');

    if (isset($_GET['id']) && !$game->pTurnExists()) {
        $game->setPreviousTurn($_GET['id']);
        // echo 'reçu une première ID: ', $game->showActualId();
        $_SESSION['game'] = serialize($game);
        header("Location: playing.php");
        return;
    }
    elseif (isset($_GET['id']) && $game->pTurnExists()) {
        $game->setPreviousTurn($_GET['id']);
        // echo 'previous id: ', $game->showPreviousID(), '<br>';
        // echo 'actual id: ', $game->showActualId(), '<br>';
        $_SESSION['game'] = serialize($game);
        header("Location: playing.php");
        return;
    }
    if ($game->pTurnExists() && $game->aTurnExists()) {
        $game->comparison();
    }
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
        <!-- PEUT-ETRE CHANGER LES CLASS -->
        <article class="game flex d-flex justify-content-around">
        <?php
            $game->buildDeck($_SESSION['shuffledDeck']);
        ?>
        </article>
    </body>
</html>

<?php 
    $_SESSION['game'] = serialize($game);
?>