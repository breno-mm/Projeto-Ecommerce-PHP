<?php

class Pedidos
{

    private $codigoPedidos;
    private $CodigoCliente;
    private $dataEnvio;
    private $dataPedido;

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