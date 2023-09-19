<?php
  // Tableau d'abréviation. [key, string]
  $abbre = array ('HTML' => 'HyperText Markeup Language',
            'XML' => 'eXtended Markeup Language',
            'PHP' => 'Hypertext PreProcessor',
            'CSS' => 'Cascading Style Sheets');


    function abbr(string $key): string {
        // prendre le tableau en global.
        global $abbre;
        if(isset($abbre[$key])){
            return "<abbr title=\"$abbre[$key]\">$key</abbr>";
        }
        else
        {
            return $key;
        }
    }

    function abbrAll(): string {
        // prendre le tableau en global.
        global $abbre;
        $chaine = "<table>";
        foreach($abbre as $key => $value)
        {
            $chaine = "$chaine<tr><th>$key</th><td>$value</td></tr>";
        }
        // rajout de la fin de la table.
        // $chaine .= "</table>"; marche aussi en mieux
        $chaine = $chaine."</table>";

        return $chaine;
    }
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <title>Test abbr</title>
<style media="screen">
abbr,th {
  color: blue;
}
</style></head>

<body>

  <h1>Exemple d'utilisation des abréviations en HTML</h1>

  <p>Le langage <?= abbr('PHP') ?> produit généralement
    du <?= abbr('HTML') ?> mais peu produire aussi
    du <?= abbr('XML') ?> ou même
    du <?= abbr('CSS') ?>.
  </p>
  <p>Voici toutes les abbréviations connues : </p>
  <?= abbrAll() ?>
  
</body>
</html>