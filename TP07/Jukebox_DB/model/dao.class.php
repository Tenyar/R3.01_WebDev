<?php
require_once(__DIR__.'/music.class.php');

// Le Data Access Objet
class DAO {
  private $db;

  // Constructeur chargé d'ouvrir la BD
  function __construct() {
      $database = 'sqlite:'.__DIR__.'/../data/music.db';
      if(isset($database)){
        $this->db = new PDO($database);
      }
      else{
        throw new Excpetion('Lecture de la base de données impossible!');
      }
  }

  // Accès à une musique
  function get(int $id) : Music {
    
    $request = "SELECT * FROM music WHERE id = $id";
    // retourne le résultat de la requêtre
    return $db->query($request); 
  }

  // Retourne l'idf minimum
  function minId() : int {
    $request = "SELECT MIN(id) FROM music WHERE id = 1";
    // retourne le résultat de la requêtre
    return $db->query($request);
  }

  // Retourne l'idf maximum
  function maxId() : int {
    $request = "SELECT MAX(id) FROM music";
    // retourne le résultat de la requêtre
    return $db->query($request);
  }
}

?>
