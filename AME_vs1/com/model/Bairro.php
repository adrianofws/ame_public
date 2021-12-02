<?php

class Bairro implements JsonSerializable {

    protected $idBairro;
    protected $nmBairro;
    protected $idCidade;

    public function jsonSerialize()
	{
		return [
			"idBairro" => (string) $this->idBairro,
			"nmBairro" => (string) $this->nmBairro,
			"idCidade" => (string) $this->idCidade
		];
	}

    public function __construct($result = null,$limpaObjetos = false)
	{

		$this->limpaObjetos = $limpaObjetos;

		if (is_array($result)) {
			$this->idBairro = $result['ID_BAIRRO'];
			$this->nmBairro = $result['NM_BAIRRO'];
			$this->idCidade = $result['ID_CIDADE'];
		}
	
    }

    public function getIdBairro()
    {
        return $this->idBairro;
    }

    public function setIdBairro($idBairro)
    {
        $this->idBairro = $idBairro;
    }

    public function getNmBairro()
    {
        return $this->nmBairro;
    }

    public function setNmBairro($nmBairro)
    {
        $this->nmBairro = $nmBairro;
    }

    public function getIdCidade()
    {
        return $this->idCidade;
    }

    public function setIdCidade($idCidade)
    {
        $this->idCidade = $idCidade;
    }

}

?>