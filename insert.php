<?php
require 'connect.php';
$message = '';
if (isset ($_POST['name'])  && isset($_POST['prenom']) && isset($_POST['age'])) {
  $name = $_POST['name'];
  $prenom = $_POST['prenom'];
  $age = $_POST['age'];
  $sql = 'INSERT INTO utilisateurs(name, prenom, age) VALUES(:name, :prenom, :age)';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':name' => $name, ':prenom' => $prenom, ':age' => $age])) {
    $message = 'user inserted successfully';
    header("Location:index.php ");
  }
}


?>
<!doctype html>
<html >
  <head>
    <title>Insert</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>


<div class="container">
 <div class="card mt-5">
   <div class="card-header">
     <h3>Entrez vos coordonnées</h3>
   </div>
   <div class="card-body">
   <?php if(!empty($message)): ?>
       <div class="alert alert-success">
         <?= $message; ?>
       </div>
     <?php endif; ?>
    
     <form method="post">
       <div class="form-group ">
         <label for="name">Nom</label>
         <input type="text" name="name" id="name" class="form-control" required>
       </div>
       <div class="form-group">
         <label for="prenom">Prénom</label>
         <input type="text" name="prenom" id="prenom" class="form-control" required>
       </div>
       <div class="form-group">
         <label for="age">Age</label>
         <input type="text" name="age" id="age" class="form-control" required>
       </div>
       <div class="form-group">
         <button type="submit" class="btn btn-success bouton">Insert</button>
       </div>
     </form>
   </div>
 </div>
</div>
</body>
</html>

