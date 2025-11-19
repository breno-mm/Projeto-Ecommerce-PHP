<?php
require_once(__DIR__ . "/../Model/Produtos-Model.php");
require_once(__DIR__ . "/../Service/Produtos-Service.php");


class ProdutosController
{
    private $conn;
    private $produtos;

    public function __construct()
    {
        $this->conn = new Conexao();
        $this->conn = $this->conn->getinstance();
        $this->produtos = new Produtos();
    }

    public function registro($nomeProduto, $codigoFornecedor, $foto, $codigoUnidade, $precoUnitario, $codigoCategoria)
    {

        $this->produtos->__set('nomeProduto', $nomeProduto)
            ->__set('codigoFornecedor', $codigoFornecedor)
            ->__set('foto', $foto)
            ->__set('codigoUnidade', $codigoUnidade)
            ->__set('precoUnitario', $precoUnitario)
            ->__set('codigoCategoria', $codigoCategoria);


        $objS = new ProdutosService($this->conn, $this->produtos);
        return $objS->registro();
    }

    public function atualiza($codigoProduto, $nomeProduto, $codigoFornecedor, $codigoUnidade, $precoUnitario, $codigoCategoria)
    {

        $this->produtos->__set('codigoProduto', $codigoProduto)
            ->__set('nomeProduto', $nomeProduto)
            ->__set('codigoFornecedor', $codigoFornecedor)
            ->__set('codigoUnidade', $codigoUnidade)
            ->__set('precoUnitario', $precoUnitario)
            ->__set('codigoCategoria', $codigoCategoria);

        $objS = new ProdutosService($this->conn, $this->produtos);
        return $objS->atualiza();
    }

    public function remover($codigoProduto)
    {
        $this->produtos->__set('codigoProduto', $codigoProduto);
        $objS = new ProdutosService($this->conn, $this->produtos);
        return $objS->remover();
    }

    public function buscaCodigo($codigoProduto)
    {
        $this->produtos->__set('codigoProduto', $codigoProduto);
        $objS = new ProdutosService($this->conn, $this->produtos);
        $tarefa = $objS->buscaCodigo();
        return $tarefa['0'];
    }

    public function buscaPorFornecedor($codigoFornecedor)
    {
        $this->produtos->__set('codigoFornecedor', $codigoFornecedor);
        $objS = new ProdutosService($this->conn, $this->produtos);
        return $objS->buscaPorFornecedor($codigoFornecedor);
    }

    public function buscaNome($nome){
        $this->produtos->__set('nomeProduto', $nome);
        $objS = new ProdutosService($this->conn, $this->produtos);
        return $objS->buscaNome($nome);
    }

    public function buscaTodos()
    {
        $objS = new ProdutosService($this->conn, $this->produtos);
        return $objS->buscaTodos();
    }


}