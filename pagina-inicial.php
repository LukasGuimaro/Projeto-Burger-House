<?php
require "src/conexao.php";
require "src/Modelo/Produto.php";
require "src/Repositorio/ProdutoRepositorio.php";

$produtosRepositorio = new ProdutoRepositorio($pdo);
$dadosLanches = $produtosRepositorio->opcoesLanches();
$dadosBebidas = $produtosRepositorio->opcoesBebidas();

// var_dump($dadosBebidas);

// echo "Saindo";
// exit;
?>


<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="shortcut icon" href="img/logoBurger.jpg" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>BurgerHouse</title>
</head>
<body>
    <main>
        <section class="container-banner">
            <div class="container-texto-banner">
                <!-- <img src="img/logoSemFundo.png" class="logo" alt="logo-lanchonete"> -->
            </div>
        </section>
        <h2>Cardápio Digital</h2>
        <section class="container-cafe-manha">
            <div class="container-cafe-manha-titulo">
                <h3>Opções de Lanches</h3>
                <img class= "ornaments" src="img/logoSemFundo.png" alt="ornaments">
            </div>

            <div class="container-cafe-manha-produtos">
            
            <?php foreach($dadosLanches as $produto): ?>

                <div class="container-produto">
                    <div class="container-foto">
                        <img src="<?= $produto->getImagemDiretorio() ?>">
                    </div>
                    <p><?= $produto->getNome() ?></p>
                    <p><?= $produto->getDescricao() ?></p>
                    <p><?= $produto->getValor() ?></p>
                </div>

            <?php endforeach; ?>
            </div>
            </section>
            
        
        <section class="container-almoco">
            <div class="container-almoco-titulo">
                <br>
                <h3>Opções para Bebidas</h3>
                <img class= "ornaments" src="img/logoSemFundo.png" alt="ornaments">
            </div>

            <div class="container-almoco-produtos">
            
                <?php foreach($dadosBebidas as $produto): ?>
                    <?php if($produto->getTipo() == "Bebida"): ?>

                        <div class="container-produto">
                        <div class="container-foto">
                            <img src=" <?=$produto->getImagemDiretorio()?> ">
                        </div>
                        <p><?= $produto->getNome() ?></p>
                        <p><?= $produto->getDescricao() ?></p>
                        <p><?= $produto->getValor() ?></p>
                        </div>

                    <?php endif; ?>
                <?php endforeach; ?>

            </div>


        </section>
    </main>
</body>
</html>