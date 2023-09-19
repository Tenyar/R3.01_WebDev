#!/usr/bin/php
<?php

$tab_num = 9;
printf("Table de multiplication de %d\n",$tab_num);

for($i = 1; $i <= 10; $i++){

    $result = $tab_num * $i; 
    printf(" 9 * %d = %d \n", $i, $result);
}

?>