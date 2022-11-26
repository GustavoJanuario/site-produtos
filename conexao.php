<?php 

$servidor_bd = "localhost"; // endereço do servidor de banco de dados
$usuario_bd = "root"; // usuario do banco de dados
$senha_bd = "#G121526g"; // senha do usuario
$banco = "bd_pw2"; // nome da base de dados

// função de conexão com o mysql
@$mysqli = new mysqli($servidor_bd,$usuario_bd,$senha_bd,$banco);

/*
    ->connect_errno; // retorna o numero do erro da conexao
    ->connect_error // retorna a mensagem de erro da conexao
*/

// verificar se a conexao retornou algum erro
if($mysqli->connect_errno > 0){
    echo "Falha ao conectar na base de dados";

}else{
    // função para reconhecimento de caracteres especiais (~ ç ^)
    mysqli_set_charset($mysqli, "utf8");
}

?>
