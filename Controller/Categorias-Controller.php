<?php
require_once(__DIR__. "/../Model/Categorias-Model.php");
require_once(__DIR__. "/../Service/Categorias-Service.php");


class CategoriasController
{
    private $conn;
    private $categorias;

    public function __construct()
    {
        $this->conn = new Conexao();
        $this->conn = $this->conn->getinstance();
        $this->categorias = new categorias();
    }

    public function registro($nomeCategoria)
    {

        $this->categorias->__set('nomeCategoria', $nomeCategoria);

        $objS = new CategoriasService($this->conn, $this->categorias);
        return $objS->registro();
    }

    public function atualiza($codigoCategoria, $nomeCategoria)
    {

        $this->categorias->__set('codigoCategoria', $codigoCategoria)
            ->__set('nomeCategoria', $nomeCategoria);

        $objS = new CategoriasService($this->conn, $this->categorias);
        return $objS->atualiza();
    }

    public function buscaCodigo($codigoCategoria)
    {
        $this->categorias->__set('codigoCategoria', $codigoCategoria);
        $objS = new CategoriasService($this->conn, $this->categorias);
        $tarefa = $objS->buscaCodigo();
        return $tarefa['0'];
    }

    public function buscaTodos()
    {
        $objS = new CategoriasService($this->conn, $this->categorias);
        return $objS->buscaTodos();
    }

    public function remover($codigoCategoria)
    {
        $this->categorias->__set('codigoCategoria', $codigoCategoria);
        $objS = new CategoriasService($this->conn, $this->categorias);
        return $objS->remover();
    }

}