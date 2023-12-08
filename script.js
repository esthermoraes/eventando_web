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

function criarEvento() {
    var onlineCheckbox = document.getElementById("onlineCheckbox");
    var myForm = document.getElementById("myForm");

    if (onlineCheckbox.checked) {
        myForm.action = "criarEventoO.php";
    } 
    else {
        myForm.action = "criarEventoP.php";
    }

    // Remove o botão do tipo "button" para permitir que o formulário seja submetido
    myForm.submit();
}  