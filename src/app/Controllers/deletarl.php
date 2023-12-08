<?php
include '../../config/config.php';

if (!isset($_GET['id'])) {
    header ('Location: ../../app/Views/login/lista.php');
    exit;
}

$id = $_GET['id'];

// Fetch user information
$stmtUser = $pdo->prepare('SELECT * FROM usuarios WHERE id = ?');
$stmtUser->execute([$id]);
$usuario = $stmtUser->fetch(PDO::FETCH_ASSOC);

if (!$usuario) {
    header('Location: ../../app/Views/login/lista.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        // Start a transaction to ensure atomicity
        $pdo->beginTransaction();

        // Delete related records from emprestimos
        $stmtEmprestimos = $pdo->prepare('DELETE FROM emprestimos WHERE id_usuario = ?');
        $stmtEmprestimos->execute([$id]);

        // Delete the user record from usuarios
        $stmtUsuarios = $pdo->prepare('DELETE FROM usuarios WHERE id = ?');
        $stmtUsuarios->execute([$id]);

        // Commit the transaction
        $pdo->commit();

        header('Location: ../../app/Views/login/lista.php');
        exit;
    } catch (PDOException $e) {
        // Roll back the transaction on error
        $pdo->rollBack();
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../../public/css/style3.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
</head>
<body>
    <h1>Deletar Conta</h1>
    <p>Tem certeza que deseja deletar a conta de <?php echo $usuario['nome']; ?>?</p>
    <form method="post" onsubmit="return confirm('Tem certeza que deseja deletar a conta? Isso também removerá os empréstimos associados.')">
        <button type="submit">Sim</button>
        <a class="no" href="C:\xampp\htdocs\biblioteca\src\app\Views\login\lista.php">Não</a>
    </form>
</body>
</html>
