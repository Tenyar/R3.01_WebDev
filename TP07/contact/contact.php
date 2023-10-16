<?php
// Indiquer le chemin(path) local vers le fichier qui contient la base de données
$dataSourceName = 'sqlite:'.__DIR__.'/data/contact.db';
// Il faut créer une instance PDO(permet d'accéder à la BD) pour lui passer le dataSourceName
$db = new PDO($dataSourceName);
// Récupère les informations de la query string
$city = $_GET['city'] ?? 'Dallas';
// Requête avec la méthode query(La requête est du SQL dans une chaîne de caractère)
$pdoSth = $db->query("SELECT * FROM contact where city='$city'");
// Le résultat de la méthode query est un objet PDOStatement. Il faut donc encore une opération pour récupérer les données de la requête dans un tableau
$data = $pdoSth->fetchall(); // $data = tableau de tableau SQL. (on Récup chaque index d'une ligne avec son nom de colonne respectif)

/*
FOR INT I METHOD :

// Récupère la ligne $i du résultat de la requête
$line = $data[$i];

// Accès à toutes les colonnes de la ligne $i
$id    = $line['id'];
$name  = $line['name'];
$phone = $line['phone'];
$city  = $line['city'];
*/
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="design/style.css">
    <title>My contacts</title>
  </head>
  <body>
    <h1>My contacts from <?= $city ?></h1>
    <table>
      <tr>
        <th>Name</th>
        <th>Phone</th>
      </tr>
      <?php foreach ($data as $contact): ?>
        <tr>
          <td><?= $contact['name'] ?></td>
          <td><?= $contact['phone'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
  </body>
</html>
