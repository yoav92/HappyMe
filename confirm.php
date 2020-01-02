<?php
session_start(); 

$user_id = $_GET['id'];

$token = $_GET['token'];

require 'php/db.php';

$req = $pdo->prepare('SELECT * FROM members WHERE id=?');

$req->execute([$user_id]);

$user = $req->fetch();

//session_start();

if($user && $user['confirmation_token'] == $token ) {


	$confirm = $pdo->prepare('UPDATE members SET confirmation_token = NULL,confirmed_at = NOW() WHERE id = ?');

	$confirm->execute(array($user_id));

	$_SESSION['flash']['sucess'] = 'Votre compte a bien été validé,merci' ;

	$_SESSION['id'] = $user_id;

	header('Location: event.php');
	
	

}else if($user && $user['confirmation_token'] == NULL){


	$_SESSION['flash']['danger']="Erreur de token: confirmation de validation de compte impossible";

	$_SESSION['id'] = $user_id;

	header('Location: form1.php');
}