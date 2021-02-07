<?php

use App\App;

require_once('../Classes/Db.php');

$wall = new Wall_of_Fame;
$wall->getAllScores($bdd, $difficulty = 0);

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
</body>
    <a href="#"> < </a>

    <a href="#"> > </a>
</html>