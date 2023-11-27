function sendMessage() {
    const userInput = document.getElementById('userInput');
    const messagesContainer = document.getElementById('messages');

    const userMessage = userInput.value;
    if (userMessage.trim() === '') return;

    appendMessage('Usuário', userMessage);

    // Simule a resposta do chatbot (pode ser substituído por uma chamada a uma API de chatbot)
    const botResponse = getBotResponse(userMessage);
    appendMessage('LibraIntel', botResponse);

    // Limpa o campo de entrada
    userInput.value = '';
}

function appendMessage(sender, message) {
    const messagesContainer = document.getElementById('messages');
    const messageElement = document.createElement('div');
    messageElement.className = sender;
    messageElement.innerHTML = `<strong>${sender}:</strong> ${message}`;
    messagesContainer.appendChild(messageElement);

    // Rola para baixo para exibir a última mensagem
    messagesContainer.scrollTop = messagesContainer.scrollHeight;
}

function getBotResponse(userMessage) {
    // Lógica do chatbot - aqui você pode usar uma API de chatbot, processamento de linguagem natural, etc.
    // Neste exemplo, uma resposta simples é retornada.
    return `Desculpe, não entendi sua pergunta. Na qual foi: " ${userMessage}"`;
}
