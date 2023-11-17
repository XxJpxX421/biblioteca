<?php
class LoginModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function criarLogin($nome, $email, $senha) {
        if ($this->nomeExists($nome)) {
            return false;
        }

        // If email does not exist, proceed with the insertion
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nome, $email, $senha]);
        
        // Return true to indicate successful registration
        return true;
    }

    public function nomeExists($nome) {
        $sql = "SELECT COUNT(*) FROM usuarios WHERE nome = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nome]);

        $count = $stmt->fetchColumn();

        return $count > 0;
    }

    public function listarLogins() {
        $sql = "SELECT * FROM usuarios";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function atualizarLogin($id, $nome, $email, $senha) {
        $sql = "UPDATE usuarios SET nome = ?, email = ?, senha = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nome, $email, $senha, $id]);
    }
    
    public function excluirLogin($id) {
        $sql = "DELETE FROM usuarios WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
    }
}
?>