<?php
//var_dump($_POST);

$nom = $_POST["nom"];
// Php transforme les espaces (uniquement pour le nom d'argument et pas sa valeur) de l'argument en '_' underscore.
$mdp = $_POST["mot_de_passe"];
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <h1>Sur le site</h1>
    <p>
      Bonjour <?= $nom ?>, ton mot de passe fait <?= strlen($mdp); ?> lettre(s).
    </p>
  </body>
</html>
