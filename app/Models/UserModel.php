<?php

namespace Plg\MyMoneyExpenseTracker\Models;

use Plg\MyMoneyExpenseTracker\Models\DataBase\DatabaseConnection;

class UserModel extends DatabaseConnection{

    private string $table="users";

    public string $id;
    public string $username;
    public string $email;
    public string $password;
    
    public function __construct()
    {

    }

    public function create():bool
    {
        try{
            $query="INSERT INTO `users` (`email`,`username`,`password`) VALUES(:email,:username,:password)";
           
            $email=$this->escape($this->email);
            $username=$this->escape($this->username);
            $password=$this->escape($this->password);

            $stmt=$this->connect()->prepare($query);
            $stmt->bindParam(':email',$email);
            $stmt->bindParam(':username',$username);
            $stmt->bindParam(':password',$password);

           if($stmt->execute()){
              return true;
            }else{return false;}
       }catch(\PDOException $e){
       // return $e->getMessage();
           return false;
        }
     

    }
    

    public function getUserByEmail(string $email)
    {
        
        $query="SELECT * FROM `users` WHERE `email`=:email";
        $stmt=$this->connect()->prepare($query);
        $stmt->bindParam(':email',$email);
        $stmt->execute();
        return $result=$stmt->fetch(\PDO::FETCH_OBJ);
        if(count($result)>1){
            return $result;

        }else{
            return false;
        }



    }

    private function escape($data){
        return filter_var($data,FILTER_SANITIZE_STRING);

    }

}
