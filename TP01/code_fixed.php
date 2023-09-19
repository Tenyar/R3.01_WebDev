#!/usr/bin/php
<?php
  print("Boucle for\n");
for($i = 0; $i< 10; $i++) {
    printf("%d\n",$i);
  }
  
  print("==========\n");
  print("Boucle while\n");

  $i = 0;
  while( $i< 10) {
    printf("%d\n",$i);
    $i++;
  }
?>