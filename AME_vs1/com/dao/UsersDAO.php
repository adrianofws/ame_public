<?php

include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/projeto-cloves/AME/ame/com/model/User.php');
include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/projeto-cloves/AME/ame/com/dao/BaseDAO.php');

class UsersDAO extends BaseDAO {
    
    public function insert($cpf, $nome, $endereco) {

        $result = null;

        $sql = "INSERT INTO TABELA_DE_CLIENTES (
                CPF, 
                NOME, 
                ENDERECO_1) VALUES ($cpf, '$nome', '$endereco')";

        $conn = oci_connect('SYSTEM', 'admin', 'localhost:1522/XE');
        
        if (!$conn) {

            $e = oci_error();
            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
        
        } else {

            $data = oci_parse($conn, 'SELECT * FROM TABELA_DE_CLIENTES');
            oci_execute($data);

            return $data;
        
        }

    } 

}

?>