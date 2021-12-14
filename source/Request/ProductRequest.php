<?php

namespace Source\Request;

use Source\Core\FormRequest;

class ProductRequest extends FormRequest
{
    public function rules()
    {
        switch ($this->method) {
            case 'POST':
            {
                return [
                    'product' => ['required', 'string'],
                    'description' => ['required', 'string'],
                    'value' => ['required', 'numeric'],
                    'size' => ['required', 'numeric'],
                    'qts' => ['required', 'numeric']
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