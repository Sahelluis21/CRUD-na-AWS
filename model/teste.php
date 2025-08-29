<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "ClienteDAO.php"; // caminho relativo correto para o seu projeto

$dao = new ClienteDAO();
$clientes = $dao->listar();

echo "<pre>";
var_dump($clientes);
echo "</pre>";
