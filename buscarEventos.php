<?php 
    // Define a variável $header como 2
    $header = 2;
    // Define a variável $css com um link para um arquivo CSS externo
    $css = '<link rel="stylesheet" type="text/css" href="css/css_buscarEventos.css"/>';
    // Define a variável $js com um link para um arquivo JavaScript externo com atributo 'defer'
    $js = '<script src="js/js_menu.js" defer></script>';
    // Define a variável $title como 'MENU'
    $title = 'MENU';
    // Inclui o arquivo 'header.php', que contém código HTML e PHP
    include_once 'BD/web/header.php';
    include_once 'BD/web/buscar_eventos.php';
?>

<body>

    <div class="container">
        <h2>Resultados da Busca</h2>

        <?php
            if (isset($resultados) && $resultados["sucesso"] === 1) {
                if (!empty($resultados["eventos"])) {
        ?>

                    <div class="evento-container">

                        <?php
                            foreach ($resultados["eventos"] as $evento) {
                                $formatoClass = isset($evento["formato"]) ? 'formato-' . $evento["formato"] : '';
                        ?>

                                <div class="evento mb-3 <?php echo $formatoClass; ?>">
                                    <img src="<?php echo $evento["img"]; ?>" alt="Imagem do Evento">
                                </div>

                        <?php
                            }
                        ?>

                    </div>

                <?php
                } 
                else {
                    echo "<p>Nenhum evento encontrado.</p>";
                }
            } 
            else {
                echo "<p>Erro: " . $resultados["erro"] . "</p>";
            }
        ?>
    </div>

</body>

<?php
    // Inclui o arquivo 'footer.php', que geralmente contém código HTML e PHP relacionado ao rodapé da página
    include_once 'BD/web/footer.php';
?>
