<?php

namespace Plg\MyMoneyExpenseTracker\Controllers;

use Plg\MyMoneyExpenseTracker\Service\Authentication\Authentication;
use Plg\MyMoneyExpenseTracker\Service\Authentication\Validation;

class UserController{

    private string $root;
    
    public function __construct(){
        $this->root=$_SERVER['DOCUMENT_ROOT'];
    }


    public function index()
    {
        include($this->root.'/view/authentication/sign_up.html');
    }

    public function store()
    {
        $input = file_get_contents('php://input');
        $data = json_decode($input, true);  
       
        $validateEmail=new Validation('Email',$data['email']);
        $validatePassword=new Validation('Password',$data['password']);
        $validateUsername=new Validation('Username',$data['username']);
     
        $validateEmail=$validateEmail->isEmail()->validated();
        $validatePassword= $validatePassword->isString()->minLength(8)->validated();
        $validateUsername= $validateUsername->isString()->validated();

       
        if($validateEmail!=false && $validatePassword!=false && $validateUsername!=false){
            $auth= new Authentication();
            $data=$auth->register($validateEmail,$validateUsername, $validatePassword);
            if($data){
                echo json_encode([
                    "status" => "success",
                    "redirect" => "/dashboard"
                ]);
                
            }


        }else{
            echo json_encode(['data'=>'error']);

        }
       

    }

    public function edit()
    {
        echo "i am edit";
    }

    public function dashboard()
    {
        include($this->root.'/view/expense/records.html');    }

}