<?php
session_start(); 
require 'php/function.php';
psy($_POST['genre'],$_POST['desire']);
header('Location:event.php');

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Questionnaire de personnalite</title>
    <link rel="stylesheet"  href="design/css/perso_design.css">
    <link rel="stylesheet" type="text/css" href="icone/css/all.css">
	
  </head>
  <body>
    
    <button class='modal-btn finish'>Creer ma page anniversaire <i class='fas fa-play-circle'></i></button>
    <div class='modal-bg'><div class='modal'><h2>Avez vous un compte sur Happy Me ?</h2>
     <a class='mod' href='./connect.php'>connexion</a><a class='mod' href='./form1.php'>inscription</a>
     <span class='modal-close'>X</span></div>

     <script src="js/pop.js"></script>
  </body>

</html>
