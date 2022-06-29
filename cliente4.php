<?php

ini_set('default_charset','UTF-8');

session_start();

if ($_SESSION['acessou']=="1"){

 try{
    
    require_once "conexao.php";
    $con = Connection::getConn();
    $razao_social=$_POST["razao_social"];  
    $id=$_POST["id"];
   


 



    if(!empty($razao_social) && !empty($id)){

     
    $sql = $con -> prepare("UPDATE  cliente SET razao_social=:r WHERE id=:i");
      $sql->bindValue(":r","$razao_social");
      $sql->bindValue(":i","$id");
    
      

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
                Clientes alterado com sucesso"
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
             echo "alteração não executada com sucesso";
            }
        }else
        {
            echo "preencha as informações por favor";
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