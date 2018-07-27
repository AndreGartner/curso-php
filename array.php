<?php 

$fruits = array('Maça','banana','Melão');
$fruits = ['Maça','banana','Melão','tANGERINA'];

echo $fruits[1];

echo '<hr>';

$person = [
	'name' => 'Carlos',
	'age' => '18 anos',
	'job' => 'Developer'
];

echo 'Meu nome é ' . $person['name'] . ' eu tenho ' . $person['age'];

echo '<hr>';

print_r($person);

$person['name'] = 'André';
$person['sex'] = 'Masculino';

var_dump($person);

echo 'Meu nome é ' . $person['name'] . ' eu tenho ' . $person['age'];

$person['fruits'] = $fruits;

echo '<hr>';

//função uset apaga um elemento da array
unset($person['sex']);

var_dump($person);

//função count conta todas as posições da array
count($person);

var_dump($person);


echo '<hr>';

for ($i=0; $i < count($fruits); $i++) { 
	echo $fruits[$i] . '<br>';
}

echo '<hr>';

foreach ($fruits as $fruit) {
	echo $fruit . '<br>';
}

echo '<hr>';

foreach ($person as $column => $value) {
	echo $column . ': ' . $value . '<br>';
}

echo '<hr>';

array_push($fruits, 'Laranja');
var_dump($fruits);

echo '<hr>';

array_pop($fruits);
var_dump($fruits);

echo '<hr>';

echo array_shift($fruits);

echo '<hr>';

$values = [1, 2 , 3 , 4];

function incrementa($value){
	return $value++;
}

$newValues = array_map('incrementa', $values);

var_dump($newValues);

echo '<hr>';



var_dump(array_key_exists('sex', $person));

var_dump(array_keys($person));

echo '<hr>';

var_dump(array_search('André', $person));

sort($fruits);

var_dump($fruits); 