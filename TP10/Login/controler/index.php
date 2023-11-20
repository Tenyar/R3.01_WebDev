<?php

// démarrer la session de l'utilisateur
session_start();

// Check si le flad mdp_forgotten est vrai
$mdp_forgotten = $_GET['password'] ?? 'false';

var_dump($mdp_forgotten);
if($mdp_forgotten == 'true'){
    include("../view/not_implemented.html");
}

// affecte les données de l'utilisateur à sa session, only if not initialized
if (!isset($_SESSION['login'])) {
    $_SESSION['login'] = $_POST['login'] ?? null;
}

if (!isset($_SESSION['password'])) {
    $_SESSION['password'] = $_POST['password'] ?? null;
}

if (!isset($_SESSION['submit'])) {
    $_SESSION['submit'] = $_POST['submit'] ?? null;
}

var_dump($_SESSION['login']);
var_dump($_SESSION['password']);

if ((isset($_SESSION['login']) || isset($_SESSION['password'])) && $mdp_forgotten == 'false') {
    switch($_SESSION['submit']){
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