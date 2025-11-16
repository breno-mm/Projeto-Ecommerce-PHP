<?php

class Unidades
{

    private $codigoUnidade;
    private $descricaoUnidade;

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