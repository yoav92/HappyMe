<?php
session_start(); 
require_once 'php/function.php'; 
require_once 'php/db.php';

if(!empty($_POST)){     
    
    $req = $pdo->prepare('SELECT id FROM members WHERE email = ?');

    $req->execute([$_POST['email']]);

    $user = $req->fetch();

    if($user){

      $_SESSION['id']= $user['id'];
      header('location: form2.php');
    }else{

    $user_id = register($_POST['pseudo'],$_POST['password'] ,$_POST['email']); //call the fonction register


    $date1 = strtr($_POST['select_date'], '/', '-');
    $newformat = date('Y-m-d', strtotime($date1));


    event($user_id,$newformat,$_POST['time'] ,$_POST['number']);
    header('location: presentation.php');

}
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Happy me</title>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1"/>
     <meta http-equiv="X-UA-Compatible" content="ie=edge" />
     <link rel="stylesheet" href="design/css/bootstrap.min.css">
     <link rel="stylesheet" type="text/css" href="icone/css/all.css">
     <link rel="stylesheet"  href="design/css/style.css">
     <link rel="stylesheet"  href="design/css/jquery-ui.css">
     <link rel="stylesheet"  href="design/css/jquery-ui.structure.css">
     <link rel="stylesheet"  href="design/css/jquery-ui.theme.css">
     
     
     <script type="text/javascript">
  $(document).ready(function(){
    $("#select_date").datepicker();
  });
</script>
     
  </head>
  <body>
<div class="container_fluid">

    <?php if(isset($_SESSION['flash'])): ?>

        <?php foreach($_SESSION['flash'] as $type => $message): ?>

          <div class="alert alert-<?= $type; ?>">
            
            <?= $message; ?>

          </div>
        
        <?php endforeach; ?>

        <?php unset($_SESSION['flash']); ?>

    <?php endif; ?>

 </div>


<div id="price"><h1>Votre anniversaire organisé en quelques instants</h1></div>
<div id="ex"><h1>le lieu vous sera communiquer 8h avant l'horaire de votre anniversaire</h1></div>
<div id="info"><h1>Demande acceptée à partir de 6 personnes</h1></div>
<div id="invit"><h1>Vivez une experience unique sans prise de tête</h1></div>
<div id="event"><h1>Creer votre page evenement</h1></div>
<div id="pass"><h1>Choisissez un mot de passe fort d'au moins 6 caractères</h1></div>
<div id="go"><h1>C'est parti !</h1></div>

    <form method="POST" action="">
      <div class="field-date ">
        <i class="fas fa-calendar-alt"></i>
        <input type="text"  name="select_date" id="datepicker" class="datepicker" placeholder="Jour où vous souhaitez faire l'anniversaire" required />
        <i class="fas fa-arrow-down b1"></i>
      </div>
      <div class="field-time innactive">
        <i class="fas fa-clock"></i>
        <input type="time"  name="time" id="time" class="" value="00:00" required />
        <i class="fas fa-arrow-down b2"></i>
      </div>
      <div class="field-num innactive">
        <i class="fas fa-users"></i>
        <input type="number"  name="number" id="number" class="" min="6" placeholder="Choisir un nombre d'invités" required />
        <i class="fas fa-arrow-down b8"></i>
      </div>
      <div class="field-name innactive">
        <i class="fas fa-user"></i>
        <input type="text" name="pseudo" placeholder="Votre prénom" required />
        <i class="fas fa-arrow-down b3"></i>
      </div>
      <div class="field-email innactive">
        <i class="fas fa-envelope"></i>
        <input type="email" name="email" placeholder="Email" required />
        <i class="fas fa-arrow-down b5"></i>
      </div>
      <div class="field-password innactive">
        <i class="fas fa-key"></i>
        <input type="password" name="password" placeholder="Password" id="password" required />
        <i class="fas fa-arrow-down b7"></i>
      </div>
      <div class="field-finish innactive b4">
        <button type="submit" class="btn btn-success btn-lg btn-block" ><i class="fas fa-power-off"></i>Faites le test de personnalite !</button>  
      </div>
    </form>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.ui.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script src="js/app.js"></script>

  </body>
</html>