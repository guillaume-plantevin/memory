<?php
    session_start();

    require_once 'functions/functions.php';
    require_once 'classes/Autoloader.php';
    
    Autoloader::register();
    
    // $value = 'ABCDEFGHIJKLMNOPQRST';
    $game = unserialize($_SESSION['game']);

    if (isset($_POST['cardId'])) {
        if (!$game->pTurnExists()) {
            $game->setPreviousTurn($_POST['id']);
        }
        elseif ($game->pTurnExists()) {

        }
        if ($game->pTurnExists() && $game->actualTurnExists()) {
            $game->comparison();
        }
    } 

    if (isset($_SESSION['difficulty'])) {
        $cardDeck = [];
        $numberOfCard = intval($game->getDifficulty());
        // echo 'number of cards = ' . $numberOfCard;
        for ($i = 0; $i < $numberOfCard; ++$i) {
            $cardDeck[$i] = new Cards($i, $value[$i]);
        }
    }
    if (isset($_REQUEST['cardId'])) {
        $cardId = intval($_REQUEST['cardId']);
        $cardDeck[$cardId]->flipCard();
    }
    // $game = new Memory;
    // echo $game->getidCard();

    // $card = new Cards(0, 'A');
    // prp($cardDeck, '$card');
    // vdp($cardDeck, '$card');
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
        // $card->printCard();
        foreach ($cardDeck as $k => $v) {
            // vdp($v);
            $cardDeck[$k]->printCard();
        }
        if (isset($_POST['cardId'])) {
            // $card = 
            // echo $_POST['cardId'];
        }
    ?>
    </article>
    <?php
        // DEBUG
        vdp($_REQUEST, '$_REQUEST');
        vdp($_SESSION, '$_SESSION');
        vdp($cardDeck, '$cardDeck');
        vdp($game, '$game');
        $_SESSION['game'] = serialize($game);
    ?>
</body>
</html>