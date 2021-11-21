<?php

class Empresa {

	private $limpaObjetos = false;

    protected $idEmpresa;
    protected $idFederacao;
    protected $idBairro;
    protected $nmEmpresa;
    protected $nrNumero;
    protected $nrCnpj;
    protected $nrCep;
    protected $dsEmail;
    protected $dsEndereco;
    protected $dsComplemento;

    public function jsonSerialize()
	{
		return [
			"idEmpresa" => (string) $this->idEmpresa,
			"idFederacao" => (string) $this->idFederacao,
			"idBairro" => (string) $this->idBairro,
			"nmEmpresa" => (string) $this->nmEmpresa,
			"nrNumero" => (string) $this->nrNumero,
			"nrCnpj" => (string) $this->nrCnpj,
			"nrCep" => (string) $this->nrCep,
			"dsEmail" => (string) $this->dsEmail,
			"dsEndereco" => (string) $this->dsEndereco,
			"dsComplemento" => (string) $this->dsComplemento
		];
	}

    public function __construct($result = null,$limpaObjetos = false)
	{

		$this->limpaObjetos = $limpaObjetos;

		if (is_array($result)) {
			$this->idEmpresa = $result['ID_EMPRESA'];
			$this->idFederacao = $result['ID_FEDERACAO'];
			$this->idBairro = $result['ID_BAIRRO'];
			$this->nmEmpresa = $result['NM_EMPRESA'];
			$this->nrNumero = $result['NR_NUMERO'];
			$this->nrCnpj = $result['NR_CNPJ'];
			$this->nrCep = $result['NR_CEP'];
			$this->dsEmail = $result['DS_EMAIL'];
			$this->dsEndereco = $result['DS_ENDERECO'];
			$this->dsComplemento = $result['DS_COMPLEMENTO'];
		}
	
    }

    public function getIdEmpresa()
    {
        return $this->idEmpresa;
    }

    public function setIdEmpresa($idEmpresa)
    {
        $this->idEmpresa = $idEmpresa;
    }

    public function getNmEmpresa()
    {
        return $this->nmEmpresa;
    }

    public function setNmEmpresa($nmEmpresa)
    {
        $this->nmEmpresa = $nmEmpresa;
    }

    public function getIdFederacao()
    {
        return $this->idFederacao;
    }

    public function setIdFederacao($idFederacao)
    {
        $this->idFederacao = $idFederacao;
    }

    public function getIdBairro()
    {
        return $this->idBairro;
    }

    public function setIdBairro($idBairro)
    {
        $this->idBairro = $idBairro;
    }

    public function getNrNumero()
    {
        return $this->nrNumero;
    }

    public function setNrNumero($nrNumero)
    {
        $this->nrNumero = $nrNumero;
    }

    public function getNrCnpj()
    {
        return $this->nrCnpj;
    }

    public function setNrCnpj($nrCnpj)
    {
        $this->nrCnpj = $nrCnpj;
    }

    public function getNrCep()
    {
        return $this->nrCep;
    }

    public function setNrCep($nrCep)
    {
        $this->nrCep = $nrCep;
    }

    public function getDsEmail()
    {
        return $this->dsEmail;
    }

    public function setDsEmail($dsEmail)
    {
        $this->dsEmail = $dsEmail;
    }

    public function getDsEndereco()
    {
        return $this->dsEndereco;
    }

    public function setDsEndereco($dsEndereco)
    {
        $this->dsEndereco = $dsEndereco;
    }

    public function getDsComplemento()
    {
        return $this->dsComplemento;
    }

    public function setDsComplemento($dsComplemento)
    {
        $this->dsComplemento = $dsComplemento;
    }

}

?>