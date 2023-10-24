<?php
require_once(__DIR__.'/music.class.php');

// Le Data Access Objet
class DAO {
  private $db;

  // Constructeur chargé d'ouvrir la BD
  function __construct() {
      // Localisation de la base de données
      $database = 'sqlite:'.__DIR__.'/../data/music.db';
      // Si elle est trouvé
      if(isset($database)){
        // Création du lien avec la base de données
        $this->db = new PDO($database);
      }
      else{
        // Exception sinon
        throw new Excpetion('Lecture de la base de données impossible!');
      }
  }

  // Accès à une musique
  function get(int $id) : Music {
    // Création de la requête sql
    $request = "SELECT * FROM music WHERE id = $id";
    // Exécution de la requête sql
    $exec = $this->db->query($request);
    // récupération de toutes les lignes
    $result = $exec->fetchAll();
    // On regarde si l'identifiant est bien unique sinon on lance une exception
    if (count($result) != 1) {
      throw new Exception("id '$id' n'est pas unique");
    }
    // Création de l'objet
    // Tableau à plusieurs dimensions donc prendre result[0] soit la première ligne à la colonne ['id'],['..'] etc..
    $music_obj = new Music($result[0]['id'], $result[0]['author'], $result[0]['title'], $result[0]['cover'], $result[0]['mp3'], $result[0]['category']);
    return $music_obj;
  }

  // Retourne l'idf minimum
  // Pour que les fonctions marches, il faut que les données soit importé dans la base sqlite3. (musicdb.sql avec les données de musicDB.txt)
  function minId() : int {
    $request = "SELECT MIN(id) as id from music";
    $exec = $this->db->query($request);

    $result = $exec->fetchAll();
    if (count($result) != 1) {
      throw new Exception("id '$id' n'est pas unique");
    }
    return $result[0]['id'];
  }

  // Retourne l'idf maximum
  function maxId() : int {
    $request = "SELECT MAX(id) as id FROM music";
    $exec = $this->db->query($request);

    $result = $exec->fetchAll();
    if (count($result) != 1) {
      throw new Exception("id '$id' n'est pas unique");
    }
    return $result[0]['id'];
  }
}
?>
