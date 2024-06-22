<?php

  require("config.php");
  include("src/ArtigoDto.php");

  $artigoDto = new ArtigoDto($mysql);
  $artigo = $artigoDto->encontrarPorId($_GET["id"]);
  
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Meu Blog</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./styles/index.css">
</head>

<body>
    <div id="container">
        <h1>
            <?php echo $artigo["titulo"]; ?>
        </h1>
        <p>
            <?php echo nl2br($artigo["conteudo"]) ?>
        </p>
        <div>
            <a class="botao botao-block" href="index.php">Voltar</a>
        </div>
    </div>
</body>

</html>