<?php
require_once "../model/ClienteDAO.php";

class Controlador {
    private $clienteDAO;

    public function __construct() {
        $this->clienteDAO = new ClienteDAO();
    }

    public function executar($acao) {
        switch($acao) {
            case 'listar':
                $clientes = $this->clienteDAO->listar();
                include "../view/Listar.php";
                break;
            case 'gravar':
                if($_POST) {
                    $cliente = new Cliente(null, $_POST['nome'], $_POST['email']);
                    $this->clienteDAO->inserir($cliente);
                    header("Location: index.php?acao=listar");
                } else {
                    include "../view/Gravar.php";
                }
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
                    include "../view/Alterar.php";
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
