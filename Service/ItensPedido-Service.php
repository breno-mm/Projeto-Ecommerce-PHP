<?php

class ItensPedidoService
{
    private $conn; //Conexao
    private $itensPedido; //Modelo
    private $table = "itensPedido"; //Tabela nome...

    public function __construct($conn, itensPedido $itensPedido)
    {
        $this->conn = $conn;
        $this->itensPedido = $itensPedido;
    }

    //Adiciona categoria
    public function registro()
    {
        $query = "
            INSERT INTO $this->table
            (codigoPedido, codigoProduto, quantidade)
            VALUES
            (?,?,?)
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->itensPedido->__get('codigoPedido'));
        $stmt->bindValue(2, $this->itensPedido->__get('codigoProduto'));
        $stmt->bindValue(3, $this->itensPedido->__get('quantidade'));
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
                codigoProduto = ?,
                quantidade = ? 
            WHERE
                codigoPedido = ?;
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->itensPedido->__get('codigoProduto'));
        $stmt->bindValue(2, $this->itensPedido->__get('quantidade'));
        $stmt->bindValue(3, $this->itensPedido->__get('codigoPedido'));
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
                codigoPedido = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->itensPedido->__get('codigoPedido'));
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
        $query = "
            DELETE FROM $this->table
            WHERE
                codigoPedidos = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->itensPedido->__get('codigoPedido'));
        $stmt->execute();
        $restemp = $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
        return $restemp;
    }
}