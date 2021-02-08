<?php
require_once 'classes/Db.php';

require_once 'functions/functions.php';
require_once 'classes/Autoloader.php';
spl_autoload_register(['Autoloader', 'autoload']);

if (isset($_REQUEST['difficulty'])) {
    $difficulty = $_SESSION['difficulty'] = intval(htmlentities($_REQUEST['difficulty']));
    $deck = new Deck($difficulty);
    $game = new Memory($deck->getObjectDeck());
    $game->setDifficulty($difficulty);
    $_SESSION['game'] = serialize($game);
    // unset($_SESSION['difficulty']);
    header('Location: pages/game.php');
    return;
}
$path_index = 'index.php';
$path_profil = 'pages/profil.php';
$path_inscription = 'pages/inscription.php';
$path_connexion = 'pages/connexion.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/index.css">
    <link rel="stylesheet" href="styles/header.css">
    <title>Memory</title>
</head>


<?php if (isset($_SESSION['id'])) :

?>

    <body id="Body_Connected">
        <?php include_once 'pages/header.php'; ?>
        <main class="flex j_center a_center" id="Choose_Dif">

            <form action="" method='GET'>
                <label for="diff">Nombre de Pairs</label>
                <select name="difficulty" id="diff">
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

        </main>


        <footer></footer>
    </body>

</html>
<?php else : ?>

    <body class="flex column j_center a_center">
        <h1>Memory</h1>

        <main class="flex column j_center a_center" id="Menu_1">
            <a href="pages/inscription.php">Inscription</a>
            <a href="pages/connexion.php">Connexion</a>
        </main>


        <footer></footer>
    </body>
<?php endif; ?>