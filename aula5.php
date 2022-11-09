<?php
require 'config.php';
include('funcoes.php');

//Datas e Strings

$atual = new DateTime();
$especifica = new DateTime('1992-04-22');
$data = new DateTime('+1 month');

print_r($atual);
echo'<br>';
print_r($especifica);
echo '<br>';
print_r($data);
echo '<br>';

echo $data->format('d-m-Y');
$data = new DateTime('-44 year');
echo '<br>';
echo $data->format('d-m-Y');

echo '<br>';
$dataNascimento = new DateTime('2003-06-08');
$intervalo = $dataNascimento -> diff(new DateTime());
print_r($intervalo);
echo '<br>';
echo '<br>';
echo $intervalo -> format('%y anos, %m meses e %d dias');

echo'<br>';
echo dataExtenso(new DateTime('2003-06-08'));

?>

