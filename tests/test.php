<?php
    require_once 'classes/Autoloader.php';
    require_once 'functions/functions.php';

    Autoloader::register();
    /**
     * en post ou en get?
     * en get c'est plus 'simple'
     * mais on se retrouve avec un bordel de page toutes avec des id incorporés
     * en POST c'est plus propre mais il faudra penser au header location
     */

    // if (isset($_POST['cardId'])) {
    //     header('Location: test.php');
    //     return;
    // }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous"> -->
        <!-- <link rel="stylesheet" href="styles/styleG.css"> -->
        <title>test de cartes</title>
        <style>
            form {
                background-color: pink;
            }
            .card {
                background: pink;
                height: 300px;
                width: 8%;
            }
        </style>
    </head>
    <body>
        <?php
            $cardObjectArray = [];
            for ($i = 0; $i < 2; ++$i) {
                $cardObjectArray[$i] = new Cards($i);
                $cardObjectArray[$i]->createCardALink();
            }
            foreach ($cardObjectArray as $k => $value) {

            }
            vdp($cardObjectArray, '$cardObjectArray');
        
            vdp($_REQUEST, '$_REQUEST');
            if (isset($_POST['cardId'])) {
                echo 'OK COMPUTER<br>';
                vdp($cardObjectArray[$_POST['cardId']], '[1]');
            }
            // $card = new Cards;
            // $card->createACard(0, 'A') ;
        ?>
    </body>
</html>