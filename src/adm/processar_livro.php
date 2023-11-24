<?php
require_once 'C:\xampp\htdocs\biblioteca\vendor\autoload.php';
require_once '../config/config.php';
require_once (DIRREQ . '/app/Controllers/LivroController.php');

$livroController = new LivroController($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (
        isset($_POST['nome_l']) &&
        isset($_POST['ano']) &&
        isset($_FILES['imagem']) &&
        isset($_POST['preco'])
    ) {
        $nome_l = $_POST['nome_l'];
        $ano = $_POST['ano'];
        $preco = $_POST['preco'];

        // Processar o upload da imagem
        $imagem = $_FILES['imagem']['name']; // Nome do arquivo
        $imagem_temp = $_FILES['imagem']['tmp_name']; // Caminho temporário do arquivo

        // Mover o arquivo para um diretório específico (você pode ajustar o caminho conforme necessário)
        $caminho_destino = '../index/public/assets/livros/';
        move_uploaded_file($imagem_temp, $caminho_destino . $imagem);

        // Chamar o método para criar o livro no banco de dados
        $livroController->criarLivro($nome_l, $ano, $imagem, $preco);
    }
    header('Location: livro.php');
}
?>
