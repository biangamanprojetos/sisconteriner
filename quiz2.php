<?php
require_once "conexao.php";

 try
      { 
        $con = Connection::getConn();
        $sql = "select * from desafio as d join pergunta as p on (p.id=d.pergunta_id) join resposta as r on (r.id=d.resposta_id) join cliente as c on (c.id=d.pergunta_id)"; 
        $sql = $con->prepare($sql);
        $sql -> execute();
        $linha = $sql->fetch(PDO::FETCH_ASSOC);
        session_start();
        $email=$_SESSION['email'];
        $jogador=$_SESSION['jogador'];
        $pontos=$_SESSION['pontos'];
        $correta=$_SESSION['correta'];
        
       

$html = <<<HTML


<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="word, excel, photoshop, corel, indesign, pagamaker, logica, visual studio, php, html, css, outlook,access,powerpoint, dream,flash,fireworks">
    <meta name="author" content="Alexandre Biangaman Aleixo and Bootstrap contributors">
    <title>BiangamanProjetos.com.br</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/navbars/">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">
    <link href="estilo.css" rel="stylesheet">
    

    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="estilos.css" rel="stylesheet">
<link href="informatica.css" rel="stylesheet">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="navbar.css" rel="stylesheet">
    <link href="carousel.css" rel="stylesheet">
   
  </head>
<body>
<div id="topo">
  <img class="image" width="4000px" height="auto" src="topo.gif">
</div>

<header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary" aria-label="BiangamanProjetos">
    <div class="container-fluid">
      <a class="navbar-brand" href="home.php">Biangamanprojetos</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample01">
        <ul class="navbar-nav me-auto mb-2">
          <li class="nav-item active">
            <a class="nav-link" aria-current="page" href="home.php">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false">Tutoriais</a>
             <ul class="dropdown-menu" aria-labelledby="dropdown01">
              <li><a class="dropdown-item" href="tutoriais.php#office">Office</a></li>
              <li><a class="dropdown-item" href="tutoriais.php#design">Desginer</a></li>
              <li><a class="dropdown-item" href="tutoriais.php#design">Web</a></li>
              <li><a class="dropdown-item" href="tutoriais.php#lp">Programação</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown02" data-bs-toggle="dropdown" aria-expanded="false">Desafios</a>
            <ul class="dropdown-menu" aria-labelledby="dropdown02">
              <li><a class="dropdown-item" href="tutoriais.php#desafios">Jogos Inglês</a></li>
              <li><a class="dropdown-item" href="tutoriais.php#desafios">Jogos Informática</a></li>
            </ul>
          </li>
           <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-bs-toggle="dropdown" aria-expanded="false">Fale Conosco</a>
             <ul class="dropdown-menu" aria-labelledby="dropdown03">
              <li><a class="dropdown-item" href="contato.php">Email</a></li>
              <li><a class="dropdown-item" href="chat.php">Chat</a></li>
            </ul>
          </li>
        </ul>
        <form class="form-inline">
         <input class="form-inline" type="text" placeholder="Search" aria-label="Search">
         <button class="btn btn-outline-dark" type="submit">ok</button>
        </form>
      </div>
    </div>
  </nav>  
</header>
  <main>
  <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <ol class="carousel-indicators">
      <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
      <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
      <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#1E90FF"/></svg>

        <div class="container">
          <div class="carousel-caption text-start">
            <h1>Microsoft Office, Designer Gráfico e Web</h1>
            <p>Este site possui tutoriais para conhecer e aprender sobre os poderosos aplicativos para escritório da Microsoft, e suites da Core e Adobe, com conteúdo sobre HTML, Internet, CSS,etc..</p>
            <p><a class="btn btn-lg btn-primary" href="tutoriais.php#office" role="button">Leia mais</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#1E90FF"/></svg>

        <div class="container">
          <div class="carousel-caption">
            <h1>Linguagem de Programação</h1>
            <p>Este tutorial possui conteúdo para conhecer e aprender a programar.</p>
            <p><a class="btn btn-lg btn-primary" href="tutoriais.php#lp" role="button">Leia mais</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#1E90FF"/></svg>

        <div class="container">
          <div class="carousel-caption text-end">
            <h1>Desafios</h1>
            <p>Teste seus conhecimentos com nossos jogos de informática e inglês.</p>
            <p><a class="btn btn-lg btn-primary" href="tutoriais.php#desafios" role="button">Leia mais</a></p>
          </div>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </a>
  </div>
</main>
  <div id="conteudo">
    <p class="titulo">Seja bem vindo ao BiangamanProjetos.com.br</p>
    <h1 align="center">Teste seus conhecimentos em INFORMÁTICA</h1>
    
     
      
          <div class="xy">
       
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <p>
        <ul>
         <li><input type="radio" name="resposta1" value="<?php echo $correta[0];?>"/><?php echo $alternativas[0];?></li>
         <li><input type="radio" name="resposta2" value="<?php echo $correta[1];?>"/><?php echo $alternativas[1];?></li>
         <li><input type="radio" name="resposta3" value="<?php echo $correta[2];?>"/><?php echo $alternativas[2];?></li>
         <li><input type="radio" name="resposta4" value="<?php echo $correta[3];?>"/><?php echo $alternativas[3];?></li>
        </ul>
        </p>
        <p>
          <input type="submit" name="conferir" value="conferir" />
        </p>
        </form>
        </div>
       
      
      
    





  
   
  </div>
 <footer>
        <div class="navbar navbar-inverse navbar-fixed-bottom">
            <div class="container">
                <div id="clear"></div>
                <div id="rodape">Desenvolvido por Alexandre Biangaman Aleixo<br>
                Instrutor de Informática<br>
                Analista e Desenvolvedor de Sistemas</div>
</foother>    

<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>      
</body>
</html>
  HTML;  
echo "Seja bem vindo:{$linha['nm_jogador']} <br>";
        echo "Pergunta: {$linha['nm_pergunta']} <br>";
        
       


         
        
      
        $alternativas=array();
        $correta=array();
        while($linha = $sql->fetch(PDO::FETCH_ASSOC)){
            $alternativas[]=$linha['nm_resposta'];
            $correta[]=$linha['certa'];

        }
        $resposta1=0;
        $resposta2=0;
        $resposta3=0;
        $resposta4=0;
        if (isset($_POST['conferir']) || isset($_POST['resposta1']) || isset($_POST['resposta2']) || isset($_POST['resposta3']) || isset($_POST['resposta4']))
        {
          if (isset($_POST['resposta1'])){
            $resposta=$_POST['resposta1'];
          }elseif (isset($_POST['resposta2'])){
            $resposta=$_POST['resposta2'];
          }elseif (isset($_POST['resposta3']))  {
            $resposta=$_POST['resposta3'];
          }elseif (isset($_POST['resposta4'])){
            $resposta=$_POST['resposta4'];
          }
           
              
              $tamanho=sizeof($correta)-1;
             
             
              while ($tamanho>0)
               {
               
                if (!$correta[$tamanho]==$resposta)
                {
                   echo "você acertou!";

                   $tamanho=0;
                   $dom = new DOMDocument();
                   $dom->loadHTML($html);
                   $xpath = new DOMXPath($dom);
                   $nodes = $xpath->query("//div[@class='xy']");
                   foreach ($nodes as $node) {

                   $node.remove();
                  }
                    echo $dom->saveHTML(), PHP_EOL;
                   // header('Location: proxima.php');
                  
                 
                   
                  // echo "<a href="proxima.php">Próxima pergunta</a>";
                  
                }
                else
                {
                   
                   echo "Você Errou!";
                   $tamanho=0; 
                  // echo "<a href="proxima.php">Próxima pergunta</a>";
                }
               $tamanho--;
               }
         
           
        
        }
        else
        {
          $resposta1=0;
          $resposta2=0;
          $resposta3=0;
          $resposta4=0;
        }
       
        
         
       
          
          
         
           
           
          
        //var_dump($alternativas);
        //var_dump($correta);           
    }
   catch(Exception $e)
   {
               echo $e->getMessage();
   }

   
    ?>