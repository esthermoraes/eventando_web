const privacidade = document.getElementById('privacidade');
privacidade.setAttribute('estado', 'privado')
privacidade.addEventListener('click', () => {
    if (privacidade.getAttribute('estado') === 'publico') {
        privacidade.setAttribute('estado', 'privado')
        privacidade.innerHTML = `
            <i class="mt-2 fa-solid fa-lock fa-xl"></i>
            <p class="ms-2 pp" style = "font-size: 18px; color:#000; font-weight: bold;">Privado</p>
        `
    }

    else {
        privacidade.setAttribute('estado', 'publico')
        privacidade.innerHTML = `
        <i class="mt-2 fa-solid fa-unlock fa-flip-horizontal fa-xl" style="color: #b25abf;"></i>
        <p class="ms-2 pp">Público</p>
        `
    }
})

// document.getElementById("btn-passo1").addEventListener("click", e => {
//     e.preventDefault();
//     const div = document.querySelector(".div-passo1");
//     div.classList.add("mostrar");

//     const div2 = document.querySelector(".div-passo2");
//     div2.classList.add("d-none");

// })

// document.getElementById("btn-passo2").addEventListener("click", e => {
//     e.preventDefault();

//     const div1 = document.querySelector(".div-passo1");
//     div1.classList.remove("mostrar");
//     div1.classList.add("esconder");

//     const div2 = document.querySelector(".div-passo2");
//     div2.classList.remove("d-none");
//     div2.classList.add("mostrar");
// })

/**/

document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('adicionar_convidado').addEventListener('click', function (e) {
        e.preventDefault();

        let nome = document.querySelector('[name=nome_convidado]').value;
        let email = document.querySelector('[name=email_convidado]').value;

        adicionaConvidado(nome, email);
    });

    document.querySelectorAll('.convite-cor').forEach(function (element) {
        element.addEventListener('click', function (e) {
            let target = e.target;


            
            document.querySelectorAll('.convite-cor').forEach(function (el) {
                el.classList.remove('active');
            })

            target.classList.add('active');
            let cor = target.dataset.cor;
            let modelo = document.querySelector('.modelo-convite').dataset.modelo;

            document.querySelector('#preview_modelo').src = `./cartaz_evento.php?cor=${cor}&modelo=${modelo}`
        });
    });

    document.querySelectorAll('.modelo-convite').forEach(function (element) {
        element.addEventListener('click', function (e) {
            let target = e.target;

            document.querySelectorAll('.modelo-convite').forEach(function (el) {
                el.classList.remove('active');
            })

            target.classList.add('active');

            let modelo = target.dataset.modelo;
            let cor = document.querySelector('.convite-cor').dataset.cor;

            document.querySelector('#preview_modelo').src = `./cartaz_evento.php?cor=${cor}&modelo=${modelo}`
        });
    });

});

function adicionaConvidado(nome, email) {
    const element = document.querySelector("#selecao_convidados tbody");

    let verificacao_tabela = element.querySelectorAll("[name=nomes_convidados\\[\\]]");
    if (!verificacao_tabela.length) element.innerHTML = '';

    let linhas = element.querySelectorAll("tr");


    element.innerHTML += `
    <tr>
        <td>${linhas.length + 1}</td>
        <td><input type="hidden" name="nomes_convidados[]" value="${nome}">${nome}</td>
        <td><input type="hidden" name="emails_convidados[]" value="${email}">${email}</td>
    </tr>
    `;
}

function previewImagem(event) {
    var input = event.target;
    var preview = document.getElementById('preview');

    var reader = new FileReader();

    reader.onload = function () {
        preview.src = reader.result;
        preview.style.display = 'block';
    };

    reader.readAsDataURL(input.files[0]);
}