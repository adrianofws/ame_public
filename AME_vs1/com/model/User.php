<?php

class User {

    protected $cpf;
    protected $nome;
    protected $endereco1;
    protected $endereco2;
    protected $bairro;
    protected $cidade;
    protected $estado;
    protected $cep;
    protected $dataDeNascimento;
    protected $idade;
    protected $sexo;

    /**
     * Get the value of cpf
     */ 
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * Set the value of cpf
     *
     * @return  self
     */ 
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;

        return $this;
    }

    /**
     * Get the value of nome
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */ 
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of bairro
     */ 
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * Set the value of bairro
     *
     * @return  self
     */ 
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;

        return $this;
    }

    /**
     * Get the value of cidade
     */ 
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * Set the value of cidade
     *
     * @return  self
     */ 
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;

        return $this;
    }

    /**
     * Get the value of estado
     */ 
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of estado
     *
     * @return  self
     */ 
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get the value of cep
     */ 
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * Set the value of cep
     *
     * @return  self
     */ 
    public function setCep($cep)
    {
        $this->cep = $cep;

        return $this;
    }

    /**
     * Get the value of idade
     */ 
    public function getIdade()
    {
        return $this->idade;
    }

    /**
     * Set the value of idade
     *
     * @return  self
     */ 
    public function setIdade($idade)
    {
        $this->idade = $idade;

        return $this;
    }

    /**
     * Get the value of endereco1
     */ 
    public function getEndereco1()
    {
        return $this->endereco1;
    }

    /**
     * Set the value of endereco1
     *
     * @return  self
     */ 
    public function setEndereco1($endereco1)
    {
        $this->endereco1 = $endereco1;

        return $this;
    }

    /**
     * Get the value of endereco2
     */ 
    public function getEndereco2()
    {
        return $this->endereco2;
    }

    /**
     * Set the value of endereco2
     *
     * @return  self
     */ 
    public function setEndereco2($endereco2)
    {
        $this->endereco2 = $endereco2;

        return $this;
    }

    /**
     * Get the value of dataDeNascimento
     */ 
    public function getDataDeNascimento()
    {
        return $this->dataDeNascimento;
    }

    /**
     * Set the value of dataDeNascimento
     *
     * @return  self
     */ 
    public function setDataDeNascimento($dataDeNascimento)
    {
        $this->dataDeNascimento = $dataDeNascimento;

        return $this;
    }
}

?>