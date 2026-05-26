<?php

session_start();
include("conexao.php");

if(isset($_POST['entrar'])){
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    
    $sql = "SELECT * FROM usuarios
            WHERE usuarios='$usuario'
            AND senha='$senha'";

    $resultado = mysqli_query($conexao, $sql);

    if(mysqli_num_rows($resultado) > 0){

        $_SESSION['usuario'] = $usuario;
        header("Location: ./home.php");

    }else{
        echo "Usuário ou senha inválidos";
    }
}

?>
 
<!DOCTYPE html>
<html lang="pt-br">
  
<head>
    <meta charset="UTF -8">
    <meta name="viewport" content="width=device-widht, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="">

    <title>Login</title>
</head>
 
<body>
    <div class="login-container">
        <h1>Login</h1>
        <form method="POST">
            <input type="text"
            name="usuario"
            placeholder="Usuário">
            

        <input type="password"
              name="senha"
              placeholder="senha">    

        <button type="submit"
                name="entrar">

                Entrar

        </button>
        </form>

    </div>
</body>
<html>