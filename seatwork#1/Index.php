<?php
  $name = "John Gabrielle Ofiangga";
  $address = "181 Corder St. 11 Avenue";
  $email = "johngabrielleofiangga@gmail.com";
  $contacts = "09957269441";
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Seatwork 1</title>
    <style media="screen">
        table,th,td{
          border: 1px solid;
          font-size: 4vw;
          margin: 1vw
        }
    </style>
  </head>
  <body>
    <table>
      <tr>
        <th>Name:</th>
        <td> <?php echo $name; ?></td>
      </tr>
      <tr>
        <th>address:</th>
        <td><?php echo $address ; ?></td>
      </tr>
      <tr>
        <th>Email:</th>
        <td><?php echo $email; ?></td>
      </tr>
      <tr>
        <th>Contacts:</th>
        <td><?php echo $contacts; ?></td>
      </tr>
    </table>

<!-- or this -->

  </body>
</html>
