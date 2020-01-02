<?php
session_start(); 
require_once 'php/db.php';

$dem = $pdo->prepare('SELECT * FROM members WHERE id = ?');
$dem->execute(array($_SESSION['id']));
$demarage = $dem->fetch();

if(!empty($_POST)){     
    $errors = array();
	if(!empty($_POST['password'])){

		$req = $pdo->prepare('SELECT * FROM members WHERE id = ?'); //check the email

		$req->execute(array($_SESSION['id']));

		$user = $req->fetch();

		if(password_verify($_POST['password'], $user['password'])){ //check the password

			$_SESSION['id']= $user['id'];//build the sessions variables
			
			$_SESSION['name']= $user['name'];

			$_SESSION['flash']['success'] = 'Vous êtes connecté';

			header("Location: event.php");

			exit();

		}else{

		
			$errors['username'] = "email ou mot de passe incorrect";//error during connection


		}

}
}






?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1"/>
     <meta http-equiv="X-UA-Compatible" content="ie=edge" />
     <link rel="stylesheet" type="text/css" href="icone/css/all.css">
     <link rel="stylesheet" href="design/css/bootstrap.min.css">
     <link rel="stylesheet"  href="design/css/style.css">
     <title>Happy me</title>
	
  </head>
<body>
<div class="container-fluid">
    <?php if(isset($_SESSION['flash'])): ?>

        <?php foreach($_SESSION['flash'] as $type => $message): ?>

          <div class="alert alert-<?= $type; ?>">
            
            <?= $message; ?>

          </div>
        
        <?php endforeach; ?>

        <?php unset($_SESSION['flash']); ?>

    <?php endif; ?>
</div>
<div class="container">
<?php if(!empty($errors)): ?> <!--error message to display-->


    <div class="alert alert-danger">

      <p>Erreur de connexion</p>

      <ul>

        <?php foreach ($errors as $error): ?>

          <li><?= $error; ?></li>
        
        <?php endforeach; ?>

      </ul>

    </div>

    <?php endif; ?>
</div>

<?php if(isset($_SESSION['id'])){ ?>
<div id="pricee"><h1>Bon retour <?php echo $demarage['name'];?>,creez un nouvel anniversaire sans plus attendre!</h1></div>
<?php } ?>

 <form method="POST" action="">
      <div class="field-password">
        <i class="fas fa-key"></i>
        <input type="password" name="password" placeholder="Password" id="password" required />
        <i class="fas fa-arrow-down b3"></i>
      </div>
      <div class="field-finish innactive b4">
        <button type="submit" class="btn btn-success btn-lg btn-block" ><i class="fas fa-power-off"></i>Mon anniversaire maintenant!</button>  
      </div>
    </form>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="js/app.js"></script>

</body>
</html>