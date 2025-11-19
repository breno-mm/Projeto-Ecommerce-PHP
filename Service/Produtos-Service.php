<?php

class ProdutosService
{

    private $conn;
    private $produtos;
    private $table = "produtos";

    public function __construct($conn, Produtos $produtos)
    {
        $this->conn = $conn;
        $this->produtos = $produtos;
    }

    public function registro()
    {
        $query = "
            INSERT INTO $this->table
            (nomeProduto, codigoFornecedor, foto, codigoUnidade, precoUnitario, codigoCategoria)
            VALUES
            (?,?,?,?,?,?)
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->produtos->__get("nomeProduto"));
        $stmt->bindValue(2, $this->produtos->__get("codigoFornecedor"));
        $stmt->bindValue(3, $this->produtos->__get("foto"));
        $stmt->bindValue(4, $this->produtos->__get("codigoUnidade"));
        $stmt->bindValue(5, $this->produtos->__get("precoUnitario"));
        $stmt->bindValue(6, $this->produtos->__get("codigoCategoria"));
        $stmt->execute();

        $restemp = $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
        return $restemp;
    }

    public function atualiza()
    {
        $query = "
            UPDATE $this->table SET
                nomeProduto = ?,
                codigoFornecedor = ?,
                foto = ?,
                codigoUnidade = ?,
                precoUnitario = ?,
                codigoCateogira = ?
            WHERE
                codigoProduto = ?;
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->produtos->__get("nomeProduto"));
        $stmt->bindValue(2, $this->produtos->__get("codigoFornecedor"));
        $stmt->bindValue(3, $this->produtos->__get("foto"));
        $stmt->bindValue(4, $this->produtos->__get("codigoUnidade"));
        $stmt->bindValue(5, $this->produtos->__get("precoUnitario"));
        $stmt->bindValue(6, $this->produtos->__get("codigoCategoria"));
        $stmt->bindValue(7, $this->produtos->__get("codigoProduto"));
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
                codigoProuto = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->produtos->__get('codigoProduto'));
        $stmt->execute();

        $restemp = $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
        return $restemp;
    }

    //Busca por fornecedor
    public function buscaPorFornecedor($codigoFornecedor)
    {
        $query = "
        SELECT * FROM 
            produtos 
        WHERE 
            codigoFornecedor = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$codigoFornecedor]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //Busca todas as produtos
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
                codigoProduto = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $stmt->bindValue(1, $this->produtos->__get('codigoProduto'));
        $restemp = $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
        return $restemp;
    }
}