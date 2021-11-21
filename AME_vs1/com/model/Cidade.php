<?php

class Cidade {

	private $limpaObjetos = false;

    protected $idCidade;
    protected $nmCidade;

    public function jsonSerialize()
	{
		return [
			"idCidade" => (string) $this->idCidade,
			"nmCidade" => (string) $this->nmCidade
		];
	}

    public function __construct($result = null,$limpaObjetos = false)
	{

		$this->limpaObjetos = $limpaObjetos;

		if (is_array($result)) {
			$this->idCidade = $result['ID_CIDADE'];
			$this->nmCidade = $result['NM_CIDADE'];
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

}

?>