<?php

class ClientesService
{
    private $conn; //Conexao
    private $clientes; //Modelo
    private $table = "Clientes"; //Tabela nome...

    public function __construct($conn, Clientes $clientes)
    {
        $this->conn = $conn;
        $this->clientes = $clientes;
    }


    public function registro()
    {
        $query = "
            INSERT INTO $this->table
            (nomeCliente, email, senha, CPF, telefoneFixo, telefoneCelular, logradouro, numero, complemento, bairro, cidade, estado, CEP)
            VALUES
            (?,?,?,?,?,?,?,?,?,?,?,?,?)
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->clientes->__get('nomeCliente'));
        $stmt->bindValue(2, $this->clientes->__get('email'));
        $stmt->bindValue(3, $this->clientes->__get('senha'));
        $stmt->bindValue(4, $this->clientes->__get('CPF'));
        $stmt->bindValue(5, $this->clientes->__get('telefoneFixo'));
        $stmt->bindValue(6, $this->clientes->__get('telefoneCelular'));
        $stmt->bindValue(7, $this->clientes->__get('logradouro'));
        $stmt->bindValue(8, $this->clientes->__get('numero'));
        $stmt->bindValue(9, $this->clientes->__get('complemento'));
        $stmt->bindValue(10, $this->clientes->__get('bairro'));
        $stmt->bindValue(11, $this->clientes->__get('cidade'));
        $stmt->bindValue(12, $this->clientes->__get('estado'));
        $stmt->bindValue(13, $this->clientes->__get('CEP'));
        $stmt->execute();

        $restemp = $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
        return $restemp;
    }

    public function atualiza()
    {
        $query = "
            UPDATE $this->table SET
                nomeCliente = ?, 
                CPF= ?, 
                telefoneFixo= ?, 
                telefoneCelular= ?, 
                logradouro= ?, 
                numero= ?, 
                complemento= ?, 
                bairro= ?, 
                cidade= ?, 
                estado= ?, 
                CEP= ?
            WHERE
                codigoCliente = ?;
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->clientes->__get('nomeCliente'));
        $stmt->bindValue(2, $this->clientes->__get('CPF'));
        $stmt->bindValue(3, $this->clientes->__get('telefoneFixo'));
        $stmt->bindValue(4, $this->clientes->__get('telefoneCelular'));
        $stmt->bindValue(5, $this->clientes->__get('logradouro'));
        $stmt->bindValue(6, $this->clientes->__get('numero'));
        $stmt->bindValue(7, $this->clientes->__get('complemento'));
        $stmt->bindValue(8, $this->clientes->__get('bairro'));
        $stmt->bindValue(9, $this->clientes->__get('cidade'));
        $stmt->bindValue(10, $this->clientes->__get('estado'));
        $stmt->bindValue(11, $this->clientes->__get('CEP'));
        $stmt->bindValue(12, $this->clientes->__get('codigoCliente'));
        $stmt->execute();

        $restemp = $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
        return $restemp;
    }

    public function remover()
    {
        $query = "
            DELETE FROM $this->table 
            WHERE
                codigoCliente = ?;";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->clientes->__get('codigoCliente'));
        $stmt->execute();

        $restemp = $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
        return $restemp;
    }

    public function buscaCodigo()
    {
        $query = "
			SELECT
                *
            FROM
                $this->table
            WHERE
                codigoCliente= ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->clientes->__get('codigoCliente'));
        $stmt->execute();

        $restemp = $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
        return $restemp;
    }

    public function buscaPorEmail()
    {
        $query = "
        SELECT codigoCliente 
        FROM 
            $this->table 
        WHERE 
            email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$this->clientes->__get('email')]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function buscaTodos()
    {
        $query = "
			SELECT
                *
            FROM
                $this->table";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $restemp = $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
        return $restemp;
    }
}