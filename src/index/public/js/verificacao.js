// verificacao.js

// Sequência correta
var sequenciaCorreta = "joaolindo";

// String para armazenar as teclas pressionadas
var teclasPressionadas = "";

// Função para verificar a sequência
function verificarSequencia() {
  if (teclasPressionadas === sequenciaCorreta) {
    // Exibir mensagem de sequência correta
    document.getElementById('mensagemAcerto').innerText = 'Sequência Correta! Direcionando...';

    // Redirecionar para a página correta após 3 segundos
    setTimeout(function() {
      window.location.href = '/biblioteca/src/adm/index.php';
    }, 3000);
  } else {
    // Exibir mensagem de sequência incorreta
    document.getElementById('mensagemErro').innerText = 'Sequência Incorreta!';

    // Redirecionar para a página incorreta após 3 segundos
    setTimeout(function() {
      window.location.href = '/biblioteca/src/index/login.php';
    }, 3000);
  }
}

// Função para atualizar a sequência na página
function atualizarSequenciaNaPagina() {
  document.getElementById('sequenciaDigitada').innerText = teclasPressionadas;
}

// Adicionar um event listener para capturar as teclas pressionadas
window.addEventListener('keydown', function(event) {
  // Adicionar a tecla pressionada à string
  teclasPressionadas += event.key;

  atualizarSequenciaNaPagina();

  // Verificar a sequência quando a string atingir o comprimento da sequência correta
  if (teclasPressionadas.length === sequenciaCorreta.length) {
    verificarSequencia();
    // Limpar a string após a verificação
    teclasPressionadas = "";
    // Limpar a sequência na página após a verificação
    atualizarSequenciaNaPagina();
  }
});
