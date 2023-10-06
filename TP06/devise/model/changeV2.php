<?php
require_once(dirname(__FILE__).'/devise.php');
require_once(dirname(__FILE__).'/../helper/readCSV.php');

// Classe chargée de réaliser un change entre deux monnaies
Class Change {
  // Liste des taux indexés par deux IDF de taux séparé par un espace
  private array $rates;
  // Liste des devises indexés par leur IDF
  private array $devises;

  // Constructeur
  function __construct(string $devisesFile,string $rateFile) {
    // Lecture de la liste des devises
    $this->loadDevises($devisesFile);
    // Lecture des taux
    $this->loadRate($rateFile);
  }

  // Charge une liste de devises
  private function loadDevises(string $filename) {

  }

  // Charge la liste des Taux
  private function loadRate(string $filename) {

  }

  // Calcul du taux entre deux IDF de devises
  function getRate(string $from,string $to) : float {

  }

  // Retourne toutes les devises disponibles dans un tableau d'objets
  function getDevises() : array {
  }

  // Calcul une conversion
  // Arrondit à 2 après la virgule
  function change(string $from, string $to,float $amount) : float {
  }
}

?>
