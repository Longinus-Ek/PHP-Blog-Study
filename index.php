<?php
namespace site\erick\blog;

include 'artigos.php';

$artigo = new Artigo();
$artigos = $artigo->recuperaArtigos();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Meu Blog</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div id="container">
        <h1>Meu Blog</h1>
        <?php foreach($artigos as $artigo): // Abrindo foreach dos artigos?>
        <h2>
            <a href="<?php echo $artigo['link']; ?>">
                <?php echo $artigo['titulo']; ?>
            </a>
        </h2>
        <p>
            <?php echo $artigo['conteudo']; ?>
        </p>
        <?php endforeach; //Fechando foreach dos artigos?> 
    </div>
</body>

</html>