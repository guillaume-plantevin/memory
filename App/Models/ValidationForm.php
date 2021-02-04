<?php

namespace App\Model\ValidationForm;

use App\Model\Database;

class ValidationForm extends Database
{
    private $data;
    protected $errors = [];


    /**
     * [validates description]
     * @param  array  $data
     * @return array  Un tableaux d'erreur pour savoir où se trouve l'erreur
     */
    public function validates(array $data){
        $this->errors = [];
        $this->data = $data;
    }



    /**
     * Verifie si tous les champs sont remplies
     * @param  string $field      les champs à remplir
     * @param  string $method     la function à utiliser
     * @param  [type] $paramaters les paramètres à ajouter ou cas ou il en faudrait
     * @return [type]             Soit une erreur soit rien (dans ce cas c'est réussi)
     */
    public function validate(string $field, string $method, ...$paramaters){
        if (!isset($this->data[$field])){
            $this->errors[$field] = "Le champ $field n'est pas remplie";
        }
        else{
            call_user_func([$this, $method], $field, ...$paramaters);
        }
    }



    /**
     * Verifie la longeur minimum du champ
     * @param  string $field  Le champs à remplir
     * @param  int    $length La taille
     * @return bool           Bon ou Pas
     */
    public function minLength(string $login, string $password, string $confirm_password, int $length): bool {
        if (strlen($field) < $length){
            $this->errors[$field] = "Le champ doit avoir plus de $length caractères";
            return false;
        }
        return true;
    }



    /**
     * Savoir si les deux Password Correspondent
     * @param  string $password         Password
     * @param  string $confirm_password Confirmation Password
     * @return bool                     YES OR NO (True or False)
     */
    public function ConfirmPassword(string $password, string $confirm_password): bool{
      if (condition) {
        // code...
      }
    }


    /**
     * Permet de savoir si il existe déja le même Login dans la BDD
     * @param string $login Login de l'User
     */
    public function Loginexist(string $login){
      if (condition) {
        // code...
      }
    }

    
}
