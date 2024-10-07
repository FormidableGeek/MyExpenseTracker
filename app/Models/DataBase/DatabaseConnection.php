<?php

namespace Plg\MyMoneyExpenseTracker\Models\DataBase;

class DatabaseConnection{
    protected string $host="localhost";
    protected string $database="test_db";
    protected string $user="root";
    protected string $db_password="";
    protected $connect;

    protected function __construct()
    {
        $this->connect=$this->connect();
    }

    protected  function connect()
    {
        try{
            $pdo= new \PDO("mysql:host=$this->host;dbname=$this->database",$this->user,$this->db_password);
            $pdo->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
            return $pdo;
           // return true;

        }catch(\PDOException $error ){
            //$error->getMessage();
            return false;

        }

    }

    protected function isConnected():bool
    {
        
        if($this->connect()){
            return true;
        }else{
            return false;
        }

    }
}
