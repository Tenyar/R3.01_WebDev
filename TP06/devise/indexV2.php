<?php
require_once(dirname(__FILE__).'/model/changeV2.php');

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="design/w3.css">
  <link rel="stylesheet" href="design/style.css">
  <title></title>
</head>
<body>

  <header class="w3-container w3-teal">
    <h1>Outil de convertion de devises</h1>
  </header>

  <main class="w3-container">
    <p>
      Boursomachin met à votre disposition ce convertisseur de devises, qui vous permet de convertir des monnaies instantanément et gratuitement.
      Vous pouvez convertir entre elles les devises les plus populaires comme,  Euro EUR, Dollar US USD, Yen japonais JPY, Livre Sterling GBP.
    </p>
    <p>
      Usage : vous entrez dans le convertisseur le montant que vous souhaitez convertir,  indiquez la devise d'origine et la devise qui vous intéresse. Et vous obtenez instantanément le montant dans la devise souhaitée, avec le taux de change entre les 2 monnaies.
    </p>



    <h2>Convertisseur</h2>
    <div>
    <form  id="convertisseur" action="indexV2.php" method="get" class="w3-panel w3-card-2">
      <input id="montant" type="number" name="montant" placeholder="Montant" value="" required>
      <select id="source" name="source">

      </select>
      <img src="design/arrow-icon.png" alt="">
      <select id="cible" name="cible">

      </select>
      <button  name="button" type="submit" class="w3-button w3-teal">Convertir</button>
    </form>

    <output for="montant source cible" form="convertisseur" name="target_amount" class="w3-container w3-teal w3-xlarge">

     </output>
</div>
  </main>

</body>
</html>
