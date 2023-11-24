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
</head>
<body>
    <form method="POST" action="processar_livro.php" enctype="multipart/form-data">
        <input type="text" name="nome_l" placeholder="Nome do livro" required>
        <input type="number" name="ano" placeholder="Ano do Livro" required>
        <input type="file" name="imagem" accept="image/*" required>
        <input type="number" name="preco" placeholder="Preço" required>
        <button class="botao" type="submit">Adicionar Livro</button>
    </form>
</body>
</html>

