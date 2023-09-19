<?php
  // Lieux ou se trouve le TP
  $location = "IUT2 de Grenoble";
  // Le nom de la personne qui exécute le script
  $name = get_current_user();
  // Numéro du jour, la fonction intval convertit la chaine en entier
  $day = intval(date("d"));
  // Reste de la date
  $date = date("d/m/Y");
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ma home page</title>
  </head>
  <body>
    <h1>Bienvenue</h1>
    <h2>Utilisateur : <?= $name ?> <br>
        La date : <?= $date ?> <br>
    </h2>
    <p>
      Bonjour vous êtes à l'<?= $location ?>.
      Nous sommes un jour <strong>
      <?php if ($day % 2 == 0) { ?>
        pair
      <?php } else { ?>
        impair
      <?php } ?>
    </strong>
      
    </p>
  </body>
</html>
