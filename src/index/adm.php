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
      font-family: Arial, sans-serif;
    }

    #mensagemErro {
      color: red;
      font-size: 50px;
      margin-bottom: 20px;
    }

    #sequenciaDigitada {
      font-size: 50px;
    }
    #mensagemAcerto {
      color: green;
      font-size: 50px;
      margin-bottom: 20px;
    }
  </style>
</head>
<body>
<div id="mensagemErro"></div>
<div id="mensagemAcerto"></div>
<div> <span id="sequenciaDigitada"></span></div>
</body>
</html>