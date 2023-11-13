<?php
session_start()
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="public/css/login.css">
    </head>
<body>
	<?php
                    if(isset($_SESSION['nao_autenticado'])):
                    ?>
                    <?php
                    endif;
                    unset($_SESSION['nao_autenticado']);
                    ?>
                    <form action="loginconfig.php" method="POST">
                    <input type="text" name="nome" placeholder="Email ou Usuário">
                    <input type="password" name="senha" placeholder="Senha">
                    <button class="button" type="submit">
							Login
						</button>

                        <a class= "registro" href="registro.php">
							Crie sua conta
                            </a> 
                                               </form>	
                     <button class= "adm"><a href="adm.php">Administrador</button></a>
                            </body>
                            </html>