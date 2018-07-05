<?php

$name = 'André Luiz Gärtner';
$namesize = strlen($name);

var_dump(strpos($name, 'G'));

$gosto = ' Eu, André, gosto de mulher ';
$gosto = str_replace('mulher', 'mulheres', $gosto);
echo $gosto;

var_dump(crypt('Paulinho'));

$data = '10/04/2018';

var_dump($parts = explode('/', $data));

var_dump(explode(' ', $name));

var_dump(trim($gosto));



?>