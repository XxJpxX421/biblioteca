<?php
require_once 'C:\xampp\htdocs\biblioteca\vendor\autoload.php';
require_once '../config/config.php';
require_once (DIRREQ . '/app/Controllers/LivroController.php');

$livroController = new LivroController($pdo);

if (isset($_POST['nome_l']) &&
    isset($_POST['ano']) &&
    isset($_POST['imagem']) &&
    isset($_POST['preco']))
{
    $nome_l = $_POST['nome_l'];
    $ano = $_POST['ano'];
    $imagem = $_POST['imagem'];
    $preco = $_POST['preco'];

        $livroController->criarLivro($nome_l, $ano, $imagem, $preco);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Livro</title>
    <link rel="stylesheet" type="text/css" href="public/css/livro.css">
</head>
<body>
    <form method="POST" action="processar_livro.php" enctype="multipart/form-data">
        <h2>Adicionar Livro</h2>
        <label for="nome_l">Nome do livro:</label>
        <input type="text" name="nome_l" placeholder="Nome do livro" required>
        
        <label for="ano">Ano do Livro:</label>
        <input type="number" name="ano" placeholder="Ano do Livro" required>
        
        <label for="imagem" class="file-upload-btn">
    <span class="upload-icon">&#8686;</span> Escolher Imagem
    <input type="file" name="imagem" id="imagem" accept="image/*" style="display: none;">
</label>
<div class="file-name" id="file-name"></div>
        <label for="preco">Preço:</label>
        <input type="number" name="preco" placeholder="Preço" required>
        
        <button class="botao" type="submit">Adicionar Livro</button>
    </form>
    <a class= "voltar" href="index.php">Voltar</a>
    <script>
    document.getElementById("imagem").addEventListener("change", function () {
        var fileName = this.value.split("\\").pop();
        document.getElementById("file-name").innerHTML = fileName;
    });
</script>
</body>
</html>


