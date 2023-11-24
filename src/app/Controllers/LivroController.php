<?php
require_once 'C:\xampp\htdocs\biblioteca\vendor\autoload.php';
require_once '../app/Models/LivroModel.php';

class LivroController {
    private $livroModel;

    public function __construct($pdo) {
        $this->livroModel = new LivroModel($pdo);
    }

    public function criarLivro($nome_l, $ano, $imagem, $preco) {
        $this->livroModel->criarLivro($nome_l, $ano, $imagem, $preco);
    }

    public function listarLivros() {
        return $this->livroModel->listarLivros();
    }

    public function exibirListaLivros() {
        $livros = $this->livroModel->listarLivros();
        include 'app\Views\livro\lista.php';
    }

    public function atualizarLivro($id, $nome_l, $ano, $imagem, $preco) {
        $this->livroModel->atualizarLivro($id, $nome_l, $ano, $imagem, $preco);
    }

    public function excluirLivro ($id) {
        $this->livroModel->excluirLivro($id);
    }
}

?>