<?php

class ProdutoRepositorio {
    private PDO $pdo; //var do tipo PDO

    /**
     * @param PDO $pdo
     */

     //contrutor do pdo
     public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
     }

     // Define um método que retorna um array com opções de lanches
     public function opcoesLanches(): array {
        // Define a query SQL que seleciona todos os produtos cujo tipo é 'Hambúrger'
        $sql = "select * from produtos where tipo = 'Hambúrguer'";
        // Executa a consulta no banco de dados utilizando o objeto PDO e armazena o resultado
        $statement = $this->pdo->query($sql);
        // Obtém todos os resultados da consulta em formato de array associativo
        $produtosLanches = $statement->fetchAll(PDO::FETCH_ASSOC);
        // Aplica uma função a cada elemento do array $produtosLanches
        $dadosLanches = array_map(function($lanches){
            // Converte cada registro em um objeto específico usando o método formarObjeto
            return $this->formarObjeto($lanches);
            // O array_map percorre o array de $produtosLanches e transforma os dados
        }, $produtosLanches);
        // Retorna o array de objetos de lanches
        return $dadosLanches;
     }

     public function buscarDados(): array {
        $sqlBuscar = "select * from produtos";
        $statement = $this->pdo->query($sqlBuscar);
        $todosProdutos = $statement->fetchAll(PDO::FETCH_ASSOC);

        $dadosGeral = array_map(function($bebidas){
            return $this->formarObjeto($bebidas);
        }, $todosProdutos);

        return $dadosGeral;
     }



     public function buscar(int $id) {
        $sql = "SELECT * FROM produtos WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $id);
        $statement->execute();

        $dados = $statement->fetch(PDO::FETCH_ASSOC);

        return $this->formarObjeto($dados);
     }

     

     public function opcoesBebidas(): array {
        $sql = "select * from  produtos where tipo = 'Bebida' ";

        $statement = $this->pdo->query($sql);

        $produtosBebidas = $statement->fetchAll(PDO::FETCH_ASSOC);

        $dadosBebidas = array_map(function($bebidas){
            return $this->formarObjeto($bebidas);
        }, $produtosBebidas);

        return $dadosBebidas;
     }


     public function salvar(Produto $produto) {
        // Define a consulta SQL para inserir um novo produto
        $sql = "insert into produtos (nome, descricao, valor, tipo, img) values (?, ?, ?, ?, ?)";
        // Prepara a consulta para execução no banco de dados
        $statement = $this->pdo->prepare($sql);
        // Vincula os valores do objeto $produto aos placeholders da consulta SQL
        $statement->bindValue(1, $produto->getNome());
        $statement->bindValue(2, $produto->getDescricao());
        $statement->bindValue(3, $produto->getValor());
        $statement->bindValue(4, $produto->getTipo());
        $statement->bindValue(5, $produto->getImagem());
        // Executa a consulta para inserir os dados no banco de dados
        $statement->execute();
     }


     public function deletar(int $id) {
        // Consulta SQL para deletar um registro com base no id
        $sql = "DELETE FROM produtos WHERE id = ?";
        
        // Prepara a consulta para execução
        $statement = $this->pdo->prepare($sql);
        
        // Vincula o valor do parâmetro id ao placeholder
        $statement->bindValue(1, $id);
        
        // Executa a consulta para deletar o registro
        $statement->execute();
    }


    private function formarObjeto($dados) {
        return new Produto(
            $dados['id'],          // ID
            $dados['nome'],        // Nome
            $dados['descricao'],   // Descrição
            $dados['valor'],       // Valor
            $dados['tipo'],         // Tipo
            $dados['img']         // Imagem
        );
    }

    public function editar(Produto $produto) {
        $sql = "UPDATE produtos SET img = ?, nome = ?, descricao = ?, valor = ?, tipo = ? WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $produto->getImagem());
        $statement->bindValue(2, $produto->getNome());
        $statement->bindValue(3, $produto->getDescricao());
        $statement->bindValue(4, $produto->getValor());
        $statement->bindValue(5, $produto->getTipo());
        $statement->bindValue(6, $produto->getId());
        $statement->execute();
    }

    public function buscarTodos(): array {
        $sql = "SELECT * FROM produtos ORDER BY valor";
        $statement = $this->pdo->query($sql);
        $produtos = $statement->fetchAll(PDO::FETCH_ASSOC);

        $todosDados = array_map(function ($produto){
            return $this->formarObjeto($produto);
        },$produtos);

        return  $todosDados;
    }

}//Fim classe

?>