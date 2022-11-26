<?php 
// acessar a sessao
session_start();

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

// incluir a conexao com a base de dados
include('conexao.php');

$sql = "SELECT * FROM tblusuario WHERE emailUsuario='$usuario' 
                                AND senhaUsuario=MD5('$senha')";

// executa a query no banco
$executaSql = $mysqli->query($sql);

// retorna o total de linhas de uma consulta
$totalLinhas = $executaSql->num_rows;

if ($totalLinhas == 1) {

    //obter os dados da consulta atraves de um array
    $dados = $executaSql->fetch_assoc();

    // criar variáveis de sessao para armazer o nome e código do usuario
    $_SESSION['codUsuario'] = $dados['codUsuario'];
    $_SESSION['nomeUsuario'] = $dados['nomeUsuario'];
    $_SESSION['emailUsuario'] = $dados['emailUsuario'];
   
    header("location:admin/index.php");

}else{

    header("location:login.php?erro=Usuário ou senha inválidos!");

}

?>