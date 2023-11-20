<?php
// réouvrir la session en cours pour la fermer.
session_start();
session_destroy();
include("../view/login.html");
?>