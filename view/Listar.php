<h2>Lista de Clientes</h2>
<a href="index.php?acao=gravar">Adicionar Cliente</a>
<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Ações</th>
    </tr>
    <?php foreach($clientes as $c): ?>
        <tr>
            <td><?= $c['id'] ?></td>
            <td><?= $c['nome'] ?></td>
            <td><?= $c['email'] ?></td>
            <td>
                <a href="index.php?acao=alterar&id=<?= $c['id'] ?>">Alterar</a> |
                <a href="index.php?acao=remover&id=<?= $c['id'] ?>" onclick="return confirm('Confirma exclusão?')">Remover</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
