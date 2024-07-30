// Função para alternar entre as divs com base no ID fornecido
function dynamicDisplayDiv(divId) {
    // Esconde todas as divs
    document.getElementById('content').classList.add('hidden');
    document.getElementById('contact-box').classList.add('hidden');
    document.getElementById('about-us').classList.add('hidden');
    document.getElementById('questions').classList.add('hidden');

    // Mostra a div correspondente ao divId fornecido
    var divToShow = document.getElementById(divId);
    divToShow.classList.remove('hidden');
}