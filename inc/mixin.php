<?php


	function soma($valor1, $valor2){
		return $valor1 + $valor2;
	}


	function login_required(){
			return isset($_SESSION['logged']);		
	}

	function redirect_not_logged(){
		if(!login_required()){
			header('Location: login.php');
			exit;
		}
	}

	 function current_user(){
		return isset($_SESSION['current_user']) ? $_SESSION['current_user'] : null;
	}

	function user_deslogged(){
		return isset($_SESSION['logout']);
	}
?>