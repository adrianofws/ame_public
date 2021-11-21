<?php

class Bairro {

	private $limpaObjetos = false;

    protected $idBairro;
    protected $nmBairro;

    public function jsonSerialize()
	{
		return [
			"idBairro" => (string) $this->idBairro,
			"nmBairro" => (string) $this->nmBairro
		];
	}

    public function __construct($result = null,$limpaObjetos = false)
	{

		$this->limpaObjetos = $limpaObjetos;

		if (is_array($result)) {
			$this->idBairro = $result['ID_BAIRRO'];
			$this->nmBairro = $result['NM_BAIRRO'];
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

}

?>