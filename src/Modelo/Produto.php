<?php
//Orientação a Objetos (Classes)
class Produto {
    private ?int $id; //criar na hora as variaveis
    private string $imagem;
    private string $nome;
    private string $descricao;
    private float $valor;
    private string $tipo;

    //Construtor para setar dados no objeto Produto
    //?int: O valor pode ser um número inteiro ou null
    public function __construct(?int $id, string $nome, string $descricao, float $valor, string $tipo, string $imagem = 'Sei-la.png') 
    { //Parametros a setar
    $this->id = $id; //$this-> : se refere a instancia atual na classe, é a referência ao próprio objeto sendo criado
    $this->nome = $nome;
    $this->descricao = $descricao;
    $this->valor = $valor;
    $this->tipo = $tipo;
    $this->imagem = $imagem;
    }

    //Setar get(), será apenas para consulta
    public function getId(): int {
        return $this->id;
    }

    public function getImagem(): string {
        return $this->imagem;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function getDescricao(): string {
        return $this->descricao;
    }

    public function getValor(): float {
        return $this->valor;
    }

    public function getTipo(): string {
        return $this->tipo;
    }

    public function getImagemDiretorio(): string {
        return "img/".$this->imagem;
    }

    public function getValorFormatado():string {
        return "R$ ".number_format($this->valor,2);
    }
    //Setar imagem
    public function setImagem(string $imagem): void {
        $this->imagem = $imagem;
    }

}//Fim class


?>