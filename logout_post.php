
<?php

include 'inc/mysql.php';

session_start();

if (!$_POST) {
	header('Location: login.php');
	return;




}

 include 'login_post.php';


 if (isset($_POST['logout'])) {

 	unset($_SESSION['current_user']);

 	$_SESSION['success'] = 'Usuário Deslogado!';
 	header('Location: login.php');
 	
 }