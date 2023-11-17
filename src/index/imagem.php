
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Upload de Imagem</title>
</head>
<body>

    <h2>Envie sua imagem</h2>

    <form action="processa_upload.php" method="POST" enctype="multipart/form-data">
        <label for="imagem">Escolha sua imagem:</label>
        <input type="file" name="imagem" id="imagem" accept="image/*" required>

        <button type="submit">Enviar</button>
    </form>
    <br><br>
<a href="excluirp.php">Excluir Imagem</a>
</form>
</body>
</html>