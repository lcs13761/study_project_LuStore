<?php

namespace Source\Core;

use Exception;
use Source\Support\Validate;

abstract class FormRequest
{
    protected string $method;
    protected object $data;


    /**
     * @throws Exception
     */
    public function __construct(){
        $this->method = request()->getLoadedRoute()->getRequestMethods()[0];
        $this->data = (object)input()->all();
        $this->csrf_verification();
    }

   final public function validation(): bool
   {
        return Validate::make((array)$this->data,$this->rules());
    }

    public function __set($name, $value)
    {
        if (empty($this->data)) {
            $this->data = new \stdClass();
        }

        $this->data->$name = $value;
    }

    final public function __isset($name): bool
    {
        return isset($this->data->$name);
    }

    final public function __get($name):mixed{
        return ($this->data->$name ?? null);
    }

    /**
     * @throws Exception
     */
   private function csrf_verification():void{
        if(!$this->_token) throw new Exception('csrf is required');
        if (!csrf_verify($this->_token)) throw new Exception('csrf error');
    }

    /**
     * @return array
     */
    public function rules(){

        return [];

    }

}