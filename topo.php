<?php session_start(); ?>
<div class="container-fluid bg-primary">
    <div class="container">
        
        <div class="row justify-align-center">

            <div class="col-sm-8">
                <h1>
                    <a href="index.php" class="text-white"><i class="fas fa-laptop-code"></i> PW-2 </a>
                </h1>
            </div>

            <div class="col-sm-2 text-white">
                <a href="#" class="text-white"> Minha lista </a>
            </div>

            <div class="col-sm-2">
                <?php 
                    // se a variável $_SESSION['usuario'] existir, exibimos o link para acessar a área administrativa sem passar pela tela de login

                    if(isset($_SESSION['codUsuario'])){
                     ?>   
                       
                <a href="admin/index.php" class="text-white"> 
                    Admin <i class="fas fa-sign-in-alt"></i>
                </a>       

                   <?php }else{ 
                      // mostrar o link para entrar (tela de login)
                    ?>
                      
                <a href="login.php" class="text-white"> Entrar <i class="fas fa-sign-in-alt"></i></a>
                
                <?php    }  ?>

               
            </div>

        </div>    

    </div>
</div>