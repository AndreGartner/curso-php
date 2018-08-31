<?php

	session_start(); 
	include 'inc/mixin.php';
	include 'inc/mysql.php';
	redirect_not_logged();
	
	$userId = isset($_GET['id']) ? (int)$_GET['id'] : null;

	if (!$userId) {
	 	$_SESSION['errors'] [] = 'Informe o Usuário para editar!';
	 	header('Location: users.php');
	 	exit; 
	 } 

	 $sql = "SELECT * FROM users where id = '".$userId."' limit 1";

	$result = mysqli_query($link, $sql);

 	if (!mysqli_num_rows($result)) {
 		$_SESSION['errors'] [] = 'Usuário não existe!';
 		header('Location: users.php');
 		exit;
 	}

 	$data = mysqli_fetch_object($result);

	$site = array(
		'title' => 'Editar Usuário'
);



include 'layout/header.php';



?>


<div class="container">
	<?php include 'inc/alerts.php'; ?>

	<p>Atualize as informações abaixo</p>

	<form action="users_edit_post.php" method="get">

		<div>
			<label>E-mail</label>
			<input type="text" name="email" value="<?php echo $data->Name ?>">
		</div>

		<div>
			<label>Senha</label>
			<input type="password" name="password">
		</div>

		<div>
			<label>Salário</label>
			<input type="text" name="earnings" value="<?php echo $data->earning ?>">
		</div>

		<div>
			<button type="submit" class="button">Entrar</button>
		</div>

	</form>
<?php

include 'layout/footer.php';
