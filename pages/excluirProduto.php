<?php
session_start();
include("conexao.php");
if(!isset($_SESSION['usuario'])){
    header("Location: login.php");

}

$id = $_GET['id'];

$sql = "DELETE FROM produtos WHERE id = '$id'";
mysqli_query($conexao, $sql);
header("Location: listarProdutos.php");

?>