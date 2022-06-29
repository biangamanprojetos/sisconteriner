<?php

session_start();
$login=$_POST["nome"];
$senha=$_POST["senha"];
$tipo=$_POST["tipo"];
if ($login=="admin" && $senha=="admin"){
    switch ($tipo) {
        case 0:
            session_start();
            $_SESSION['acessou']="1";
            header("location: conteiner.php"); 
            break;
        case 1:
            session_start();
            $_SESSION["acessou"]="1";
            header("location: cliente.php");
            break;
        case 2:
            session_start();
            $_SESSION["acessou"]="1";
            header("location: movimentacao.php");
            break;
    }
}else{
    ?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="gerenciar.css">
    <title>Controle de Conteiners</title>
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
            </ul>
        </nav>
        <main>
            <h1>Acesso Negado, insira as informações corretas por favor, ou entre em contato como setor de suporte!</h1>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
      
        </main>
        <footer>
            <br>
            <h2>Desenvolvido por Alexandre Biangaman Aleixo</h2>
        </footer>
    </div>
</body>
</html>

<?php
  
}

?>