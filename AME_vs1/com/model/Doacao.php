<?php

class Doacao {

	private $limpaObjetos = false;
    
    protected $idDoacao;
    protected $idDoador;
    protected $idReceptor;
    protected $idEmpresa;
    protected $dtDoacao;

    private $empresa;

    public function jsonSerialize()
	{
		return [
			"idDoacao" => (string) $this->idDoacao,
			"idDoador" => (string) $this->idDoador,
			"idReceptor" => (string) $this->idReceptor,
			"idEmpresa" => (string) $this->idEmpresa,
			"dtDoacao" => (string) $this->dtDoacao,
		];
	}

    public function __construct($result = null,$limpaObjetos = false)
	{

		$this->limpaObjetos = $limpaObjetos;

		if (is_array($result)) {
			$this->idDoacao = $result['ID_DOACAO'];
			$this->idDoador = $result['ID_DOADOR'];
			$this->idReceptor = $result['ID_RECEPTOR'];
			$this->idEmpresa = $result['ID_EMPRESA'];
			$this->dtDoacao = $result['DT_DOACAO'];
		}
	
    }

    // public function getEmpresa()
	// {
	// 	if ($this->getIdEmpresa() != "") {
	// 		$empresaDAO = new EmpresaDAO();
	// 		$this->empresa = $empresaDAO->getEmpresa($this->getIdEmpresa());
	// 		return $this->empresa;
	// 	} else {
	// 		return new Empresa();
	// 	}
	// }

    public function getIdDoacao()
    {
        return $this->idDoacao;
    }

    public function setIdDoacao($idDoacao)
    {
        $this->idDoacao = $idDoacao;
    }

    public function getIdDoador()
    {
        return $this->idDoador;
    }

    public function setIdDoador($idDoador)
    {
        $this->idDoador = $idDoador;
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

    public function getDtDoacao()
    {
        return $this->dtDoacao;
    }

    public function setDtDoacao($dtDoacao)
    {
        $this->dtDoacao = $dtDoacao;
    }



    

}

?>