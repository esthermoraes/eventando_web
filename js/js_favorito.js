const favoritar = document.getElementById('favoritar');
favoritar.setAttribute('estado', 'favoritado')
favoritar.addEventListener('click', () => {
    if (favoritar.getAttribute('estado') === 'desfavoritado') {
        favoritar.setAttribute('estado', 'favoritado')
        favoritar.innerHTML = `
        <i class="fa-solid fa-star ms-0 mt-0 me-2 fs-5" style="color: #f5d742;"></i>
        <p class="card-title titulo-card ms-0 mt-0 fs-4">Título</p>
        `
    }

    else {
        favoritar.setAttribute('estado', 'desfavoritado')
        favoritar.innerHTML = `
        <i class="fa-regular fa-star ms-0 mt-0 me-2 fs-5" style="color: #f5d742;"></i>
        <p class="card-title titulo-card ms-0 mt-0 fs-4">Título</p>
        `
    }
})