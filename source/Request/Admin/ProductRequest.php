<?php

namespace Source\Request\Admin;

use Source\Core\FormRequest;
use function format_money;

class ProductRequest extends FormRequest
{

    public function attributes(){

        if(isset($this->value)){
            $this->value = format_money($this->value);
        }
    }

    public function rules()
    {

        switch ($this->method) {
            case 'POST':
            {
                return [
                    'name' => ['required', 'string','unique:name,product'],
                    'category_id' => ['required','numeric'],
                    'value' => ['required', 'float'],
                    'size' => ['required'],
                    'qts' => ['required', 'numeric']
                ];
            }
            case 'PUT':
            case 'PATH':{
                return [
                    'name' => ['required', 'string','unique:name,product,' . $this->id .',id'],
                    'category_id' => ['required','numeric'],
                    'value' => ['required', 'float'],
                    'size' => ['required'],
                    'qts' => ['required', 'numeric']
                ];
            }
            default:
                break;
        }
    }
}