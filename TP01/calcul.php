<?php
//  qui retourne la valeur de droite si celle de gauche est nulle, sinon celle de gauche. 
    $a = $_GET['a'] ?? 2;
    $op = $_GET['op'] ?? '';
    $b = $_GET['b'] ?? 1;

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