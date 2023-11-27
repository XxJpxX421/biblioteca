<?php
 include 'verifica_login.php';
$nome_arquivo = "";
if (isset($_SESSION['nome_arquivo'])) {
    $nome_arquivo = $_SESSION['nome_arquivo'];
    $caminho_arquivo = "uploads/" . $nome_arquivo;
}
?>
        <!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sua Biblioteca</title>
    <link rel="stylesheet" href="public/css/index.css">
    <link rel="shortcut icon" href="public/assets/Black_White_Minimalist_Letter_JM_Logo__2_-removebg-preview.png" type="image/x-icon">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>
<body>

<header class="container header-bg">
<div class="esq">
<div class="user-icon" id="user-icon" onclick="showUserInfo()">
                    <ion-icon name="person-outline"></ion-icon>
                </div>
                <div class="user-info" id="user-info">
                    <div class="user">
        <a href="imagem.php"><i><img class= "user-img" src="<?php echo $caminho_arquivo; ?>" alt="Trocar Imagem"></i></a><h2>Olá <?php echo $_SESSION['nome'] , "!"; ?> </h2><br>
        </div>
        <button class= "exitbutton" onclick="logout()">
                    <div class="login-button"><h6 class="exit-button position-header">Sair</h6></div></button>
                </div>
    </div>
    <div class="cent">
                <a href="../login_usuario/index.php">Biblioteca</a>
            </div>
           
            
            

    <div class="dir">
        
        
            <div class="logo-wpp">
                <a href="https://wa.me/5518997024193" target="_blank"><ion-icon name="logo-whatsapp"></ion-icon></a>
            </div>

            <div class="logo-insta">
                <a href="https://www.instagram.com/joalhos/" target="_blank"><ion-icon name="logo-instagram"></ion-icon></a>
            </div>

            <div class="logo-facebook">
                 <a href="https://www.facebook.com/joaopedro.bordadasilva.5?locale=pt_BR" target="_blank"><ion-icon name="logo-facebook"></ion-icon></a>
            </div>

            <div class="logo-faq">
                <a href="chat.php"><ion-icon name="chatbox-ellipses-outline"></ion-icon></a>
            </div>
        
    </div>
    </header>
    <div class="wrapper">
    <aside class="sidebar">
    <div class="subtitulo"> <i class="icon-circle">
    <img src="public/assets/img/a.jpg" alt="Ícone de João Pedro">
  </i>by João Pedro</div>
      <nav>
        <ul>
          <li><a href="index.php">Página Inicial</a></li>
          <li><a href="emprestimos.php">Empréstimos</a></li>
          <li><a href="pesquisa.php">Pesquisa</a></li>
          <li><a href="contato.php">Contato</a></li>
          <li></li>
        </ul>
      </nav>
   </aside>


   <div class="main-content">
    <div class= "barra"><marquee scrollamount= "40"><span>
Empreste livros agora!!</span></marquee>
    </div>
    <div class="sessoes">
            <?php include_once "livros.php"; ?>
        </div>
    </div>

    <script src="public/js/user.js"></script>
</body>
</html>


