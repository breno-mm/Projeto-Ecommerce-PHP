<?php
require_once "../Model/Unidades-Model.php";
require_once "../Service/Unidades-Service.php";


class UnidadesController
{
    private $conn;
    private $unidades;

    public function __construct()
    {
        $this->conn = new Conexao();
        $this->conn = $this->conn->getinstance();
        $this->unidaes = new unidades();
    }

    public function registro($codigoUnidade, $descricaoUnidade)
    {

        $this->unidades->__set('codigoUndidade', $codigoUnidade)
            ->__set('descricaoUnidade', $descricaoUnidade);

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

    public function buscaTodas()
    {
        $objS = new UnidadesService($this->conn, $this->unidades);
        return $objS->buscaTodos();
    }

    public function deletaCodigo($codigoUnidade)
    {
        $this->unidades->__set('codigoUnidade', $codigoUnidade);
        $objS = new UnidadesService($this->conn, $this->unidades);
        return $objS->deletaCodigo();
    }

}