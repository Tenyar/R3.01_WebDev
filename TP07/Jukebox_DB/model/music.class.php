<?php

// Description d'une musique
class Music {
  private int $id;
  private string $author;
  private string $title;
  private string $cover;
  private string $mp3;
  private string $category;
  // Chemin URL à ajouter pour avoir l'URL du MP3 et du COVER
  private const URL = 'http://www-info.iut2.upmf-grenoble.fr/intranet/enseignements/ProgWeb/data/musiques/';

  function __construct(int $id,string $author,string $title,string $cover,string $mp3,string $category) {
    $this->id = $id;
    $this->author = $author;
    $this->title = $title;
    $this->cover = $cover;
    $this->mp3 = $mp3;
    $this->category = $category;
  }

  // Getter globale, si l'attribut passé en paramètre est identifié dans la classe on le retourne.
  function __get(string $property){
    if(property_exists($this,$property)){
      return $this->$property;
    }
    else{
      echo "Attribut $property non trouvé dans l'objet";
    }
  }
}

?>
