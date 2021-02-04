<?php
namespace App\Models;

use \PDO;

class Database{

  private $db_name;
  private $db_user;
  private $db_pass;
  private $db_host;
  private $pdo;


  /**
   * [__construct description]
   * @param string $db_name Nom de la base de données
   * @param string $db_user User pass pour la bdd
   * @param string $db_pass Password connexion pour la bdd
   * @param string $db_host Ip de la bdd
   */
  public function __construct($db_name, $db_user = 'root', $db_pass = '', $db_host = 'localhost') {
    $this->db_name = $db_name;
    $this->db_user = $db_user;
    $this->db_pass = $db_pass;
    $this->db_host = $db_host;
  }

  /**
   * [getPDO description]
   * @return bool Connexion à la bdd
   */
  private function getPDO(){
    if ($this->pdo === null) {
      $pdo = new PDO('mysql:host=localhost;dbname=memory', 'root', '');
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->pdo = $pdo;
    }
    return $this->pdo;
  }

  // public function query($statement, $class_name, $one = false){
  //   $req = $this->getPDO()->query($statement);
  //   $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
  //   if ($one) {
  //     $datas = $req->fetch();
  //   }else {
  //     $datas = $req->fetchAll();
  //   }
  //   return $datas;
  //
  // }



  /**
   * [prepare description]
   * @param  string  $statement  Requête SQL
   * @param  string  $attributes Variables de la requête SQL
   * @param  string  $class_name Nom de la classe
   * @param  boolean $one        Pour savoir combien de valeurs on doit retourner
   * @return array   $datas      Retourne un tableaux
   */
  public function prepare($statement, $attributes, $class_name, $one = false){
    $req = $this->getPDO()->prepare($statement);
    $req->execute($attributes);
    $req->setFetchMode(PDO::FETCH_CLASS, $class_name);

    if ($one) {
      $datas = $req->fetch();
    }else {
      $datas = $req->fetchAll();
    }
    return $datas;

  }

}
