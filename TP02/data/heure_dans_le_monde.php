<?php
// rafraichit la page toute les 60 secondes.
header("refresh: 60");
$villes = array('America/Anchorage','America/Los_Angeles','America/Guadeloupe',
'Europe/Paris', 'Africa/Kigali',
'Asia/Singapore','Australia/Sydney','Pacific/Auckland');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>L'heure dans le monde</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
  <body>
    <h1>L'heure dans le monde</h1>
    <table>
      <?php
      // prendre la variable global pour l'utiliser.
        global $villes;
        foreach($villes as $key){
            // mettre le time zone au nom de la ville pour chaque itération.
            date_default_timezone_set($key);
            echo "<tr style='font-size:30px; width : auto;'>";
            // heure minute puis date jour-mois-année 
            $today = date("H:i, j-m-y");
            echo "<td  style='width : auto;  text-align: center; color: green;'>$key</td>"; // Toutes les villes 
            echo "<td  style='width : auto;  text-align: center;'>$today</td>";
            echo "</tr>";
          }
        ?>
    </table>
  </body>
</html>
