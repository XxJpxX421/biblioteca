<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['nome'])) {
    header('Location: login.php');
    exit();
}

// Verifica se o formulário foi enviado e se a ação é excluir
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao']) && $_POST['acao'] === 'excluir') {
    // Verifica se existe um nome de arquivo associado ao usuário
    if (isset($_SESSION['nome'])) {
        $nome_arquivo = $_SESSION['nome'];
        
        // Coloque aqui o código para excluir a imagem, considerando o nome dinâmico
        if (file_exists("uploads/$nome_arquivo")) {
            unlink("uploads/$nome_arquivo");
            echo "Imagem excluída com sucesso!";
            header("Location:index.php");
        } else {
            echo "A imagem não existe ou já foi excluída.";
            header("Location:index.php");
        }
    } else {
        echo "Nenhuma imagem associada ao usuário.";
        header("Location:index.php");
    }
} else {
    echo "Ação inválida.";
    header("Location:index.php");
}
?>
