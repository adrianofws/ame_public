<?php

include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/ame_public/AME_vs1/com/model/User.php');
include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/ame_public/AME_vs1/com/dao/BaseDAO.php');

class UserDAO extends BaseDAO {
    
    public function insertUser(User $user) {

        var_dump("chamou insert");

        $result = null;

        $sql = 'INSERT INTO USUARIOS (
                NOME, 
                SOBRENOME, 
                IDENTIDADE,
                CPF,
                DATA_DE_NASCIMENTO,
                ENDERECO) VALUES ()';

        $parameters = [
            'nome' => $user->getNome(),
            'sobrenome' => $user->getSobrenome(),
            'identidade' => $user->getIdentidade(),
            'cpf' => $user->getCpf(),
            'data_de_nascimento' => $user->getDataDeNascimento(),
            'endereco' => $user->getEndereco()
        ];

        parent::insert($sql, $parameters);

    } 

}

?>