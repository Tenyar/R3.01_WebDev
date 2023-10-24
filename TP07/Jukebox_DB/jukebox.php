<?php
// php -l [script-name] to execute with error warnings

// Inclusion du modèle
require_once('model/music.class.php');
require_once('model/dao.class.php');
$pageNum = $_GET['page'] ?? 1;
$pageNum = intval($pageNum);
// Transformer le string en int.
;
$pageSize = $_GET['pageSize'] ?? 8;
$dao = new DAO();
var_dump($pageNum);

function arrowLeft(): string{
  // les variables
  global $pageNum;
  if($pageNum >= 9){
    $newPageNum = $pageNum - 8;
  }
  else{
    $newPageNum = 1;
  }
  // pour la simple flèche de gauche
  $chaine = "<a href=jukebox.php?page=$newPageNum&pageSize=8><span class=\"arrow left\"></span></a>"; // \" permet de garder le " lors de la mise en chaine de caractère
  return $chaine;
}

function arrowRight(): string{
  // les variables
  global $pageNum;
  global $dao;
  // Si on est juste avant la dernière page capable d'afficher des musiques (le calcule est le nombre de musique max diviser par 8 (nb de musique affiché par défaut)).
  // Ceil() arrondie au nombre supérieure la valeur
  if(($pageNum + 8) <= ceil($dao->maxId() / 8)){
    $newPageNum = $pageNum + 8;
  }
  else{
    $newPageNum = ceil($dao->maxId() / 8); // dernière page ou des musiques seront affiché.
  }

  // pour la simple flèche de gauche
  $chaine = "<a href=jukebox.php?page=$newPageNum&pageSize=8> <span class=\"arrow right\"></span></a>";
  return $chaine;
}

function listMusique(): string{
  // les variables
  global $pageNum;
  global $pageSize;
  global $dao;
  $chaine = '';
  for($i = 0; $i < $pageSize; $i++){
    $newPage = $i + $pageNum;
    $chaine .= "<a href=jukebox.php?page=$newPage&pageSize=8>$newPage</a>";
  }
  return $chaine;
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>&#x1F399; Mon jukebox avec BD</title>
  <link rel="stylesheet" type="text/css" href="design/style.css">
  <title></title>
</head>
<body>
  <header>
    <h1>Ma musique dans mon Jukebox</h1>
  </header>
  <!-- Navigation -->
  <nav>
    <p>
      <a href="jukebox.php?page=1&pageSize=8">
        <span class="arrow left"></span><span class="arrow left"></span>
      </a>

      <?= arrowLeft(); ?>

      <?php
      /* Manière plus grotèsque que d'appeler une fonction mais plus optimisé.
        if($pageNum >= 9){
          $pageNum -= 8;
        }
        else{
          $pageNum = 1;
        }
        // pour la simplea flèche de gauche
          <<<ITEM
          <a href="jukebox.php?page=$pageNum&pageSize=8">
            <span class="arrow left"></span>
          </a>
          ITEM; 
          */
      ?>

      <?= listMusique() ?>

      <?= arrowRight(); ?>

      <a href="jukebox.php?page=70&pageSize=8">
        <span class="arrow right"></span><span class="arrow right"></span>
      </a>
    </p>
    <form action="" method="get">
      <p>Musiques/page</p>
      <input type="text" name="pageSize" value="8" maxlength="4" size="2">
      <input type="hidden" name="page" value="<?= $pageNum ?>"/>
    </form>
  </nav>

  <!-- Contenu principal -->
  <main>
    <section>
      <?php 
      for($i = 1; $i <= $pageSize; $i++):
      try{
        if($pageNum > 1){
          // Else get the music at $i + num of pages multiplied by number of musics on this page.
          $music = $dao->get($i + (($pageNum-1) * $pageSize)); // PROBLEM IS HERE IT DOESNT TAKE THE GOOD PAGES WHEN PAGESIZE IS CHANGED BECAUSE THE $pageSize CHANGE !!!
        }
        else{
        // get the music at index $i;
          $music = $dao->get($i);
        }
      }
      catch(Exception $e){
        die("Max number of music reached !");
      }

      // $title = $music->__get('title'); pas jolie, $title = $music->title; --> déclenche le getteur globale quand même
      $id = $music->id;
      $cover = $music->cover;
      $title = $music->title;
      $author = $music->author;
      $category = $music->category;
      echo
      <<<ITEM
        <figure>
          <a href="playId.php?id=$id&page=$pageNum&pageSize=$pageSize">
            <img src="http://www-info.iut2.upmf-grenoble.fr/intranet/enseignements/ProgWeb/data/musiques/img/$cover"/>
          </a>
          <figcaption>
            <music-song>$title</music-song>
            <music-group>$author</music-group>
            <music-category>$category</music-category>
          </figcaption>
        </figure>
      ITEM; 
      endfor;
      ?>
    </section>
  </main>
  <footer>
    Jukebox IUT
  </footer>
</body>
</html>