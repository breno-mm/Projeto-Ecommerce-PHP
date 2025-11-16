<?php

class UnidadesService
{
    private $conn; //Conexao
    private $unidades; //Modelo
    private $table = "unidades"; //Tabela nome...

    public function __construct($conn, Unidades $unidades)
    {
        $this->conn = $conn;
        $this->unidades = $unidades;
    }

    //Adiciona categoria
    public function registro()
    {
        $query = "
            INSERT INTO $this->table
            (codigoUnidade, descricaoUnidade)
            VALUES
            (?,?)    
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->unidades->__get('codigounidade'));
        $stmt->bindValue(2, $this->unidades->__get('descricaoUnidade'));
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
                descricaoUnidade = ?
            WHERE
                codigoUnidade = ?;
        ";

        $stmt = $this->conn->prepare($query);    
        $stmt->bindValue(1, $this->unidades->__get('descricaoUnidade'));
        $stmt->bindValue(2, $this->unidades->__get('codigoUnidade'));
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
                codigoUnidade= ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->unidades->__get('codigoUnidade'));
        $stmt->execute();

        $restemp = $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
        return $restemp;
    }

    //Busca todas as unidades
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
                codigoUnidade= ?";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $stmt->bindValue(1, $this->unidades->__get('codigoUnidade'));
        $restemp = $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
        return $restemp;
    }
}