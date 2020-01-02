<?php
session_start(); 
require_once 'php/db.php';

if(!empty($_POST)){     
    $errors = array();
	if(!empty($_POST['password']) && !empty($_POST['mail'])){    

		$req = $pdo->prepare('SELECT * FROM members WHERE email = ?'); //check the email

		$req->execute(array($_POST['mail']));

		$user = $req->fetch();

		if($user && password_verify($_POST['password'], $user['password'])){ //check the password

			$_SESSION['id']= $user['id'];//build the sessions variables
			
			$_SESSION['name']= $user['name'];

			$_SESSION['flash']['success'] = 'Vous êtes connecté';

			header("Location: event.php");

			exit();

		}else{

		
			$errors['username'] = "email ou mot de passe incorrect";//error during connection


		}

}else{

    
      $errors['username'] = "email ou mot de passe incorrect";//error during connection


    }
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1"/>
     <meta http-equiv="X-UA-Compatible" content="ie=edge" />
     <link rel="stylesheet" href="design/css/bootstrap.min.css">
     <link rel="stylesheet" type="text/css" href="icone/css/all.css">
     <link rel="stylesheet"  href="design/css/style.css">
     <title>Happy me</title>
	
  </head>
<body>

    <?php if(isset($_SESSION['flash'])): ?>

        <?php foreach($_SESSION['flash'] as $type => $message): ?>
<div class="container-fluid">
          <div class="alert alert-<?= $type; ?>">
            
            <?= $message; ?>

          </div>
        </div>
        <?php endforeach; ?>

        <?php unset($_SESSION['flash']); ?>

    <?php endif; ?>


<?php if(!empty($errors)): ?> <!--error message to display-->



        <?php foreach ($errors as $error): ?>
          <div class="container-fluid"><div class="alert alert-danger text-center" role="alert">
          <p>Erreur de connexion</p>
          <p><?= $error; ?></p>
        </div></div>
        <?php endforeach; ?>


    <?php endif; ?>

<div id="price"><h1>Connectez vous à la page anniversaire</h1></div>

 <form method="POST" action="">
    <div class="field-email">
        <i class="fas fa-key"></i>
        <input type="email" name="mail" placeholder="Email" id="mail" required />
        <i class="fas fa-arrow-down "></i>
      </div>
      <div class="field-password innactive">
        <i class="fas fa-key"></i>
        <input type="password" name="password" placeholder="Password" id="password" required />
        <i class="fas fa-arrow-down "></i>
      </div>
      <div class="field-finish innactive b4">
        <button type="submit" class="btn btn-success btn-lg btn-block" ><i class="fas fa-power-off"></i>connexion</button>  
      </div>
    </form>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="js/app2.js"></script>

</body>
</html>