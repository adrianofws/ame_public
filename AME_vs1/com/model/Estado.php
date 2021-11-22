<?php

class Estado implements JsonSerializable {

    protected $idEstado;
    protected $nmEstado;

    public function jsonSerialize()
	{
		return [
			"idEstado" => (string) $this->idEstado,
			"nmEstado" => (string) $this->nmEstado
		];
	}

    public function __construct($result = null,$limpaObjetos = false)
	{

		$this->limpaObjetos = $limpaObjetos;

		if (is_array($result)) {
			$this->idEstado = $result['ID_ESTADO'];
			$this->nmEstado = $result['NM_ESTADO'];
		}
	
    }

    public function getIdEstado()
    {
        return $this->idEstado;
    }

    public function setIdEstado($idEstado)
    {
        $this->idEstado = $idEstado;
    }

    public function getNmEstado()
    {
        return $this->nmEstado;
    }

    public function setNmEstado($nmEstado)
    {
        $this->nmEstado = $nmEstado;
    }

}

?>