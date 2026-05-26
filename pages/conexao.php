<?php

$host = "127.0.0.1";
$usuario = "root";
$senha = "";
$banco = "projetovendas";
$porta = "3307";

$conexao = mysqli_connect($host, $usuario, $senha, $banco, $porta);

if(!$conexao){
    die("Erro na conexão: " . mysqli_connect_error());
}

?>