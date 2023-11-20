<?php
require_once(dirname(__FILE__).'/music.class.php');

// Le Data Access Objet
class MusicDAO {
  private $db;

  // Constructeur chargé d'ouvrir la BD
  function __construct() {
    $database = 'sqlite:'.dirname(__FILE__).'/../data/music.db';
    try {
      $this->db = new PDO($database);
      if (!$this->db) {
        die ("Database error");
      }
    } catch (PDOException $e) {
      die("PDO Error :".$e->getMessage()." $database\n");
    }
  }

  // Accès à une musique
  function get(int $id) : Music {
    try {
      $r = $this->db->query("SELECT * FROM music WHERE ID='$id'");
      $res = $r->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Music');
    } catch (PDOException $e) {
      die("PDO Error :".$e->getMessage());
    }
    return $res[0];
  }

  // Retourne l'idf minimum
  function minId() : int {
    try {
      $r = $this->db->query("SELECT MIN(id) FROM music");
      $res = $r->fetchAll();
    } catch (PDOException $e) {
      die("PDO Error :".$e->getMessage());
    }
    return $res[0][0];
  }

  // Retourne l'idf maximum
  function maxId() : int {
    try {
      $r = $this->db->query("SELECT MAX(id) FROM music");
      $res = $r->fetchAll();
    } catch (PDOException $e) {
      die("PDO Error :".$e->getMessage());
    }
    return intVal($res[0][0]);
  }
}

?>
