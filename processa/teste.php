<?php
$senha = '156063';

$password = password_hash($senha, PASSWORD_DEFAULT);
echo $password."<br />";
echo time()."<br />";

$novaSenha = rand(0,999) + substr(time(), 4, 6);
echo $novaSenha;
?>