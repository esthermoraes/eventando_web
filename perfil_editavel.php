<?php 
    // Define a variável $header como 2
    $header = 2;
    // Define a variável $css com um link para um arquivo CSS externo chamado 'css_perfil.css'
    $css = '<link rel = "stylesheet" type = "text/css" href = "css/css_perfil.css" />';
    // Define a variável $js com um link para um arquivo JavaScript externo chamado 'js_perfil.js' e com o atributo 'defer'
    $js = '<script src = "js/js_perfil.js" defer></script>';
    // Define a variável $title como 'PERFIL', que será o título da página
    $title = 'EDITAR PERFIL';
    // Inclui o arquivo 'header.php', que contém código HTML e PHP
    include_once 'BD/web/header.php';
	// Inclui o arquivo 'editar_usuario.php'
	include_once 'BD/web/editar_usuario.php';	
?>

	<div class="mae mt-5 mb-0">
		<!-- <div class="container-fluid row-2 col-11 ms-5">
			<button class="btn mt-5 rounded-circle w-0 h-0 avatar">
				<i class="fa-solid fa-circle-user text-center avatarU"></i>
			</button>
		</div>	 -->
		
		<div class = "row teste d-flex justify-content-center ms-3 me-3">
			<form method ="post" class="d-flex justify-content-between ms-3 me-3">
				<div class="col-md-5 mt-3 ms-5 mb-3">
					<div class="bg-secondary-soft px-4 py-5 rounded">
						<div class="row g-3">
							<h3 class="mb-4 mt-0 infos"><i class="fa-solid fa-user me-2"></i>INFORMAÇÕES BÁSICAS</h3>
							
							<div class="col-md-12">
								<label class="form-label">Nome</label>
								<input type="text" name = "nome_usuario" class="form-control" value ="<?php echo htmlspecialchars($nome);?>"
								required>
							</div>
							
							<div class="col-md-12">
								<label class="form-label">Data de nascimento</label>
								<input class="form-control" name = "data_nasc_usuario" type="text" id="date" 
								onfocus="(this.type='date')" onblur="(this.type='text')" value =  <?php echo $data_nasc;?> required>
							</div>
							
							<div class="col-md-12">
								<label class="form-label">Estado</label>
								<select class="form-select" name = "estado_usuario" value = <?php echo $estado;?> 
								id="sltEstado" required>
									<option value="">Estado</option>
									<option value="1">Acre</option>
									<option value="2">Alagoas</option>
									<option value="3">Amapá</option>
									<option value="4">Amazonas</option>
									<option value="5">Bahia</option>
									<option value="6">Ceará</option>
									<option value="7">Distrito Federal</option>
									<option value="8">Espirito Santo</option>
									<option value="9">Goiás</option>
									<option value="10">Maranhão</option>
									<option value="11">Mato Grosso do Sul</option>
									<option value="12">Mato Grosso</option>
									<option value="13">Minas Gerais</option>
									<option value="14">Pará</option>
									<option value="15">Paraíba</option>
									<option value="16">Paraná</option>
									<option value="17">Pernambuco</option>
									<option value="18">Piauí</option>
									<option value="19">Rio de Janeiro</option>
									<option value="20">Rio Grande do Norte</option>
									<option value="21">Rio Grande do Sul</option>
									<option value="22">Rondônia</option>
									<option value="23">Roraima</option>
									<option value="24">Santa Catarina</option>
									<option value="25">São Paulo</option>
									<option value="26">Sergipe</option>
									<option value="27">Tocantins</option>
								</select>
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
								<input class="form-control" name = "telefone_usuario" type="tel" id="telTelefone" 
								maxlength="15" value = <?php echo $telefone;?> required>
							</div>
							
							<div class="col-md-12">
								<label for="exampleInputPassword3" class="form-label">E-mail</label>
								<input class="form-control" name = "email_usuario" type="email" id="emEmail2"  value = <?php echo $email;?> disabled>
							</div>
						</div>
					</div>
					
					<div class="col-md-12">
						<button type="submit" name="salvarEd" class="salvarEd btn mt-5 mb-0 text-center align-items-center">
						<i class="fa-solid fa-user-check"></i>
						SALVAR EDIÇÕES
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>


	<?php
        // Inclui o arquivo 'footer.php', que geralmente contém código HTML e PHP relacionado ao rodapé da página
        include_once 'BD/web/footer.php';
    ?>