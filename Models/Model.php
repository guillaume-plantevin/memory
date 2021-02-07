<?php
namespace App\Models;

use App\Core\Db;
use PDO;

class Model extends Db
{
    //TAble base de données
    protected $table;
    //Instance Db
    private $Db;


    public function findAll(int $id)
    {
        $pages = $this->table;
        $this->Db = Db::getInstance();
        if($pages == 'perso')
        {
            $query = "SELECT perso.id, perso.id_user, perso.scores, perso.nb_pairs, user.login
            FROM perso JOIN user WHERE perso.id = :id";
        }else{
            $query = 'SELECT ' . $this->table . '.id,' . $this->table . '.id_user,'
            . $this->table . '.scores, user.login FROM' . $this->table . 'JOIN user
            WHERE' . $this->table . '.id = :id AND user.id = ' . $this->table . '.id';
        }
        $stmt = $this->Db->prepare($query);
        $stmt->execute([ ':id' => $id]);
        $result =  $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    /**
     * Méthode qui exécutera les requêtes
     * @param string $sql Requête SQL à exécuter
     * @param array $attributes Attributs à ajouter à la requête
     * @return PDOStatement|false
     */
    public function requete(string $sql, array $attributs = null)
    {
        // On récupère l'instance de Db
        // $this->db = Db::getInstance();

        // // On vérifie si on a des attributs
        // if ($attributs !== null) {
        //     // Requête préparée
        //     $query = $this->db->prepare($sql);
        //     $query->execute($attributs);
        //     return $query;
        // } else {
        //     // Requête simple
        //     return $this->db->query($sql);
        // }
    }
}