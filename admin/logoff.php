<?php 
session_start();

// destruir a sessao
session_destroy();

header("location:../login.php");

?>