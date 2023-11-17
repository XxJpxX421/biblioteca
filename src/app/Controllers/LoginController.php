<?php
require_once 'C:\xampp\htdocs\biblioteca\vendor\autoload.php';
require_once '../app/Models/LoginModel.php';

class LoginController {
    private $loginModel;

    public function __construct($pdo) {
        $this->loginModel = new LoginModel($pdo);
    }

    public function criarLogin($nome, $email, $senha) {
        if ($this->loginModel->nomeExists($nome)) {
        $this->loginModel->criarLogin($nome, $email, $senha);
        $_SESSION['nome_exists'] = true;
        return;
        }
        $this->loginModel->criarLogin($nome, $email, $senha);
    }

    public function nomeExists($nome) {
        return $this->loginModel->nomeExists($nome);
    }

    public function listarLogins() {
        return $this->loginModel->listarLogins();
    }

    public function exibirListaLogins() {
        $logins = $this->loginModel->listarLogins();
        include 'app\Views\login\lista.php';
    }

    public function atualizarLogin($id,  $nome, $email, $senha) {
        $this->loginModel->atualizarLogin($id,  $nome, $email, $senha);
    }

    public function excluirLogin ($id) {
        $this->loginModel->excluirLogin($id);
    }
}

?>