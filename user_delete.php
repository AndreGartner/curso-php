<?php

include 'inc/mysql.php';

session_start();

$userId = isset($_POST['id']) ? $_POST['id'] : null;



$errors = array();

if (!$userId) {
	$errors[] = 'Você precisa informar um usuário para excluir';
}

$sql_post = 'SELECT count(*) as total WHERE ID_USER = ' .$userId;

$result = mysqli_query($link, $sql_post);

 	if (mysqli_num_rows($result)) {
 		$_SESSION['errors'] [] = 'Usuário não pode ser excluído, por ter postagens, apague as postagens desse usuário';
 		header('Location: users.php');
 		exit;
 	}


if (count($errors)) {
	$_SESSION['errors'] = $errors;
	header('Location: users.php');
	return;
}


$query = 'DELETE FROM users WHERE id = ' .$userId;



if ( mysqli_query($link, $query)) {
	$_SESSION['success'] = 'Usuário excluido com sucesso!';

}else{
	$_SESSION['errors'][] = 'Ocorreu um problema ao excluir o usuário. Favor tentar novamente ou entrar em contato.';
}

header('Location: users.php');
return;