<?php

    require("../config.php");
    include ("../src/ArtigoDto.php");
    require ("../src/utils/redirect.php");

    
    $artigoCon = new ArtigoDto($mysql);

    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        $artigo = $artigoCon->encontrarPorId($_GET["id"]);
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $artigoCon->excluir($_POST["id"]);

        redirect('./index.php');
    }

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" type="text/css" href="../styles/index.css">
    <meta charset="UTF-8">
    <title>Excluir Artigo</title>
</head>

<body>
    <div id="container">
        <h1>Você realmente deseja excluir o artigo abaixo?</h1>
        <h2><?php echo $artigo["id"] . " - " . $artigo["titulo"]; ?></h2>
        <form method="post" action="./excluir-artigo.php">
            <p>
                <input type="hidden" name="id" value="<?php echo $artigo["id"]; ?>" />
                <button class="botao">Excluir</button>
            </p>
        </form>
    </div>
</body>

</html>