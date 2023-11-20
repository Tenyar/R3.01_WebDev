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

  function __construct(int $id=0,string $author='',string $title='',string $cover='',string $mp3='',string $category='') {
    $this->id = $id;
    $this->author = $author;
    $this->title = $title;
    $this->cover = $cover;
    $this->mp3 = $mp3;
    $this->category = $category;
  }

  // Solution avec le getter global
  function __get($name) {
    switch ($name) {
      // Dans ces 2 cas, il faut ajouter le chemin.
      case 'cover':
        return self::URL.'img/'.$this->$name;
        break;
      case 'mp3':
        return self::URL.'mp3/'.$this->$name;
        break;
      default:
      return $this->$name;
    }
  }

  // Solution avec tous les getters explicites
  function getId() {
    return $this->id;
  }

  function getAuthor() {
    return $this->author;
  }

  function getTitle() {
    return $this->title;
  }

  function getCover() {
    return self::URL.'img/'.$this->cover;
  }

  function getMp3() {
    return self::URL.'mp3/'.$this->mp3;
  }

  function getCategory() {
    return $this->category;
  }


}

?>
