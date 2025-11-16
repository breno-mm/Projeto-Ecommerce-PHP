<?php
require_once "../Model/ItensPedido-Model.php";
require_once "../Service/ItensPedido-Service.php";


class ItensPedidoController
{
    private $conn;
    private $itensPedido;

    public function __construct()
    {
        $this->conn = new Conexao();
        $this->conn = $this->conn->getinstance();
        $this->itensPedido = new ItensPedido();
    }

    public function registro($codigoPedido, $codigoProduto, $quantidade)
    {

        $this->itensPedido->__set('codigoPedido', $codigoPedido)
            ->__set('codigoProduto', $codigoProduto)
            ->__set('quantidade', $quantidade);

        $objS = new ItensPedidoService($this->conn, $this->itensPedido);
        return $objS->registro();
    }

    public function atualiza($codigoPedido, $codigoProduto, $quantidade)
    {

        $this->itensPedido->__set('codigoPedido', $codigoPedido)
            ->__set('codigoProduto', $codigoProduto);

        $objS = new ItensPedidoService($this->conn, $this->itensPedido);
        return $objS->atualiza();
    }

    public function buscaCodigo($codigoPedido)
    {
        $this->itensPedido->__set('codigoPedido', $codigoPedido);
        $objS = new ItensPedidoService($this->conn, $this->itensPedido);
        $tarefa = $objS->buscaCodigo();
        return $tarefa['0'];
    }

    public function buscaTodas()
    {
        $objS = new ItensPedidoService($this->conn, $this->itensPedido);
        return $objS->buscaTodos();
    }

    public function deletaCodigo($codigoPedido)
    {
        $this->itensPedido->__set('codigoPedido', $codigoPedido);
        $objS = new ItensPedidoService($this->conn, $this->itensPedido);
        return $objS->deletaCodigo();
    }

}