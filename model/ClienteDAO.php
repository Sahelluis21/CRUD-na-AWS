<?php
require_once "Banco.php";
require_once "Cliente.php";

class ClienteDAO {
    private $conexao;

    public function __construct() {
        $this->conexao = (new Banco())->conexao;
    }

    public function listar() {
        $stmt = $this->conexao->prepare("SELECT * FROM clientes");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id) {
        $stmt = $this->conexao->prepare("SELECT * FROM clientes WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $dados = $stmt->fetch(PDO::FETCH_ASSOC);
        if($dados) {
            return new Cliente($dados['id'], $dados['nome'], $dados['email']);
        }
        return null;
    }

    public function inserir(Cliente $cliente) {
        $stmt = $this->conexao->prepare("INSERT INTO clientes (nome, email) VALUES (:nome, :email)");
        $stmt->bindValue(':nome', $cliente->getNome());
        $stmt->bindValue(':email', $cliente->getEmail());
        return $stmt->execute();
    }

    public function atualizar(Cliente $cliente) {
        $stmt = $this->conexao->prepare("UPDATE clientes SET nome = :nome, email = :email WHERE id = :id");
        $stmt->bindValue(':nome', $cliente->getNome());
        $stmt->bindValue(':email', $cliente->getEmail());
        $stmt->bindValue(':id', $cliente->getId(), PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function remover($id) {
        $stmt = $this->conexao->prepare("DELETE FROM clientes WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
