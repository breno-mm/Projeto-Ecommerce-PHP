<?php

class Categorias
{

    private $codigoCategoria;
    private $nomeCategoria;

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