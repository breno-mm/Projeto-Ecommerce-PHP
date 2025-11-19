<?php
require_once "../../Model/Pedidos-Model.php";
require_once "../../Service/Pedidos-Service.php";

class PedidosController {
    private $conn;
    private $pedidos;

    public function __construct() {
        $this->conn = new Conexao();
        $this->conn = $this->conn->getinstance();
        $this->pedidos = new Pedidos();
    }

    public function registro($CodigoCliente, $dataEnvio, $dataPedido) {
        $this->pedidos->__set('CodigoCliente', $CodigoCliente)
            ->__set('dataEnvio', $dataEnvio)
            ->__set('dataPedido', $dataPedido);
        
        $objS = new PedidosService($this->conn, $this->pedidos);
        return $objS->registro();
    }

    public function atualiza($codigoPedidos, $CodigoCliente, $dataEnvio, $dataPedido) {
        $this->pedidos->__set('codigoPedidos', $codigoPedidos)
            ->__set('CodigoCliente', $CodigoCliente)
            ->__set('dataEnvio', $dataEnvio)
            ->__set('dataPedido', $dataPedido);
        
        $objS = new PedidosService($this->conn, $this->pedidos);
        return $objS->atualiza();
    }

    public function remover($codigoPedidos) {
        $this->pedidos->__set('codigoPedidos', $codigoPedidos);
        $objS = new PedidosService($this->conn, $this->pedidos);
        return $objS->remover();
    }

    public function buscaCodigo($codigoPedidos) {
        $this->pedidos->__set('codigoPedidos', $codigoPedidos);
        $objS = new PedidosService($this->conn, $this->pedidos);
        $resultado = $objS->buscaCodigo();
        return isset($resultado['0']) ? $resultado['0'] : [];
    }

    public function buscaTodos() {
        $objS = new PedidosService($this->conn, $this->pedidos);
        return $objS->buscaTodos();
    }
}
?>