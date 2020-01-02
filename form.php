<?php/*
session_start();
require_once 'php/functions.php'; 
require_once 'php/db.php';


if(!empty($_POST)){     // check if the form is filled in
	$errors = array();


	if(empty($_POST['prenom'])){ //check the name

		$errors['prenom'] = "Your name is invalid";

	} 

	if(empty($_POST['email'])){ //check the email

		$errors['email'] = "Your email is invalid";

	} else {

		$req = $pdo->prepare('SELECT id FROM members WHERE email = ?');

		$req->execute([$_POST['email']]);

		$user = $req->fetch();

		if($user){

			$errors['email']= 'This email is already used for another account';
		}
	}


	if(empty($_POST['password'])){ //check the password

		$errors['username'] = "Your password is invalid";

	}


	if(empty($errors)){
		
		

		register($_POST['date'],$_POST['time'] ,$_POST['num1'] ,$_POST['num2'],$_POST['prenom'],$_POST['mail'],$_POST['password']); //call the fonction register
		header('location: login.php');


	}
}
*/
?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Information sur l'anniversaire</title>
    <link rel="stylesheet"  href="design/css/design.css">
    <link rel="stylesheet" href="design/css/bootstrap.min.css">
    <link rel="stylesheet" href="design/css/bootstrap-theme.min.css" >
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="js/bootstrap.min.js" ></script>
	<script type="text/javascript" language="Javascript" src="js/jquery-3.2.1.js"></script>
	<script type="text/javascript" language="Javascript" src="js/func.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){ //code jquery to guide the user to complete the form
	
    var $nom = $('#nom'),
        $password = $('#password'),
        $mail = $('#mail'),
        $envoi = $('#envoi'),
        $erreur = $('#erreur'),
        $champ = $('.champ');
        $champe = $('.champe');

    $champ.keyup(function(){ 
        if($(this).val().length < 6){ // if the string is less than 6
        	$("#password").next(".error-message").show().text("Your password must contain at least 6 characters");
            $(this).css({ // we make the red field
                borderColor : 'red',
	        color : 'red'
            });
            
         }
         else{
         	$("#password").next(".error-message").hide().text("");
             $(this).css({ // if everything is good, we make it green
	         borderColor : 'green',
	         color : 'green'
	     });
             
         }
         
    });


     $champe.keyup(function(){
        if($(this).val().length < 2){ // if the string is less than 2
            $(this).css({ // we make the red field
                borderColor : 'red',
	        color : 'red'
            });
            
         }
         else{
             $(this).css({ // if everything is good, we make it green
	         borderColor : 'green',
	         color : 'green'
	     });
             
         }
         
    });
          
    $("#mail").keyup(function(){ 
					if(!$("#mail").val().match(/^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/)){
						$("#mail").next(".error-message").show().text("Please enter a valid email address");
						$("#mail").css("border-color","#FF0000");
						
					}
					else{	
						$("#mail").next(".error-message").hide().text("");
						$("#mail").css("border-color","green");
						
					}
					
				});
    $("#nom").keyup(function(){
					if($("#nom").val() == "" ){
						$("#nom").next(".error-message").show().text("What is your last name?");
						$("#nom").css("border-color","#FF0000");
					
					}
					else{	
						$("#nom").next(".error-message").hide().text("");
						
					}
					
				});
    $("#prenom").keyup(function(){
					if($("#prenom").val() == "" ){
						$("#prenom").next(".error-message").show().text("What is your first name?");
						$("#prenom").css("border-color","#FF0000");
					
					}
					else{	
						$("#prenom").next(".error-message").hide().text("");
						
					}
					
				});

    $("#metier").keyup(function(){
					if($("#metier").val() == "" ){
						$("#metier").next(".error-message").show().text("What is your profession?");
						$("#metier").css("border-color","#FF0000");
						
					}
					else{	
						$("#metier").next(".error-message").hide().text("");
						
					}
					
				});

     

    $envoi.click(function(e){
    	if($champe.val().length < 2){
    		e.preventDefault();
    	}
    	else if(!$("#mail").val().match(/^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/)){
    		e.preventDefault();
    	}
    	else if($("#nom").val() == "" ){
    		e.preventDefault();
    	}
    	else if($("#metier").val() == "" ){
    		e.preventDefault();
    	}
	
});


});
</script>
  </head>
  <body class="second">

<nav class="navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">
    <img src="logo/happyy" class="logo" /> 
  </a>
  
   
</nav>
     <div class="text-center autr"><span class="tai">L'importance c'est d'etre avec les personnes qu'on aime,on s'occupe du reste.</span></div>

    <?php if(!empty($errors)): ?>

    <div class="alert alert-danger">

    	<p>You have not completed the form correctly</p>

    	<ul>

	    	<?php foreach ($errors as $error): ?>

	    		<li><?= $error; ?></li>
	    	
	    	<?php endforeach; ?>

    	</ul>

    </div>

    <?php endif; ?>

<form method="POST" action=""> <!--form to be completed by the user -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-3"></div>
		    <div class="col-3"><label for="cheese">Date</label><input class="form-control" type="date" name="date" id="nom" placeholder="jour ou vous voulez fetez l'anniversaire" ><span class="error-message">erreur</span></div>
		    <div class="col-3"><label for="cheese">horraires souhaitees</label><input class="form-control" type="time" name="time" id="prenom" placeholder="horraires souhaitees" ><span class="error-message">erreur</span></div>
		    <div class="col-3"></div>
		</div></br>
		<div class="row">
			<div class="col-3"></div>
			<div class="col-3"><label for="cheese">Combien d'invites</label><input class="form-control" type="number" name="num1" id="mail" placeholder="nombre d'invites" ><span class="error-message">erreur</span></div>
		    <div class="col-3"><input class="form-control autreee" type="number" name="num2" id="mail" placeholder="nombre d'invites" ><span class="error-message">erreur</span></div>
		    <div class="col-3"></div>
		</div></br>
		<div class="row">
			<div class="col-3"></div>
			<div class="col-6"><label for="cheese">Prenom</label><input class="form-control pass " type="text" name="prenom" id="password" placeholder=" " >
			<span class="error"></span>
			<span class="bar"></span></div>
			<div class="col-3"></div>
		</div></br>
			<div class="row">
			<div class="col-3"></div>
			<div class="col-6"><label for="cheese">Adresse email</label><input class="form-control pass " type="text" name="mail" id="password" placeholder=" " >
			<span class="error"></span>
			<span class="bar"></span></div>
			<div class="col-3"></div>
		</div></br>
			<div class="row">
			<div class="col-3"></div>
			<div class="col-6"><label for="cheese">Mot de passe</label><input class="form-control pass " type="password" name="password" id="password" placeholder=" " >
			<span class="error"></span>
			<span class="bar"></span></div>
			<div class="col-3"></div>
		</div>
		

		<div class="text-center autreee"><button type="submit" id="envoi" class="btn btn-outline-warning">Joyeux anniversaire !</button></div>
	</div>
</form>


  </body>

</html>