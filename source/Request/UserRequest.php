<?php

namespace Source\Request;

use Source\Core\FormRequest;

class UserRequest extends FormRequest
{

    public function rules()
    {
        switch ($this->method) {
            case 'POST':
            {
                return [
                    'name' => ['required', 'string'],
                    'email' => ['required', 'email', 'unique:email,user'],
                ];
            }
            case 'PUT':
            case 'PATH':{
                return [
                    'name' => ['required', 'string'],
                    'email' => ['required', 'email', 'unique:email,user,'. $this->id .',id'],
                ];
            }
            default:
                break;
        }

    }


}