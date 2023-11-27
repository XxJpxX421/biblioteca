<?php
require 'C:\xampp\htdocs\biblioteca\vendor\autoload.php';
use Dompdf\Dompdf;

ob_start(); // Inicia o buffer de saída
include '../app/Views/login/listanobutton.php';
include '../app/Views/emprestimos/listanobutton.php';
include '../app/Views/historico/listanobutton.php';
$html = ob_get_clean(); // Obtém o conteúdo do buffer e limpa o buffer

// Inclua os estilos CSS no HTML
$html = '<link rel="stylesheet" href="public/css/relatorio.css">' . $html;

$dompdf = new Dompdf();
$dompdf->loadHtml($html);

// (Opcional) Configure o tamanho e orientação do papel
$dompdf->setPaper('A4', 'portrait');

// Renderiza o HTML como PDF
$dompdf->render();

// Define o nome do arquivo PDF
$nomeArquivo = 'relatorio';

// Envia o PDF gerado para o navegador com o nome do arquivo
$dompdf->stream($nomeArquivo, array('Attachment' => 1));
?>
