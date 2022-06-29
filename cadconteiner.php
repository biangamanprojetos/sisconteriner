<?php

ini_set('default_charset','UTF-8');

session_start();

if ($_SESSION['acessou']=="1"){

 try{
    
    require_once "conexao.php";
    $con = Connection::getConn();
    $numeroconteiner=$_POST["numeroconteiner"];  
    $tipo=$_POST["tipo"];
    $tipo1=0;
    if ($tipo=="1"){
        $tipo1="20";
    }else{
        $tipo1="40";
    }
    $status2="";
    $status1=$_POST["status1"];
    if ($status1=="1"){
        $status2="Cheio";
    }else{
        $status2="Vazio";
    }
    $categoria1="";
    $categoria=$_POST["categoria"];
    if ($categoria=="1"){
        $categoria1="Importação";
    }else{
        $categoria1="Exportação";
    }


 
  

    if(!empty($numeroconteiner) && !empty($tipo1) && !empty($status2) && !empty($categoria1)){

     
    $sql = $con -> prepare("INSERT INTO conteiner (numero_conteiner,tipo,status1,categoria) VALUES (:n,:t, :s, :c)");
      $sql->bindValue(":n","$numeroconteiner");
      $sql->bindValue(":t","$tipo1");
      $sql->bindValue(":s","$status2");
      $sql->bindValue(":c","$categoria1");
      

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
                Conteiner cadastrado com sucesso"
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