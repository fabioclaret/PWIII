<?php
include 'Usuario.class.php';

$usuario = new Usuario();

$ok = $usuario->incluirUsuario("admin@gmail.com", "admin", 2);

if($ok){
    echo "Usuario incluido com sucesso!";
}else{
    echo "Erro ao incluir usuario!";
}


?>