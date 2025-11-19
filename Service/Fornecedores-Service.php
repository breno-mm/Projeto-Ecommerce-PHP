<?php

class FornecedoresService
{
    private $conn; //Conexao
    private $fornecedores; //Modelo
    private $table = "fornecedores"; //Tabela nome...

    public function __construct($conn, Fornecedores $fornecedores)
    {
        $this->conn = $conn;
        $this->fornecedores = $fornecedores;
    }

    //Adiciona Fornecedor
    public function registro()
    {
        $query = "
            INSERT INTO $this->table
            (nomeFornecedor, CNPJ, email, senha, fax, telefoneFixo, telefoneCelular, site, logradouro, numero, complemento, bairro, cidade, estado, CEP)
            VALUES
            (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->fornecedores->__get('nomeFornecedor'));
        $stmt->bindValue(2, $this->fornecedores->__get('CNPJ'));
        $stmt->bindValue(3, $this->fornecedores->__get('email'));
        $stmt->bindValue(4, $this->fornecedores->__get('senha'));
        $stmt->bindValue(5, $this->fornecedores->__get('fax'));
        $stmt->bindValue(6, $this->fornecedores->__get('telefoneFixo'));
        $stmt->bindValue(7, $this->fornecedores->__get('telefoneCelular'));
        $stmt->bindValue(8, $this->fornecedores->__get('site'));
        $stmt->bindValue(9, $this->fornecedores->__get('logradouro'));
        $stmt->bindValue(10, $this->fornecedores->__get('numero'));
        $stmt->bindValue(11, $this->fornecedores->__get('complemento'));
        $stmt->bindValue(12, $this->fornecedores->__get('bairro'));
        $stmt->bindValue(13, $this->fornecedores->__get('cidade'));
        $stmt->bindValue(14, $this->fornecedores->__get('estado'));
        $stmt->bindValue(15, $this->fornecedores->__get('CEP'));
        $stmt->execute();

        $restemp = $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
        return $restemp;
    }

    //Atualiza dados Fornecedor
    public function atualiza()
    {
        $query = "
            UPDATE $this->table SET
                nomeFornecedor = ?, 
                CNPJ = ?,
                fax = ?, 
                telefoneFixo = ?, 
                telefoneCelular = ?,
                site = ?, 
                logradouro = ?, 
                numero = ?, 
                complemento = ?, 
                bairro = ?, 
                cidade = ?, 
                estado = ?, 
                CEP = ?
            WHERE
                codigoFornecedor = ?;
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->fornecedores->__get('nomeFornecedor'));
        $stmt->bindValue(2, $this->fornecedores->__get('CNPJ'));
        $stmt->bindValue(3, $this->fornecedores->__get('fax'));
        $stmt->bindValue(4, $this->fornecedores->__get('telefoneFixo'));
        $stmt->bindValue(5, $this->fornecedores->__get('telefoneCelular'));
        $stmt->bindValue(6, $this->fornecedores->__get('site'));
        $stmt->bindValue(7, $this->fornecedores->__get('logradouro'));
        $stmt->bindValue(8, $this->fornecedores->__get('numero'));
        $stmt->bindValue(9, $this->fornecedores->__get('complemento'));
        $stmt->bindValue(10, $this->fornecedores->__get('bairro'));
        $stmt->bindValue(11, $this->fornecedores->__get('cidade'));
        $stmt->bindValue(12, $this->fornecedores->__get('estado'));
        $stmt->bindValue(13, $this->fornecedores->__get('CEP'));
        $stmt->bindValue(14, $this->fornecedores->__get('codigoFornecedor'));
        $stmt->execute();

        $restemp = $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
        return $restemp;
    }

    //Busca Fornecedor pelo codigo
    public function buscaCodigo()
    {
        $query = "
			SELECT
                *
            FROM
                $this->table
            WHERE
                codigoFornecedor= ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->fornecedores->__get('codigoFornecedor'));
        $stmt->execute();

        $restemp = $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
        return $restemp;
    }

    public function buscaPorEmail()
    {
        $query = "
        SELECT codigoFornecedor
        FROM 
            $this->table 
        WHERE 
            email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$this->fornecedores->__get('email')]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //Busca todos os fornecedores
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

    //Deleta Fornecedor atraves do codigo
    public function remover()
    {
        $query = "
            DELETE FROM $this->table
            WHERE
                codigoFornecedor = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $stmt->bindValue(1, $this->fornecedores->__get('codigoFornecedor'));
        $restemp = $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
        return $restemp;

    }
}