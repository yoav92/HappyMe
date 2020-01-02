<?php 
require_once 'php/db.php';
require_once 'php/functions.php';

?>
  

<!DOCTYPE html>
<html>
  <head>
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="design/css/design.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"/> 
    <title>Happy me</title> 
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
     <script src="https://cdn.ckeditor.com/ckeditor5/11.1.1/classic/ckeditor.js"></script>
  </head>
  <body>


<div class="container">

    <?php if(isset($_SESSION['flash'])): ?>

        <?php foreach($_SESSION['flash'] as $type => $message): ?>

          <div class="alert alert-success">
            
            <?= $message; ?>

          </div>
        
        <?php endforeach; ?>

        <?php unset($_SESSION['flash']); ?>

    <?php endif; ?>

 </div>




<div class="text-center autre cadre">
    <h4>Confirmez votre adresse e-mail</h4>
<p>Pour continuer à utiliser Happy me, vous devez confirmer votre adresse e-mail. Comme vous vous êtes inscrit(e) avec <?php if(isset($_SESSION['email'])){ echo $_SESSION['email']; } ?>, vous pouvez le faire automatiquement via Gmail.</p>

<button type="button" class="btn btn-light" data-toggle="modal" data-target="#change">Mettre a jour les coordonnees</button>

<a type="button" class="btn btn-secondary" href="https://accounts.google.com/ServiceLogin/identifier?service=mail&passive=true&rm=false&continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&ss=1&scc=1&ltmpl=default&ltmplcache=2&emr=1&osid=1&flowName=GlifWebSignIn&flowEntry=AddSession
">Connexion a Gmail</a>


<!-- The modal -->
<div class="modal fade" id="change" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        <h8 class="modal-title" id="modalLabel">Ajouter une adresse mail ou un numero de mobile</h8>
        </div>
            <div class="modal-body">
                <form method="POST" id="insert_form" action="">
                    <label>Nouvelle adresse e-mail ou nouveau numéro de mobile</label>
                    <input type="text" name="new" id="new"/><br> 
                    <input type="button" class="btn btn-secondary edit_data" id="edit" name="edit" data-toggle="modal" value="Ajouter"/></input>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"/>Annuler</button>
                </form> 
            </div>

        </div>
      </div>
  </div>
</div>


 
<? require_once 'php/footer.php'; ?>
  
