<?php

class PedidosService
{
    private $conn; //Conexao
    private $pedidos; //Modelo
    private $table = "pedidos"; //Tabela nome...

    public function __construct($conn, Pedidos $pedidos)
    {
        $this->conn = $conn;
        $this->pedidos = $pedidos;
    }

    //Adiciona categoria
    public function registro()
    {
        $query = "
            INSERT INTO $this->table
            (codigoPedido, codigoCliente, dataEnvio, dataPedido)
            VALUES
            (?,?,?,?)    
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->pedidos->__get('codigoPedido'));
        $stmt->bindValue(2, $this->pedidos->__get('codigoCliente'));
        $stmt->bindValue(3, $this->pedidos->__get('dataEnvio'));
        $stmt->bindValue(4, $this->pedidos->__get('dataPedido'));
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
                codigoCliente = ?,
                dataEnvio = ?,
                dataPedido = ?
            WHERE
                codigoPedido = ?;
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->pedidos->__get('codigoCliente'));
        $stmt->bindValue(2, $this->pedidos->__get('dataEnvio'));
        $stmt->bindValue(3, $this->pedidos->__get('dataPedido'));
        $stmt->bindValue(4, $this->pedidos->__get('codigoPedido'));
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
        $stmt->bindValue(1, $this->pedidos->__get('codigoPedido'));
        $stmt->execute();

        $restemp = $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
        return $restemp;
    }

    //Busca todas as pedidos
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
                codigoPedido = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $stmt->bindValue(1, $this->pedidos->__get('codigoPedido'));
        $restemp = $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
        return $restemp;
    }
}