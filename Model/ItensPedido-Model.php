<?php

class ItensPedido
{

    private $codigoPedido;
    private $codigoProduto;
    private $quantidade;

    public function __get($atributo)
    {
        require $this->$atributo;
    }

    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
        return $this;
    }
}