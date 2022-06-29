<?php
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
        <form method="Post" action="cliente2.php">
           <h3>Razão Social do Cliente<input type="text" name="razao_social" size="180" placeholder="Digite o nome ou Razão Social do Cliente"></h3>
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