<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


class Cliente {
    private $id;
    private $nome;
    private $email;

    public function __construct($id = null, $nome = null, $email = null) {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
    }

    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }

    public function getNome() { return $this->nome; }
    public function setNome($nome) { $this->nome = $nome; }

    public function getEmail() { return $this->email; }
    public function setEmail($email) { $this->email = $email; }
}
