<?php

// Classe chargée de réaliser un change entre deux monnaies
Class Change {
  // Liste des taux indexés par deux IDF de taux séparé par un espace
  private array $rates = array();
  // Liste des IDF des devises
  // Est utile pour afficher les devises que l'on peut choisir
  private array $devises = array();

  // Constructeur
  function __construct(string $filename) {
    // Lecture des taux
    $this->load($filename);
  }

  // Charge la liste des Taux et des idf de devises
  private function load(string $filename) {

    // Ouvre en lecture seule et place le pointeur de fichier au début du fichier. 
    $fileOuverte = fopen($filename, 'r');
    // première lecture.
    $line = fgets($fileOuverte);
    if(feof($fileOuverte)){
      throw new Exception("Le fichier CSV $filename est vide.");
    }

    // Tentative de lecture de la deuxième ligne.
    $line = fgets($fileOuverte);
    while(!feof($fileOuverte)){
      // Pas besoin de trim car la fin de la ligne est un nombre.
      // Separe les devise et taux avec ',' entre en un tableau.
      $pieces = explode(',', $line);

      // On stock la clé avec sa valeur (devise to convertion = Taux de change).
      $this->rates[$pieces[0].' '.$pieces[1]] = $pieces[2];
      
      // On ajoute 
      array_push($this->devises, $pieces[0], $pieces[1]);

      // Tentative de lecture de la prochaine ligne.
      $line = fgets($fileOuverte);
    }
    // Supprimer tout les doublons.
    $this->devises = array_unique($this->devises);
    //var_dump($this->rates);

    fclose($fileOuverte);
  }

  // Calcul du taux entre deux IDF de devises
  function getRate(string $from,string $to) : float {
        if(array_key_exists($from.' '.$to,$this->rates)){
          return $this->rates[$from.' '.$to];
        }
        elseif (array_key_exists($to.' '.$from,$this->rates)){
          // inverser le to from pour prendre la clé
          return (1/$this->rates[$to.' '.$from]);
        }
        elseif ($from == $to){
          return 1;
        }
        else{
          throw new Exception("Une des 2 devises dans la convertion $from to $to n'existe pas.");
        }
  }

  // Retourne toutes les devises disponibles dans un tableau de strings
  function getDevises() : array {
    return $this->devises;
  }

  // Calcul une conversion
  // Arrondit à 2 après la virgule
  function change(string $from, string $to,float $amount) : float {
    return ($amount * $this->getRate($from, $to));
  }
}

?>
