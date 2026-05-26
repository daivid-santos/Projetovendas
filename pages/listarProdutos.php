<?php

session_start();

include("conexao.php");

if(!isset($_SESSION['usuario'])){

    header("Location: login.php");

}

if(isset($_GET['pesquisa']) && $_GET['pesquisa'] != ''){
    $pesquisa = $_GET['pesquisa'];
    $sql = "SELECT * FROM produtos
    WHERE nome LIKE '%$pesquisa%'";
}else{
    $sql = "SELECT * FROM produtos";
}
$resultado = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="./css/style.css">

    <title>Lista de Produtos</title>

</head>

<body>

    <div class="login-container">

        <h1>Produtos Cadastrados</h1>
<form method="GET">
    <input type="text"
    name="pesquisa"
    class="form-control"
    placeholder="Pesquisar produto">

<button type="submit" class="btn btn-primary">
    Pesquisar
</button>    


</form>
<br>

        <table class="table table-striped table-houver table-bordered">

            <tr class="table-dark">

                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Ações</th>

            </tr>

            <?php

            while($produto = mysqli_fetch_assoc($resultado)){

            ?>

            <tr>

                <td><?php echo $produto['id']; ?></td>

                <td><?php echo $produto['nome']; ?></td>

                <td><?php echo $produto['descricao']; ?></td>

                <td><?php echo $produto['preco']; ?></td>

                <td><?php echo $produto['quantidade']; ?></td>

                <td>
                    <a href="editarProduto.php?id=<?php echo $produto['id']; ?>">
                        <button class="btn btn-warning btn-sm">
                            Editar
                        </button>
                    </a>

                    <a href="excluirProdutos.php?id=<?php echo $produto['id']; ?>">
                        <button class="btn btn-danger btn-sm">
                            Excluir
                        </button>
                    </a>
                </td>

            </tr>

            <?php } ?>

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