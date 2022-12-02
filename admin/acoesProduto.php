<?php session_start(); ?>
<?php 



// receber os campos do formulario
$categoriaProduto = $_POST['categoriaProduto'];
$nomeProduto = $_POST['nomeProduto'];
$precoProduto = $_POST['precoProduto'];
$descricaoProduto = $_POST['descricaoProduto'];
$nome_imagemProduto = $_FILES['imagemProduto']['name'];
$tipo_imagemProduto = $_FILES['imagemProduto']['type'];
$tamanho_imagemProduto = $_FILES['imagemProduto']['size'];
$arquivoTemporario_imagemProduto = $_FILES['imagemProduto']['tmp_name'];
$operacao = $_POST['operacao'];
$usuarioProduto = $_SESSION['codUsuario'];

// print_r($categoriaProduto);
// print_r($nomeProduto);
// print_r($precoProduto);
// print_r($descricaoProduto);
// print_r($nome_imagemProduto);
// print_r($tipo_imagemProduto);
// print_r($arquivoTemporario_imagemProduto);

// validar o tipo de arquivo
$dadosTipoArquivo = explode('/', $tipo_imagemProduto);

// echo "<pre>";
// print_r($_SESSION['codUsuario']);
// echo "</pre>";

if($dadosTipoArquivo[0] != 'image'){
    header("location:index.php?pagina=formProduto&operacao=cadastrar&erro=Permitido somente arquivo do tipo imagem!");
}

// converter o valor de bytes para megabytes
$tamanhoMB_imagemProduto = $tamanho_imagemProduto / 1024 / 1024;

if($tamanhoMB_imagemProduto > 1){
    header("location:index.php?pagina=formProduto&operacao=cadastrar&erro=Permitido arquivos de até 1MB!");
}

// novo nome do arquivo imagem para não se repetir
$extensao_imagemProduto = strchr($nome_imagemProduto, ".");

$novoNome_imagemProduto = "imagem".time().$extensao_imagemProduto;

$copiaArquivo = copy($arquivoTemporario_imagemProduto, "../imagens/$novoNome_imagemProduto");

// verifica se a copia da imagem foi executada corretamente
if($copiaArquivo != true){
    header("location:index.php?pagina=formProduto&operacao=cadastrar&erro=Não foi possível carregar a imagem, contate o administrador!");
}

if ($operacao == 'cadastrar'){

    include("../conexao.php");

    $select = "SELECT codCategoria FROM tblcategoria WHERE nomeCategoria = '$categoriaProduto'";
    
    // executar a query no banco para buscar codigo da categoria selecionada
    $executaSql = $mysqli->query($select);
    $dados = $executaSql->fetch_assoc();
    $codCategoriaProduto = $dados['codCategoria'];

    // executar a query para inserir no banco o produto
    
    $sql = "INSERT INTO tblproduto 
        (categoriaProduto, nomeProduto, precoProduto, descricaoProduto, imagemProduto, usuarioProduto) 
        VALUES 
        ($codCategoriaProduto, '$nomeProduto', $precoProduto, '$descricaoProduto', '$novoNome_imagemProduto', $usuarioProduto)";

    $mensagem = "Produto cadastrado com sucesso!";

    $executaSql = $mysqli->query($sql);    

    if ($executaSql==true){
        // redirecionar para index incluindo a lista de produtos
        header("location:index.php?pagina=listaProduto&mensagem=$mensagem");
    
    }else{
    
        header("location:index.php?pagina=listaProduto&mensagem=Erro contate o administrador!");
    }

}

?>