<?php
    session_start();

    require_once 'functions/functions.php';
    require_once 'classes/Autoloader.php';
    
    Autoloader::register();
    
    $game = unserialize($_SESSION['game']);

    if (isset($_POST['cardId'])) {
        if (!$game->pTurnExists()) {
            $game->setPreviousTurn($_POST['cardId']);
        }
        elseif ($game->pTurnExists()) {

        }
        if ($game->pTurnExists() && $game->actualTurnExists()) {
            $game->comparison();
        }
    } 

    if (isset($_SESSION['difficulty'])) {
        // $game->printDeck();
        // $cardDeck = [];
        // $numberOfCard = intval($game->getDifficulty());
        // echo 'number of cards = ' . $numberOfCard;
        // for ($i = 0; $i < $numberOfCard; ++$i) {
        //     $cardDeck[$i] = new Cards($i, $game->getValue($i);
        // }
    }
    if (isset($_REQUEST['cardId'])) {
        $cardId = intval($_REQUEST['cardId']);
        $game->flippingCard($cardId);
        // $cardDeck[$cardId]->flipCard();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/styleG.css">
    <title>game</title>
</head>
<body>
    <header>
        <ul>
            <li><a href="index.php">index</a></li>
            <li><a href="playing.php">Jeu</a></li>
            <li><a href="deconnexion.php">Deconnexion</a></li>
        </ul>
    </header>
    <article class="game flex d-flex justify-content-around">
        <?php
            $game->printScore();
            $game->printDeck();
        ?>
    </article>
    <?php
        // DEBUG
        vdp($_REQUEST, '$_REQUEST');
        vdp($_SESSION, '$_SESSION');
        // vdp($cardDeck, '$cardDeck');
        vdp($game, '$game');

        $_SESSION['game'] = serialize($game);
    ?>
</body>
</html>