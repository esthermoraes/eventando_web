<?php 
    // Define a variável $_seila como 2
    $_seila = 2;
    // Define a variável $css com um link para um arquivo CSS externo chamado 'css_perfil.css'
    $css = '<link rel = "stylesheet" type = "text/css" href = "css/css_perfil.css" />';
    // Define a variável $js com um link para um arquivo JavaScript externo chamado 'js_perfil.js' e com o atributo 'defer'
    $js = '<script src = "js/js_perfil.js" defer></script>';
    // Define a variável $title como 'PERFIL', que será o título da página
    $title = 'EDITAR PERFIL';
    // Inclui o arquivo 'header.php', que contém código HTML e PHP
    include_once 'header.php';
?>

	<div class="mae mt-5 mb-0">
		<div class="container-fluid row-2 col-11 ms-5">
			<button class="btn mt-5 rounded-circle w-0 h-0 avatar">
				<i class="fa-solid fa-circle-user text-center avatarU"></i>
			</button>
		</div>	
		
		<div class = "row teste">
			<div class="row d-flex justify-content-center mt-5 mb-5 gx-4">
				<div class="col-xxl-5 mt-5 mb-5 me-5 mb-xxl-0">
					<div class="bg-secondary-soft mt-0 px-4 py-5 rounded">
						<div class="row g-3">
							<h2 class="mb-4 mt-0 infos"><i class="fa-solid fa-user me-2"></i>INFORMAÇÕES BÁSICAS</h2>
							
							<div class="col-md-12">
								<label class="form-label">Nome</label>
								<input type="text" class="form-control" placeholder="">
								<!-- <input type="text" class="form-control" value="TIAGO ROSA" placeholder=""> -->
							</div>
							
							<div class="col-md-12">
								<label class="form-label">Data de nascimento</label>
								<input class="form-control" type="text" id="date"  placeholder="" onfocus="(this.type='date')" onblur="(this.type='text')" required>
								<!-- <input class="form-control" type="text" id="date" value="12/11/1981" placeholder="" onfocus="(this.type='date')" onblur="(this.type='text')" required> -->
							</div>
							
							<div class="col-md-12">
								<label class="form-label">Estado</label>
								<select class="form-select" id="sltEstado" required>
								<option value="">Estado</option>
                                <option value="1">Acre</option>
                                <option value="2">Alagoas</option>
                                <option value="3">Amapá</option>
                                <option value="4">Amazonas</option>
                                <option value="5">Bahia</option>
                                <option value="6">Ceará</option>
								<!-- <option value="6" selected>Ceará</option> -->
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

				<div class="col-xxl-5 mb-5 ms-5 mb-xxl-0">
					<div class="bg-secondary-soft mt-5 px-4 py-5 rounded">
						<div class="row g-3">
							<h2 class="my-4 mb-4 mt-0 infos"><i class="fa-solid fa-phone me-2"></i>INFORMAÇÕES DE CONTATO</h2>
					
							<div class="col-md-12">
								<label for="exampleInputPassword2" class="form-label">Telefone</label>
								<input class="form-control" type="tel" id="telTelefone" placeholder="" maxlength="15" required>
								<!-- <input class="form-control" type="tel" id="telTelefone" value="(85) 99812-4767" placeholder="" maxlength="15" required> -->
							</div>
							
							<div class="col-md-12">
								<label for="exampleInputPassword3" class="form-label">E-mail</label>
								<input class="form-control" type="email" id="emEmail2" placeholder="" disabled>
								<!-- <input class="form-control" type="email" id="emEmail2" value="tiagorosa@gmail.com" placeholder="" disabled> -->
							</div>
						</div>
					</div>
					
					<div class="col-xxl-12">
						<button type="submit" class="botao btn mt-5 mb-0 text-center align-items-center">SALVAR EDIÇÕES</button>
					</div>
				</div>
			</div>
		</div>
	</div>


	<?php
        // Inclui o arquivo 'footer.php', que geralmente contém código HTML e PHP relacionado ao rodapé da página
        include_once 'footer.php';
    ?>