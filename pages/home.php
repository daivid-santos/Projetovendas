<?php

session_start();

include("conexao.php");

if(!isset($_SESSION['usuario'])){

    header("Location: login.php");

}

$sqlProdutos = "SELECT COUNT(*) AS total FROM produtos";
$resultadoProdutos = mysqli_query($conexao, $sqlProdutos);
$totalProdutos = mysqli_fetch_assoc($resultadoProdutos);

$sqlUsuarios = "SELECT COUNT(*) AS total FROM usuarios";
$resultadoUsuarios = mysqli_query($conexao, $sqlUsuarios);
$totalUsuarios = mysqli_fetch_assoc($resultadoUsuarios);


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="./CSS/style.css">

    <title>Home</title>

</head>

<body>

    <div class="login-container">

        <h1>
            Bem-vindo,
            <?php echo $_SESSION['usuario']; ?>
        </h1>

        <button class="btn btn-success">
    Teste Bootstrap
</button>

<br><br>


<div class="alert alert-primay">

 <h2>
            Total de Produtos
            <?php echo $totalProdutos ['total']?>
        </h2>

</div>
       
<div class="alert alert-success">

  <h4>
            Total de Usuários
            <?php echo $totalUsuarios['total']?>
        </h4>


</div>
      
   <div class="d-grid gap-3">

    <a href="cadrastroProdutos.php">
        <button type="button" class="btn btn-success w-100">
            Cadastrar Produto
        </button>
    </a>

    <a href="listarProdutos.php">
        <button type="button" class="btn btn-primary w-100">
            Listar Produtos
        </button>
    </a>

    <a href="listarUsuario.php">
        <button type="button" class="btn btn-secondary w-100">
            Listar Usuários
        </button>
    </a>

    <a href="Cadrastrousuario.php">
        <button type="button" class="btn btn-warning w-100">
            Cadastrar Usuário
        </button>
    </a>

    <a href="logout.php">
        <button type="button" class="btn btn-danger w-100">
            Sair
        </button>
    </a>

</div>
    </div>

</body>
</html>