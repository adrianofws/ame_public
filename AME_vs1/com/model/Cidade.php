<?php

class Cidade implements JsonSerializable {

    protected $idCidade;
    protected $nmCidade;
    protected $idEstado;

    public function jsonSerialize()
	{
		return [
			"idCidade" => (string) $this->idCidade,
			"nmCidade" => (string) $this->nmCidade,
			"idEstado" => (string) $this->idEstado,
		];
	}

    public function __construct($result = null,$limpaObjetos = false)
	{

		$this->limpaObjetos = $limpaObjetos;

		if (is_array($result)) {
			$this->idCidade = $result['ID_CIDADE'];
			$this->nmCidade = $result['NM_CIDADE'];
			$this->idEstado = $result['ID_ESTADO'];
		}
	
    }

    public function getIdCidade()
    {
        return $this->idCidade;
    }

    public function setIdCidade($idCidade)
    {
        $this->idCidade = $idCidade;
    }

    public function getNmCidade()
    {
        return $this->nmCidade;
    }

    public function setNmCidade($nmCidade)
    {
        $this->nmCidade = $nmCidade;
    }

    public function getIdEstado()
    {
        return $this->idEstado;
    }

    public function setIdEstado($idEstado)
    {
        $this->idEstado = $idEstado;
    }

}

?>