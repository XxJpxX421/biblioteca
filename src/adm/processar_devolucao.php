<?php
session_start();
include '../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se o usuário da sessão é um administrador (substitua 'tipo' pelo nome correto da sua coluna)

    $usuarioId = $_POST['usuarioId']; // Recupera o ID do usuário selecionado

    // Marca todos os empréstimos do usuário selecionado como "devolvido"
    $sqlDevolverLivros = "UPDATE emprestimos SET status = 'devolvido' WHERE id_usuario = ? AND status = 'em aberto'";
    $stmtDevolverLivros = $pdo->prepare($sqlDevolverLivros);
    $stmtDevolverLivros->execute([$usuarioId]);

    header("Location: devolucao.php");
} else {
    echo "Acesso inválido.";
}
?>
