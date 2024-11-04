<?php
require "src/conexao.php";
require "src/Modelo/Produto.php";
require "src/Repositorio/ProdutoRepositorio.php";

$produtosRepositorio = new ProdutoRepositorio($pdo);
$todosProdutos = $produtosRepositorio->buscarDados();
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
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="shortcut icon" href="img/logoBurger.jpg" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
  <title>BurgerHouse - Admin</title>
</head>
<body>
<main>
  <section class="container-admin-banner">
    <img src="/img/fundoBurger.jpg" class="logo-admin" alt="logo-serenatto">
    <h1>Admistração BurgerHouse</h1>
    <img class= "ornaments" src="img/logoSemFundo.png" alt="ornaments">
  </section>
  <h2>Lista de Produtos</h2>

  <section class="container-table">
    <table>
      <thead>
        <tr>
          <th>Produto</th>
          <th>Tipo</th>
          <th>Descricão</th>
          <th>Valor</th>
          <th colspan="2">Ação</th>
        </tr>
      </thead>
      <tbody>
      
      <?php foreach($todosProdutos as $produto): ?>

        <tr>
          <td><?= $produto->getNome() ?></td>
          <td><?= $produto->getTipo() ?></td>
          <td><?= $produto->getDescricao() ?></td>
          <td><?= $produto->getValor() ?></td>
          <td>
            <form action="editar" method="post">
              <input type="hidden" name="id" value="<?= $produto->getId() ?>">
              <input type="submit" class="botao-editar" value="Editar">
            </form>
          </td>
          <td>
            <form action="excluir" method="post">
              <input type="hidden" name="id" value="<?= $produto->getId() ?>">
              <!-- <button type="button" class="botao-excluir" value="Excluir">Excluir</button> -->
              <input type="submit" class="botao-excluir" value="Excluir">
            </form>
          </td>
        </tr>

      <?php endforeach; ?>

      </tbody>
    </table>
  <a class="botao-cadastrar" href="cadastrar">Cadastrar produto</a>
  <form action="relatorio" method="post">
    <input type="submit" class="botao-cadastrar" value="Baixar Relatório"/>
  </form>
  </section>
</main>
</body>
</html>