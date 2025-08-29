<?php
require_once __DIR__ . "/../model/ClienteDAO.php";
require_once __DIR__ . "/../model/Cliente.php";

class Controlador {
    private $clienteDAO;

    public function __construct() {
        $this->clienteDAO = new ClienteDAO();
    }

    public function executar($acao) {
        switch($acao) {
            case 'listar':
                $clientes = $this->clienteDAO->listar();
                include __DIR__ . "/../view/Listar.php";
                break;

            case 'gravar':
                if($_POST) {
                    $cliente = new Cliente(null, $_POST['nome'], $_POST['email']);
                    $this->clienteDAO->inserir($cliente);
                    header("Location: index.php?acao=listar");
                } else {
                    include __DIR__ . "/../view/Gravar.php";
                }
                break;
            case 'salvar':
                $nome  = $_POST['nome'] ?? '';
                $email = $_POST['email'] ?? '';

                if ($nome && $email) {
                    $cliente = new Cliente(null, $nome, $email);
                    $this->clienteDAO->inserir($cliente);
                    echo "Cliente adicionado com sucesso!";
                } else {
                    echo "Preencha todos os campos!";
                }

                echo '<br><a href="index.php?acao=listar">Voltar à lista</a>';
                break;
    
            case 'alterar':
                $id = $_GET['id'];
                $cliente = $this->clienteDAO->buscarPorId($id);
                if($_POST) {
                    $cliente->setNome($_POST['nome']);
                    $cliente->setEmail($_POST['email']);
                    $this->clienteDAO->atualizar($cliente);
                    header("Location: index.php?acao=listar");
                } else {
                    include __DIR__ . "/../view/Alterar.php";
                }
                break;

            case 'remover':
                $id = $_GET['id'];
                $this->clienteDAO->remover($id);
                header("Location: index.php?acao=listar");
                break;

            default:
                header("Location: index.php?acao=listar");
        }
    }
}
