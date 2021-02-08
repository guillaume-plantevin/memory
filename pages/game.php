<?php
session_start();

require_once 'functions/functions.php';
require_once 'classes/Autoloader.php';

Autoloader::register();

$game = unserialize($_SESSION['game']);
unset($_SESSION['game']);

// sert à rien
if ($game->stopGame()) {
    $_SESSION['game'] = serialize($game);
    header("Location: game.php");
    return;
}
if (isset($_POST['cardId'])) {
    if ($game->previousTurnExists() && $game->actualTurnExists()) {
        $game->comparison();
        $_SESSION['game'] = serialize($game);
    }
    if (!$game->previousTurnExists()) {
        $game->setPreviousTurn($_POST['cardId']);
        $_SESSION['game'] = serialize($game);
        header("Location: game.php");
        return;
    } else {
        $game->setActualTurn($_POST['cardId']);
        $_SESSION['game'] = serialize($game);
        header("Location: game.php");
        return;
    }
}
if ($game->previousTurnExists() && $game->actualTurnExists() && $game->getTotalPairs() === 1) {
    $game->comparison();
    $_SESSION['game'] = serialize($game);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/game.css">
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
    <?= $game->printScore(); ?>
    <!-- DEBUB -->
    <?= $game->printPairs(); ?>
    <?= $game->getPreviousTurn(); ?>
    <?= $game->getActualTurn(); ?>

    <article class="game flex d-flex justify-content-around">
        <?php
        if (!$game->stopGame()) {
            echo $game->printCard();
        } else {
            echo 'YOU WIN!';
        }
        ?>
    </article>
</body>

</html>
<?php
// DEBUG
vdp($game, '$game');
$_SESSION['game'] = serialize($game);
// DEBUG
vdp($_REQUEST, '$_REQUEST');
?>