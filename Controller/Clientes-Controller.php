<?php
require_once "../../Model/Clientes-Model.php";
require_once "../../Service/Clientes-Service.php";


class ClientesController{
    private $conn;
    private $clientes;

    public function __construct() {
        $this->conn = new Conexao();
        $this->conn = $this->conn->getinstance();
        $this->clientes = new Clientes();
	}


    public function registro($nomeCliente, $CPF, $telefoneFixo, $telefoneCelular, $logradouro, $numero, $complemento, $bairro, $cidade, $estado, $CEP){
        
        $this->clientes->__set('nomeCliente', $nomeCliente)
            ->__set('CPF', $CPF)
            ->__set('telefoneFixo', $telefoneFixo)
            ->__set('telefoneCelular', $telefoneCelular)
            ->__set('logradouro', $logradouro)
            ->__set('numero', $numero)
            ->__set('complemento', $complemento)
            ->__set('bairro', $bairro)
            ->__set('cidade', $cidade)
            ->__set('estado', $estado)
            ->__set('CEP', $CEP);
        
        $objS = new ClientesService($this->conn, $this->clientes);
        return $objS->registro();
    }

    public function atualiza($codigoCliente, $nomeCliente, $CPF, $telefoneFixo, $telefoneCelular, $logradouro, $numero, $complemento, $bairro, $cidade, $estado, $CEP){
        
        $this->clientes->__set('codigoCliente', $codigoCliente)
            ->__set('nomeCliente', $nomeCliente)
            ->__set('CPF', $CPF)
            ->__set('telefoneFixo', $telefoneFixo)
            ->__set('telefoneCelular', $telefoneCelular)
            ->__set('logradouro', $logradouro)
            ->__set('numero', $numero)
            ->__set('complemento', $complemento)
            ->__set('bairro', $bairro)
            ->__set('cidade', $cidade)
            ->__set('estado', $estado)
            ->__set('CEP', $CEP);
        
        $objS = new ClientesService($this->conn, $this->clientes);
        return $objS->atualiza();
    }

    public function remover($codigoCliente){
        $this->clientes->__set('codigoCliente', $codigoCliente);
        $objS = new ClientesService($this->conn, $this->clientes);
        return $objS->remover();
    }

    public function buscaCodigo($codigoCliente){
        $this->clientes->__set('codigoCliente', $codigoCliente);
        $objS = new ClientesService($this->conn, $this->clientes);
        $tarefa = $objS->buscaCodigo();
        return $tarefa['0'];
    }

    public function buscaTodos(){
        $objS = new ClientesService($this->conn, $this->clientes);
        return $objS->buscaTodos();
    }

}