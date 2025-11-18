<?php
class Clientes
{

    private $codigoCliente;
    private $nomeCliente;
    private $email;
    private $senha;
    private $CPF;
    private $telefoneFixo;
    private $telefoneCelula;
    private $logradouro;
    private $numero;
    private $complemento;
    private $bairro;
    private $cidade;
    private $estado;
    private $CEP;

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