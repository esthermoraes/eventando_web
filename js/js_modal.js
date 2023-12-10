var modal = document.getElementById("myModal");

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