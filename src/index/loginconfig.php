<?php
session_start();
include '../config/config.php';

if(empty($_POST['nome']) || empty($_POST['senha'])) {
    header('Location: login.php');
    exit();
}

$usuario = $_POST['nome'];
$senha = $_POST['senha'];

try {
    // Consulta preparada para evitar injeção de SQL
    $query = "SELECT * FROM usuarios WHERE (nome = :usuario OR email = :usuario) AND senha = :senha";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':senha', $senha);
    $stmt->execute();

    // Contar o número de linhas retornadas pela consulta
    $row = $stmt->rowCount();

    if($row == 1) {
        // Retrieve user information
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Set the appropriate session variable (either 'nome' or 'email')
        $_SESSION['nome'] = $user['nome'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['id'] = $user['id'];

        header('Location: index.php');
        exit();
    } else {
        $_SESSION['nao_autenticado'] = true;
        header('Location: login.php');
        exit();
    }
} catch(PDOException $e) {
    // Em caso de erro de conexão ou consulta, você pode lidar com a exceção aqui
    echo "Erro: " . $e->getMessage();
}
?>
