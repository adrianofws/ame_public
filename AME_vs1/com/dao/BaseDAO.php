<?php

class BaseDAO {

    public $config = [
        "user" => "SYSTEM",
        "password" => "admin",
        "root" => "localhost:1522/XE"
    ];

    public function getListCast() {

        $connection = oci_connect($this->config['user'], $this->config['password'], $this->config['root']);

        $query = oci_parse($connection, 'SELECT * FROM TABELA_DE_CLIENTES');
        oci_execute($query);

            while (oci_fetch($query)) {
                // echo oci_result($query, 'NOME') . " ";
                // echo oci_result($query, 'CPF') . " | ";
                var_dump($query);
            }

    }

}