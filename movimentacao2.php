<?php

ini_set('default_charset','UTF-8');

session_start();

if ($_SESSION['acessou']=="1"){
try{


    require_once "conexao.php";
    $con = Connection::getConn();
    
    $id_conteiner=$_POST["id_conteiner"];  
    $id_cliente=$_POST["id_cliente"];
    $tipo=$_POST["tipo_movimentacao"];
    $tipo1=0;
    switch ($tipo) {
        case 1:
            $tipo1="Embarque";
            break;
        case 2:
            $tipo1="Descarga";
            break;
        case 3:
            $tipo1="Gate in";
            break;
        case 4:
            $tipo1="Gate out";
            break;
        case 5:
            $tipo1="Reposionamento";
            break;
        case 6:
            $tipo1="Pesagem";
            break;
        case 7:
            $tipo1="Scanner";
            break;
    }
    $data_hora_inicio=$_POST["data_inicio"]." ".$_POST["hora_inicio"];
    $data_hora_final=$_POST["data_fim"]." ".$_POST["hora_fim"];
    $id_movimentacao=$_POST["id_movimentacao"];



     
    $operacao=$_POST["operacao"];

    switch ($operacao) {
        case 1:
           // inicio inclusao
           $sql = $con -> prepare("INSERT INTO  movimentacao (cliente_id,conteiner_id,tipo_movimentacao,data_hora_inicio,data_hora_fim) VALUES (:ci,:co,:t, :dhi, :dhf)");
           $sql->bindValue(":ci","$id_cliente");
           $sql->bindValue(":co","$id_conteiner");
           $sql->bindValue(":t","$tipo1");
           $sql->bindValue(":dhi","$data_hora_inicio");
           $sql->bindValue(":dhf","$data_hora_final");
           
     
          if ($sql->execute()){
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
                     Movimentação cadatrada com sucesso"
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
                  echo "cadastro não executado com sucesso";
                 }
           

           // fim inclusao
            break;
        case 2:
          //inicio alteracao

          $sql = $con -> prepare("UPDATE  movimentacao SET cliente_id=:ci,conteiner_id=:co,tipo_movimentacao=:t,data_hora_inicio=:dhi,data_hora_fim=:dhf where id=:i");
          $sql->bindValue(":ci","$id_cliente");
          $sql->bindValue(":co","$id_conteiner");
          $sql->bindValue(":t","$tipo1");
          $sql->bindValue(":dhi","$data_hora_inicio");
          $sql->bindValue(":dhf","$data_hora_final");
          $sql->bindValue(":i","$id_movimentacao");
          
    
         if ($sql->execute()){
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
                    Movimentação Alterada com sucesso"
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
                 echo "Alteração não executado com sucesso";
                }
      

          //fim alteracao
            break;
      
            }
       
        }
        catch(Exception $e)
        {
          echo $e->getMessage();
        }

} 
else{
    header("location: index.html"); 
    $_SESSION["acessou"]=0;
}
?>