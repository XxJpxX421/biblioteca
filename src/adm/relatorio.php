<?php 
include '../config/config.php'; 
require 'C:\xampp\htdocs\biblioteca\vendor\autoload.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/relatorio.css">
    <title>Baixar Relatório</title>
</head>
<body>
    
<?php
    include '../app/Views/login/listanobutton.php';
    include '../app/Views/emprestimos/listanobutton.php';
    include '../app/Views/historico/listanobutton.php';
?>
<button id="gerarPdf">Gerar PDF</button>
<a class= "voltar" href="index.php">Voltar</a>
<script>
    document.getElementById('gerarPdf').addEventListener('click', function() {
        // Execute uma solicitação AJAX para o script PHP que gera o PDF
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'gerar_pdf.php', true);
        xhr.send();
        
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // O PDF foi gerado e está disponível para download
                // Você pode redirecionar o usuário para o PDF gerado ou realizar outra ação necessária
                window.location.href = 'gerar_pdf.php';
            }
        };
    });
</script>

</body>
</html>