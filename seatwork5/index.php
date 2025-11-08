<?php
function randomize($n, $selectedNumbersString) {
    if (strpos($selectedNumbersString, (string)$n) !== false) {
        return "black";
    } else {
        return "white";
    }
}

$checkString = "";

if (isset($_POST['Submit'])) {
    if (isset($_POST['saved'])) {
        $checkString = $_POST['saved'];
    }

    if (isset($_POST['previous_picked'])) {
        $previousPicked = (string)$_POST['previous_picked'];

        if (strpos($checkString, $previousPicked) === false && strlen($checkString) < 10) {
            $checkString .= $previousPicked;
        }
    }
}

$picked = rand(0, 9);

if (strpos($checkString, (string)$picked) === false && strlen($checkString) < 10) {
    $checkString .= $picked;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Practical</title>
    <style>
        body {
          display: flex;
          flex-direction: column;
          text-align: center;
          justify-content: center;
        }
        form {
          display: flex;
          flex-direction: column;
          text-align: center;
          justify-content: center;
          align-items: center;
          gap:40px;
        }
        form h1 {
          margin: 0px;
          padding-top: 10px
        }
        form #button {
          height: 7vh;
          width: 20vw;
          border-radius: 10px;
          font-size:50px;
        }
        .box {
          border: solid black;
          border-radius:10px ;
          height: 50px;
          width: 50px;
          padding-top: 10px;
          text-align: center;
        }
        table {
          border-collapse: separate;
          border-spacing: 5px;
        }
    </style>
</head>
<body>
    <form action="" method="post">
      <h1>Selected Numbers:</h1>
      <h1>
      <?php
      if (!empty($checkString)) {
          echo implode(", ", str_split($checkString));
      } else {
          echo "None yet";
      }
      ?>
      </h1>
      <h2>Current Number: <?php echo $picked; ?></h2>
      <table>
      <?php
      for ($i = 0; $i < 10; $i++) {
        echo "<tr>";
        for ($j = 0; $j < 10; $j++) {
          $random = rand(0,9);
          $backgroundColor = randomize($random, $checkString);
          $textColor = ($backgroundColor == 'black') ? 'white' : 'black';
          echo "<td class='box' style='color:".$textColor."; background-color:".$backgroundColor.";'>".$random."</td>";
        }
        echo "</tr>";
      }
      ?>
      </table>
      <input type="hidden" name="previous_picked" value="<?php echo $picked; ?>">
      <input type="hidden" name="saved" value="<?php echo $checkString; ?>">
      <?php
      $buttonText = "Submit";
      $disabled = "";
      if (strlen($checkString) >= 10) {
          $buttonText = "unable to click";
          $disabled = "disabled";
      }
      ?>
      <input id="button" type="submit" name="Submit" value="<?php echo $buttonText; ?>" <?php echo $disabled; ?>>
    </form>
</body>
</html>