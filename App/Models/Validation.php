<?php

namespace App\Model\Validation;

use App\Model\ValidationForm;


class Validation extends ValidationForm
{

    /**
     *
     * @param  array  $data  Tableaux de données de l'utilisateurs
     * @return array  $error Retourne un tableaux avec les differentes erreurs
     */
    public function validates(array $data){
        parent::validates($data);
        $this->validate('name', 'minLength', 5);
        return $this->errors;
    }


    /**
     * [send description]
     * @param  [type] $bdd            [description]
     * @param  [type] $titre          [description]
     * @param  [type] $description    [description]
     * @param  [type] $debut          [description]
     * @param  [type] $fin            [description]
     * @param  [type] $id_utilisateur [description]
     * @return [type]                 [description]
     */
    public function send($bdd, $titre, $description, $debut, $fin, $id_utilisateur){
        $sql = $bdd->prepare("INSERT INTO reservations(titre, description, debut, fin, id_utilisateur) VALUES(:titre, :desscription, :debut, :fin, :id_utilisateur)");
        $sql->execute([
            ':titre' => $titre,
            ':desciption'=> $description,
            ':debut' => $debut->format('Y-m-d-00:00:00'),
            ':fin' => $fin->format('Y-m-d-00:00:00'),
            ':id_utilisateur' => $id_utilisateur,
        ]);
    }
}
