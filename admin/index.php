<?php
include('verificaLogado.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!-- FONTAWESOME -->
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">

    <title>PW-2 Admin</title>
</head>

<body class="bg-light">
    <?php include("topo.php"); ?>

    <div class="container bg-white rounded">
        <div class="row">

            <div class="col-sm-2 border-right">
                <?php include("menu.php"); ?>
            </div>

            <div class="col-sm-10 border-right mt-1">
                <!-- conteúdo -->
                <?php

                if (isset($_GET['pagina'])) {

                    // concatena o nome do arquivo com a extensao ".php"
                    $pagina = $_GET['pagina'] . '.php';

                    // file_exists = verifica se o arquivo existe
                    if (file_exists($pagina)) {
                        include($pagina);
                    } else {
                        include("404.php");
                    }
                }else{
                    // incluir o arquivo de boas vindas quando o parametro pagina nao existir
                    include("boasVindas.php");
                } ?>
            </div>

        </div>
    </div>

</body>

</html>