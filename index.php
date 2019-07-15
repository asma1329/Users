<?php
require 'connect.php';
$sql = 'SELECT * FROM utilisateurs';
$statement = $connection->prepare($sql);
$statement->execute();
$utilisateurs = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
<!doctype html>
<html>
  <head>
    <title>Users</title>
    <meta charset="utf-8">
    
   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style2.css">
  </head>
  <body>

<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h3>All users</h3>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <th>Nom</th>
          <th>Prénom</th>
          <th>Age</th>
          <th>Action</th>
        </tr>
        <?php foreach($utilisateurs as $user): ?>
          <tr>
            <td><?= $user->id; ?></td>
            <td><?= $user->name; ?></td>
            <td><?= $user->prenom; ?></td>
            <td><?= $user->age; ?></td>
            <td>
              <a href="update.php?id=<?= $user->id ?>" class="btn btn-primary">Update</a>
              <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete.php?id=<?= $user->id ?>" class='btn btn-danger'>Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
      
    </div>
    <a href="insert.php" class="btn btn-success"> Insérer un nouveau membre </a>
  </div>
</div>

</body>
</html>

