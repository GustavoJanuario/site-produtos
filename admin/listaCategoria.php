<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Categorias</li>
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
        <a href="index.php?pagina=formCategoria&operacao=cadastrar" class="">
        <i class="fas fa-plus"></i> Nova Categoria
        </a>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        

<?php 

// exibir as categorias cadastradas
include("../conexao.php");

$sql = "SELECT * FROM tblcategoria";

// executa o sql
$executaSql = $mysqli->query($sql);

// retorna o total de linhas da consulta
$totalLinhas = $executaSql->num_rows;

?>
      <table class="table table-condensed">

        <tr>
          <td>Código</td>
          <td>Categoria</td>
          <td></td>
          <td></td>
        </tr>

        <?php 
          if($totalLinhas < 1){
            echo "<tr>
                    <td colspan='4'> Nenhuma categoria cadastrada! </td>
                  </tr>";
          }else{
            
            // obter os dados da consulta e exibir utilizando o while

            while($dados = $executaSql->fetch_assoc()){ ?>

              <tr>
                <td> <?php echo $dados['codCategoria'];?> </td>
                <td> <?php echo $dados['nomeCategoria'];?> </td>
                <td></td>
                <td></td>
              </tr>

           <?php } // fim do while

          } // fim do else
        
        ?>

      </table>

    </div>
</div>