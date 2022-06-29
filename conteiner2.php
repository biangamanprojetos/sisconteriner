<?php
ini_set('default_charset','UTF-8');
session_start();

if ($_SESSION['acessou']=="1"){
  
            require_once "conexao.php";
            $con = Connection::getConn();
            $numeroconteiner=$_POST["numeroconteiner"];  
        
            $sql = "select * from conteiner where numero_conteiner=:n"; 
            $sql = $con->prepare($sql);
            $sql->bindValue(":n",$numeroconteiner);
            $sql -> execute();
            $id=0;
            while($linha = $sql->fetch(PDO::FETCH_ASSOC)){ 
                $id=$linha["id"];   
                $num_conteiner=$linha["numero_conteiner"];
                $tipo=$linha["tipo"];
                $status1=$linha["status1"];
                $categoria=$linha["categoria"];
               
               
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
        Conteiner não cadastrado, cadastre agora por favor!
        <form method="Post" action="cadconteiner.php">
                <h3>Numero do contêiner<input type="text" name="numeroconteiner" size="200" value="<?php echo $numeroconteiner;?>"></h3>
                <h3>Selecione o tipo:</h3>
                <select name="tipo">
                    <option value="1">20</option>
                    <option value="2">40</option>
                </select>
                <h3>Selecione o Status:</h3>
                <select name="status1">
                    <option value="1">Cheio</option>
                    <option value="2">Vazio</option>
                </select>
                <h3>Selecione a Categoria:</h3>
                <select name="categoria">
                    <option value="1">Importação</option>
                    <option value="2">Exportação</option>
                </select>
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
        Este número está cadastrado com essas especificações!
        <?php
       
        echo "<br>Número do Conteiner: ".$numeroconteiner."<br>";
        echo "Tipo: ".$tipo."<br>";
        echo "Status: ".$status1."<br>";
        echo "Categoria: ".$categoria."<br>";
        
         ?>
        <form method="Post" action="cadconteiner3.php">
        Exclua com o botão excluir!
                <h3>Numero do contêiner<input type="text" name="numeroconteiner" size="200" value="<?php echo $numeroconteiner;?>"></h3>
                <input type="Submit" name="Excluir" value="Excluir">

        </form>
        <form method="Post" action="cadconteiner2.php">
                Utilize este formulário, caso queria alterar
                <h3>Numero do contêiner<input type="text" name="numeroconteiner" size="200" value="<?php echo $numeroconteiner;?>"></h3>
                <h3>Selecione o tipo:</h3>
                <select name="tipo">
                    <option value="1">20</option>
                    <option value="2">40</option>
                </select>
                <h3>Selecione o Status:</h3>
                <select name="status1">
                    <option value="1">Cheio</option>
                    <option value="2">Vazio</option>
                </select>
                <h3>Selecione a Categoria:</h3>
                <select name="categoria">
                    <option value="1">Importação</option>
                    <option value="2">Exportação</option>
                </select>
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