<?php

    require("config.php");
    include 'src/ArtigoDto.php';
    
    $artigo = new ArtigoDto($mysql);
    $artigos = $artigo->exibirTodos();
    
    

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Meu Blog</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles/index.css">
</head>

<body>
    
    <div id="container">
        <h1>Meu Blog</h1>
        <?php foreach ($artigos as $artigo): ?>
            <h2>
                <a href="<?php echo "artigo.php" . "?id=" . $artigo["id"] ?>">
                    <?php echo $artigo["titulo"] ?>
                </a>
            </h2>
            <p>
                <?php echo nl2br($artigo["conteudo"]) ?>
            </p>
        <?php endforeach; ?>
        
    </div>
</body>

</html>

