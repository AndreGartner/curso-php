<?php

session_start();
include 'inc/mysql.php';

if (!$_POST) {
	header('Location: login.php');
	return;
}

$email = isset($_POST['email']) ? $_POST['email'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;


$errors = array();


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
	header('Location: login.php');
	return;
}

$query = 'select * from users where email like "'.$email.'" limit 1 ';



if ( $result = mysqli_query($link, $query)) {

	

	if ($user = mysqli_fetch_assoc($result)) {

		if (password_verify($password, $user['Password'])) {
			$_SESSION['logged'] = true;
			$_SESSION['current_user'] = $user;
			$_SESSION['success'] = 'Você entrou com sucesso!';
			header('Location: logout.php');
		}else{
			$_SESSION['errors'][] = 'Senha inválida!';
		}

		exit;
	
}else{
	$_SESSION['errors'][] = 'Nenhum usuário encontrado com esse Endereço de email!';
}


	$_SESSION['success'] = 'Novo usuário salvo com sucesso!';


}else{
	$_SESSION['errors'][] = 'Ocorreu um problema ao salvar o usuário. Favor tentar novamente ou entrar em contato.';
}

header('Location: login.php');
exit;