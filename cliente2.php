<?php
ini_set('default_charset','UTF-8');
session_start();

if ($_SESSION['acessou']=="1"){
  
            require_once "conexao.php";
            $con = Connection::getConn();
            $razao_social=$_POST["razao_social"];  
        
            $sql = "select * from cliente where razao_social=:r"; 
            $sql = $con->prepare($sql);
            $sql->bindValue(":r",$razao_social);
            $sql -> execute();
            $id=0;
            while($linha = $sql->fetch(PDO::FETCH_ASSOC)){ 
                $id=$linha["id"];   
                $razao_social=$linha["razao_social"];
               
               
            }
         
           
           
              
           
            if($GLOBALS["id"] == 0)
            {
            // echo 'Ainda não existe registro cadastrado';
            //exit();
           
        
          
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
        Cliente não cadastrado, cadastre agora por favor!
        <form method="Post" action="cliente1.php">
        <h3>Razão Social do Cliente<input type="text" name="razao_social" size="180"  value="<?php echo $razao_social; ?>"></h3>
        <input type="submit" name="Cadatrar" value="Cadastrar">
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
 }
  else
  {
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
       Cadastre os clientes
        <?php
       
        echo "<brRazão Social: ".$razao_social."<br>";
      
        
         ?>
        <form method="Post" action="cliente3.php">
        Exclua com o botão excluir!
                <h3>Razão Social<input type="text" name="razao_social" size="200" value="<?php echo $razao_social;?>"></h3>
                <input type="text" name="id" value="<?php echo  $id;?>">; 
                <input type="Submit" name="Excluir" value="Excluir">

        </form>
        <form method="Post" action="cliente4.php">
                Utilize este formulário, caso queria alterar, não altere o id
                <input type="text" name="id" value="<?php echo  $id;?>">; 
                <h3>Razão social<input type="text" name="razao_social" size="200" value="<?php echo $razao_social;?>"></h3>
                <input type="submit" name="Cadatrar" value="Alterar">
               
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
   }
 }else{
     header("location: index.html"); 
     $_SESSION["acessou"]=0;
 }
 
 ?>