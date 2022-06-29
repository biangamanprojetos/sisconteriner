<?php

ini_set('default_charset','UTF-8');

session_start();

if ($_SESSION['acessou']=="1"){
   
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="gerenciar.css">
    <title>Controle de Conteiner</title>
</head>
<body>
    <div id="base">
        <header>
            <h1>Controle de Conteiner</h1>
        </header>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="gerenciar.php">Gerenciar</a></li>
                <li><a href="relatorios.php">Relatórios</a></li>
                <li><a href="logout.php">Encerrar Seção</a></li>
            </ul>
        </nav>
        <main>
        <h1>Bem vindo ao Sistema de Controle de Conteiners</h1>
        <hr>
       Relatórios de Conteiners Cadastrados:
        <?php
            
            require_once "conexao.php";
            $con = Connection::getConn();
        
            $sql = "select * from cliente"; 
            $sql = $con->prepare($sql);
           
            $sql -> execute();
            $id=0;
            while($linha = $sql->fetch(PDO::FETCH_ASSOC)){ 
                $id=$linha["id"];   
                $razao_social=$linha["razao_social"];
               
                echo "<br>|  Id: ".$id."                           |";
                echo "| Razão Social: ".$razao_social." |";
        
               
            }

        ?> 
        <br>
        <hr>
     
        


<form method="Post" action="cliente2.php">
    Pesquise aqui o cliente pelo nome ou Razão Social
            <h3>Nome ou Razão social<input type="text" name="razao_social" size="200"></h3>
            <input type="submit" name="Consultar" value="Consultar">
        </form>
        
    </main>
    <footer>
        <br>
        <h2>Desenvolvido por Alexandre Biangaman Aleixo</h2>
    </footer>
    </div>
</body>
</html>
<?php
}else{
    header("location: index.html"); 
    $_SESSION["acessou"]=0;
}
?>