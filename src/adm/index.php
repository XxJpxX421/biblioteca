<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/index.css">
    <title>Menu Dropdown</title>
</head>
<body>

<div id="menu-container">

    <div id="menu-icon">    Controle do Site</div>
    <div id="options-container">
        <a href="../app/Views/login/lista.php">Usuários</a>
        <a href="devolucao.php">Devolução</a>
        <a href="livro.php">Livros</a>
        <a href="../app/Views/emprestimos/lista.php">Empréstimos</a>
        <a href="../app/Views/historico/lista.php">Histórico</a>
        <a href="relatorio.php">Relatório</a>
        <a href="../index/login.php">Sair</a>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var optionsContainer = document.getElementById('options-container');
        var menuContainer = document.getElementById('menu-container');

        menuContainer.addEventListener('click', function () {
            if (optionsContainer.style.display === 'block') {
                optionsContainer.style.opacity = '0';
                optionsContainer.style.transform = 'translateY(-10px)';
                setTimeout(function () {
                    optionsContainer.style.display = 'none';
                    menuContainer.classList.remove('clicked');
                }, 300);
            } else {
                optionsContainer.style.display = 'block';
                optionsContainer.style.width = menuContainer.offsetWidth + 'px';
                setTimeout(function () {
                    optionsContainer.style.opacity = '1';
                    optionsContainer.style.transform = 'translateY(0)';
                    menuContainer.classList.add('clicked');
                }, 10);
            }
        });

        // Fechar o menu se clicar fora dele
        document.addEventListener('click', function (event) {
            var target = event.target;
            if (!menuContainer.contains(target)) {
                optionsContainer.style.opacity = '0';
                optionsContainer.style.transform = 'translateY(-10px)';
                setTimeout(function () {
                    optionsContainer.style.display = 'none';
                    menuContainer.classList.remove('clicked');
                }, 300);
            }
        });
    });
</script>

</body>
</html>