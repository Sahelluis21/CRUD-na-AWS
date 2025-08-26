<?php
require_once "controller/Controlador.php";

$acao = isset($_GET['acao']) ? $_GET['acao'] : 'listar';
$controlador = new Controlador();
$controlador->executar($acao);
