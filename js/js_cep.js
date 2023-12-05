const cep = document.getElementById('cep');
const tpLogradouro = document.getElementById('sltTipoLogradouro');
const logradouro = document.getElementById('logradouro');
const numero = document.getElementById('numero');
const uf = document.getElementById('sltEstado');
const cidade = document.getElementById('cidade');
const bairro = document.getElementById('bairro');

cep.addEventListener("input", e => {
    if(e.target.value.length === 8){
        fetch(`https://brasilapi.com.br/api/cep/v2/${e.target.value}`)
        .then(res => res.json())
        .then(dados => {
            cidade.value = dados.city;
            bairro.value = dados.neighborhood;
            uf.value = dados.state;
            logradouro.value = dados.street.split(' ').slice(1).join(' ');
            const tp_lograduro = dados.street.split(" ");
            tpLogradouro.value = (tp_lograduro[0]);
	});
    }
	
});


// var sltEstado = document.getElementById('sltEstado');

// sltEstado.addEventListener('mousedown', function(event) {
//     event.preventDefault(); // Impede a ação padrão do mouse
// });

// sltEstado.addEventListener('keydown', function(event) {
//     event.preventDefault(); // Impede a ação padrão da tecla
// });

// var sltTipoLogradouro = document.getElementById('sltTipoLogradouro');

// sltTipoLogradouro.addEventListener('mousedown', function(event) {
//     event.preventDefault(); // Impede a ação padrão do mouse
// });

// sltTipoLogradouro.addEventListener('keydown', function(event) {
//     event.preventDefault(); // Impede a ação padrão da tecla
// });