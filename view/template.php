<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Minha Aplicação</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <header>
        <h1>📂 Sistema de Clientes</h1>
        <nav>
            <a href="index.php?acao=adicionar">Adicionar Cliente</a>
        </nav>
    </header>

    <main>
        <?php include $pagina; ?> 
        <!-- aqui entra a view de verdade -->
    </main>

    <footer>
        <p>© <?= date('Y') ?> - Meu Sistema MVC</p>
    </footer>
</body>
</html>
