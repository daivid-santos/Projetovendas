<?php

session_start();

include("conexao.php");

if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
}

if(isset($_POST['cadastrar'])){
    $nome = $_POST['nome'];
    $descricao = $_POST["descricao"];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];

    $sql = "INSERT INTO produtos
            (nome, descricao, preco, quantidade)
            
            VALUES
            
            ('$nome', '$descricao', '$preco', '$quantidade')";
        
        if (mysqli_query($conexao, $sql)){

                echo "Produto cadastrado com sucesso!";

        }else{

            echo "Erro: " . mysqli_error($conexao);
        }

}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta
        content="width=device-width, initial-scale=1.0" >
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="./css/style.css">

    <title>Cadrastro Produtos</title>

</head>
<body>
    <div class="login-container">

<h1 class="text-conter">Cadrastro de Produtos</h1>
<form method="POST">
    <input type="text"
       name="nome"
       class="form-control"
       placeholder="Nome do produto">

<br>

<input type="text"
       name="descricao"
       class="form-control"
       placeholder="Descrição">

<br>

<input type="number"
       name="preco"
       class="form-control"
       placeholder="Preço">

<br>

<input type="number"
       name="quantidade"
       class="form-control"
       placeholder="Quantidade">

    <button type="submit" class="btn btn-success w-100">

            Cadastrar

    </button>

    <br>
    <a href="home.php">
        <button type="button" class="btn btn-secondary w-100">

        </button>
    </a>


 </form>
</div>
</body>
</html>