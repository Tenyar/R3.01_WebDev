<?php
require_once(dirname(__FILE__).'/model/change.php');

// Crée l'objet à partir des données de 'exchangeRate.csv'
$change = new change(dirname(__FILE__).'/data/exchangeRate.csv');
// Récupération du tableau des devises avec taux
$devises_tab = $change->getDevises();

// Prendre les devises sources et cibles
$from = $_GET['source'] ?? '';
$to = $_GET['cible'] ?? ''; 
$amount = $_GET['montant'] ?? ''; // par défaut 0 pour pouvoir appeler la fonction deviseChange
$resultatChange = null;

var_dump($from);
var_dump($to);
var_dump($amount);

function createOptionDevises(string $selectContext) : string{
  global $devises_tab, $to, $from;
  $chaine = '';

  // Sauvegarde l'option choisit dans le select lors d'une convertion.
  if($selectContext == 'to' && $to != ''){
    $chaine .= "<option value=\"$to\" selected>$to </option>";
  }
  if($selectContext == 'from' && $from != ''){
    $chaine .= "<option value=\"$from\" selected>$from </option>";
  }

  // Ne remet pas en double l'option choisit précédement.
  foreach($devises_tab as $devise){
    if($selectContext == 'to' && $devise == $to){
      $chaine .= '';
    }
    elseif($selectContext == 'from' && $devise == $from){
      $chaine .= '';
    }
    else{
      $chaine .= "<option value=\"$devise\">$devise</option>";
    }
  }
  return $chaine;
}

/* Version optimiser
function createOptionDevises(string $selectContext): string {
  global $devises_tab, $to, $from;
  $chaine = '';

  $selectedValue = ($selectContext == 'to') ? $to : $from;
  
  foreach ($devises_tab as $devise) {
      $selected = ($devise == $selectedValue) ? 'selected' : '';
      $chaine .= "<option value=\"$devise\" $selected>$devise</option>";
  }
  
  return $chaine;
}
*/

// Charger le résultat dans la variable.
if($from != '' && $to != '' && $amount != ''){
  $resultatChange = $change->change($from, $to, $amount);
}

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
    <form  id="convertisseur" action="indexV1.php" method="get" class="w3-panel w3-card-2">
      <input id="montant" type="number" name="montant" placeholder="Montant" value="<?= $amount ?>" required>
      <select id="source" name="source">
        <?= createOptionDevises('from'); ?>
      </select>
      <img src="design/arrow-icon.png" alt="">
      <select id="cible" name="cible">
        <?= createOptionDevises('to'); ?>
      </select>
      <button  name="button" type="submit" class="w3-button w3-teal">Convertir</button>
    </form>

    <output for="montant source cible" form="convertisseur" name="target_amount" class="w3-container w3-teal w3-xlarge">
      <?= $resultatChange ?>
    </output>
</div>
  </main>

</body>
</html>
