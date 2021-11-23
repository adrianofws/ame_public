<?php

include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/ame_public/AME_vs1/com/dao/EstadoDAO.php');
include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/ame_public/AME_vs1/com/dao/CidadeDAO.php');
include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/ame_public/AME_vs1/com/dao/BairroDAO.php');
class Empresa implements JsonSerializable {

	private $limpaObjetos = false;

    protected $idEmpresa;
    protected $idFederacao;
    protected $idCidade;
    protected $idBairro;
    protected $nmEmpresa;
    protected $nrNumero;
    protected $nrCnpj;
    protected $nrCep;
    protected $dsEmail;
    protected $dsEndereco;
    protected $dsComplemento;

	private $_estado;
	private $_cidade;
	private $_bairro;

    public function jsonSerialize()
	{
		return [
			"idEmpresa" => (string) $this->idEmpresa,
			"idFederacao" => (string) $this->idFederacao,
			"idCidade" => (string) $this->idCidade,
			"idBairro" => (string) $this->idBairro,
			"nmEmpresa" => (string) $this->nmEmpresa,
			"nrNumero" => (string) $this->nrNumero,
			"nrCnpj" => (string) $this->nrCnpj,
			"nrCep" => (string) $this->nrCep,
			"dsEmail" => (string) $this->dsEmail,
			"dsEndereco" => (string) $this->dsEndereco,
			"dsComplemento" => (string) $this->dsComplemento,
            "estado" => $this->limpaObjetos ? null : $this->getEstado()
            // "cidade" => $this->limpaObjetos ? null : $this->getCidade(),
            // "bairro" => $this->limpaObjetos ? null : $this->getBairro()
		];
	}

    public function __construct($result = null,$limpaObjetos = false)
	{

		$this->limpaObjetos = $limpaObjetos;

		if (is_array($result)) {
			$this->idEmpresa = $result['ID_EMPRESA'];
			$this->idFederacao = $result['ID_FEDERACAO'];
			$this->idCidade = $result['ID_CIDADE'];
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

    public function getEstado()
	{
		if ($this->getIdFederacao() != "") {
			$estadoDAO = new EstadoDAO();
			$this->_estado = $estadoDAO->getEstado($this->getIdFederacao());
			return $this->_estado;
		} else {
			return new Estado();
		}
	}

    public function getCidade()
	{
		if ($this->getIdCidade() != "") {
			$cidadeDAO = new CidadeDAO();
			$this->_cidade = $cidadeDAO->getCidade($this->getIdCidade());
			return $this->_cidade;
		} else {
			return new Cidade();
		}
	}

    public function getBairro()
	{
		if ($this->getIdBairro() != "") {
			$bairroDAO = new BairroDAO();
			$this->_bairro = $bairroDAO->getBairro($this->getIdBairro());
			return $this->_bairro;
		} else {
			return new Bairro();
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

    public function getIdCidade()
    {
        return $this->idCidade;
    }

    public function setIdCidade($idCidade)
    {
        $this->idCidade = $idCidade;
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