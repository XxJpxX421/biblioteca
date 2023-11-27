<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Verificação de Sequência</title>
  <!-- Inclua o arquivo JavaScript -->
  <script src="public/js/verificacao.js"></script>
  <style>
    body {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
      font-family: 'Cursive', sans-serif;
      background-color: #f0f0f0; /* Cor de fundo suave */
      transition: background-color 0.5s; /* Transição de cor de fundo suave */
    }

    #mensagemErro, #mensagemAcerto, #sequenciaDigitada {
      font-size: 50px;
      transition: color 0.5s; /* Transição de cor suave */
    }

    #mensagemErro {
      color: red;
      margin-bottom: 20px;
    }

    #mensagemAcerto {
      color: green;
      margin-bottom: 20px;
    }

    /* Adiciona animação de fade-in para as mensagens */
    .fade-in {
      opacity: 0;
      animation: fadeIn 1s forwards;
    }

    @keyframes fadeIn {
      to {
        opacity: 1;
      }
    }

    /* Adiciona animação de bounce para a sequência digitada */
    #sequenciaDigitada.bounce {
      animation: bounce 0.5s ease-in-out;
    }

    @keyframes bounce {
      0%, 20%, 50%, 80%, 100% {
        transform: translateY(0);
      }
      40% {
        transform: translateY(-30px);
      }
      60% {
        transform: translateY(-15px);
      }
    }
  </style>
</head>
<body>
  <div id="mensagemErro" class="fade-in"></div>
  <div id="mensagemAcerto" class="fade-in"></div>
  <div> <span id="sequenciaDigitada" class="bounce"></span></div>
</body>
</html>
