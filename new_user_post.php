<?php

include 'inc/mysql.php';

session_start();

if (!$_POST) {
	header('Location: new_user.php');
	return;
}

$name = isset($_POST['name']) ? $_POST['name'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;
$earnings = isset($_POST['earnings']) ? $_POST['earnings'] : null;

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

if (!$password) {
	$errors[] = 'Campo senha é obrigatório';
}

if (count($errors)) {
	$_SESSION['errors'] = $errors;
	header('Location: new_user.php');
	return;
}

$query = 'insert into users (Name, email, Password, earning) values ("'.$name.'","'.$email.'", "'.password_hash($password, PASSWORD_BCRYPT).'","'.$earnings.'")';



if ( mysqli_query($link, $query)) {
	$_SESSION['success'] = 'Novo usuário salvo com sucesso!';

}else{
	$_SESSION['errors'][] = 'Ocorreu um problema ao salvar o usuário. Favor tentar novamente ou entrar em contato.';
}

header('Location: new_user.php');
return;