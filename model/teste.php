<?php
require_once "Banco.php";

$banco = new Banco();
if ($banco->conexao) {
    echo "Conexão com MariaDB via XAMPP OK!";
}
