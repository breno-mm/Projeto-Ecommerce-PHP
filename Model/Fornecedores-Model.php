<?php

class Fornecedores
{

    private $codigoFornecedor;
    private $nomeFornecedor;
    private $email;
    private $senha;
    private $CNPJ;
    private $fax;
    private $telefoneFixo;
    private $telefoneCelular;
    private $site;
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