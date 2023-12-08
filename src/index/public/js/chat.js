function sendMessage() {
    const userInput = document.getElementById('userInput');
    const messagesContainer = document.getElementById('messages');

    const userMessage = userInput.value.trim().toLowerCase();
    if (userMessage === '') return;

    appendMessage('Usuário', userMessage);

    // Check if the user's message is a greeting or a specific question
    if (userMessage === 'oi') {
        const greetingResponse = 'Olá Usuário! Como você está?';
        appendMessage('LibraIntel', greetingResponse);
    } else if (userMessage === 'estou bem e você?') {
        const response = 'Estou ótima, que bom que está bem! Como posso lhe ajudar?';
        appendMessage('LibraIntel', response);
    } else {
        // Simulate the chatbot response (replace with actual chatbot logic)
        const botResponse = getBotResponse(userMessage);
        appendMessage('LibraIntel', botResponse);
    }

    // Clear the input field
    userInput.value = '';
}


function appendMessage(sender, message) {
    const messagesContainer = document.getElementById('messages');
    const messageElement = document.createElement('div');
    messageElement.className = sender;
    messageElement.innerHTML = `<strong>${sender}:</strong> ${message}`;
    messagesContainer.appendChild(messageElement);

    // Scroll down to display the last message
    messagesContainer.scrollTop = messagesContainer.scrollHeight;
}

function getBotResponse(userMessage) {
    // Chatbot logic - replace with your actual chatbot implementation
    return `Desculpe, não entendi sua pergunta. Na qual foi: "${userMessage}"`;
}
