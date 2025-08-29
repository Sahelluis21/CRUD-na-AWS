<h2>Lista de Clientes</h2>
<table border="1">
    <tr>
        <th>ID</th><th>Nome</th><th>Email</th><th>Ações</th>
    </tr>
    <?php foreach ($clientes as $c): ?>
    <tr>
        <td><?= $c->getId() ?></td>
        <td><?= $c->getNome() ?></td>
        <td><?= $c->getEmail() ?></td>
        <td>
            <a href="index.php?acao=formAlterar&id=<?= $c->getId() ?>">Editar</a>
            <a href="index.php?acao=remover&id=<?= $c->getId() ?>" 
               onclick="return confirm('Tem certeza que deseja remover?')">Excluir</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
