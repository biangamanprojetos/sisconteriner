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
            </ul>
        </nav>
        <main>
        <h1>Bem vindo ao Sistema de Controle de Conteiners</h1>
        <h2>Identifique-se para mais opções:</h2>
        <form method="Post" action="relatorios2.php">
           <h3>Login:<input type="text" name="nome" placeholder="Digite seu login"></h3>
           <h3>Senha:<input type="password" name="senha" placeholder="Digite a senha"></h3>
           <h3>O que seja cadastrar:</h3>
           <select name="tipo">
                <option value="0">Conteiners</option>
                <option value="1">Clientes</option>
                <option value="2">Movimentações</option>
            </select>
            <input type="submit" name="Acessar" value="Acessar">
        </form>
    </main>
    <footer>
        <br>
        <h2>Desenvolvido por Alexandre Biangaman Aleixo</h2>
    </footer>
    </div>
</body>
</html>
