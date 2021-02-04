<?php

/**
 * Fonction qui va charger "automatiquement les fichiers"
 * @param string $className
 */

spl_autoload_register(function ($className)
{
    $className = str_replace("\\", "/", $className);

    require_once("../App/$className.php");

});