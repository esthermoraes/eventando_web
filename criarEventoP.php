<?php
    // Variavel padrão do primeiro passo
    $passo = 1;
    // Define a variável $header como 3
    $header = 3;
    // Define a variável $css com um link para um arquivo CSS externo chamado 'css_criarEventoP.css'
    $css = '<link rel = "stylesheet" type = "text/css" href = "css/css_criarEventoP.css" />';
    // Define a variável $js com um link para um arquivo JavaScript externo chamado 'js_criarEventoP.js' e com o atributo 'defer'
    $js = '<script src="js/js_cep.js" defer></script>';
    // Define a variável $title como 'CRIAR EVENTO PRESENCIAL', que será o título da página
    $title = 'CRIAR EVENTO PRESENCIAL';
    // Inclui o arquivo 'header.php', que contém código HTML e PHP
    include_once 'BD/web/header.php';    
    include_once 'BD/web/criar_evento_presencial.php';

    // deixei o POST para debugar os valores de acordo com os passos
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";

    // Verifica se o nome foi enviado
    if (isset($_POST['eventFormat'])) {
        $nome = htmlspecialchars($_POST['nome']);
    } 
    else {
        echo '<p>Nenhum nome foi enviado.</p>';
    }

    if (isset($_POST["proximo_passo"])) { // se algum botão de passo foi pressionado 
        $passo = $_POST['passo'] ?? $passo; // pega o passo atual e salva o array

        $_SESSION['passo_' . $passo] = $_POST;

        $passo++; // avança ao próximo passo
    }
?>

<div class="container-fluid mt-5 ms-0 d-flex justify-content-between titulo">
    <p class="ms-3">INFORMAÇÕES DO EVENTO</p>
    <p class="me-3"> <?php echo htmlspecialchars($nome);?> </p>
</div>

<div class="container-fluid  p-0 bagulhete d-flex">
    <!-- <div class="div_passos">
        <div id="btn-passo1" class="passo1 mb-2">
            <p class="m-0">PASSO 1</p>
        </div>
        <div class="passo2 mb-2">
            <p class="m-0">PASSO 2</p>
        </div>
        <div class="passo3">
            <p class="m-0">PASSO 3</p>
        </div>
    </div> -->

    <form method="POST" enctype="multipart/form-data" class="w-100 row p-4 div-passo1 <?= ($passo == 1) ? 'd-flex' : 'd-none' ?>">
        <input type="hidden" name="passo" value="1">
        <div class="col-md-6">
            <input type="file" id="inputImagem" name="imagem" accept="image/*" onchange="previewImagem(event)" required>
            <img id="preview" src="#" alt="Prévia da Imagem" style="display: none;" width="200px">
        </div>

        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <input placeholder="Objetivo do evento" class="obj form-control" name="objetivo" required>
                </div>

                <div class="col-md-6">
                    <input class="form-control me-3" type="text" id="date" placeholder="Data Prevista" 
                    onfocus="(this.type='date')" onblur="(this.type='text')" name="data_prevista" required>
                </div>
                <div class="col-md-6">
                    <input class="form-control horario" type="text" id="time" placeholder="Horário" 
                    onfocus="(this.type='time')" onblur="(this.type='text')" name="hotario" required>
                </div>
            </div>
        </div>

        <div class="col-md-6 mt-3">
            <h5><strong>Localização</strong></h5>
            <div class="row">
                <div class="col-md-6">
                    <input id="cep" class="form-control" name="cep" placeholder="CEP" required>
                </div>

                <div class="col-md-6">
                    <select class="w-100 form-select uf" id="sltEstado" name="estado" required>
                        <option value="">Estado</option>
                        <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="DF">Distrito Federal</option>
                        <option value="ES">Espirito Santo</option>
                        <option value="GO">Goiás</option>
                        <option value="MA">Maranhão</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Pará</option>
                        <option value="PB">Paraíba</option>
                        <option value="PR">Paraná</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocantins</option>
                    </select>
                </div>

                <div class="col-md-12">
                    <input placeholder="Cidade" name="cidade" id="cidade" class="w-100 form-control" readonly="">
                </div>

                <div class="col-md-12">
                    <input placeholder="Bairro" name="bairro" id="bairro" class="w-100 form-control" readonly="">
                </div>


                <div class="col-md-3">
                    <select class="form-select" id="sltTipoLogradouro" name="tipo_logradouro" required>
                        <option value="">Tipo Logradouro</option>
                        <option value="Rodovia">Rodovia</option>
                        <option value="Avenida">Avenida</option>
                        <option value="Alameda">Alameda</option>
                        <option value="Praça">Praça</option>
                        <option value="Rua">Rua</option>
                        <option value="Passarela">Passarela</option>
                        <option value="Vila">Vila</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <input placeholder="Logradouro" name="logradouro" class="form-control log w-100" id="logradouro" readonly/>
                </div>
                <div class="col-md-3">
                    <input placeholder="N°" id="numero" class="form-control num w-100" name="numero" required/>
                </div>

            </div>
        </div>

        <div class="col-md-6 mt-3">
            <h5><strong>Complementos</strong></h5>

            <div class="row">
                <div class="col-md-6">
                    <textarea id="buffet" name="buffet" placeholder="Buffet" class="w-100 form-control buffet"></textarea>
                </div>

                <div class="col-md-6">
                    <textarea name="atracoes" placeholder="Atrações" class="w-100 form-control atracoes"></textarea>
                </div>
            </div>
            <div class="row infos-sec">
                <div class="col-md-6">
                    <div class="d-flex justify-content-between">
                        <select class="w-100 form-select " name="tipo_contato">
                            <option value="">Tipo de Contato</option>
                            <option value="1">E-mail</option>
                            <option value="2">Telefone</option>
                            <option value="3">Facebook</option>
                            <option value="4">Instagram</option>
                            <option value="5">Tik Tok</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <input class="w-100 info form-control" placeholder="Contato" name="contato"/>
                </div>
            </div>

            <div class="row">
                <div id="privacidade" estado="publico" class="d-flex publico_privado">
                    <i class="mt-2 fa-solid fa-unlock fa-flip-horizontal fa-xl" style="color: #b25abf;"></i>
                    <p class="ms-2 pp">Público</p>
                    <input type="hidden" name="privacidade" id="privado" value="false"/>
                </div>
                <input type="hidden" name="nome" value = <?php echo htmlspecialchars($nome);?>/>
            </div>
        </div>

        <div class="col-md-12 d-flex justify-content-end">
            <button type="submit" name="proximo_passo" class="botao">
                CRIAR EVENTO
            </button>
        </div>
    </form>

    <!-- <form method="POST" class="w-100 div-passo2 justify-content-center flex-wrap <?= ($passo == 2) ? 'd-flex' : 'd-none' ?>">

        <input type="hidden" name="passo" value="2">

        <div class="container ">
            <div class="row mt-5" style="padding:0px 150px">
                <div class="d-flex form-convidado">
                    <input type="text" name="nome_convidado" id="" class="p-2 me-2 form-control" placeholder="Nome do Convidado">
                    <input type="email" name="email_convidado" id="" class="p-2 form-control" placeholder="Email do Convidado">
                    <div class="col-md-2">
                        <button type="button" class="p-2" style="width:-webkit-fill-available" id="adicionar_convidado">ADICIONAR</button>
                    </div>
                </div>

                <div>
                    <table class="table table-hover" id="selecao_convidados">
                        <thead>
                            <tr style="background: #bedef2">
                                <th scope="col">N°</th>
                                <th scope="col">Convidado</th>
                                <th scope="col">Email</th>
                            </tr>
                        </thead>
                        <tbody style="background: #ededed">
                            <tr>
                                <td colspan="3">
                                    <center><i>Não há convidados</i></center>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-md-12 d-flex justify-content-end">
                    <button type="submit" name="proximo_passo" class="botao">&#10140; PRÓXIMO PASSO</button>
                </div>
            </div>
        </div>
    </form>

    <form method="POST" class="w-100 div-passo3 justify-content-center flex-wrap <?= ($passo == 3) ? 'd-flex' : 'd-none' ?>">
        <input type="hidden" name="passo" value="3">

        <div class="w-100 justify-content-center flex-wrap m-5">
            <div class="w-50 div-passo3" style="background-color: #ebf6fc;">
                <p class="fs-2 ms-3">Estilo</p>
                <div class="d-flex">
                    <div class="p-3">
                        <img src="img/convite1.png" alt="foto convite" class="convite modelo-convite active" data-modelo="1">
                    </div>
                    <div class="p-3">
                        <img src="img/convite2.png" alt="foto convite" class="convite modelo-convite" data-modelo="2">
                    </div>
                    <div class="p-3">
                        <img src="img/convite3.png" alt="foto convite" class="convite modelo-convite" data-modelo="3">
                    </div>
                </div>

            </div>

            <div class="mt-3 w-50 div-passo3" style="background-color: #ebf6fc;">
                <p class="fs-2 ms-3">Cores</p>
                <div class="d-flex m-3 p-3 justify-content-around">
                    <div class="row m-0">
                        <div class="p-3 convite convite-cor col-md-4 mb-2 active" data-cor="209, 89, 62" style="background-color: rgb(209,89,62)"></div>
                        <div class="p-3 convite convite-cor col-md-4 mb-2" data-cor="184, 41, 75" style="background-color: rgb(184, 41, 75)"></div>
                        <div class="p-3 convite convite-cor col-md-4 mb-2" data-cor="120, 72, 173" style="background-color: rgb(120, 72, 173)"></div>
                    </div>
                    <div class="row m-0">
                        <div class="p-3 convite convite-cor col-md-4 mb-2" data-cor="36, 102, 52" style="background-color: rgb(36, 102, 52)"></div>
                        <div class="p-3 convite convite-cor col-md-4 mb-2" data-cor="73, 148, 143" style="background-color: rgb(73, 148, 143)"></div>
                        <div class="p-3 convite convite-cor col-md-4 mb-2" data-cor="171, 65, 0" style="background-color: rgb(171, 65, 0)"></div>
                    </div>
                    <div class="row m-0">
                        <div class="p-3 convite convite-cor col-md-4 mb-2" data-cor="0, 0, 0" style="background-color: rgb(0, 0, 0)"></div>
                        <div class="p-3 convite convite-cor col-md-4 mb-2" data-cor="255, 100, 100" style="background-color: rgb(255, 100, 100)"></div>
                        <div class="p-3 convite convite-cor col-md-4 mb-2" data-cor="160, 177, 255" style="background-color: rgb(160, 177, 255)"></div>
                    </div>
                </div>

            </div>



            <div class="w-50 div-passo3" style="background-color: #ebf6fc;min-height: 600px;">
                <p class="fs-2 ms-3">Convite</p>
                <div class="d-flex justify-content-start">
                    <div class="p-3">

                        <div style="max-width: 600px;"> 
                            <iframe id="preview_modelo" src="./cartaz_evento.php" frameborder="0" class="convitePronto"></iframe>
                        </div>
                    </div>


                    <div class="">
                        <div class="mt-5">
                            <a href="#">
                                <button type="" id="btn-passo2" class="botao2 m-3"><i class="fa-solid fa-download me-2"></i>BAIXAR</button>
                            </a>
                        </div>
                        <div class="mt-5">
                            <a href="#">
                                <button type="" id="btn-passo2" class="botao2 m-3"><i class="fa-solid fa-share-nodes me-2"></i>COMPARTILHAR</button>
                            </a>
                        </div>
                        <div class="mt-5">
                            <button type="" id="btn-passo2" class="botao2 m-3"><i class="fa-solid fa-check me-2"></i>SALVAR CONVITE</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end mt-2 mb-2">
                <a href="visualizarEventoP.php" class="botao d-flex justify-content-center align-items-center">
                    <i class="fa-solid fa-eye me-2"></i>
                    VISUALIZAR EVENTO
                </a>
            </div>
        </div>

    </form> -->

</div>
</body>

</html>