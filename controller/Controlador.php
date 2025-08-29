<?php
require_once __DIR__ . "/../model/ClienteDAO.php";
require_once __DIR__ . "/../model/Cliente.php";

class Controlador {
    private $clienteDAO;

    public function __construct() {
        $this->clienteDAO = new ClienteDAO();
    }

    public function executar($acao) {
        switch ($acao) {
            case 'listar':
                $clientes = $this->clienteDAO->listar();
                $viewFile = "view/Listar.php";
                include "view/template.php";
                break;

            case 'formAdicionar':
                $viewFile = "view/Gravar.php";
                include "view/template.php";
                break;

            case 'gravar':
                $cliente = new Cliente(null, $_POST['nome'], $_POST['email']);
                $this->clienteDAO->inserir($cliente);
                header("Location: index.php?acao=listar");
                break;

            case 'remover':
                $this->clienteDAO->remover($_GET['id']);
                header("Location: index.php?acao=listar");
                break;

            case 'formAlterar':
                $cliente = $this->clienteDAO->buscarPorId($_GET['id']);
                $viewFile = "view/Alterar.php";
                include "view/template.php";
                break;

            case 'atualizar':
                $cliente = new Cliente($_POST['id'], $_POST['nome'], $_POST['email']);
                $this->clienteDAO->atualizar($cliente);
                header("Location: index.php?acao=listar");
                break;

            default:
                $clientes = $this->clienteDAO->listar();
                $viewFile = "view/Listar.php";
                include "view/template.php";
                break;
        }
    }
}
