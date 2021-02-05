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
                /* display: inline-block; */
                height: 10vh;
                width: 10vh;
                background: pink;
                padding: 0;
            }
        </style>
    </head>
    <body>
        <form action="" method="POST">
            <input type="hidden" name="cardId" value="0">
            <button type="submit" class="card">
            </button>
        </form>
        <form action="" method="POST">
            <input type="hidden" name="cardId" value="1">
            <button type="submit"class="card">
                
            </button>
        </form>
        

        <?php vdp($_REQUEST); ?>
    </body>
</html>