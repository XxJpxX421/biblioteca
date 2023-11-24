<?php
include '../config/config.php';

$sqlUsuariosComLivros = "SELECT DISTINCT u.id, u.nome FROM usuarios u JOIN emprestimos e ON u.id = e.id_usuario WHERE e.status = 'em aberto'";
$stmtUsuariosComLivros = $pdo->prepare($sqlUsuariosComLivros);
$stmtUsuariosComLivros->execute();
$resultUsuariosComLivros = $stmtUsuariosComLivros->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devolver Livro (Admin)</title>
</head>
<body>
    <h2>Devolver Livro (Admin)</h2>
    <form action="processar_devolucao.php" method="post">
        <label for="usuarioId">Selecione o usuário:</label>
        <select name="usuarioId" required>
            <?php
            foreach ($resultUsuariosComLivros as $usuario) {
                echo "<option value='{$usuario['id']}'>{$usuario['nome']}</option>";
            }
            ?>
        </select>
        <br>
        <input type="submit" value="Marcar como Devolvido">
    </form>
</body>
</html>
