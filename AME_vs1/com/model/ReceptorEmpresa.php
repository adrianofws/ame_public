<?php

class ReceptorEmpresa implements JsonSerializable {

	private $limpaObjetos = false;

    protected $idEmpresa;
    protected $idReceptor;
    protected $dsMotivoDoacao;

    public function jsonSerialize()
	{
		return [
			"idEmpresa" => (string) $this->idEmpresa,
			"idReceptor" => (string) $this->idReceptor,
			"dsMotivoDoacao" => (string) $this->dsMotivoDoacao
		];
	}

    public function __construct($result = null,$limpaObjetos = false)
	{

		$this->limpaObjetos = $limpaObjetos;

		if (is_array($result)) {
			$this->idEmpresa = $result['ID_EMPRESA'];
			$this->idReceptor = $result['ID_RECEPTOR'];
			$this->dsMotivoDoacao = $result['DS_MOTIVO_DOACAO'];
		}
	
    }

    public function getIdReceptor()
    {
        return $this->idReceptor;
    }

    public function setIdReceptor($idReceptor)
    {
        $this->idReceptor = $idReceptor;
    }

    public function getIdEmpresa()
    {
        return $this->idEmpresa;
    }

    public function setIdEmpresa($idEmpresa)
    {
        $this->idEmpresa = $idEmpresa;
    }

    public function getDsMotivoDoacao()
    {
        return $this->dsMotivoDoacao;
    }

    public function setDsMotivoDoacao($dsMotivoDoacao)
    {
        $this->dsMotivoDoacao = $dsMotivoDoacao;
    }

}

?>