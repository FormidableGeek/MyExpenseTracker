<?php

namespace Plg\MyMoneyExpenseTracker\Models;

use Plg\MyMoneyExpenseTracker\Models\DataBase\DatabaseConnection;

class TransactionModel extends DatabaseConnection{

    private string $table="transactions";

    public string $id;
    public string $user_id;
    public string $transaction_type_id;
    public string $account_id;
    public string $amount;
    public string $category_id;
    public string $description;
    public string $timestamp;
    
    public function __construct()
    {

    }

    public function create(string $email,string $username,string $password):bool
    {
        try{
            $query="INSERT INTO `users` (`user_id`,`transaction_type_id`,`account_id`,`amount`,`category_id`,`description`) VALUES(:user_id,:transaction_type_id,:account_id,:amount,:category_id,:description)";
            $stmt=$this->connect()->prepare($query);

            $stmt->bindParam(':user_id',$this->escape($this->user_id));
            
            $stmt->bindParam(':transaction_type_id',$this->escape($this->transaction_type_id));
            
            $stmt->bindParam(':account_id',$this->escape($this->account_id));
            
            $stmt->bindParam(':category_id',$this->escape($this->category_id)); 
            
            $stmt->bindParam(':description',$this->escape($this->description));
             
            $stmt->bindParam(':amount',$this->escape($this->amount)); 
            
            
             if($stmt->execute()){
              return true;
            }else{return false;}
       }catch(\PDOException $e){
           return false;
        }
     

    }
    

    public function getTransactionByUserID(int $user_id)
    {
        
        $query="SELECT * FROM `$this->table` WHERE `user_id`=:user_id";
        $stmt=$this->connect()->prepare($query);
        $stmt->bindParam(':user_id',$user_id);
        $stmt->execute();
        return $result=$stmt->fetch(\PDO::FETCH_OBJ);
        if(count($result)>1){
            return $result;

        }else{
            return false;
        }



    }

    public function update(int $id,array $array)
    {
        $query="UPDATE  `$this->table` SET  WHERE `id`=:id";

        $stmt=$this->connect()->prepare($query);
        
        $stmt->bindParam(':id',$id);

        if($stmt->execute()){
            return true;

        }else{
            return false;
        }

    }

    public function delete(int $id):bool
    {
        $query="DELETE  FROM `$this->table` WHERE `id`=:id";

        $stmt=$this->connect()->prepare($query);
        
        $stmt->bindParam(':id',$id);

        if($stmt->execute()){
            return true;

        }else{
            return false;
        }

    }

    private function escape($data){
        return filter_var($data,FILTER_SANITIZE_STRING);

    }

}
