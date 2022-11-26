<?php @session_start();?>

<div class="container-fluid bg-primary">
    <div class="container">
        
        <div class="row">

            <div class="col-sm-8">
                <h1>
                    <a href="index.php" class="text-white"><i class="fas fa-users-cog"></i> PW-2 Área Administrativa </a>
                </h1>
            </div>

            <div class="col-sm-4 text-white">
                <?php echo $_SESSION['nomeUsuario'];?>
            </div>

        </div>    

    </div>
</div>