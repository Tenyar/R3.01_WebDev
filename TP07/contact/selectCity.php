<?php
// Indiquer le chemin(path) local vers le fichier qui contient la base de données
$dataSourceName = 'sqlite:'.__DIR__.'/data/contact.db';
// Il faut créer une instance PDO(permet d'accéder à la BD) pour lui passer le dataSourceName
$db = new PDO($dataSourceName);
// Récupère les informations de la query string
$city = $_GET['city'] ?? 'Dallas';
// Requête avec la méthode query(La requête est du SQL dans une chaîne de caractère)
$pdoSth = $db->query("SELECT DISTINCT city FROM contact");
// Le résultat de la méthode query est un objet PDOStatement. Il faut donc encore une opération pour récupérer les données de la requête dans un tableau
$data = $pdoSth->fetchall(); // $data = tableau de tableau SQL. (on Récup chaque index d'une ligne avec son nom de colonne respectif)

 ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="design/style.css">
    <title>My contacts</title>
  </head>
  <body>
    <h1>My contacts : select a city</h1>
    <form action="contact.php" method="get">
    <table>
      <?php foreach ($data as $contact): ?>
        <tr class="City_selection">
          <td> 
            <label for=<?= $contact['city'] ?>> <?= $contact['city'] ?> </label> 
          </td>
          <td>
            <input type="radio" name="city" value=<?= $contact['city'] ?>  /> 
        </td>
    </tr>
    <?php endforeach; ?>
    </table>
    <button type="submit">Select</button> <!-- Quand pas de name="" pas d'agrument en url, ici pas besoin d'argument-->
    </form>
  </body>
</html>
