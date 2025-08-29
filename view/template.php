<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Clientes</title>
   <link rel="stylesheet" href="/CRUD-na-AWS/public/css/style.css">
 <!-- se tiver CSS -->
</head>
<body>
    <header>
        <h1>Gerenciamento de Clientes</h1>
        <nav>
            <a href="index.php?acao=listar">Listar</a>
            <a href="index.php?acao=formAdicionar">Adicionar Cliente</a>
        </nav>
    </header>

    <main>
        <?php include $viewFile; ?> 
        <!-- Aqui entram as views dinâmicas -->
    </main>

    <footer>
        <p>&copy; <?= date("Y"); ?> - Minha Aplicação</p>
    </footer>
</body>
</html>


