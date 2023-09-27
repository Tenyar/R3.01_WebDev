<?php
// Affectation du nom de la music (l'argument string passé en entier).
$music_name = $_GET['music'] ?? null;
// BONUS QUESTION: ALTERNATIVE METHOD FOR HTTP_REFERER (usable in other web browser such as Edge)
// JE PASSE PAR ARGUMENT LE NOM DE LA REF POUR REVENIR
$prev_page = $_GET['prev_page'] ?? null;
if($music_name == null || $prev_page == null){
  exit('[ERROR] La musique n"a pas pu être chargée.');
}

// separate in a table (indexed) of string every string between "/"
$pieces = explode("/", $music_name);

function playPath(): string{
  // accessing the global variables.
  global $music_name;
  global $pieces;

  $chaine;
  if(isset($music_name)){
    $chaine = "<figcaption><img src=\"data/$music_name.jpeg\"/>";
    $chaine .= "<audio src=\"data/$music_name.mp3\" controls></audio>";
    $chaine .= "<music-song>$pieces[1]</music-song><music-group>$pieces[0]</music-group></figcaption>";
  }
  // returning all the tags with the infos.
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

    // Passage par variable depuis la page
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
