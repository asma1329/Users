<?php
require 'connect.php';
$id = $_GET['id'];
$sql = 'DELETE FROM utilisateurs WHERE id=:id';
$statement = $connection->prepare($sql);
if ($statement->execute([':id' => $id])) {
  header("Location:index.php ");
}
?>

