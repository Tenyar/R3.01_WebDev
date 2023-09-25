<?php
  // Affectation du nom de la music (l'argument string passé en entier).
$music_name = $_GET['music'] ?? null;
if($music_name == null){
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
    <a href="staticJukebox.html"> <- RETOUR</a>
  </nav>
    <section>
    <?= playPath(); ?>
    </section>
  </main>
  <footer>
  </footer>
</body>
</html>
