function verifyUser() {
    // Obtém o valor do campo cpf
    let cpf = document.forms["cadastro-form"]["cpf"].value.trim();
    
    // Define a expressão regular para validar o CPF no formato XXX.XXX.XXX-XX
    const regexCpf = /^\d{3}\.\d{3}\.\d{3}-\d{2}$/;

    // Verifica se o CPF está vazio ou não corresponde ao formato esperado
    if (cpf === "" || !regexCpf.test(cpf)) {
        alert("*Insira um CPF válido");
        return false; // CPF inválido
    } else {
        console.log("sucesso");
    }
    const cpfInput = document.getElementById('cpf');
            
    cpfInput.value = cpfInput.value.replace(/\D/g, '');
    
    return true; // CPF válido
}

function verifyLogin() {

    const cpfInput = document.getElementById('cpf');
            
    cpfInput.value = cpfInput.value.replace(/\D/g, '');
    
    return true; // CPF válido
}


function dynamicDisplay(divId, arquivo) {
    // Esconde todas as divs
    document.getElementById('even').classList.add('hidden');
    document.getElementById('odd').classList.add('hidden');

    // Carrega o conteúdo do arquivo usando fetch
    fetch(arquivo)
        .then(response => response.text())
        .then(data => {
            // Insere o conteúdo carregado na div correspondente
            var divToShow = document.getElementById(divId);
            divToShow.innerHTML = data;
            divToShow.classList.remove('hidden');
        })
        .catch(error => console.error('Erro ao carregar o arquivo:', error));
}

document.addEventListener('DOMContentLoaded', function() {
    let togglePassword = document.getElementById('togglePassword');
    let passwordField = document.getElementById('senha');

    togglePassword.addEventListener('click', function() {
        let type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordField.setAttribute('type', type);
    });
});

function formatarCPF(event) {
    const input = event.target;
    const valor = input.value;
    const tecla = event.key;
    const cursorPos = input.selectionStart;

    // Não processar se a tecla pressionada for Backspace, Delete ou Tab
    if (['Backspace', 'Delete', 'Tab'].includes(tecla)) return;

    // Remove caracteres não numéricos
    const apenasNumeros = valor.replace(/\D/g, '');

    // Adiciona a formatação
    const cpfFormatado = apenasNumeros
        .replace(/(\d{3})(\d)/, '$1.$2')
        .replace(/(\d{3})(\d)/, '$1.$2')
        .replace(/(\d{3})(\d{1,2})$/, '$1-$2');

    // Atualiza o valor do input
    input.value = cpfFormatado;

    // Define a posição do cursor
    const pos = cursorPos + (cpfFormatado.length - valor.length);
    input.setSelectionRange(pos, pos);
}