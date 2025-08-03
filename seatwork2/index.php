<?php
function randomize() {
    $color = ["blue", "yellow", "green", "red", "orange"];
    $random = rand(0, 4);
    return $color[$random];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Random Color Generator</title>
  <style>
    table {
      border-collapse: collapse;
    }
    .box {
      width: 30px;
      height: 30px;
    }
  </style>
</head>
<body>
  <h1>RANDOM COLOR GENERATOR</h1>
  <table>
    <?php
    for ($i = 0; $i < 10; $i++) {
      echo "<tr>";
      for ($j = 0; $j < 10; $j++) {
        $color = randomize();
        echo "<td class='box' style='background-color: $color;'></td>";
      }
      echo "</tr>";
    }
    ?>
  </table>
</body>
</html>
