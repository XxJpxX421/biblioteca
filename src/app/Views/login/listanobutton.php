<?php require_once 'C:\xampp\htdocs\biblioteca\src\config\config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../adm/public/css/lista.css">
    <title>Lista de Usuários</title>
</head>
<body class="listar">
    <div class="container3">
    <h1>Lista de Usuários</h1>
    
<?php
$stmt = $pdo->query('SELECT * FROM usuarios');
$login = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($login) == 0) {
    echo '<p>Nenhuma conta registrada</p>';
} else {
    echo '<table border="1">';
    echo '<thead><tr><th>Nome de Usuário</th><th>E-mail</th><th>Senha</th></tr></thead>';
    echo '<tbody>';

    foreach ($login as $logins) {
        echo '<tr>';
        echo '<td>' . $logins['nome'] . '</td>';
        echo '<td>' . $logins['email'] . '</td>';
        echo '<td>' . $logins['senha'] . '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
}
?>
</div>
</body>
</html>