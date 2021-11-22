<?php

include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/ame_public/AME_vs1/com/dao/EmpresaDAO.php');
include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/ame_public/AME_vs1/com/dao/UsuarioDAO.php');
class Doacao implements JsonSerializable {

	private $limpaObjetos = false;
    
    protected $idDoacao;
    protected $idDoador;
    protected $idReceptor;
    protected $idEmpresa;
    protected $dtDoacao;

    private $_empresa;
    private $_doador;
    private $_receptor;

    public function jsonSerialize()
	{
		return [
			"idDoacao" => (string) $this->idDoacao,
			"idDoador" => (string) $this->idDoador,
			"idReceptor" => (string) $this->idReceptor,
			"idEmpresa" => (string) $this->idEmpresa,
			"dtDoacao" => (string) $this->dtDoacao,
			"empresa" => $this->limpaObjetos ? null : $this->getEmpresa(),
			"doador" => $this->limpaObjetos ? null : $this->getDoador(),
			"receptor" => $this->limpaObjetos ? null : $this->getReceptor()
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

    public function getEmpresa()
	{
		if ($this->getIdEmpresa() != "") {
			$empresaDAO = new EmpresaDAO();
			$this->_empresa = $empresaDAO->getEmpresa($this->getIdEmpresa());
			return $this->_empresa;
		} else {
			return new Empresa();
		}
	}

    public function getDoador()
	{
		if ($this->getIdDoador() != "") {
			$usuarioDAO = new UsuarioDAO();
			$this->_doador = $usuarioDAO->getUsuario($this->getIdDoador());
			return $this->_doador;
		} else {
			return new Usuario();
		}
	}

    public function getReceptor()
	{
		if ($this->getIdDoador() != "") {
			$usuarioDAO = new UsuarioDAO();
			$this->_receptor = $usuarioDAO->getUsuario($this->getIdReceptor());
			return $this->_receptor;
		} else {
			return new Usuario();
		}
	}

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