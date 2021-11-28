<?php

include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/ame_public/AME_vs1/com/model/Usuario.php');
include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/ame_public/AME_vs1/com/dao/BaseDAO.php');

class UsuarioDAO extends BaseDAO {

    private $limpaObjetos = false;

	public function __construct($limpaObjetos = false) {
		$this->limpaObjetos = $limpaObjetos;
	}

    public function insertUsuario(Usuario $usuario) {

        $sql = "INSERT INTO usuario (
                    nm_usuario, 
                    nm_sobrenome,
                    nr_cpf,
                    dt_nascimento,
                    ds_senha,
                    ds_endereco,
                    ds_descricao) VALUES (:nm_usuario, 
                                      :nm_sobrenome, 
                                      :nr_cpf, 
                                      ':dt_nascimento', 
                                      :ds_senha,
                                      :ds_endereco, 
                                      :ds_descricao)";

        $parameters = array(
            ':nm_usuario' => $usuario->getNmUsuario(),
            ':nm_sobrenome' => $usuario->getNmSobrenome(),
            ':nr_cpf' => $usuario->getNrCpf(),
            ':dt_nascimento' => $usuario->getDtNascimento(),
            ':ds_senha' => $usuario->getDsSenha(),
            ':ds_endereco' => $usuario->getDsEndereco(),
            ':ds_descricao' => $usuario->getDsDescricao()
        );

        return parent::insert($sql, $parameters);

    }

    public function getUsuario($idUsuario)
	{
		return parent::getListCastParam("SELECT * FROM usuario WHERE id_usuario = :id_usuario", array(':id_usuario' => $idUsuario));
	}

    public function login(Usuario $usuario) {

        $sql = "SELECT 
                    * 
                FROM 
                    usuario u 
                WHERE 1=1 
                    AND u.NR_CPF = :nr_cpf 
                    AND u.DS_SENHA = :ds_senha";

        $parameters = array(':nr_cpf' => $usuario->getNrCpf(), 
                            ':ds_senha' => $usuario->getDsSenha());

        return parent::getListCastParam($sql, $parameters);

    }

    protected function processRow($result) {

		$usuario = new Usuario($result,$this->limpaObjetos);
		
        return $usuario;
	
    }

}

?>