<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Clientes</title>
</head>
<body>
    <h1>Lista de Clientes</h1>
    <a href="index.php?acao=gravar">Adicionar Cliente</a>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>

        <?php if (!empty($clientes)): ?>
            <?php foreach($clientes as $cliente): ?>
                <tr>
                    <td><?= $cliente->getId() ?></td>
                    <td><?= $cliente->getNome() ?></td>
                    <td><?= $cliente->getEmail() ?></td>
                    <td>
                        <a href="index.php?acao=alterar&id=<?= $cliente->getId() ?>">Alterar</a> |
                        <a href="index.php?acao=remover&id=<?= $cliente->getId() ?>" onclick="return confirm('Confirma exclusão?')">Remover</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">Nenhum cliente encontrado</td>
            </tr>
        <?php endif; ?>
    </table>
</body>
</html>
