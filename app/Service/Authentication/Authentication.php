<?php

namespace Plg\MyMoneyExpenseTracker\Service\Authentication;

use Plg\MyMoneyExpenseTracker\Models\UserModel;
use \Throwable;

class Authentication extends UserModel{
    
    public function __construct()
    {
        session_start();

    }

    public function register(string $email,string $username,string $password):bool
    {
        try{
           $this->username=$username;
           $this->password=password_hash($password,PASSWORD_DEFAULT);
           $this->email=$email;
           $this->create();

           $_SESSION['user']=[
            'username'=>$username,
            'email'=>$email
           ];
     
           return true;
        }catch(\Throwable $e){return false;}

    }
    

    public function login(string $email,string $password)
    {
      
      $result=$this->getUserByEmail($email); 
      if($result==false){
        return false;
      }else{
        if($result->password==password_verify($password,$result->password)){
            $_SESSION['user']=$result;
            return true;
        }else{
            return false;
        }


      }


    }

}
