<?php
    require "src/conexao.php";
    require "src/Modelo/Produto.php";
    require "src/Repositorio/ProdutoRepositorio.php";

    $produtoRepositorio = new ProdutoRepositorio($pdo);

    if (isset($_POST['editar'])){
      $produto = new Produto($_POST['id'], $_POST['nome'], $_POST['descricao'], $_POST['valor'], $_POST['tipo']);
      if (isset($_FILES['imagem'])){
        $produto->setImagem(uniqid() . $_FILES['imagem']['name']);
        move_uploaded_file($_FILES['imagem']['tmp_name'], $produto->getImagemDiretorio());
        }
        $produtoRepositorio->editar($produto);
        header("Location: admin");
        }else{
            $produto = $produtoRepositorio->buscar($_POST['id']);
        }

        // require_once("inicio-html.php");
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
  <link rel="stylesheet" href="css/admin.css">
  <link rel="stylesheet" href="css/form.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="icon" href="img/icone-serenatto.png" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
  <title>Serenatto - Editar Produto</title>
</head>
<body>
<main>
  <section class="container-admin-banner">
    <!-- <img src="img/fundoBurger.jpg" class="logo-admin" alt="logo-serenatto"> -->
    <h1>Editar Produto</h1>
    <img class= "ornaments" src="img/logoSemFundo.png" alt="ornaments">
  </section>
  <section class="container-form">
    <form action="editar" method="POST" enctype="multipart/form-data">

      <label for="nome">Nome</label>
      <input type="text" id="nome" name="nome" value="<?= $produto->getNome() ?>" required>

      <div class="container-radio">
        <div>
            <label for="Hambúrguer">Lanche</label>
            <input type="radio" id="Hambúrguer" name="tipo" value="Hambúrguer" <?= $produto->getTipo() == "Hambúrguer"? "checked" : "" ?>>
        </div>
        <div>
            <label for="Bebida">Bebida</label>
            <input type="radio" id="Bebida" name="tipo" value="Bebida" <?= $produto->getTipo() == "Bebida"? "checked" : "" ?>>
        </div>
    </div>

      <label for="descricao">Descrição</label>
      <input type="text" id="descricao" name="descricao" value="<?= $produto->getDescricao() ?>" required>

      <label for="valor">Preço</label>
      <input type="text" id="valor" name="valor" value="<?= $produto->getValor() ?>" required>

      <label for="imagem">Envie uma imagem do produto</label>
      <input type="file" name="imagem" accept="image/*" id="imagem" placeholder="Envie uma imagem">
      
      <input type="hidden" name="id" value="<?= $produto->getId()?>">
      
      <input type="submit" name="editar" class="botao-cadastrar"  value="Editar produto"/>
    </form>

  </section>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js" integrity="sha512-Rdk63VC+1UYzGSgd3u2iadi0joUrcwX0IWp2rTh6KXFoAmgOjRS99Vynz1lJPT8dLjvo6JZOqpAHJyfCEZ5KoA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="js/index.js"></script>
</body>
</html>