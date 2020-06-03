<?php

include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/ame_public/AME_vs1/com/model/User.php');
include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/ame_public/AME_vs1/com/dao/BaseDAO.php');

class UserDAO extends BaseDAO {
    
    public function insertUser(User $user) {

        $sql = 'INSERT INTO usuarios (
                    nome, 
                    sobrenome, 
                    identidade,
                    cpf,
                    data_de_nascimento,
                    endereco) VALUES (:nome, 
                                      :sobrenome, 
                                      :identidade, 
                                      :cpf, 
                                      :data_de_nascimento, 
                                      :endereco)';

        $parameters = array(
            ':nome' => $user->getNome(),
            ':sobrenome' => $user->getSobrenome(),
            ':identidade' => $user->getIdentidade(),
            ':cpf' => $user->getCpf(),
            ':data_de_nascimento' => $user->getDataDeNascimento(),
            ':endereco' => $user->getEndereco()
        );

        parent::insert($sql, $parameters);

    } 

}

?>