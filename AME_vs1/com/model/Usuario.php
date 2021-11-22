<?php

class Usuario implements JsonSerializable {

	private $limpaObjetos = false;

    protected $idUsuario;
    protected $nmUsuario;
    protected $nmSobrenome;
    protected $dtNascimento;
    protected $nrCpf;
    protected $dsEndereco;
    protected $dsDescricao;

    public function jsonSerialize()
	{
		return [
			"idUsuario" => (string) $this->idUsuario,
			"nmUsuario" => (string) $this->nmUsuario,
			"nmSobrenome" => (string) $this->nmSobrenome,
			"dtNascimento" => (string) $this->dtNascimento,
			"nrCpf" => (string) $this->nrCpf,
			"dsEndereco" => (string) $this->dsEndereco,
			"dsDescricao" => (string) $this->dsDescricao
		];
	}

    public function __construct($result = null,$limpaObjetos = false)
	{

		$this->limpaObjetos = $limpaObjetos;

		if (is_array($result)) {
			$this->idUsuario = $result['ID_USUARIO'];
			$this->nmUsuario = $result['NM_NOME'];
			$this->nmSobrenome = $result['NM_SOBRENOME'];
			$this->dtNascimento = $result['DT_NASCIMENTO'];
			$this->nrCpf = $result['NR_CPF'];
			$this->dsEndereco = $result['DS_ENDERECO'];
			$this->dsDescricao = $result['DS_DESCRICAO'];
		}
	
    }

    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    public function getNmUsuario()
    {
        return $this->nmUsuario;
    }

    public function setNmUsuario($nmUsuario)
    {
        $this->nmUsuario = $nmUsuario;

        return $this;
    }

    public function getNmSobrenome()
    {
        return $this->nmSobrenome;
    }

    public function setNmSobrenome($nmSobrenome)
    {
        $this->nmSobrenome = $nmSobrenome;

        return $this;
    }

    public function getDtNascimento()
    {
        return $this->dtNascimento;
    }

    public function setDtNascimento($dtNascimento)
    {
        $this->dtNascimento = $dtNascimento;

        return $this;
    }

    public function getNrCpf()
    {
        return $this->nrCpf;
    }

    public function setNrCpf($nrCpf)
    {
        $this->nrCpf = $nrCpf;

        return $this;
    }

    public function getDsEndereco()
    {
        return $this->dsEndereco;
    }

    public function setDsEndereco($dsEndereco)
    {
        $this->dsEndereco = $dsEndereco;

        return $this;
    }

    public function getDsDescricao()
    {
        return $this->dsDescricao;
    }

    public function setDsDescricao($dsDescricao)
    {
        $this->dsDescricao = $dsDescricao;

        return $this;
    }
}

?>