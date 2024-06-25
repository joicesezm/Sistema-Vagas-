function verifyUser() {
    const cpfInput = document.getElementById("cpfcpf");
    const senhaInput = document.getElementById("senhasenha");
    const senhaValue = senhaInput.value.trim();
    var balbalba
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

