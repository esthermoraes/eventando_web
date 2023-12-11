const favoritar = document.getElementById('favoritar');
favoritar.setAttribute('estado', 'favoritado');
favoritar.addEventListener('click', () => {
    if (favoritar.getAttribute('estado') === 'desfavoritado') {
        favoritar.setAttribute('estado', 'favoritado');
        favoritar.innerHTML = `
            <i class="mb-3 me-2 fa-solid fa-star fa-lg" style="color: #ebcb00;"></i>
            <input type="hidden" name="favoritar" id="favoritado"/>
        `;
    } else {
        favoritar.setAttribute('estado', 'desfavoritado');
        favoritar.innerHTML = `
            <i class="mb-3 me-2 fa-regular fa-star fa-lg" style="color: #ebcb00;"></i>
            <input type="hidden" name="favoritar" id="favoritado"/>
        `;
    }
});