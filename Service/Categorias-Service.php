<?php

class CategoriasService
{
    private $conn; //Conexao
    private $categorias; //Modelo
    private $table = "categorias"; //Tabela nome...

    public function __construct($conn, Categorias $categorias)
    {
        $this->conn = $conn;
        $this->categorias = $categorias;
    }

    //Adiciona categoria
    public function registro()
    {
        $query = "
            INSERT INTO $this->table
            (codigoCategoria, nomeCategoria)
            VALUES
            (?,?)
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->categorias->__get('codigoCategoria'));
        $stmt->bindValue(2, $this->categorias->__get('nomeCategoria'));
        $stmt->execute();

        $restemp = $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
        return $restemp;
    }

    //Atualiza dados categoria
    public function atualiza()
    {
        $query = "
            UPDATE $this->table SET
                nomeCategoria = ? 
            WHERE
                codigoCategoria = ?;
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->categorias->__get('nomeCategoria'));
        $stmt->bindValue(2, $this->categorias->__get('codigoCategoria'));
        $stmt->execute();

        $restemp = $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
        return $restemp;
    }

    //Busca categoria pelo codigo
    public function buscaCodigo()
    {
        $query = "
			SELECT
                *
            FROM
                $this->table
            WHERE
                codigoCategoria = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->categorias->__get('codigoCategoria'));
        $stmt->execute();

        $restemp = $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
        return $restemp;
    }

    //Busca todas as categorias
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

    //Deleta categoria atraves do codigo
    public function deletaCodigo()
    {
        $query = "
            DELETE FROM $this->table
            WHERE
                codigoCategoria = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->categorias->__get('codigoCategoria'));
        $stmt->execute();
        $restemp = $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
        return $restemp;
    }
}