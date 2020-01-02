<?php
session_start(); 
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
    
<div class="grid">
    <div id="quiz">
        <h1 id="question"></h1>
        <hr style="margin-bottom:20px">

        <div class="buttons">
            <button id="btn0"><span id="choice0"></span></button>
            <button id="btn1"><span id="choice1"></span></button>
            <button id="btn2"><span id="choice2"></span></button>
            <button id="btn3"><span id="choice3"></span></button>
        </div>
        <hr style="margin-top:50px">
        <footer>
            <p id="progress">Question x of y.</p>
            <img src="logo/logo_mini" class="log" height="70px" width="90px" />
        </footer>
    </div>

<form action="processing.php" method="post">
  <input type="number" style="display:none" id="id_member" name="id_membre"/>
  <input type="text" style="display:none" id="genre" name="genre"/>
  <input type="text" style="display:none" id="desire" name="desire"/>
  <input type="submit" name="submit" class='modal-btn finish' style="display:none" id="submit" value="Creer ma page anniversaire" />
</form>
   
</div>
<script src="js/quiz_controller.js"></script>
<script src="js/question.js"></script>
<script src="js/perso_app.js"></script>
<script src="js/modal.js"></script>
  </body>

</html>


    <!--<img src="images/montagne.jpg"/>-->
