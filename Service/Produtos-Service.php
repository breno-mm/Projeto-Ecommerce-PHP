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
                codigoUnidade = ?,
                precoUnitario = ?,
                codigoCategoria = ?
            WHERE
                codigoProduto = ?;
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->produtos->__get("nomeProduto"));
        $stmt->bindValue(2, $this->produtos->__get("codigoFornecedor"));
        $stmt->bindValue(3, $this->produtos->__get("codigoUnidade"));
        $stmt->bindValue(4, $this->produtos->__get("precoUnitario"));
        $stmt->bindValue(5, $this->produtos->__get("codigoCategoria"));
        $stmt->bindValue(6, $this->produtos->__get("codigoProduto"));
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
                codigoProduto = ?";

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

    public function buscaNome($nome)
    {
        $query = "
        SELECT * FROM 
            $this->table 
        WHERE 
            nomeProduto LIKE ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, "%$nome%"); //buscar em qualquer parte do nome
        $stmt->execute();
        $restemp = $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
        return $restemp;
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

    // Deleta produto através do código
    public function remover()
    {
        $query = "DELETE FROM $this->table WHERE codigoProduto = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->produtos->__get('codigoProduto'), PDO::PARAM_INT);
        $stmt->execute();

        $stmt = null;

        return true; // ou apenas retorne void
    }
}