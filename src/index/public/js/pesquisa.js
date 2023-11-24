// Seu script JavaScript
document.getElementById('searchInput').addEventListener('input', function() {
    const searchTerm = this.value.toLowerCase();
    const sessoes = document.querySelectorAll('.sessao');

    sessoes.forEach(sessao => {
        const sessaoText = sessao.textContent.toLowerCase();

        if (sessaoText.includes(searchTerm)) {
            sessao.style.display = 'block';
        } else {
            sessao.style.display = 'none';
        }
    });
});
