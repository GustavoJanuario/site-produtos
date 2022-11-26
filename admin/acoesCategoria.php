<?php 

// receber os campos do formulario
$nomeCategoria = $_POST['nomeCategoria'];
$operacao = $_POST['operacao'];

// verificar o tipo da operacao

if ($operacao == 'cadastrar'){

    $sql = "INSERT INTO tblcategoria (nomeCategoria) VALUES ('$nomeCategoria')";

    $mensagem = "Categoria cadastrada com sucesso!";

}

// incluir a conexao com o banco
include("../conexao.php");

// executar a query no banco
$executaSql = $mysqli->query($sql);

if ($executaSql==true){
    // redirecionar para index incluindo a lista de categorias
    header("location:index.php?pagina=listaCategoria&mensagem=$mensagem");

}else{

    header("location:index.php?pagina=listaCategoria&mensagem=Erro contate o administrador!");
}

?>