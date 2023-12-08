<?php
include '../../config/config.php';
if (!isset($_GET['id'])) {
    header('Location: ../../app/Views/login/lista.php');
    exit;
}
$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM usuarios WHERE id = ?');
$stmt->execute([$id]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment) {
    header('Location: ../../app/Views/login/lista.php');
    exit;   
}
$nome = $appointment['nome'];
$email = $appointment['email'];
$senha = $appointment['senha'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../../public/css/style3.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Conta</title>
</head>
<body>
    
<h1>Atualizar Conta</h1>
<form method="post">

    <label for="nome">Nome:</label>
    <input type="text" name="nome" value="<?php echo $nome; ?>" required></br>

    <label for="email">E-mail:</label>
    <input type="email" name="email" value="<?php echo $email; ?>" required></br>

    <label for="senha">Senha:</label>
    <input type="password" name="senha" value="<?php echo $senha; ?>" required></br>

    <button type="submit">Atualizar</button>
</form>

</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    //Validação dos dados do formulário aqui
    $stmt = $pdo->prepare('UPDATE usuarios SET nome = ?, email = ?, senha = ? WHERE id = ?');
    $stmt->execute([$nome, $email, $senha, $id]);
    header('Location: ../../app/Views/login/lista.php');
    exit;
}