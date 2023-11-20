<?php
// Contrôleur principal

// démarrer la session de l'utilisateur
session_start();

$login = $_POST['login'] ?? '';
// Check le mdp du login
$mdp = $_POST['password'] ?? '';
// Check si le flad mdp_forgotten est vrai
$mdp_forgotten = $_GET['password'] ?? 'false';
$submit = $_POST['submit'] ?? '';

var_dump($mdp_forgotten);
if($mdp_forgotten == 'true'){
    include("../view/not_implemented.html");
}

// affecte les données de l'utilisateur à sa session
if(isset($submit) && isset($login) && isset($mdp)){
    $_SESSION['login'] = $login;
    $_SESSION['password'] = $mdp;
    var_dump($_SESSION['login']);
    var_dump($_SESSION['password']);
}

if ((strlen($login) > 0 || strlen($mdp) > 0 ) && $mdp_forgotten == 'false'){
    switch($submit){
        case 'new':
            include("../view/not_implemented.html");
            break;
        case 'login':
            include("../view/main.php");
            break;
    }
}
else{
    include("../view/login.html");
}

?>