<?php
// Partie CONTRÔLE de cette page WEB
// Placer ici la récupération des données de la query string et le calcul
$temp_in = $_GET['temp_in'] ?? '';

if($temp_in != ''){
  $temp_out = (1.8 * $temp_in + 32.0);
}
else{
  $temp_out = 'X';
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
    <form  action="conversion1.php" method="get">
      <input id="in" type="number" step="any" name="temp_in" value="<?= $temp_in ?>"> <!-- 'value =' Sauvegarde la donnée quand page rafraichit --> 
      <label for="in">Celcius</label>
      égal
      <output id="out" for="in" name="temp_out"> <?= $temp_out ?> </output>
      <label for="out">fahrenheit</label>
      <button type="submit" name="action" value="convertir">Convertir</button>
    </form>
  </body>
</html>
