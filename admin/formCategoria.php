<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item"><a href="index.php?pagina=listaCategoria">Categorias</a></li>
    <li class="breadcrumb-item active" aria-current="page">Cadastro Categoria</li>
  </ol>
</nav>

<?php 
// receber a operacao via GET
$operacao = $_GET['operacao'];
?>

<div class="row">
    <div class="col-sm-6 offset-sm-30">
        
        <form action="acoesCategoria.php" method="POST">
            <div class="form-group">
                <label for="nomeCategoria">Categoria</label>
                <input type="text" name="nomeCategoria" id="nomeCategoria" class="form-control" required>
            </div>
            <input type="hidden" name="operacao" value="<?php echo $operacao;?>">
            <div class="form-group">
                <button type="submit" class="btn btn-success float-right"><i class="fas fa-save"></i> Gravar</button>
            </div>
        </form>
        
    </div>
</div>
