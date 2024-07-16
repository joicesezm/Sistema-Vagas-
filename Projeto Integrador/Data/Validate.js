function verifyUser() {
    const cpfInput = document.getElementById("cpfcpf");
    const senhaInput = document.getElementById("senhasenha");
    const senhaValue = senhaInput.value.trim();
    const incCpf = document.getElementById("incCpf");
    const incSenha = document.getElementById("incSenha");
    const regexCpf = /^\d{3}\.\d{3}\.\d{3}-\d{2}$/;

    if (!regexCpf.test(cpfInput.value.trim())) {
        incCpf.textContent = "*Insira um CPF válido";
        return false;
    } else {
        incCpf.textContent = "";
    }
    return true;
}


function verifyAdmin() {
    let y = document.forms["myForm"]["user"].value;
    let x = document.forms["myForm"]["pass"].value;
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