<?php
$login=$_POST["nome"];
$senha=$_POST["senha"];
if ($login="admin" && $senha=="admin"){
     header("location: gerenciar.php"); 
}else{
    echo "Acesso Negado, insira as informações corretas por favor!";
}

?>