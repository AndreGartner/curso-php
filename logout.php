<?php

	session_start(); 
	include 'inc/mixin.php';
	

	$site = array(
		'title' => 'Logout'
);



include 'layout/header.php';



?>


<div class="container">
	<?php include 'inc/alerts.php'; ?>

	<p>Deslogue aqui em baixo!</p>

	

	<form action="logout_post.php" method="post">

		<input name="logout" type="submit" id="submit" value="logout" class="button" />

	</form>

	
</div>

<?php

include 'layout/footer.php';
