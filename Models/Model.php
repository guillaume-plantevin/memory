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


    public function findAll()
    {
        $pages = $this->table;;
        $this->Db = Db::getInstance();
        if($pages == 'perso')
        {
            $query = "SELECT $pages.id, $pages.id_user, $pages.scores, $pages.nb_pairs, user.login
            FROM $pages JOIN user WHERE $pages.id = :id";
        }else{
            $query = "SELECT $pages.id, $pages.id_user, $pages.scores, user.login
            FROM $pages JOIN user WHERE $pages.id = :id";
        }
        $stmt = $this->Db->prepare($query);
        $stmt->execute([ ':id' => 1]);
        $result =  $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}