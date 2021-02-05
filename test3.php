<?php
    require_once 'functions/functions.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

        <title>restart</title>
        <style>
            .card {
                display: inline-block;
                border: 2px solid gray;
                margin: 2em;
                width: 10%;
                height: 200px;
                background: pink;
            }
        </style>
    </head>
    <body>
        <div class="card">
            <form action="" method="POST">
                <input type="hidden" name="cardId" value="0">
                <button type="submit">tchi</button>
            </form>
        </div>
        <div class="card">
            <form action="" method="POST">
                <input type="hidden" name="cardId" value="1">
                <button type="submit">tcha</button>
            </form>
        </div>
        <div class="card">
            <form action="" method="POST">
                <input type="hidden" name="cardId" value="2">
                <button type="submit">tcho</button>
            </form>
        </div>

        <?php vdp($_REQUEST); ?>
    </body>
</html>