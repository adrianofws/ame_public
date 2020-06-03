<?php

class User {

    protected $nome;
    protected $sobrenome;
    protected $identidade;
    protected $cpf;
    protected $dataDeNascimento;
    protected $endereco;

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
     * Get the value of sobrenome
     */ 
    public function getSobrenome()
    {
        return $this->sobrenome;
    }

    /**
     * Set the value of sobrenome
     *
     * @return  self
     */ 
    public function setSobrenome($sobrenome)
    {
        $this->sobrenome = $sobrenome;

        return $this;
    }

    /**
     * Get the value of identidade
     */ 
    public function getIdentidade()
    {
        return $this->identidade;
    }

    /**
     * Set the value of identidade
     *
     * @return  self
     */ 
    public function setIdentidade($identidade)
    {
        $this->identidade = $identidade;

        return $this;
    }

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

    /**
     * Get the value of endereco
     */ 
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * Set the value of endereco
     *
     * @return  self
     */ 
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;

        return $this;
    }
}

?>