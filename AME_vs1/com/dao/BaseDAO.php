<?php

class BaseDAO {

    public $config = [
        "user" => "SYSTEM",
        "password" => "admin",
        "root" => "localhost:1522/XE"
    ];

    protected function getListCast() {

        $connection = oci_connect($this->config['user'], $this->config['password'], $this->config['root']);

        $query = oci_parse($connection, 'SELECT * FROM TABELA_DE_CLIENTES');
        oci_execute($query);

            while (oci_fetch($query)) {
                // echo oci_result($query, 'NOME') . " ";
                // echo oci_result($query, 'CPF') . " | ";
                var_dump($query);
            }

    }

    protected function insert($sql, $parameters) {

        foreach ($parameters as $key => $value) {
            echo "{$key} => {$value} ";
        }

        // $conn = new mysqli('localhost','root','','ame');

        // if ($conn -> connect_errno) {
        //     echo "Failed to connect to MySQL: " . $conn -> connect_error;
        //     exit();
        // }

        // if ($result = $conn -> query($sql)) {
        //     echo "Returned rows are: " . $result -> num_rows;
        //     // Free result set
        //     $result -> free_result();
        // }
        
        // $conn -> close();

    }

}