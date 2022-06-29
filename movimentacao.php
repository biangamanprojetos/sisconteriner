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
        Conteiners Cadastrados:
        <?php
            
            require_once "conexao.php";
            $con = Connection::getConn();
        
            $sql = "select * from conteiner"; 
            $sql = $con->prepare($sql);
           
            $sql -> execute();
            $id=0;
            while($linha = $sql->fetch(PDO::FETCH_ASSOC)){ 
                $id=$linha["id"];   
                $numeroconteiner=$linha["numero_conteiner"];
                $tipo=$linha["tipo"];
                $status1=$linha["status1"];
                $categoria=$linha["categoria"];
                echo "<br>|  Id: ".$id."                           |";
                echo "|  Número do Conteiner: ".$numeroconteiner." |";
                echo "|  Tipo: ".$tipo."                           |";
                echo "|  Status: ".$status1."                      |";
                echo "|  Categoria: ".$categoria."                 |";
               
            }

        ?> 
        <br>
        <hr>
        Clientes Cadastrados:

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
                echo "|  Razão Social: ".$razao_social." |";
               
               
   
            }


        ?>
        <br>
        <hr>
        Movimentações Realizadas:

        <?php

            
            require_once "conexao.php";
            $con = Connection::getConn();

            $sql = "select * from movimentacao"; 
            $sql = $con->prepare($sql);
            $sql -> execute();
            $id=0;
            while($linha = $sql->fetch(PDO::FETCH_ASSOC)){ 
                $id_cliente=$linha["cliente_id"]; 
                $id_conteiner=$linha["conteiner_id"];  
                $id_movimentacao=$linha["id"];
                $tipo_movimentacao=$linha["tipo_movimentacao"];
                $data_hora_inicio=$linha["data_hora_inicio"];
                $data_hora_fim=$linha["data_hora_fim"];
                echo "<br>|  Id do cliente: ".$id_cliente."                           |";
                echo "|  Id do conteiner : ".$id_conteiner."                          |";
                echo "|  Id da movimentação : ".$id_movimentacao."                    |";
                echo "|  Tipo Movimentação  : ".$tipo_movimentacao."                  |";
                echo "| Data e hora de Inicio:".$data_hora_inicio."                   |";
                echo "| Data e hora de Fim:".$data_hora_fim."                         |";
   
   

            }


?>
        <form method="Post" action="movimentacao3.php">
            Digite o id da movimentação e utilize o botão excluir para exclusão da movimentação ja existente
            <input type="text" name="id_movimentacao">
            <input type="submit" name="excluir" value="Excluir">
        </form>

        <form method="Post" action="movimentacao2.php">
        Preencha os campos abaixo, selecione o tipo de operação, ou seja, se deseja cadastrar ou apenas alterar uma movimentação já exisente e pressione o botão Operaçao 
        <h3>Digite o id do conteiner:</h3>
        <input type="text" name="id_conteiner">
        <h3>Digite o id do cliente:</h3>
        <input type="text" name="id_cliente">
        <h3>Selecione o tipo de movimentação:</h3>
           <select name="tipo_movimentacao">
                <option value="1">Embarque</option>
                <option value="2">Descarga</option>
                <option value="3">Gate in</option>
                <option value="4">Gate out</option>
                <option value="5">Reposicionamento</option>
                <option value="6">Pesagem</option>
                <option value="7">Scanner</option>
            </select>
            <h3>Data e Hora do Início<input type="date" name="data_inicio"><input type="time" name="hora_inicio"></h3>
            <h3>Data e Hora do Fim<input type="date" name="data_fim"><input type="time" name="hora_fim"></h3>  
            <br>
            Se já existe alguma movimentação listada acima digite o id nessa caixa, caixa usada apenas para alteração de movimentação..
           <input type="text" name="id_movimentacao">
           <select name="operacao">
                <option value="1">Cadastro</option>
                <option value="2">Alteração</option>
            </select>
           <input type="submit" name="Cadastrar" value="Operação">
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