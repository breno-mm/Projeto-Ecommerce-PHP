<?php
require_once __DIR__ . "/../Model/Fornecedores-Model.php";
require_once __DIR__ . "/../Service/Fornecedores-Service.php";

class FornecedoresController
{
    private $conn;
    private $fornecedores;

    public function __construct()
    {
        $this->conn = new Conexao();
        $this->conn = $this->conn->getinstance();
        $this->fornecedores = new Fornecedores();
    }

    public function registro($nomeFornecedor, $CNPJ, $fax, $telefoneFixo, $telefoneCelular, $site, $logradouro, $numero, $complemento, $bairro, $cidade, $estado, $CEP)
    {

        $this->fornecedores->__set('nomeFornecedor', $nomeFornecedor)
            ->__set('CNPJ', $CNPJ)
            ->__set('fax', $fax)
            ->__set('telefoneFixo', $telefoneFixo)
            ->__set('telefoneCelular', $telefoneCelular)
            ->__set('site', $site)
            ->__set('logradouro', $logradouro)
            ->__set('numero', $numero)
            ->__set('complemento', $complemento)
            ->__set('bairro', $bairro)
            ->__set('cidade', $cidade)
            ->__set('estado', $estado)
            ->__set('CEP', $CEP);

        $objS = new FornecedoresService($this->conn, $this->fornecedores);
        return $objS->registro();
    }

    public function atualiza($codigoFornecedor, $nomeFornecedor, $CNPJ, $fax, $telefoneFixo, $telefoneCelular, $site, $logradouro, $numero, $complemento, $bairro, $cidade, $estado, $CEP)
    {

        $this->fornecedores->__set('codigoFornecedor', $codigoFornecedor)
            ->__set('nomeFornecedor', $nomeFornecedor)
            ->__set('CNPJ', $CNPJ)
            ->__set('fax', $fax)
            ->__set('telefoneFixo', $telefoneFixo)
            ->__set('telefoneCelular', $telefoneCelular)
            ->__set('site', $site)
            ->__set('logradouro', $logradouro)
            ->__set('numero', $numero)
            ->__set('complemento', $complemento)
            ->__set('bairro', $bairro)
            ->__set('cidade', $cidade)
            ->__set('estado', $estado)
            ->__set('CEP', $CEP);

        $objS = new FornecedoresService($this->conn, $this->fornecedores);
        return $objS->atualiza();
    }

    public function remover($codigoFornecedor){
        $this->fornecedores->__set('codigoFornecedor', $codigoFornecedor);
        $objS = new FornecedoresService($this->conn, $this->fornecedores);
        return $objS->remover();
    }

    public function buscaCodigo($codigoFornecedor)
    {
        $this->fornecedores->__set('codigoFornecedor', $codigoFornecedor);
        $objS = new FornecedoresService($this->conn, $this->fornecedores);
        $tarefa = $objS->buscaCodigo();
        return $tarefa['0'];
    }

    public function buscaTodos()
    {
        $objS = new FornecedoresService($this->conn, $this->fornecedores);
        return $objS->buscaTodos();
    }

}