<?php

namespace Source\Core;

use Exception;
use Source\Support\Validate;

abstract class FormRequest
{
    protected string $method;
    protected $data;


    /**
     * @throws Exception
     */
    public function __construct()
    {
        $this->method = strtoupper(request()->getLoadedRoute()->getRequestMethods()[0]);
        $this->data = (object)input()->all();

        if (isset(request()->getLoadedRoute()->getParameters()['id'])) {
            $this->data->id = request()->getLoadedRoute()->getParameters()['id'];
        }

        if (!empty($_FILES)) {
            $files = array_keys($_FILES);
            foreach ($files as $key) {
                $filePost = $_FILES[$key];
                $this->file_exists($filePost,$key);
            }
        }

        $this->csrf_verification();
    }

    private function dataModified(){
        if (method_exists($this, 'modifyData')) {
           $this->modifyData();
        }
    }

    private function file_exists(array $file,string $key)
    {
        if (!empty($file['size'])) {
            $this->data->$key = $file;
        } else {
            $this->data->$key = null;
        }
    }

    public function all()
    {
        return (array)$this->data;
    }

    final public function validation(): bool
    {
        if (method_exists($this, 'attributes')) {
            $this->attributes();
        }
        if (method_exists($this, 'rules')) {
            $validation = Validate::make((array)$this->data, $this->rules());
        }
        if (!$validation) return $validation;
        return true;
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

    final public function __get($name): mixed
    {
        return ($this->data->$name ?? null);
    }

    /**
     * @throws Exception
     */
    private function csrf_verification(): void
    {
        if (!$this->_token) throw new Exception('csrf is required');
        if (!csrf_verify($this->_token)) throw new Exception('csrf error');
    }


}