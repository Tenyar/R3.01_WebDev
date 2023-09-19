<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Mult3</title>
  </head>
  <body style= 'height : 1200px;'>
	<h1> Table de multiplication </h1>
    <table style=' border-collapse: collapse; width : 40%; height : 50%;'>
            <?php
            for($i = 1; $i <= 10; $i++){
                echo "<tr style='font-size:30px; width : auto;'>";
                echo "<td style='border:1px solid #000; width : auto;  text-align: center;'>$i</td>"; // Every starter numbers 
                for($j = 2; $j <= 10; $j++){
                    $result = $i * $j;
                    echo "<td style='border:1px solid #000; width : auto;  text-align: center;'>$result</td>"; // Every result of a multiplication
                }
                echo "</tr>";
            }
            ?>
    </table>

      
    </p>
  </body>
</html>
