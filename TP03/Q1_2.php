<?php
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
    // le mot 'static' permet d'initialisée lors du premier appel la variable $nom et de la sauvegarder.
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
  ?>