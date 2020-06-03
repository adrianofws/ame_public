<?php

include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/ame_public/AME_vs1/com/model/User.php');
include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/ame_public/AME_vs1/com/dao/BaseDAO.php');

class UsersDAO extends BaseDAO {
    
    public function insert($cpf, $nome, $endereco) {

        var_dump("chamou insert");

        $result = null;

        $sql = "INSERT INTO USUARIOS (
                CPF, 
                NOME, 
                ENDERECO) VALUES ($cpf, '$nome', '$endereco')";

        $conn = new mysqli('localhost','root','','ame');

        if ($conn -> connect_errno) {
            echo "Failed to connect to MySQL: " . $conn -> connect_error;
            exit();
        }

        if ($result = $conn -> query($sql)) {
            echo "Returned rows are: " . $result -> num_rows;
            // Free result set
            $result -> free_result();
        }
        
        $conn -> close();

    } 

}

?>