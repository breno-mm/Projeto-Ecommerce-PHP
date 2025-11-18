<?php

class Produtos
{

    private $codigoProduto;
    private $nomeProduto;
    private $codigoFornecedor;
    private $foto;
    private $codigoUnidade;
    private $precoUnitario;
    private $categoriaProduto;

    public function __get($atributo)
    {
        return $this->$atributo;
    }

    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
        return $this;
    }
}