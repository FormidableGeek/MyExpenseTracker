<?php

namespace Plg\MyMoneyExpenseTracker\Service\Authentication;

class Validation{
    protected string $success;
    protected string $name;
    protected array $error=[];
    protected $input;
    
    public function __construct(string $name='Input', $input){
        $this->input=$input;
        $this->name=$name;

    }

    public function count()
    {
      
        if (is_string($this->input)) {
            $count=trim(strlen($this->input));
        }elseif(is_array($this->input)){
            $count=count($this->input);

        }elseif(is_numeric($this->input)){
            $count=$this->input;

        }else{
                $count=filesize($this->input);
           
        }
        return (int)$count;
    }

    public function maxLength(int $comp){
        if(!($this->count()<= $comp)){
            $this->error[]="$this->name must not be greater than $comp";
        }
        return $this;

    }

    public function minLength($comp){
        if(!($this->count()>= $comp)){
            $this->error[]="$this->name must not be less than $comp";
        }
        return $this;

    }

    public function isString(){
        if(!is_string($this->input)){
            $this->error[]="$this->name must be a string";
        }
        return $this;

    }

    public function isEmail(){
        if(!filter_var($this->input,FILTER_VALIDATE_EMAIL)){
            $this->error[]="$this->name must be an email";
        }

        return $this;

    }

    public function isInteger(){
        if(!filter_var($this->input,FILTER_VALIDATE_INT)){
            $this->error[]="$this->name must be an integer ";
        }

        return $this;

    }

    public function isFloat(){
        if(!filter_var($this->input,FILTER_VALIDATE_FLOAT)){
            $this->error[]="$this->name must be a float ";
        }

        return $this;

    }

    public function isFile()
    {

    }

    public function validated()
    {
        if(count($this->getErrors())>0){
            return false;
        }else{ return $this->input;}

    }

    public function getErrors()
    {
        return $this->error;

    }


}