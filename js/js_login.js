/* Exibir Login / Cadastro / Recuperação de Senha */
var divCadastro = document.getElementById('divCadastro');
var divLogin = document.getElementById('divLogin');  
var divRecuperar = document.getElementById('divRecuperar');

/* Selecionando os elementos do menu de login*/
var menus = document.querySelectorAll('#menu-login > div');

/* Função para exibir a seção de login */

function exibirLogin(){
  /* Mostra a seção de login e esconde as outras seções (cadastro e recuperação) */

    divLogin.classList.remove('d-none');
    divCadastro.classList.add('d-none');
    divRecuperar.classList.add('d-none');
    /*Ativa a guia de login no menu*/
    menus[0].classList.remove('d-none');
    menus[1].classList.remove('d-none');
    menus[2].classList.add('d-none');
    
    menus[0].children[0].classList.add('active');
    menus[1].children[0].classList.remove('active');
    menus[2].children[0].classList.remove('active');
}
/* Função para exibir a seção de cadastro */

function exibirCadastro(){
    /* Mostra a seção de login e esconde as outras seções (login e recuperação) */

    divCadastro.classList.remove('d-none');
    divLogin.classList.add('d-none');
    divRecuperar.classList.add('d-none');
    /*Ativa a guia de cadastro no menu*/

    menus[0].classList.remove('d-none');
    menus[1].classList.remove('d-none');
    menus[2].classList.add('d-none');

    menus[0].children[0].classList.remove('active');
    menus[1].children[0].classList.add('active');
    menus[2].children[0].classList.remove('active');
}
  
   /*Função para exibir a seção de recuperação de senha*/
function exibirRecuperar(){
      /*Mostra a seção de recuperação de senha e esconde as outras seções (login e cadastro)*/
    divRecuperar.classList.remove('d-none');
    divLogin.classList.add('d-none');
    divCadastro.classList.add('d-none');
   /* Ativa a guia de recuperação de senha no menu*/
    menus[0].classList.add('d-none');
    menus[1].classList.add('d-none');
    menus[2].classList.remove('d-none');

    menus[0].children[0].classList.remove('active');
    menus[1].children[0].classList.remove('active');
    menus[2].children[0].classList.add('active');
}

/*Botão do Google*/
function handleCredentialResponse(response) {
    const data = jwt_decode(response.credential)
  /* Exibe algumas informações do usuário (nome, e-mail, etc.) na página*/
    console.log(data);
  
    fullName.textContent = data.name
    sub.textContent = data.sub
    given_name.textContent = data.given_name
    family_name.textContent = data.family_name
    email.textContent = data.email
    verifiedEmail.textContent = data.email_verified
    picture.setAttribute("src", data.picture)
}

window.onload = function () {
  /*const clientID = window.prompt("Cole a sua Cliente ID", "")*/
  google.accounts.id.initialize({
    client_id: "902423440925-nklj2agoogc587cuqng0gpjr6vus43pr.apps.googleusercontent.com",
    callback: handleCredentialResponse
  });

  google.accounts.id.renderButton(
    document.getElementById("buttonG"), {
    theme: "outline",
    size: "large",
    type: "standard",
    type:"standard",
    shape:"pill",
    text:"$ {button.text}",
    logo_alignment:"left",
  } /*customization attributes*/
  );

  google.accounts.id.prompt(); /* also display the One Tap dialog*/
}

/*Mascara Recuperar Senha*/
document.getElementById("formulario2").addEventListener("submit", function(event) {
  event.preventDefault(); /* Impede o envio padrão do formulário*/

  var emailInput = document.getElementById("emEmail3");
  var email = emailInput.value.trim();
  
  /* Expressão regular para validar o formato do e-mail*/
  var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  if (!emailRegex.test(email)) {
      /* E-mail inválido, exiba uma mensagem de erro*/
      alert("Por favor, informe um endereço de e-mail válido.");
      return false;
  }

  /* E-mail correto, exiba um alerta e redirecione para a página de login*/
  alert("Verifique sua caixa de e-mail para instruções de recuperação de senha.");
  window.location.href = "login.php";
});

function exibirLogin() {
  /* Redirecione para a página de login*/
  window.location.href = "login.php";
}

/*Mascaras Cadastro*/
/*Macara Telefone*/
const telTelefone = document.getElementById("telTelefone");

telTelefone.addEventListener("input", function (e) {
    let telefone = e.target.value.replace(/\D/g, "").substring(0, 11);
    const tamanho = telefone.length;

    if (tamanho === 11) {
      telefone = telefone.replace(/^(\d{2})(\d{5})(\d{4})$/, "($1) $2-$3");
    } else if (tamanho === 10) {
      telefone = telefone.replace(/^(\d{2})(\d{4})(\d{4})$/, "($1) $2-$3");
    } else if (tamanho === 9) {
      telefone = telefone.replace(/^(\d{5})(\d{4})$/, "$1-$2");
    } else if (tamanho === 8) {
      telefone = telefone.replace(/^(\d{4})(\d{4})$/, "$1-$2");
    }

    e.target.value = telefone;
  });

/*Mascara Senha == Confirmação de Senha*/
let pwdSenha2 = document.getElementById("pwdSenha2");
let pwdConfSenha = document.getElementById("pwdConfSenha");

function autenticacao() {
  if (pwdConfSenha.value === "") {
    pwdConfSenha.setCustomValidity("Preencha esse campo!");
  } else if (pwdSenha2.value !== pwdConfSenha.value) {
    pwdConfSenha.setCustomValidity("Senhas diferentes!");
  } else {
    pwdConfSenha.setCustomValidity("");
  }
}

function verificarSenha() {
  if (pwdConfSenha.value !== "") {
    autenticacao();
  }
}

pwdConfSenha.onkeyup = verificarSenha;
pwdSenha2.onchange = verificarSenha;

/*Verificando o formulário*/
const formulario = document.getElementById('formulario3');
formulario.addEventListener('submit', function(event) {
  event.preventDefault(); /* Impede o envio padrão do formulário*/
  autenticacao(); /* Executa a função de autenticação*/

  /* Verifica se o formulário é válido*/
  if (formulario.checkValidity()) {
    /* Redireciona para a página de destino após o cadastro*/
    window.location.href = "login.php";
  }
});
