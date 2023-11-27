<?php require_once 'C:\xampp\htdocs\biblioteca\src\config\config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../adm/public/css/lista.css">
    <title>Lista de Empréstimos</title>
</head>
<body class="listar">
    <div class="container3">
    <h1>Lista de Empréstimos</h1>
    
<?php
$stmt = $pdo->query('SELECT * FROM emprestimos');
$emprestimo = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($emprestimo) == 0) {
    echo '<p>Nenhum empréstimo realizado</p>';
} else {
    echo '<table border="1">';
    echo '<thead><tr><th>Nome</th><th>Dia de Empréstimo</th><th>Dia de Devolução</th><th>Status</th></tr></thead>';
    echo '<tbody>';

    foreach ($emprestimo as $emprestimos) {
        echo '<tr>';
        echo '<td>' . $emprestimos['nome'] . '</td>';
        echo '<td>' . date('d/m/Y', strtotime($emprestimos['dia_e'])) . '</td>';
        echo '<td>' . date('d/m/Y', strtotime($emprestimos['dia_d'])) . '</td>';
        echo '<td>' . $emprestimos['status'] . '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
}
?>
</div>
</body>
</html>