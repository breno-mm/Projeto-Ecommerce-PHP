<?php
require_once(__DIR__ . "/../Model/Unidades-Model.php");
require_once(__DIR__ ."/../Service/Unidades-Service.php");

class UnidadesController
{
    private $conn;
    private $unidades;

    public function __construct()
    {
        $this->conn = new Conexao();
        $this->conn = $this->conn->getinstance();
        $this->unidades = new Unidades();
    }

    public function registro($descricaoUnidade)
    {

        $this->unidades->__set('descricaoUnidade', $descricaoUnidade);

        $objS = new UnidadesService($this->conn, $this->unidades);
        return $objS->registro();
    }

    public function atualiza($codigoUnidade, $descricaoUnidade)
    {

        $this->unidades->__set('codigoUnidade', $codigoUnidade)
            ->__set('descricaoUnidade', $descricaoUnidade);

        $objS = new UnidadesService($this->conn, $this->unidades);
        return $objS->atualiza();
    }

    public function buscaCodigo($codigoUnidade)
    {
        $this->unidades->__set('codigoUnidade', $codigoUnidade);
        $objS = new UnidadesService($this->conn, $this->unidades);
        $tarefa = $objS->buscaCodigo();
        return $tarefa['0'];
    }

    public function buscaTodos()
    {
        $objS = new UnidadesService($this->conn, $this->unidades);
        return $objS->buscaTodos();
    }

    public function remover($codigoUnidade)
    {
        $this->unidades->__set('codigoUnidade', $codigoUnidade);
        $objS = new UnidadesService($this->conn, $this->unidades);
        return $objS->remover();
    }

}