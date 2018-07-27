<?php

	include 'inc/mixin.php';
	echo 'Hello Word';

	echo '<hr>';

	$NOmeDaVariavel = 'teste';

	echo $NOmeDaVariavel;	

	echo '<hr>';

	$valordavariavel = 16;

	echo 'O nome da variavel é: ' . $NOmeDaVariavel . ' e o valor dela é: ' . $valordavariavel;

	echo '<hr>';
	
	if (isset($NOmeDaVariavel)) {

		echo 'Variavel Existe!';
		# code...
	}


	echo '<hr>';

	$ValorVazio = false;

	if (isset($ValorVazio)) {
		echo 'Existe!';
	}

	echo '<hr>';

	define('MINHACONSTANTE', 'teste');



	echo MINHACONSTANTE;

	echo '<hr>';


	$valor = 10;
	$valor++;


	echo $valor;

	echo '<hr>';

	$texto = 'André';

	$texto .= 'Gärtner';

	echo $texto;

	echo '<hr>';

	$soma = 15;

	$soma += 5;

	echo $soma;

	echo '<hr>';

	$valor1 = 1;
	$valor2 = '1';

	if ($valor1 === $valor2) {
		# code...
		echo 'Igual';
	}

	//comentário
	#sasasasa
	/*
	
	askasalskalksa

	*/


	echo date('Y-n-j');


	echo '<hr>';

	
	function soma($valor1 = 10, $valor2 = 20){
		return $valor1 + $valor2;
	}



?>