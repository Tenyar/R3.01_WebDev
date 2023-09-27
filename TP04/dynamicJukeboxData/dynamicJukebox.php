<?php
include('readDelimitedData.php');
// Lecture de toutes les musiques
$tab_musics = readDelimitedData('jukeboxData.txt');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>&#x1F399; Mon jukebox static</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <header>
    <h1>Ma musique dans mon Jukebox</h1>
  </header>
  <main>
    <section>
    <!-- Placer ici une boucle d'affichage des musiques -->
    <?php foreach($tab_musics as $sub_tab): echo
    <<<ITEM
      <figure>
        <a href="../../TP03/staticJukebox/staticJukeboxData/playPath.php?music=$sub_tab[0]/$sub_tab[1]&prev_page=dynamic">
          <img src="data/$sub_tab[0]/$sub_tab[1].jpeg"/>
        </a>
        <figcaption>
          <music-song>$sub_tab[1]</music-song>
          <music-group>$sub_tab[0]</music-group>
        </figcaption>
      </figure>
    ITEM;
    endforeach; ?>
    </section>
  </main>
  <footer>
  </footer>
</body>
</html>