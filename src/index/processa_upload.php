<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se o arquivo foi enviado sem erros
    if (isset($_FILES["imagem"]) && $_FILES["imagem"]["error"] == 0) {
        // Obtém o nome do usuário (substitua 'nome_do_usuario' pela variável real)
        $nome_usuario = $_SESSION['nome']; // Substitua 'nome_do_usuario' pela variável real

        // Limpa o nome do usuário removendo espaços e caracteres especiais
        $nome_usuario_limpo = preg_replace("/[^a-zA-Z0-9]+/", "", $nome_usuario);
        
        // Cria um nome único para a imagem usando o nome do usuário
        $nome_arquivo_base = $nome_usuario_limpo . "_" . uniqid();
        $nome_arquivo_completo = $nome_arquivo_base . "_" . $_FILES["imagem"]["name"];

        // Verifica se o arquivo com o mesmo nome já existe
        $contagem = 1;
        while (file_exists("uploads/" . $nome_arquivo_completo)) {
            $nome_arquivo_completo = $nome_arquivo_base . "_" . $contagem . "_" . $_FILES["imagem"]["name"];
            $contagem++;
        }

        $nome_temporario = $_FILES["imagem"]["tmp_name"];

        // Move o arquivo para o diretório desejado com o nome único
        move_uploaded_file($nome_temporario, "uploads/" . $nome_arquivo_completo);

        
        // Associa o nome do arquivo ao usuário na sessão
        $_SESSION['nome_arquivo'] = $nome_arquivo_completo;

        // Redireciona para a página que exibirá apenas a imagem enviada
        header("Location: index.php");
        exit();
    } else {
        echo "Erro no upload da imagem.";
    }
}
?>
