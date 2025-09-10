<?php
include('config.php');
if(isset($_GET['token'])){
  $id=$_GET['token'];
  $sql="DELETE FROM pageone WHERE Id=$id";
  $conn->query($sql);
}
header('location:forms.php');
 ?>
