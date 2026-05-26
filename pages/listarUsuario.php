<?php

session_start();
include("conexao.php");

if(isset($_GET['pesquisa']) && $_GET['pesquisa'] != ''){

    $pesquisa = $_GET['pesquisa'];

    $sql = "SELECT * FROM usuarios
            WHERE nome LIKE '%$pesquisa%'
            OR usuarios LIKE '%$pesquisa%'";

}else{

    $sql = "SELECT * FROM usuarios";

}

$resultado = mysqli_query($conexao, $sql);


?> 

<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">

    <title>Lista de Usuários</title>

</head>
<body>
    
<div class="login-container">
    <h1>Usuários Cadastrados</h1>

<form method="GET">
    <input type="text"
    name="pesquisa"
    class="form-control"
    placeholder="Pesquisar usuário">

    <button type="submit" class="btn btn-primary">
Pesquisar
    </button>
</form>
<br>

    <table class="table table-striped table-houver table-bordered">
        <tr class="table-dark">
            <th>ID</th>
            <th>nome</th>
            <th>Usuários</th>
            <th>Senha</th>
            <th>Ações</th>

        </tr>

        <?php while($usuario = mysqli_fetch_assoc($resultado)){ ?>

        <tr>
            <td><?php echo $usuario['id'];?></td>
            <td><?php echo $usuario['nome'];?></td>
            <td><?php echo $usuario['usuarios'];?></td>
            <td><?php echo $usuario['senha'];?></td>

        <td>
            <a href="editarUsuario.php?id=<?php echo $usuario['id']?>">
                <button class="btn btn-danger btn-sm">Editar</button>
            </a>

            <a href="excluirUsuario.php?id=<?php echo $usuario['id']?>">
                <button class="btn btn-danger btn-sm">Excluir</button>
            </a>
        </td>

        </tr>

        <?php }?>

    </table>


    <br>

    <a href="home.php">
        <button class="btn btn-secondary">
            Voltar
        </button>


    </a>

</div>

</body>
</html>
