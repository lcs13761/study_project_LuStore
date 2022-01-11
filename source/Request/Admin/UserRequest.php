<?php

namespace Source\Request\Admin;

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
                    "password" => ['required','string','confirmed']
                ];
            }
            case 'PUT':
            case 'PATH':{
                return [
                    'name' => ['required', 'string'],
                    'email' => ['required', 'email', 'unique:email,user,'. $this->id .',id'],
                    "password" => ['nullable','string','current:user','confirmed']
                ];
            }
            default:
                break;
        }
    }


}