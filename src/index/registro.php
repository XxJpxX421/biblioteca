<?php
require_once 'C:\xampp\htdocs\biblioteca\vendor\autoload.php';
require_once '../config/config.php';
require_once (DIRREQ . '/app/Controllers/LoginController.php');

$loginController = new LoginController($pdo);

if (isset($_POST['nome']) &&
    isset($_POST['email']) &&
    isset($_POST['senha'])) 
{
    $loginController->criarLogin($_POST['nome'], $_POST['email'], $_POST['senha']);
}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Registre-se</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="public/css/registro.css">
    </head>
<body>
	<?php
                    if(isset($_SESSION['nao_autenticado'])):
                    ?>
                      
                    <?php
                    endif;
                    unset($_SESSION['nao_autenticado']);
                    ?>
			<form  method="POST">
            <input type="text" name="nome" placeholder="Nome de Usuário" required>
            <input type="email" name="email" placeholder="E-mail" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <button class= "botao" type="submit">
							Registrar
						</button>
                        <a class= "login" href="login.php">
							Logue na sua conta
                            </a>
				</form>
                <button class= "adm"><a href="adm.php">Administrador</button></a>
                </body>
</html>