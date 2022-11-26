<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- FONTAWESOME -->
    <link rel="stylesheet" href="fontawesome/css/all.min.css">

    <title>PW-2 Login</title>
</head>

<body class="bg-light">
    <?php include("topo.php"); ?>

    <div class="container bg-white rounded">

        <div class="row">
            <div class="col-sm-4 offset-sm-4">

                <div class="card mt-5 mb-5">
                    <div class="card-header">
                        <strong> <i class="fas fa-lock"></i> Login </strong>
                    </div>
                    <div class="card-body">
                        <form method="post" action="verificaLogin.php">

                            <div class="form-group">
                                <label><i class="fas fa-user"></i> E-mail</label>
                                <input type="email" class="form-control" name="usuario">
                            </div>

                            <div class="form-group">
                                <label><i class="fas fa-key"></i> Senha</label>
                                <input type="password" class="form-control" name="senha">
                            </div>

                            <input type="submit" class="btn btn-info form-control" value="Entrar">
                        </form>

    <?php 
        // verificar se existe o parametro 'erro' enviado via GET
        // GET é quando o parametro é envidao pela url ex:
        // http://localhost/upload_arquivos/login.php?erro=Usuário ou senha inválidos

      
       if( isset($_GET['erro']) ){

        $erro = $_GET['erro'];

        echo "<div class='alert alert-danger mt-2'> $erro </div>";

       }     
                        
    ?>
                    </div>
                </div>

            </div>
        </div>

    </div>

</body>

</html>