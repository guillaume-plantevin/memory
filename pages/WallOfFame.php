<?php
require_once('../Classes/Db.php');
$wall->getAllScores($bdd, $_GET['d']);

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/wall_of_fame.css">
    <title>Document</title>
</head>

<body>
</body>
<a href="WallOfFame.php?d=<?= $_SESSION['difficulty'] = 3; ?>"> Mode Easy </a>

<a href="WallOfFame.php?d=<?= $_SESSION['difficulty'] = 6 ?>"> Mode Normal </a>

<a href="WallOfFame.php?d=<?= $_SESSION['difficulty'] = 9 ?>"> Mode Hard </a>

</html>