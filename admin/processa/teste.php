<?php
$senha = 'teste';

$password = password_hash($senha, PASSWORD_DEFAULT);
$confere = password_verify($senha, $password);

echo $password;
echo "<br />";
echo $confere;
?>