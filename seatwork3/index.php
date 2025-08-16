<?php

$counter = 0;
$picked = rand(0,9);

function randomize($n, $random) {
if ($n == $random) {
  return "black";
}else{
  return "white";
}
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <style media="screen">
    body{

      display: flex;
      flex-direction: column;
      text-align: center;
      justify-content: center;
    }
    .box{
      border: solid black;
      border-radius:10px ;
      height: 50px;
      width: 50px;
      padding-top: 10px;
      text-align: center;
    }
  </style>
  <body>
    <table>
    <?php
    echo "<h1>{$picked}</h1>";
    for ($i = 0; $i < 10; $i++) {
      echo "<tr>";
      for ($j = 0; $j < 10; $j++) {
        $random = rand(0,9);
        if ($picked == $random){
          $counter++;
        }
        echo "<td class='box' style='color:".($picked == $random ? 'white' : 'black')."; background-color:".randomize($picked, $random).";'>".$random."</td>";
      }
      echo "</tr>";
    }
    ?>
  </table>
  <?php
  echo "<h2> there are exactly {$counter} amount of {$picked}</h2>";
   ?>
  </body>
</html>
