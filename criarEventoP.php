<?php 
    // Define a variável $header como 3
    $header = 3;
    // Define a variável $css com um link para um arquivo CSS externo chamado 'css_criarEventoP.css'
    $css = '<link rel = "stylesheet" type = "text/css" href = "css/css_criarEventoP.css" />';
    // Define a variável $js com um link para um arquivo JavaScript externo chamado 'js_criarEventoP.js' e com o atributo 'defer'
    $js = ' <script src="js/js_criarEventoP.js" defer></script>';
    // Define a variável $title como 'CRIAR EVENTO PRESENCIAL', que será o título da página
    $title = 'CRIAR EVENTO PRESENCIAL';
    // Inclui o arquivo 'header.php', que contém código HTML e PHP
    include_once 'header.php';
?>

    <div class="container-fluid mt-5 ms-0 d-flex justify-content-between titulo">
        <p class="ms-3">INFORMAÇÕES DO EVENTO</p>
        <p class="me-3">Nome do Evento</p>
    </div>
    <div class="container-fluid d-flex p-0 bagulhete">
        <div class="div_passos">
            <div id="btn-passo1" class="passo1 mb-2">
                <p class="m-0">PASSO 1</p>
            </div>
            <div class="passo2 mb-2">
                <p class="m-0">PASSO 2</p>
            </div>
            <div class="passo3">
                <p class="m-0">PASSO 3</p>
            </div>
        </div>
        <div class="w-100 div-passo1">
            <div class="div-form">
                <form class="d-flex flex-wrap">
                    <div class="div-img d-flex flex-wrap w-100">
                        <div class="col-5">
                            <label class="imagem" for="file">FOTO DO EVENTO</label>
                            <input id="file" type="file"/>
                        </div>
                        <div class="col-5 ms-5 w-50">
                            <input placeholder="Objetivo do evento" class="obj form-control"/>
                            <div class="d-flex justify-content-between mt-5">
                                <input class="form-control me-3" type="text" id="date" placeholder="Data Prevista" onfocus="(this.type='date')" onblur="(this.type='text')">
                                <input class="form-control horario" type="text" id="time" placeholder="Horário" onfocus="(this.type='time')" onblur="(this.type='text')"/>
                            </div>
                        </div>
                            <!-- <div class="d-flex align-items-center datetime"></div> -->
                    </div>
                    <div class="lado1">
                        <div class="endereco">
                            <label for="cep" class="mb-3 localizacao">Localização:</label>
                            <div class="d-flex cep-estado">
                                <input id="cep" class="form-control" placeholder="CEP"/>
                                <select class="form-select uf me-5" id="sltEstado">
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
                            <div class="d-flex flex-column pe-5">
                                <input placeholder="Cidade" class="form-control" readonly/>
                                <input placeholder="Bairro" class="form-control" readonly/>
                            </div>
                            <div class="d-flex justify-content-between pe-5">
                                <select class="form-select me-2">
                                    <option value="">Tipo Logradouro</option>
                                    <option value="1">Rodovia</option>
                                    <option value="2">Avenida</option>
                                    <option value="3">Alameda</option>
                                    <option value="4">Praça</option>
                                    <option value="5">Rua</option>
                                    <option value="6">Passarela</option>
                                    <option value="7">Vila</option>
                                </select>
                                <input placeholder="Logradouro" class="form-control log" readonly/>
                                <input placeholder="N°" class="ms-2 form-control num"/>
                            </div>
                        </div>
                    </div>
                    <div class="ms-5 lado2">                
                        <div class = "col- w-100">
                            <label class="mb-3 complemento" for="buffet">Complementos:</label>
                            <div class="mb-3 d-flex justify-content-between">
                                <textarea id = "buffet" placeholder="Buffet" class="form-control buffet"></textarea>
                                <textarea placeholder="Atrações" class="form-control atracoes"></textarea>
                            </div>
                            <div class="d-flex justify-content-between">
                                <select class="form-select info">
                                    <option value="">Tipo de Contato</option>
                                    <option value="1">E-mail</option>
                                    <option value="2">Telefone</option>
                                    <option value="3">Facebook</option>
                                    <option value="4">Instagram</option>
                                    <option value="5">Tik Tok</option>
                                </select>
                                <input class="info form-control" placeholder="Contato"/>
                            </div>
                            <div id="privacidade" estado="publico" class="mt-4 d-flex publico_privado">
                                <i class="mt-2 fa-solid fa-unlock fa-flip-horizontal fa-xl" style="color: #b25abf;"></i>
                                <p class="ms-2 pp">Público</p>
                            </div>

                            <div class="d-flex justify-content-end">
                                <a href="passo2.php" >
                                    <button type="submit" id="btn-passo2" class="botao">&#10140; PRÓXIMO PASSO</button>
                                </a>
                            </div>
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="w-100 div-passo2 d-none justify-content-center flex-wrap">
            <div class="w-100 d-flex justify-content-center mt-5">
                <form action="" class="d-flex form-convidado ms-4">
                    <input type="text" name="" id="" class="p-2 m-2" placeholder="Nome do Convidado">
                    <input type="email" name="" id="" class="p-2 m-2" placeholder="Email do Convidado">
                    <button type="submit"class="m-2">ADICIONAR</button>
                </form>
            </div>
            <div class="">
                <div class="lista">
                    <table class="table table-hover">
                        <thead>
                            <tr style="background: #bedef2">
                                <th scope="col">N°</th>
                                <th scope="col">Convidado</th>
                                <th scope="col">Email</th>
                            </tr>
                        </thead>
                        <tbody style="background: #ededed">
                            <tr>
                                <th scope="row">1</th>
                                <td>Esther Moraes</td>
                                <td>tete@gmail.com</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Lorena Toraes</td>
                                <td>lore@gmail.com</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Yasmin Santana</td>
                                <td>mamin@gmail.com</td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>Anna Padilha</td>
                                <td>padilha@gmail.com</td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td>Sofia Nascimento</td>
                                <td>sofi@gmail.com</td>
                            </tr>
                            <tr>
                                <th scope="row">6</th>
                                <td>Davi Salles</td>
                                <td>salles@gmail.com</td>
                            </tr>
                            <tr>
                                <th scope="row">7</th>
                                <td>Harian Adami</td>
                                <td>ariel@gmail.com</td>
                            </tr>
                            <tr>
                                <th scope="row">8</th>
                                <td>Daniel Trindade</td>
                                <td>danidani@gmail.com</td>
                            </tr>
                            <tr>
                                <th scope="row">9</th>
                                <td>Moises Omena</td>
                                <td>omena@gmail.com</td>
                            </tr>
                            <tr>
                                <th scope="row">10</th>
                                <td>Felipe Frechiani</td>
                                <td>frechiani@gmail.com</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <div class="d-flex justify-content-end mt-2 mb-2">
                    <a href="passo3.php">
                        <button type="submit" id="btn-passo2" class="botao">&#10140; PRÓXIMO PASSO</button>
                    </a>
                </div>
            </div>
        </div>

        <div class="w-100 div-passo2 d-none justify-content-center flex-wrap">
            <div class="" style="background-color: #ebf6fc;">
                <p>CONVITE</p>
            </div>
        </div>
    </div>
</body>
</html>
