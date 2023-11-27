<?php require_once 'C:\xampp\htdocs\biblioteca\src\config\config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../adm/public/css/lista.css">
    <title>Histórico de Empréstimos</title>
</head>
<body class="listar">
    <div class="container3">
    <h1>Histórico de Empréstimos</h1>
    
<?php
$stmt = $pdo->query('SELECT * FROM historico');
$historico = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($historico) == 0) {
    echo '<p>Nenhum histórico realizado</p>';
} else {
    echo '<table border="1">';
    echo '<thead><tr><th>ID do Usuário</th><th>Dia de Empréstimo</th><th>Dia de Devolução</th></tr></thead>';
    echo '<tbody>';

    foreach ($historico as $historicos) {
        echo '<tr>';
        echo '<td>' . $historicos['id_usuario'] . '</td>';
        echo '<td>' . date('d/m/Y', strtotime($historicos['data_registro'])) . '</td>';
        echo '<td>' . date('d/m/Y', strtotime($historicos['data_devolucao'])) . '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
}
?>
<a class= "voltar" href="../../../adm/index.php">Voltar</a>
</div>
</body>
</html>