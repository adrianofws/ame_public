<?php

class BaseDAO {

    protected $config = array(
        "host" => "localhost",
        "root" => "root",
        "password" => '',
        "database" => "ame"
    );

    protected function insert($sql, $parameters) {

        foreach ($parameters as $key => $value) {

            if(!((int) $value))
                $value = "'" . strtoupper($value) . "'";

            $sql = str_replace($key, $value, $sql);

        }

        $conn = new mysqli($this->config['host'],
                           $this->config['root'],
                           $this->config['password'],
                           $this->config['database']);

        if ($conn -> connect_errno) {
            echo "Failed to connect to MySQL: " . $conn -> connect_error;
            exit();
        }

        if ($conn -> query($sql)) {
            echo "Query executada!";
        } else {
            echo "Falha na execução da query!";
        }
        
        $conn -> close();

    }

}