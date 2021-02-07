<?php
namespace App\Controller;

abstract class Controller{
    public function render(string $fichier, array $datas = [])
    {
        extract($datas);

        require_once ROOT . '/view/' .$fichier . '.php';
    }
}