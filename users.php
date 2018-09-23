<?php

	session_start(); 
	include 'inc/mixin.php';
	include 'inc/mysql.php';
	redirect_not_logged();
	
	$sql = 'SELECT * FROM users';

	$result = mysqli_query($link, $sql);

	$site = array(
		'title' => 'Login'
);



include 'layout/header.php';



?>


<div class="container">
	<?php include 'inc/alerts.php'; ?>

		<a href="new_user.php" class="button">Cadastrar Usuário</a>

		<?php if (mysqli_num_rows($result)) : ?>

				<table>
					<thead>
						<tr>
							<th>#</th>
							<th>Nome</th>
							<th>E-mail</th>
							<th>Salário</th>
							<th>Ações</th>
						</tr>
					</thead>
					<tbody>
						<?php while ($user = mysqli_fetch_object($result)) : ?>
							
						<tr>
							<td class="align-left"><?php echo $user->ID ?></td>
							<td class="align-left"><?php echo $user->Name ?></td>
							<td class="align-left"><?php echo $user->email ?></td>
							<td class="align-right">R$<?php echo number_format($user->earning, 2, ',','.') ?></td>
							<td>
								
								<a href="users_edit.php?id=<?php echo $user->ID?> " class="button">Editar</a>
								
								<form id="delete-user-<?php echo $user->ID ?>" action="user_delete.php" method="post">

									<input type="hidden" name="id" value="<?php echo $user->ID?>">
									<button type="button" class="button" onclick="deleteUser('Você confirma a exclusão do usuário <?php echo $user->Name ?>?', <?php echo $user->ID ?>)">Excluir</button>

								</form>

								

							</td>
						</tr>
					<?php endwhile ?>
					</tbody>
				</table>

		<?php endif ?>	

</div>

<script type="text/javascript">
	function deleteUser(message, userId){
		if (confirm(message)) {
			document.getElementById('delete-user-'+ userId).submit();
		}
	}
</script>

<?php

include 'layout/footer.php';
