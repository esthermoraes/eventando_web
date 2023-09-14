export function buscaAPI(event){
    let cep, estado, cidade, bairro, logradouro;
	fetch(`https://brasilapi.com.br/api/cep/v2/${event.target.value}`)
	.then(res => res.json())
	.then(dados => {
		cep = dados.cep;
		estado = dados.state;
        cidade = dados.city;
        bairro = dados.neighborhood;
        logradouro = dados.street;
	});

    return {cep, estado, cidade, bairro, logradouro}
}