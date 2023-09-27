<?php 
// e.g of command to do for this script : php [name_of_script] > [name_of_outputfile]

$repositoryPath = getcwd(); //Current working directory (repository path) 'root path'

function readJukeBoxData(){
    global $repositoryPath;
    $dataDirectory = "$repositoryPath/data";

    // Ouvre le répertoire dans /data en lecture 
    if($openData = opendir($dataDirectory)){
        $tab_fileNames = array(); // Array to store file names without duplicates
            /*
                On peut effectuer des opération de lectures maintenant (read, etc..)
                Lit chaque élément du répertoire tant que readdir ne renvoie pas 'false' en type.
            */
            while(false !== ($entry_dir = readdir($openData))){
                /* 
                    Ignorer les entrées spéciales '.' et '..'
                    '.' = représente le répertoire courant (en shell '.' signifie le répertoire sur lequel on est durant la commande)
                    '..' = représente le répertoire parent (le répertoire qui contient le répertoire courant)
                    Ces entrées spéciales sont généralement incluses par défaut dans la liste des fichiers lors de la lecture d'un répertoire par readdir.
                    Il est donc courant de les ignorer avec une vérification (if).
                */
                if($entry_dir != '.' && $entry_dir != '..'){
                    //echo "Nom de l'élément : $entry_dir\n";
                    
                    // Chemin complet de l'élément
                    $fullPath = "$dataDirectory/$entry_dir";

                    // Vérifie si $fullPath est un répertoire
                    if (is_dir($fullPath)) {

                        // Ouvre le sous-répertoire en lecture
                        if ($subDiropenData = opendir($fullPath)) {

                            // Lit le premier élément (fichier) du sous-répertoire
                            while (false !== ($subEntry = readdir($subDiropenData))) {

                                if ($subEntry != "." && $subEntry != "..") {
                                    // Vous pouvez traiter le nom du fichier ici
                                    $path_info = pathinfo("$fullPath/$subEntry");
                                    $filename = $path_info['filename']; // Sans extension sur les fichiers comme '.txt' ou autres.
                                    $fileFormat = "$entry_dir|$filename"; // Mettre au format de lecture pour les musiques
                                    
                                    // Ajoute le nom du fichier à l'array s'il n'est pas déjà présent 
                                    // /!\ L'ordre dans la liste n'est pas comme celui dans le répertorie /!\
                                    if (!in_array($fileFormat, $tab_fileNames)) {
                                        $tab_fileNames[] = $fileFormat;
                                    }
                                }
                            }
                        // Ferme le gestionnaire de sous-répertoire
                        closedir($subDiropenData);
                    }
                }
            }
            /*
            else{
                // On ne print rien en retour pour ne pas polluer (juste pour tester).
                echo "Impossible d'ouvrir le répertoire '$openData'\n";    
            }
            */
        }
        // Ferme le gestionnaire de répertoire principal lorsque vous avez terminé de l'utiliser.
        // closes the main directory handle only when the loop completes, and all subdirectories have been processed.
        closedir($openData);
        // Output the unique file names
        foreach ($tab_fileNames as $uniqueFileName) {
            echo "$uniqueFileName\n";
        }
    }
}
readJukeBoxData();
?>