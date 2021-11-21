<?php

include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/ame_public/AME_vs1/com/model/Usuario.php');
include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/ame_public/AME_vs1/com/dao/BaseDAO.php');

class UsuarioDAO extends BaseDAO {

    private $limpaObjetos = false;

	public function __construct($limpaObjetos = false) {
		$this->limpaObjetos = $limpaObjetos;
	}
    
    public function insertUser(Usuario $usuario) {

        $sql = 'INSERT INTO usuario (
                    nm_nome, 
                    nm_sobrenome,
                    dt_nascimento,
                    nr_cpf,
                    ds_endereco,
                    ds_descricao) VALUES (:nm_nome, 
                                      :nm_sobrenome, 
                                      :dt_nascimento, 
                                      :nr_cpf, 
                                      :ds_endereco, 
                                      :ds_descricao)';

        $parameters = array(
            ':nm_usuario' => $usuario->getNmUsuario(),
            ':nm_sobrenome' => $usuario->getNmSobrenome(),
            ':dt_nascimento' => $usuario->getDtNascimento(),
            ':nr_cpf' => $usuario->getNrCpf(),
            ':ds_endereco' => $usuario->getDsEndereco(),
            ':ds_descricao' => $usuario->getDsDescricao()
        );

        parent::insert($sql, $parameters);

    }

    protected function processRow($result) {

		$usuario = new Usuario($result,$this->limpaObjetos);
		
        return $usuario;
	
    }

}

?>