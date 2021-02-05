<?php
    session_start();

    require_once 'functions/functions.php';
    require_once 'classes/Autoloader.php';
    
    Autoloader::register();

    vdp($_REQUEST, '$_REQUEST');
    vdp($_SESSION, '$_SESSION');
    $card = new Cards(0, 'A');
    prp($card, '$card');
    vdp($card, '$card');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>game</title>
</head>
<body>
    <?php
        $card->printCard();

    ?>
    
</body>
</html>