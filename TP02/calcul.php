<?php
//  qui retourne la valeur de droite si celle de gauche est nulle, sinon celle de gauche. 
    $a = $_GET['a'] ?? null;
    $op = $_GET['op'] ?? null;
    $b = $_GET['b'] ?? null;

    if($a == null || $b == null || $op == null){
        exit('Au moins une variable est manquante.');
    }

    // %2B = + opérateur
    switch($_GET['op']){
        case '+':
            $result = $a + $b;
            print("$a + $b = $result");
            break;

        case '-':
            $result = $a - $b;
            print("$a - $b = $result");
            break;

        case 'x':
            $result = $a * $b;
            print("$a x $b = $result");
            break;

        case '/':
            $result = $a / $b;
            print("$a / $b = $result");
            break;

            default: 
            print(" Operator op missing");
            break;
        }
        
?>

