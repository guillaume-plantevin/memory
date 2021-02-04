<?php

namespace Models;

use PDO;

class model {

    public function getBdd ()
    {
        $bdd = new PDO('mysql:dbname=memory;host=localhost', 'root', '');
        return $bdd;
    }
}