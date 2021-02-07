<?php

namespace App\Core;

use App\Controller\MainController;

class Main{
    public function start(){
        //On recupère L'Url
        $url =$_SERVER['REQUEST_URI'];

        //On vérifie sir l'Url ce termine par un /
        if(!empty($url) && $url != "/" && $url[-1] === "/"){
            //On enlève le /
            $url = substr($url, 0, -1);
            echo $url;

            header('Location:' . $url);
        }

        //On gère les paramètre de l'Url
        //p= controlleur/methodes/paramètres
        //On sépares les differents parametres dans un tableux

        $param = explode('/', $_GET['p']);


        if($param[0] != ''){
            //On à au moins 1 paramètres
            //On récupère le nom du controller à instancié
            /*
            On ajoute une majuscule en 1er
            On ajoute le namespace complet avant
            Et on ajoute "Controller" Aprés
            */
            $controller = '\\App\\Controller\\' . ucfirst(array_shift($param)) . 'Controller';

            //On instancie le controller
            $controller = new $controller();

            //On recupère le 2ieme paramètres d'URL
            $action = (isset($param[0])) ? array_shift($param) : 'index';

            if (method_exists($controller, $action)) {
                //Si il reste des param on les passes à la méthode
                (isset($param[0])) ? $controller->$action($param) : $controller->$action();
            }else {
                echo "La page recherché n'existe pas";
            }



        }else {
            //On n'as pas de praramètre
            //On instancie le controller par default
            $controller = new MainController;

            //On apelle la méthode index
            $controller->index();

        }
    }
}