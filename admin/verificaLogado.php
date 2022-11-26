<?php 
session_start();

// se a variavel de sessao $_SESSION['usuario'] "Não(!)" estiver setada redirecionamos o usuário para a tela de login

if( !isset($_SESSION['codUsuario']) ){

    header("location:../login.php?erro=Faça login para acessar o sistema!");

}

?>