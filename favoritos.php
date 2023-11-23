<?php 
    // Define a variável $header como 2
    $header = 2;
    // Define a variável $css com um link para um arquivo CSS externo chamado 'css_favoritos.css'
    $css = '<link rel = "stylesheet" type = "text/css" href = "css/css_favoritos.css" />';
    // Define a variável $js como vazia, ou seja, não inclui nenhum arquivo JavaScript
	$js = '<script src = "js/js_favorito.js" defer></script>';
    // Define a variável $title como 'FAVORITOS', que será o título da página
    $title = 'FAVORITOS';
    // Inclui o arquivo 'header.php', que contém código HTML e PHP anteriormente comentado
    include_once 'header.php';
?>

	<div class="mae">
		<div class="row">
			<div class="col-5 ms-5 mtt">
				<h1 class="titulo">
					<i class="fa-solid fa-star me-2" style="color: #f5d742;"></i>
					FAVORITOS
				</h1>
			</div>

			<div class="col-5 ms-5 me-0 mt-5 d-flex justify-content-end">
				<select class="form-select mt-4 ms-5 me-0" id="sltFiltros">
					<option value="TE">&#xf0b0; Todos Eventos</option>
					<option value="ME">&#xf274; Meus Eventos</option>
					<option value="ER">&#xf073; Eventos Recentes</option>
					<option value="EP">&#xf3c5; Eventos Presenciais</option>
					<option value="EO">&#xf0c1;	Eventos Online</option>
					<option value="OA">&#xf15d; Ordem Alfabética</option>
				</select>
			</div>
		</div>

        <div class="ms-5 me-5 mb-1 teste">
            <div class="ms-2 me-2 mt-5 mb-5 gx-5">
				<div class="row m-2 justify-content-between">

					<div class="card bg-transparent config-card mt-4 m-4 mb-4 p-0">
						<img src="img/evento1.jpeg" class="card-img-top config-img" alt="foto evento">
						<div id="favoritar" estado="desfavoritado" class="card-img-overlay d-flex favoritado">
							<i class="fa-regular fa-star ms-0 mt-0 me-2 fs-5" style="color: #f5d742;"></i>
							<p class="card-title titulo-card ms-0 mt-0 fs-4">Título</p>
						</div>
					</div>

					<div class="card bg-transparent config-card mt-4 m-4 mb-4 p-0">
						<img src="img/evento2.jpeg" class="card-img-top config-img" alt="foto evento">
						<div id="favoritar" estado="desfavoritado" class="card-img-overlay d-flex favoritado">
							<i class="fa-regular fa-star ms-0 mt-0 me-2 fs-5" style="color: #f5d742;"></i>
							<p class="card-title titulo-card ms-0 mt-0 fs-4">Título</p>
						</div>
					</div>

					<div class="card bg-transparent config-card mt-4 m-4 mb-4 p-0">
						<img src="img/evento3.jpeg" class="card-img-top config-img" alt="foto evento">
						<div id="favoritar" estado="desfavoritado" class="card-img-overlay d-flex favoritado">
							<i class="fa-regular fa-star ms-0 mt-0 me-2 fs-5" style="color: #f5d742;"></i>
							<p class="card-title titulo-card ms-0 mt-0 fs-4">Título</p>
						</div>
					</div>

					<div class="card bg-transparent config-card mt-4 m-4 mb-4 p-0">
						<img src="img/evento4.jpeg" class="card-img-top config-img" alt="foto evento">
						<div id="favoritar" estado="desfavoritado" class="card-img-overlay d-flex favoritado">
							<i class="fa-regular fa-star ms-0 mt-0 me-2 fs-5" style="color: #f5d742;"></i>
							<p class="card-title titulo-card ms-0 mt-0 fs-4">Título</p>
						</div>
					</div>

					<div class="card bg-transparent config-card mt-4 m-4 mb-4 p-0">
						<img src="img/evento5.jpeg" class="card-img-top config-img" alt="foto evento">
						<div id="favoritar" estado="desfavoritado" class="card-img-overlay d-flex favoritado">
							<i class="fa-regular fa-star ms-0 mt-0 me-2 fs-5" style="color: #f5d742;"></i>
							<p class="card-title titulo-card ms-0 mt-0 fs-4">Título</p>
						</div>
					</div>

					<div class="card bg-transparent config-card mt-4 m-4 mb-4 p-0">
						<img src="img/evento6.jpeg" class="card-img-top config-img" alt="foto evento">
						<div id="favoritar" estado="desfavoritado" class="card-img-overlay d-flex favoritado">
							<i class="fa-regular fa-star ms-0 mt-0 me-2 fs-5" style="color: #f5d742;"></i>
							<p class="card-title titulo-card ms-0 mt-0 fs-4">Título</p>
						</div>
					</div>

					<div class="card bg-transparent config-card mt-4 m-4 mb-4 p-0">
						<img src="img/evento7.jpeg" class="card-img-top config-img" alt="foto evento">
						<div id="favoritar" estado="desfavoritado" class="card-img-overlay d-flex favoritado">
							<i class="fa-regular fa-star ms-0 mt-0 me-2 fs-5" style="color: #f5d742;"></i>
							<p class="card-title titulo-card ms-0 mt-0 fs-4">Título</p>
						</div>
					</div>

					<div class="card bg-transparent config-card mt-4 m-4 mb-4 p-0">
						<img src="img/evento8.jpeg" class="card-img-top config-img" alt="foto evento">
						<div id="favoritar" estado="desfavoritado" class="card-img-overlay d-flex favoritado">
							<i class="fa-regular fa-star ms-0 mt-0 me-2 fs-5" style="color: #f5d742;"></i>
							<p class="card-title titulo-card ms-0 mt-0 fs-4">Título</p>
						</div>
					</div>

					<div class="card bg-transparent config-card mt-4 m-4 mb-4 p-0">
						<img src="img/evento9.jpeg" class="card-img-top config-img" alt="foto evento">
						<div id="favoritar" estado="desfavoritado" class="card-img-overlay d-flex favoritado">
							<i class="fa-regular fa-star ms-0 mt-0 me-2 fs-5" style="color: #f5d742;"></i>
							<p class="card-title titulo-card ms-0 mt-0 fs-4">Título</p>
						</div>
					</div>

					<div class="card bg-transparent config-card mt-4 m-4 mb-4 p-0">
						<img src="img/evento10.jpg" class="card-img-top config-img" alt="foto evento">
						<div id="favoritar" estado="desfavoritado" class="card-img-overlay d-flex favoritado">
							<i class="fa-regular fa-star ms-0 mt-0 me-2 fs-5" style="color: #f5d742;"></i>
							<p class="card-title titulo-card ms-0 mt-0 fs-4">Título</p>
						</div>
					</div>

					<div class="card bg-transparent config-card mt-4 m-4 mb-4 p-0">
						<img src="img/evento11.jpg" class="card-img-top config-img" alt="foto evento">
						<div id="favoritar" estado="desfavoritado" class="card-img-overlay d-flex favoritado">
							<i class="fa-regular fa-star ms-0 mt-0 me-2 fs-5" style="color: #f5d742;"></i>
							<p class="card-title titulo-card ms-0 mt-0 fs-4">Título</p>
						</div>
					</div>

					<div class="card bg-transparent config-card mt-4 m-4 mb-4 p-0">
						<img src="img/evento12.jfif" class="card-img-top config-img" alt="foto evento">
						<div id="favoritar" estado="desfavoritado" class="card-img-overlay d-flex favoritado">
							<i class="fa-regular fa-star ms-0 mt-0 me-2 fs-5" style="color: #f5d742;"></i>
							<p class="card-title titulo-card ms-0 mt-0 fs-4">Título</p>
						</div>
					</div>

					<div class="card bg-transparent config-card mt-4 m-4 mb-4 p-0">
						<img src="img/evento13.jfif" class="card-img-top config-img" alt="foto evento">
						<div id="favoritar" estado="desfavoritado" class="card-img-overlay d-flex favoritado">
							<i class="fa-regular fa-star ms-0 mt-0 me-2 fs-5" style="color: #f5d742;"></i>
							<p class="card-title titulo-card ms-0 mt-0 fs-4">Título</p>
						</div>
					</div>

					<div class="card bg-transparent config-card mt-4 m-4 mb-4 p-0">
						<img src="img/evento14.jfif" class="card-img-top config-img" alt="foto evento">
						<div id="favoritar" estado="desfavoritado" class="card-img-overlay d-flex favoritado">
							<i class="fa-regular fa-star ms-0 mt-0 me-2 fs-5" style="color: #f5d742;"></i>
							<p class="card-title titulo-card ms-0 mt-0 fs-4">Título</p>
						</div>
					</div>

					<div class="card bg-transparent config-card mt-4 m-4 mb-4 p-0">
						<img src="img/evento15.jfif" class="card-img-top config-img" alt="foto evento">
						<div id="favoritar" estado="desfavoritado" class="card-img-overlay d-flex favoritado">
							<i class="fa-regular fa-star ms-0 mt-0 me-2 fs-5" style="color: #f5d742;"></i>
							<p class="card-title titulo-card ms-0 mt-0 fs-4">Título</p>
						</div>
					</div>

					<!-- <div class="card bg-transparent config-card mt-4 m-4 mb-4 p-0">
						<img src="img/evento16.jpeg" class="card-img-top config-img" alt="foto evento">
						<div id="favoritar" estado="desfavoritado" class="card-img-overlay d-flex favoritado">
							<i class="fa-regular fa-star ms-0 mt-0 me-2 fs-5" style="color: #f5d742;"></i>
							<p class="card-title titulo-card ms-0 mt-0 fs-4">Título</p>
						</div>
					</div> -->

					<div class="card bg-transparent config-card mt-4 m-4 mb-4 p-0">
						<img src="img/evento17.jpeg" class="card-img-top config-img" alt="foto evento">
						<div id="favoritar" estado="desfavoritado" class="card-img-overlay d-flex favoritado">
							<i class="fa-regular fa-star ms-0 mt-0 me-2 fs-5" style="color: #f5d742;"></i>
							<p class="card-title titulo-card ms-0 mt-0 fs-4">Título</p>
						</div>
					</div>

					<div class="card bg-transparent config-card mt-4 m-4 mb-4 p-0">
						<img src="img/evento18.jpeg" class="card-img-top config-img" alt="foto evento">
						<div id="favoritar" estado="desfavoritado" class="card-img-overlay d-flex favoritado">
							<i class="fa-regular fa-star ms-0 mt-0 me-2 fs-5" style="color: #f5d742;"></i>
							<p class="card-title titulo-card ms-0 mt-0 fs-4">Título</p>
						</div>
					</div>

					<div class="card bg-transparent config-card mt-4 m-4 mb-4 p-0">
						<img src="img/evento19.jpeg" class="card-img-top config-img" alt="foto evento">
						<div id="favoritar" estado="desfavoritado" class="card-img-overlay d-flex favoritado">
							<i class="fa-regular fa-star ms-0 mt-0 me-2 fs-5" style="color: #f5d742;"></i>
							<p class="card-title titulo-card ms-0 mt-0 fs-4">Título</p>
						</div>
					</div>

					<!-- <div class="card bg-transparent config-card mt-4 m-4 mb-4 p-0">
						<img src="img/evento20.jfif" class="card-img-top config-img" alt="foto evento">
						<div id="favoritar" estado="desfavoritado" class="card-img-overlay d-flex favoritado">
							<i class="fa-regular fa-star ms-0 mt-0 me-2 fs-5" style="color: #f5d742;"></i>
							<p class="card-title titulo-card ms-0 mt-0 fs-4">Título</p>
						</div>
					</div>

					<div class="card bg-transparent config-card mt-4 m-4 mb-4 p-0">
						<img src="img/evento21.jpeg" class="card-img-top config-img" alt="foto evento">
						<div id="favoritar" estado="desfavoritado" class="card-img-overlay d-flex favoritado">
							<i class="fa-regular fa-star ms-0 mt-0 me-2 fs-5" style="color: #f5d742;"></i>
							<p class="card-title titulo-card ms-0 mt-0 fs-4">Título</p>
						</div>
					</div> -->

				</div>
        	</div>
    	</div>
	</div>
	
	<?php
        // Inclui o arquivo 'footer.php', que geralmente contém código HTML e PHP relacionado ao rodapé da página
        include_once 'footer.php';
    ?>