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
                $value = "'" . $value . "'";

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
            
            $conn -> close();
            return true;
        
        } else {
        
            $conn -> close();
            return false;
        
        }
        
    }

    protected function getListCastParam($sql, $parameters) {

        foreach ($parameters as $key => $value) {

            if(!((int) $value))
                $value = "'" . strtoupper($value) . "'";

            $sql = str_replace($key, $value, $sql);

        }

        $conn = new mysqli($this->config['host'],
                           $this->config['root'],
                           $this->config['password'],
                           $this->config['database']);

        if ($conn->connect_errno) {
            echo "Failed to connect to MySQL: " . $conn -> connect_error;
            exit();
        }

        if ($result = $conn->query($sql)) {

            $array = [];

            foreach ($result as $key => $val) {
                $array[$key] = $this->processRow($val);
            }
        
            $conn -> close();

            return $array;
        
        } else {

            $conn -> close();
            
            echo "Falha na execução da query!";
            
            return null;
        }
        
    }

    protected function getListNoCastParam($sql, $parameters) {

        foreach ($parameters as $key => $value) {

            if(!((int) $value))
                $value = "'" . strtoupper($value) . "'";

            $sql = str_replace($key, $value, $sql);

        }

        $conn = new mysqli($this->config['host'],
                           $this->config['root'],
                           $this->config['password'],
                           $this->config['database']);

        if ($conn->connect_errno) {
            echo "Failed to connect to MySQL: " . $conn -> connect_error;
            exit();
        }

        if ($result = $conn->query($sql)) {

            $array = [];

            while ($row = $result->fetch_assoc()) {
                $array[] = $row;
            }

            $conn -> close();

            return $array;
        
        } else {

            $conn -> close();
            
            echo "Falha na execução da query!";
            
            return null;
        }
        
    }

    protected function getListCast($sql) {

        $conn = new mysqli($this->config['host'],
                           $this->config['root'],
                           $this->config['password'],
                           $this->config['database']);

        if ($conn->connect_errno) {
            echo "Failed to connect to MySQL: " . $conn -> connect_error;
            exit();
        }

        if ($result = $conn->query($sql)) {

            $array = [];

            foreach ($result as $key => $val) {
                $array[$key] = $this->processRow($val);
            }
        
            $conn -> close();

            return $array;
        
        } else {

            $conn -> close();
            
            echo "Falha na execução da query!";
            
            return null;
        }
        
    }

    protected function getListNoCast($sql) {

        $conn = new mysqli($this->config['host'],
                           $this->config['root'],
                           $this->config['password'],
                           $this->config['database']);

        if ($conn->connect_errno) {
            echo "Failed to connect to MySQL: " . $conn -> connect_error;
            exit();
        }

        if ($result = $conn->query($sql)) {

            $array = [];

            while ($row = $result->fetch_assoc()) {
                $array[] = $row;
            }

            $conn -> close();

            return $array;
        
        } else {

            $conn -> close();
            
            echo "Falha na execução da query!";
            
            return null;
        }
        
    }

    protected function processRow($result)
    {
        return $result;
    }

}