<?php
// Analyse le fichier de nom $filename
// Ce fichier contient des informations séparées par $delimiter
// Le résultat est un tableau de tableau.
// Chaque element du premier tableau est produit à partir d'une ligne.
// Chaque ligne est découpée et placée dans un tableau.
// Par exemple : le fichier
//   Dads|Groin Twerk
//   The Black Eyed Peas|I Gotta Feeling
// Produit le tableau :
// array(2) {
//  [0]=> array(2) {
//      [0]=> string(4) "Dads"
//      [1]=> string(11) "Groin Twerk"
//      }
//  [1]=> array(2) {
//      [0]=> string(19) "The Black Eyed Peas"
//      [1]=> string(15) "I Gotta Feeling"
//      }
// }
function readDelimitedData(string $filename, string $delimiter='|') : array {
  // Initialise le tableau des résultats
  $tab = array();
  $i = 0;
  // Ouvre en lecture seule et place le pointeur de fichier au début du fichier. 
  $text = fopen($filename, "r"); 
  // A COMPLETER
  while(!feof($text)){
    // Get les lignes pas à pas
    $result = fgets($text);

    // Pour ne pas avoir la dernière ligne (empty string)
    // avec var_dump($result); on voit qu'une fois toutes les lignes parcourus il renvoie pas une chaine (String) mais un boolean FALSE.
    // donc check si il n'est pas du type 'boolean' avant d'accéder à un index.
    if($result === false || $result[0] == ""){
      break;
    }
    // Trim pour enlever "/n" (indicateur de retour de ligne)
    $result_trimmed = rtrim($result, "\n");
    // Explose en pièces les lignes(string) à chaque itération la ligne délimité par '|'
    $pieces = explode($delimiter, $result_trimmed);
    // les insères dans le tableau
    $tab[$i] = $pieces;
    // Passe à l'index suivant
    $i++;
  }

  fclose($text); // Don't forget to close the file when you're done with it
  // Retourne le tableau
  return $tab;
}
?>
