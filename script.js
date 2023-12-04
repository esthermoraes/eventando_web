var modal = document.getElementById("myModal");
var openBtn = document.getElementById("openModalBtn");
var closeBtn = document.getElementById("closeModalBtn");

openBtn.onclick = function() {
    modal.style.display = "block";
}

closeBtn.onclick = function() {
    modal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target === modal) {
        modal.style.display = "none";
    }
}

function selectEventFormat(format) {
    alert("Você escolheu um evento " + format + ".");
}

function createEvent() {
    var eventName = document.getElementById("eventName").value;
    alert("Evento criado: " + eventName);
    modal.style.display = "none";
}

document.querySelector('.createEventButton').addEventListener('click', function() {
    // Verifica qual checkbox está selecionada
    var onlineCheckbox = document.getElementById('onlineCheckbox');
    var presencialCheckbox = document.getElementById('presencialCheckbox');

    if (onlineCheckbox.checked) {
        // Se a checkbox online estiver selecionada, redirecione para a página de eventos online
        window.location.href = 'criarEventoO.php'; // Substitua com o caminho da sua página
    } else if (presencialCheckbox.checked) {
        // Se a checkbox presencial estiver selecionada, redirecione para a página de eventos presenciais
        window.location.href = 'criarEventoP.php'; // Substitua com o caminho da sua página
    } else {
        // Se nenhuma checkbox estiver selecionada, faça algo (por exemplo, mostre uma mensagem de erro)
        alert('Selecione o formato do evento.');
    }
});