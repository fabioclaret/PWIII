<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/estilo.css">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" class="container">
        <div class="box">
            <h1>Login</h1>
            <input type="text"     name="nome"  required Placeholder="Informe seu nome">
            <input type="text"     name="email" required Placeholder="Informe seu email">
            <input type="password" name="senha" required Placeholder="Informe sua senha">
            <button name= "btnEntrar" class="entrar">Entrar</button>
            <button name="cadastrar" class="criar">Crie sua Conta</button>
        </div>
    </form>
    
</body>

<?php

require 'Usuario.class.php';

$usuario = new Usuario();

if(isset($_POST['btnEntrar'])){
    $email = addslashes($_POST['email']);
    $senha = md5(addslashes($_POST['senha']));

    $checaUsuarioSenha = $usuario->checkUserPass($email, $senha); 
   
    if($checaUsuarioSenha){
        session_start();
        $_SESSION['nome' ] = $nome;
        $_SESSION['email'] = $email; 
    }else{
        echo"<script>alert('Dados Invalidos')</script>";     
    }   


}else if(isset($_POST['cadastrar'])){
    $nome  = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);
    $senha = md5(addslashes($_POST['senha']));   

     $checaUsuario = $usuario->checkUser($email);    

    if($checaUsuario){
        echo"<script>alert('Usuario ja cadastrado')</script>";
    }else{
        $usuario->insertUser($email, $senha, $nome);
        session_start();
        $_SESSION['nome' ] = $nome;
        $_SESSION['email'] = $email; 

        header('Location:index.php');
    }
}

?>

</html>