<?php

include 'inc/mysql.php';

session_start();

$userId = isset($_POST['id']) ? $_POST['id'] : null;
$name = isset($_POST['name']) ? $_POST['name'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;
$earnings = isset($_POST['earnings']) ? $_POST['earnings'] : null;


if (!$_POST) {
	header('Location: users_edit.php?id=' . $userId);
	return;
}


$errors = array();

if (!$name) {
	$errors[] = 'Campo nome é obrigatório';
}

if (!$email) {
	$errors[] = 'Campo email é obrigatório';
	}else{
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$errors[] = 'Endereço de email é inválido';
		}
	}

if ($password) {
	$updatePasswordString = ', password = "'.password_hash($password, PASSWORD_BCRYPT).'" ';
}

if (count($errors)) {
	$_SESSION['errors'] = $errors;
	header('Location: users_edit.php?id=' . $userId);
	return;
}

$query = 'update users set Name = "'.$name.'", email = "'.$email.'", earning = "'.$earnings.'" 
'.$updatePasswordString.'
WHERE ID = '. $userId;



if ( mysqli_query($link, $query)) {
	$_SESSION['success'] = 'Novo usuário salvo com sucesso!';

}else{
	$_SESSION['errors'][] = 'Ocorreu um problema ao salvar o usuário. Favor tentar novamente ou entrar em contato.';
}

header('Location: users.php');
return;