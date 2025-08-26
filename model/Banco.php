<?php
class Banco {
    private $host = "localhost";
    private $dbname = "bancocrud";
    private $usuario = "ec2-user@ip-172-31-37-112";
    private $senha = "ifsp";
    public $conexao;

    public function __construct() {
        try {
            $this->conexao = new PDO(
                "mysql:host={$this->host};dbname={$this->dbname};charset=utf8",
                $this->usuario,
                $this->senha
            );
            $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erro de conexão: " . $e->getMessage());
        }
    }
}
