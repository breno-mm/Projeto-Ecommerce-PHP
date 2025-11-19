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
            (nomeCategoria)
            VALUES
            (?)
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->categorias->__get('nomeCategoria'));
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
    public function remover()
    {
        //Checa se existem produtos usando esta categoria
        $query = "
        SELECT 
            count(*) as total 
        FROM 
            Produtos 
        WHERE 
            codigoCategoria = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->categorias->__get('codigoCategoria'));
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_OBJ);

        // Verifica se tem produto com a categoria
        if ($resultado->total > 0) {
            return "vinculado";
        }

        // Se nao tem vinculos  delete normal
        $query = "
        DELETE FROM 
            $this->table 
        WHERE 
            codigoCategoria = ?;";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->categorias->__get('codigoCategoria'));
        $stmt->execute();

        return "sucesso";
    }
}