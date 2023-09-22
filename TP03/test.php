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

/*

  // 1.2
  
  function bonjour() {
    // on ne chope pas la variable 'global' $nom du coup marche pas
    if (isset($nom)) {
      echo "Bonjour $nom</br>";
    } else {
      echo "Mais qui êtes vous ?</br>";
    }
  }

  function hello() {
    global $nom;
    if (isset($nom)) {
      echo "Hello $nom</br>";
    } else {
      echo "Mais qui êtes vous ?</br>";
    }
  }

  function salut() {
    static $nom; // au premier appel, la variable de la fonction est initialisé à "Cyprien"
    // au deuxieme appel la fonction marche car la variable propre à la fonction est init.
    if (isset($nom)) {
      echo "Salut $nom</br>";
    } else {
      echo "Mais qui êtes vous ?</br>";
    }
    // au 2ème appel $nom conserve sa valeur précédente(grace à static), qui est maintenant "Cyprien".
    $nom = "Cyprien";
  }

  bonjour();
  $nom="Arthur";
  bonjour();

  hello();
  $nom="Marcel";
  hello();

  salut(); // marche pas
  $nom="Mohamed";
  salut();
  */
?>