<?php

namespace Source\Support;

use Source\Core\Session;

class Validate
{
  private Bool $validator = false;


  public function make(array $request, array $validate)
  {
    foreach ($validate as $key => $type) {
      $this->verify($request[$key], $type,$key);
    }
    return $this;
  }

  public function fails()
  {
    return $this->validator;
  }

  public function verify($value, array|string $type,string $key)
  {
      if(is_array($type)){
        foreach($type as $keyty => $validate){
          if($validate == "email") $this->email($value,$key);
          if($validate == "numeric") $this->numeric($value,$key);
          if($validate == "string") $this->string($value,$key);
          if(str_contains($validate , "unique:")) $this->unique($validate,$value,$key);
        }
      }

      if(is_string($type)){

      }
  }

  private function unique(string $infor,string $value,string $key){
        $array = explode(":" , $infor);
        $valuescheck = explode("," , $array[1]);
        $column = $valuescheck[0];
        $model = 'Source\Models\\'. ucfirst($valuescheck[1]);

        if(class_exists($model)){
            $model = new $model();
            $exists = $model->where($column,$value)->count();
            if($exists > 0){
              $this->validator = true;
              $this->messages[$key] = $key . " indiponivel";
              session()->set("validate" , $this->messages);
            }

        }
  }

  private function email($value,string $key){
    
    if(false === \filter_var($value, FILTER_VALIDATE_EMAIL)){
      $this->validator = true;
      $this->messages[$key] = "Invalid Email";
      session()->set("validate" , $this->messages);
    }
  }

  private function numeric($value,string $key){

    if(!is_numeric($value)){
      $this->validator = true;
      $this->messages[$key] = "Invalid Number";
      session()->set("validate" , $this->messages);
    }
  }

  private function string(string $value, string $key){
      if(!is_string($value)){
        $this->validator = true;
        $this->messages[$key] = "Invalid type string";
        session()->set("validate" , $this->messages);
      }
  }
}
