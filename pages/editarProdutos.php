


<?php

session_start();

include("conexao.php");

if(!isset($_SESSION['usuario'])){

header("Location: login.php");

}
$id = $_GET['id'];
$sql = "SELECT * FROM produtos WHERE id = '$id'";
$resultado = mysqli_query($conexao, $sql);
$produto = mysqli_fetch_assoc($resultado);

if(isset ($_POST['salvar'])){

$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$preco = $_POST['preco'];
$quantidade = $_POST['quantidade'];

$sql = "UPDATE produtos
        SET
        nome = '$nome',
        descricao = '$descricao',
        preco = '$preco',
        quantidade = '$quantidade'
        WHERE id = '$id'";

    mysqli_query($conexao, $sql);

    header("Location: listarProdutos.php");

}
 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
   
   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Editar Produtos</title>
</head>
<body>

<div class="login-container">
    <h1>Editar Produtos</h1>
    <form method="POST">

<input type="text"
name="nome"
value="<?php echo $produto['nome']; ?>">

<input type="text"
name="descricao"
value="<?php echo $produto ['descricao']; ?>">

<input type="number"
step="0.1"
name="preco"
value="<?php echo $produto ['preco']; ?>">

<input type="number"
name="quantidade"
value="<?php echo $produto ['quantidade']; ?>">

<button type="submit"
name="salvar">

Salvar

</button>

 </form>

</div>
    
</body>
</html>