#!/usr/bin/php
<?php
print("Entrer un nombre à multiplier : \n");
fscanf(STDIN, "%d\n", $number);
if(!is_numeric($number)){
    exit("[ERROR] Digit not detected.\n");
}

printf("Table de multiplication de %d\n",$number);

for($i = 1; $i <= 10; $i++){

    $result = $number * $i; 
    printf(" 9 * %d = %d \n", $i, $result);
}

?>