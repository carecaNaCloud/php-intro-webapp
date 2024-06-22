<?php

    require('../config.php');
    include('../src/ArtigoDto.php');
    require ("../src/utils/redirect.php");

    $artigoFetch = new ArtigoDto($mysql);

    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        $artigo = $artigoFetch->encontrarPorId($_GET["id"]);
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $artigoFetch->atualizar($_POST["id"]);
        redirect("./index.php");
    }

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" type="text/css" href="../styles/index.css">
    <meta charset="UTF-8">
    <title>Editar Artigo</title>
</head>

<body>
    <div id="container">
        <h1>Editar Artigo</h1>
        <form action="editar-artigo.php" method="post">
            <p>
                <label for="titulo">Digite o novo título do artigo</label>
                <input class="campo-form" type="text" name="titulo" id="titulo" value="<?php echo $artigo["titulo"] ?>" />
            </p>
            <p>
                <label for="conteudo">Digite o novo conteúdo do artigo</label>
                <textarea class="campo-form" type="text" name="conteudo" id="titulo">
                    <?php echo $artigo["conteudo"] ?>
                </textarea>
            </p>
            <p>
                <input type="hidden" name="id" value="<?php echo $artigo["id"] ?>" />
            </p>
            <p>
                <button class="botao">Editar Artigo</button>
            </p>
        </form>
    </div>
</body>

</html>