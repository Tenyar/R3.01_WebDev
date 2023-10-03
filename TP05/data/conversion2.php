<?php
// Partie CONTRÔLE de cette page WEB.
// Placer ici la récupération des données de la query string et le calcul.

// Récupération du sens, de l'action à réaliser et de la température en entrée.

$action = $_GET['action'] ?? null;
$sens = $_GET['sens'] ?? 'C2F';
// Les actions (boutons) sont prisent en comptes ici.
// On ne fait que changer le sens ici.

// Faire les conversion selon le sens
$temp_in = $_GET['temp_in'] ?? '';

if($action == 'inverser'){
  switch($sens){
    case 'C2F':
      $sens = 'F2C';
      if($temp_in != ''){
        $temp_in = round((1.8 * $temp_in + 32.0), 3);
        $temp_out = round(($temp_in - 32) /1.8, 3);
      }
      break;
    default:
      $sens = 'C2F';
      if($temp_in != ''){
        $temp_in = round(($temp_in - 32) / 1.8, 3);
        $temp_out = round((1.8 * $temp_in + 32.0), 3);
      }
  }
}
else{
  if($temp_in != ''){
    if($sens == 'C2F'){
      $temp_out = (1.8 * $temp_in + 32.0);
    }
    else{
      $temp_out = ($temp_in - 32) / 1.8;
    }
  }
  else{
    $temp_out = 'X';
  }
}

  // La suite est la partie VUE
  ?>
  <!DOCTYPE html>
  <html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Conversion Celcius/Fahrenheit</title>
    <link rel="stylesheet" href="design/style.css">
  </head>
  <body>
    <h1>Conversion de températures</h1>
    <form action="conversion2.php" method="get">
      <button type="submit" name="action" value="inverser">Inverser</button>
      <input id="in" type="number" step="any" name="temp_in" value="<?=$temp_in?>">
      <label for="in"><?php if($sens == 'C2F'){?>Celcius<?php } else { ?>fahrenheit<?php } ?>
    </label>
      égal
      <output id="out" for="in" name="temp_out"> <?=$temp_out?> </output>
      <label for="out"><?php if($sens == 'F2C'){?>Celcius<?php } else { ?>fahrenheit<?php } ?></label>
      <button type="submit" name="action" value="convertir">Convertir</button>
      <input type="hidden" id="SensID" name="sens" value="<?= $sens ?>"/>
    </form>
  </body>
  </html>
