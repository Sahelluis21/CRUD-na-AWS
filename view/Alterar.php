<h2>Alterar Cliente</h2>
<form method="post" action="index.php?acao=atualizar">
    Nome: <input type="text" name="nome" value="<?= $cliente->getNome() ?>" required><br><br>
    Email: <input type="email" name="email" value="<?= $cliente->getEmail() ?>" required><br><br>
    <button type="submit">Alterar</button>
</form>
<a href="index.php?acao=listar">Voltar</a>
