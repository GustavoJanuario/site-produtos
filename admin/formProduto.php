<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item"><a href="index.php?pagina=listaProduto">Produtos</a></li>
    <li class="breadcrumb-item active" aria-current="page">Cadastro Produto</li>
  </ol>
</nav>


<?php 
// verificar se existe o parametro 'erro' enviado via GET
// GET é quando o parametro é envidao pela url ex:
// http://localhost/upload_arquivos/login.php?erro=Usuário ou senha inválidos

        
if( isset($_GET['erro']) ){

    $erro = $_GET['erro'];

    echo "<div class='alert alert-danger mt-2'> $erro </div>";

}     
                        
?>

<?php 
// receber a operacao via GET
$operacao = $_GET['operacao'];
?>


<div class="row">
    <div class="col-sm-6 offset-sm-30">
        
        <form action="acoesProduto.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nomeCategoria">Categoria</label>
                <select name="categoriaProduto" class="form-control">
                    <option selected>Selecione a categoria</option>
                    
                    <!-- Select das categorias cadastradas na tblcategorias -->
                    <?php 
                        // exibir as categorias cadastradas
                        include("../conexao.php");

                        $sql = "SELECT * FROM tblcategoria";

                        // executa o sql
                        $executaSql = $mysqli->query($sql);

                        // retorna o total de linhas da consulta
                        $totalLinhas = $executaSql->num_rows;
                    ?>

                    <?php 
                        if($totalLinhas < 1){
                            echo "<option>
                                    Nenhuma categoria cadastrada!
                                </option>";
                        }else{                               
                            // obter os dados da consulta e exibir utilizando o while

                            while($dados = $executaSql->fetch_assoc()){ ?>

                            <option>
                                <?php echo $dados['nomeCategoria'];?>
                            </option>

                            <?php } // fim do while

                        } // fim do else       
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="nomeProduto">Nome Produto</label>
                <input type="text" name="nomeProduto" class="form-control">
            </div>

            <div class="form-group">
                <label for="precoProduto">Preço</label>
                <input type="text" name="precoProduto" class="form-control">
            </div>

            <div class="form-group">
                <label for="descricaoProduto">Descrição</label>
                <textarea class="form-control" name="descricaoProduto" rows="3"></textarea>
            </div>

            <div class="form-group">
                <label for="imagemProduto">Imagem</label>
                <input type="file" class="form-control-file" name="imagemProduto" accept="image/*">
            </div>

            <input type="hidden" name="operacao" value="<?php echo $operacao;?>">

            <div class="form-group">
                <button type="submit" class="btn btn-success float-right"><i class="fas fa-save"></i> Gravar</button>
            </div>
            
        </form>
        
    </div>
</div>
