<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . "/../model/Banco.php";
require_once __DIR__ . "/../model/Cliente.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    try {
        $banco = new Banco();

        $sql = "INSERT INTO clientes (nome, email) VALUES (:nome, :email)";
        $stmt = $banco->conexao->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        echo "Cliente adicionado com sucesso!";
    } catch (PDOException $e) {
        echo "Erro ao adicionar cliente: " . $e->getMessage();
    }
}
?>

<h2>Adicionar Cliente</h2>
<form method="post" action="">
    Nome: <input type="text" name="nome" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    <button type="submit">Gravar</button>
</form>
<a href="index.php?acao=listar">Voltar</a>
