<?php

    require("../config.php");
    include("../src/ArtigoDto.php");
    require ("../src/utils/redirect.php");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $artigoForm = new ArtigoDto($mysql);
        $artigoForm->adicionar();

        redirect('./index.php');
    }

    // echo "\n<pre>";
    // var_dump($_SERVER);
    // echo "</pre>";
    

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./../styles/index.css">
    <title>Adicionar Artigo</title>
</head>

<body>
    <div id="container">
        <h1>Adicionar Artigo</h1>
        <form action="adicionar-artigo.php" method="post" >
            <p>
                <label for="">Digite o título do artigo</label>
                <input class="campo-form" type="text" name="titulo" id="titulo" />
            </p>
            <p>
                <label for="">Digite o conteúdo do artigo</label>
                <textarea class="campo-form" type="text" name="conteudo" id="conteudo"></textarea>
            </p>
            <p>
                <button class="botao">Criar Artigo</button>
            </p>
        </form>
    </div>
</body>

</html>