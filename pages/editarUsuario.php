<?php

session_start();
include("conexao.php");

if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
}
$id = $_GET['id'];
$sql = "SELECT * FROM usuarios WHERE id = '$id'";
$resultado = mysqli_query($conexao, $sql);
$usuario = mysqli_fetch_assoc($resultado);

if(isset($_POST['salvar'])){
   $nome = $_POST['nome'];
   $usuarioLogin = $_POST['usuario'];
   $senha = $_POST['senha'];

   $sql = "UPDATE usuarios
       SET
       nome ='$nome',
       usuarios = '$usuarioLogin',
       senha = '$senha'
       WHERE id = '$id'";

    mysqli_query($conexao, $sql);
    header("Location: listarUsuario.php");

}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="./CSS/style.css">

    <title>Editar Usuários</title>

</head>
<body>
    
<div class ="login-container">
    <h1>Editar Usuário</h1>

    <form method="POST">
        <input type="text"
        name="nome"
        value="<?php echo $usuario['nome']; ?>">

         <input type="text"
        name="usuario"
        value="<?php echo $usuario['usuarios']; ?>">

         <input type="text"
         name="senha"
         value="<?php echo $usuario['senha']; ?>">

        <button type="submit"
        name="salvar">

          Salvar

        </button>
    </form>

</div>

</body>
</html>