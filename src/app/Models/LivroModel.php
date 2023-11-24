<?php
class LivroModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function criarLivro($nome_l, $ano, $imagem, $preco) {

        $sql = "INSERT INTO livros (nome_l, ano, imagem, preco) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nome_l, $ano, $imagem, $preco]);
        

    }

    public function listarLivros() {
        $sql = "SELECT * FROM livros";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function atualizarLivro($id, $nome_l, $ano, $imagem, $preco) {
        $sql = "UPDATE livros SET nome_l = ?, ano = ?, imagem = ?, preco = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nome_l, $ano, $imagem, $preco, $id]);
    }
    
    public function excluirLivro($id) {
        $sql = "DELETE FROM livros WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
    }
}
?>