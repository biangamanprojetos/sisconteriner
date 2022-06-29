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
        Movimentações Realizadas por Cliente:

        <?php
            $razao_social=$_POST["razao_social"];
            
            require_once "conexao.php";
            $con = Connection::getConn();

            $sql = "SELECT * FROM `movimentacao` as m join cliente as c on (c.id=m.cliente_id) where c.razao_social=r:"; 
            $sql = $con->prepare($sql);
            $sql->bindValue(":r",$razao_social);
            $sql -> execute();
            $id=0;
            while($linha = $sql->fetch(PDO::FETCH_ASSOC)){ 
                $id_cliente=$linha["cliente_id"]; 
                $id_conteiner=$linha["conteiner_id"];  
                $id_movimentacao=$linha["id"];
                $tipo_movimentacao=$linha["tipo_movimentacao"];
                $data_hora_inicio=$linha["data_hora_inicio"];
                $data_hora_fim=$linha["data_hora_fim"];
                $razao_social=$linha["razao_social"];
                echo "<br>|  Id do cliente: ".$id_cliente."                           |";
                echo "|  Id do conteiner : ".$id_conteiner."                          |";
                echo "|  Id da movimentação : ".$id_movimentacao."                    |";
                echo "|  Tipo Movimentação  : ".$tipo_movimentacao."                  |";
                echo "| Data e hora de Inicio:".$data_hora_inicio."                   |";
                echo "| Data e hora de Fim:".$data_hora_fim."                         |";
                echo "| Razão social:".$razao_social."                                 |";
   

            }


?>
        <form method="Post" action="relatoriomovimentacaocliente.php">
            Digite o a razão social do Cliente para procurar movimentações por cliente
            <input type="text" name="razao_social">
            <input type="submit" name="consultar" value="Consultar por Cliente">
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