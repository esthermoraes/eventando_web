const privacidade = document.getElementById('privacidade');
privacidade.setAttribute('estado', 'privado')
privacidade.addEventListener('click', () => {
    if(privacidade.getAttribute('estado') === 'publico'){
        privacidade.setAttribute('estado', 'privado')
        privacidade.innerHTML = `
            <i class="mt-2 fa-solid fa-lock fa-xl"></i>
            <p class="ms-2 pp" style = "font-size: 18px; color:#000; font-weight: bold;">Privado</p>
        `
    }
    
    else{
        privacidade.setAttribute('estado', 'publico')
        privacidade.innerHTML = `
        <i class="mt-2 fa-solid fa-unlock fa-flip-horizontal fa-xl" style="color: #b25abf;"></i>
        <p class="ms-2 pp">Público</p>
        `
    }
})

document.getElementById("btn-passo1").addEventListener("click", e => {
    e.preventDefault();
    const div = document.querySelector(".div-passo1");
    div.classList.add("mostrar");

    const div2 = document.querySelector(".div-passo2");
    div2.classList.add("d-none");

})

document.getElementById("btn-passo2").addEventListener("click", e => {
    e.preventDefault();
    
    const div1 = document.querySelector(".div-passo1");
    div1.classList.remove("mostrar");
    div1.classList.add("esconder");

    const div2 = document.querySelector(".div-passo2");
    div2.classList.remove("d-none");
    div2.classList.add("mostrar");
})

