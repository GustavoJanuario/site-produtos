<!-- definir tamanho maximo para imagem -->
<style>
  .imagem{
    max-width: 150px;
    max-height: 150px;
    width: auto;
    height: auto;
  }
</style>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Produtos</li>
  </ol>
</nav>

<?php 

if(isset($_GET['mensagem'])){

  $mensagem = $_GET['mensagem'];
  echo "<div class='alert alert-success mt-2 text-center'> $mensagem </div>";
}

?>

<div class="row">
    <div class="col-sm-2 offset-sm-10">
        <a href="index.php?pagina=formProduto&operacao=cadastrar" class="">
        <i class="fas fa-plus"></i> Novo Produto
        </a>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        

<?php 

// exibir as categorias cadastradas
include("../conexao.php");

$sql = "SELECT * FROM tblproduto";

// executa o sql
$executaSql = $mysqli->query($sql);

// retorna o total de linhas da consulta
$totalLinhas = $executaSql->num_rows;

?>
      <table class="table table-condensed">

        <tr>
          <td>Código</td>
          <td>Categoria</td>
          <td>Nome</td>
          <td>Preço</td>
          <td>Descrição</td>
          <td>Imagem</td>
        </tr>

        <?php 
          if($totalLinhas < 1){
            echo "<tr>
                    <td colspan='6'> Nenhum produto cadastrado! </td>
                  </tr>";
          }else{
            
            // obter os dados da consulta e exibir utilizando o while

            while($dados = $executaSql->fetch_assoc()){ 
              
              $nomeImagem = $dados['imagemProduto'];

              ?>

              <tr>
                <td> <?php echo $dados['codProduto'];?> </td>
                <td> <?php echo $dados['categoriaProduto'];?> </td>
                <td> <?php echo $dados['nomeProduto'];?> </td>
                <td> <?php echo $dados['precoProduto'];?> </td>
                <td> <?php echo $dados['descricaoProduto'];?> </td>
                <td> <?php echo "<img class='imagem' src='../imagens/$nomeImagem'>";?> </td>
              </tr>

           <?php } // fim do while

          } // fim do else
        
        ?>

      </table>

    </div>
</div>

<img src="../imagens/" alt="">