<?php

session_start();

include("conexao.php");
if(!isset($_SESSION['usuario'])){
    header("location: login.php");
}

if(isset($_POST['cadastrar'])){
    $nome = $_POST['nome'];
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $sql = "INSERT INTO usuarios
    (nome, usuarios,senha)
    VALUES
    ('$nome', '$usuario', '$senha')";

    if(mysqli_query($conexao, $sql)){
        echo "Usuário cadastrado com sucesso!";

    }else{
        echo "Erro: " . mysqli_error($conexao);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Cadrastro de Usuários</title>
</head>
<body>
    
<div class="login-container">
    <h1>Cadrastro de Usuários</h1>
    <form method="POST">

    <input type="text"
        name="nome"
        class="form-control"
        placeholder="Nome completo">
    
    <input method="text"
        name="usuario"
        class="form-control"
        placeholder="Usuário">

    <input method="password"
        name="senha"
        class="form-control"
        placeholder="Senha">

<button type="submit" class="btn btn-success w-100">

     Cadastrar

    </button>

</form>

<br>
<a href="home.php">
    <button type="button" class="btn btn-secondary w-100">

    </button>
</a>
 

</div>

</body>
</html>