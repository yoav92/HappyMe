<?php
session_start(); 
require_once 'php/function.php'; 
require_once 'php/db.php';

    $req = $pdo->prepare('SELECT * FROM members WHERE id = ?');

    $req->execute([$_SESSION['id']]);

    $user = $req->fetch();
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Happy me</title>
    <link rel="stylesheet"  href="design/css/design.css">
    <link rel="stylesheet" href="design/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	 <script src="js/bootstrap.min.js" ></script>
	

  </head>
  <body >


    <?php if(isset($_SESSION['flash'])): ?>

        <?php foreach($_SESSION['flash'] as $type => $message): ?>
        <div class="container_fluid">
          <div class="alert alert-success text-center" role="alert">
            <?= $message; ?>
          </div>
        </div>
        
        <?php endforeach; ?>

        <?php unset($_SESSION['flash']); ?>

    <?php endif; ?>

 


    <div class="container_fluid">

    <?php if($user['confirmed_at']==NULL){ ?>

        <div class="alert alert-danger text-center" role="alert">
          Veuillez confirmer votre adresse email
        </div>

    <?php } ?>

 </div>

<p>Bienvenue sur la page event</p>
<a href="logout.php" >Se deconnnecter</a>



	

    
  </body>
</html>