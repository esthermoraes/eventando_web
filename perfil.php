<?php 
    // Define a variável $header como 2
    $header = 2;
    // Define a variável $css com um link para um arquivo CSS externo chamado 'css_perfil.css'
    $css = '<link rel = "stylesheet" type = "text/css" href = "css/css_perfil.css" />';
    // Define a variável $js com um link para um arquivo JavaScript externo chamado 'js_perfil.js' e com o atributo 'defer'
    $js = '<script src = "js/js_perfil.js" defer></script>';
    // Define a variável $title como 'PERFIL', que será o título da página
    $title = 'PERFIL';
    // Inclui o arquivo 'header.php', que contém código HTML e PHP
    include_once 'header.php';
	// Inclui o arquivo 'pegar_detalhes_usuario.php'
	include_once 'BD/web/pegar_detalhes_usuario.php';
	// Inclui o arquivo 'deletar_usuario.php'
	include_once 'BD/web/deletar_usuario.php';
?>

	<div class="mae mt-5 mb-0">
		<!-- <div class="container-fluid row-2 col-11 ms-5">
			<button class="btn mt-5 rounded-circle w-0 h-0 avatar">
				<i class="fa-solid fa-circle-user text-center avatarU"></i>
			</button>
		</div> -->
		
		<div class = "row teste d-flex justify-content-center ms-3 me-3">
			<form method ="post" action = "perfil.php" class="d-flex justify-content-between ms-3 me-3">
				<div class="col-md-5 mt-3 ms-5 mb-3">
					<div class="bg-secondary-soft px-4 py-5 rounded">
						<div class="row g-3">
							<h3 class="mb-4 mt-0 infos"><i class="fa-solid fa-user me-2"></i>INFORMAÇÕES BÁSICAS</h3>
							
							<div class="col-md-12">
								<label class="form-label">Nome</label>
								<input type="text" class="form-control" value ="<?php echo htmlspecialchars($nome);?>" disabled>
							</div>
							
							<div class="col-md-12">
								<label class="form-label">Data de nascimento</label>
								<input class="form-control" type="text" id="date" onfocus="(this.type='date')" 
								onblur="(this.type='text')" value =  <?php echo $data_nasc;?> disabled>
							</div>
							
							<div class="col-md-12">
								<label class="form-label">Estado</label>
								<input type="text" class="form-control" value = <?php echo $estado;?> disabled>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-5 mt-3 mb-3 me-5">
					<div class="bg-secondary-soft px-4 py-5 rounded">
						<div class="row g-3">
							<h3 class="my-4 mb-4 mt-0 infos"><i class="fa-solid fa-phone me-2"></i>INFORMAÇÕES DE CONTATO</h3>
					
							<div class="col-md-12">
								<label for="exampleInputPassword2" class="form-label">Telefone</label>
								<input class="form-control" type="tel" id="telTelefone" maxlength="15" value = <?php echo $telefone;?> disabled>
							</div>
							
							<div class="col-md-12">
								<label for="exampleInputPassword3" class="form-label">E-mail</label>
								<input class="form-control" name="email_usuario" type="email" id="emEmail2" value = <?php echo $email;?>>
							</div>
						</div>
					</div>
					
					<div class = "row-1">
						<div class="col-md-12">
							<a href="perfil_editavel.php">
								<button class="botao btn mt-5 mb-3 text-center align-items-center col-md-6">
									<i class="fa-solid fa-user-pen"></i>
									EDITAR PERFIL
								</button>
							</a>
							<button name = "tchau" type = "submit" class="tchau btn mt-5 mb-3 ms-3 text-center align-items-center 
							col-md-6">
								<i class="fa-solid fa-user-xmark"></i>
								DELETAR PERFIL
							</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>


	<?php
        // Inclui o arquivo 'footer.php', que geralmente contém código HTML e PHP relacionado ao rodapé da página
        include_once 'footer.php';
    ?>