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
	include_once 'BD/web/header.php';
	include_once 'BD/web/evento.php';

	$evento = new Evento();
?>

	<div class="mae">
		<div class="row">
			<div class="col-5 ms-5 mtt">
				<h1 class="titulo">
					<i class="fa-solid fa-star me-2" style="color: #f5d742;"></i>
					FAVORITOS
				</h1>
			</div>

			<!-- <div class="col-5 ms-5 me-0 mt-5 d-flex justify-content-end">
				<select class="form-select mt-4 ms-5 me-0" id="sltFiltros">
					<option value="TE">&#xf0b0; Todos Eventos</option>
					<option value="ME">&#xf274; Meus Eventos</option>
					<option value="ER">&#xf073; Eventos Recentes</option>
					<option value="EP">&#xf3c5; Eventos Presenciais</option>
					<option value="EO">&#xf0c1;	Eventos Online</option>
					<option value="OA">&#xf15d; Ordem Alfabética</option>
				</select>
			</div> -->
		</div>

        <div class="ms-5 me-5 mb-1 teste">
			<div class="ms-2 me-2 mt-5 mb-5 gx-5">
				<div class="row m-2 justify-content-start">

					<?php
					$eventos = $evento->selectFavoritos();

					if ($eventos["sucesso"] == 1 && isset($eventos["eventos"])) {
						$counter = 0;

						foreach ($eventos["eventos"] as $evento) {
							if ($counter % 8 == 0) {
								// Start a new row after every 8 cards
								echo '<div class="row m-2 justify-content-start">';
							}

							?>
							<div class="col-md-3" style="margin-bottom: 10px; margin-right: 10px;">
								<?php
								if ($evento['formato'] == 'presencial') {
									?>
									<a href="./visualizarEventoP.php?id=<?php echo $evento["id"]?>">
										<div class="card bg-transparent config-card p-0">
											<img src="<?php echo $evento['img']; ?>" class="card-img-top config-img" alt="foto evento">
										</div>
									</a>
									<?php
								} 
								else {
									?>
									<a href="./visualizarEventoO.php?id=<?php echo $evento["id"]?>">
										<div class="card bg-transparent config-card p-0">
											<img src="<?php echo $evento['img']; ?>" class="card-img-top config-img" alt="foto evento">
										</div>
									</a>
									<?php
								}
								?>
							</div>
							<?php

							// Increment the counter
							$counter++;

							// Close the row after every 8 cards
							if ($counter % 8 == 0) {
								echo '</div>';
							}
						}

						// Close the row if it's not already closed
						if ($counter % 8 != 0) {
							echo '</div>';
						}
					} 
					else {
						echo "<div> <center> Nenhum evento favoritado. </center> </div>";
					}
					?>

				</div>




			</div>
		</div>
	</div>
	
	<?php
        // Inclui o arquivo 'footer.php', que geralmente contém código HTML e PHP relacionado ao rodapé da página
        include_once 'BD/web/footer.php';
    ?>