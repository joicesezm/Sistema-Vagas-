// <--- Scripts do Fomulario ---> //

// Adiciona DOM evento //
document.addEventListener('DOMContentLoaded', function () {

    // Regex //
    const emailRegex = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9.-]+$/; // esse regex irá validar tanto emails terminados em .com quanto .com.br //
    const phoneRegex = /^(\([0-9]{2}\) [0-9]{4,5}-[0-9]{4})?$/; // esse regex irá validar tanto telefones xx xxxx-xxxx quanto xx xxxxx-xxxx //
  
    // Window indicando que a função é global
    window.validateAndSubmitForm = function () {  // Função chamada no formulário para validar os campos e evitar erro padrão dos navegadores.
  
      // Função de validação dos campos do formulário
      function validateForm() {
        // Coloca os valores dos campos dentro das variaveis //
        let x = document.forms["contactForm"]["name"].value;
        let y = document.forms["contactForm"]["email"].value.trim();
        let z = document.forms["contactForm"]["message"].value;
        let a = document.forms["contactForm"]["phone"].value.trim(); // trim irá remover espaços extras em branco // 
  
        // Check E-mail //
        if (y === "" || !emailRegex.test(y)) {
          alert("Por favor, insira um endereço de e-mail válido.");
          return false;
        }
        // Check Name && Message //
        if (x  === "" || z === "") {
          alert("Preencha todos os campos");
          return false;
        }
        // Check Phone // O telefone é opcional, então foi ajustado para validar apenas se o campo conter algo //
        if (a !== "" && !phoneRegex.test(a)) {
          alert("Por favor, insira um telefone válido no formato (xx) xxxx-xxxx.");
          return false;
        }
        // Se tudo estiver OK, retorna true e segue para a validação final //
        return true;
      }
  
      // Verifica a Validação
      if (validateForm()) {
        alert("Enviado com Sucesso");
        return true; // Retorna true para permitir o envio do formulário
      }
  
      return false; // Retorna false para evitar o envio do formulário
    };
  
  
  });


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
