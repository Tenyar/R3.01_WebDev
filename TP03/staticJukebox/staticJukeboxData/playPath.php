<?php
// Affectation du nom de la music (l'argument string passé en entier).
$music_name = $_GET['music'] ?? null;
// QUESTION BONUS: ALTERNATIVE METHOD FOR HTTP_REFERER (usable in other web browser such as Edge).
// je passe par argument le nom de la référence pour revenir à l'ancienne page.
$prev_page = $_GET['prev_page'] ?? null;
if($music_name == null || $prev_page == null){
  exit('[ERROR] La musique n"a pas pu être chargée.');
}

// sépare en un tableau de string (indéxé) tout les string entre '/'. 
$pieces = explode("/", $music_name);

function playPath(): string{
  // accéder au variables globales.
  global $music_name;
  global $pieces;

  $chaine;
  if(isset($music_name)){
    $chaine = "<figcaption><img src=\"data/$music_name.jpeg\"/>";
    $chaine .= "<audio src=\"data/$music_name.mp3\" controls></audio>";
    $chaine .= "<music-song>$pieces[1]</music-song><music-group>$pieces[0]</music-group></figcaption>";
  }
  // retourne toutes les balises.
  return $chaine;
}
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
    <h1>Playing: <?= $music_name ?></h1>
  </header>
  <main>
  <nav>
    <?php
    /*
    Hold way not supported on all the web browser and on client
    $complete_path = $_SERVER['HTTP_REFERER'];
    */

    // passage par variable depuis la page
    if($prev_page == "dynamic"){
      echo ("<a href=../../../TP04/dynamicJukeboxData/dynamicJukebox.php> <- RETOUR</a>");
    }
    else if($prev_page == "static"){
      echo ("<a href=staticJukebox.html> <- RETOUR</a>");
    }
    ?>
  </nav>
    <section>
    <?= playPath(); ?>
    </section>
  </main>
  <footer>
  </footer>
</body>
</html>
