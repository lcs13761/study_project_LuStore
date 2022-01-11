<?php

namespace Source\Request;

use Source\Core\FormRequest;

class AuthRequest extends FormRequest
{
    protected function modifyData(){
        $this->data->remember = (bool)$this->remember ?? false;
    }


}