<?php 
  $a = 1;
  $a .= '0 est une chaîne'; // on concatène une chaine à la suite de l'entier
  //$a +=(int)'0 est une chaîne'; Transtypage

  $b = 2*5;
  // permet de voir le type d'une variable

    var_dump($a);
    var_dump($b);
    // Ne marche pas car il cast le int en String ici.
    // Conclusion : bannier comparaison entre chaine et entier ou alors caster ou utiliser une fonction qui convertie des chaines en entier par e.g: $a = intval($a);
    //  true si $a est égal à $b après le transtypage.
  if ($a == $b) { // is_numeric($a) regarde si il y a des nombres dans le string au début sans tenir des espaces. si caractère avant il retourne faux car il ne faut pas convertir des string !!
    echo "<p>'$a' et '$b' sont équivalents</p>";
  }
  // effectue le transtypage et : true si $a est égal à $b et qu'ils sont de même type. 
  if ($a === $b ) {
    echo "<p>'$a' et '$b' sont identiques</p>";
  } else {
    echo "<p>'$a' et '$b' sont différents</p>";
  }
?>